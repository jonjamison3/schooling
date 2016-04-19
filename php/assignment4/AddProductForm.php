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
      <?php if(isset($error)){echo $error;} ?>
        <form method="post" action="AddProduct.php">
            <tr><td>Code: </td><td><input type="text" name ="txtCode" value="<?php if(isset($code)){echo $code;}?>" /></td><td></td></tr>
            <tr><td>Name: </td><td><input type="text" name ="txtName" value="<?php if(isset($name)){echo $name;}?>" /></td><td></td></tr>
            <tr><td>Version: </td><td><input type="text" name ="txtVersion" value="<?php if(isset($version)){echo $version;}?>" /></td><td></td></tr>
            <tr><td>Release Date: </td><td><input type="text" name ="txtDate" value="<?php if(isset($releaseDate)){echo $releaseDate;}?>" /></td><td <?php if(isset($validDate)&&$validDate===false){echo "'style=color:red'"; } ?>>Use 'yyyy-mm-dd' format</td></tr>
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
