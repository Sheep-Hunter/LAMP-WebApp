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
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link href="style2.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<a href="index.php"><h1>JPJ MarketPlace</h1></a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Profile Page</h2>
			<div>
				<p>Your account details are below:</p>
				<table>
					<tr>
						<td>Username:</td>
						<td><?=$_SESSION['login_user']?></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><?=$password?></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><?=$email?></td>
					</tr>
				</table>
			</div>
			<nav>
    		<h1 class="my-5">Hi, <b><?php echo htmlspecialchars($_SESSION["login_user"]); ?></b>. Welcome to our site.</h1>    
    		<p>

       			<a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        		<a href="logout.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    		</p>
			</nav>
		</div>
	</body>
</html>