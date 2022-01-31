<?php
require "loginController.php";
destroyEmployeeCookie();
header("Location: login.php");
?>