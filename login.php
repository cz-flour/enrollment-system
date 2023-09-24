<?php
include_once "connection.php";
session_start();


if(isset($_POST['email'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    $sql = "SELECT email, pwd, is_admin, verify_status, user_id FROM user WHERE email='$email'";
    
    $sql_run = mysqli_query($conn, $sql);

    if ($sql_run) {
        if (mysqli_num_rows($sql_run) > 0) {
            $row = mysqli_fetch_assoc($sql_run);
    

            $dbPassword = $row['pwd'];

            $isPasswordMatch = $dbPassword === $pwd;
            $isAdmin = $row['is_admin'] == 1;
            $isVerified = $row['verify_status'] == 1; 
    
            if ($isPasswordMatch && $isVerified) {
                $_SESSION['user_id'] = $row['user_id'];
    
                if ($isAdmin) {
                    header("location: admin/index.php");
                } else {
                    echo "<script>alert('You are logged in');</script>";
                    header("location: view_admission.php");
                }
            } elseif (!$isVerified) {
                echo "<h4>Your email is not yet verified. Please check your email for verification instructions.</h4>";
                header("location: not_verified.php");
                
            } else {
                echo "Invalid Email or Password";
                header("location: home.php");
            }
        } else {
            echo "Email not found in the database"; 
        }
    } else {
        echo "Error in executing the SQL query: " . mysqli_error($conn); 
    }
}

$conn->close();
?>