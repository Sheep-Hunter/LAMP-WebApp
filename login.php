<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($db,$_POST['username']);
      $mypassword = mysqli_real_escape_string($db,$_POST['password']); 
      
      $sql = "SELECT id FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
        
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_user'] = $myusername;
         echo "Success!";
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
  <head>
    <title>Log in</title>
    <link rel='stylesheet' href='/style.css' />
  </head>
  <body>
    <nav>
    <b>JPJ Marketplace</b>
  <div class="right">
    <a href="/">Home</a> |
  
      <a href="/login">Log in</a> |
      <a href="/signup">Sign up</a>
    
  </div>
</nav>

      <h1 style="text-align: center">Log in</h1>
      <div id="login">
         
        <form method="POST">
          <input type="text" name="username" placeholder="Username" />
          <input type="password" name="password" placeholder="Password" />
          <input type="submit" />
        </form>
      
      </div>
      
  </body>
</html>