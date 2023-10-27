<!DOCTYPE html>
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
    require_once "../backend/central.php";
    logInfo("This is a test!");
    ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
          <!-- Right Column (Full screen) -->
          <div class="bg-dark text-white p-4 left-column">
              <h4 class="mb-3">Image</h4>
              <div id="imageselect" class="custom-file mb-4">
                  <input type="file" class="custom-file-input" id="customFile" accept="image/*">
                  <label class="custom-file-label" for="customFile">Choose file</label>
              </div>

              <h4 class="mb-3">Title</h4>
              <input type="text" id= "title" class="form-control mb-4" placeholder="Enter Title">

              <h4 class="mb-3">Description</h4>
              <textarea id="desc" class="form-control mb-4" rows="5" placeholder="Enter Description"></textarea>

              <div class="d-flex justify-content-center">
                  <button class="btn btn-primary">Save</button>
                  <button class="btn btn-danger ml-2">Delete</button>
              </div>
          </div>

          <!-- Left Column (One third of the screen) -->
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
        rightColumn.style.width = "74.59999%";




        // Get the data from the card and output it into the form to edit if available
        if (leftColumn.style.display == "block"){
            const xhttp = new XMLHttpRequest();
            var id = document.querySelector(".selected-card p");
            xhttp.onload = function() { //calls onload
                console.log(xhttp.responseText);
                var result =  JSON.parse(xhttp.responseText);
                if (result.status == true){
                    Desc = document.querySelector(".left-column #desc")
                    Name = document.querySelector(".left-column #title")
                    Name.value = result.name;
                    Desc.value = result.desc;
                }
                
            }
            xhttp.open("POST", "../backend/getCard.php");
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send("id=" + id.textContent);

            
        }
    }


      
  </script>




  
</body>
</html>