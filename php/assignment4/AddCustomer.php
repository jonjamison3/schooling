<?php
require('database.php');

include 'header.php';
    if (isset($_POST['btnAddCustomer'])) {
        $first  = $_POST['txtFirstName'];
        $last = $_POST['txtLastName'];
        $address  = $_POST['txtAddress'];
        $city = $_POST['txtCity'];
        $state  = $_POST['txtState'];
        $zip = $_POST['txtZip'];
        $country = $_POST['ddlCountry'];
        $phone  = $_POST['txtPhone'];
        $email  = $_POST['txtEmail'];


        $query = "insert into customers(firstName, lastName, address, city, state, postalCode, countryCode, phone, email, password) values('$first', '$last', '$address', '$city', '$state', '$zip', '$country', '$phone', '$email', 'sesame')";
        try{
          $db->query($query);

          header("Location: ./customerList.php");
        }else(Exception $e){
          $error = $e->getMessage();
          echo "You've run into an error with the exception: " . $error;
        }
    }
?>
