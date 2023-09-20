<!DOCTYPE html lang=en>
<html>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="indexstyle.css"> 
    <title>Admin</title>
    <link rel="icon" href="logo.png">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script src="../plugins/popper.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/jquery.dataTables.css">



<head>
<?php
    // session_start();/* 
    // include_once "connection.php";
    
    
    //include_once "./config/dbconnect.php";
?> 
</head>
<style>
table, td {
border-collapse: collapse;
color: #808080;
font-family: monospace;
font-size: 15px;
text-align: center;
border: 1px solid #ddd;
padding: 10px 15px;
}
th {
background-color:#2F539B;
color: white;
border: 1px solid #ddd;
}
tr:nth-child(even) {background-color: #f2f2f2}

h3,h6{
    font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif ;
    color:dimgrey;
}
.status-button {
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
  }
  .approved {
    background-color: #4CAF50;
    color: white;
    cursor: not-allowed;
  }
</style>
 
<body>
    <div   class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">

                <!-- SIDEBAR -->
                <?php include "./sidebar.php";  ?>
                <!-- MAIN CONTENT -->
                <div id="content" class="container">
                <div class="container">
        <div class="row">
        <div class="colapse" id="collapseContent">
                <div class="card card-body">

        </div>
                </div>
            <div class="col-12 p-3 mb-2 bg-transparent" style="color: light;">

               <h3>Grade 11</h3>
               <h6>General Academic Strand (GAS)</h6>

               <table id="myTable">
                    <tr>
                    <th>LRN</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Extension</th>
                    <th>Birthday</th>
                    <th>Age</th>
                    <th>Height</th>
                    <th>Weight</th>
                    <th>Civil Status</th>
                    <th>Nationality</th>
                    <th>Place of Birth</th>
                    <th>Sex</th>
                    <th>Religion</th>
                    <th>Contact Number</th>
                    <th>Address</th>
                    <th>Grade Level</th>
                    <th>Track</th>
                    <th>Strand</th>
                    <th>PSA</th>
                    <th>Card</th>
                    <th>Picture</th>
                    <th>Completion Form</th>
                    <th>Contact Person</th>
                    <th>Address</th>
                    <th>Relation</th>
                    <th>Tel. No</th>
                    <th>Elem School Name</th>
                    <th>School Address</th>
                    <th>Year of Completion (Elem)</th>
                    <th>JHS School Name</th>
                    <th>School Address</th>
                    <th>Year of Completion (jhs)</th>
                    <th>Date Enrolled</th>
                    <th>Status</th>

                    </tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "enrollment");
// Check connection



if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM student_info WHERE grlevel='Grade 11' AND strand='General Academic Strand (GAS)'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    $address = "Purok" .$row["purok"] . ", " . $row["brgy"] . ", " . $row["municipality"].",".$row["province"];
    $student_id = $row["student_id"]; // Assuming this is the student's unique identifier in the database
$statusId = "statusButton_" . $student_id;

echo "<tr><td>" . $row["lrn"]. "</td><td>" . $row["lname"] . "</td><td>" . $row["fname"]. "</td><td>" . $row["mname"]. "</td><td>" . $row["extension"]. "</td><td>" . $row["birthdate"]. "</td><td>" . $row["age"]. "</td><td>" . $row["height"]. "</td><td>" . $row["weight"]. "</td><td>" . $row["cstatus"]. "</td><td>" . $row["nationality"]. "</td><td>" . $row["place_birth"]. "</td><td>" . $row["sex"]. "</td><td>" .$row["religion"]. "</td><td>" .$row["contact"]. "</td><td>" .$address. "</td><td>" .$row["grlevel"]. "</td><td>" .$row["track"]. "</td><td>" .$row["strand"]. "</td><td>" .$row["psa"]. "</td><td>" .$row["formcard"]. "</td><td>" .$row["pics"]. "</td><td>" .$row["complform"]. "</td><td>" .$row["fullname"]. "</td><td>" . $row["caddress"]. "</td><td>" . $row["rel"]. "</td><td>" . $row["cpnum"]. "</td><td>" . $row["schname"]. "</td><td>" . $row["schaddress"]. "</td><td>" . $row["yrcomp"]. "</td><td>" . $row["schnamej"]. "</td><td>" . $row["schaddressj"]. "</td><td>" . $row["yrcompj"]. "</td><td>".$row["date"]. "</td><td> <button id='" . $statusId . "' class='status-button'>Pending</button></td>";	

}


