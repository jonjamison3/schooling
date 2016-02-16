<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            span{
                color:red;
                font-size: .75em;
                font-weight:bold;
            }
        </style>
    </head>
    <body>
        <form method="post" action="process.php">
            <h3>Height</h3>
            Feet:&nbsp;<input type="text" name="txtFeet" 
            <?php
                if (isset($txtFeet)) {
                    echo "value='" . $txtFeet . "'";
                }
            ?>/>
                <?php
                    if (isset($feetError)) {
                        echo $feetError;
                    }
                ?>

            Inches:&nbsp;<input type="text" name="txtInches" 
            <?php
                if (isset($txtInches)) {
                    echo "value='" . $txtInches . "'";
                }
            ?>/>
                <?php
                    if (isset($inchesError)) {
                        echo $inchesError;
                    }
                ?>

            <h3>Weight</h3>
            Pounds:&nbsp;<input type="text" name="txtWeight" 
            <?php
                if (isset($txtWeight)) {
                    echo "value='" . $txtWeight . "'";
                }
            ?>/>
                <?php
                    if (isset($weightError)) {
                        echo $weightError;
                    }
                ?>

            <br>
            <br>
            <input type="submit" name="btnCalculate" value="Calculate BMI">&nbsp;
            <input type="submit" name="btnClear" value="Clear">
            
            <?php 
                if (isset($txtBMI)&&isset($txtStatus)){
                    echo $txtResult;
                } else{
                    return;
                }
            ?>
            
        </form>
    </body>
</html>
