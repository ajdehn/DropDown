<?php
session_start();
//On page 2
$var_db = $_SESSION['dbName'];
$var_sName = $_SESSION['schoolName'];


$_SESSION['dbName'] = $var_db;
$_SESSION['schoolName'] = $var_sName;
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>Test Database</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Content-Style-Type" content="text/css">
<META http-equiv=Cache-Control content=no-cache>
<META http-equiv=Pragma content=no-cache>
<META name="Expires" content="Fri, 01 Jan 1990 00:00:00 GMT">
<META NAME="Description" CONTENT="Find any test, upload">
<META NAME="Keywords" CONTENT="answers, cheating, university, findmytest, testing">
<link rel="stylesheet" href="/inc/templates/style.css" type="text/css">
<link rel="shortcut icon" HREF="/images/site/favicon.ico">
</head>
<BODY link="#0000FF" vlink="#0000FF" alink="#FF0000" bgcolor="#4f4f51" topmargin="25">
<!--
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59762063-1', 'auto');
  ga('send', 'pageview');

</script>
-->
<script type="text/javascript" src="/inc/templates/wz_tooltip.js"></script>
<Script Language = "JavaScript" Type="Text/JavaScript">

// -->
</script>
<center>
<!-- Checks the inner column-->
<table border="0" cellpadding="0" cellspacing="0" width="80%" bgcolor="#FFFFFF">
<tr>
	<td align="left" valign="top" width="770">

		<table border="0" cellpadding="0" cellspacing="0" width="100%">
	 	<tr>
	  		<td align="left" valign="top" width=""><a href="/"><img src="/series/DropSearch/images/fuckYouToad.png" border="0" width="100%" height="145" alt=" cheating" title=" cheating"></a></td>
		</tr>
		</table>

		<table border="0" cellpadding="6" cellspacing="0" width="100%" bgcolor="#506484">
	 	<tr>

	  		<td align="center" valign="top" class="top_nav">

				<font color="#f4d442"></font>&nbsp;<a href="/series/DropSearch/" class="top_nav">Home</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<font color="#666666"></font>&nbsp;<a href="/series/DropSearch/uploadForm.php" class="top_nav">Upload</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<font color="#666666"></font>&nbsp;<a href="/series/DropSearch/contact/" class="top_nav">Contact</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
		</tr>
		</table>



		<table border="0" cellpadding="16" cellspacing="0" width="100%" height="450" background="/images/site/fbbg.jpg">
		<tr>
			<td align="left" valign="top"><table width="100%" cellpadding="4" cellspacing="0" border="0">
<tr>
        <td align="left" valign="top" width="100%">




			<title>Drop down search</title>
<script>
function search(string){
	var xmlhttp;
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject("XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById("search").innerHTML = xmlhttp.responseText;
		}
	}
	// call the search function 
	xmlhttp.open("GET", "search.php?s="+string, true); 
	xmlhttp.send(null);
}
</script>
<style>
body{
	background: rgb(213,206,166);
}
#search{
	width: 350px; margin: 0 auto; max-height: 550px; border: 1px solid #f4f4f4; overflow: hidden;
}
#text{
	width: 350px; padding: 10px; border: 1px solid #f4f4f4; border-radius: 3px;
}
#searchtitle{
	width: 350px; padding: 10px; background: #fff;
}
#searchtitle:hover{
	background: #f4545f;
}
</style>
</head>
<body>
<div style="text-align: center; width: 500px; margin: 0 auto;">
	<h1>Drop down search</h1><span style="font-family: tahoma, sans-serif, arial; margin-left: 150px; font-size: 13px;">by A.J. Dehn</span><br/><br/>
	<input type="text" placeholder="Type to search.." onkeyup="search(this.value)" id="text" >
	<div id="search">
	</div>
</div>

			<br />
			<a href="/series/DropSearch/uploadForm.php?varname=<?php echo $var_result ?>">Link to upload page</a>
			<br />
			<!-- <a href="/series/DropSearch/download.php?varname=<?php echo $var_result ?>">Link to search page</a> -->
			<a href="/series/DropSearch/">Link to search page</a>


<div class="copyright" style="text-align: center"
	&copy; 2017 FindYourTest.com, All rights reserved.
</div>

<br />

</center>

</BODY>
</HTML>
