<?php
	
	require_once 'conn.php';
	
	if(ISSET($_REQUEST['mem_id'])){
		$mem_id = $_REQUEST['mem_id'];
		$query=mysqli_query($conn, "SELECT * FROM `member` WHERE `mem_id` = '$mem_id'") or die(mysqli_error());
		$fetch=mysqli_fetch_array($query);
		
		mysqli_query($conn, "INSERT INTO `trash` (`mem_id`, `firstname`, `lastname`, `age`, `address`) VALUES ('$fetch[mem_id]', '$fetch[firstname]', '$fetch[lastname]', '$fetch[age]', '$fetch[address]')") or die(mysqli_error());
		mysqli_query($conn, "DELETE FROM `member` WHERE `mem_id` = '$mem_id'") or die(mysqli_error());
		header('location:index.php');
	}
	
?>