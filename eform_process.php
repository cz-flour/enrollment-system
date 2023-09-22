<?php
include_once "connection.php";  
session_start();
// Check database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

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


    // Prepare and execute the SQL query
    $sql = "INSERT INTO student_info (user_id, lrn, lname, fname, mname, extension, birthdate, age, height, weight, cstatus, nationality, place_birth, sex, religion, contact, province, municipality, brgy, purok, grlevel, track, strand) VALUES ('$user_id', '$lrn', '$lname', '$fname', '$mname', '$extension', '$birthdate', '$age', '$height', '$weight', '$cstatus', '$nationality', '$place_birth', '$sex', '$religion', '$contact', '$province', '$municipality', '$brgy', '$purok', '$grlevel', '$track', '$strand')";

    //$stmt = $conn->prepare($sql);
    //$stmt->bind_param("iissssssiisssssisssssss", $user_id, $lrn, $lname, $fname, $mname, $extension, $birthdate, $age, $height, $weight, $cstatus, $nationality, $place_birth, $sex, $religion, $contact, $province, $municipality, $brgy, $purok, $grlevel, $track, $strand);

    if ($conn->query($sql) === TRUE) {
        $msg = "Student information added successfully!";
    } else {
        $msg = "Error: " . $stmt->error;
    }

    //$stmt->close();
    $conn->close();

    header("location:view_admission.php?register&msg=$msg");
    exit;
}
?>