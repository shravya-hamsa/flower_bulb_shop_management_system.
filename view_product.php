<?php
$con=new mysqli("localhost","root","","flowerbulb");
if(!$con){
    die(mysqli_error());
}
?>
<div class="view_product_box">
    <h2>View Products</h2>
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
                    <th>Price</th>
                    <!-- <th>Views</th> -->
                    <!-- <th>Date</th> -->
                    <!-- <th>Status</th> -->
                    <th>Delete</th>
                    <th>Edit</th>
                    
</tr>
</thead>
<?php
$all_products=mysqli_query($con,"select * from product order by product_id DESC ");
$i=1;
while($row=mysqli_fetch_array($all_products)){


?>
<tbody>
    <tr>
        <td><input type="checkbox" name="deleteAll[]" value="<?php echo $row['product_id'];?>"/></td>
        <td><?php
        echo $i;?></td>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['price'];?></td>
        <!-- <td><?php echo $row['views'];?></td> -->
        <!-- <td><?php echo $row['date'];?></td> -->
        <!-- <td><?php 
        if($row['visible']==1){
            echo "Approved";
        }else{
            echo "pending";
        }
        ?></td> -->
        <td><a href="admin.php?action=view_pro&delete_product=<?php echo $row['product_id'];?>">Delete</a></td>
        <td><a href="admin.php?action=edit_pro&product_id=<?php echo $row['product_id'];?>">Edit</a></td>

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
//Delete product
if(isset($_GET['delete_product'])){
    $delete_product=mysqli_query($con,"delete from product where product_id='$_GET[delete_product]'");
    if($delete_product){
        echo "<script>alert('product has been deleted successfully')</script>";
        echo"<script>window.open('admin.php?action=view_pro','_self')</script>";
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
    $run_remove = mysqli_query($con,"delete from product where product_id='$key'");
    
    if($run_remove){
    echo "<script>alert('Items selected have been removed successfully!')</script>";
    
    echo "<script>window.open('admin.php?action=view_pro','_self')</script>";
    }else{
    echo "<script>alert('Mysqli Failed: mysqli_error($con)!')</script>";
    }
    }
  }
?>