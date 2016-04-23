<?php

/*
 *   Logic to add an incident from the database is here
 */

  require('database.php');
    $customerID  = $_POST['txtCustomerID'];
    $productCode = $_POST['txtProductCode'];
    $title  = $_POST['txtTitle'];
    $description  = $_POST['txtDescription'];

  if (isset($_POST['btnAddIncident'])) {
      //gathering input sent over and assigning variables
      $validCustomerID = isValidCustomerID($customerID, $db);
      $validProductCode = isValidProductCode($productCode, $db);
      //validate inputs as not empty and valid
      if($validCustomerID&&$validProductCode&&!empty($title)&&!empty($description)){
        //try/catch for our db work
        try{
          //if data is ok add a product to the database

          //construct a new query for insertion
          $query = "insert into incidents values(default, '$customerID', '$productCode',null, NOW(), null, '$title', '$description')";
          //executing the query
          $db->exec($query);

          //redirecting for display of results
          header("Location: ./incidentList.php");
        }catch(Exception $e){
          //here be your error
          echo "Encountered an exception: ". $e->getMessage();
        }
      } else {
        //if data is NOT ok - show error message and redisplay form

        //create array to catch string values of invalid input
        $badInfo = [];
        //check given input for our failure causing culprit(s)
        badInputCheck($customerID, $badInfo, 'customer ID', $validCustomerID);
        badInputCheck($productCode, $badInfo, 'product code', $validProductCode);
        badInputCheck($title, $badInfo, 'title');
        badInputCheck($description, $badInfo, 'description');

        //create string for display of proper informative error
        $badInfo = join(", ", $badInfo);
        $feedback = "Please enter a valid $badInfo and try again";
        //redirecting to form
        include "AddIncidentForm.php";
      }

  }
  function badInputCheck($inputName, &$failArray, $failString, $otherwiseValid=true){
    //if our field is empty going in or not otherwise valid due to optional param
    if(empty($inputName)||$otherwiseValid===false){
      //push to our target 'error' array a string of our choosing
      array_push($failArray, $failString);
    }
  }
  function isValidCustomerID($customerID, $db){
    //query db for productcode input to ensure it's not a duplicate
    $query = "SELECT * FROM customers where customerID='$customerID'";
    $result = $db->prepare($query);
    $result->execute();

    //returning number of duplicates by "fetching all" first column values
    $matchCount = sizeof($result->fetchAll(PDO::FETCH_COLUMN, 0));

    //if a row is actually returned, input is invalid
    if($matchCount>0){
      return false;
    }else{
      return true;
    }
  }
  function isValidProductCode($productCode, $db){
    //query db for productcode input to ensure it's not a duplicate
    $query = "SELECT * FROM products where productCode='$productCode'";
    $result = $db->prepare($query);
    $result->execute();

    //returning number of duplicates by "fetching all" first column values
    $matchCount = sizeof($result->fetchAll(PDO::FETCH_COLUMN, 0));

    //if a row is actually returned, input is valid
    if($matchCount==0){
      return false;
    }else{
      return true;
    }
  }

?>
