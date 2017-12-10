<!-- uploadForSearch.php

This file will be used to upload the test as well as creating adding the test database details.

Version: 12/4/2017
Author: A.J. Dehn

Goal functionality:
1) Save history of searches that were completed by users
2) Use Tesseract OCR to attempt to OCR the tests
3) Combine multiple images
4) Close connection

-->

<?php
if (isset($_POST['submit'])) {
	// Connection to the database
	$conn = mysql_connect("127.0.0.1", "root", "@llballa2!");
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	mysql_select_db( 'test' );
	
    $j = 0; //Variable for indexing uploaded image 
	$target_path = "universities/2057db/"; //Declaring Path for uploaded images
	
	/** 
	Code to insert the test details to the database
		
	@tLink - link to the test from MD5 random link
	@pointer - pointer to the first image. Only used if the file is an image
	@sName - schoolName that is hidden in the db version (ex SJU = 2057db)
	@profName - Name of Professor who assigned the test
	@subject - Subject of the class of the test
	@title - Title or short description of the test
	@rating - Rating of test to be modified for popular tests or to remove unpopular ones
	@contents - Detailed contents of the test
	*/
	
	$rating = 0;
	$pointer = "Pointer";
	$sName = $_POST['sName'];
	$profName = $_POST['profName'];
	$subject = $_POST['subject'];
	$title = $_POST['title'];
	// Default contents
	$contents = "hello world";
	
	
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) { //loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png", "pdf", "docx", "xlsx", "txt");  //Extensions which are allowed
		$photoExt = array("jpeg", "jpg", "png", "pdf", "xlsx"); // Extensions that we don't want to handle the contents of yet.
        $ext = explode('.', basename($_FILES['file']['name'][$i])); //explode file name from dot(.) 
        $file_extension = end($ext); //store extensions in the variable
		//set the target path with a new name of image
		$tLink = md5(uniqid()). "." . $ext[count($ext) - 1];
		$sName = mysql_real_escape_string($sName);
        $target_path = "universities/".$sName."/".$tLink;
		
        $j = $j + 1;//increment the number of uploaded images according to the files in array       
      
	  if (($_FILES["file"]["size"][$i] < 10000000000) //Approx. 100kb files can be uploaded.
                && in_array($file_extension, $validextensions)) {
		 
		  if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {
			  
                echo $j. ').<span id="noerror">File uploaded successfully!.</span><br/><br/>';
			  		

			  		// Obtain the contents. If image display as null for now.
			  		if( in_array($file_extension, $photoExt))
					{
						// Eventually used to dump contents of the difficult files
						
					} else if ($file_extension = "txt")
					{
						// Spit out contents of the file
						$contents = file_get_contents($target_path, true);
			  
					} else if ($file_extension = "doc")
					{
						// Spit out contents of the file
						$contents = read_doc();
					}
			  		else if ($file_extension = "docx")
					{
						// Spit out contents of the file
						$contents = read_docx();
					}
			  
				// Clean up strings
				$tLink = mysql_real_escape_string($tLink);
			  	$pointer = mysql_real_escape_string($pointer);
			  	$profName = mysql_real_escape_string($profName);
			  	$subject = mysql_real_escape_string($subject);
			  	$title = mysql_real_escape_string($title);
			  	$contents = mysql_real_escape_string($contents);
			  		
			  	echo $tLink . "<br /><br />";
			  		// If the file uploaded successfully it is time to insert the record into 
			  		$query = "INSERT INTO `testDetails` (tLink, pointer, sName, profName, subject, title, rating, contents)".
					"VALUES ('$tLink', '$pointer', '$sName', '$profName', '$subject', '$title', '$rating', '$contents')";


					$retval = mysql_query( $query, $conn );
					if(! $retval )
					{
						// Error message if unable to insert into table
						die('Could not insert test details into table: ' . mysql_error());
					}
		}
		else { //if file was not moved.
                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            }
					   
        } 
		else {//if file size and file type was incorrect.
            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
	}
	
	/**
		Function to read from .doc file
	*/
	function read_doc() {
		$fileHandle = fopen($this->filename, "r");
		$line = @fread($fileHandle, filesize($this->filename));   
		$lines = explode(chr(0x0D),$line);
		$outtext = "";
		foreach($lines as $thisline)
		  {
			$pos = strpos($thisline, chr(0x00));
			if (($pos !== FALSE)||(strlen($thisline)==0))
			  {
			  } else {
				$outtext .= $thisline." ";
			  }
		  }
		 $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$outtext);
		return $outtext;
	}
	/**
		Function to read from .docx file
	*/
	function read_docx(){
        $striped_content = '';
        $content = '';
        $zip = zip_open($this->filename);

        if (!$zip || is_numeric($zip)) return false;

        while ($zip_entry = zip_read($zip)) {

            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

            if (zip_entry_name($zip_entry) != "word/document.xml") continue;

            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

            zip_entry_close($zip_entry);
        }// end while

        zip_close($zip);

        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);

        return $striped_content;
    }
}

?>