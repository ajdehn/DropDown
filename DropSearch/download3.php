<?php
session_start();
//On page 2

//$var_db = $_SESSION['dbName'];
//$var_sName = $_SESSION['schoolName'];

$dbValue = $_GET['varname'];
$dbValue = substr($dbValue, 1, strlen($dbValue)-2);
//echo dbValue;

mysql_connect("127.0.0.1", "root", "@llballa2!");
mysql_select_db("test");

	
	$sql = "SELECT * FROM `search` WHERE id LIKE '%$dbValue%'";
	$result = mysql_query($sql);
	$row = mysql_fetch_array($result);
	$dbName = $row['ID'];
	$title = $row['Searchtitle'];
	$var_sName = $row['ID'];
	//$_SESSION['dbName'] = $var_db;
	//$_SESSION['schoolName'] = $var_sName;
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>OpenBook</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<meta http-equiv="Content-Style-Type" content="text/css">
<META http-equiv=Cache-Control content=no-cache>
<META http-equiv=Pragma content=no-cache>
<META name="Expires" content="Fri, 01 Jan 1990 00:00:00 GMT">
<META NAME="Description" CONTENT="Anonymously send a package of poop to your friends or enemies. The ultimate gag gift. Sweet revenge at its finest.">
<META NAME="Keywords" CONTENT="poop, gag gift, real poop, poop in mail, mail poop, poop package, poop senders, crap, dung, feces, excrement, poop present">
<link rel="stylesheet" href="/inc/templates/style.css" type="text/css">
<link rel="shortcut icon" HREF="/images/site/favicon.ico">
</head>
<BODY link="#0000FF" vlink="#0000FF" alink="#FF0000" bgcolor="#4f4f51" topmargin="25">

<script type="text/javascript" src="/inc/templates/wz_tooltip.js"></script>
<Script Language = "JavaScript" Type="Text/JavaScript">
	
</script>
<center>
<!-- Checks the inner column-->
<table border="0" cellpadding="0" cellspacing="0" width="80%" bgcolor="#FFFFFF">
<tr>
	<td align="left" valign="top" width="770">	

		<table border="0" cellpadding="0" cellspacing="0" width="100%">
	 	<tr>
	  		<td align="left" valign="top" width=""><a href="/"><img src="/series/DropSearch/images/cheating.jpg" border="0" width="100%" height="145" alt=" poop senders" title=" poop senders"></a></td>
	  		<!-- <td align="right" valign="top" width=""><a href="https://www.facebook.com/SendersofPoop" target="_NEW"><img src="/series/SendAPoop/images/site/poop.jpg" border="0" width="376" height="145" alt="cow's ass" title="cow's ass"></a></td> -->
		</tr>
		</table>

		<table border="0" cellpadding="6" cellspacing="0" width="100%" bgcolor="#506484">
	 	<tr>

	  		<td align="center" valign="top" class="top_nav">

				<font color="#f4d442"></font>&nbsp;<a href="/series/DropSearch/" class="top_nav">Home</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				
				<!--  changed here -->
				<font color="#666666"></font>&nbsp;<a href="/series/DropSearch/multiupload.php?varname=<?php echo $dbValue ?>" class="top_nav">Upload <?php echo $dbValue ?></a>
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
	

		
			<?php
	$var_value = $_GET['varname'];

$var_value = substr($var_value, 1, strlen($var_value)-2);
echo $title;
			   

$var_result = $var_value . "db";

$testCount = 0;

if ($handle = opendir("/opt/lampp/htdocs/series/DropSearch/universities/$var_result")) {

    while (false !== ($entry = readdir($handle))) {

        if ($entry != "." && $entry != "..") {
			$testCount++;
         ?>   
			<br /><a href="/series/DropSearch/universities/<?php echo $var_result ?>/<?php echo $entry ?>"><?php echo $entry; ?></a>
<?php
        }
    }
	?>
		<br />
			<?php
	if($testCount==0)
	{
		echo "Be the first to upload to this university. Click the upload button to upload the first test.";
	}
	closedir($handle);
}

?>
<div class="copyright" style="text-align: center">
	&copy; 2016 noisyCards.com, All rights reserved.
</div>

<br />


</BODY>
</HTML>
