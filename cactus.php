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
		<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="1" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
		</div>
		</form>
	</div>
<?php mysqli_close($db);
	}
?>

<?php
// Check to make sure the id parameter is specified in the URL
if (isset($_GET['id'])) {
    // Prepare statement and execute, prevents SQL injection
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if (!$product) {
        // Simple error to display if the id for the product doesn't exists (array is empty)
        exit('Product does not exist!');
    }
} else {
    // Simple error to display if the id wasn't specified
    exit('Product does not exist!');
}
?>

<div class="product content-wrapper">
    <img src="<?php echo $data["image"]; ?>" width="500" height="500" alt="<?=$product['name']?>">
    <div>
        <h1 class="name"><?=$product['name']?></h1>
        <span class="price">
            &dollar;<?=$product['price']?>
            <?php if ($product['rrp'] > 0): ?>
            <span class="rrp">&dollar;<?=$product['rrp']?></span>
            <?php endif; ?>
        </span>
        <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
            <input type="hidden" name="product_id" value="<?=$product['id']?>">
            <input type="submit" value="Add To Cart">
        </form>
        <div class="description">
            <?=$product['desc']?>
        </div>
    </div>
</div>