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
        <style>
body {margin:25px;}

div.polaroid {
  width: 25%;
  background-color: white;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  margin-bottom: 25px;
}

img {width: 50%}

div.container {
  text-align: center;
  padding: 10px 20px;
}
</style>
	</head>
<body class="loggedin">
    <nav class="navtop">
        
        <div>
            <a href="index.php"><h1>JPJ MarketPlace</h1></a>
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

    </nav class="content">

    <div class='items'>

        <div class='polaroid'>
                <img src="/images/cat1.jpeg" />
            
            <div class='container'><a href="/delllaptop.php"><h1>Dell Laptop</h1></a></div>
        </div>

        <div class='polaroid'>
            <img src="/images/cat1.jpeg" />
            
            <div class='container'><a href="/cactus.php"><h1>Cactus</h1></a></div>
        </div>
    </div>
</body>
</html>