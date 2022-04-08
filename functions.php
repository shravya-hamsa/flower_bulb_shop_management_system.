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