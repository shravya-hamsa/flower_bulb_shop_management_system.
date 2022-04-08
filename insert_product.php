
<?php
$servername="localhost";
$username="root";
$password="";
$dbname="flowerbulb";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn)
{
    die("connection failed:" .mysqli_connect_error());
}
else{
    echo " connected";
}
?>


<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Inserting Product</title>
</head>
<body bgcolor="skyblue"> -->
<div class="form_box">    
<form action="" method="post" enctype="multipart/form-data">
        <table align="center" width="795" border="2" bgcolor="#187eae">
            <tr align="center">
                <td colspan="7"><h2>Add Product</h2></td>
</tr>
<tr>
<td align="right"><b>Product Id:</b></td>
    <td><input type="text" name="product_id" size="60" required/></td>
</tr>
<tr>
<td align="right"><b>Product Name:</b></td>
    <td><input type="text" name="name" size="60" required/></td>
</tr>
<tr>
<td align="right"><b>Product color:</b></td>
    <td><input type="text" name="color" size="60" required/></td>
</tr>
<tr>
<td align="right"><b>Product Blooming:</b></td>
    <td><input type="text" name="blooming" size="60" required/></td>
</tr>
<tr>
<td align="right"><b>Product height:</b></td>
    <td><input type="text" name="height" size="60" required/></td>
</tr>
<tr>
<td align="right"><b>Soil:</b></td>
    <td><input type="text" name="soil" size="60" required/></td>
</tr>
<tr>
<td align="right"><b>Hardness:</b></td>
    <td><input type="text" name="hardiness" size="60" required/></td>
</tr>


<tr>
<td align="right"><b>Product Price:</b></td>
    <td><input type="text" name="price" size="60" required/></td>
</tr>



<tr align="center">

    <td colspan="7"><input type="submit" name="insert_post" value="insert product now"/></td>
</tr>
</table>
</form>
</div>
<!-- </body>
</html> -->
<?php

if(isset($_POST['insert_post'])){
    $product_id=$_POST['product_id'];
    $name=$_POST['name'];
    $color=$_POST['color'];
    $blooming=$_POST['blooming'];
    $height=$_POST['height'];
    $soil=$_POST['soil'];
    $hardiness=$_POST['hardiness'];
    $price=$_POST['price'];
   
    
$insert_product = " insert into product (product_id,name,color,blooming,height,soil,hardiness,price) 
values ('$product_id','$name', '$color','$blooming','$height','$soil','$hardiness','$price')";


$insert_pro=mysqli_query($conn,$insert_product);

    if(!$insert_pro){
        die(mysqli_error($conn));
        // echo "<script>alert('Product Has Been inserted successfully!')</script>";
        // echo "<script>window.open('index.php?insert_product','_self')</script>";

}
}


?>
