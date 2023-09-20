<?php
include_once "connection.php";
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user WHERE email='$email'";

$result = $conn->query($sql);

if ($result && $result->num_rows === 1) {
    $row = $result->fetch_assoc();

    $isPasswordMatch = $row['pwd'] === $pwd;
    $isAdmin = $row['is_admin'] == 1;
    $isVerified = $row['verify_status'] == 1; 

    if ($isPasswordMatch && $isVerified) {
        $_SESSION['user_id'] = $row['user_id'];

        if ($isAdmin) {
            header("location: admin/index.php");
        } else {
            echo "<script>alert('You are logged in');</script>";
            header("location: after.php");
        }
    } elseif (!$isVerified) {
        echo "Your email is not yet verified. Please check your email for verification instructions.";
    } else {
        echo "Invalid Email or Password";
    }
} else {
    header("location: view_admission.php");
}

$conn->close();
?>
