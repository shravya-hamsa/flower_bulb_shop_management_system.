<?php
$con=new mysqli("localhost","root","","flowerbulb");
if(!$con){
    die(mysqli_error());
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
<style>body{
    background-image:url(2.jpg);
}</style>

<div class="login_box">
    <form method="post" action="">
        <table align="left" width="70%">
            <tr align="left">
                <td colspan="4">
                    <h2>Login.</h2><br/>
                    <span>
                        Don't have account? <a href="register.php">Register Here</a><br/><br/>
</span>
</td>
</tr>
<tr>
    <td width="15%"><b>Email:</b> </td>
    <td colspan="3"><input type="text" name="email" placeholder="Email"</td>
</tr>
<tr>
    <td width="15%"><b>Password:</b> </td>
    <td colspan="3"><input type="password" name="password" placeholder="Password"</td>
</tr>
<tr align="left">
    <td></td>
    <td colspan="4"><a href="checkout.php?forgot_pass">
        Forgot Password
    </a></td>
</tr>
<tr align="left">
    <td></td>
    <td colspan="4"><input type="submit" name="login" value="Login"/>
    </a></td>
</tr>
</table>
</form>
</div> -->
 <!-- <div class="form">
                <h2>login here</h2>
                <input type="email" name="email" placeholder="enter email here">
                <input type="password" name="" placeholder="enter password here">
                <button class="btn"><a href='index.php?action=login'>login</button>
                <p class='link'>Don't have an account</p><br>
                <a href='customer_register.php'>Register</a>
</div> 
 //<?php
// if(!isset($_POST['login'])){
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
//         echo "<script>window.open('customer/my_account.php','_self)</script>";
//     }else{
//         $_SESSION['email']=$email;
//         echo "<script>alert('you has logged in successfully')</script>";
//         echo "<script>window.open('checkout.php','_self')</script>";

//     }
    
// }
// ?> -->
<?php
if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="select * from users where email='$email' and password='$password' limit 1";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==1){
        echo"you have successfully logged in";
        echo "<script>alert('you has logged in successfully')</script>";
        echo "<script>window.open('payment.php','_self')</script>";
        exit();
    }else{
        echo "you have entered incorrect password";
    }
}

?>