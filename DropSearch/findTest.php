<!-- findTest.php

This file will to display and search all tests in the database.

Version: 12/4/2017
Author: A.J. Dehn

Goal functionality:
1) Display full database of tests
2) Be able to open link of tests by clicking on it - 12-9-2017
3) Be able to search for files with contents containing a certain word
4) Create a search algorithm to search and rate tests
5) Be able to add and remove filters from the search (Ex: Subject, Professor)
6) Create a small display preview if applicable
7) Have a rating's system to view files
8) Be able to read .docx, .pdf files

-->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<HTML>
<HEAD>
<TITLE>OpenBook</TITLE>
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
		</tr>
		</table>

		<table border="0" cellpadding="6" cellspacing="0" width="100%" bgcolor="#506484">
	 	<tr>

	  		<td align="center" valign="top" class="top_nav">

				<font color="#f4d442"></font>&nbsp;<a href="/series/DropSearch/" class="top_nav">Home</a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				
				<!--  changed here -->
				<font color="#666666"></font>&nbsp;<a href="/series/DropSearch/multiupload.php?varname=" class="top_nav">Upload</a>
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
	
			<div style="text-align: center; width: 500px; margin: 0 auto;">
				<h1> KEYWORD SEARCH </h1>
				<span style="font-family: tahoma, sans-serif, arial; margin-left: 150px; font-size: 13px;">by A.J. Dehn</span><br/><br/>
				<!-- input type="text" placeholder="Type to search.." onkeyup="search(this.value)" id="text" -->
				<div id="search">
					<form action="findTest.php" method="post">
						Keyword Search: <input type="text" name="keySearch"><br />
						<input type="submit">
					</form>
				</div>
			</div>

		<br />
			
<?php
			include "testSearch.php";
			//Call the search function
			search();			
			
?>
			
<div class="copyright" style="text-align: center">
	&copy; 2016 noisyCards.com, All rights reserved.
</div>

<br />


</BODY>
</HTML>
