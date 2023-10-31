<?php 
    require_once "central.php";

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 

    $id = $_POST["id"];
    $db = new natureDB();
    if ($id) {
        if ($db->delete($id)){
            echo json_encode(array("status"=> "success"));
        };
    }
    else {
        echo json_encode(array("status"=> "false"));
    }
?>