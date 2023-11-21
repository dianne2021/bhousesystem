<?php
include('conn.php');

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $query = mysqli_query($conn, "SELECT * FROM `member` WHERE firstname LIKE '%$search%' OR lastname LIKE '%$search%' OR age LIKE '%$search%' OR address LIKE '%$search%'") or die(mysqli_error());
    $members = mysqli_fetch_all($query, MYSQLI_ASSOC);
} else {
    $query = mysqli_query($conn, "SELECT * FROM `member`") or die(mysqli_error());
    $members = mysqli_fetch_all($query, MYSQLI_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
</head>
<body>
    <form method="POST" action="">
        <input type="text" name="search" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <!-- Your HTML code for displaying members here -->
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
            <?php foreach ($members as $member): ?>
                <tr>
                    <td><?= $member['firstname'] ?></td>
                    <td><?= $member['lastname'] ?></td>
                    <td><?= $member['age'] ?></td>
                    <td><?= $member['address'] ?></td>
                    <td>
                        <a class="btn btn-danger" href="remove.php?mem_id=<?= $member['mem_id'] ?>"><span class="glyphicon glyphicon-remove"></span> Delete</a>
                        <a class="btn btn-warning" href="edit.php?mem_id=<?= $member['mem_id'] ?>"><span class="glyphicon glyphicon-edit"></span> Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
