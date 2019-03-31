<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

$mysqli = new mysqli("mysql.eecs.ku.edu", "k579l290", "Xooxohs9", "k579l290");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

$user=$_POST['user'];
$post=$_POST['Post'];


if ($user == "") {
	echo "Username cannot be empty.";
}
elseif ($post == "") {
	echo "Post cannot be empty.";
}


else {
	$query = "SELECT user_id FROM Users WHERE user_id = '$user'";
	$result = $mysqli->query($query);
  $size = $result->num_rows;
	if ($size > 0) {
		$insert = "INSERT INTO Posts (content, author_id) VALUES ('$post', '$user')";
		$mysqli->query($insert);
		echo "Post successfully added";
	}
	else {
		echo "Username not found";
	}
}

/* close connection */
$mysqli->close();
?>
