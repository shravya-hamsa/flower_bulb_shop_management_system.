<?php session_start(); ?>
<?php
$con=new mysqli("localhost","root","","flowerbulb");
if(!$con){
    die(mysqli_error());
}else{
    echo('connected');
}
?>



<head>
<meta charset="UTF-8">
<title>Log In</title>

<link rel="stylesheet" href="admin_form_login.css" />
<style>body{
    background-image:url(1.jpg);
}</style>

</head>

<body>

<nav><a href="#" class="focus">Log In</a></nav>

<form action="" method="post" enctype="multipart/form-data">

	<h2>Admin Login</h2>

	<input type="text" name="email" class="text-field" placeholder="Email" />
    <input type="password" name="password" class="text-field" placeholder="Password" />
    
    <input type="submit" name="login"  class="button" value="Log In" />

</form>

</body>

<?php
if(isset($_POST['login'])){
 
    $email = trim(mysqli_real_escape_string($con,$_POST['email']));
    
    $password = trim(mysqli_real_escape_string($con,$_POST['password']));
    
    
    
    $sel_user = "select * from admin where email ='$email' AND Admin_password='$password' ";
    
    $run_user = mysqli_query($con, $sel_user) or die ("error: " . mysqli_error($con));
    
    $check_user = mysqli_num_rows($run_user);
    
    if($check_user > 0){
    
    $db_row = mysqli_fetch_array($run_user);
    
    $_SESSION['email'] = $db_row['email']; 
    
    
    
    
    if($db_row['email'] =='bulbshravya@gmail.com'){
    
    echo "<script>window.open('admin.php?logged_in=You have successfully Logged In!','_self')</script>";
    
    }elseif($db_row['role'] =='guest'){
    echo "<script>alert('Password or Email is wrong, your are guest not admin!')</script>";
    
    }
    
    }else{
    echo "<script>alert('Password or Email is wrong, try again!')</script>";
    
    }
    
    }
   ?>
   
   
   
   
   