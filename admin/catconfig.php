<?php
require "inc/config.php";
if(isset($_POST['type']) && $_POST['type']){
    if($_POST['type'] = 'add'){
        //$category_id=$_POST['category_id'];
        $category_name=$_POST['category_name'];
        $sql="INSERT INTO category(category_name) VALUES('$category_name')";
			$result=mysqli_query($conn,$sql);
			$category_id = mysqli_insert_id($conn);
			if($result){
				header('location:adding_cat.php?category_id='.$category_id.'&success=1&type=edit');
				exit();
            }
    }
    if($_POST['type'] = 'edit'){
        $category_id=$_POST['category_id'];
        $category_name=$_POST['category_name'];
        $sql="UPDATE category SET category_name='$category_name' WHERE category_id=".$category_id;
			$result=mysqli_query($conn,$sql);
			if($result){
				header('location:adding_cat.php?category_id='.$category_id.'&success=1&type=edit');
				exit();
            }
    }
}
if($_GET['type'] = 'delete'){
    $category_id=$_GET['category_id'];
    $sql = "DELETE FROM category WHERE category_id =".$category_id;
    $result = mysqli_query($conn,$sql);
    if($result){
        header('location:category.php?&success=2');
		exit();
    }
}