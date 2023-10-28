<?php 
// This is a start
require_once "logger.php";
require_once "dbconnect.php";

$PTS = "/src/";
$URL = "192.268.0.221";

function createCard(){
    $output = "";
    $db = new natureDB();
    foreach($db->displayMainPageNoFilter() as $row){

        $output .= "<div class='col-md-6'>
        <div class='card mb-4'>
            <div class='card custom-card' onclick='toggleCardSelection(this)'>
                <p style='display:none;'>{$row['id']}</p>
                <img src='{$GLOBALS['PTS']}/pics/{$row['imagename']}' class='card-img-top' alt='Picture of {$row["name"]}'>
                <div class='card-body'>
                    <h5 class='card-title'>{$row["name"]}</h5>
                    <p class='card-text'>{$row["description"]}</p>
            
                </div>
            </div>
        </div>
    </div>";
        

        
    }
    return $output;



}

function navbar() {
    
}


?>