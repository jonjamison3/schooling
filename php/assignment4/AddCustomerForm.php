<?php
/*
 * This page will edit and add product data to the database.
 */

require('database.php');

include 'header.php';

$query = "SELECT countryName FROM countries where countryName!='United States'";
$countries = $db->query($query);
?>
<form action="#" method="Post">

    <br/>
    <br/>
    <h2>Add Customer</h2>
    <table class="borderless">
        <tr><td>First: </td><td><input type="text" name ="txtFirstName" /></td></tr>
        <tr><td>Last: </td><td><input type="text" name ="txtLastName" /></td></tr>
        <tr><td>Address: </td><td><input type="text" name ="txtTitle" /></td></tr>
        <tr><td>City: </td><td><input type="text" name ="txtCustomerID" /></td></tr>
        <tr><td>State: </td><td><input type="text" name ="txtState" /></td></tr>
        <tr><td>Zip: </td><td><input type="text" name ="txtTitle" /></td></tr>
        <tr><td>Country: </td><td>
                <select name="ddlCountry" >
                    <?php foreach($countries as $country): ?>
                    <option>United States</option>
                    <option><?php echo $country['countryName']?></option>
                    <?php endforeach;?>
                </select></td></tr>
        <tr><td>Phone: </td><td><input type="text" name ="txtProductCode" /></td></tr>
        <tr><td>Email: </td><td><input type="text" name ="txtTitle" /></td></tr>
        <tr><td></td><td><input type="button" name ="btnAddCustomer" value="Add Customer"/></td><td></td></tr>
    </table>
    <br/>
    <br/>
     <a href="incidentList.php">View Incident List</a>
</form>

<?php

include "footer.php";