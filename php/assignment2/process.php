<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$feetError = "";
$inchesError = "";
$weightError = "";

$txtFeet=$_POST['txtFeet'];
$txtInches=$_POST['txtInches'];
$txtWeight=$_POST['txtWeight'];

if(isset($_POST['btnClear'])){
    include 'index.php';
    return;
}
if (!is_numeric($txtFeet)) {
    $feetError = $feetError . "Please enter a numeric value.";
} else if ($txtFeet < 0) {
    $feetError = $feetError . "Feet must be greater than 0.";
}

if (!is_numeric($txtInches)) {
    $inchesError = $inchesError . "Please enter a numeric value.";
} else if ($txtInches < 0) {
    $inchesError = $inchesError . "Feet must be greater than 0.";
}

if (!is_numeric($txtWeight)) {
    $weightError = $weightError . "Please enter a numeric value.";
} else if ($txtWeight < 0) {
    $weightError = $weightError . "Feet must be greater than 0.";
}

include 'index.php';