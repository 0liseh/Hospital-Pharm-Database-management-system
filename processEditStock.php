<?php
require "stockController.php";
if (empty($_POST["pharmaceuticalId"]) || empty($_POST["pharmaceuticalAmount"])) {
    header("Location: editStock.php");
} else {
    setPharmNum($_POST["pharmaceuticalId"], $_POST["pharmaceuticalAmount"]);
    header("Location: editStock.php");
}
?>