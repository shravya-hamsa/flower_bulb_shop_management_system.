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
        <style>body{
            background-image:url(4.jpg);
        }</style>

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
             
            
           
 // <?php
   // function getRealsession_id()  
// {
//     if(!empty($_SERVER['HTTP_CLIENT_IP']))
//     {
//         $session_id=$_SERVER['HTTP_CLIENT_IP'];
//     }
//     elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
//     {
//         $session_id=$_SERVER['HTTP_X_FORWARDED_FOR'];

//     }
//     else{
//         $session_id=$_SERVER['REMOTE_ADDR'];
//     }
//     return $session_id;
// }
// ?> -->
 <!-- <script>
//     $(document).ready(function(){
//         $("#password_confirm2").on('keyup',function(){
// // alert('testing');
// var password_confirm1=
//         });
//     }); -->
 <!-- </script> -->
 <div class="register_box">
    <form method="post" action="" enctype="multipart/form-data">
         <table align="left" width="70%">
             <tr align="left">
                 <td colspan="4">
                     <h2>Register.</h2><br/>
                     <span>
                         Already have account? <a href="checkout.php?action=login">Login Now.</a><br/><br/>
 </span>
 </td>
 </tr>
 <tr>
     <td width="15%"><b>Name:</b> </td>
     <td colspan="3"><input type="text" name="name" placeholder="Name"</td>
 </tr>
 <tr>
     <td width="15%"><b>Email:</b> </td>
     <td colspan="3"><input type="text" name="email" placeholder="Email"</td>
</tr>

 <tr>
     <td width="15%"><b>Password:</b> </td>
     <td colspan="3"><input type="password" id="password_confirm1"name="password" placeholder="Password"</td>
 </tr>
 <tr>
     <td width="15%"><b>Address:</b> </td>
     <td colspan="3"><input type="text" name="address" placeholder="address"</td>
 </tr>
 <tr>
     <td width="15%"><b>Contact:</b> </td>
     <td colspan="3"><input type="text" name="contact" placeholder="contact"</td>
 </tr>
 
 <!-- <tr>
     <td width="15%"><b>Confirm Password:</b> </td>
     <td colspan="3"><input type="password" id="password_confirm2" name="confirm_password" placeholder="Confirm Password"</td>
 </tr> -->
 <!-- <tr>
     <td width="15%"><b>contact:</b> </td>
     <td colspan="3"><input type="text" name="contact" placeholder="Contact"</td>
 </tr>
 <tr>
     <td width="15%"><b>Address:</b> </td>
     <td colspan="3"><input type="text" name="address" placeholder="Address"</td> -->

 <tr align="left">
     <td></td>
     <td colspan="4"><input type="submit" name="register" value="Register"/>
     </a></td>
 </tr>
 </table>
 </form>
 </div> 
 </div> 
  <!-- <div class="form">
//                 <h2>login here</h2>
//                 <input type="email" name="email" placeholder="enter email here">
//                 <input type="password" name="" placeholder="enter password here">
//                 <button class="btn"><a href='index.php?action=login'>login</button>
//                 <p class='link'>Don't have an account</p><br>
//                 <a href='customer_register.php'>Register</a>
// </div> 

// if(isset($_POST['register'])){
//     if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name'])){
//         $IP=getRealsession_id();
//         $name=$_POST['name'];
//         $email=trim($_POST['email']);
//         $password=trim($_POST['password']);
//         $hash_password=md5($password);
//         $address=$_POST['address'];
//         $check_exist=mysqli_query($con,"select * from users where email='$email' ");
//         $email_count=mysqli_num_rows($check_exist);
//         $row_register=$mysqli_fetch_array($check_exist);
//         if($email_count>0){
//             echo "<script>alert('sorry,your email $email address already exist in our database')</script>";
        
//         }elseif($row_register['email']!=$email){
//             $run_insert=mysqli_query($con,"insert into users(ip_address,name,email,password,contact,user_address) values('$IP','$name','$email','$hash_password','$contact','$address')");
//         }

    // }
//    $email=$_POST['email'];
//    $password=$_POST['password'];
//    $run_login=mysqli_query($con,"select * from users where password='$password' AND email='$email' ");
//    $check_login=mysqli_num_rows($run_login);
//    if($check_login==0){
//        echo "<script>alert('Password or email is incorrect, please try again!')</script>";
//    exit();
//     }
//     $IP=getRealsession_id();
    
//     $run_cart=mysqli_query($con,"select * from cart where IP='$IP'");
//     $check_cart=mysqli_num_rows($run_cart);
//     if($check_login>0 AND $check_cart==0){
//         $_SESSION['email']=$email;
//         echo "<script>alert('you has logged in successfully')</script>";
//         echo "<script>window.open('customer/my_account.php','_self')</script>";
//     }else{
//         $_SESSION['email']=$email;
//         echo "<script>alert('you has logged in successfully')</script>";
//         echo "<script>window.open('checkout.php','_self')</script>";

//     }
    
// }

//             <!-- <div class="form">
//                 <h2>login here</h2>
//                 <input type="email" name="email" placeholder="enter email here">
//                 <input type="password" name="" placeholder="enter password here">
//                 <button class="btn"><a href='index.php?action=login'>login</button>
//                 <p class='link'>Don't have an account</p><br>
//                 <a href='customer_register.php'>Register</a>
// </div> -->
// <?php
// session_start();
// $username="";
// $email="";
// $errors=array();
// $con=mysqli_connect("localhost","root","","flowerbulb");
// if(isset($_POST['register'])){
//     $username=mysqli_real_escape_string($con,$_POST['name']);
//     $email=mysqli_real_escape_string($con,$_POST['email']);
//     $password=mysqli_real_escape_string($con,$_POST['password']);
//     if(empty($username)){array_push($errors,"Username required");}
//     if(empty($email)){array_push($errors,"Email required");}
//     if(empty($password)){array_push($errors,"Password required");}
//     $user_check_query="SELECT * FROM users WHERE name='$username' OR email='$email' LIMIT 1";
//     $result=mysqli_query($con,$user_check_query);
//     $user=mysqli_fetch_assoc($result);
//     if($user){
//         if($user['name']==$username){
//             array_push($errors,"username exist");
//         }
//     }
//     if(count($errors)==0){
//         // $password=md5($password);
//         $query="INSERT INTO users (name,email,password)values('$username',$email','$password')";
//         mysqli_query($con,$query);
//         $_SESSION['name']=$username;
//     }
// }

// ?>

</div>
</body>
</html>
<?php
if(isset($_POST['register']))
{
    $name=$_POST['name'];
    $pass=$_POST['password'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $query="insert into users(name,password,email,address,contact) values('$name','$pass','$email','$address','$contact')";
    if(mysqli_query($con,$query)){
        echo "<h3>you have registered</h3>";
    }

}
?>