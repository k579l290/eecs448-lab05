<?php
 error_reporting(E_ALL);
 ini_set("display_errors", 1);

 $mysqli = new mysqli("mysql.eecs.ku.edu", "k579l290", "Xooxohs9", "k579l290");

 /* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$users = $_POST['users'];
$posts = $mysqli->query("SELECT * FROM Posts WHERE author_id= '$users'");
if (($posts->num_rows) == 0) {
	echo "User has not made any posts";
}

else {
  echo 'User: '.$users.'<br>';
	echo '<table><tr>';
	echo '<td><b>Post_ID</b></td>';
	echo '<td><b>Posts</b></td></tr>';
	while ($row = $posts->fetch_assoc())
	{
	  echo '<tr><td>'.$row['post_id'].'</td>';
	  echo '<td>'.$row['content'].'</td></tr>';
	}
	echo '</table>';
}
$mysqli->close();
?>
