<?php
require('database.php');

include 'header.php';
    if (isset($_POST['btnAddProduct'])) {
        $customerID  = $_POST['txtCustomerID'];
        $productCode = $_POST['txtProductCode'];
        $title  = $_POST['txtTitle'];
        $description  = $_POST['txtDescription'];
        if(trim($customerID)==""||trim($productCode)==""||trim($title)==""||trim($description)==""){

            header("Location: ./AddIncidentForm.php");
            echo "<span>Please enter some input</style>";
        }else {
            $query = "insert into incidents values(default, $customerID, $productCode,null, NOW(), null, $title, $description)";
            $db->query($query);

            header("Location: ./incidentList.php");
        }
    }
?>