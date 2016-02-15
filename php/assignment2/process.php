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
$txtStatus="";

if (!is_numeric($txtFeet)) {
    $feetError = $feetError . "Please enter a numeric value";
} else if ($txtFeet < 2||$txtFeet>8) {
    $feetError = $feetError . "Feet must be between 2 and 8";
} 

if (!is_numeric($txtInches)) {
    $inchesError = $inchesError . "Please enter a numeric value";
} else if ($txtInches < 0||$txtInches>11) {
    $inchesError = $inchesError . "Inches must be between 0 and 11";
}

if (!is_numeric($txtWeight)) {
    $weightError = $weightError . "Please enter a numeric value";
} else if ($txtWeight < 85||$txtWeight>600) {
    $weightError = $weightError . "Weight must be between 85 and 600";
}

if(($txtFeet*$txtInches*$txtWeight)!=0){
$txtBMI=  number_format(($txtWeight/(pow((($txtFeet*12)+$txtInches),2)))*703, 1);
} else {
    $txtBMI = "";
}

if($txtBMI<18.5&&$txtBMI!==""){
    $txtStatus = $txtStatus."Underweight";
} else if($txtBMI<25){
    $txtStatus = $txtStatus."Normal";
} else if($txtBMI<30){
    $txtStatus = $txtStatus."Overweight";
} else {
    $txtStatus = $txtStatus."Obese";
}

include 'index.php';