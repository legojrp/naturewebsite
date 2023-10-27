<?php
    require_once "central.php";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    $Cid = $_POST["id"]; // Card id
    $sql = new natureDB();
    $row = $sql->getInfoFromId($Cid);
    if ($row) {
        echo $row;
        echo json_encode(array("status"=> false,"msg"=> "Card Id: $Cid doesn't exist, if the problem persists, email legojrp@gmail.com for assistance"));
    }
    else {
        echo json_encode(array("status"=> true, "desc"=> $row["description"], "name"=> $row["name"], "imagepath" => $row["imagename"]));
    }
?>