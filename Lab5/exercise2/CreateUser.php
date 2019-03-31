
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

if ($user == "") {
	echo "Username cannot be empty.";
}

else {
	$query = "INSERT INTO Users (user_id) VALUES ('$user')";
	if ($mysqli->query($query)) {
		echo "User created";
	}
	else {
		echo "User already exists";
	}
}

/* close connection */
$mysqli->close();
?>