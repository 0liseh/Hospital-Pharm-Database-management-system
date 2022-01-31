<?php
if (isset($_COOKIE["employeeType"])) {
    if ($_COOKIE["employeeType"] == 0) {
        header("Location: nurse.php");
    } else if ($_COOKIE["employeeType"] == 1) {
        header("Location: doctor.php");
    } else if ($_COOKIE["employeeType"] == 2) {
        header("Location: pharmacist.php");
    } else if ($_COOKIE["employeeType"] == 3) {
        header("Location: admin.php");
    }
}
?>

<html>
<head>
<style>
h1 {text-align: center}
h2 {text-align: center}
p {text-align: center}
</style>
</head>
<body>

<h1>Login</h1>

<div align = "center">

<?php if (!isset($_POST["loginAttempt"])) : ?>
    <h2>Please enter your employee number to use the system.</h2>
    <div class="login-container">
        <form method="post" action="https://hospitaldbw.000webhostapp.com/checkLogin.php">
          <input type="varchar(255)" placeholder="employee ID" name="loginAttempt">
          <input type="submit" value="Login">
        </form>
    </div>
<?php endif; ?>
    
</div>
</body>
</html>