<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<a class="navbar-brand" href="https://sourcecodester.com">Sourcecodester</a>
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - Simple Restore Deleted Data</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<a href="index.php" class="pull-right">Go to main page</a>
		<br /><br />
		<div class="alert alert-danger">TRASH BIN</div>
		<table class="table table-bordered">
			<thead class="alert-info">
				<tr>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Age</th>
					<th>Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody style="background-color:#fff;">
				<?php
					require 'conn.php';
					
					$query = mysqli_query($conn, "SELECT * FROM `trash`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
				<tr>
					<td><?php echo $fetch['firstname']?></td>
					<td><?php echo $fetch['lastname']?></td>
					<td><?php echo $fetch['age']?></td>
					<td><?php echo $fetch['address']?></td>
					<td><a class="btn btn-success" href="restore.php?trash_id=<?php echo $fetch['mem_id']?>"><span class="glyphicon glyphicon-reset"></span> Restore</a></td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
</body>	
</html>