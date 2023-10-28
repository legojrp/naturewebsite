<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="app/styles/styles.css">
</head>
<body>
    <?php
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL); 
        require_once "./backend/central.php";
    ?>





    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
            <img src="https://openclipart.org/image/2400px/svg_to_png/274087/1488160614.png" width="30" height="30" class="d-inline-block align-top" alt="icon">
            Bloominary
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="admin/">Admin</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- <div class="container text-center mt-4">
        <h2>Title/im going mentally insane</h2>
        <p>Description/im not copying the turtle description but you understand</p>
    </div> -->
  
    <div class="container mt-4">
        <div class="row">
            <?php 
            // This will dynamically output every card! **DO NOT EDIT THIS CODE** - unless needed of course
            echo createCard();
            ?>



        </div>
    </div>

    <script>
        function toggleCardSelection(){}
    </script>
</body>
</html>


<?php 
// Tell me when you want server - client access, and I (John) can insert the php to transfer that info
?> 