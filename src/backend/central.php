<?php 
// This is a start
require_once "logger.php";
require_once "dbconnect.php";



function createCard(){
    $db = new natureDB();
    foreach($db->displayMainPageNoFilter() as $row){
        // echo `<div class="col-md-6">
        //         <div class="card mb-4">
        //             <img src="https://upload.wikimedia.org/wikipedia/commons/4/49/A_black_image.jpg" class="card-img-top" alt="Event">
        //             <div class="card-body">
        //                 <h5 class="card-title">Event 2 Title</h5>
        //                 <p class="card-text">Event 2 Description</p>
        //             </div>
        //         </div>
        //     </div>
        //     `;
        echo $row;
    }



}


?>