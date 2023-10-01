<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 

    require "./backend/dbconnect.php";
    $conn = new Dbconnect();
    echo $conn->status;
    echo "hey";
    echo `whoami`;
    phpinfo();
    ?>
    <!-- hey-->
</body>
</html>

<?php 
// Tell me when you want server - client access, and I (John) can insert the php to transfer that info
?> 