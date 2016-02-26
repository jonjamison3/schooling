<?php

//If resetting, do so early
if(isset($_POST['btnClear'])){
    include 'index.php';
    return;
}

//Grab input
$txtFeet = $_POST['txtFeet'];
$txtInches = $_POST['txtInches'];
$txtWeight = $_POST['txtWeight'];


//Validate input as calculator-worthy

//Ensure input values are numeric 
if ($txtFeet=="") {
    $feetError = "<span>Feet is required</span>";
}elseif (!is_numeric($txtFeet)) {
    $feetError = "<span>Please enter a numeric value</span>"; 
}
//As well as logically in scope of assigned limits
elseif ($txtFeet < 2||$txtFeet > 8) {
    $feetError = "<span>Feet must be between 2 and 8</span>";
}


//Repeating for other input 
if ($txtInches=="") {
    $inchesError = "<span>Inches are required</span>";
}elseif (!is_numeric($txtInches)) {
    $inchesError = "<span>Please enter a numeric value</span>"; 
}elseif ($txtInches < 0||$txtInches > 11) {
    $inchesError = "<span>Inches must be between 0 and 11</span>";
}

if ($txtWeight=="") {
    $weightError = "<span>Weight is required</span>";
}elseif (!is_numeric($txtWeight)) {
    $weightError = "<span>Please enter a numeric value</span>"; 
}elseif ($txtWeight < 85||$txtWeight > 600) {
    $weightError = "<span>Weight must be between 85 and 600</span>";
}


//Doing the math... Unless the math involves potentially dividing by zero
if (($txtFeet * $txtWeight) != 0) {
    $txtBMI =  rtrim(rtrim(number_format((($txtWeight/(pow( ( ($txtFeet * 12) + $txtInches), 2))) * 703), 1), 0), '.');
}else {
    $txtBMI = "";
}

//Assign status based on BMI scale values
if ($txtBMI=="") {
    $txtStatus = "";
}elseif ($txtBMI < 18.5) {
    $txtStatus = "Underweight";
}elseif ($txtBMI < 25) {
    $txtStatus = "Normal";
}elseif ($txtBMI < 30) {
    $txtStatus = "Overweight";
}else {
    $txtStatus = "Obese";
}

//Checking for error before returning final result
if(isset($feetError)||isset($inchesError)||isset($weightError)) {
    $txtResult="";
}else {
    $txtResult = "<b>".$txtStatus." - ".$txtBMI."</b>";
}

include 'index.php';
?>