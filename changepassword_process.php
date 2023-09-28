<?php

session_start();

include_once "connection.php";



if(isset($_POST['update_password'])){
    // $email = mysqli_escape_string($conn, $_POST['email']);
    $new_password = mysqli_escape_string($conn, $_POST['newpwd']);
    $confirm_password = mysqli_escape_string($conn, $_POST['confirmpwd']);
    $token = mysqli_escape_string($conn, $_POST['password_token']);
        // var_dump($token);
//ALL GOODS
    if(!empty($token)){
        if(!empty($token) && !empty($new_password) && !empty($confirm_password)){

                $check_token = "SELECT verify_token FROM user WHERE verify_token='$token' LIMIT 1";
                $check_token_run = mysqli_query($conn,$check_token);
                // var_dump($token);
                // var_dump($_GET['token']);
                if(mysqli_num_rows($check_token_run) > 0){
                                if($new_password == $confirm_password){
                                        $update_password = "UPDATE user SET pwd='$new_password' WHERE verify_token='$token' LIMIT 1";
                                        $update_password_run = mysqli_query($conn, $update_password);

                                        if($update_password_run){
                                            $new_token = md5(rand());
                                            $update_token = "UPDATE user SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                                            $update_token_run = mysqli_query($conn, $update_token);
    
                                            $_SESSION['status'] = "<h2>New Password successfully updated!</h2>";
                                            header("location: password_successpage.php");
                                            exit(0);
                                        }else{
                                            $_SESSION['status'] = "<h2>Update password error</h2>";
                                            header("location: changepassword_page.php?token=$token&email=$email");
                                            exit(0);
                                        }
                                }else{
                                    $_SESSION['status'] = "<h2>New password and confirm password does not match</h2>";
                                    header("location: changepassword_page.php?token=$token&email=$email");
                                    exit(0);
                                }
                }else {
                    $_SESSION['status'] = "Invalid token";
                    header("location: changepassword_page.php?token=$token&email=$email");
                    exit(0);
                }

        }else{
                $_SESSION['status'] = "All fields are required to fill";
                    header("location: changepassword_page.php?token=$token&email=$email");
                    exit(0);

                    }
    }else{
        $_SESSION['status'] = "No token available";
        header("location: changepassword_page.php");
        exit(0);

    }
    
}






?>