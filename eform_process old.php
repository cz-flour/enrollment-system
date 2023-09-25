<?php
include_once "connection.php";  
session_start();
// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["submit"])) {
    // $user_id = $_SESSION['user_id'];

    // Retrieve form values
    $lrn = $_POST['lrn'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $extension = $_POST['extension'];
    $birthdate = $_POST['birthdate'];
    $age = $_POST['age'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $cstatus = $_POST['cstatus'];
    $nationality = $_POST['nationality'];
    $place_birth = $_POST['place_birth'];
    $sex = $_POST['sex'];
    $religion = $_POST['religion'];
    $contact = $_POST['contact'];
    $province = $_POST['province'];
    $municipality = $_POST['municipality'];
    $brgy = $_POST['brgy'];
    $purok = $_POST['purok'];
    $grlevel = $_POST['grlevel'];
    $track = $_POST['track'];
    $strand = $_POST['strand'];  


     // Define the target directory where you want to save the uploaded files
    $targetDir = "uploads/"; // Change this to your desired directory path

    // Create an array to store the result messages for each file input
    $resultMessages = array();

    // Initialize an array to store file information
    $fileData = array();

    // Iterate through each file input
    $fileInputs = array("complform", "pics", "psa", "formcard");

    foreach ($fileInputs as $fileInput) {
        // Check if the file for the current input was uploaded without errors
        if (isset($_FILES[$fileInput]) && $_FILES[$fileInput]["error"] == 0) {
            // Generate a unique name for the uploaded file to avoid overwriting
            $uniqueName = uniqid() . "_" . basename($_FILES[$fileInput]["name"]);

            // Specify the full path to the target file
            $targetFilePath = $targetDir . $uniqueName;

            // Get the file extension and convert it to lowercase for case-insensitive comparison
            $fileExtension = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

            // Define an array of allowed file extensions for each input
            $allowedExtensions = array(
                "complform" => array("jpg", "jpeg", "pdf"),
                "pics" => array("jpg", "jpeg"),
                "psa" => array("pdf"),
                "formcard" => array("pdf")
            );

            if (in_array($fileExtension, $allowedExtensions[$fileInput])) {
                // Attempt to move the uploaded file to the specified directory
                if (move_uploaded_file($_FILES[$fileInput]["tmp_name"], $targetFilePath)) {
                    $resultMessages[$fileInput] = "The file for $fileInput has been uploaded successfully.";
                    
                    // Store file information in the $fileData array
                    $fileData[$fileInput] = array(
                        "file_location" => $targetFilePath,
                        "file_name" => $uniqueName
                    );
                } else {
                    $resultMessages[$fileInput] = "Sorry, there was an error uploading the file for $fileInput.";
                }
            } else {
                $resultMessages[$fileInput] = "Sorry, only " . implode(", ", $allowedExtensions[$fileInput]) . " files are allowed for $fileInput.";
            }
        } else {
            $resultMessages[$fileInput] = "No file was uploaded or an error occurred during upload for $fileInput.";
        }
    }
    


    // Prepare and execute the SQL query
    $sql = "INSERT INTO student_info (user_id, lrn, lname, fname, mname, extension, birthdate, age, height, weight, cstatus, nationality, place_birth, sex, religion, contact, province, municipality, brgy, purok, grlevel, track, strand) VALUES ('$user_id', '$lrn', '$lname', '$fname', '$mname', '$extension', '$birthdate', '$age', '$height', '$weight', '$cstatus', '$nationality', '$place_birth', '$sex', '$religion', '$contact', '$province', '$municipality', '$brgy', '$purok', '$grlevel', '$track', '$strand')";

    //$stmt = $conn->prepare($sql);
    //$stmt->bind_param("iissssssiisssssisssssss", $user_id, $lrn, $lname, $fname, $mname, $extension, $birthdate, $age, $height, $weight, $cstatus, $nationality, $place_birth, $sex, $religion, $contact, $province, $municipality, $brgy, $purok, $grlevel, $track, $strand);

    if ($conn->query($sql) === TRUE) {
        $msg = "Student information added successfully!";
    } else {
        $msg = "Error: " . $stmt->error;
    }

     // Insert file information into the 'files' table
    foreach ($fileData as $fileInput => $fileInfo) {
        $fileLocation = $fileInfo["file_location"];
        $fileName = $fileInfo["file_name"];

        $insertFileSql = "INSERT INTO files (student_id, file_location, file_name) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertFileSql);

        if ($stmt) {
            $stmt->bind_param("iss", $student_id, $fileLocation, $fileName);

            if ($stmt->execute()) {
                $resultMessages[$fileInput] .= " File information added to database.";
            } else {
                $resultMessages[$fileInput] .= " Error adding file information to database: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $resultMessages[$fileInput] .= " Error preparing SQL statement: " . $conn->error;
        }
    }

    //$stmt->close();
    $conn->close();

    header("location:after.php?register&msg=$msg");
    exit;
}
?>