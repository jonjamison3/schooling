<?php

/*
 *   Logic to add an incident from the database is here
 */

require('database.php');

include 'header.php';
    if (isset($_POST['btnAddProduct'])) {
        //gathering input sent over and assigning variables
        $customerID  = $_POST['txtCustomerID'];
        $productCode = $_POST['txtProductCode'];
        $title  = $_POST['txtTitle'];
        $description  = $_POST['txtDescription'];
        //try/catch for potential errors
        try{
          //constructing a query
          $query = "insert into incidents values(default, '$customerID', '$productCode',null, NOW(), null, '$title', '$description')";
          //using the query
          $db->query($query);
          //redirecting to listed items
          header("Location: ./incidentList.php");
        }catch(Exception $e){
          //providing message with exception for user
          echo "Encountered an error with the exception: " . $e.getMessage();
        }
    }
?>
