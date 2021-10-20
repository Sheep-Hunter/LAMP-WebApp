<html>
    <header>
        Cactus
    </header>
    <body>

    <table border="2">
    <tr>
        <td>Images</td>
    </tr>

    <?php

    include "config.php"; // Using database connection file here

    $records = mysqli_query($db,"select * from product_images WHERE name = 'cat1'"); // fetch data from database

    while($data = mysqli_fetch_array($records))
    {
    ?>
    <tr>
        <td><img src="<?php echo $data['image']; ?>" width="100" height="100"></td>
    </tr>	
    <?php
    }
    ?>

    </table>

    <?php mysqli_close($db);  // close connection ?>

    </body>
</html>