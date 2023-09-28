<?php
include_once "connection.php";  
session_start();

// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST["submit"])) {
    // Define and set user_id based on your application logic
    $user_id = $_SESSION['user_id'];


    // Retrieve form values
    $lrn = $_POST['lrn'];
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    // Check if 'extension' is set, otherwise set it to null
$extension = isset($_POST['extension']) ? $_POST['extension'] : null;
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
    // CONTACT DETAILS OF GUARDING
    $fullname = $_POST['fullname'];
    $caddress = $_POST['caddress'];
    $rel = $_POST['rel'];
    $cpnum = $_POST['cpnum'];
    // EDUCATION BACKGROUND
    // elementary
    $schname = $_POST['schname'];
    $schaddress = $_POST['schaddress'];
    $yrcomp = $_POST['yrcomp'];
    // jhs
    $schnamej = $_POST['schnamej'];
    $schaddressj = $_POST['schaddressj'];
    $yrcompj = $_POST['yrcompj'];

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
            $uniqueName = $lname . "_" . basename($_FILES[$fileInput]["name"]);

            // Specify the full path to the target file
            $targetFilePath = $targetDir . $uniqueName;

            // Get the file extension and convert it to lowercase for case-insensitive comparison
            $fileExtension = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));

            // Define an array of allowed file extensions for each input
            $allowedExtensions = array(
                "complform" => array("jpg", "jpeg", "pdf"),
                "pics" => array("jpg", "jpeg", "png"),
                "psa" => array("pdf"),
                "formcard" => array("pdf")
            );

            echo "Temporary file location: " . $_FILES[$fileInput]["tmp_name"] . "<br>";
echo "Target file path: $targetFilePath<br>";

            if (in_array($fileExtension, $allowedExtensions[$fileInput])) {
                // Attempt to move the uploaded file to the specified directory
                if (move_uploaded_file($_FILES[$fileInput]["tmp_name"], $targetFilePath)) {
                    $resultMessages[$fileInput] = "The file for $fileInput has been uploaded successfully.";
                    
                    // Store file information in the $fileData array
                    $fileData[$fileInput] = array(
                        "file_location" => $targetFilePath,
                        "file_name" => $uniqueName
                    );

                     // Debugging: Print file information
                echo "File input: $fileInput<br>";
                echo "File location: $targetFilePath<br>";
                echo "File name: $uniqueName<br>";
                } else {
                    $resultMessages[$fileInput] = "Sorry, there was an error uploading the file for $fileInput.";
                }
            } else {
                $resultMessages[$fileInput] = "Sorry, only " . implode(", ", $allowedExtensions[$fileInput]) . " files are allowed for $fileInput.";
            }
        } else {
            echo $resultMessages[$fileInput] = " LINE 97 No file was uploaded or an error occurred during upload for $fileInput.";
        }
    }

    // Prepare and execute the SQL query for student information using prepared statements
    $sql = "INSERT INTO student_info (user_id, lrn, lname, fname, mname, extension, birthdate, age, height, weight, cstatus, nationality, place_birth, sex, religion, contact, province, municipality, brgy, purok, grlevel, track, strand,fullname, caddress,rel,cpnum,schname,schaddress,yrcomp,schnamej,schaddressj,yrcompj) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?,?,?,?,?,?,?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issssssiiisssssssssssssssssssssss", $user_id, $lrn, $lname, $fname, $mname, $extension, $birthdate, $age, $height, $weight, $cstatus, $nationality, $place_birth, $sex, $religion, $contact, $province, $municipality, $brgy, $purok, $grlevel, $track, $strand,$fullname, $caddress,$rel,$cpnum,$schname,$schaddress,$yrcomp,$schnamej,$schaddressj,$yrcompj);

    if ($stmt->execute()) {
        $msg = "Student information added successfully!";
    } else {
        $msg = "Error adding student information: " . $stmt->error;
    }




// Insert file information into the 'files' table using prepared statements
foreach ($fileInputs as $fileInput) {
    // Check if the file input exists in $fileData
    if (isset($fileData[$fileInput])) {
        $fileLocation = $fileData[$fileInput]["file_location"];
        $fileName = $fileData[$fileInput]["file_name"];

        $insertFileSql = "INSERT INTO files (student_id, file_location, file_name) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertFileSql);

        if ($stmt) {
            $stmt->bind_param("iss", $user_id, $fileLocation, $fileName);

            if ($stmt->execute()) {
                $file_id = mysqli_insert_id($conn); // Get the last inserted file_id

                $resultMessages[$fileInput] .= " File information added to database. File ID: $file_id";

                $updateQuery = "UPDATE student_info SET $fileInput = ? WHERE user_id = ?";
                $u_stmt = $conn->prepare($updateQuery);

                if($u_stmt){
                    $u_stmt->bind_param("ii",$file_id, $user_id);
                    if ($u_stmt->execute()) {
                           $result = "Updated $file_id in student_info successfully";
                           echo $result;
                        } else {
                            $result = "Failed $file_id in student_info";
                            echo $result;
                        }
                    $u_stmt->close();
                }

            } else {
                $resultMessages[$fileInput] .= " Error adding file information to database: " . $stmt->error;
            }

            $stmt->close();
        } else {
            $resultMessages[$fileInput] .= " Error preparing SQL statement: " . $conn->error;
        }
    } else {
        // Handle the case where the file input is not set (no file uploaded for this input)
        echo $resultMessages[$fileInput] .= "LINE 163 No file was uploaded or an error occurred during upload for $fileInput.";
    }
}


    $conn->close();

    header("location:after.php?register&msg=$msg");
    exit;
}
?>