echo "</table>";
}
else { echo "0 results"; }

?>
</table>
                </div>


<br>
<br>


 <div class="col-12 p-3 mb-2 bg-transparent" style="color: light;">

<h6>Humanitites and Social Sciences (HUMMS)</h6>

<table id="myTable">
     <tr>
     <th>LRN</th>
     <th>Last Name</th>
     <th>First Name</th>
     <th>Middle Name</th>
     <th>Extension</th>
     <th>Birthday</th>
     <th>Age</th>
     <th>Height</th>
     <th>Weight</th>
     <th>Civil Status</th>
     <th>Nationality</th>
     <th>Place of Birth</th>
     <th>Sex</th>
     <th>Religion</th>
     <th>Contact Number</th>
     <th>Address</th>
     <th>Grade Level</th>
     <th>Track</th>
     <th>Strand</th>
     <th>PSA</th>
     <th>Card</th>
     <th>Picture</th>
     <th>Completion Form</th>
     <th>Contact Person</th>
     <th>Address</th>
     <th>Relation</th>
     <th>Tel. No</th>
     <th>Elem School Name</th>
     <th>School Address</th>
     <th>Year of Completion (Elem)</th>
     <th>JHS School Name</th>
     <th>School Address</th>
     <th>Year of Completion (jhs)</th>
     <th>Date Enrolled</th>
     <th>Status</th>

     </tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "enrollment");
// Check connection



          if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
          }
          $sql = "SELECT * FROM student_info WHERE grlevel='Grade 11' AND strand='Humanities and Social Sciences (HUMMS)'";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
          $address = "Purok" .$row["purok"] . ", " . $row["brgy"] . ", " . $row["municipality"].",".$row["province"];
          $student_id = $row["student_id"]; // Assuming this is the student's unique identifier in the database
          $statusId = "statusButton_" . $student_id;

          echo "<tr><td>" . $row["lrn"]. "</td><td>" . $row["lname"] . "</td><td>" . $row["fname"]. "</td><td>" . $row["mname"]. "</td><td>" . $row["extension"]. "</td><td>" . $row["birthdate"]. "</td><td>" . $row["age"]. "</td><td>" . $row["height"]. "</td><td>" . $row["weight"]. "</td><td>" . $row["cstatus"]. "</td><td>" . $row["nationality"]. "</td><td>" . $row["place_birth"]. "</td><td>" . $row["sex"]. "</td><td>" .$row["religion"]. "</td><td>" .$row["contact"]. "</td><td>" .$address. "</td><td>" .$row["grlevel"]. "</td><td>" .$row["track"]. "</td><td>" .$row["strand"]. "</td><td>" .$row["psa"]. "</td><td>" .$row["formcard"]. "</td><td>" .$row["pics"]. "</td><td>" .$row["complform"]. "</td><td>" .$row["fullname"]. "</td><td>" . $row["caddress"]. "</td><td>" . $row["rel"]. "</td><td>" . $row["cpnum"]. "</td><td>" . $row["schname"]. "</td><td>" . $row["schaddress"]. "</td><td>" . $row["yrcomp"]. "</td><td>" . $row["schnamej"]. "</td><td>" . $row["schaddressj"]. "</td><td>" . $row["yrcompj"]. "</td><td>".$row["date"]. "</td><td> <button id='" . $statusId . "' class='status-button'>Pending</button></td>";	

          }


          echo "</table>";
          }
          else { echo "0 results"; }

          ?>
</table>
 </div>

<br>
<br>


 <div class="col-12 p-3 mb-2 bg-transparent" style="color: light;">

<h6>Automotive Servicing</h6>

