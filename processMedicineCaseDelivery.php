<?php
require "stockController.php";
require "deliveryController.php";
if (empty($_POST["patientNumber"]) || empty($_POST["pharmaceuticalName"]) || empty($_POST["pharmaceuticalAmount"])) {
    header("Location: recordMedicineCaseDelivery.php");
} else {
    updatePharmaceutical($_POST["pharmaceuticalName"], -$_POST["pharmaceuticalAmount"]);
    $pharmId = getId($_POST["pharmaceuticalName"]);
    updateMedicineCaseContains($_POST["patientNumber"], $pharmId, $_POST["pharmaceuticalAmount"]);
    $delNum = addDelivery(1, $_POST["patientNumber"]);
    addCarriedOutBy($delNum, $_COOKIE["employeeID"]);
    addDeliveryContains($delNum, getID($_POST["pharmaceuticalName"]), $_POST["pharmaceuticalAmount"]);
    header("Location: delivery.php");
}
?>