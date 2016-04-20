<?php

/*
 *   Logic to edit and add a product to the database is here
 */

require('database.php');

if (isset($_POST['btnAddProduct'])) {
    //
    //edit the data
    //

    //grabbing input and assigning to variables
    $code  = trim($_POST['txtCode']);
    $name = trim($_POST['txtName']);
    $version  = trim($_POST['txtVersion']);
    $releaseDate  = trim($_POST['txtDate']);

    //query db for productcode input to ensure it's not a duplicate
    $query = "SELECT * FROM products where productCode='$code'";
    $result = $db->prepare($query);
    $result->execute();

    //returning number of duplicates by "fetching all" first column values
    $matchCount = sizeof($result->fetchAll(PDO::FETCH_COLUMN, 0));

    //if a row is actually returned, input is invalid
    if($matchCount>0){
      $validCode = false;
    }else{
      $validCode = true;
    }
    //check for required date format
    $validDate = isValidDate($releaseDate);
    //quick check that version is indeed a number
    $validVersion = is_numeric($version);
    //validate inputs as not empty and valid
    if(!empty($name)&&$validVersion&&$validDate&&$validCode){
      //try/catch for our db work
      try{
        //if data is ok add a product to the database

        //construct a new query for insertion
        $query = "insert into products(productCode, name, version, releaseDate) values('$code', '$name', '$version', '$releaseDate')";
        //executing the query
        $db->exec($query);

        //we should get here only if data was ok and added to the database
        //This will take you to the index.php for product_manager or the product list
        //redirecting for display of results
        include "AddProductForm.php";
        header("Location: ./ProductList.php");
      }catch(Exception $e){
        //here be your error
        echo "Encountered an exception: ". $e->getMessage();
      }
    } else {
      //if data is NOT ok - show error message and redisplay form

      //create array to catch string values of invalid input
      $badInfo = [];
      //check given input for our failure causing culprit(s)
      badInputCheck($code, $badInfo, 'code', $validCode);
      badInputCheck($name, $badInfo, 'name');
      badInputCheck($version, $badInfo, 'version', $validVersion);
      badInputCheck($releaseDate, $badInfo, 'release date', $validDate);

      //create string for display of proper informative error
      $badInfo = join(", ", $badInfo);
      $feedback = "Please enter a valid product $badInfo and try again";
      //redirecting to form
      include "AddProductForm.php";
    }
}
function badInputCheck($inputName, &$failArray, $failString, $otherwiseValid=true){
  //if our field is empty going in or not otherwise valid due to optional param
  if(empty($inputName)||$otherwiseValid===false){
    //push to our target 'error' array a string of our choosing
    array_push($failArray, $failString);
  }
}
function isValidDate($date){
    //using DateTime class was the easier way to validate range of day/month
    //... compared to regex check I tried previously, anyway

    //create a date object in desired format from input
    $testDate = DateTime::createFromFormat('Y-m-d', $date);
    //new date should exist, and match format of input date when called specifically
    return $testDate && $testDate->format('Y-m-d') === $date;
}
?>
