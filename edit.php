<?php
	require_once 'conn.php';

	if (isset($_POST['save'])) {
		$id = $_POST['id']; // Assuming there is an 'id' field in your form
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$age = $_POST['age'];
		$address = $_POST['address'];

		mysqli_query($conn, "UPDATE member SET firstname='$firstname', lastname='$lastname', age='$age', address='$address' WHERE userid='$id'") or die(mysqli_error());

		header("location: index.php");
	}
?>
