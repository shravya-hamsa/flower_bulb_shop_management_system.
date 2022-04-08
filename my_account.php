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
                    <li><a href="customer.php">Account</a></li>
                    <li><a href="all_products.php">Catalog</a></li>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="contact.php">Contact  </a></li>
                    
                    </ul>
                </div>
             
            </div>
            <?php 

        ?>
            <!-- <div class="form">
                <h2>login here</h2>
                <input type="email" name="email" placeholder="enter email here">
                <input type="password" name="" placeholder="enter password here">
                <button class="btn"><a href='index.php?action=login'>login</button>
                <p class='link'>Don't have an account</p><br>
                <a href='customer_register.php'>Register</a>
</div> -->
<!-- <?php

$select_user=mysqli_query($con,"select * from users ");

?><div id="profile"> -->
    <ul>
        <li class="dropdown_header">
            <a><span><img src="download.png"></span></a>
            <ul class="dropdown_menu_header">
                <li><a href="customer.php">Account Setting</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
</li>
</ul>
</div>
    
               
</div>


<!------------ Header starts --------------------->
<!------------ Header ends ----------------------->

  
<!------------ Navigation Bar ends -------------->  

<!------------ Content wrapper starts -------------->
  <div class="content_wrapper">
  
  <?php if(isset($_SESSION['user_id'])){ ?>
  
  <div class="user_container">
  
  <div class="user_content">
  
  <?php 
  if(isset($_GET['action'])){
    $action = $_GET['action'];
  }else{
    $action = '';
  }
  
  switch($action){
  
  case "edit_account";
  include('edit_account.php');
  break;
  
  case "edit_profile";
  include('edit_profile.php');
  break;
  

  
  case "change_password";
  include('change_password.php');
  break;
  
  case "delete_account";
  include('delete_account.php');
  break;  
  
  default;
  echo "Do something";
  break;
  }
  
  /*if($_GET['action'] == 'edit_account'){
  echo $action;
  }*/
  
  ?>
  
  </div><!-- /.user_content -->
  
  <div class="user_sidebar">
  
  <?php 
  $run_image = mysqli_query($con,"select * from users where user_id='$_SESSION[user_id]'");
  
  $row_image = mysqli_fetch_array($run_image);
  
   
  ?>
  

  
  <ul>
    <li><a href="my_account.php?action=my_order">My Order</a></li>
	<li><a href="my_account.php?action=edit_account">Edit Account</a></li>

	<li><a href="my_account.php?action=user_profile_picture">User Profile Picture</a></li>
	<li><a href="my_account.php?action=change_password">Change Password</a></li>
	<li><a href="my_account.php?action=delete_account">Delete Account</a></li>
	<li><a href="logout.php">Logout</a></li>
  </ul>
  
  </div><!-- /.user_sidebar -->
  
  </div><!-- /.user_container-->
  
  <?php }else{ ?>
  
  <h1>Account Setting Page</h1>
  
  <h5><a href="index.php?action=login">Log In </a> to Your Account!</h5>
  
  <?php } ?>
  
  </div><!-- /.content_wrapper-->
  <!------------ Content wrapper ends -------------->
  

  
  



        
    </body>
</html>
