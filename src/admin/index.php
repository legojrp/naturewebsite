<!DOCTYPE html>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    require_once "../backend/central.php";
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo $GLOBALS["PTS"]?>app/styles/styles.css">
</head>
<body>
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

    
    <div class="container-fluid">
        <div class="row flex-grow-1">
          <!-- Left Column (One third of the screen) -->
          <div class="bg-dark text-white p-4 left-column">
              <h4 class="mb-3">Image</h4>
              <p style="display:none;" id="id"></p>
              <div id="imageselect" class="custom-file mb-4">
                  <input type="file" id="imageupload" class="custom-file-input" id="customFile" accept="image/*">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                </div>
                
                <h4 class="mb-3">Title</h4>
                <input type="text" id= "title" class="form-control mb-4" placeholder="Enter Title">
                
                <h4 class="mb-3">Description</h4>
                <textarea id="desc" class="form-control mb-4" rows="5" placeholder="Enter Description"></textarea>
                
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary" onclick="saveCard()">Save</button>
                    <button class="btn btn-danger ml-2">Delete</button>
                </div>
            </div>
            
            <!-- Right Column (Full screen or 2/3 screen) -->
          <div class="right-column">
              <!-- Event Cards (Row) -->
              <div class="row">
              <?php 
            // This will dynamically output every card! **DO NOT EDIT THIS CODE** - unless needed of course
                    echo createCard();
                ?>
                  </div>
              </div>
          </div>
      </div>
  </div>


  <script>
      function toggleCardSelection(card) {
        
        var cards = document.querySelectorAll('.custom-card');
        cards.forEach(function(item) {
            if (item !== card) {
                item.classList.remove('selected-card');
            }
        });
        card.classList.toggle('selected-card');
        var leftColumn = document.querySelector('.left-column');
        var rightColumn = document.querySelector('.right-column');
        leftColumn.style.display = document.querySelector('.selected-card') !== null ? 'block' : 'none';
        rightColumn.style.width = document.querySelector('.selected-card') !== null ? "74.5999%" : 'auto';




        // Get the data from the card and output it into the form to edit if available
        if (leftColumn.style.display == "block"){
            const xhttp = new XMLHttpRequest();
            var id = document.querySelector(".selected-card p");
            xhttp.onload = function() { //calls onload
                console.log(xhttp.responseText);
                var result =  JSON.parse(xhttp.responseText);
                if (result.status == true){
                    var desc = document.querySelector(".left-column #desc");
                    var name = document.querySelector(".left-column #title");
                    var idP =document.querySelector(".left-column #id");
                    idP.textContent = id.textContent;
                    name.value = result.name;
                    desc.value = result.desc;
                    
                }
                
            }
            xhttp.open("POST", "../backend/getCard.php");
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("id=" + id.textContent);

            
        }
    }
    function notify(){}

    function saveCard(){
        var fileInput = document.querySelector("#imageupload");
        var name = document.querySelector(".left-column #title")
        var desc = document.querySelector(".left-column #desc")
        
        var file = fileInput.files[0];

        if (file || name.value || desc.textContent){
            var formData = new FormData();
            file ? formData.append("imageUpload", file) : null;
            desc.textContent ? formData.append("desc", desc.textContent) : null;
            name.value ? formData.append("name", desc.value) : null;
            
            var idP = document.querySelector(".left-column #id");
            formData.append("id", idP.textContent); 
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "../backend/saveCard.php", true);
            xhttp.onload = function() {
                var result = JSON.parse(xhttp.responseText);
                console.log(result);
            }
        }
    }


      
  </script>




  
</body>
</html>