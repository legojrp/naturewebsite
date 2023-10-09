<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    require_once "./backend/central.php";
    logInfo("This is a test!");
    ?>





    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="https://upload.wikimedia.org/wikipedia/en/0/03/Walter_White_S5B.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Walter White
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Yes/extra for you <3</a>
                </li>
            </ul>
        </div>
    </nav>

    <img src="https://upload.wikimedia.org/wikipedia/commons/4/49/A_black_image.jpg" alt="Image Description" class="custom-image">

    <div class="container text-center mt-4">
        <h2>Title/im going mentally insane</h2>
        <p>Description/im not copying the turtle description but you understand</p>
    </div>
  
    <div class="container mt-4">
        <div class="row">
            <?php 
            // This will dynamically output every card! **DO NOT EDIT THIS CODE** - unless needed of course
            createCard();
            ?>



        </div>
    </div>
</body>
</html>


<?php 
// Tell me when you want server - client access, and I (John) can insert the php to transfer that info
echo "hey"
?> 