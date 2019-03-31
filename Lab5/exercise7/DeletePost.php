<?php
 error_reporting(E_ALL);
 ini_set("display_errors", 1);

 $mysqli = new mysqli("mysql.eecs.ku.edu", "k579l290", "Xooxohs9", "k579l290");

 /* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

if (isset($_POST['remove'])) {
	foreach($_POST['remove'] as $currentpost){
	 echo "Removed: " . "<br>";
	 echo $currentpost . "<br>";
	 $delete = "DELETE FROM Posts WHERE post_id='$currentpost'";
	 $posts = $mysqli->query($delete);
	 echo "<br>";
	}
}
else {
  echo "Nothing selected, nothing deleted";
}
$mysqli->close();
?>
