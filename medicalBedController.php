<?php
// Get the medical unit of the patient in the medical bed table.
function getMedUnit($hcNum) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "SELECT * FROM Bed";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        if ($row["OccupyingPatientId"] == $hcNum) {
            RETURN $row["MedUnitNumber"];
        }
    }
    RETURN null;
}

// Get the bed number of the patient in the medical bed table.
function getBedNumber($hcNum) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "SELECT * FROM Bed";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        if ($row["OccupyingPatientId"] == $hcNum) {
            RETURN $row["Number"];
        }
    }
    RETURN null;
}

?>