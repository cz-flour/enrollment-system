
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
    <!-- <link  type="text/css" href="./plugins/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./plugins/popper.min.js"></script>



    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">
        <img src="logo.png" alt="Logo"class="navbar-brand" height="auto" width="70">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="nav-title">Our Lady of the Roses Montessori Learning Center</div>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
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
    .button{
      display: flex;
      align-items: center;
      justify-content: center;
}
.register-button, .login-button{
      font-size: 20px;
      background-color: transparent;
      border: 2px solid #dcdfdc;
      color: antiquewhite;
      cursor: pointer;
      transition-duration: 0.2s;
      margin-left: 0px;
      margin-top: 20px;
      padding: 20px 30px;
}
.center-text {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 100vh;
}
.navbar-brand {
        display: flex;
        align-items: center;
    }

    .nav-title {
        font-size: 1.5rem; /* Adjust the font size as needed */
    }
  </style>
          
  <body >



  <div class="message">
        <?php
     if (isset($_GET['msg'])) {
      $msg = $_GET['msg'];
      echo '<div class="alert alert-success">' . $msg . '</div>';
  }else{
    // $msg="Error: " . $sql . "<br>" . mysqli_error($conn);
  }
        ?>
    </div>

    <?php
if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    echo '<div class="alert alert-success">' . $msg . '</div>';
}
?>

    <div class="container">
      <div class="content">
        <!-- <img src="logo1.png" alt="logo" class="logo"> -->
        <div class="container-fluid">
        <div class="center-text">
  <h1>Email not yet verified! <br>
        </h1>
</div>

      </div>
</div>
</div>
      </div>


      
           
        <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-primary" id="exampleModalLabel">Login</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="login.php" method="post">
                    <div class="form-group">
                        <label for="email" class="text-secondary">Email:</label>
                        <input type="text" placeholder="Enter email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd" class="text-secondary">Password:</label>
                        <input type="password" placeholder="Enter Password" class="form-control" id="pwd" name="pwd" required>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Login</button>
                    </div>
                    
                </form>
            </div>
            
        </div>
    </div>
</div>
    </div> 
    </div>
   

    
    <script src="./plugins/bootstrap.bundle.min.js"></script>
    <script src="./plugins/bootstrap.min.js"></script>

  </body> 
</html>