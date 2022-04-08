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
        <link rel="stylesheet" , href="style.css">

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
                    <li><a href="customer.php"> Account</a></li>
                    <li><a href="all_products.php">Catalog</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="contact.php">Contact  </a></li>
                    
                    </ul>
                </div>
</div>
<?php
function getRealsession_id()
{
    if(!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $session_id=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        $session_id=$_SERVER['HTTP_X_FORWARDED_FOR'];

    }
    else{
        $session_id=$_SERVER['REMOTE_ADDR'];
    }
    return $session_id;
}
?>

<?php
if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}
$IP=getRealsession_id();
$select_cart="select * from cart where IP='$IP'";
$run_cart=mysqli_query($con,$select_cart);
while($row_cart=mysqli_fetch_array($run_cart)){
    $product_id=$row_cart['product_id'];
    $session_id=$row_cart['session_id'];
    $price=$row_cart['price'];
    $quantity=$row_cart['quantity'];
    $insert_product_ordered="insert into product_ordered (product_id,session_id,price,quantity) values('$product_id','$session_id','$price','$quantity')";
    $run_order=mysqli_query($con,$insert_product_ordered);
    echo"<script>alert('order submitted')</script>";
    echo"<script>window.open('index.php','_self')</script>";


}
?>
</div>
</body>
</html>

       

