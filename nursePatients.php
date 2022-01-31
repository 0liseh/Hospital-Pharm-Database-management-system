<?php
    $message = "<h1>These are your assigned patients</h1>";
    echo $message;
    
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    
    if( isset($_COOKIE["employeeID"])){
        $result = mysqli_query($con, "SELECT * FROM Patient");
        
        echo "<table border='1'> 
        <tr> 
        <th>Healthcare Number</th> 
        <th>First Name</th> 
        <th>Last Name</th> 
        <th>Primary Nurse ID</th> 
        <th>Secondary Nurse ID</th> 
        </tr>"; 
        
        while($row = mysqli_fetch_assoc($result)) {
            
            if($row["PrimaryNurseId"]==$_COOKIE["employeeID"] || $row["SecondaryNurseId"]==$_COOKIE["employeeID"]){
                $hcn = $row['HealthcareNumber'];
                
                echo "<tr>"; 
                echo "<td><a href='nursePharmaceuticalOrder.php?hcNumber=$hcn' >" . $row['HealthcareNumber'] . "</a></td>"; 
                echo "<td>" . $row['FName'] . "</td>";
                echo "<td>" . $row['LName'] . "</td>";
                echo "<td>" . $row['PrimaryNurseId'] . "</td>";
                echo "<td>" . $row['SecondaryNurseId'] . "</td>";
                echo "</tr>";
            }
           
        }    
        echo "</table>"; 
        $message = "<h2>Please click on the Patient's healthcare number to order pharmaceuticals</h2>";
        echo $message;
    }else
        echo "Sorry... Employee Nurse ID is not recodnized" . "<br />";
?>

<html>
    <body>
    <form action="nurse.php">
        <input type="submit" value="Go back to Nurse Home page" />
    </form>
    </body>
</html>