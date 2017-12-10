<!-- testSearch.php

This file will be used to communicate with findTest.php taking in keywords and displaying output

Version: 12/4/2017
Author: A.J. Dehn

Goal functionality:
1) Display school that the user is uploading to
2) Eventually don't need to select all values for retval. This will slow search because there is no need to retrieve contents

-->

<?php
		session_start();
		$conn = mysql_connect("127.0.0.1", "root", "@llballa2!");
		mysql_select_db("test");	


		function search(){
			// Set a default value for results
			$results = "dummy2";
			// If key word has been set
			if (isset($_POST['keySearch']))
			{
				global $conn;
				$keyWord = $_POST['keySearch'];

				echo $keyWord."<- Keyword <br/>";

				$keyWord = mysql_real_escape_string($keyWord);
				$sql = "SELECT tLink, sName, title, profName FROM `testDetails` WHERE contents LIKE '%$keyWord%'";

				
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					// Error message if unable to insert into table
					die('Could not obtain test details from table: ' . mysql_error());
				}
				

				echo "<table>"; // start a table tag in the HTML

				while($row = mysql_fetch_array($retval)){   //Creates a loop to loop through results
					
					?>
								<!-- Post the link to each file -->
					<br /><a href="/series/DropSearch/universities/<?php echo $row['sName']."/".$row['tLink']; ?>"><?php echo  $row['title']." ".$row['profName']; ?></a>
					
					<?php
				}

				echo "</table>"; //Close the table in HTML
				
				return $results;

				//mysql_close(); //Make sure to close out the database connection
			}
			else // If a keyWord hasn't been set. Show all evidence for this test
			{
				global $conn;
				$sql = "SELECT tLink, sName, title, profName FROM `testDetails`";
				$sql = mysql_real_escape_string($sql);
				echo "Made it here <br/>";
				$retval = mysql_query( $sql, $conn );
				if(! $retval )
				{
					// Error message if unable to insert into table
					die('Could not obtain test details from table: ' . mysql_error());
				}

				
					while($row = mysql_fetch_array($retval)){   //Creates a loop to loop through results
					
					?>
								<!-- Post the link to each file -->
					<br /><a href="/series/DropSearch/universities/<?php echo $row['sName']."/".$row['tLink']; ?>"><?php echo  $row['title']." ".$row['profName']; ?></a>
					
					<?php
				}
				
				return $results;
			}
			return $results;
		}											  

?>