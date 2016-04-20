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
    //assign a variable for array of rows returned from query
    $rowCount = $result->fetchAll(PDO::FETCH_COLUMN, 0);
    //if rows are actually returned, input is invalid
    if(sizeof($rowCount)>0){
      $validCode = false;
    }else{
      $validCode = true;
    }
    //regex check for required date format
    if (preg_match("^[0-9]{4}-[0-1][0-9]-[0-3][0-9]^",$releaseDate)){
        $validDate = true;
    }else{
        $validDate = false;
    }
    //validate inputs as not empty and valid
    if(!empty($name)&&!empty($version)&&$validDate===true&&$validCode===true){
      //try/catch for our db work
      try{
        //
        //if data is ok add a product to the database
        //

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
      //
      //if data is NOT ok - show error message and redisplay form
      //
      //create array to catch string values of invalid input
      $missingInfo = [];

      //check given input for our failure causing culprit(s)

      badInputCheck($code, $missingInfo, 'code', $validCode);
      badInputCheck($name, $missingInfo, 'name');
      badInputCheck($version, $missingInfo, 'version');
      badInputCheck($releaseDate, $missingInfo, 'release date', $validDate);

      //create string for display of proper informative error
      $missingInfo = join(", ", $missingInfo);
      $feedback = "Please enter a valid product $missingInfo and try again";
      //redirecting to form
      include "AddProductForm.php";
    }
}
function badInputCheck($inputName, &$failTarget, $failString, $otherwiseValid=true){
  if(empty($inputName)||$otherwiseValid===false){
    array_push($failTarget, $failString);
  }
}
?>
