<html>
<head>
  <title>Cactus Products</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel='stylesheet' href='/style.css'/>
  <link href="style2.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>
      <nav class="navtop">
        
        <div>
             <a href="index.php"><h1>JPJ MarketPlace</h1></a>
              <a href="/">Home</a>
                <?php
                    if(isset($_SESSION['loggedin'])){
                        echo '<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
                              <a href="shopping_cart.php"><i style="font-size:24px" class="fa">&#xf07a;</i></a>
                              <a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>';
                    }                   
                    else {
                        echo '<a href="/login.php">Login</a>
                              <a href="/signup.php">signup</a>';}
                ?>                      
        </div>
      </nav>
                    
                    
                    
</body>           
</html>