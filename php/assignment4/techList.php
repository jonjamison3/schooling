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

$query = "select techID, firstName, lastName, email, phone from technicians";
$technicians = $db->query($query);
?>

<br/>
<br/>

<table>
    <tr><th>ID</th><th>First</th><th>Last</th><th>Email</th><th>phone</th></tr>
    <?php
        foreach($technicians as $tech):
    ?>
    <tr>
        <td><?php echo $tech['techID']; ?></td>
        <td><?php echo $tech['firstName']; ?></td>
        <td><?php echo $tech['lastName']; ?></td>
        <td><?php echo $tech['email']; ?></td>
        <td><?php echo $tech['phone']; ?></td>
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
<a href="under_construction.php">Add Tech</a>

<?php
include 'footer.php';
?>
