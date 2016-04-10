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

$query = "select * from products order_by name";
$products = $db->query($query);
?>

<br/>
<br/>
<h2>Remove this markup and replace it with a table containing Products 
        data(along with a column for a delete) as shown in the assignment UI</h2>

<table>
    <?php
        //foreach($products as $product):
    ?>
    <tr><td></td></tr>
    <?php
        //endforeach;
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