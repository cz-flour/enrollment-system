<?php
session_start();

// Assuming you have a valid database connection in $conn
$user_id = $_SESSION['user_id'];
$query = "SELECT email FROM users WHERE user_id = '$user_id'"; // Adjust table and column names

$result = mysqli_query($conn, $query);
if ($row = mysqli_fetch_assoc($result)) {
    echo "Email: " . $row['email'];
} else {
    echo "Email not found.";
}
?>
