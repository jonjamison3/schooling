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

$query = "select incidentID, customerID, productCode, dateOpened, title, description from incidents";
$incidents = $db->query($query);
?>

<br/>
<br/>

<table>
    <tr><th>ID</th><th>Customer</th><th>Product</th><th>Date Opened</th><th>Title</th><th>Description</th></tr>
    <?php
        foreach($incidents as $incident):
    ?>
    <tr>
      <form action="AddIncident.php" method="post">
        <td><?php echo $incident['incidentID']; ?></td>
        <td><?php echo $incident['customerID']; ?></td>
        <td><?php echo $incident['productCode']; ?></td>
        <td><?php echo $incident['dateOpened']; ?></td>
        <td><?php echo $incident['title']; ?></td>
        <td><?php echo $incident['description']; ?></td>
        <td><input type="submit" value="Delete"/></td>
      </form>
    </tr>
    <?php
        endforeach;
    ?>
</table>

<br/>
<br/>

<br/>
<br/>
<a href="AddIncidentForm.php">Add Incident</a>

<?php
include 'footer.php';
?>
