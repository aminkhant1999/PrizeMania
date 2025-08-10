<?php
    require 'config.php';
    if(isset($_POST["submit"])){
        $email = $_POST["email"];
        $password = $_POST["pwd"];
        $result = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email='$email'");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0) 
        {
            if($password == $row["admin_pwd"])
            {
                $_SESSION["login"] = true;
                header("Location:admincontrol.php");
            }
            else echo "<script> alert('Wrong Password'); </script>";
        }
        else echo "<script> alert('Wrong Email'); </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Log In</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <style>
        label:target {color: green;}
        input:focus[type=text], input:focus[type=password] {background: rgb(52, 159, 178);}
    </style>
</head>
<body>  
    <div class="navbar navbar-expand-lg bg-primary navbar-dark">
        <a href="home.php" class="navbar-brand">PrizeMania</a>
        <ul class="navbar-nav"> 
            <li class="nav-item">
                <a href="home.php" class="nav-link active"> <i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
                <a href="about.html" class="nav-link">About</a>
            </li>
            <li class="nav-item">
                <a href="contact.html" class="nav-link">Contact Us</a>
            </li>
        </ul>
    </div>
    <div class="container">
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a href="home.php" class="nav-link"> <i class="fas fa-users"></i> All Users</a>
            </li>
            <li class="nav-item">
                <a href="registration.php" class="nav-link"> <i class="fas fa-user"></i> New User</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown"> 
                    <i class="fas fa-user-circle"></i> 
                    Login
                </a>
                <div class="dropdown-menu">
                    <a href="login.php" class="dropdown-item">User Login</a>
                    <a href="adminlogin.php" class="dropdown-item">Admin Login</a>
                </div>
            </li>
        </ul>
        <br>
        <div class="container"><h1 style="color: blue">Admin Log In</h1></div><br>
        <form class="mb-4" action="" method="post" autocomplete="off"> 
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" name="pwd" id="pwd" class="form-control" required>
            </div>
            <button type="submit" name="submit" class="btn btn-primary"> <i class="fas fa-paper-plane"></i> Log In</button>
            <input type="reset" value="Clear" class="btn btn-secondary">
        </form>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>