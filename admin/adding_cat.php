<?php
require 'inc/config.php';
require 'templates/header.php';
check_user_loggedin();

$type="add";
$category_id="";
$category_name="";
$btn_label="ADD";

if(isset($_GET['category_id']) && $_GET['category_id']){
    $category_id=$_GET['category_id'];
    $btn_label="EDIT";

    $sql="SELECT * FROM category where category_id=".$category_id;
	    $result=mysqli_query($conn,$sql);
	    while($row=mysqli_fetch_assoc($result)){
            $category_id = $row['category_id'];
	    	$category_name = $row['category_name'];
	    }
}
    
?>
<form action="catconfig.php" method="post">
    <input type="hidden" name="type" value="<?php echo $type; ?>">
    <?php 
    if($category_id){?>
    <input type="hidden" name="category_id" value="<?php echo $category_id; ?>"><br><?php
    }
    ?>
	Category Name :<input type="text" name="category_name" value="<?php echo $category_name; ?>"><br>
    <input type="submit" name="submit" value="<?php echo $btn_label; ?>">
</form>