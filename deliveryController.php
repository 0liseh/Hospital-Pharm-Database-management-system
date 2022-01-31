<?php
// Get the number of delivery using the given datetime. Returns null if no delivery with that date exists.
function getNumber($datetime) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "SELECT * FROM Delivery";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        if ($row["DateTime"] == $datetime) {
            RETURN $row["Number"];
        }
    }
    RETURN null;
}

// Get the DateTime of a delivery using the given delivery number. Returns null if no delivery with that date exists.
function getDateTime($number) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "SELECT * FROM Delivery";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        if ($row["Number"] == $number) {
            RETURN $row["DateTime"];
        }
    }
    RETURN null;
}

// adds a new row in the Delivery_Contains table with the given information.
function addDeliveryContains($delNum, $idPharm, $amountPharm) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "INSERT INTO Delivery_Contains (DelNumber, IdPharmaceutical, NumOfPharm) VALUES (".$delNum.",".$idPharm.",".$amountPharm.")";
    if (!mysqli_query($con, $sql)) {
        die("Error in addDeliveryContains() in deliveryController.php: ".mysqli_error($con));
    }
}

// Add a new row in the Carried_Out_By table with the given information.
function addCarriedOutBy($delNum, $pharmacistNumber) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "INSERT INTO Carried_Out_By (DelNumber,PharmacistEmployeeNumber) VALUES (".$delNum.",".$pharmacistNumber.")";
    if (!mysqli_query($con, $sql)) {
        die("Error in addCarriedOutBy in deliveryController.php: ".mysqli_error($con));
    }
}

// Returns the pharmaceuticalId of the row in Delivery_Contains using the given $delNum.
function getDeliveryPharmId($delNum) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "SELECT * FROM Delivery_Contains";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        if ($row["DelNumber"] == $delNum) {
            RETURN $row["IdPharmaceutical"];
        }
    }
    RETURN null;
}

// Returns the NumOfPharm of the row in Delivery_Contains using the given $delNum.
function getDeliveryPharmNum($delNum) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "SELECT * FROM Delivery_Contains";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        if ($row["DelNumber"] == $delNum) {
            RETURN $row["NumOfPharm"];
        }
    }
    RETURN null;
}

// Adds a new row in the Delivery table. Returns the Number of that same row. $type = 0 for hospital, 1 for med case. If hospital delivery, $info is the supplier's name. If med case delivery, $info is patient's healthcare number.
function addDelivery($type, $info) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    date_default_timezone_set("America/Edmonton");
    $datetime = date("Y-m-d H:i:s");
    if ($type == 0) {
        $sql = "INSERT INTO Delivery (DateTime,Type,Supplier) VALUES ('".$datetime."',0,'".$info."')";
        if (!mysqli_query($con, $sql)) {
            die("Error: ".mysqli_error($con));
        }
    } else {
        $sql = "INSERT INTO Delivery (DateTime,Type,MedCase) VALUES ('".$datetime."',1,".$info.")";
        if (!mysqli_query($con, $sql)) {
            die("Error: ".mysqli_error($con));
        }
    }
    
    RETURN getNumber($datetime);
}

?>