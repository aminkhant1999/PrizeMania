<?php
    require 'config.php';
    if(isset($_POST["submit"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        $c_pwd = $_POST["c_pwd"];
        $acc_no = $_POST["acc_no"];
        $gender = $_POST["gender"];
        $age = $_POST["age"];
        $ph_no = $_POST["ph_no"];
        $address = $_POST["address"];
        
        $acc = mysqli_query($conn, "SELECT * FROM bank WHERE acc_no = '$acc_no'");
        $row = mysqli_fetch_assoc($acc);

        $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
        
        if(mysqli_num_rows($acc) > 0) 
        {
            if($acc_no == $row["acc_no"])
            {
                if(mysqli_num_rows($duplicate) > 0)   {echo "<script> alert('Email is already taken'); </script>";}
                else 
                {
                    if($pwd == $c_pwd) 
                    {
                        $query = "INSERT INTO user(`name`, `email`, `pwd`, `acc_no`, `gender`, `age`, `ph_no`, `address`) VALUES('$name', '$email', '$pwd', '$acc_no', '$gender', '$age', '$ph_no', '$address')";
                        mysqli_query($conn,$query);
                        echo "<script> alert('Signed Up Successfully.'); </script>";
                    }
                    else echo "<script> alert('Password Does Not Match!'); </script>";
                }    
            }
            else echo "<script> alert('Something Wrong With Your Account'); </script>";
        }
        else echo "<script> alert('Bank Account Not Registered'); </script>"; 
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <style>
        label:target {color: green;}
        input:focus[type=text], input:focus[type=password], textarea:focus[id=address] {background: rgb(52, 159, 178);}
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
                <a href="registration.php" class="nav-link active"> <i class="fas fa-user"></i> New User</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> 
                    <i class="fas fa-user-circle"></i> 
                    Users
                </a>
                <div class="dropdown-menu">
                    <a href="login.php" class="dropdown-item">User Login</a>
                    <a href="adminlogin.php" class="dropdown-item">Admin Login</a>
                </div>
            </li>
        </ul>
        <br>
        <div class="container"><h1 style="color: blue">Sign Up</h1></div><br>
        <form class="mb-4" action="" method="post" autocomplete="off"> 
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" name="pwd" id="pwd" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="c_pwd">Confirm Password:</label>
                <input type="password" name="c_pwd" id="c_pwd" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="acc_no">Account No:</label>
                <input type="text" name="acc_no" id="acc_no" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" name="gender" required>
                    <option selected disabled>-- select --</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" name="age" id="age" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="ph_no">Phone No:</label>
                <input type="text" name="ph_no" id="ph_no" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" id="address" class="form-control"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary"> <i class="fas fa-paper-plane"></i> Sign Up</button>
            <input type="reset" value="Clear" class="btn btn-secondary">
        </form>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>