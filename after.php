
<!DOCTYPE html lang=en>
<html>
<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit(); 

}

?>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <title>Our Lady of the Roses Montessori Learning Center</title>
    <link rel="icon" href="logo.png">   
    <!-- <link  type="text/css" href="./plugins/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./plugins/popper.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <img src="logo.png" alt="Logo" class="navbar-brand" height="70" width="70">
        <div class="nav-title">Our Lady of the Roses Montessori Learning Center</div>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link flex-center bold-text" aria-current="page" href="view_admission.php">
                        <i class="fa fa-fw fa-home"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link bold-text" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item">
            <a class="nav-link flex-center bold-text" id="logoutbtn" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
            </li>  
            </ul>
        </div>
    </div>
</nav>
  </head>

  <style>
    .container{
      align-items: center;
      color: wheat;
    }
    h1{
      align-content: center;
    }
    .content{
      font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }
    .centered-alert {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 400px; /* Adjust the width as needed */
      height: 200px; /* Adjust the height as needed */
      align-content: center;
    }
    .btn{
      color: wheat;
      border: 2px solid #4CAF50;
    }
    .btn:hover{
      
      background-color:mediumseagreen;
      color: wheat;
    }
    .nav-title {
        font-size: 1.5rem; /* Adjust the font size as needed */
    }
    .bold-text {
    font-weight: bold;
}
    
  </style>
          
  <body >



    <?php
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    echo '<div class="alert alert-success">' . $msg . '</div>';
}
?>

    <div class="container">
      <div class="content">
        <img src="logo1.png" alt="logo" class="logo">
        <div class="container-fluid">
  <h1>Our Lady of the <br>
    Roses Montessori Learning Center</h1>
    <div id="texxx">
      <h6>Senior High School</h6>
  <p>Online Enrollment System</p>
  <div class="container-fluid">
      <a href="view_admission.php"><button type="button" class="btn">View Admission</button></a>
      </div></div>
</div>

      </div>
      
    </div>
   
    <div class="alert alert-light alert-dismissible centered-alert" role="alert" id="alertmsg">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  Thank you for submitting your enrollment form. 

We appreciate your interest and will review your application shortly. If you have any questions, please let us know. Have a great day!
</div>


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
    

    <script>
$(document).ready(function(){
  // Show the alert when the page loads
  $("#myAlert").fadeIn();
});
</script>
    <script src="./plugins/bootstrap.bundle.min.js"></script>
    <script src="./plugins/bootstrap.min.js"></script>

  </body> 
</html>