<table id="myTable">
    <tr>
    <th>LRN</th>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Extension</th>
    <th>Birthday</th>
    <th>Age</th>
    <th>Height</th>
    <th>Weight</th>
    <th>Civil Status</th>
    <th>Nationality</th>
    <th>Place of Birth</th>
    <th>Sex</th>
    <th>Religion</th>
    <th>Contact Number</th>
    <th>Address</th>
    <th>Grade Level</th>
    <th>Track</th>
    <th>Strand</th>
    <th>PSA</th>
    <th>Card</th>
    <th>Picture</th>
    <th>Completion Form</th>
    <th>Contact Person</th>
    <th>Address</th>
    <th>Relation</th>
    <th>Tel. No</th>
    <th>Elem School Name</th>
    <th>School Address</th>
    <th>Year of Completion (Elem)</th>
    <th>JHS School Name</th>
    <th>School Address</th>
    <th>Year of Completion (jhs)</th>
    <th>Date Enrolled</th>
    <th>Status</th>

    </tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "enrollment");
// Check connection



        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM student_info WHERE grlevel='Grade 11' AND strand='Automotive Servicing'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        $address = "Purok" .$row["purok"] . ", " . $row["brgy"] . ", " . $row["municipality"].",".$row["province"];
        $student_id = $row["student_id"]; // Assuming this is the student's unique identifier in the database
        $statusId = "statusButton_" . $student_id;

        echo "<tr><td>" . $row["lrn"]. "</td><td>" . $row["lname"] . "</td><td>" . $row["fname"]. "</td><td>" . $row["mname"]. "</td><td>" . $row["extension"]. "</td><td>" . $row["birthdate"]. "</td><td>" . $row["age"]. "</td><td>" . $row["height"]. "</td><td>" . $row["weight"]. "</td><td>" . $row["cstatus"]. "</td><td>" . $row["nationality"]. "</td><td>" . $row["place_birth"]. "</td><td>" . $row["sex"]. "</td><td>" .$row["religion"]. "</td><td>" .$row["contact"]. "</td><td>" .$address. "</td><td>" .$row["grlevel"]. "</td><td>" .$row["track"]. "</td><td>" .$row["strand"]. "</td><td>" .$row["psa"]. "</td><td>" .$row["formcard"]. "</td><td>" .$row["pics"]. "</td><td>" .$row["complform"]. "</td><td>" .$row["fullname"]. "</td><td>" . $row["caddress"]. "</td><td>" . $row["rel"]. "</td><td>" . $row["cpnum"]. "</td><td>" . $row["schname"]. "</td><td>" . $row["schaddress"]. "</td><td>" . $row["yrcomp"]. "</td><td>" . $row["schnamej"]. "</td><td>" . $row["schaddressj"]. "</td><td>" . $row["yrcompj"]. "</td><td>".$row["date"]. "</td><td> <button id='" . $statusId . "' class='status-button'>Pending</button></td>";	

        }


        echo "</table>";
        }
        else { echo "0 results"; }

        ?>
        </table>
        </div>


