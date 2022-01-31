<?php
require "stockController.php";
if (empty($_POST["pharmaceuticalName"]) || empty($_POST["pharmaceuticalAmount"]) || empty($_POST["pharmaceuticalType"]) || empty($_POST["pharmaceuticalIdentification"])) {
    header("Location: editStock.php");
} else {
    updatePharmaceutical($_POST["pharmaceuticalName"], $_POST["pharmaceuticalAmount"]);
    if ($_POST["pharmaceuticalType"] == 'Drug') {
        updateDrug(getId($_POST["pharmaceuticalName"]), $_POST["pharmaceuticalIdentification"]);
    } else if ($_POST["pharmaceuticalType"] == 'Vitamin/Herb') {
        updateVitaminHerb(getId($_POST["pharmaceuticalName"]), $_POST["pharmaceuticalIdentification"]);
    }
    header("Location: editStock.php");
}
?>