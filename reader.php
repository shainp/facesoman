<?php
	if (!isset($_SESSION['email']))
		header('Location: index.html');
	exit(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en"> 
<head> 
<meta http-equiv="content-type" content="text/html; charset=utf-8" /> 
<title>FACES Magazine Oman</title> 
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0, maximum-scale=1">
  <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300' rel='stylesheet' type='text/css'>
    <link rel="apple-touch-icon" href="s/1.jpg">
    <script type="text/javascript" src="r/jq.js"></script>
    <script type="text/javascript" src="r/jt.js"></script>
    <script type="text/javascript" src="r/jm.js"></script>
    <script type="text/javascript" src="r/ji.js"></script>
    <script type="text/javascript" src="r/touch.js"></script>
    <script type="text/javascript" src="r/jf.js"></script>
    <link rel="stylesheet" type="text/css" href="r/style.css">
    <link rel="stylesheet" media="screen and (max-width: 320px)" href="r/mobile.css" />
<META name="keywords" content="Magazine, Oman, Faces, Centrepoint, Driving, Fashion, Movies, Muscat, Sultanate, Oman, Games, Gossips, Celebrity, Sultan, Salalah, FacesOman, OmanFaces, emagazine, Home, health, Oman news, Oman jobs, Oman Numbers">
<link rel="shortcut icon" href="favicon.ico" />
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Josefin+Sans&v1' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Redressed&v1' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" /> 
<link rel="stylesheet" type="text/css" media="all" href="css/960.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
<script src="http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js"></script>
<META name="keywords" content="Magazine, Oman, Faces, Faces Magazine, Centrepoint, Driving, Fashion, Movies, Muscat, Sultanate, Oman, Games, Gossips, Celebrity, Sultan, Salalah, FacesOman, OmanFaces, emagazine, Home, health, Oman news, Oman jobs, Oman Numbers,Opera House, Oprah House, Shatti Qurum, Roar Oman, Media 21, Times of Oman, Muscat Press, Publishing">

<meta name="description" content="Faces Magazine Oman"/>
<meta name="author" content="Incubix"/>
        
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" /> 
<link rel="stylesheet" type="text/css" media="all" href="css/960.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/style.css" />
<script src="http://cdn.jquerytools.org/1.2.5/full/jquery.tools.min.js"></script>
</head> 
<body> 
 
<div class="container_12 main_container"> 
	<!--Header Div --> 
	<div class="grid_12"><a href="index.html"><img src="images/header.jpg" alt="Faces Magazine" width="940" height="153" /></a></div> 
    <div class="menu_style" style="background-color:#d1232a; padding:15px;" align="left">
    <a href="index.html" class="selected">HOME</a>  /  
    <a href="aboutus.html">ABOUT US</a>  /  
    <a href="advertising.html">ADVERTISING</a>  /  
    <a href="archives.html">ARCHIVES</a>  /  
    <a href="searchingfaces.html">SEARCHING FACES</a>  /  
    <a href="contact.html">CONTACT</a> </div>
  <div class="clear">&nbsp;</div> 
	<!-- END HeaderDiv --> 

	<div class="grid_12" id="top-half"> 
    <h2 class="text-left"><strong>Current Edition Emag</strong></h2>
		<br/>
	  <script language="JavaScript" type="text/javascript">
	function getURLParam(strParamName){
    	var strReturn = "";
    	var strHref = window.location.href;
   		if ( strHref.indexOf("?") > -1 ){
      		var strQueryString = strHref.substr(strHref.indexOf("?")).toLowerCase();
      		var aQueryString = strQueryString.split("&");
      		for ( var iParam = 0; iParam < aQueryString.length; iParam++ ){
        		if ( aQueryString[iParam].indexOf(strParamName.toLowerCase() + "=") > -1 ){
          			var aParam = aQueryString[iParam].split("=");
          			strReturn = aParam[1];
          			break;
        		}
      		}
    	}
    	return unescape(strReturn);
  	}
 
	document.write(
    '<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"\n'+
    '  codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0"\n'+   
    '  WIDTH="100%" HEIGHT="100%" id="idswf" align="TL">\n'+
    '  <PARAM NAME="allowScriptAccess" value="sameDomain" />\n'+
  	'  <PARAM NAME="allowFullScreen" value="true" />\n'+
    '  <PARAM NAME=movie '+
    '    VALUE="editions/jan2013/main.swf?page='+getURLParam('page')+'" />\n'+
    '  <PARAM NAME=quality VALUE=high />\n'+
    '  <PARAM NAME=bgcolor VALUE=#888888 />' + 
    '  <PARAM NAME=scale VALUE=noscale />\n'+
	'  <PARAM NAME=align VALUE=TL />\n'+
	'  <PARAM NAME=salign VALUE=TL />\n'+
    '  <EMBED src="editions/jan2013/main.swf?page=' + getURLParam('page') + '"' +
    '    bgcolor=#888888 WIDTH="100%" HEIGHT="100%" '+ 
    '    quality="high"' +
    '    scale="noscale"' +
    '    name="nameswf"' +
	'    align="TL"' +
	'    salign="TL"' +
    '    allowFullScreen="true"' +
    '    TYPE="application/x-shockwave-flash"'+
    '  />\n'+
    '</OBJECT>\n');
</script>
      
	</div>
	

 
	<div class="clear">&nbsp;</div> 
	<!--End Stories Area-->		
        <div class="grid_12" id="footer"> 
            <div class="grid_3" style="border-right:1px dotted #000000">
                <h3>Advertising Contact</h3>
                <p>+968 97770074</p>
                <p>+968 24563382</p>
                <p>+968 24563385</p>
                <p><a href="mailto:sales@facesoman.com" style="color:#FF0000;">sales@facesoman.com</a></p>
            </div>
            <div class="grid_3" style="height:97px; border-right:1px dotted #000000;">
                <h3>Editorial Contact</h3>
                <p>+968 24563382</p>
                <p>+968 24563385</p>
                <p><a href="mailto:editor@facesoman.com" style="color:#FF0000;">editor@facesoman.com</a></p>
            </div>
            <div class="grid_3" style="padding-top:20px;">
                <a href="http://www.facebook.com/pages/FACES-Magazine-Oman/347244555101" target="_blank"><img src="images/fb.jpg" /></a><br/><br/>
                <p class="copyright">&copy; Faces 2013. All Rights Reserved.</p>
            </div>
            <div class="grid_2" style="padding-left:35px;padding-top:75px;">
                <a href="http://goincubix.com/" target="_blank"><img src="images/incubix.png" /></a>
            </div>
        </div>
</div> 
<script type="text/javascript">
// perform JavaScript after the document is scriptable.
$(function() {
        // setup ul.tabs to work as tabs for each div directly under div.panes
        $("ul.tabs").tabs("div.panes > div");
});
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-37220678-1']);
  _gaq.push(['_setDomainName', 'facesoman.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</body> 
</html>