<?php
require_once 'conn.php';

if (isset($_REQUEST['trash_id'])) {
    $trash_id = $_REQUEST['trash_id'];

    $query = mysqli_query($conn, "SELECT * FROM `trash` WHERE `trash_id` = '$trash_id'") or die(mysqli_error());
    $fetch = mysqli_fetch_array($query);

    // Assuming mem_id is an auto-incremented primary key, you don't need to specify a value for it.
    mysqli_query($conn, "INSERT INTO `member` (`firstname`, `lastname`, `age`, `address`) VALUES ('$fetch[firstname]', '$fetch[lastname]', '$fetch[age]', '$fetch[address]')") or die(mysqli_error());
    mysqli_query($conn, "DELETE FROM `trash` WHERE `trash_id` = '$trash_id'") or die(mysqli_error());
    header('location:index.php');
}
?>
