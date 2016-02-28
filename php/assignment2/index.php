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
            p{
                display: inline;
            }
            .label{
                padding-left:3.4em;
            }
        </style>
    </head>
    <body>
        <h1>BMI Calculator</h1>
        
        <form method="post" action="process.php">
            <table>

                <tr>
                    <td>
                        Height:    
                        <input type="text" name="txtFeet" 
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
                    </td>
                    <td>
                        <input type="text" name="txtInches" 
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
                    </td>
                </tr>
                <tr>
                    <td class="label">(Feet)</td>
                    <td>(Inches)</td>
                </tr>
                <tr>
                    <td>Weight:
                        <input type="text" name="txtWeight" 
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
                    </td>
                </tr>
                <tr>
                    <td class="label">(pounds)</td>
                </tr>
                <tr>
                    <td> <input type="submit" name="btnCalculate" value="Calculate BMI"></td>
                    <td> <input type="submit" name="btnClear" value="Clear"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><?php
                        if (isset($txtBMI) && isset($txtStatus)) {
                            echo $txtResult;
                        }
                        ?>
                    </td>
                </tr>

            </table>

        </form>
    </body>
</html>
