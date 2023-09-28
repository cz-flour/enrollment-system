<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $sqlQuery = $data['query'];

    // Perform database connection and query execution here
    $conn = mysqli_connect("localhost", "root", "", "enrollment");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $result = $conn->query($sqlQuery);

    if ($result) {
        // $data = [];
        // while ($row = $result->fetch_assoc()) {
        //     $data[] = $row;
        // }
        // echo json_encode($data);

        $data = array();
        while ($row = $result->fetch_assoc()) {
            // Query to retrieve file information for each file type
            $fileTypes = ["psa", "formcard", "pics", "complform"];
            $fileInfo = array();

            foreach ($fileTypes as $fileType) {
                $fileId = $row[$fileType];
                $fileQuery = "SELECT * FROM files WHERE file_id = $fileId";
                $fileResult = $conn->query($fileQuery);

                if ($fileResult->num_rows > 0) {
                    $fileInfo[$fileType] = $fileResult->fetch_assoc();
                } else {
                    $fileInfo[$fileType] = null; // No file found for this type
                }
            }

            // Combine student data and file information and add to the result array
            $data[] = array_merge($row, $fileInfo);
        }
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Query failed']);
    }
}
?>
