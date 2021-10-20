<html>
<head>
  <title>Cactus Products</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel='stylesheet' href='/style.css'/>
  <link href="style2.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
</head>
<body>

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
  </tr>	
<?php
}
?>

</table>

<?php mysqli_close($db);  // close connection ?>

</body>
</html>