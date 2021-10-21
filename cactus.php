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






<table border="2">
  <tr>
    <td>Product</td>
    <td>Price</td>
    <td>Image</td>
  </tr>

<?php

include "config.php"; // Using database connection file here

$records = mysqli_query($db,"select * from products WHERE category = 'cactus'"); // fetch data from database

while($data = mysqli_fetch_array($records))
{
?>
  <tr>
    <td><?php echo $data['name']; ?></td>
    <td><?php echo $data['price']; ?></td>
    <td><img src="<?php echo $data['image']; ?>" width="100" height="100"></td>
    <td><button id="addItem" class="btn btn-success btn-md">Add to cart</button></td>
  </tr>	
<?php
}
?>

</table>

<?php mysqli_close($db);  // close connection ?>

</body>
</html>