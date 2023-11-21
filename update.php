<?php
include('conn.php');

// Check if the mem_id parameter is set
if (isset($_GET['mem_id'])) {
    $mem_id = $_GET['mem_id'];

    // Fetch the member details for the given mem_id
    $query = mysqli_query($conn, "SELECT * FROM `member` WHERE mem_id = $mem_id") or die(mysqli_error());
    $member = mysqli_fetch_assoc($query);

    // Check if the form is submitted for updating
    if (isset($_POST['update'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $age = $_POST['age'];
        $address = $_POST['address'];

        // Update the member details in the database
        $update_query = "UPDATE `member` SET firstname = '$firstname', lastname = '$lastname', age = '$age', address = '$address' WHERE mem_id = $mem_id";
        mysqli_query($conn, $update_query) or die(mysqli_error($conn));

        // Redirect to the main page after updating
        header("Location: index.php");
        exit();
    }
} else {
    // Redirect to the main page if mem_id is not set
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
</head>
<body>
    <div class="col-md-3"></div>
    <div class="col-md-6 well">
        <h3 class="text-primary">Update Member</h3>
        <hr style="border-top:1px dotted #ccc;"/>
        <form method="POST" action="update.php?mem_id=<?php echo $mem_id; ?>">
            <div class="form-group">
                <label>Firstname</label>
                <input type="text" name="firstname" class="form-control" value="<?php echo $member['firstname']; ?>" required="required"/>
            </div>
            <div class="form-group">
                <label>Lastname</label>
                <input type="text" name="lastname" class="form-control" value="<?php echo $member['lastname']; ?>" required="required"/>
            </div>
            <div class="form-group">
                <label>Age</label>
                <input type="number" min="1" name="age" class="form-control" value="<?php echo $member['age']; ?>" required="required" />
            </div>
            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="<?php echo $member['address']; ?>" required="required" />
            </div>
            <div class="form-group">
                <button type="submit" name="update" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Update</button>
                <a href="index.php" class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span> Cancel</a>
            </div>
        </form>
    </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
