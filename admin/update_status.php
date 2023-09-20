<?php
if (isset($_POST['student_id'])) {
    $studentId = $_POST['student_id'];

    // Perform the database update here
    // Assuming you have a database connection established already

    $sql = "SELECT status FROM student_info WHERE student_id = $studentId";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $currentStatus = $row['status'];

        // Toggle the status (0 to 1 or 1 to 0)
        $newStatus = ($currentStatus == 0) ? 1 : 0;

        // Update the status in the database
        $updateSql = "UPDATE student_info SET status = $newStatus WHERE student_id = $studentId";

        if (mysqli_query($conn, $updateSql)) {
            echo $newStatus; // Send the updated status back to JavaScript
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }

    exit; // Terminate the script after handling the AJAX request
}
?>
