<?php
require "supplierController.php";
if (empty($_POST["supplierName"])) {
    header("Location: removeSupplier.php");
} else {
    removeSupplier($_POST["supplierName"]);
    header("Location: supplier.php");
}
?>