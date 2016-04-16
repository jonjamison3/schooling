<?php

/*
 *   Logic to delete a product from the database is here
 */

require('database.php');
$productCode = $_POST['productCode'];


if (isset($_POST['btnDeleteProduct'])) {

    //
    //write the SQL to delete a product from the database\
    // wrap it in a try-catch block and use the database error page to display any
    // errors
    //
    $query = "delete from products where productCode='$productCode'";

    //
    //if the product is successfully deleted from the database
    //  navigate to the product list page by uncommenting the following line
    // header("Location: ./ProductList.php");

    try{
      $db->exec($query);
      header("Location: ./ProductList.php");
    }catch(Exception $e){
      echo "Encountered an exception: " . $e->getMessage();
    }
  }
//}

    //the following line will navigate to the product list
  //   header("Location: ./ProductList.php");


?>
