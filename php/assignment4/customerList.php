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

$query = "select customerID, firstName, lastName, address, city, state, postalCode, countryCode, phone, email from customers";
$customers = $db->query($query);
?>

<br/>
<br/>

<table>
    <tr><th>ID</th><th>First</th><th>Last</th><th>Address</th><th>City</th><th>State</th><th>Zip</th><th>Country</th><th>Phone</th><th>Email</th></tr>
    <?php
        foreach($customers as $customer):
    ?>
    <tr>
      <form action="AddCustomer.php" method="post">
        <td><?php echo $customer['customerID']; ?></td>
        <td><?php echo $customer['firstName']; ?></td>
        <td><?php echo $customer['lastName']; ?></td>
        <td><?php echo $customer['address']; ?></td>
        <td><?php echo $customer['city']; ?></td>
        <td><?php echo $customer['state']; ?></td>
        <td><?php echo $customer['postalCode']; ?></td>
        <td><?php echo $customer['countryCode']; ?></td>
        <td><?php echo $customer['phone']; ?></td>
        <td><?php echo $customer['email']; ?></td>
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
<a href="AddCustomerForm.php">Add Customer</a>

<?php
include 'footer.php';
?>
