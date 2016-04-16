<?php

require('database.php');
$incidentID = $_POST['incidentID'];


if (isset($_POST['btnDeleteIncident'])) {

    $query = "delete from incidents where incidentID='$incidentID'";

    try{
      $db->exec($query);
      header("Location: ./incidentList.php");
    }catch(Exception $e){
      echo "Encountered an exception: " . $e->getMessage();
    }
  }


?>
