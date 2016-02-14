<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <form method="post" action="process.php">
            <h3>Height</h3>
            Feet:&nbsp;<input type="text" name="txtFeet"><?php 
            if (isset($feetError)) {
                echo "<span style='color:red;font-size:.75em;'>$feetError</span>";
            }?>
            
            Inches:&nbsp;<input type="text" name="txtInches">
            <?php
            if (isset($inchesError)) {
                echo "<span style='color:red;font-size:.75em;'>$inchesError</span>";
            }
            ?>
            
            <h3>Weight</h3>
            <input type="text" name="txtWeight">
            <?php
            if (isset($weightError)) {
                echo "<span style='color:red;font-size:.75em;'>$weightError</span>";
            }
            ?>
            <br>
            <br>
            <input type="submit" name="btnCalculate" value="Calculate BMI">&nbsp;
            <input type="submit" name="btnClear" value="Clear">
       
        </form>
    </body>
</html>
