<?php
$con=new mysqli("localhost","root","","flowerbulb");
if(!$con){
    die(mysqli_error());
}
?>

<?php 
function generateRandomsession_id($length=5){
    $characters='0123456789';
    $i=0;
    $charactersLength=strlen($characters);
    $session_id='';
    for($i=0;$i<$length;$i++){
        $session_id=$characters[rand(0,$charactersLength-1)];}
        return $session_id;
    }
?>
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
if(isset($_GET['add_cart'])){
    $IP=getRealsession_id();
    // $session_id=generateRandomsession_id();
    $product_id=$_GET['add_cart'];
    $check_pro="select * from cart where  product_id='$product_id'";
$run_check=mysqli_query($con,$check_pro);
    if(mysqli_num_rows($run_check)>0) {
         echo"";
    }
     else{$fetch_pro=mysqli_query($con,"select * from product where product_id='$product_id'");
         $fetch_pro=mysqli_fetch_array($fetch_pro);
         $pro_price=$fetch_pro['price'];


        $insert_pro="insert into cart(product_id,price,IP)values('$product_id','$pro_price','$IP')";
    $run_insert=mysqli_query($con,$insert_pro);
        if($run_insert){
    echo"record inserted";
 }else{
     die(mysqli_error($con));
 }
       }
}
?> 
 <?php
 function total_price(){
$IP=getRealsession_id();
    global $con;
    $total=0;
    // $session_id=generateRandomsession_id($length=5);
    $run_cart=mysqli_query($con,"select * from cart where IP='$IP' ");
    while($fetch_cart=mysqli_fetch_array($run_cart)){
        $product_id=$fetch_cart['product_id'];
        $result_product=mysqli_query($con,"select * from product where product_id='$product_id'");
        while($fetch_product=mysqli_fetch_array($result_product)){
            $product_price=array($fetch_product['price']);
            $product_name=$fetch_product['name'];
             $product_color=$fetch_product['color'];
             $blooming=$fetch_product['blooming'];
             $soil=$fetch_product['soil'];
             $height=$fetch_product['height'];
             $hardiness=$fetch_product['hardiness'];
$sing_price=$fetch_product['price'];
            $values=array_sum($product_price);
            // getting quality of product
            $run_qty=mysqli_query($con,"select * from cart where product_id='$product_id'");
            $row_qty=mysqli_fetch_array($run_qty);
            $qty=$row_qty['quantity'];
            $values_qty=$values * $qty;
            $total+=$values_qty;
        }
    }
    echo $total;
} 
?>
<?php

 function total_items(){
   global $con;

//  $session_id=generateRandomsession_id();
 $run_items=mysqli_query($con,"select * from cart ");
 echo $count_items=mysqli_num_rows($run_items);
 
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
        <style>body{background-image:url(1.jpg);}</style>

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
                    <li><a href="contact.php">Contact </a></li>
                    
                    </ul>
                </div>
             
            </div>
            <div id="content_area">
<div class="shopping_cart_container">
                <div id="shopping_cart" align="center" style="padding:15px">
                <?php
                if(isset($_SESSION['customer_email'])){
                     echo"<b>Your Email:</b>".$_SESSION['customer_email'];
                 }
                 else{
                     echo"";
                 }
                 ?>
                 <b style="color:navy">Your Cart-</b> Total Items:<?php 

 echo "" .total_items()."";
?>   Total Price:
<?php
total_price(); 
?>
</div>

<form action="" method="post" enctype="multipart/form-data">
<table align="center" width="100%">
    <tr align="center">
        <th>Remove</th>
        <th>Product</th>
        <th>Quantity </th>

        <th>Price</th>
        </tr>
            
<?php
$IP=getRealsession_id();
global $con;
$total=0;
// $session_id=generateRandomsession_id($length=5);
$run_cart=mysqli_query($con,"select * from cart where IP='$IP' ");
while($fetch_cart=mysqli_fetch_array($run_cart)){
    $product_id=$fetch_cart['product_id'];
    $result_product=mysqli_query($con,"select * from product where product_id='$product_id'");
    while($fetch_product=mysqli_fetch_array($result_product)){
        $product_price=array($fetch_product['price']);
        $product_name=$fetch_product['name'];
         $product_color=$fetch_product['color'];
         $blooming=$fetch_product['blooming'];
         $soil=$fetch_product['soil'];
         $height=$fetch_product['height'];
         $hardiness=$fetch_product['hardiness'];
$sing_price=$fetch_product['price'];
        $values=array_sum($product_price);
        // getting quality of product
        $run_qty=mysqli_query($con,"select * from cart where product_id='$product_id'");
        $row_qty=mysqli_fetch_array($run_qty);
        $qty=$row_qty['quantity'];
        $values_qty=$values * $qty;
        $total+=$values_qty;
    
?>
                <tr align="center">
        <td><input type="checkbox" name="remove[]" value="<?php
        echo $product_id?>"/></td>
        <td><?php
      echo  $product_name;
        ?>
        <br/>
    
    </td>
        <td><input type="text" size="4" name="qty" value="<?php 
        echo $qty;
        ?>"/></td>
        <td><?php 
        echo "$" .$sing_price;
        ?></td>
                </tr>
                <?php 
                }
            }//end while
            ?>
            <tr>
                <td colspan="4" align="right"><b>Sub Total:</b></td>
                <td><?php
                echo  "$" .total_price() ;
                ?></td>
                <tr align="center">
                    <td colspan="2"><input type="submit" name="update_cart" value="Update Cart"/></td>
                    <td><input type="submit" name="continue" value="Continue Shopping"/></td>
                    <td><button><a href="checkout.php" >OrderNow</a></td>
                </table>
                </form>
                <?php
                if(isset($_POST['remove'])){
                    foreach($_POST['remove'] as $remove_id){
                        $run_delete=mysqli_query($con,"delete from cart where product_id='$remove_id' AND IP='$IP' ");
                        if($run_delete){
                        echo"<script>window.open('cart.php','_self)</script>";
                    }
                    }
                }
                if(isset($_POST['continue'])){
                    echo"<script>window.open('all_products.php','_self')</script>";
                    
                }
                ?>
</div>
            </div>
            </div>
            </body>
</html> 