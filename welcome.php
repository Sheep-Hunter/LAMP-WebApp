<?php
    session_start();
    include('config.php');
    if(!isset($_SESSION['loggedin']) || $_SESSION["loggedin"] !== true){
        header('Location: login.php');
        exit;
    } else {
        // Show users the page!
    }




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="style2.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body class="loggedin">
<nav class="navtop">

		<div>
			<a href="index.php"><h1>Webs</h1></a>
			<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
			<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
		</div>
	
</nav>

</body>
</html>