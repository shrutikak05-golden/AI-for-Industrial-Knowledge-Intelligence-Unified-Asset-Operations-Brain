<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

include("../config/db.php");

if (!isset($_GET['id'])) {
    die("Invalid Request!");
}

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM documents
        WHERE id='$id'
        AND user_id='$user_id'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    die("Document Not Found!");
}

$row = mysqli_fetch_assoc($result);

$file = $row['file_path'];

if (file_exists($file)) {

    unlink($file);

}

$delete = "DELETE FROM documents
           WHERE id='$id'
           AND user_id='$user_id'";

if (mysqli_query($conn, $delete)) {

    header("Location: ../documents.php");
    exit();

} else {

    echo "Failed to delete document!";

}

?>