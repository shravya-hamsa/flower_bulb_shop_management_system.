

<?php
$con=new mysqli("localhost","root","","flowerbulb");
if(!$con){
    die(mysqli_error());
}?>
 
// function total_items(){
//     global $con;

// // $session_id=getRealsession_id();
// $run_items=mysqli_query($con,"select * from cart where session_id='$session_id'");
// echo $count_items=mysqli_num_rows($run_items);
// }
<?php
function getRealID()
{
    if(!empty($_SERVER['HTTP_CLIENT_IP']))
    {
        $ID=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
    {
        $ID=$_SERVER['HTTP_X_FORWARDED_FOR'];

    }
    else{
        $IP=$_SERVER['REMOTE_ADDR'];
    }
    return $IP;
}
 ?>
 <?php
include 'index.php';
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
if(isset($_GET['add_cart'])){
    $session_id=generateRandomsession_id();
    $IP=getRealID();
    $product_id=$_GET['add_cart'];
    $check_pro="select * from cart where product_id='$product_id'";
$run_check=mysqli_query($con,$check_pro);
    if(mysqli_num_rows($run_check)>0) {
         echo"";
    }
     else{
         $fetch_pro=mysqli_query($con,"select * from product where product_id='$product_id'");
         $fetch_pro=mysqli_fetch_array($fetch_pro);
         $pro_price=$fetch_pro['price'];
        $insert_pro="insert into cart(session_id,product_id,price,quantity,IP)values('$session_id','$product_id','$pro_price','','$IP')";
    $run_insert=mysqli_query($con,$insert_pro);
        if($run_insert){
    echo"record inserted";
 }else{
     die(mysqli_error($con));
 }
    // die(mysqli_error());

    }
}
function total_price(){

    global $con;
    $total=0;
    $IP=getRealID();
    $run_cart=mysqli_query($con,"select * from cart where IP ='$IP' ");
    while($fetch_cart=mysqli_fetch_array($run_cart)){
        $product_id=$fetch_cart['product_id'];
        $result_product=mysqli_query($con,"select * from products where product_id='$product_id'");
        while($fetch_product=mysqli_fetch_array($result_product)){
            $product_price=array($fetch_product['price']);
            $product_name=$fetch_product['name'];
            $product_color=$fetch_product['color'];
            $blooming=$fetch_product['blooming'];
            $soil=$fetch_product['soil'];
            $height=$fetch_product['height'];
            $hardiness=$fetch_product['hardiness'];
            $values=array_sum($product_price);
            $total+=$values;
        }
    }
    echo $total;
}


?> 
