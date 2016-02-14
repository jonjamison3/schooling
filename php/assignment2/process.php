<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if(isset($_POST['btnClear'])){
    include 'index.php';
    return;
}
$feetError = "";
$inchesError = "";
$weightError = "";

$txtFeet=$_POST['txtFeet'];
$txtInches=$_POST['txtInches'];
$txtWeight=$_POST['txtWeight'];


if (!is_numeric($txtFeet)) {
    $feetError = $feetError . "Please enter a numeric value.";
} else if ($txtFeet < 0) {
    $feetError = $feetError . "Feet must be greater than 0.";
}

if (!is_numeric($txtInches)) {
    $inchesError = $inchesError . "Please enter a numeric value.";
} else if ($txtInches < 0) {
    $inchesError = $inchesError . "Inches must be greater than 0.";
}

if (!is_numeric($txtWeight)) {
    $weightError = $weightError . "Please enter a numeric value.";
} else if ($txtWeight < 85||$txtWeight>600) {
    $weightError = $weightError . "Weight must be between 85 and 600.";
}

include 'index.php';