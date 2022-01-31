<?php    
        date_default_timezone_set("America/Edmonton");
        $datetime = date("Y-m-d H:i:s");
        $empID = $_COOKIE["employeeID"];
        $pharmId = $_POST["pharmId"];
        $quantity = $_POST["quantity"];
        $pHCN = $_COOKIE["pHCN"];
        
        $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
        if (mysqli_connect_errno($con)) {
           echo "Failed to connect";
        }
        
        $sql = "INSERT INTO Nurse_Order (NurseEmployeeNumber, PatientHealthcareNumber, IdPharmaceutical, NumOfPharm, DateTime) VALUES ('".$empID."', ' ".$pHCN." ', '".$pharmId."', '".$quantity."', '".$datetime."')";
        
        if(mysqli_query($con, $sql)){
            echo "<h3>Your Input:</h3><br>";
            echo "This is your employee ID: $empID";
            echo "<br>";
            echo "This is the pharmaceutical ID inputted: $pharmId";
            echo "<br>";
            echo "This is the qunatity of $pharmId inputted $quantity";
            echo "<br>";
            
            ob_start();
            header("Location:nursePatients.php");
        }else{
            echo "<h2>Sorry no submissions were made!<h2>";
            echo "<h2>Please go back and type in the proper submissions into the approprate textboxes<h2>";
            echo "<form action='nursePatients.php'> <input type='submit' value='Go back to your Assigned Patients page'/> </form>";
            
            
            
        }
        
        
        
        
        
?>