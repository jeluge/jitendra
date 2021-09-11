<?php
require "inc/config.php";
if(isset($_POST['type']) && $_POST['type']){
    if($_POST['type'] = 'edit'){
        $product_id=$_POST['product_id'];
        $product_name=$_POST['product_name'];
        $product_description=$_POST['product_description'];
        $product_price=$_POST['product_price'];
        $sql="UPDATE product SET product_name='$product_name',product_description='$product_description',product_price='$product_price' WHERE product_id=".$product_id;
			$result=mysqli_query($conn,$sql);
			if($result){
                header('location:adding.php?product_id='.$product_id.'&type=edit'."&error=0");
				exit();
            }
    }
    if($_POST['type'] = 'add'){
        $product_name=$_POST['product_name'];
        $product_description=$_POST['product_description'];
        $product_price=$_POST['product_price'];
        $sql="INSERT INTO product(product_name,product_description,product_price) VALUES('$product_name','$product_description','$product_price')";
				$result=mysqli_query($conn,$sql);
				$product_id = mysqli_insert_id($conn);
				if($result){
					header('location:adding.php?product_id='.$product_id.'&success=1&type=edit');
					exit();
                }
    }
}
if($_GET['type'] = 'delete'){
    $product_id=$_GET['product_id'];
    $sql = "DELETE FROM product WHERE product_id =".$product_id;
    $result = mysqli_query($conn,$sql);
    if($result){
        header('location:dashboard.php?&success=2');
		exit();
    }
}