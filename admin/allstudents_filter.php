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
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Query failed']);
    }
}
?>
