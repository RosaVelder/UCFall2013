<?php
function connect() {
	// Establishes a connection with MySQL Server
	$con=mysqli_connect("localhost","webtech13","ipv6*ipv4","webtech13_database");

	// Checks the connection
	if (mysqli_connect_errno($con)){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	} else {
		echo "We connected properly!\n";
	}
	return $con;
}

function disconnect($con){
	mysqli_close($con);
}
?>
