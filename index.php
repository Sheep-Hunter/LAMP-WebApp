<?php
   include("config.php");
   session_start();

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>JPJ MarketPlace</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link href="style2.css" rel="stylesheet" type="text/css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body class="loggedin">
    <nav class="navtop">
        <b>JPJ MarketPlace</b>
        <div>
            <a href="/">Home</a>

            <?php
                if(isset($_SESSION['loggedin'])){
                    echo '<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
			        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>';
                }
                   
                else {
                    echo '<a href="/login.php">Login</a>
                    <a href="/signup.php">signup</a>';}
            ?>
           
           
        </div>

    </nav>

    <div class='items'>

        <div id='item'>
            <a href="/delllaptop.php"><h1>Dell Laptop</h1></a>
            <img src="/images/cat1.jpeg" />
        </div>

        <div id='item'>
            <a href="/cactus.php"><h1>Cactus</h1></a>
            <img src="/images/cat1.jpeg" />
        </div>
    </div>
</body>
</html>