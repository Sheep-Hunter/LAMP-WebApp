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


<?php
include "config.php";
$records = mysqli_query($db,"SELECT * FROM products WHERE category = 'cactus'");
while($data = mysqli_fetch_array($records))
{
?>
	<div class="product-item">
		<form method="post" action="index.php?action=add&code=<?php echo $data["id"]; ?>">
		<div class="product-image"><img src="<?php echo $data["image"]; ?>"></div>
		<div class="product-tile-footer">
		<div class="product-title"><?php echo $data["name"]; ?></div>
		<div class="product-price"><?php echo $data["price"]; ?></div>
		<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
		</div>
		</form>
	</div>
<?php mysqli_close($db);
	}
?>