<?php
	ob_start();
	session_start();

	$mysql_hostname = 'localhost';
	$mysql_database = 'facesoman_users';
	$mysql_username = 'facesoman_user';
	$mysql_password = 'facesoman_pass';
	
	
	mysql_connect($mysql_hostname, $mysql_username, $mysql_password) or die(mysql_error());
	mysql_select_db($mysql_database) or die($error);
	
	function check_login(){
		if (isset($_SESSION['email']))
			return 1;
		else
			return 0;
	}
	
	function register(){
		$email = addslashes(strip_tags($_REQUEST['email']));
		$phone = addslashes(strip_tags($_REQUEST['phone']));
		$f_name = addslashes(strip_tags($_REQUEST['f_name']));
		$l_name = addslashes(strip_tags($_REQUEST['l_name']));
		$company = addslashes(strip_tags($_REQUEST['company']));
		$password = addslashes(strip_tags($_REQUEST['password']));
		
		if (!$password||!$email||!$phone||!$f_name||!$company)
		return 0; //not all fields input
		else {
			$password = md5($password);
			$check = mysql_query("SELECT * FROM `users` WHERE `email`='$email'");
			if (mysql_num_rows($check)>=1)
				return 0; //email already registered.
			else {
				$email_activation_code = rand(11111111,99999999);
				if(!email_activation_code($username, $email, $email_activation_code))
					return 0; //unable to send email.
				else {
					mysql_query("INSERT INTO `users` VALUES ('','$email','$password','$f_name','$l_name','$phone','$company','$email_activation_code','0','0')");
					if(mysql_affected_rows() == 1)
						return 1;
					notify_administrator($email);
				}
			}
		}
	}
	
	function login(){
		$email = addslashes(strip_tags($_REQUEST['email']));
		$password = addslashes(strip_tags($_REQUEST['password']));
		if (!$email||!$password)
			return 0; //not all filds input
		else {
			$login = mysql_query("SELECT * FROM users WHERE email='$email'");
			if (mysql_num_rows($login)==0)
				return 0; //user does not exist
			else {
				while ($login_row = mysql_fetch_assoc($login)) {
					$password_db = $login_row['password'];
					$password = md5($password);
					if ($password!=$password_db)
						return 0; //Incorrect password
					else {
						$email_verified = $login_row['email_verified'];
						$approved = $login_row['approved'];
						$email = $login_row['email'];
						if ($email_verified==0)
							return 0; //email activation pending
						else if ($approved==0)
							return 0; //moderator approval pending
						else {
							$_SESSION['email']=$email;
							return 1;
						}
					}
				}
			}
		}
	}
	
	function email_activate(){
		$email_activation_code = $_REQUEST['email_activation_code'];
		if (!$email_activation_code)
			return 0; //no activation code
		else {
			$check = mysql_query("SELECT * FROM `users` WHERE `email_activation_code`='$email_activation_code' AND `email_verified`='1'");

			if (mysql_num_rows($check)==1)
				return 0; //already activated";
			else {
				mysql_query("UPDATE `users` SET `email_verified`='1' WHERE `email_activation_code`='$email_activation_code'");
				if(mysql_affected_rows() == 1)
					return 1;
				else
					return 0;
			}
		}
	}
	
	function user_approve(){
		$email = $_REQUEST['email'];
		$ID = $_REQUEST['ID'];
		if ($email) {
			$check = mysql_query("SELECT * FROM `users` WHERE `email`='$email' AND `approved`='1'");
			if (mysql_num_rows($check)==1)
				return 0; //already approved
			else {
				mysql_query("UPDATE `users` SET `approved`='1' WHERE `email`='$email'");
				if(mysql_affected_rows() == 1)
					return 1;
				else
					return 0;
			}
		}
		else if($ID){
			$check = mysql_query("SELECT * FROM `users` WHERE `ID`='$ID' AND `approved`='1'");
			if (mysql_num_rows($check)==1)
				return 0; //already approved
			else {
				mysql_query("UPDATE `users` SET `approved`='1' WHERE `ID`='$ID'");
				if(mysql_affected_rows() == 1)
					return 1;
				else
					return 0;
			}
		}
		else
			return 0;
	}
	
	function user_reject(){
		$email = $_REQUEST['email'];
		if ($email) {
			$check = mysql_query("SELECT * FROM `users` WHERE `email`='$email' AND `approved`='0'");
			if (mysql_num_rows($check)==1)
				return 0; //already rejected
			else {
				mysql_query("UPDATE `users` SET `approved`='-1' WHERE `email`='$email'");
				if(mysql_affected_rows() == 1)
					return 1;
				else
					return 0;
			}
		}
		else if($ID) {
			$check = mysql_query("SELECT * FROM `users` WHERE `ID`='$ID' AND `approved`='0'");
			if (mysql_num_rows($check)==1)
				return 0; //already rejected
			else {
				mysql_query("UPDATE `users` SET `approved`='-1' WHERE `ID`='$ID'");
				if(mysql_affected_rows() == 1)
					return 1;
				else
					return 0;
			}
		}
		else
			return 0;
	}
	
	function logout(){
		session_destroy();
		return 1;
	}
	
	function email_activation_code($username, $email, $email_activation_code){
		$subject = "Activate your account";
		$body = "Hello $username,\n\nYou registered and need to activate your account. Click the link below or paste it into the URL bar of your browser\n\nhttp://".$_SERVER["SERVER_NAME"]."/actions/actions.php?action=email_activate&email_activation_code=$email_activation_code\n\nThanks!";
		if (!mail($email,$subject,$body))
			return 1;
		else
			return 0;
	}
	function notify_administrator($user_email){
		$subject = "New User Registered";
		$admin_email = 'admin@facesoman.com';
		$body = "A new user with the email address $email has completed registration and is waiting approval. Click the link below or paste it into the URL bar of your browser to activate user account.\n\nhttp://".$_SERVER["SERVER_NAME"]."/actions/actions.php?action=user_approve&email=$email\n\nClick here to login to the administrator control panel: http://".$_SERVER["SERVER_NAME"]."/administrator\n\nThanks!";
		if (!mail($admin_email,$subject,$body))
			return 1;
		else
			return 0;
	}
	
	switch($_REQUEST['action']) {
		case 'user_approve':
			echo user_approve();
			break;
		case 'user_reject':
			echo user_reject();
			break;
		case 'login':
			echo login();
			break;
		case 'logout':
			echo logout();
			break;
		case 'check_login':
			echo check_login();
			break;
		case 'register':
			echo register();
			break;
		case 'email_activate':
			echo email_activate();
			break;
		default:
			echo 'Invalid Action';
	}
?>
