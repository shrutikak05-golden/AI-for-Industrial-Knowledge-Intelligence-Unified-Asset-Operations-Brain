<?php
session_start();

include("../config/db.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

// Get form data
$organization = mysqli_real_escape_string($conn, $_POST['organization']);
$role = mysqli_real_escape_string($conn, $_POST['role']);

$user_id = $_SESSION['user_id'];

// Update user profile
$sql = "UPDATE users
        SET organization='$organization',
            role='$role'
        WHERE id='$user_id'";

if (mysqli_query($conn, $sql)) {

    header("Location: ../dashboard.php");
    exit();

} else {

    echo "Error: " . mysqli_error($conn);

}

mysqli_close($conn);
?>