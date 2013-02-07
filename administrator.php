<?php
	session_start();
	include('actions/database.inc');
	mysql_connect($mysql_hostname, $mysql_username, $mysql_password) or die(mysql_error());
	mysql_select_db($mysql_database) or die($error);
	
	if (!isset($_SESSION['administrator']) && !isset($_POST['password'])){
		echo '<html><head><title>Administrator Login</title></head><body style="font-family:Arial;"><div style="width:200px; height:200px; margin:100px auto;"><form method="post" action=""><fieldset><legend>Administrator Login</legend><label>Username:<input type="text" name="user"/></label><br /><br /><label>Password:<input type="password" name="password"/></label><br /><br /><input type="submit" value="Login" name="submit"/></fieldset></form></div> <script type="text/javascript"> var error_msg = "';
		if(isset($_POST['password'])){
			$password = addslashes(strip_tags($_REQUEST['password']));
			$login = mysql_query("SELECT * FROM `admin` WHERE `user`='admin'");
			if (mysql_num_rows($login)==0){
				echo 'The user entered does not exist in our database.'; //user does not exist
			} else {
				while ($login_row = mysql_fetch_assoc($login)) {
					$password_db = $login_row['password'];
					$password = md5($password);
					if ($password!=$password_db){
						echo 'You have entered an incorrect password. Please try again.'; //Incorrect password
					} else
						$_SESSION['administrator']='admin';
				}
			}
			goto goto_admin;
		}
		echo '"; if(error_msg) alert(error_msg);</script></body></html>';
		exit(0);
		goto_admin:
	}
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
<title>FACES Magazine Oman</title> 
<META name="keywords" content="Magazine, Oman, Faces, Centrepoint, Driving, Fashion, Movies, Muscat, Sultanate, Oman, Games, Gossips, Celebrity, Sultan, Salalah, FacesOman, OmanFaces, emagazine, Home, health, Oman news, Oman jobs, Oman Numbers">
<link rel="shortcut icon" href="favicon.ico" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" /> 
<link rel="stylesheet" type="text/css" media="all" href="css/960.css" />
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables_themeroller.css" />
<script type="text/javascript">
$.fn.dataTableExt.oApi.fnReloadAjax = function ( oSettings, sNewSource, fnCallback, bStandingRedraw )
{
    if ( typeof sNewSource != 'undefined' && sNewSource != null ) {
        oSettings.sAjaxSource = sNewSource;
    }
 
    // Server-side processing should just call fnDraw
    if ( oSettings.oFeatures.bServerSide ) {
        this.fnDraw();
        return;
    }
 
    this.oApi._fnProcessingDisplay( oSettings, true );
    var that = this;
    var iStart = oSettings._iDisplayStart;
    var aData = [];
  
    this.oApi._fnServerParams( oSettings, aData );
      
    oSettings.fnServerData.call( oSettings.oInstance, oSettings.sAjaxSource, aData, function(json) {
        /* Clear the old information from the table */
        that.oApi._fnClearTable( oSettings );
          
        /* Got the data - add it to the table */
        var aData =  (oSettings.sAjaxDataProp !== "") ?
            that.oApi._fnGetObjectDataFn( oSettings.sAjaxDataProp )( json ) : json;
          
        for ( var i=0 ; i<aData.length ; i++ )
        {
            that.oApi._fnAddData( oSettings, aData[i] );
        }
          
        oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
          
        if ( typeof bStandingRedraw != 'undefined' && bStandingRedraw === true )
        {
            oSettings._iDisplayStart = iStart;
            that.fnDraw( false );
        }
        else
        {
            that.fnDraw();
        }
          
        that.oApi._fnProcessingDisplay( oSettings, false );
          
        /* Callback user function - for event handlers etc */
        if ( typeof fnCallback == 'function' && fnCallback != null )
        {
            fnCallback( oSettings );
        }
    }, oSettings );
};
</script>
<script type="text/javascript">
var oTable;
$(document).ready(function() {
	oTable = $('#example').dataTable( {
        "bProcessing": true,
        "bServerSide": true,
		"bSort": false,
        "sAjaxSource": "actions/datatable.php"
    } );
} );



function approve(user_id){
	$.post("actions/actions.php?action=user_approve&ID="+ user_id,function(data){
		if (data == 1)
				oTable.fnReloadAjax();
	});
}
function reject(user_id){
	$.post("actions/actions.php?action=user_reject&ID="+ user_id,function(data){
		if (data == 1)
			oTable.fnReloadAjax();
	});
}
</script>
<style type="text/css">	

#footer {
        background:#D9D9D9;
        margin-top:10px;
        margin-bottom:10px;
        padding-top:10px;
        padding-bottom:10px;
}

#footer p, #footer h3 {
    color:#666666;
}

#footer a {
    color:#666666;
    text-decoration:none;
}

.copyright {
    font-size:.6em;
}


h2 { 
        font-size:25px;
        line-height:1.2em;
        margin:0 0 10px 0;
        text-align:center;
        letter-spacing:normal;
        font-weight:lighter;
        font-family: 'Raleway', sans-serif;
        color:#FF0033;
        /*text-shadow:1px 1px rgba(0,0,0,.3);*/
}
th {
	font-size:0.8em;
}
td {
	font-size:0.8em;
}
#downloads{
	float:right;
	padding-bottom:10px;
}
#downloads a{
	text-decoration:none;
	color:#f00;
	font-size:0.8em;

}
</style>
</head> 
<body> 
 
<div class="container_12 main_container"> 
	 <!--Header Div --> 
	<div class="grid_12"><a href="index.html"><img src="images/header.jpg" alt="Faces Magazine" width="940" height="153" /></a></div> 
	<!-- END HeaderDiv --> 

	<div class="grid_12" id="top-half"> 
		<div class="grid_12 alpha" id="latest_articles"> 
			<h2 class="text-left"><strong>Manage Users</strong></h2>
			<div id="downloads"><a href="actions/actions.php?action=download_email_list">Download Email List</a> | <a href="actions/actions.php?action=download_db">Download User Database</a></div>
			<div class="clear">&nbsp;</div> 
			<div id="dynamic">
				<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
					<thead>
						<tr>
							<th width="15%">First Name</th>
							<th width="15%">Surname</th>
							<th width="15%">Company</th>
							<th width="15%">Email</th>
							<th width="15%">Phone</th>
							<th width="15%">Status</th>
							<th width="10%">Approve/Reject</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td colspan="5" class="dataTables_empty">Loading data from server</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th>First Name</th>
							<th>Surname</th>
							<th>Company</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Status</th>
							<th>Approve/Reject</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
	
	<div class="clear">&nbsp;</div> 
	<!--End Stories Area-->		
        <div class="grid_12" id="footer">
			<div class="grid_9 alpha">&nbsp;</div>
            <div class="grid_2 omega">
                <a href="http://goincubix.com/" target="_blank"><img src="images/incubix.png" /></a>
            </div>
        </div>
</div> 
</body> 
</html>











