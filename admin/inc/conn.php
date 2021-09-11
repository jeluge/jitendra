<?php
	$conn = new mysqli("localhost", "root", "" ,"jitendra" );

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}