<?php
require "inc/config.php";
require 'templates/header.php';

$product_id = '';
$product_name ='';
$product_description = '';
$product_price = '';
$product_Image = '';
$type = 'add';
$btn_label ='Add';

if(isset($_GET['product_id']) && $_GET['product_id']){
	$product_id=$_GET['product_id'];
	$type = $_GET['type'];
	$btn_label = "Edit";

	$sql="SELECT * FROM product where product_id=".$product_id;
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result)){
        $product_name = $row['product_name'];
		$product_description = $row['product_description'];
		$product_price = $row['product_price'];
	}
}
?>
<form action="productconfig.php" method="post">
	<input type="hidden" name="type" value="<?php echo $type; ?>">
	<?php if($product_id){ ?>
		<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
	<?php } ?>
    Product Name:<input type="text" name="product_name" value="<?php echo $product_name; ?>"><br>
	Product Description:<input type="text" name="product_description" value="<?php echo $product_description; ?>"><br>
	Product Price :<textarea type="text" name="product_price" ><?php echo $product_price; ?></textarea><br>
	<input type="submit" name="update" value="<?php echo $btn_label; ?>">
</form>
<?php
require 'templates/footer.php';
?>