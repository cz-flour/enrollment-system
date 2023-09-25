<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $studentId = $data['studentId']; // Use array notation
$newStatus = $data['newStatus'];   // Use array notation

    // Establish a database connection (modify these settings as needed)
    $conn = mysqli_connect("localhost", "root", "", "enrollment");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update the status in the database
    $sql = "UPDATE student_info SET status = ? WHERE student_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $newStatus, $studentId);

    if (mysqli_stmt_execute($stmt)) {
        $response = ["success" => true];
    } else {
        $response = ["success" => false, "error" => "Failed to update status"];
    }

    // Close the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    // Send a JSON response back to the client
    header("Content-Type: application/json");
    echo json_encode($response);
} else {
    // Handle other HTTP methods if needed
    http_response_code(405); // Method Not Allowed
}
?>
