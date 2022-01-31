<?php
    require "stockController.php";
    setcookie("pHCN", $_GET["hcNumber"] , time() + 3600, "/");
?>
<html>
    <head>
        <style>
            .error {color: #FF0000;}
        </style>
    </head>
    <body>
        <?php
            echo "<h2>Please order pharmaceutical for patient</h2>"; 
            
            // define variables and set to empty values
            $pharmIdErr = $quantityErr = "";
            $pharmId = $quantity = "";
            
            echo "<p>These are the Pharmaceuticals in stock: </p>";
            printStockNurse();
            echo "<br><br>";
            
            echo "<p>This is the diagnosis for this patient: </p>";
            printDiagnosis($_GET["hcNumber"]);
            
            echo "<p><span class='error'>* required field</span></p>";

            
        ?>    
            <form method="post" action="nurseController.php">
                Patient Healthcare Number: <input type="text" name="hcNumber" value=<?php echo $_GET["hcNumber"];?> readonly><br><br>
                Pharmaceutical ID: <input type="text" name="pharmId" value="<?php echo $pharmId;?>">
                <span class="error">* <?php echo $pharmIdErr;?></span>
                <br><br>
                Quantity of Pharmaceutical: <input type="text" name="quantity" value="<?php echo $quantity;?>">
                <span class="error">* <?php echo $quantityErr;?></span>
                <br><br>
                <input type="submit" name="submit" value="Submit Order">
                <br><br><br>
            </form>
            
            <form action="nursePatients.php">
                <input type="submit" value="Go back to your Assigned Patients page" />
            </form>
    </body>
</html>