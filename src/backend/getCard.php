<?php
    require_once "central.php";
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    $Cid = $_POST["id"]; // Cardid
    $sql = new natureDB();
    $row = $sql->getInfoFromId($Cid);
    if ($row === false) {
        echo json_encode(array("status"=> false,"msg"=> "Card Id doesn't exist, if the problem persists, email legojrp@gmail.com for assistance"));
    }
    else {
        echo $row;
        echo json_encode(array("status"=> true, "desc"=> $row["description"], "name"=> $row["name"], "imagepath" => row["imagename"]));
    }
?>