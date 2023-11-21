<?php
	$conn = mysqli_connect("localhost", "root", "", "b_house");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
?>