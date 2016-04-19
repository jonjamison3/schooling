<?php
require('database.php');

include 'header.php';
    if (isset($_POST['btnAddCustomer'])) {
      //grabbing all the inputs
      $first  = $_POST['txtFirstName'];
      $last = $_POST['txtLastName'];
      $address  = $_POST['txtAddress'];
      $city = $_POST['txtCity'];
      $state  = $_POST['txtState'];
      $zip = $_POST['txtZip'];
      $country = $_POST['ddlCountry'];
      $phone  = $_POST['txtPhone'];
      $email  = $_POST['txtEmail'];

      //doing some minor validation to test for empty fields
      if(!empty($first)&&!empty($last)&&!empty($address)&&!empty($city)&&!empty($state)&&!empty($zip)&&!empty($phone)&&!empty($email)){
        //constructing query
        $query = "insert into customers(firstName, lastName, address, city, state, postalCode, countryCode, phone, email, password) values('$first', '$last', '$address', '$city', '$state', '$zip', '$country', '$phone', '$email', 'sesame')";
        try{
          //firing it off and redirect
          $db->query($query);
          header("Location: ./customerList.php");
        }else(Exception $e){
          //else display error with message saying what we're displaying
          $error = $e->getMessage();
          echo "You've run into an error with the exception: " . $error;
        }
      }
    }
?>
