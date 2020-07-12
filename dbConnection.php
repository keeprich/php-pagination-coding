<?php
	$servername = "localhost";
	$username = "keeprich";
	$password = "keeprich";
	$database = "phpsamples";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $database);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
?>