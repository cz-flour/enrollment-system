<?php
include_once './connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user ID to delete from the POST data
    $data = json_decode(file_get_contents("php://input"));
    $userId = $data->userId;

    // Perform the deletion in a transaction to ensure both tables are updated atomically
    mysqli_autocommit($conn, false);

    $success = true;

    // First, delete the user from the student_info table
    $deleteStudentInfo = "DELETE FROM student_info WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $deleteStudentInfo);
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    
    if (!mysqli_stmt_execute($stmt)) {
        $success = false;
    }
    mysqli_stmt_close($stmt);

    // Next, delete the user from the user table
    $deleteUser = "DELETE FROM user WHERE user_id = ?";
    $stmt = mysqli_prepare($conn, $deleteUser);
    mysqli_stmt_bind_param($stmt, 'i', $userId);
    
    if (!mysqli_stmt_execute($stmt)) {
        $success = false;
    }
    mysqli_stmt_close($stmt);

    if ($success) {
        mysqli_commit($conn);
        echo json_encode(array("message" => "User deleted successfully"));
    } else {
        mysqli_rollback($conn);
        echo json_encode(array("message" => "Error deleting user"));
    }

    mysqli_autocommit($conn, true);
} else {
    // If the request method is not POST, return an error
    http_response_code(400);
    echo json_encode(array("message" => "Invalid request method"));
}

// Close the database connection
mysqli_close($conn);
?>
