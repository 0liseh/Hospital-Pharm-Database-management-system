<html>
    <head>
        <style>
            h1 {text-align: center;}
            p {text-align: center;}
        </style>
    </head>
    
    <body>
        <h1>Nurse page</h1>
        <div align = 'center'>
        
        <?php
        if (isset($_COOKIE["employeeID"]))
            $message = "This is the nurse page. Employee ID is ".$_COOKIE["employeeID"];
            echo $message;
        ?>
        <br><br><br><br>
        <a href="nursePatients.php">
               <button>View Assigned Patients</button>
        </a>

        <br><br><br><br>
        <a href="https://hospitaldbw.000webhostapp.com/processLogout.php">
               <button>Back to login</button>
        </a>
        </div>
    </body>
</html>