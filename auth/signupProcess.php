<?php
session_start();

// Database Connection
include("../config/db.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Encrypt Password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $checkEmail = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($result) > 0) {

        echo "<script>
                alert('Email already exists!');
                window.location='../signup.php';
              </script>";

    } else {

        // Insert User
        $sql = "INSERT INTO users (name, email, password)
                VALUES ('$name', '$email', '$hashedPassword')";

        if (mysqli_query($conn, $sql)) {

            // Get inserted user ID
            $user_id = mysqli_insert_id($conn);

            // Create Session
            $_SESSION['user_id'] = $user_id;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;

            // Redirect
            header("Location: ../profile-setup.php");
            exit();

        } else {

            echo "Error: " . mysqli_error($conn);

        }
    }
}

mysqli_close($conn);
?>