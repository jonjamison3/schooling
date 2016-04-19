<?php

/*
 *   Logic to edit and add a product to the database is here
 */

require('database.php');

if (isset($_POST['btnAddProduct'])) {
    //grabbing input and assigning to variables
    $code  = trim($_POST['txtCode']);
    $name =trim($_POST['txtName']);
    $version  = trim($_POST['txtVersion']);
    $releaseDate  =trim($_POST['txtDate']);

    if (preg_match("^[0-9]{4}-[0-1][0-9]-[0-3][0-9]^",$releaseDate)){
        $validDate = true;
    }else{
        $validDate = false;
    }
    //validate all those inputs...
    if(!empty($code)&&!empty($name)&&!empty($version)&&!empty($releaseDate)&&$validDate===true){
      //try/catch for our db work
      try{
        //construct a query
        $query = "insert into products(productCode, name, version, releaseDate) values('$code', '$name', '$version', '$releaseDate')";
        //executing the query
        $db->exec($query);
        //redirecting for display of results
        include "AddProductForm.php";
        header("Location: ./ProductList.php");
      }catch(Exception $e){
        //here be your error
        echo "Encountered an exception: ". $e->getMessage();
      }
    } else {
      $missingInfo = [];
      //constructing a catch-all error
      if(empty($code)){
        array_push($missingInfo, "code");
      }
      if(empty($name)){
        array_push($missingInfo, "name");
      }
      if(empty($version)){
        array_push($missingInfo, "version");
      }
      if(empty($releaseDate)||$validate===false){
        array_push($missingInfo, "release date");
      }
      $missingInfo = join(", ", $missingInfo);
      $error = "<span style='color:red;font-weight:bold;margin-left:10%;font-size:1.1em;'>Please enter a valid product $missingInfo and try again</span>";
      //redirecting to form
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
