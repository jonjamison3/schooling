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
                echo "<span style='color:red'>$feetError</span>";
            }?>
            
            <label>Inches:&nbsp;<input type="text" name="txtInches"></label>
            <?php
            if (isset($inchesError)) {
                echo "<span style='color:red'>$inchesError</span>";
            }
            ?>
            
            <h3>Weight</h3>
            <input type="text" name="txtWeight">
            
            <br>
            <br>
            <input type="submit" name="btnCalculate" value="Calculate BMI">&nbsp;
            <input type="submit" name="btnClear" value="Clear">
       
        </form>
    </body>
</html>
