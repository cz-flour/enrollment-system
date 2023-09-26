<!DOCTYPE html lang=en>
<html>
<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: view_admission.php");
    exit(); 

}
// else{
//     header("location: home.php");

// }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./plugins/popper.min.js"></script>
</head>

<style>
    .container {
        align-items: center;
        color: wheat;
    }

    h1 {
        align-content: center;
    }

    .content {
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    }

    .button {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .register-button,
    .login-button {
        font-size: 20px;
        background-color: transparent;
        border: 2px solid #dcdfdc;
        color: antiquewhite;
        cursor: pointer;
        transition-duration: 0.2s;
        margin-left: 15px;
        margin-top: 20px;
        padding: 20px 30px;
        text-align: left; 
        
    }
    .forgot-password-link {
    margin-top: 5px; /* Add margin above the "Forgot your password?" link */
    padding: 5px; /* Add padding around the text */
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

<body>
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
        <img src="logo.png" alt="Logo" class="navbar-brand" height="70" width="70">
        <div class="nav-title">Our Lady of the Roses Montessori Learning Center</div>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                    <a class="nav-link flex-center bold-text" aria-current="page" href="home.php">
                        <i class="fa fa-fw fa-home"></i>
                        Home
                    </a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link bold-text" href="aboutus.php">About Us</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link cursor-pointer ml-auto bold-text"  id="loginbtn" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>

                    </li>
            </ul>
        </div>
    </div>
</nav>


    
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
                <h1>Our Lady of the <br> Roses Montessori Learning Center</h1>
                
                <div id="texxx">
                <!-- <div class="alert">
    <?php
    if (isset($_SESSION['status'])) {
        echo "<h4>" . $_SESSION['status'] . "</h4>";
        unset($_SESSION['status']); 
    }
    ?>
</div> -->
                    <h6>Senior High School</h6>
                    <p>Online Enrollment System</p>
                    <div class="button">
                        <a href="register.php"><button class="register-button" href="register.php">Register Now</button> </a>
                        <!-- Button trigger modal -->
                        <button type="button " class="btn register-button " data-bs-toggle="modal"
                            data-bs-target="#loginModal">
                            Log in
                        </button>
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
                                <input type="text" placeholder="Enter email" class="form-control" id="email" name="email"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="pwd" class="text-secondary">Password:</label>
                                <input type="password" placeholder="Enter Password" class="form-control" id="pwd"
                                    name="pwd" required>
                            </div>
                            <div class="forgot-password-link">
        <a href="forgot_password.php">Forgot your password?</a>
    </div>
    <div class="modal-footer">
                        <button type="submit"  class="btn btn-success">Login</button>
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