<br>
<br>



              <div class="col-12 p-3 mb-2 bg-transparent" style="color: light;">

              <h6>Electrical Installation and Maintenance</h6>

              <table id="myTable">
                  <tr>
                  <th>LRN</th>
                  <th>Last Name</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Extension</th>
                  <th>Birthday</th>
                  <th>Age</th>
                  <th>Height</th>
                  <th>Weight</th>
                  <th>Civil Status</th>
                  <th>Nationality</th>
                  <th>Place of Birth</th>
                  <th>Sex</th>
                  <th>Religion</th>
                  <th>Contact Number</th>
                  <th>Address</th>
                  <th>Grade Level</th>
                  <th>Track</th>
                  <th>Strand</th>
                  <th>PSA</th>
                  <th>Card</th>
                  <th>Picture</th>
                  <th>Completion Form</th>
                  <th>Contact Person</th>
                  <th>Address</th>
                  <th>Relation</th>
                  <th>Tel. No</th>
                  <th>Elem School Name</th>
                  <th>School Address</th>
                  <th>Year of Completion (Elem)</th>
                  <th>JHS School Name</th>
                  <th>School Address</th>
                  <th>Year of Completion (jhs)</th>
                  <th>Date Enrolled</th>
                  <th>Status</th>

                  </tr>
              <?php
              $conn = mysqli_connect("localhost", "root", "", "enrollment");
              // Check connection



              if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
              }
              $sql = "SELECT * FROM student_info WHERE grlevel='Grade 11' AND strand='Electrical Installation and Maintenance'";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
              $address = "Purok" .$row["purok"] . ", " . $row["brgy"] . ", " . $row["municipality"].",".$row["province"];
              $student_id = $row["student_id"]; // Assuming this is the student's unique identifier in the database
              $statusId = "statusButton_" . $student_id;

              echo "<tr><td>" . $row["lrn"]. "</td><td>" . $row["lname"] . "</td><td>" . $row["fname"]. "</td><td>" . $row["mname"]. "</td><td>" . $row["extension"]. "</td><td>" . $row["birthdate"]. "</td><td>" . $row["age"]. "</td><td>" . $row["height"]. "</td><td>" . $row["weight"]. "</td><td>" . $row["cstatus"]. "</td><td>" . $row["nationality"]. "</td><td>" . $row["place_birth"]. "</td><td>" . $row["sex"]. "</td><td>" .$row["religion"]. "</td><td>" .$row["contact"]. "</td><td>" .$address. "</td><td>" .$row["grlevel"]. "</td><td>" .$row["track"]. "</td><td>" .$row["strand"]. "</td><td>" .$row["psa"]. "</td><td>" .$row["formcard"]. "</td><td>" .$row["pics"]. "</td><td>" .$row["complform"]. "</td><td>" .$row["fullname"]. "</td><td>" . $row["caddress"]. "</td><td>" . $row["rel"]. "</td><td>" . $row["cpnum"]. "</td><td>" . $row["schname"]. "</td><td>" . $row["schaddress"]. "</td><td>" . $row["yrcomp"]. "</td><td>" . $row["schnamej"]. "</td><td>" . $row["schaddressj"]. "</td><td>" . $row["yrcompj"]. "</td><td>".$row["date"]. "</td><td> <button id='" . $statusId . "' class='status-button'>Pending</button></td>";	

              }


              echo "</table>";
              }
              else { echo "0 results"; }

              ?>
              </table>
              </div>


<br>
<br>


<div class="col-12 p-3 mb-2 bg-transparent" style="color: light;">

<h6>Computer System Servicing</h6>

<table id="myTable">
    <tr>
    <th>LRN</th>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Middle Name</th>
    <th>Extension</th>
    <th>Birthday</th>
    <th>Age</th>
    <th>Height</th>
    <th>Weight</th>
    <th>Civil Status</th>
    <th>Nationality</th>
    <th>Place of Birth</th>
    <th>Sex</th>
    <th>Religion</th>
    <th>Contact Number</th>
    <th>Address</th>
    <th>Grade Level</th>
    <th>Track</th>
    <th>Strand</th>
    <th>PSA</th>
    <th>Card</th>
    <th>Picture</th>
    <th>Completion Form</th>
    <th>Contact Person</th>
    <th>Address</th>
    <th>Relation</th>
    <th>Tel. No</th>
    <th>Elem School Name</th>
    <th>School Address</th>
    <th>Year of Completion (Elem)</th>
    <th>JHS School Name</th>
    <th>School Address</th>
    <th>Year of Completion (jhs)</th>
    <th>Date Enrolled</th>
    <th>Status</th>

    </tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "enrollment");
// Check connection



if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM student_info WHERE grlevel='Grade 11' AND strand='Computer System Servicing '";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$address = "Purok" .$row["purok"] . ", " . $row["brgy"] . ", " . $row["municipality"].",".$row["province"];
$student_id = $row["student_id"]; // Assuming this is the student's unique identifier in the database
$statusId = "statusButton_" . $student_id;

echo "<tr><td>" . $row["lrn"]. "</td><td>" . $row["lname"] . "</td><td>" . $row["fname"]. "</td><td>" . $row["mname"]. "</td><td>" . $row["extension"]. "</td><td>" . $row["birthdate"]. "</td><td>" . $row["age"]. "</td><td>" . $row["height"]. "</td><td>" . $row["weight"]. "</td><td>" . $row["cstatus"]. "</td><td>" . $row["nationality"]. "</td><td>" . $row["place_birth"]. "</td><td>" . $row["sex"]. "</td><td>" .$row["religion"]. "</td><td>" .$row["contact"]. "</td><td>" .$address. "</td><td>" .$row["grlevel"]. "</td><td>" .$row["track"]. "</td><td>" .$row["strand"]. "</td><td>" .$row["psa"]. "</td><td>" .$row["formcard"]. "</td><td>" .$row["pics"]. "</td><td>" .$row["complform"]. "</td><td>" .$row["fullname"]. "</td><td>" . $row["caddress"]. "</td><td>" . $row["rel"]. "</td><td>" . $row["cpnum"]. "</td><td>" . $row["schname"]. "</td><td>" . $row["schaddress"]. "</td><td>" . $row["yrcomp"]. "</td><td>" . $row["schnamej"]. "</td><td>" . $row["schaddressj"]. "</td><td>" . $row["yrcompj"]. "</td><td>".$row["date"]. "</td><td> <button id='" . $statusId . "' class='status-button'>Pending</button></td>";	

}


