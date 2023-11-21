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
		<h3 class="text-primary">BOARDING HOUSE SYSTEM</h3>
		<hr style="border-top:1px dotted #ccc;"/>
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add member</button>
		<a href="trash.php" class="pull-right"><span class="glyphicon glyphicon-trash"></span> Trash Bin</a>
		<br /><br />
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
					
					$query = mysqli_query($conn, "SELECT * FROM `member`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
				<tr>
					<td><?php echo $fetch['firstname']?></td>
					<td><?php echo $fetch['lastname']?></td>
					<td><?php echo $fetch['age']?></td>
					<td><?php echo $fetch['address']?></td>
					<td>
						<a class="btn btn-warning" href="read.php?mem_id=<?php echo $fetch['mem_id']?>"><span class="glyphicon glyphicon-read"></span> Read</a>
						<a class="btn btn-warning" href="update.php?mem_id=<?php echo $fetch['mem_id']?>"><span class="glyphicon glyphicon-update"></span> Update</a>
						<a class="btn btn-danger" href="remove.php?mem_id=<?php echo $fetch['mem_id']?>"><span class="glyphicon glyphicon-remove"></span> Delete</a>
					</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="save_member.php">
					<div class="modal-header">
						<h3 class="modal-title">Add Member</h3>
					</div>
					<div class="modal-body">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="form-group">
								<label>Firstname</label>
								<input type="text" name="firstname" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Lastname</label>
								<input type="text" name="lastname" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Age</label>
								<input type="number" min="1" name="age" class="form-control" required="required" />
							</div>
							<div class="form-group">
								<label>Address</label>
								<input type="text" name="address" class="form-control" required="required" />
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
                        <button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
    <a href="#edit<?php echo $row['userid']; ?>" data-toggle="modal" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Edit</a>
					</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<script src="js/jquery-3.2.1.min.js"></script>	
<script src="js/bootstrap.js"></script>	
</body>	
</html>