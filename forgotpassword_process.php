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






?>