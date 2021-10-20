<html>
<head>
  <title>Dell Products</title>
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

$records = mysqli_query($db,"select * from products WHERE category = 'dell'"); // fetch data from database

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