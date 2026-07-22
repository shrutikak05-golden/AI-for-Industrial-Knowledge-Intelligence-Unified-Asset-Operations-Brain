<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

include("../config/db.php");

$user_id = $_SESSION['user_id'];

if (isset($_FILES['document'])) {

$fileName = $_FILES['document']['name'];
$tmpName  = $_FILES['document']['tmp_name'];
$fileSize = $_FILES['document']['size'];
$fileType = $_FILES['document']['type'];

    $uploadFolder = "../uploads/";
    $filePath = $uploadFolder . basename($fileName);

        if (move_uploaded_file($tmpName, $filePath)) {

$sql = "INSERT INTO documents
(user_id,file_name,file_path,file_size,file_type)
VALUES
('$user_id','$fileName','$filePath','$fileSize','$fileType')";

        if (mysqli_query($conn, $sql)) {

            header("Location: ../documents.php");
            exit();

        } else {

            echo "Database Error!";

        }

    } else {

        echo "File Upload Failed!";

    }

} else {

    echo "No File Selected!";

}
?>