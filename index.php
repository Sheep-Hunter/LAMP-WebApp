<?php
   include("config.php");
   session_start();

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <title>JPJ MarketPlace</title>
    <link rel='stylesheet' href='/style.css'/>
    <link href="style2.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
    <nav>
        <b>JPJ MarketPlace</b>
        <div class="right">
            <a href="/">Home</a>

            <?php
                if(isset($_SESSION['id'])){
                   echo '<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
			        <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>';
                }
                   
                else {echo '<a href="/login.php">Login</a>
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