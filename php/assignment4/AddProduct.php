<?php

/*
 *   Logic to edit and add a product to the database is here
 */

require('database.php');

if (isset($_POST['btnAddProduct'])) {
    //grabbing input and assigning to variables
    $code  = $_POST['txtCode'];
    $name = $_POST['txtName'];
    $version  = $_POST['txtVersion'];
    $releaseDate  = $_POST['txtDate'];


    //validate all those inputs...
    if(!empty($code)&&!empty($name)&&!empty($version)&&!empty($releaseDate)){
      //try/catch for our db work
      try{
        //construct a query
        $query = "insert into products(productCode, name, version, releaseDate) values('$code', '$name', '$version', '$releaseDate')";
        //executing the query
        $db->exec($query);
        //redirecting for display of results
        echo "<span style='color:green;font-weight:bold;margin-left:20%;font-size:1.7em;'>Success!</span>";
        include "AddProductForm.php";
        header("Location: ./ProductList.php");
      }catch(Exception $e){
        echo "Encountered an exception: ". $e->getMessage();
      }
    } else {
      echo "<span style='color:red;font-weight:bold;margin-left:20%;font-size:1.7em;'>Please enter some valid input and try again! </span>";
      include "AddProductForm.php";
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
