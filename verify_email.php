<?php
session_start();

include_once "connection.php";

if(isset($_GET['token'])){
    $token = $_GET['token'];
    $verify_query = "SELECT verify_token, verify_status FROM user WHERE verify_token='$token' LIMIT 1";
    $verify_query_run = mysqli_query($conn, $verify_query);

    if(mysqli_num_rows($verify_query_run) > 0){
        $row = mysqli_fetch_array($verify_query_run);
        // echo $row['verify_token'];

        if($row['verify_status'] == "0"){
            $clicked_token = $row['verify_token'];
            $update_query = "UPDATE user SET verify_status='1' WHERE verify_token='$clicked_token' LIMIT 1";
            $update_query_run = mysqli_query($conn,$update_query);
            if($update_query_run){
                echo $msg="<h4>Your account has been verified successfully.</h4>";
                header("location: verified.php");
                exit(0);
            }
            
        } else {
            echo "<h4>Email already verified. Proceed to Login</h4>";
            // header("location:home.php");
        }
    }
}
?>
