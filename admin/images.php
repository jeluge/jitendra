<?php
require 'templates/header.php';
require 'inc/config.php';
check_user_loggedin();

$product_id=$_GET['product_id'];

?>
<form action="upload_image.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="product_id" value="<?php echo $product_id ?>">
  Select image to upload:
  <input type="file" name="image"><br><br>
  <input type="submit" name="upload_image" value="Upload Image">
</form>

<?php
$sql="SELECT * from product_image WHERE product_id='$product_id'";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
			echo "<img src='".IMG_URL.$row["image_name"]."'>";
			echo "<br>";
			echo $row['image_name'];
			echo "<br>";
			echo "<td> <a href='delete_image.php?image_id=".$row['image_id']."&type=delete"."&product_id=$product_id'>DELETE</a></td>";
			echo "<br>";
		}
	}
require 'templates/footer.php';
