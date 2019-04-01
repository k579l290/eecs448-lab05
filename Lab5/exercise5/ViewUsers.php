
<?php
 error_reporting(E_ALL);
 ini_set("display_errors", 1);

 $mysqli = new mysqli("mysql.eecs.ku.edu", "k579l290", "Xooxohs9", "k579l290");

 /* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}


$result = $mysqli->query("SELECT * FROM Users");

echo '<style>
  table, th, td, tr {
    border: 1px solid black
  }
</style>';
if($result->num_rows > 0) {
  echo '<table>';
  echo "<tr><th>Users</th></tr>";
	while($row = $result->fetch_assoc()) {
	  echo "<tr><td>".$row['user_id']."</td></tr>";
	}
  echo '</table>';
}
else {
	echo "no users";
}

  $mysqli->close();
?>
