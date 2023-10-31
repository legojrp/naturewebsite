<!DOCTYPE html>
<html lang="en">
    <?php 
        require_once "../backend/central.php";
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bloominary</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/src/app/styles/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/src/">
            <img src="/src/logo.png" width="30" height="30" class="d-inline-block align-top" alt="icon">
            Bloominary
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <button class="btn btn-secondary" onclick="createCard()">Create Card</button>
                </li>
                <li class="nav-item">
                    
                    <a class="nav-link" href="/src/admin/">Admin</a>

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
                  <label class="custom-file-label" for="customFile">Choose file (Unfunctional due to server permission issue)</label>
                </div>
                
                <h4 class="mb-3">Title</h4>
                <input type="text" id= "title" class="form-control mb-4" placeholder="Enter Title">
                
                <h4 class="mb-3">Description</h4>
                <textarea id="desc" class="form-control mb-4" rows="5" placeholder="Enter Description"></textarea>
                
                <div class="d-flex justify-content-center">
                    <button class="btn btn-primary" onclick="saveCard()">Save</button>
                    <button class="btn btn-danger ml-2" onclick="deleteCard()">Delete</button>
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
        var name = document.querySelector(".left-column #title");
        var desc = document.querySelector(".left-column #desc");
        var file = fileInput.files[0];

        if (file || name.value || desc.value){
            var formData = new FormData();
            formData.append("imageUpload", file);
            formData.append("desc", desc.value);
            formData.append("name", name.value);
            
            console.log(formData);


            var idP = document.querySelector(".left-column #id");
            formData.append("id", idP.textContent); 
            var xhttp = new XMLHttpRequest();
            xhttp.open("POST", "../backend/saveCard.php");
            xhttp.onload = function() {
                console.log(xhttp.responseText);
                location.reload(); 
            }
            //xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send(formData);
        }
    }

    function createCard(){
        var fileInput = document.querySelector("#imageupload");
        var name = document.querySelector(".left-column #title");
        var desc = document.querySelector(".left-column #desc");
        var leftColumn = document.querySelector('.left-column');
        var rightColumn = document.querySelector('.right-column');
        name.value = "";
        desc.value = "";
        fileInput.value = "";
        leftColumn.style.display = "block";
        rightColumn.style.width ="74.5999%";
    }

    function deleteCard(){
        var idP = document.querySelector(".left-column #id");
        var formData = new FormData();
        formData.append("id", idP.textContent);
        xhttp.open("POST", "../backend/deleteCard.php");
            xhttp.onload = function() {
                console.log(xhttp.responseText);
                location.reload(); 
            }
        xhttp.send(formData);
    }


      
  </script>




  
</body>
</html>