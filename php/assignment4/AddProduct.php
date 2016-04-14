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
    if(trim($code)==""||trim($name)==""||trim($version)==""||trim($releaseDate)==""){
        
        header("Location: ./AddProductForm.php");
        echo "<span>Please enter some input</style>";
    }else {
        $query = "insert into products values($code, $name, $version, $releaseDate)";
        $db->query($query);
        
        header("Location: ./ProductList.php");
    }
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
 

?>
