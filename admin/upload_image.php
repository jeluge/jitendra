<?php
require "inc/config.php";

if(isset($_POST['upload_image'])){
	$product_id=$_POST['product_id'];
    if($_FILES['image']['error'] == 0){
        if($_FILES['image']['type'] == 'image/png'||$_FILES['image']['type'] == 'image/jpeg' ||$_FILES['image']['type'] == 'image/jpg'){
            if(move_uploaded_file($_FILES['image']['tmp_name'],'images/'.$_FILES['image']['name'])){
                $image = $_FILES['image']['name'];
                $sql = "INSERT INTO product_image(image_name,product_id) VALUES('$image','$product_id')";
                $result = mysqli_query($conn,$sql);
                if($result){
                    header('location:images.php?product_id='.$product_id);
				    exit();
                }
            }
        }
    }
}
