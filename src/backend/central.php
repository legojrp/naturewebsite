<?php 
// This is a start
require_once "logger.php";
require_once "dbconnect.php";



function createCard(){
    $db = new natureDB();
    foreach($db->displayMainPageNoFilter() as $row){
        echo `<div class="col-md-6">
                <div class="card mb-4">
                    <img src="pics/{$row['description']}" class="card-img-top" alt="Picture of {$row["name"]}">
                    <div class="card-body">
                        <h5 class="card-title">{$row["name"]}</h5>
                        <p class="card-text">{$row["description"]}</p>
                    </div>
                </div>
            </div>
            `;
        
    }



}


?>