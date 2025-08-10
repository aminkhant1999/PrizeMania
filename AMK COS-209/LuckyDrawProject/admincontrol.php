<?php
    require 'config.php';
    if(isset($_POST["generate"])){
    $query = "SELECT t_cat_id FROM ticket_category WHERE year(t_cat_date)=year(CURDATE()) AND month(t_cat_date)=month(CURDATE())";
    $result = $conn->query($query);
    while ($row = $result->fetch_assoc()) 
    {
        $t_cat_id = $row["t_cat_id"];
    }
    // echo "<script> alert($t_cat_id); </script>";

    $min = $min= 2002;
    $result = mysqli_query($conn,"SELECT * FROM purchase WHERE t_cat_id=$t_cat_id");
    while ($row = mysqli_fetch_array($result)) 
    { 
        $row["t_id"];
        if($row["t_id"]>$max) $max = $row["t_id"];
    }
    // echo "<script> alert($min); </script>";
    // echo "<script> alert($max); </script>";
    }
?>    

<?php
    if(isset($_POST["submit"]))
    {
        $podpro2 = $_POST["podpro2"];
        $ps5 = $_POST["ps5"];
        $i14pro = $_POST["i14pro"];
        $i14promax = $_POST["i14promax"];

        $query = "SELECT userid FROM purchase WHERE t_id='$podpro2'";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) 
        {
            $userid = $row["userid"];
        }
        $sql = "INSERT INTO winner(`userid`, `t_id`, `month`, `prize`) VALUES ($userid,$podpro2,CURDATE(),'Airpod Pro 2')";
        if (!mysqli_query($conn, $sql))  
        echo "<script>alert('Fail Choosing Winner.')</script>";

        $query = "SELECT userid FROM purchase WHERE t_id='$ps5'";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) 
        {
            $userid = $row["userid"];
        }
        $sql = "INSERT INTO winner(`userid`, `t_id`, `month`, `prize`) VALUES ($userid,$ps5,CURDATE(),'PlayStation 5')";
        if (!mysqli_query($conn, $sql))  
        echo "<script>alert('Fail Choosing Winner.')</script>";

        $query = "SELECT userid FROM purchase WHERE t_id='$i14pro'";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) 
        {
            $userid = $row["userid"];
        }
        $sql = "INSERT INTO winner(`userid`, `t_id`, `month`, `prize`) VALUES ($userid,$i14pro,CURDATE(),'iPhone 14 Pro')";
        if (!mysqli_query($conn, $sql))  
        echo "<script>alert('Fail Choosing Winner.')</script>";

        $query = "SELECT userid FROM purchase WHERE t_id='$i14promax'";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) 
        {
            $userid = $row["userid"];
        }
        $sql = "INSERT INTO winner(`userid`, `t_id`, `month`, `prize`) VALUES ($userid,$i14promax,CURDATE(),'iPhone 14 Pro Max')";
        if (!mysqli_query($conn, $sql))  
        echo "<script>alert('Fail Choosing Winner.')</script>";
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Control</title>
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
                <a href="registration.php" class="nav-link"> <i class="fas fa-user"></i> New User</a>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown"> 
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
        <div class="container"><h1 style="color: blue">Admin Control</h1></div><br>
        <form class="mb-4" action="" method="post" autocomplete="off"> 
            <div class="form-group">
                <label for="w_ticket">Winner Ticket:</label>
                <!-- <input type="text" name="w_ticket" id="w_ticket" class="form-control" readonly> <br> -->
            </div>
            <button type="submit" name="generate" id="generate" class="btn btn-primary">Generate</button> <br><br>
            <div class="form-group">
                <label for="podpro2">Ticket ID for AirPod Pro2 Winner:</label>
                <input type="text" name="podpro2" id="podpro2" class="form-control">
            </div>
            <div class="form-group">
                <label for="ps5">Ticket ID for PlayStation 5 Winner:</label>
                <input type="text" name="ps5" id="ps5" class="form-control">
            </div>
            <div class="form-group">
                <label for="i14pro">Ticket ID for iPhone 14 Pro Winner:</label>
                <input type="text" name="i14pro" id="i14pro" class="form-control">
            </div>
            <div class="form-group">
                <label for="i14promax">Ticket ID for iPhone 14 Pro Max Winner:</label>
                <input type="text" name="i14promax" id="i14promax" class="form-control">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Go</button>
        </form>
    </div>
    <script src="jscript.js"></script>
    <!-- <script>
        btn.addEventListener('click', () => {
        // output.innerText = getRandomNumber(<?php //$min ?>,<?php //$max ?>);
        alert(getRandomNumber(1002,1010));

    });
    </script> -->
    <?php 
    echo "<script> btn.addEventListener('click', () => {alert(getRandomNumber($min,$max)); });</script>"; ?>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>