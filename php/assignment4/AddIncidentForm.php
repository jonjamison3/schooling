<?php
/*
 * This page will edit and add product data to the database.
 */

require('database.php');

include 'header.php';
?>
<form action="#" method="Post">

    <br/>
    <br/>
    <h2>Add Incident</h2>
    <table class="borderless">
        <tr><td>Customer ID: </td><td><input type="text" name ="txtCustomerID" /></td><td></td></tr>
        <tr><td>Product Code: </td><td><input type="text" name ="txtProductCode" /></td><td></td></tr>
        <tr><td>Title: </td><td><input type="text" name ="txtTitle" /></td><td></td></tr>
        <tr><td>Description: </td><td><textarea rowspan=2 name ="txtDescription"></textarea></td><td></td></tr>
        <tr><td></td><td><input type="button" name ="btnAddProduct" value="Add Incident"/></td><td></td></tr>
    </table>
    <br/>
    <br/>
     <a href="incidentList.php">View Incident List</a>
</form>

<?php

include "footer.php";