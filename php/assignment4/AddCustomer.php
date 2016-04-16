<?php
require('database.php');

include 'header.php';
    if (isset($_POST['btnAddCustomer'])) {
        $first  = $_POST['txtFirstName'];
        $last = $_POST['txtLastName'];
        $address  = $_POST['txtAddress'];
        $state  = $_POST['txtState'];
        $zip = $_POST['txtZip'];
        $country = $_POST['ddlCountry'];
        $phone  = $_POST['txtPhone'];
        $email  = $_POST['txtEmail'];
        /*if(trim($first)==""||trim($last)==""||trim($address)==""||trim($state)==""||trim($zip)==""||trim($country)==""||trim($phone)==""||trim($email)==""){

            
            echo "<span>Please enter some input</style>";
        }else {*/
            $query = "insert into customers values(default, $first, $last, $address, $city, $state, $zip, $country, $phone, $email, $password, 'sesame')";
            $db->query($query);

            header("Location: ./customerList.php");
        //}
    }
?>