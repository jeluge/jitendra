<?php
require 'inc/config.php';
require 'templates/header.php';

?>
<a href="adding_cat.php">Add Categories</a>
<table border="1px">
    <tr>
        <th>Category ID </th>
        <th>Category Name </th>
        <th>Action </th>
    </tr>
<?php
$sql="SELECT * from category";
	$result=mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)>0){
		while($row=mysqli_fetch_assoc($result)){
            echo '<tr>';
            echo '<td>'.$row['category_id'].'</td>';
		    echo '<td>'.$row['category_name'].'</td>';
            echo "<td> <a href='adding_cat.php?type=edit"."&category_id=".$row['category_id']."'>EDIT</a>||
            <a href='catconfig.php?category_id=".$row['category_id']."&type=delete'>DELETE</a></td>";
        }
    }
?>
</table>