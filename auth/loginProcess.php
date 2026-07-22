<?php
session_start();

include("../config/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // Find user by email
    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        // Verify password
        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['organization'] = $user['organization'];
            $_SESSION['role'] = $user['role'];

            header("Location: ../dashboard.php");
            exit();

        } else {

            echo "<script>
                    alert('Incorrect Password!');
                    window.location='../login.php';
                  </script>";
        }

    } else {

        echo "<script>
                alert('Email not found!');
                window.location='../login.php';
              </script>";
    }
}

mysqli_close($conn);
?>