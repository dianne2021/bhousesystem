<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$age = $_POST['age'];
		$address = $_POST['address'];
		
		mysqli_query($conn, "INSERT INTO `member` (`firstname`, `lastname`, `age`, `address`) VALUES ('$firstname', '$lastname', '$age', '$address')") or die(mysqli_error());

		
		header("location: index.php");
	}
?>