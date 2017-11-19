<?php
if (isset($_POST['submit'])) {
    $j = 0; //Variable for indexing uploaded image 
    $allPics = "combinedPic.pdf";
	$target_path = "universities/2057db/"; //Declaring Path for uploaded images
    for ($i = 0; $i < count($_FILES['file']['name']); $i++) { //loop to get individual element from the array

        $validextensions = array("jpeg", "jpg", "png", ".pdf");  //Extensions which are allowed
        $ext = explode('.', basename($_FILES['file']['name'][$i]));//explode file name from dot(.) 
        $file_extension = end($ext); //store extensions in the variable
        
		$target_path = $target_path . md5(uniqid()) . "." . $ext[count($ext) - 1];//set the target path with a new name of image
        $j = $j + 1;//increment the number of uploaded images according to the files in array       
      
	  if (($_FILES["file"]["size"][$i] < 10000000000) //Approx. 100kb files can be uploaded.
                && in_array($file_extension, $validextensions)) {
		  		//  move_uploaded_file($file_tmp,"universities/2057db/".$file_name);
            //if (move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {//if file moved to uploads folder -- working code
		  if($i>0) {
				//$images = array("file1.jpg", "file2.jpg");


	
			  		$prev = $i-1;
			  		$prevFile = $_FILES['file']['tmp_name'][$i];
			  		$nextFile = $_FILES['file']['tmp_name'][$prev];
			  		$images = array($nextFile, $prevFile);
			  
			  
			  		$pdf = new Imagick($images);
					$pdf->setImageFormat('pdf');
					$pdf->writeImages('combined.pdf', true);
			$cmd = "convert $prevFile $nextFile bitchAssPussies.pdf";
			
			  $cmd = "$target_path mkdir bitchAss";
			  
			  echo $cmd;
			 exec($cmd);
			  move_uploaded_file("bitchAssPussies.pdf" ,$target_path);
				//exec("convert myCombinedPic.pdf' $_FILES['file']['tmp_name'][$i]");
		  }
		  if (move_uploaded_file($_FILES['file']['tmp_name'][$i],$target_path)) {
                echo $j. ').<span id="noerror">Image uploaded successfully!.</span><br/><br/>';
            } else {//if file was not moved.
                echo $j. ').<span id="error">please try again!.</span><br/><br/>';
            }
        } else {//if file size and file type was incorrect.
            echo $j. ').<span id="error">***Invalid file Size or Type***</span><br/><br/>';
        }
    }
	//move_uploaded_file($allPics ,$target_path);
}

?>