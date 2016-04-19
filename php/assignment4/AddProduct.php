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
    $name =trim($_POST['txtName']);
    $version  = trim($_POST['txtVersion']);
    $releaseDate  =trim($_POST['txtDate']);

    $query = "SELECT * FROM products where productCode='$code'";
    $result = $db->prepare($query);
    $result->execute();
    $rowCount = $result->fetchAll(PDO::FETCH_COLUMN, 0);
    if(sizeof($rowCount)>0){
      $validCode = false;
    }else{
      $validCode = true;
    }

    if (preg_match("^[0-9]{4}-[0-1][0-9]-[0-3][0-9]^",$releaseDate)){
        $validDate = true;
    }else{
        $validDate = false;
    }
    //validate all those inputs as not empty and valid...
    if(!empty($code)&&!empty($name)&&!empty($version)&&!empty($releaseDate)&&$validDate===true&&$validCode===true){
      //try/catch for our db work
      try{
        //
        //if data is ok add a product to the database
        //

        //construct a query
        $query = "insert into products(productCode, name, version, releaseDate) values('$code', '$name', '$version', '$releaseDate')";
        //executing the query
        $db->exec($query);
        //redirecting for display of results

        //we should get here only if data was ok and added to the database
        //include 'index.php';
        //This will take you to the index.php for product_manager or the product list
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
      $missingInfo = [];

      if(empty($code)||$validCode===false){
        array_push($missingInfo, "code");
      }
      if(empty($name)){
        array_push($missingInfo, "name");
      }
      if(empty($version)){
        array_push($missingInfo, "version");
      }
      if(empty($releaseDate)||$validDate===false){
        array_push($missingInfo, "release date");
      }
      $missingInfo = join(", ", $missingInfo);
      $error = "<span style='color:red;font-style:italic;font-weight:bold;margin-left:5%;font-size:1.1em;'>Please enter a valid product $missingInfo and try again</span>";
      //redirecting to form
      include "AddProductForm.php";
    }
}
?>
