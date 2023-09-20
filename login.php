<?php
include_once "connection.php";
session_start();

$email = mysqli_real_escape_string($conn, $_POST['email']);
$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

echo $pwd. " :Password<br/>";

if($conn->connect_error){
    die("Connection failed: ".$conn->connect_error);

}

$sql="SELECT * FROM user WHERE email='$email'";

$result = $conn->query($sql);

if ($result && $result->num_rows === 1){
    $row = $result->fetch_assoc();

    $isPasswordMatch = $row['pwd'] === $pwd;
    $isAdmin = $row['is_admin'] == 1;


        if ($isPasswordMatch){
            $_SESSION['user_id'] = $row['user_id'];
            
            if($isAdmin){
                header("location: admin/index.php");
            }else{
                echo "<script>alert('You are logged in');</script>";
                header("location: after.php");
            }
        } else{
            echo "Invalid Password";
        }
    } else{
        echo"Invalid Email";
    }

$conn->close();

?>