<?php
    require 'config.php';
    if (isset($_POST["submit"])) 
    {
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $userID = $_SESSION["userid"];

        $query = "SELECT acc_no FROM user WHERE userid='$userID'";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) 
        {
            $bank_acc = $row["acc_no"];
        }

        $query = "SELECT * FROM bank WHERE acc_no='$bank_acc'";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) 
        {
            $balance = $row["balance"];
        }
        if ($balance < $price) echo ("<script>alert('Not enough balance')</script>");
        else 
        {
            $balance -= $price;
            $sql = "UPDATE bank SET balance='$balance' WHERE acc_no='$bank_acc'";
            if (mysqli_query($conn, $sql))  echo "<script>alert('Your purchase is successful')</script>";
        }

        $query = "SELECT t_cat_id FROM ticket_category WHERE year(t_cat_date)=year(CURDATE()) AND month(t_cat_date)=month(CURDATE())";
        $result = $conn->query($query);
        while ($row = $result->fetch_assoc()) 
        {
            $t_cat_id = $row["t_cat_id"];
        }
        for ($x = 1; $x <= $quantity; $x++) 
        {
            $sql = "INSERT INTO `ticket`(`t_cat_id`) VALUES ($t_cat_id)";       
            if (!mysqli_query($conn, $sql))  
            echo "<script>alert('Fail buying')</script>";
            
            $query = "SELECT t_id FROM ticket WHERE t_cat_id='$t_cat_id'";
            $result = $conn->query($query);
            while ($row = $result->fetch_assoc()) 
            {
                $t_id = $row["t_id"];
            }

            $sqll = "INSERT INTO `purchase`(`userid`, `t_id`, `t_cat_id`, `p_date`) VALUES ($userID,$t_id,$t_cat_id,CURDATE())";
            if (!mysqli_query($conn, $sqll))  
            echo "<script>alert('Fail buyin')</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Purchase Tickets</title>
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
        <div class="container"><h1 style="color: blue">Purchase Tickets</h1></div><br>
        <form class="mb-4" action="" method="post"> 
            <div class="form-group">
                <label for="quantity">Ticket Quantity:</label>
                <input type="number" name="quantity" id="quantity" class="form-control" min="1" value="1" required>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" id="price" value="20000" class="form-control" readonly>
            </div>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Buy</button>
            <button type="submit" name="logout" class="btn btn-secondary"><a href="logout.php" style="color: white;">Log Out</a></button>
        </form>
    </div>
    <script>
        const qty = document.getElementById("quantity")
        const price = document.getElementById('price')
        qty.addEventListener('change', () => {
            price.value = parseInt(qty.value) * 20000
        })
    </script>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>