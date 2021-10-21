<?php
session_start();
include('config.php');
$status="";
if (isset($_POST['name']) && $_POST['name']!=""){
$name = $_POST['name'];
$result = mysqli_query(
$con,
"SELECT * FROM products WHERE name='$name'"
);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$price = $row['price'];
$image = $row['image'];

$cartArray = array(
	$code=>array(
	'name'=>$name,
	'price'=>$price,
	'quantity'=>1,
	'image'=>$image)
);

if(empty($_SESSION["shopping_cart"])) {
    $_SESSION["shopping_cart"] = $cartArray;
    $status = "<div class='box'>Product is added to your cart!</div>";
}else{
    $array_keys = array_keys($_SESSION["shopping_cart"]);
    if(in_array($code,$array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Product is already added to your cart!</div>";	
    } else {
    $_SESSION["shopping_cart"] = array_merge(
    $_SESSION["shopping_cart"],
    $cartArray
    );
    $status = "<div class='box'>Product is added to your cart!</div>";
	}

	}
}
?>

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
                <?php
                  if(!empty($_SESSION["shopping_cart"])) {
                    $cart_count = count(array_keys($_SESSION["shopping_cart"]));
                  ?>
                  <div class="cart_div">
                  <a href="shopping_cart.php"><img src=<?php echo $data['image']; ?> /> Cart<span>
                  <?php echo $cart_count; ?></span></a>
                  </div>
                <?php
                  }
                ?>
                <?php
                $result = mysqli_query($con,"SELECT * FROM `products`");
                while($row = mysqli_fetch_assoc($result)){
                    echo "<div class='product_wrapper'>
                    <form method='post' action=''>
                    <input type='hidden' name='name' value=".$row['name']." />
                    <div class='image'><img src='".$row['image']."' /></div>
                    <div class='price'>$".$row['price']."</div>
                    <button type='submit' class='buy'>Buy Now</button>
                    </form>
                    </div>";
                        }
                mysqli_close($con);
                ?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>                      
        </div>
      </nav>
</body>
</html>