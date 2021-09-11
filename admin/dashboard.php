<?php
require 'inc/config.php';
require 'templates/header.php';
?>
<a href="adding.php?type=add">Add Product</a>
<table border="1px">
  <tr>
  <th>Product ID</th>
    <th>Product Name</th>
    <th>Product Description</th>
    <th>Product Price</th>
    <th>Product Image</th>
    <th> Action </th>
  </tr>
<?php
$sql="SELECT * FROM product";
$result=mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        echo '<tr>';
        echo '<td>'.$row['product_id'].'</td>';
		echo '<td>'.$row['product_name'].'</td>';
		echo '<td>'.$row['product_description'].'</td>';
		echo '<td>'.$row['product_price'].'</td>';
        echo "<td> <a href='adding.php?product_id=".$row['product_id']."&type=edit'>EDIT</a>||
                    <a href='productconfig.php?product_id=".$row['product_id']."&type=delete'>DELETE</a></td>";
        echo "<td> <a href='images.php?product_id=".$row['product_id']."'>IMAGES</a></td>";
        echo '</tr>';
    }
}
?>
</table>
<?php
require 'templates/footer.php';
?>