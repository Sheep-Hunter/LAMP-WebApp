<?php
session_start();
$status="";
if (isset($_POST['action']) && $_POST['action']=="remove"){
if(!empty($_SESSION["shopping_cart"])) {
    foreach($_SESSION["shopping_cart"] as $key => $value) {
      if($_POST["code"] == $key){
      unset($_SESSION["shopping_cart"][$key]);
      $status = "<div class='box' style='color:red;'>
      Product is removed from your cart!</div>";
      }
      if(empty($_SESSION["shopping_cart"]))
      unset($_SESSION["shopping_cart"]);
      
      }		
}
}

if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    if($value['code'] === $_POST["code"]){
        $value['quantity'] = $_POST["quantity"];
        break; // Stop the loop after we've found the product
    }
}
  	
}
?>

<html>
<head>
  <title>Cactus Products</title>
  <link rel='stylesheet' href='/style.css'/>
  <link rel='stylesheet' href='style3.css'/>
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

    <div class="cart">
<?php
if(isset($_SESSION["shopping_cart"])){
    $total_price = 0;
?>	
<table class="table">
<tbody>
<tr>
<td></td>
<td>ITEM NAME</td>
<td>QUANTITY</td>
<td>UNIT PRICE</td>
<td>ITEMS TOTAL</td>
</tr>	
<?php		
foreach ($_SESSION["shopping_cart"] as $product){
?>
<tr>
<td>
<img src='<?php echo $product["image"]; ?>' width="50" height="40" />
</td>
<td><?php echo $product["name"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Remove Item</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='code' value="<?php echo $product["code"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='quantity' class='quantity' onChange="this.form.submit()">
  <!--hidden first option -->
  <option value="1" selected="selected" hidden>1</option>
  <option <?php if($product["quantity"]==0) echo "selected";?> value="0">0</option>
  <option <?php if($product["quantity"]==1) echo "selected";?> value="1">1</option>
  <option <?php if($product["quantity"]==2) echo "selected";?> value="2">2</option>
  <option <?php if($product["quantity"]==3) echo "selected";?> value="3">3</option>
  <option <?php if($product["quantity"]==4) echo "selected";?> value="4">4</option>
  <option <?php if($product["quantity"]==5) echo "selected";?> value="5">5</option>
</select>
<!-- <select name='quantity' class='quantity' onChange="this.form.submit()">
<option </?php if($product["quantity"]==0) echo "selected";?>
value="0">0</option>
<option </?php if($product["quantity"]==1) echo "selected";?>
value="1">1</option>
<option </?php if($product["quantity"]==2) echo "selected";?>
value="2">2</option>
<option </?php if($product["quantity"]==3) echo "selected";?>
value="3">3</option>
<option </?php if($product["quantity"]==4) echo "selected";?>
value="4">4</option>
<option </?php if($product["quantity"]==5) echo "selected";?>
value="5">5</option>
</select> -->
</form>
</td>
<td><?php echo "£".$product["price"]; ?></td>
<td><?php echo "£".$product["price"]*$product["quantity"]; ?></td>
</tr>
<?php
$total_price += ($product["price"]*$product["quantity"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>TOTAL: <?php echo "£".$total_price; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}else{
	echo "<h3>Your cart is empty!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>


</body>           
</html>