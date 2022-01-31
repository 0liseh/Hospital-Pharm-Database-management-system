<?php
// Check if a supplier exists with the name given. Returns true if it does, false if it doesn't.
function checkSupplier($name) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "SELECT * FROM Supplier";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        if ($row["Name"] == $name) {
            RETURN true;
        }
    }
    return false;
}

// Updates the supplier with the given name. If it already exists, nothing changes. If it doesn't, a new row with that name is added.
function updateSupplier($name) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    if(!checkSupplier($name)) {
        $sql = "INSERT INTO Supplier (Name) VALUES ('".$name."')";
        if (!mysqli_query($con, $sql)) {
            die("Error in updateSupplier() in supplierController.php: ".mysqli.error($son));
        }
    }
}

// Removes the given supplier name from the database. Does nothing it doesn't already exists.
function removeSupplier($name) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "DELETE FROM Supplier WHERE Name='".$name."'";
    if (!mysqli_query($con, $sql)) {
        die("Error in removeSupplier() in supplierController.php: ".mysqli_error($con));
    }
}

// Checks if the given supplier and location already exists in the system. If it does, returns true. If it doesn't, returns false.
function checkSupplierLocation($supplier, $location) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "SELECT * FROM Supplier_Location";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        if ($row["Name"] == $supplier && $row["Location"] == $location) {
            return true;
        }
    }
    return false;
}

// Updates the Supplier_Location table with the given suppllier name and location. If it already exists, does nothing. If it doesn't, adds it in.
function updateSupplierLocation($supplier, $location) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    if (!checkSupplierLocation($supplier, $location)) {
        $sql = "INSERT INTO Supplier_Location (Name,Location) VALUES ('".$supplier."','".$location."')";
        if (!mysqli_query($con, $sql)) {
            die("Error in updateSupplierLocation() in supplierController.php: ".mysqli_error($con));
        }
    }
}

// Check if the given supplier name and location are in the Supplies table. Returns true if it does, false if it doesn't.
function checkSupplies($supplier, $delNum) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $sql = "SELECT * FROM Supplies";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        if ($row["S_name"] == $supplier && $row["D_number"] == $delNum) {
            return true;
        }
    }
    return false;
} 

// Updates the Supplies table with the given supplier name and delivery number.
function updateSupplies($supplier, $delNum) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    if (!checkSupplies($supplier, $delNum)) {
        $sql = "INSERT INTO Supplies (S_name,D_number) VALUES ('".$supplier."',".$delNum.")";
        if (!mysqli_query($con, $sql)) {
            die("Error in updateSupplies() in supplierController.php: ".mysqli_error($con));
        }
    }
}

// Returns an array of locations based on the given supplier name. If they don't exist in the Supplier_Location table, returns null
function getLocations($supplier) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $return = array();
    $sql = "SELECT * FROM Supplier_Location WHERE Name='".$supplier."'";
    $result = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_array($result)) {
        array_push($return, $row["Location"]);
    }
    RETURN $return;
}
?>