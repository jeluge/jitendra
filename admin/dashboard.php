<?php
require 'inc/config.php';
require 'templates/header.php';
?>
<a href="adding.php">Add Product</a>
<a href="category.php">Categories</a>
<table border="1px">
  <tr>
  <th>Product ID</th>
    <th>Product Name</th>
    <th>Product Description</th>
    <th>Product Price</th>
    <th>Action</th>
    <th> Product Image</th>
    <th> Category </th>
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
        $category_id=$row['category_id'];
        echo "<td> <a href='adding.php?product_id=".$row['product_id']."&type=edit"."&category_id=".$row['category_id']."'>EDIT</a>||
                    <a href='productconfig.php?product_id=".$row['product_id']."&type=delete'>DELETE</a></td>";
        echo "<td> <a href='images.php?product_id=".$row['product_id']."'>IMAGES</a></td>";

        $sql1 = "SELECT * FROM category WHERE category_id =".$category_id;
        $result1=mysqli_query($conn,$sql1);
            if(mysqli_num_rows($result1)>0){
                while($row=mysqli_fetch_assoc($result1)){      
                    echo '<td>'.$row['category_name'].'</td>';
                }
            }
            else{
                echo '<td>'."No Category".'</td>';
            }
        echo '</tr>';
    }
}
?>
</table>
<?php
require 'templates/footer.php';
?>