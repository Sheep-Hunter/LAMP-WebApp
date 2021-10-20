<?php
   include("config.php");
   session_start();

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link href="style2.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        
	</head>
<body class="loggedin">
    <nav class="navtop">
        
        <div class = row>
            <div class="column">
            <a href="index.php"><h1>JPJ MarketPlace</h1></a>
            </div>
            <div class="column">
            </div>

            <div class="column">
            <a href="/">Home</a>
            <?php
                if(isset($_SESSION['loggedin'])){
                    echo '<a style="float:right" href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
			        <a style="float:right" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>';
                }                   
                else {
                    echo '<a style="float:right" href="/login.php">Login</a>
                    <a style="float:right" href="/signup.php">signup</a>';}
            ?>     
            </div>                 
        </div>

    </nav class="content">

    <div class='row'>
        
    <div class='column'>
        <div class='polaroid'>
                <img src="/images/cat1.jpeg" />
            
            <div class='container'><a href="/delllaptop.php"><h1>Dell Laptop</h1></a></div>
        </div>
    </div>


    <div class='column'>
        <div class='polaroid'>
            <img src="/images/cat1.jpeg" />
            
            <div class='container'><a href="/cactus.php"><h1>Cactus</h1></a></div>
        </div>
                </div>
    </div>
</body>
</html>