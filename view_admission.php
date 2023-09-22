<?php
include_once './connection.php';
session_start();
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM student_info WHERE user_id = '$user_id'";
$result = $conn->query($sql);

if ($result) {
    // Assuming there's only one row returned for the user
    $row = mysqli_fetch_assoc($result);
    $userName = $row['fname'];
    $lrn = $row['lrn'];
    $name = $row['fname'] . ' ' . $row['mname'] . ' ' . $row['lname'];
    $grlevel = $row['grlevel'];
    $track = $row['track'];
    $strand = $row['strand'];

} else {
    // Handle the case where the query fails or no data is found
    $userName = "Guest"; // Display a default name
}

?>


<!DOCTYPE html lang=en>
<html>
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <title>Our Lady of the Roses Montessori Learning Center</title>
    <link rel="icon" href="logo.png">   
    <!-- <link  type="text/css" href="./plugins/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./plugins/popper.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>





    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <img src="logo.png" id="logo"alt="Logo"class="navbar-brand" height="auto" width="70">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="nav-title">Our Lady of the Roses Montessori Learning Center</div>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a class="nav-link flex-center" aria-current="page" href="after.php">
              <i class="fa fa-fw fa-home"></i>
                Home
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aboutus.php">About Us</a>
            </li>
            <li class="nav-item">
            <a class="nav-link cursor-pointer" id="logoutbtn" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
            </li> 
          </ul>
        </div>
      </div>
    </nav>
    </head>
<style>
    .navbar{
    background-color:steelblue;
    height: 90px;
    position: fixed;
    z-index: 1;
    width: 100%;
    top: 0;
}
.navbar ul {
      display: flex ;
      justify-content: flex-end;
      margin-left: auto;
      
}

.navbar li  {
      font-size: 16px;
      padding: 10px;
      margin-right: 0px;
}

.nav-link{
      color:antiquewhite;
}

.nav-link:hover{
      color:slategrey;
}

.nav-title{
      color:white;
      font-family:Georgia, 'Times New Roman', Times, serif;
      font-weight: 300;
      font-size: 20px;
}


@media screen and (max-width: 786px) {

      .nav {
        flex-direction: column;
        align-items: center;
      }
      
      .nav-title {
            margin-bottom: 10px;
            /*font-size: 1.5rem;*/
            font-size: 3vw;
          }
          ul {
            flex-direction: column;
          }
    
          li {
            margin-right: 0;
            margin-bottom: 10px;
          }


}

body{
    overflow:scroll;
    margin-top: 100px;
    background-color: ghostwhite;
    padding-bottom: 30px;

}
    .container{
        padding-top: 20px;
        width: 100%;
        background-color:white;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
    }
    hr{
        display: block;
        border: 1px solid black;
    }
    table, th{
        text-align: center;
        color:dimgrey;
        padding: 20px 60px;
        border-collapse: collapse;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .content {
    flex: 1; /* Allow the content to grow and take available space */
    display: flex; /* Use flexbox for the content */
    justify-content: space-between; /* Put space between items */
}
    </style>



    <body>
        <div class="container">
            <div class="content">
            <p id="dateAndTime"></p>
            
            <button type="button" class="btn" id="popover-btn" data-toggle="popover" data-placement="bottom"  data-content="This is where users can change their password."><i class="fa fa-cog" aria-hidden="true"></i>
</button>
            </div>
            <hr>
            <br>
            <h2>Welcome, <?php echo $userName;?> &#10024;</h2>
            <br>
            <br>
            <h5>S.Y. 2023-2024</h5>
            <table>
                <?php

                echo '<thead><tr>';
                echo '<th>LRN</th>';
                echo '<th>Name</th>';
                echo '<th>Grade Level</th>';
                echo '<th>Track</th>';
                echo '<th>Strand</th>';
                echo '<th>Section</th>';
                echo '<th>Status</th>';
                echo '</tr></thead>';

                echo '<tr>';
                echo '<td>' . $lrn.'</td>';
                echo '<td>' . $name.'</td>';
                echo '<td>' . $grlevel.'</td>';
                echo '<td>' . $track.'</td>';
                echo '<td>' . $strand.'</td>';
                echo '<td id="assignedSection" class="text-danger">Pending</td>';
                echo '<td id="approvalStatus"></td>';

    echo '</tr>';
                echo '</tr>';
                
                ?>
            </table>
        </div>
    
    </body>
    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="logout">
                    Are you sure you want to log out?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <a href="logout.php" class="btn btn-primary">Log out</a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="./plugins/bootstrap.bundle.min.js"></script>
    <script src="./plugins/bootstrap.min.js"></script>

    <script>
    // Function to update the date and time in real-time
    function updateDateTime() {
        const currentDate = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric', hour: '2-digit', minute: '2-digit', second: '2-digit' };
        const dateTimeString = currentDate.toLocaleDateString('en-US', options);
        document.getElementById('dateAndTime').textContent = dateTimeString;
    }

    // Update the date and time initially and then every second
    updateDateTime();
    setInterval(updateDateTime, 1000);
</script>


<script>
$(document).ready(function () {
    // Initialize the popover
    $('#popover-btn').popover();
});
</script>

<!-- <script>
    // Assuming you have access to studentId on this page
    var studentId = <?php 
    
    // echo $_SESSION['user_id']; 
    ?>; // Assuming PHP is used to retrieve the student ID
    
    // Retrieve the approval state from local storage
    var approvalState = localStorage.getItem("buttonApproved_" + studentId);
    
    // Display the approval status in the "Status" column
    var approvalStatusElement = document.getElementById("approvalStatus"); // Replace "approvalStatus" with the actual ID of the element you want to update
    if (approvalState === "true") {
        approvalStatusElement.textContent = "Approved";
    } else {
        approvalStatusElement.textContent = "Not Approved";
    }
</script> -->
<script src="./view_admission.js"></script>

</html>