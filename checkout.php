<?php
session_start();
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
        <link rel="stylesheet"  href="style.css">

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
                    <li><a href="customer/my_account.php"> Account</a></li>
                    <li><a href="all_products.php">Catalog</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="contact.php">Contact  </a></li>
                    <li><a href="logout.php">logout  </a></li>
                    
                    </ul>
                </div>
</div>
</div>
<div id="products_box">
    <?php 
    if(!isset($_SESSION['email'])){
        include('login.php');
    }
    else{
        include('payment.php');
    }
        ?>
        </div>
</body>
</html>