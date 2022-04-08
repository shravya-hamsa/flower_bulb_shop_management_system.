<?php
$con=new mysqli("localhost","root","","flowerbulb");
if(!$con){
    die(mysqli_error());
}
?>
<style>body{
    background-image:url(2.jpg);
    background-size:cover;
    background-position:center;
}</style>
<div class="view_product_box">
    <h2>View Users</h2>
    <div class="border_bottom"></div>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="search_bar">
            <input type="text" id="search" placeholder="Type to search.."/>
</div>
        <table width="100%">
            <thead>
                <tr>
                    <th><input type="checkbox" id="checkAll"/>check</th>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <!-- <th>Views</th>
                    <th>Date</th> -->
                    <!-- <th>Status</th> -->
                    <th>Delete</th>
                    
                    
</tr>
</thead>
<?php
$all_users=mysqli_query($con,"select * from users order by user_id DESC ");
$i=1;
while($row=mysqli_fetch_array($all_users)){


?>
<tbody>
    <tr>
        <td><input type="checkbox" name="deleteAll[]" value="<?php echo $row['user_id'];?>"/></td>
        <td><?php
        echo $i;?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['email'];?></td>
        <!-- <td><?php echo $row['views'];?></td>
        <td><?php echo $row['date'];?></td> -->

        <!-- <td><?php 
        if($row['visible']==1){
            echo "Approved";
        }else{
            echo "pending";
        }
        ?></td> -->
        <td><a href="admin.php?action=view_users&delete_user=<?php echo $row['user_id'];?>">Delete</a></td>
        

    </tr>
</tbody>
<?php 
$i++;
}//end while loop
?>
<tr>
    <td><input type="submit" name="delete_all" value="Remove"/></td>
</tr>
</table>
</form>
</div>
<?php
//Delete User Account
if(isset($_GET['delete_user'])){
    $delete_user=mysqli_query($con,"delete from users where user_id='$_GET[delete_user]'");
    if($delete_user){
        echo "<script>alert('User account  has been deleted successfully')</script>";
        echo"<script>window.open('admin.php?action=view_users.php','_self')</script>";
    }else{
        die(mysqli_error($con));
    }
}//remove items selected using foreach loop
// if(isset($_POST['deleteAll'])){
//     $remove=$_POST['deleteAll'];
//     foreach($remove as $key){
//         $run_remove=mysqli_query($con,"delete from product where product_id='$key'");
        
//         echo "<script>alert('items selected have been deleted successfully')</script>";
//         echo"<script>window.open('admin.php?action=view_pro','_self')</script>"; 
//     }
// }
if(isset($_POST['deleteAll'])){
    $remove = $_POST['deleteAll'];
    
    foreach($remove as $key){
    $run_remove = mysqli_query($con,"delete from users where user_id='$key'");
    
    if($run_remove){
    echo "<script>alert('Items selected have been removed successfully!')</script>";
    
    echo "<script>window.open('admin.php?action=view_pro','_self')</script>";
    }else{
    echo "<script>alert('Mysqli Failed: mysqli_error($con)!')</script>";
    }
    }
  }
?>