echo "</table>";
}
else { echo "0 results"; }

?>
</table>
</div>

<br>
<br>


        <div class="col-12 p-3 mb-2 bg-transparent" style="color: light;">

        <h3>Grade 12</h3>
        <h6>General Academic Strand (GAS)</h6>

        <table id="myTable">
            <tr>
            <th>LRN</th>
            <th>Last Name</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Extension</th>
            <th>Birthday</th>
            <th>Age</th>
            <th>Height</th>
            <th>Weight</th>
            <th>Civil Status</th>
            <th>Nationality</th>
            <th>Place of Birth</th>
            <th>Sex</th>
            <th>Religion</th>
            <th>Contact Number</th>
            <th>Address</th>
            <th>Grade Level</th>
            <th>Track</th>
            <th>Strand</th>
            <th>PSA</th>
            <th>Card</th>
            <th>Picture</th>
            <th>Completion Form</th>
            <th>Contact Person</th>
            <th>Address</th>
            <th>Relation</th>
            <th>Tel. No</th>
            <th>Elem School Name</th>
            <th>School Address</th>
            <th>Year of Completion (Elem)</th>
            <th>JHS School Name</th>
            <th>School Address</th>
            <th>Year of Completion (jhs)</th>
            <th>Date Enrolled</th>
            <th>Status</th>

            </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "enrollment");
        // Check connection



        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT * FROM student_info WHERE grlevel='Grade 12' AND strand='General Academic Strand (GAS)'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
        $address = "Purok" .$row["purok"] . ", " . $row["brgy"] . ", " . $row["municipality"].",".$row["province"];
        $student_id = $row["student_id"]; // Assuming this is the student's unique identifier in the database
        $statusId = "statusButton_" . $student_id;

        echo "<tr><td>" . $row["lrn"]. "</td><td>" . $row["lname"] . "</td><td>" . $row["fname"]. "</td><td>" . $row["mname"]. "</td><td>" . $row["extension"]. "</td><td>" . $row["birthdate"]. "</td><td>" . $row["age"]. "</td><td>" . $row["height"]. "</td><td>" . $row["weight"]. "</td><td>" . $row["cstatus"]. "</td><td>" . $row["nationality"]. "</td><td>" . $row["place_birth"]. "</td><td>" . $row["sex"]. "</td><td>" .$row["religion"]. "</td><td>" .$row["contact"]. "</td><td>" .$address. "</td><td>" .$row["grlevel"]. "</td><td>" .$row["track"]. "</td><td>" .$row["strand"]. "</td><td>" .$row["psa"]. "</td><td>" .$row["formcard"]. "</td><td>" .$row["pics"]. "</td><td>" .$row["complform"]. "</td><td>" .$row["fullname"]. "</td><td>" . $row["caddress"]. "</td><td>" . $row["rel"]. "</td><td>" . $row["cpnum"]. "</td><td>" . $row["schname"]. "</td><td>" . $row["schaddress"]. "</td><td>" . $row["yrcomp"]. "</td><td>" . $row["schnamej"]. "</td><td>" . $row["schaddressj"]. "</td><td>" . $row["yrcompj"]. "</td><td>".$row["date"]. "</td><td> <button id='" . $statusId . "' class='status-button'>Pending</button></td>";	

        }


        echo "</table>";
        }
        else { echo "0 results"; }

        ?>
        </table>
        </div>


<br>
<br>


<div class="col-12 p-3 mb-2 bg-transparent" style="color: light;">

<h6>Humanities and Social Sciences (HUMMS)</h6>

