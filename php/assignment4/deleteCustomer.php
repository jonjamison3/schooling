<?php

/*
 *   Logic to delete a product from the database is here
 */

require('database.php');
$customerID = $_POST['customerID'];


if (isset($_POST['btnDeleteCustomer'])) {

    //
    //write the SQL to delete a product from the database\
    // wrap it in a try-catch block and use the database error page to display any
    // errors
    //
    $query = "delete from customers where customerID='$customerID'";

    //
    //if the product is successfully deleted from the database
    //  navigate to the product list page by uncommenting the following line
    // header("Location: ./ProductList.php");

    try{
      $db->exec($query);
      header("Location: ./customerList.php");
    }catch(Exception $e){
      echo "Encountered an exception: " . $e->getMessage();
    }
  }


?>
