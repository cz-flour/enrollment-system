<?php

session_start();
include_once "connection.php";


//checks if value of name="email_add" is set
if(isset($_POST['email'])) {

    //transfers value of name="" from form to variable
    //$r_username = $_POST['reg_username'];

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // the user already exists, so do not insert a new record
        $msg="User already exists.";
    } else {
        // insert the new user record into the users table
        $sql = "INSERT INTO user (email, pwd) VALUES ('$email', '$pwd')";
        if (mysqli_query($conn, $sql)) {
            $msg="New user record inserted successfully. Please log in your account";
        } else {
            $msg="Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    header("location:home.php?register&msg=$msg");
}


?>