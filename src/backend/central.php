<?php 
// This is a start
require_once "logger.php";
require_once "dbconnect.php";



function createCard(){
    $output = "";
    $db = new natureDB();
    foreach($db->displayMainPageNoFilter() as $row){

        $output .= "<div class='col-md-6'>
        <div class='card mb-4'>
            <img src='pics/{$row['description']}' class='card-img-top' alt='Picture of {$row["name"]}'>
            <div class='card-body'>
                <h5 class='card-title'>{$row["name"]}</h5>
                <p class='card-text'>{$row["description"]}</p>
            </div>
        </div>
    </div>";
        

        
    }
    echo strlen($output);
    return $output;



}


?>