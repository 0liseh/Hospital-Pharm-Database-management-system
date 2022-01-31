<?php
// Checks if the given $name exists in the system. If it does, it returns the rows IdPharmaceutical. Otherwise, it returns null
function getId($name) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "SELECT * FROM Pharmaceutical";
    $results = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($results)) {
        if ($row["Name"] == $name) {
            RETURN $row["IdPharmaceutical"];
        }
    }
    RETURN null;
}

// Get the name of a pharmaceutical using the given $id. Returns null if it doesn't exist.
function getName($id) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "SELECT * FROM Pharmaceutical";
    $results = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($results)) {
        if ($row["IdPharmaceutical"] == $id) {
            RETURN $row["Name"];
        }
    }
    RETURN null;
}

// Get the number of pharmaceuticals in the a row using the given $id. Returns null if it doesn't exist.
function getPharmNum($id) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "SELECT * FROM Pharmaceutical";
    $results = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($results)) {
        if ($row["IdPharmaceutical"] == $id) {
            RETURN $row["NumberInStock"];
        }
    }
    RETURN null;
}

// Sets the Number in Stock of a pharmaceutical to a $newAmount using $id. Does nothing if it doesn't exist.
function setPharmNum($id, $amount) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    if ($id != null) {
        $sql = "UPDATE Pharmaceutical SET NumberInStock=".$amount." WHERE IdPharmaceutical=".$id;
        mysqli_query($con, $sql);
    }
}

// Update the pharmaceutical table using the given $name and $amount. If it already exists, it adds $amount to the row. If it doesn't, it creates a new row.
function updatePharmaceutical($name, $amount=0) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $id = getId($name);
    if ($id == null) { // Doesn't exists
        $sql = "INSERT INTO Pharmaceutical (Name,NumberInStock) VALUES ('".$name."',".$amount.")";
        if (!mysqli_query($con, $sql)) {
            die("Error #1 in updatePharmaceutical() in stockController.php: ".mysqli_error($con));
        }
    } else { // It does exists
        $newAmount = getPharmNum($id) + $amount;
        $sql = "UPDATE Pharmaceutical SET NumberInStock=".$newAmount." WHERE IdPharmaceutical=".$id;
        if (!mysqli_query($con, $sql)) {
            die("Error #2 in updatePharmaceutical() in stockController.php: ".mysqli_error($con));
        }
    }
}

// Get the number of pharmaceutical in the Medicine_Case_Contains table. If it doesn't exist, returns null instead.
function getMedCaseNum($patientNum, $pharmId) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "SELECT * FROM Medicine_Case_Contains";
    $results = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($results)) {
        if ($row["PatientHealthcareNumber"] == $patientNum && $row["IdPharmaceutical"] == $pharmId) {
            RETURN $row["NumOfPharm"];
        }
    }
    RETURN null;
}

// Checks the Medicine_Case_Contains table to see if the given patient healthcare number and pharmaceutical already exists. Returns true if it does, false if it doesn't.
function checkMedicineCaseContains($patientNum, $pharmId) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "SELECT * FROM Medicine_Case_Contains";
    $results = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($results)) {
        if ($row["PatientHealthcareNumber"] == $patientNum && $row["IdPharmaceutical"] == $pharmId) {
            RETURN true;
        }
    }
    RETURN false;
}

// Updates the Medicine_Case_Contains table with the given information. If the patient number and pharmaceutical already exists, it updates it with the pharmaceutical amount. If not, it creates a new row with the information.
function updateMedicineCaseContains($patientNum, $pharmId, $amount) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    if (!checkMedicineCaseContains($patientNum, $pharmId)) { // Doesn't exists
        $sql = "INSERT INTO Medicine_Case_Contains (PatientHealthcareNumber,IdPharmaceutical,NumOfPharm) VALUES (".$patientNum.",".$pharmId.",".$amount.")";
        if (!mysqli_query($con, $sql)) {
            die("Error #1 in updateMedicineCaseContains() in stockController.php: ".mysqli_error($con));
        }
    } else { // It does exists
        $newAmount = getMedCaseNum($patientNum, $pharmId) + $amount;
        $sql = "UPDATE Medicine_Case_Contains SET NumOfPharm=".$newAmount." WHERE PatientHealthcareNumber=".$patientNum." AND IdPharmaceutical=".$pharmId;
        if (!mysqli_query($con, $sql)) {
            die("Error #2 in updateMedicineCaseContains() in stockController.php: ".mysqli_error($con)."<br>".$sql);
        }
    }
}

// Checks to see if the following $pharmId and $vin already exists in the table. If it does, return true. Otherwise, return false;
function checkVitaminHerb($pharmId, $vin) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
        echo "Failed to connect";
    }
    $sql = "SELECT * from Vitamin_Herb";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        if ($row["IdPharmaceutical"] == $pharmId && $row["VIN"] == $vin) {
            RETURN true;
        }
    }
    RETURN false;
}

// Updates the Vitamin/Herb table using the given $pharmId and $vin. If it already exists, nothing happens.
function updateVitaminHerb($pharmId, $vin) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
        echo "Failed to connect";
    }
    if (!checkVitaminHerb($pharmId, $vin)){
        $sql = "INSERT INTO Vitamin_Herb (VIN, IdPharmaceutical) VALUES (".$vin.",".$pharmId.")";
        if (!mysqli_query($con, $sql)) {
            die("Error in updateVitaminHerb() in stockController.php: ".mysqli_error($con));
        }
    }
}

// Checks to see if the following $pharmId and $din already exists in the table. If it does, return true. Otherwise, return false;
function checkDrug($pharmId, $din) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
        echo "Failed to connect";
    }
    $sql = "SELECT * from Drug";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        if ($row["IdPharmaceutical"] == $pharmId && $row["DIN"] == $din) {
            RETURN true;
        }
    }
    RETURN false;
}

// Updates the Drug table using the given $pharmId and $din. If it already exists, nothing happens.
function updateDrug($pharmId, $din) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
        echo "Failed to connect";
    }
    if (!checkDrug($pharmId, $din)){
        $sql = "INSERT INTO Drug (DIN, IdPharmaceutical) VALUES (".$din.",".$pharmId.")";
        if (!mysqli_query($con, $sql)) {
            die("Error in updateDrug() in stockController.php: ".mysqli_error($con));
        }
    }
}

// Prints the entire pharmaceutical stock for the nurses.
function printStockNurse() {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    echo "<table border = '1'>
    <tr>
    <th>Name</th>
    <th>Pharmaceutical ID</th>
    </tr>";
    $result = mysqli_query($con, "SELECT * FROM Pharmaceutical");
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$row["Name"]."</td>";
        echo "<td>".$row["IdPharmaceutical"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

// Print all the diagnosis for a patient in the Diagnosis table.
function printDiagnosis($id) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    echo "<table border = '1'>
    <tr>
    <th>Doctor Employee Number</th>
    <th>Pharmaceutical ID</th>
    <th>Number of Pharmaceutical Prescribed</th>
    </tr>";
    $result = mysqli_query($con, "SELECT * FROM Diagnosis");
    while ($row = mysqli_fetch_array($result)) {
        if ($row["PatientHealthcareNum"] == $id) {
            echo "<tr>";
            echo "<td>".$row["DoctorEmployeeNumber"]."</td>";
            echo "<td>".$row["IdPharmaceutical"]."</td>";
            echo "<td>".$row["NumOfPharm"]."</td>";
            echo "</tr>";
        }
    }
    echo "</table>";
}
?>