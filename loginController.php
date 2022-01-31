<?php
// Checks the database if the given employee number is in the staff table. Returns 1 if it does, 0 if it doesn't
function checkID($id) {
    if (empty($id)) {
        RETURN 0;
    }
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $return = 0;
    $result = mysqli_query($con, "SELECT EmployeeNumber FROM Staff WHERE EmployeeNumber=".$id);
    while ($row = mysqli_fetch_array($result)) {
        if ($row["EmployeeNumber"] == $id) {
            $return = 1;
        }
    }
    RETURN $return;
}

// Returns the first name (FName) in the staff table using the given employee number
function getFName($id) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $result = mysqli_query($con, "SELECT FName FROM Staff WHERE EmployeeNumber=".$id);
    $row = mysqli_fetch_array($result);
    RETURN $row["FName"];
}

// Returns the last name (LName) in the staff table using the given employee number
function getLName($id) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $result = mysqli_query($con, "SELECT LName FROM Staff WHERE EmployeeNumber=".$id);
    $row = mysqli_fetch_array($result);
    RETURN $row["LName"];
}

// Returns the staff type in the staff table for a row using the given employee number
function getEmployeeType ($id) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    $result = mysqli_query($con, "SELECT Type FROM Staff WHERE EmployeeNumber=".$id);
    $row = mysqli_fetch_array($result);
    RETURN $row["Type"];
}

// Creates cookies for the employee number, first name, last name, and employee type using the given employee number as a parameter
function createEmployeeCookie($id) {
    $con = mysqli_connect("localhost", "id18047674_group41", "CPSC471@Group41", "id18047674_hospitalpharmacydatabase");
    if (mysqli_connect_errno($con)) {
       echo "Failed to connect";
    }
    setcookie("employeeID", $id, time()+3600, "/", "hospitaldbw.000webhostapp.com");
    $result = mysqli_query($con, "SELECT * FROM Staff");
    while ($row = mysqli_fetch_assoc($result)){
        if ($row["EmployeeNumber"] == $id) {
            setcookie("employeeFName", $row["FName"], time()+3600, "/", "hospitaldbw.000webhostapp.com");
            setcookie("employeeLName", $row["LName"], time()+3600, "/", "hospitaldbw.000webhostapp.com");
            setcookie("employeeType", $row["Type"], time()+3600, "/", "hospitaldbw.000webhostapp.com");
        }
    }
}

// Destroys the cookies related to the employee
function destroyEmployeeCookie() {
    setcookie("employeeID", "", time()-3600, "/", "hospitaldbw.000webhostapp.com");
    setcookie("employeeFName", "", time()-3600, "/", "hospitaldbw.000webhostapp.com");
    setcookie("employeeLName", "", time()-3600, "/", "hospitaldbw.000webhostapp.com");
    setcookie("employeeType", "", time()-3600, "/", "hospitaldbw.000webhostapp.com");
}
?>