<table id="myTable">
     <tr>
     <th>LRN</th>
     <th>Last Name</th>
     <th>First Name</th>
     <th>Middle Name</th>
     <th>Extension</th>
     <th>Birthday</th>
     <th>Age</th>
     <th>Height</th>
     <th>Weight</th>
     <th>Civil Status</th>
     <th>Nationality</th>
     <th>Place of Birth</th>
     <th>Sex</th>
     <th>Religion</th>
     <th>Contact Number</th>
     <th>Address</th>
     <th>Grade Level</th>
     <th>Track</th>
     <th>Strand</th>
     <th>PSA</th>
     <th>Card</th>
     <th>Picture</th>
     <th>Completion Form</th>
     <th>Contact Person</th>
     <th>Address</th>
     <th>Relation</th>
     <th>Tel. No</th>
     <th>Elem School Name</th>
     <th>School Address</th>
     <th>Year of Completion (Elem)</th>
     <th>JHS School Name</th>
     <th>School Address</th>
     <th>Year of Completion (jhs)</th>
     <th>Date Enrolled</th>
     <th>Status</th>

     </tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "enrollment");
// Check connection



if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM student_info WHERE grlevel='Grade 12' AND strand='Humanities and Social Sciences (HUMMS)'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$address = "Purok" .$row["purok"] . ", " . $row["brgy"] . ", " . $row["municipality"].",".$row["province"];
$student_id = $row["student_id"]; // Assuming this is the student's unique identifier in the database
$statusId = "statusButton_" . $student_id;

echo "<tr><td>" . $row["lrn"]. "</td><td>" . $row["lname"] . "</td><td>" . $row["fname"]. "</td><td>" . $row["mname"]. "</td><td>" . $row["extension"]. "</td><td>" . $row["birthdate"]. "</td><td>" . $row["age"]. "</td><td>" . $row["height"]. "</td><td>" . $row["weight"]. "</td><td>" . $row["cstatus"]. "</td><td>" . $row["nationality"]. "</td><td>" . $row["place_birth"]. "</td><td>" . $row["sex"]. "</td><td>" .$row["religion"]. "</td><td>" .$row["contact"]. "</td><td>" .$address. "</td><td>" .$row["grlevel"]. "</td><td>" .$row["track"]. "</td><td>" .$row["strand"]. "</td><td>" .$row["psa"]. "</td><td>" .$row["formcard"]. "</td><td>" .$row["pics"]. "</td><td>" .$row["complform"]. "</td><td>" .$row["fullname"]. "</td><td>" . $row["caddress"]. "</td><td>" . $row["rel"]. "</td><td>" . $row["cpnum"]. "</td><td>" . $row["schname"]. "</td><td>" . $row["schaddress"]. "</td><td>" . $row["yrcomp"]. "</td><td>" . $row["schnamej"]. "</td><td>" . $row["schaddressj"]. "</td><td>" . $row["yrcompj"]. "</td><td>".$row["date"]. "</td><td> <button id='" . $statusId . "' class='status-button'>Pending</button></td>";	

}


echo "</table>";
}
else { echo "0 results"; }

?>
</table>
 </div>


 <br>
 <br>


 <div class="col-12 p-3 mb-2 bg-transparent" style="color: light;">

<h6></h6>

<table id="myTable">
     <tr>
     <th>LRN</th>
     <th>Last Name</th>
     <th>First Name</th>
     <th>Middle Name</th>
     <th>Extension</th>
     <th>Birthday</th>
     <th>Age</th>
     <th>Height</th>
     <th>Weight</th>
     <th>Civil Status</th>
     <th>Nationality</th>
     <th>Place of Birth</th>
     <th>Sex</th>
     <th>Religion</th>
     <th>Contact Number</th>
     <th>Address</th>
     <th>Grade Level</th>
     <th>Track</th>
     <th>Strand</th>
     <th>PSA</th>
     <th>Card</th>
     <th>Picture</th>
     <th>Completion Form</th>
     <th>Contact Person</th>
     <th>Address</th>
     <th>Relation</th>
     <th>Tel. No</th>
     <th>Elem School Name</th>
     <th>School Address</th>
     <th>Year of Completion (Elem)</th>
     <th>JHS School Name</th>
     <th>School Address</th>
     <th>Year of Completion (jhs)</th>
     <th>Date Enrolled</th>
     <th>Status</th>

     </tr>
