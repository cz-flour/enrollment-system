<!DOCTYPE html lang=en>
<html>

<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.css">
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
            .container{
                background-color: white;
                border-radius: 9px;
                display: flex;
            }
            .content{
                width: 100%;
            }
            .column{
                display: flex;
                align-items: center;
                justify-content: center;
            }
            h3{
                padding-left: 8px;
            }
            table, th, td{
        text-align: center;
        padding:  10px 50px;
        border-collapse: collapse;
        font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        border: 1px solid black;
    }
            
          </style>
<body>
    <div   class="container allContent-section py-4">
        <div class="row">
            <div class="col-sm-3">

                <!-- SIDEBAR -->
                <?php include "./sidebar.php";  ?>
                
            </div>
                <!-- MAIN CONTENT -->
                <div id="content" class="container-fluid col-12">
                <div class="container">
    <div class=" bg-transparent" style="color: light;">
               <h3 style="margin-left:300px;">USERS</h3>
               <table id="mytable">
                    <tr>
                        <th>No.</th>
                        <th>Email</th>
                        <th>Name</th>
                    </tr>

                    <?php
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT u.email, u.user_id,CONCAT(s.fname, ' ', s.mname, ' ', s.lname) AS name
        FROM user u
        LEFT JOIN student_info s ON u.user_id = s.user_id
        WHERE u.is_admin = '0'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $rowNumber = 1; // Initialize a row counter

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$rowNumber."</td><td>" . $row["email"] . "</td><td>";
        
        // Check if the name is NULL and display a placeholder if needed
        if ($row["name"] !== null) {
            echo $row["name"];
        } else {
            echo "No name available";
        }
        
        echo "</td>";
        echo '<td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal' . $row["user_id"] . '">Delete</button></td></tr>';
        $rowNumber++;

        echo '<div id="myModal' . $row["user_id"] . '" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">User Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Email: ' . $row["email"] . '</p>';

// Check if the name is NULL in the modal body and display a message if needed
if ($row["name"] !== null) {
    echo '<p>Name: ' . $row["name"] . '</p>';
} else {
    echo '<p>Name: No name available</p>';
}

// Additional user details can be added here

echo '</div></div></div></div>';

    }

    echo "</table>";
} else {
    echo "0 results";
}

?>

               </table>
    </div>
    </div>
                </div>


    
    <script src="./plugins/bootstrap.bundle.min.js"></script>
    <script src="./plugins/bootstrap.min.js"></script>

                    
                </div>
            </div>
      


<script src="./index.js"></script>
</body>
</html>