<?php

/*
 *   Logic to delete a product from the database is here
 */

require('database.php');
$productCode = $_POST['productCode'];

if (isset($_POST['btnDeleteProduct'])) {
    //write the SQL to delete a product from the database\
    $query = "delete from products where productCode='$productCode'";
    // wrap it in a try-catch block and use the database error page to display any
    // errors
    try{
      //if the product is successfully deleted from the database
      $db->exec($query);
      //navigate to the product list page
      header("Location: ./ProductList.php");
    }catch(Exception $e){
      echo "Encountered an exception: " . $e->getMessage();
    }
  }


?>