<?php
$conn = mysqli_connect("localhost", "root", "", "enrollment");
// Check connection



if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM student_info WHERE grlevel='Grade 12' AND strand='Humanities and Social Sciences (HUMMS)'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$address = "Purok" .$row["purok"] . ", " . $row["brgy"] . ", " . $row["municipality"].",".$row["province"];
$student_id = $row["student_id"]; // Assuming this is the student's unique identifier in the database
$statusId = "statusButton_" . $student_id;

echo "<tr><td>" . $row["lrn"]. "</td><td>" . $row["lname"] . "</td><td>" . $row["fname"]. "</td><td>" . $row["mname"]. "</td><td>" . $row["extension"]. "</td><td>" . $row["birthdate"]. "</td><td>" . $row["age"]. "</td><td>" . $row["height"]. "</td><td>" . $row["weight"]. "</td><td>" . $row["cstatus"]. "</td><td>" . $row["nationality"]. "</td><td>" . $row["place_birth"]. "</td><td>" . $row["sex"]. "</td><td>" .$row["religion"]. "</td><td>" .$row["contact"]. "</td><td>" .$address. "</td><td>" .$row["grlevel"]. "</td><td>" .$row["track"]. "</td><td>" .$row["strand"]. "</td><td>" .$row["psa"]. "</td><td>" .$row["formcard"]. "</td><td>" .$row["pics"]. "</td><td>" .$row["complform"]. "</td><td>" .$row["fullname"]. "</td><td>" . $row["caddress"]. "</td><td>" . $row["rel"]. "</td><td>" . $row["cpnum"]. "</td><td>" . $row["schname"]. "</td><td>" . $row["schaddress"]. "</td><td>" . $row["yrcomp"]. "</td><td>" . $row["schnamej"]. "</td><td>" . $row["schaddressj"]. "</td><td>" . $row["yrcompj"]. "</td><td>".$row["date"]. "</td><td> <button id='" . $statusId . "' class='status-button'>Pending</button></td>" . "</button></td>";	

}


echo "</table>";
}
else { echo "0 results"; }

?>
</table>
 </div>
            </div>
        </div>
    </div>
</div>

<!--
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Get all elements with class 'status-button'
    var buttons = document.querySelectorAll(".status-button");

    // Add a click event listener to each button
    buttons.forEach(function (button) {
        button.addEventListener("click", function () {
            // Get the student_id from the button's id
            var studentId = this.id.split("_")[1];

            // Send an AJAX request to update the status
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "update_status.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Update the button text when the status is updated
                    if (xhr.responseText === "1") {
                        button.textContent = "Approved";
                    } else if (xhr.responseText === "0") {
                        button.textContent = "Pending";
                    } else {
                        console.error("Error updating status.");
                    }
                }
            };
            xhr.send("student_id=" + studentId);
        });
    });
});
</script>
-->

<script>
    // Select all buttons with class 'status-button'
    const statusButtons = document.querySelectorAll(".status-button");

    statusButtons.forEach(button => {
        const studentId = button.getAttribute("id").split("_")[1]; // Extract student ID

        // Check if the button was previously approved
        const isApproved = localStorage.getItem("buttonApproved_" + studentId);

        if (isApproved === "true") {
            button.textContent = "Approved";
            button.classList.add("approved");
            button.disabled = true;
        }

        button.addEventListener("click", function () {
            if (!button.classList.contains("approved")) {
                button.textContent = "Approved";
                button.classList.add("approved");
                button.disabled = true;

                // Store the approval state in local storage
                localStorage.setItem("buttonApproved_" + studentId, "true");
            }
        });
    });
</script>





<script src="../plugins/bootstrap.bundle.min.js"></script>
    <script src="../plugins/bootstrap.min.js"></script>
<script src="./index.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.js"></script>



<script>
    $(document).ready(function () {
        $('#myTable').DataTable({
            "order": [[1, "asc"]], // Default sorting (e.g., sorting by Name column)
            "columnDefs": [
                {
                    "targets": [17], // Replace with the correct column index of the Grade Level column
                    "render": function (data, type, row) {
                        // Convert "Grade 11" to 11 and "Grade 12" to 12 for sorting
                        return data.replace("Grade ", "") * 1;
                    }
                }
            ]
        });
    });
</script>
  
</body>
</html>