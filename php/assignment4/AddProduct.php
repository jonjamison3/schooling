<?php

/* 
 *   Logic to edit and add a product to the database is here
 */

require('database.php');

if (isset($_POST['btnAddProduct'])) {
    $code  = $_POST['txtCode'];
    $name = $_POST['txtName'];
    $version  = $_POST['txtVersion'];
    $releaseDate  = $_POST['txtDate'];
    
    $query = "insert into products values($code, $name, $version, $releaseDate)";
    $db->query($query);
    //
    //edit the data
    //

    //
    //if data is ok add a product to the database 
   //
    
   //
   //if data is NOT ok - show error message and redisplay form
   //
   

}

//we should get here only if data was ok and added to the database
//include 'index.php'; //This will take you to the index.php for product_manager or the product list
 header("Location: ./ProductList.php");

?>
