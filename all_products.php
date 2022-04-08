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
        <link rel="stylesheet"  href="style.css">
        <style>body{
        background-image:url(2.jpg);}</style>

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
                    <!-- <li><a href="customer/my_account.php"> Account</a></li> -->
                    <li><a href="all_products.php">Catalog</a></li>
                    <li><a href="carts.php">Cart</a></li>
                    <li><a href="contact.php">Contact  </a></li>
                    
                    </ul>
                </div>
</div>
</div>
        <div id="content area">
            <div id="product_box">
                <?php
                $get_prod="CALL `getproduct`(); ";
                $run_prod=mysqli_query($con,$get_prod);

                while($row_prod=mysqli_fetch_array($run_prod)){
                    $prod_id=$row_prod['product_id'];
                    $prod_name=$row_prod['name'];
    $pro_color=$row_prod['color'];
    $pro_blooming=$row_prod['blooming'];
    $pro_height=$row_prod['height'];
    $pro_soil=$row_prod['soil'];
    $pro_hardiness=$row_prod['hardiness'];
    $pro_price=$row_prod['price'];

    echo " <div id='single_product'>
    <h2>$prod_name</h2>
    
    <p><b> Price:$ $pro_price</b></p>
    <p><b> color:$pro_color</b></p>
    <p><b> blomming: $pro_blooming</b></p>
    <p><b> height:$pro_height</b></p>
    <p><b> soil:$pro_soil</b></p>
    <p><b> hardness: $pro_hardiness</b></p>

    <a href='carts.php?add_cart=$prod_id'>
    <button style='float:right'>Add to cart<?button></a>
    </div>
    ";

    
                }
                ?>
                </body>
                </html>
