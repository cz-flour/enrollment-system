<?php

include_once "connection.php";
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

function send_password_reset($fetch_email, $token){
    $mail = new PHPMailer(true);

    try{
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->Username = "olrmshs@gmail.com";
    $mail->Password = "wxui xnlt bvzb vrls";

    $mail->SMTPSecure = "tls";

    $mail->Port = 587;

    $name = 'Montessori Learning Center';
    $mail->setFrom("olrmshs@gmail.com",$name);
    $mail->addAddress($fetch_email);

    $mail->isHTML(true);
    $mail->Subject = "Password reset link from Our Lady of the Roses Montessori Learning Center";

    $email_template = "
    <h2>To reset your password, please click on the link below. If you did not request a password reset, please disregard this email</h2>
    <h5>Reset your password by clicking on the link</h5>
    <br></br>
    <a href='http://localhost/enrollment-system/changepassword_page.php?token=$token&email=$fetch_email'> Click Here </a>
    ";
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debugging
    // $mail->Debugoutput = 'html'; // Display debug output as HTML
    
   $mail->Body = $email_template;
   $mail->send();
//    echo 'Message has been sent';
    }
    catch (Exception $e){
        echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

    if(isset($_POST['email'])){


            $email = mysqli_escape_string($conn, $_POST['email']);
            $token = md5(rand());

            $check_email = "SELECT email FROM user WHERE email='$email' LIMIT 1";
            $check_email_run = mysqli_query($conn, $check_email);

           


                if(mysqli_num_rows($check_email_run) > 0){
                    $row = mysqli_fetch_array($check_email_run);
                    $fetch_email = $row['email'];

                    $update_token = "UPDATE user SET verify_token ='$token' WHERE email='$fetch_email' LIMIT 1";
                    $update_token_run = mysqli_query($conn, $update_token);


                    if($update_token_run){
                            send_password_reset($fetch_email, $token);
                            $_SESSION['status'] = "<h2>Password reset link sent successfully.</h2>"; // Set the success message
                            header("location: forgot_password.php");
                          
                    }else{
                        echo "error";
                        header("location: forgot_password.php");
                    }

                }else {
                    echo "no email found";
                    header("location: forgot_password.php");
                    exit();
                }



    }



    if(isset($_POST['newpwd'])){
        $email = mysqli_escape_string($conn, $_POST['email']);
        $new_password = mysqli_escape_string($conn, $_POST['newpwd']);
        $confirm_password = mysqli_escape_string($conn, $_POST['confirmpwd']);
        $token = mysqli_escape_string($conn, $_POST['password_token']);
            var_dump($token);
    
        if(!empty($token)){
            if(!empty($token) && !empty($new_password) && !empty($confirm_password)){
    
                    $check_token = "SELECT verify_token FROM user WHERE verify_token='$token' LIMIT 1";
                    $check_token_run = mysqli_query($conn,$check_token);
                    var_dump($token);
                    var_dump($_GET['token']);
                    if(mysqli_num_rows($check_token_run) > 0){
                                    if($new_password == $confirm_password){
                                            $update_password = "UPDATE user SET pwd='$new_password' WHERE verify_token='$token' LIMIT 1";
                                            $update_password_run = mysqli_query($conn, $update_password);
    
                                            if($update_password_run){
                                                $_SESSION['status'] = "New Password successfully updated!";
                                                header("location home.php");
                                                exit(0);
                                            }else{
                                                $_SESSION['status'] = "Update password error";
                                                header("location: changepassword_page.php?token=$token&email=$email");
                                                exit(0);
                                            }
                                    }else{
                                        $_SESSION['status'] = "New password and confirm password does not match";
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