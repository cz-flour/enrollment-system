<?php
    session_start();
?>

<!DOCTYPE html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>Register</title>
    <link rel="icon" href="logo.png">

    <style>
        body {
            background-color: #f8f8f8;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .container h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        .form-control {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
        }

        .form-check-label {
            font-weight: normal;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .forgot-password-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>

    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <img src="logo.png" alt="Logo" class="navbar-brand" height="70" width="70">
                <div class="nav-title">Our Lady of the Roses Montessori Learning Center</div>
            </div>
        </nav>
    </header>
</head>

<body>
<div class="alert">
    <?php
    if(isset($_SESSION['status'])){
        echo "<h4>".$_SESSION['status']."</h4>";
        unset($_SESSION['status']);
    }
    ?>
</div>

<div class="container content">
    <h3>Create an Account</h3>
    <form action="reg_process.php" method="post">
        <?php if(isset($_GET['msg'])){ ?>
            <div class="alert-warning alert"><?php echo $_GET['msg'];?></div>
        <?php } ?>

        <div class="form-group">
            <label for="email">Email address:</label>
            <input type="email" class="form-control" placeholder="Enter email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="pwd" required>
        </div>

        <div class="form-group form-check">
            <label class="form-check-label">
                <input class="form-check-input" type="checkbox" onclick="myFunction()" onchange="togglePasswordVisibility" id="cb">Show password
            </label>
        </div>

        <button type="submit" class="btn btn-primary" id="crtbtn">Create Account</button>

        <div class="forgot-password-link">
            <a href="forgot_password.php">Forgot your password?</a>
        </div>
    </form>
</div>

<script src="js/bootstrap.js"></script>
<script>
    function myFunction() {
        var x = document.getElementById("pwd");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById("pwd");
        const checkbox = document.getElementById("cb");

        if (checkbox.checked) {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>

</body>
</html>
