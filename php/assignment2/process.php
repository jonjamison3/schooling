<?php

//If resetting, do so early
if(isset($_POST['btnClear'])){
    include 'index.php';
    return;
}

//Initialize Variables
$feetError = null;
$inchesError = null;
$weightError = null;
$txtStatus= "";
$txtResult= "";

//Grab input
$txtFeet = $_POST['txtFeet'];
$txtInches = $_POST['txtInches'];
$txtWeight = $_POST['txtWeight'];


//Validate input as calculator-worthy

//Ensure input values are numeric 
if ($txtFeet=="") {
    $feetError = $feetError . "<span>Feet are required</span>";
}elseif (!is_numeric($txtFeet)) {
    $feetError = $feetError . "<span>Please enter a numeric value</span>"; 
}
//As well as logically in scope of assigned limits
elseif ($txtFeet < 2||$txtFeet > 8) {
    $feetError = $feetError . "<span>Feet must be between 2 and 8</span>";
} 


//Repeating for other input 
if ($txtInches=="") {
    $inchesError = $inchesError . "<span>Inches are required</span>";
}elseif (!is_numeric($txtInches)) {
    $inchesError = $inchesError . "<span>Please enter a numeric value</span>"; 
}elseif ($txtInches < 0||$txtInches > 11) {
    $inchesError = $inchesError . "<span>Inches must be between 0 and 11</span>";
}

if ($txtWeight=="") {
    $weightError = $weightError . "<span>Feet are required</span>";
}elseif (!is_numeric($txtWeight)) {
    $weightError = $weightError . "<span>Please enter a numeric value</span>"; 
}elseif ($txtWeight < 85||$txtWeight > 600) {
    $weightError = $weightError . "<span>Weight must be between 85 and 600</span>";
}


//Doing the math. Unless the math involves potentially dividing by zero
if(($txtFeet * $txtWeight) != 0){
    //Initializing new variable for math result as well
    $txtBMI =  number_format(($txtWeight/(pow( ( ($txtFeet * 12) + $txtInches), 2))) * 703, 1);
}else {
    $txtBMI = "";
}

//Assign status based on BMI scale values
if($txtBMI < 18.5&&$txtBMI != ""){
    $txtStatus = $txtStatus."Underweight";
} elseif($txtBMI < 25){
    $txtStatus = $txtStatus."Normal";
} elseif($txtBMI < 30){
    $txtStatus = $txtStatus."Overweight";
} else {
    $txtStatus = $txtStatus."Obese";
}

//Checking for error before returning final result
if(isset($feetError)||isset($inchesError)||isset($weightError)){
    $txtResult=null;
}else {
    $txtResult = "<p>".$txtStatus."-".$txtBMI."</p>";
}

include 'index.php';
?>