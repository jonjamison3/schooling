<?php

//If resetting, do so early
if(isset($_POST['btnClear'])){
    include 'index.php';
    return;
}

//Initialize Variables
$feetError = "";
$inchesError = "";
$weightError = "";
$txtStatus= "";

//Grab input
$txtFeet = $_POST['txtFeet'];
$txtInches = $_POST['txtInches'];
$txtWeight = $_POST['txtWeight'];


//Validate input as calculator-worthy

//Ensure input values are numeric 
if (!is_numeric($txtFeet)) {
    $feetError = $feetError . "Please enter a numeric value";  
} 
//As well as logically in range of assigned limits
else if ($txtFeet < 2||$txtFeet > 8) {
    $feetError = $feetError . "Feet must be between 2 and 8";
} 


//Repeat for all other input 
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


//Doing the math. Unless the math involves potentially dividing by zero
if(($txtFeet * $txtInches * $txtWeight) != 0){
$txtBMI =  number_format(($txtWeight/(pow( ( ($txtFeet * 12) + $txtInches), 2))) * 703, 1);
} else {
    $txtBMI = null;
}

//Pass down the verdict
if ($txtBMI==null){
    $txtStatus = null;
} else{
    if($txtBMI<18.5&&$txtBMI!=""){
    $txtStatus = $txtStatus."Underweight";
    } else if($txtBMI<25){
        $txtStatus = $txtStatus."Normal";
    } else if($txtBMI<30){
        $txtStatus = $txtStatus."Overweight";
    } else {
        $txtStatus = $txtStatus."Obese";
    }
}

include 'index.php';
?>