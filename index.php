<?php
$con=new mysqli("localhost","root","","flowerbulb");
if(!$con){
    die(mysqli_error());
}


?>


<!DOCTYPE html>

<html lang="en">
    <head>
        
        <meta charset="UTF-8">
        <meta http-equiv='X-UA-Compatible' content='IE-edge'>
        <meta name='viewport' content="width=device-width,initial-scale=1.0">
        <title>Flowerbulb Website</title>
        <link rel="stylesheet" , href="styles/style.css">
        <style>body{background-image:url(4.jpg);}</style>

    </head>
    <body>
        <div class="main">
            <div class="navbar">
                <div class="icon">
                    <h2 class="logo">bulb</h2>
                    </div>


                <div class="menu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <!-- <li><a href="customer/my_account.php">Account</a></li> -->
                    <li><a href="all_products.php">Catalog</a></li>
                    <!-- <a href="carts.php">Cart</a></li>  -->
                    <li><a href="contact.php">Contact  </a></li>
                    <!-- <li><a href="login.php">Login</a></li> -->
                    <li><a href="logout.php">Logout</a></li>
                    <li><a href="adminlogin.php">Admin</a></li>
                    </ul>
                </div>
             
            </div>
            


                <!-- <div class="form">
                <h2>login here</h2>
                <input type="email" name="email" placeholder="enter email here">
                <input type="password" name="" placeholder="enter password here">
                <button class="btn"><a href='index.php?action=login'>login</button>
                <p class='link'>Don't have an account</p><br>
                <a href='customer_register.php'>Register</a>
</div> -->
<div class="hi">
    <h1>WELCOME TO FLOWER BULB SHOP </h1>
</div>

</div>
  </body>
</html>
