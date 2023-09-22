<?php
include_once './connection.php';
session_start();
$user_id = $_SESSION['user_id'];

// Initialize a response array
$response = array();

$sql = "SELECT u.email, u.user_id, CONCAT(s.fname, ' ', s.mname, ' ', s.lname) AS name
        FROM user u
        LEFT JOIN student_info s ON u.user_id = s.user_id
        WHERE u.is_admin = '0'";
$result = $conn->query($sql);

if ($result) {
    $users = array(); // Create an array to store user data

    while ($row = mysqli_fetch_assoc($result)) {
        $users[] = $row; // Add each user to the array
    }

    $response["users"] = $users;
} else {
    // Set the response status to "Error"
    $response["users"] = "Error";
}

// Set the Content-Type header to JSON
header("Content-Type: application/json");

// Output the JSON response
echo json_encode($response);
?>
