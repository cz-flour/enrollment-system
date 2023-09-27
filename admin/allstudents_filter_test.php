<?php


$conn = mysqli_connect("localhost", "root", "", "enrollment");

// Query to retrieve student information
$studentQuery = "SELECT * FROM student_info";
$studentResult = $conn->query($studentQuery);

// Check if student exists
if ($studentResult->num_rows > 0) {
    $studentData = $studentResult->fetch_assoc();
    
    // Query to retrieve file information for each file type
    $fileTypes = ["psa", "formcard", "pics", "complform"];
    $fileInfo = array();

    foreach ($fileTypes as $fileType) {
        $fileId = $studentData[$fileType];
        $fileQuery = "SELECT * FROM files WHERE file_id = $fileId";
        $fileResult = $conn->query($fileQuery);

        if ($fileResult->num_rows > 0) {
            $fileInfo[$fileType] = $fileResult->fetch_assoc();
        } else {
            $fileInfo[$fileType] = null; // No file found for this type
        }
    }

    // Combine student data and file information
    $result = array_merge($studentData, $fileInfo);

    // Print or process the result as needed
    print_r($result);
} else {
    echo "Student not found.";
}