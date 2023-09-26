
<!DOCTYPE html lang=en>
<html>
    <?php
session_start();

?>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <title>Our Lady of the Roses Montessori Learning Center</title>
    <link rel="icon" href="logo.png">   
    <!-- <link  type="text/css" href="./plugins/bootstrap.min.css"> -->
    <script src="./plugins/popper.min.js"></script>


<nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <img src="logo.png" alt="Logo"class="navbar-brand" height="70" width="70">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="nav-title">Our Lady of the Roses Montessori Learning Center</div>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a class="nav-link flex-center bold-text" aria-current="page" href="view_admission.php">
              <i class="fa fa-fw fa-home"></i>
                Home
              </a>
            </li>
            <li class="nav-item">
              <!-- <a class="nav-link" href="aboutus.php">About Us</a> -->
              <li class="nav-item">
            <a class="nav-link flex-center bold-text" id="logoutbtn" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
            </li> 
            </li>
            <li class="nav-item">
            <!-- <a class="nav-link cursor-pointer" id="logoutbtn" data-bs-toggle="modal" data-bs-target="#logoutModal"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a> -->
            </li> 
          </ul>
        </div>
      </div>
    </nav>

  </head>
          <style>
            .container{
                margin-top: 110px;
                background-color: white;
                opacity: 0.8;
                border-radius: 9px;
                padding-bottom: 10px;
                padding-top: 10px;
                font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }
            .grid{
              display: flex;
              flex-wrap: wrap;
              justify-content: space-evenly;
            }
            .navbar-brand {
        display: flex;
        align-items: center;
    }

    .nav-title {
        font-size: 1.5rem; /* Adjust the font size as needed */
    }
    .bold-text {
    font-weight: bold;
}
          </style>
  <body >

        <div class="container">
<br>
<br>
        <div class="grid" style="--bs-rows: 2; --bs-columns: 2;">
        <div class="g-col-6">
          <h4>MISSION</h4>
          <p style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">tioiyfyuiyiffiy</p>
        </div>
        <div class="g-col-6">
          <h4>VISION</h4>
          <p style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">tioiyfyuiyiffiy</p>
        </div>
       
        </div>

        <div class="grid" style="--bs-rows: 2; --bs-columns: 2;">
        <div class="g-col-6">
          <h4>PHILOSOPHY</h4>
          <p style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">tioiyfyuiyiffiy</p>
        </div>
        <div class="g-col-6">
          <h4>OBJECTIVES</h4>
          <p style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">tioiyfyuiyiffiy</p>
        </div>
       
        </div>
        <br>
        <br>
        <br>
        <center><h2>PROGRAMS OFFERED</h2>
        <h6 style="font-family:Georgia, 'Times New Roman', Times, serif;">Senior High School</h6>
        <br>
            <p>ACADEMIC TRACK <i class="fa fa-book" aria-hidden="true"></i>
            <ul class="bullet-paragraph" style="font-family:Arial, Helvetica, sans-serif;">
                  <li>Humanities and Social Sciences (HUMMS)</li>
                  <li>General Academic Strand (GAS)</li>
            </ul>
            </p>
            <p>Technical Vocational Livelihood (TVL) <i class="fa fa-wrench" aria-hidden="true"></i>
            <ul class="bullet-paragraph" style="font-family:Arial, Helvetica, sans-serif;">
                <li>Automotive Servicing</li>
                <li>Computr Servicing Services</li>
                <li>Electrical Installation and Maintenance</li>
            </ul>
            </p></center>
<br>
            <center><p>You may contact us through:
              <br>
              <i class="fa fa-envelope" aria-hidden="true"></i> 
olrmlcc1952@gmail.com
<br>
<i class="fa fa-phone" aria-hidden="true"></i> 0917 551 6650
<br>
            <a href="https://www.facebook.com/olrmlcc1953" target="_blank" class="btn">
  <i class="fa fa-facebook-square" aria-hidden="true"></i> Our Lady of the Roses Montessori Learning Center
</a>
<br>
Or may inquire at OLRM office at Ilaor Sur, Oas, Albay

</p></center>
            </div>


    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="logout">
                    Are you sure you want to log out?<br>
                    All data will be erased.
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

  </body> 
</html>