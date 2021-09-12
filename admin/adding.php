<?php
require "inc/config.php";
require 'templates/header.php';
check_user_loggedin();

$product_id = '';
$product_name ='';
$product_description = '';
$product_price = '';
$product_Image = '';
$type = 'add';
$btn_label ='Add';
$category_id='';

if(isset($_GET['product_id']) && $_GET['product_id']){
	$product_id=$_GET['product_id'];
	$type = $_GET['type'];
	$btn_label = "Edit";
	$category_id=$_GET['category_id'];

	$sql="SELECT * FROM product where product_id=".$product_id;
	$result=mysqli_query($conn,$sql);
	while($row=mysqli_fetch_assoc($result)){
		$product_id = $row['product_id'];
        $product_name = $row['product_name'];
		$product_description = $row['product_description'];
		$product_price = $row['product_price'];
        $category_id = $row['category_id'];
	}
}
?>
<form action="productconfig.php" method="post">
	<input type="hidden" name="type" value="<?php echo $type; ?>">
	<?php if($product_id){ ?>
		<input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
	<?php } ?>
    Product Name:<input type="text" name="product_name" value="<?php echo $product_name; ?>"><br>
	Product Description :<textarea type="text" name="product_description" ><?php echo $product_description; ?></textarea><br>
    Product Price:<input type="text" name="product_price" value="<?php echo $product_price; ?>"><br>
    Select Category: <select name="category">
		<?php
			if(!empty($category_id)){
				$sqlc="SELECT * from category WHERE category_id = $category_id ";
				$resultc=mysqli_query($conn,$sqlc);
				if(mysqli_num_rows($resultc)>0){
					while($rowc=mysqli_fetch_assoc($resultc)){
						?><option value="<?php echo $rowc['category_id']?>"><?php echo $rowc['category_name']?></option><?php
					}
				}
				$sqld="SELECT * from category";
				$resultd=mysqli_query($conn,$sqld);
				if(mysqli_num_rows($resultd)>0){
					while($rowd=mysqli_fetch_assoc($resultd)){
						?><option value="<?php echo $rowd['category_id']?>"><?php echo $rowd['category_name']?></option><?php
					}
				}
			}
			else{?>
				<option value="">--Please choose an option--</option>
				<?php
				$sql="SELECT * from category";
				$result=mysqli_query($conn,$sql);
				if(mysqli_num_rows($result)>0){
					while($row=mysqli_fetch_assoc($result)){
						?><option value="<?php echo $row['category_id'] ?>"><?php echo $row['category_name']?></option><?php
					}
				}
			}
		?>
    </select><br>
	<input type="submit" name="update" value="<?php echo $btn_label; ?>">
</form>
<?php
require 'templates/footer.php';