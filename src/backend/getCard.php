<?php
    require_once "central.php";
    
    $Cid = $_POST["id"]; // Cardid
    $sql = new natureDB();
    $row = $sql->getInfoFromId($Cid);
    if ($row === false) {
        echo json_encode(array("status"=> false,"msg"=> "Card Id doesn't exist, if the problem persists, email legojrp@gmail.com for assistance"));
    }
    else {
        echo json_encode(array("status"=> true, "desc"=> $row["description"], "name"=> $row["name"], "imagepath" => row["imagename"]));
    }
?>