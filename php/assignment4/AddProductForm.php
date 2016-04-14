<?php
/*
 * This page will edit and add product data to the database.
 */

require('database.php');

include 'header.php';
?>
<form action="AddProduct.php" method="Post">

    <br/>
    <br/>
    <h2>Add Product</h2>
    <table class="borderless">
        <form method="post" action="AddProduct.php"> 
            <tr><td>Code: </td><td><input type="text" name ="txtCode" /></td><td></td></tr>
            <tr><td>Name: </td><td><input type="text" name ="txtName" /></td><td></td></tr>
            <tr><td>Version: </td><td><input type="text" name ="txtVersion" /></td><td></td></tr>
            <tr><td>Release Date: </td><td><input type="text" name ="txtDate" /></td><td>Use 'yyyy-mm-dd' format</td></tr>
            <tr><td></td><td><input type="submit" name ="btnAddProduct" value="Add Product"/></td><td></td></tr>
        </form>
    </table>
    <br/>
    <br/>
     <a href="productList.php">View Product List</a>
</form>

<?php

include "footer.php";
?>

