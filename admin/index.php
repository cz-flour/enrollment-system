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
    <script src="./plugins/popper.min.js"></script>
    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

<head>
<?php
    session_start();
    include_once "connection.php";
    
    
    //include_once "./config/dbconnect.php";
?> 
</head>
 
<style>
  .card{
    margin-left: 100px;
    margin-top: 80px;
    border-color: black;
    border: 1px solid #333;
    width: 200px;
    padding: 10px 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    background-color: aliceblue;
  }
  table, td {
border-collapse: collapse;
color: #808080;
font-family: monospace;
font-size: 15px;
text-align: center;
border: 1px solid #ddd;
padding: 10px 15px;
justify-content: center;
align-items: center;
margin-left: 300px;

}
th {
background-color:#2F539B;
color: white;
border: 1px solid #ddd;
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
                <div style="display: flex;flex-wrap: wrap;justify-content: space-evenly">
                    <div class="col-md-4">
                        <div class="card " style="text-align:center;" >
                            <i class="fa fa-users  mb-2" style="font-size: 50px;"></i>
                            <h4 style="color:black;">Total Users:</h4>
                            <h3>
                                <?php
                                     $sql = "SELECT COUNT(*) as user_count FROM user";
                                     $result = $conn->query($sql);

                                     if ($result->num_rows > 0) {
                                         $row = $result->fetch_assoc();
                                        echo  $row["user_count"];
                                     } else {
                                         echo "No users found.";
                                     } 
                                ?>
                            </h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" id="card1" style="text-align:center;">
                            <i class="fa fa-users  mb-2" style="font-size: 50px;"></i>
                            <h4 style="color:black;">Total Grade 11 Students</h4>
                            <h3>
                                <?php
                                $sql = "SELECT COUNT(*) as grade_11_count FROM student_info WHERE grlevel = 'Grade 11'";
                                        $result = $conn->query($sql);
    
                                        if ($result->num_rows > 0) {
                                            $row = $result->fetch_assoc();
                                           echo $row["grade_11_count"];
                                        } else {
                                            echo "No Grade 11 students found.";
                                       }
                                        ?>
                            </h3>
                        </div>
                    </div>
    
                    <div class="col-md-4">
                        <div class="card" id="card1" style="text-align:center;">
                            <i class="fa fa-users  mb-2" style="font-size: 50px;"></i>
                            <h4 style="color:black;">Total Grade 12 Students</h4>
                            <h3>
                                <?php
                                 $sql = "SELECT COUNT(*) as grade_11_count FROM student_info WHERE grlevel = 'Grade 12'";
                                       $result = $conn->query($sql);
    
                                     if ($result->num_rows > 0) {
                                          $row = $result->fetch_assoc();
                                            echo $row["grade_11_count"];
                                       } else {
                                           echo "No Grade 12 students found.";
                                       }
    
                                    
                            ?>
                            </h3>
                        </div>
                    </div> 
                </div> 

                  </div>
                </div>
        </div>
    </div>
<br>
<br>
<hr>
    
<!--
    <div id="deleteModal" class="modal">
    <div class="modal-content">
        <p>Are you sure you want to delete this user?</p>
        <button onclick="deleteUserConfirmed()">Yes</button>
        <button onclick="closeDeleteModal()">No</button>
    </div>
</div>
-->
<script>
function openDeleteModal(userId) {
    var modal = document.getElementById('deleteModal');
    modal.style.display = 'block';

    // Pass the user ID to the modal so you can use it when confirming deletion
    modal.setAttribute('data-user-id', userId);
}

function closeDeleteModal() {
    var modal = document.getElementById('deleteModal');
    modal.style.display = 'none';
}

function deleteUserConfirmed() {
    var modal = document.getElementById('deleteModal');
    var userId = modal.getAttribute('data-user-id');

    // Send an AJAX request to a PHP script to delete the user
    // You can implement the PHP script to perform the actual deletion
    // Here, we'll just display a confirmation message for demonstration purposes
    alert("User with ID " + userId + " deleted successfully.");

    // Close the modal
    modal.style.display = 'none';
}
</script>



<script src="./index.js"></script>
</body>
</html>