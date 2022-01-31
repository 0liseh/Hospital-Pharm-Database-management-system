<?php
require "stockController.php";
require "supplierController.php";
require "deliveryController.php";
if (empty($_POST["supplierName"]) || empty($_POST["supplierLocation"]) || empty($_POST["pharmaceuticalName"]) || empty($_POST["pharmaceuticalAmount"]) || empty($_POST["pharmaceuticalType"]) || empty($_POST["pharmaceuticalIdentification"])) {
    header("Location: recordHospitalDelivery.php");
} else {
    updatePharmaceutical($_POST["pharmaceuticalName"], $_POST["pharmaceuticalAmount"]);
    updateSupplier($_POST["supplierName"]);
    updateSupplierLocation($_POST["supplierName"], $_POST["supplierLocation"]);
    $delNum = addDelivery(0, $_POST["supplierName"]);
    updateSupplies($_POST["supplierName"], $delNum);
    addDeliveryContains($delNum, getID($_POST["pharmaceuticalName"]), $_POST["pharmaceuticalAmount"]);
    if ($_POST["pharmaceuticalType"] == 'Drug') {
        updateDrug(getId($_POST["pharmaceuticalName"]), $_POST["pharmaceuticalIdentification"]);
    } else if ($_POST["pharmaceuticalType"] == 'Vitamin/Herb') {
        updateVitaminHerb(getId($_POST["pharmaceuticalName"]), $_POST["pharmaceuticalIdentification"]);
    }
    header("Location: delivery.php");
}
?>