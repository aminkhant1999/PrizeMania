<?php
    require 'config.php';
    $result = mysqli_query($conn, "SELECT * FROM winner");

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <style>
        label:target {color: green;}
        input:focus[type=text] {background: rgb(92, 135, 143);}
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
        <div class="alert alert-success">
            <h3>Welcome to PrizeMania!!!</h3>
            Today is your day for the chance to win the PRIZES with the biggest Prize of IPHONE 14 PRO MAX!!!
        </div>
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a href="home.php" class="nav-link active"> <i class="fas fa-users"></i> All Users</a>
            </li>
            <li class="nav-item">
                <a href="registration.php" class="nav-link"> <i class="fas fa-user"></i> New User</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"> 
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
        <div class="card mb-4">
            <div class="card-header bg-info text-light"> 
                Here are the PRIZES!!!
            </div>
            <div class="card-body"> 
                <img src="img/iphone14promax.png" alt="iPhone 14 Pro Max photo" width="250" height="300">
                <img src="img/iphone14pro.png" alt="iPhone 14 Pro photo" width="250" height="300">
                <img src="img/ps5.jpg" alt="Playstation 5 photo" width="250" height="320">
                <img src="img/airpodpro2.png" alt="airpod Pro 2 photo" width="250" height="300">
            </div>
        </div>
        </form>
        <hr><br><br>
            <div class="card mb-4">
                <div class="card-header bg-info text-light">Here are the monthly WINNERS!!!</div>
                <table class="table table-bordered table-striped mt-4">
                    <tr>
                        <th>Name</th>
                        <th>Month</th>
                        <th>Prize</th>
                    </tr>
                    <?php    
                        while ($row = mysqli_fetch_array($result))
                        {
                    ?>        
                        <tr>
                            <?php 
                                $name = mysqli_query($conn, "SELECT name FROM user WHERE userid='$row[userid]'");
                                while ($r = mysqli_fetch_array($name))
                                {
                            ?>
                            <td><?php echo $r["name"]; ?></td>
                                <?php } ?>    
                                <td><?php echo date('M', strtotime($row["month"]));?>, <?php echo date('Y', strtotime($row["month"]));?></td>
                                <td><?php echo $row["prize"]; ?></td>
                        </tr>
                    <?php    
                        }
                    ?>
                </table>
            </div>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>