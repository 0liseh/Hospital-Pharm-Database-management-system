<?php
require "loginController.php";
ob_start();
if (checkID($_POST["loginAttempt"])) {
    createEmployeeCookie($_POST["loginAttempt"]);
    if (getEmployeeType($_POST["loginAttempt"]) == 0) {
        header("Location: nurse.php");
    } else if (getEmployeeType($_POST["loginAttempt"]) == 1) {
        header("Location: doctor.php");
    } else if (getEmployeeType($_POST["loginAttempt"]) == 2) {
        header("Location: pharmacist.php");
    } else if (getEmployeeType($_POST["loginAttempt"]) == 3) {
        header("Location: admin.php");
    }
} else {
    unset($_POST["loginAttempt"]);
    header("Location: login.php");
}
?>