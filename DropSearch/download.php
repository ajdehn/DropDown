

<?php

mysql_connect("127.0.0.1", "root", "@llballa2!");

mysql_select_db("test");

if(isset($_GET['id'])) { // if id is set then get the file with the id from database

$id = $_GET['id'];

	
$query = "SELECT name, type, size, content FROM search WHERE dbName = $id";

$result = mysql_query($query) or die('Error, query failed');

list($name, $type, $size, $content) =

mysql_fetch_array($result);

header("Content-length: $size");

header("Content-type: $type");

header("Content-Disposition: attachment; filename=$name");

echo $content; exit;

}

?>

Download File From MySQL
<br />

<?php
session_start();
//On page 2
$var_db = $_SESSION['dbName'];
$var_sName = $_SESSION['schoolName'];

$var_value = $_GET['varname'];
$_SESSION['dbName'] = $var_db;
$_SESSION['schoolName'] = $var_sName;
?>
<p> <?php $var_value ?></p>

<?php
	
echo $var_value;
echo $var__db;
echo $var_sName;

$query = "SELECT ID, searchTitle FROM search where ID = $var_value";

$result = mysql_query($query) or die('Error, query failed');

if(mysql_num_rows($result) == 0)

{

echo "Database is empty";

}

else

{

//while(list($id, $name) = mysql_fetch_array($result))
while(list($id, $name) = mysql_fetch_array($result))
{

?>

<br /><a href="download.php?id=<?php echo $id;?>"><?php echo $name; ?></a>

<?php

}

}

?>
<br />
<a href="upload.php">Link to upload page</a>
<br />
<a href="download.php">Link to search page</a>
