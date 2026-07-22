<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

include("../config/db.php");

$user_id = $_SESSION['user_id'];

$name = mysqli_real_escape_string($conn, $_POST['name']);
$role = mysqli_real_escape_string($conn, $_POST['role']);
$organization = mysqli_real_escape_string($conn, $_POST['organization']);

$sql = "UPDATE users
        SET
        name='$name',
        role='$role',
        organization='$organization'
        WHERE id='$user_id'";

if(mysqli_query($conn, $sql)){
    header("Location: ../settings.php?updated=1");
}else{
    echo "Failed to update profile.";
}
?>