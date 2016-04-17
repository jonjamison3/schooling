<?php

/*
 *   Logic to delete a customer from the database is here
 */

require('database.php');
$customerID = $_POST['customerID'];


if (isset($_POST['btnDeleteCustomer'])) {

    $query = "delete from customers where customerID='$customerID'";

    try{
      $db->exec($query);
      header("Location: ./customerList.php");
    }catch(Exception $e){
      echo "Encountered an exception: " . $e->getMessage();
    }
  }


?>
