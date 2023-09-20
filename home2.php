
<!DOCTYPE html lang=en>
<html>
    
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style.css"> 
    <title>Our Lady of the Roses Montessori Learning Center</title>
    <link rel="icon" href="logo.png">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./plugins/popper.min.js"></script>
    

    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <img src="logo.png" alt="Logo"class="navbar-brand" height="70" width="70">
        
        <div class="nav-title">Our Lady of the Roses Montessori Learning Center</div>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item ">
              <a class="nav-link flex-center" aria-current="page" href="home2.php">
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



<!-- Hidden content for the popover -->
<div id="popoverContent" style="display: none;">
    <p id="emailPlaceholder">Loading...</p>
    <button type="button" class="btn btn-danger" id="logoutBtn">Logout</button>
</div>

      <style>
        h1{
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-size: 50px;
            text-align: left;
            margin-left: 50px;
            color:beige;
            margin-top: 200px;
        }
        p{
          font-size: 30px;
          margin-left: 50px;
          color: #dcdfdc;
          font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        h6{
          font-size: 40px;
          margin-left: 50px;
          color: #dcdfdc;
          font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

        }
        .stupics{
          float: right;
          width: 35%;
          padding-top: 0px;
        }

      .get-started{
      border-radius: 10px;
      padding: 20px 30px;
      font-size: 20px;
      background-color: transparent;
      border: 2px solid #dcdfdc;
      color: antiquewhite;
      cursor: pointer;
      margin: 0 20px;
      transition-duration: 0.2s;
      margin-left: 50px;
}

.get-started:hover{
      opacity: 0.7;
      background-color:mediumseagreen;
      color: black;
}
        
      </style>   

  <body >



    <div class="col-md-6">
    <h1>Welcome to Our Lady of the <br>
    Roses Montessori Learning Center</h1>
    <div>
      <h6>Senior High School</h6>
  <p>Online Enrollment System</p>
  <a href="gs.php"><button type="button " class="btn get-started">
           Get Started
        </button></a>  
</div>
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
    
    <script src="./plugins/bootstrap.bundle.min.js"></script>
    <script src="./plugins/bootstrap.min.js"></script>

  </body> 

</html>