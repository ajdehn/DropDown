



<?php
		session_start();

mysql_connect("127.0.0.1", "root", "@llballa2!");
mysql_select_db("test");

if(isset($_GET['s']) && $_GET['s'] != ''){
	$s = $_GET['s'];
	// Eliminate characters in s
	$s = str_replace("'", "", $s);
	
	$sql = "SELECT * FROM `search` WHERE Searchtitle LIKE '%$s%'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result)){
		$url = $row['Searchlink'];
		$dbName = $row['ID'];
		
		$url2 = "http://" . $url;
		$title = $row['Searchtitle'];
		//Below links to university website
		//echo "<div style='' id='searchtitle'>" . "<a style='font-family: verdana; text-decoration: none; color: black;' href='$url2'>" . $title . "</a>" . "</div>";
		
		//echo "<div style='' id='searchtitle'>" . "<a style='font-family: verdana; text-decoration: none; color: black;' href='download.php'>" . $title . "</a>" . "</div>";
		
		echo "<div style='' id='searchtitle'>" . "<a style='font-family: verdana; text-decoration: none; color: black;' href=download3.php?varname='" . $dbName  ."'>"
			. $title . "</a>" . "</div>";
			
		// Getting an error because this is the last one assigned.
		$_SESSION['dbName'] = $dbName;
		$_SESSION['schoolName'] = $title;
		
	}
	
}

?>