<?php
require('database.php');

//
// Write code to access the database and retrieve all products sorted by name
//
//
// Build a table of products with a delete button in last colum containing a hidden field
//  for the product id and an action that goes to DeleteProduct.php
//

include 'header.php';

$query = "select * from products order by name";
$products = $db->query($query);
?>

<br/>
<br/>

<table>
    <tr><th>Code</th><th>Name</th><th>Version</th><th>Release Date</th></tr>
    <?php
        foreach($products as $product):
    ?>
    <tr>
        <td><?php echo $product['productCode']; ?></td>
        <td><?php echo $product['name']; ?></td>
        <td><?php echo $product['version']; ?></td>
        <td><?php echo $product['releaseDate']; ?></td>
        <td><input type="button" value="Delete"/></td>
    </tr>
    <?php
        endforeach;
    ?>
</table>

<br/>
<br/>

<br/>
<br/>
<a href="AddProductForm.php">Add Product</a>

<?php
include 'footer.php';
?>