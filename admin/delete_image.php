<?php
require 'inc/config.php';

$product_id=$_GET['product_id'];

if(isset($_GET['type']) && $_GET['type']){
    $image_id=$_GET['image_id'];
				$sqll="SELECT image_name from product_image WHERE image_id=".$image_id;
				$resultt=mysqli_query($conn,$sqll);
				if($resultt){
					if($row=mysqli_fetch_assoc($resultt)){
						$image_name=$row['image_name'];
						$sql = "DELETE FROM product_image WHERE image_id=".$image_id;
						$result=mysqli_query($conn,$sql);
						if($result){
							if(unlink(IMG_PATH.$image_name)){
								header('location:images.php?image_id='.$image_id."&product_id=".$product_id.'&delete=1');
								exit();
							}
                        }
                    }
                }
}   