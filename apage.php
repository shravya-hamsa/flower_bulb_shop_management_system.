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


<!DOCTYPE html>
<html>
    <head>
        <title>Web development</title>
        <link rel="stylesheet" , href="styles.css">

</head>
<body>
    <div class="container">
        <div class="header">
            <div class="navbar-header">
               <h3><a class="admin_name"> Admin Area-<?php
                 echo "Admin Name";
                 ?></a><h3>
                 </div>
                 <div class="navbar-right-header">
                     <ul class="dropdown-navbar-right">
                         <li>
                             <a><i class="fa fa-user"></i></a>
                             
                             <ul class="subnavbar-right">
                                 <li><a>User Account</a></li>
                                 <li><a>Logout</a></li>
</ul>
</li>
</ul>
</div>
</div>
                 <div class="body_container">

                     <div class="left_sidebar">
                     <div class="left_sidebar_box">
                         <ul class="left_sidebar_first_level">
                         <li>
                             <a href='#'>Products</a>
                             <ul class="left-sidebar_second_level">
                                 <li><a href="admin.php?action=add_pro">Add Products</a></li>
                                 <li><a href="admin.php?action=view_pro">View Products</a></li>

                                </ul>
</li>
<li>
                             <a href='#'>Admin</a>
                             <ul class="left-sidebar_second_level">
                                 <li><a href="admin.php?action=add_users">Add User</a></li>
                                 <li><a href="admin.php?action=view_users">List Users</a></li>

                                </ul>
</li>
</ul>
</div>
                         
</div>
                         <div class="content">
                             <div class="content_box">
                                 <?php
                                 if(isset($_GET['action'])){
                                     $action=$_GET['action'];
                                 }
                                 else{
                                     $action='';
                                 }
                                 switch($action){
                                     case 'add_pro';
                                     include 'insert_product.php';
                                     break;
                                     case 'view_pro';
                                     include 'view_product.php';
                                     break;
                                     case 'edit_pro';
                                     include 'edit_product.php';
                                     break;
                                     case 'view_users';
                                     include 'view_users.php';
                                     break;

                                 }
                                 ?>
</div>
</div></div>
</body>
</html>
                                }
