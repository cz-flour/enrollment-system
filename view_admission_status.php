<?php
include_once './connection.php';
session_start();
$user_id = $_SESSION['user_id'];

// Initialize a response array
$response = array();

$sql = "SELECT status FROM student_info WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $status = $row['status'];

    // Set the response status to "Success" and include the status data
    $response["status"] = $status;
} else {
    // Set the response status to "Error"
    $response["status"] = "Error";
}

// Set the Content-Type header to JSON
header("Content-Type: application/json");

// Output the JSON response
echo json_encode($response);
?>
