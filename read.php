<?php
include('conn.php');

// Check if mem_id is set in the URL
if (isset($_GET['mem_id'])) {
    $mem_id = $_GET['mem_id'];

    $query = mysqli_query($conn, "SELECT * FROM `member` WHERE mem_id = $mem_id") or die(mysqli_error());
    $member = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1> User View</h1>
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <p class="form-control-static"><?= $member['firstname'] ?></p>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <p class="form-control-static"><?= $member['lastname'] ?></p>
                    </div>
                    <div class="form-group">
                        <label>Age</label>
                        <p class="form-control-static"><?= $member['age'] ?></p>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <p class="form-control-static"><?= $member['address'] ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
<?php
} else {
    // Handle the case where mem_id is not set, redirect or show an error message as needed
    echo "Error: mem_id not set.";
}
?>
