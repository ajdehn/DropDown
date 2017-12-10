<!-- multiupload.php

This file will be used to communicate with upload.php and obtain the files from the end user.

Version: 12/4/2017
Author: A.J. Dehn

Goal functionality:
1) Display school that the user is uploading to

-->


<?php
	// Connection to the database
	$conn = mysql_connect("127.0.0.1", "root", "@llballa2!");
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
?>

<!DOCTYPE html>
<html>
    <head>
		<title>Upload Multiple Images Using jquery and PHP</title>
		<!-------Including jQuery from google------>
        <script src="jquery.js"></script>
        <script src="script.js"></script>
		
		<!-------Including CSS File------>
        <link rel="stylesheet" type="text/css" href="style.css">
    <body>
        <div id="maindiv">

            <div id="formdiv">
                <h2>Multiple Image Upload Form</h2>
                <form enctype="multipart/form-data" action="" method="post">
				<!--Code to insert the test details to the database

					@tLink - link to the test from MD5 random link
					@pointer - pointer to the first image. Only used if the file is an image
					@sName - schoolName that is hidden in the db version (ex SJU = 2057db)
					@profName - Name of Professor who assigned the test
					@subject - Subject of the class of the test
					@title - Title or short description of the test
					@contents - Detailed contents of the test -->
					
                    First Field is Compulsory. Only JPEG,PNG,JPG Type Image Uploaded. Image Size Should Be Less Than 100KB.
                    <hr/>
					<?php
						/**
						Eventually to be used for displaying school name
						
						// Connect to the database and retrieve the name from the school name
						$sql = "SELECT * FROM `search` WHERE id LIKE '%$dbValue%'";
						$result = mysql_query($sql);
						$row = mysql_fetch_array($result);
						$dbName = $row['ID'];
						$title = $row['Searchtitle'];
						$var_sName = $row['ID'];
						$dbValue = $_GET['varname'];
						$dbValue = substr($dbValue, 1, strlen($dbValue)-2);
						*/
					?>
					School: <input type="text" name="sName" value="2057db"><br />
					<br />
					Short Description of Test: <input type="text" name="title" value="CSCI 130" required=""><br />
					<br />
					Name of Professor: <input type="text" name="profName" value="John Miller" required=""><br />
					<br />
					Subject: <input type="text" name="subject" value="Computer Science" required=""><br />
					<br />
					
                    <div id="filediv"><input name="file[]" type="file" id="file"/></div><br/>
           
                    <input type="button" id="add_more" class="upload" value="Add More Files"/>
                    <input type="submit" value="Upload File" name="submit" id="upload" class="upload"/>
                </form>
                <br/>
                <br/>
				<!-------Including PHP Script here------>
                <?php include "uploadForSearch.php"; ?>
            </div>
           
		   <!-- Right side div -->

        </div>
    </body>
</html>