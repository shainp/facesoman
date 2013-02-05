<?

error_reporting(0);

// Loading Variables
$name = $_REQUEST["namex"];
$subject = $_REQUEST["subject"];
$designation = $_REQUEST["designation"];
$company = $_REQUEST["company"];
$tel = $_REQUEST["tel"];
$email = $_REQUEST["email"];
$message = $_REQUEST["msg"];
// The \n character means New Line

// Mixing all variables, including IP
$body = "<html><body><table align='center' width='90%' cellpadding='2' cellspacing='1' border='0'><tR><td width='31%' height='30'><font face='Trebuchet MS' size='3'><b>Name</b></font></td><td width='69%' height='30'><font face='Trebuchet MS' size='3'>". $name ."</font>  </td></tR><tR><td height='30'><font face='Trebuchet MS' size='3'><b>Designation</b></font></td>  <td><font face='Trebuchet MS' size='3'>". $designation ."</font></td></tR><tR><td height='30'><font face='Trebuchet MS' size='3'><b>Company</b></font></td>  <td><font face='Trebuchet MS' size='3'>". $company ."</font></td></tR><tR><td height='30'><font face='Trebuchet MS' size='3'><b>Phone</b></font></td><td><font face='Trebuchet MS' size='3'>". $tel ."</font></td></tR><tR><td height='30'><font face='Trebuchet MS' size='3'><b>Subject</b></font></td>  <td><font face='Trebuchet MS' size='3'>". $subject ."</font></td></tR><tR><td height='30'><font face='Trebuchet MS' size='3'><b>Email</b></font></td>  <td><font face='Trebuchet MS' size='3'>". $email ."</font></td></tR><tR><td height='30'><font face='Trebuchet MS' size='3'><b>Message</b></font></td>  <td><font face='Trebuchet MS' size='3'>". $message ."</font></td></tR></table></body></html>";



        $to = 'director@facesoman.com';
		$subject = 'Faces Magazine Online Contact Form';
		$from = $email;
		$headers  = "From: $from\r\n"; 
		$headers .= "Content-type: text/html\r\n";  
		$headers .= "CC: editor@facesoman.com\r\n";
		$headers .= "BCC: roshan@goincubix.com\r\n";
		$message = $body;
	 
		mail($to, $subject, $message, $headers);
		$replyto = $email;
		$replysubject = 'Faces Magazine - Automated Reply';
		$replyfrom = 'editor@facesoman.com';
		$replyheaders  = "From: $replyfrom\r\n"; 
		$replyheaders .= "Content-type: text/html\r\n";  
		$replymessage = "<html><body><table align='center' width='90%' cellpadding='2' cellspacing='1' border='0'><tR><td width='31%' height='30' style='font-family:Verdana, Geneva, sans-serif; color:#555555'>Thank you for your interest in Faces Magazine, we will get back to you. Keep in touch. Faces is one of the leading premier leisure magazine, for discerning readers with distinguished tastes. Have a great day ahead!<br/><br/> Best Regards,<br/><strong>Editor</strong><br/><strong>Faces Team</strong><br/>http://www.facesoman.com</td></tR></table></body></html>";
		mail($replyto, $replysubject, $replymessage, $replyheaders);
?>