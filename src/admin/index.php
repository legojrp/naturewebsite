<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Project</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="app/styles/styles.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
            <img src="https://openclipart.org/image/2400px/svg_to_png/274087/1488160614.png" width="30" height="30" class="d-inline-block align-top" alt="icon">
            Bloominary
        </a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">Admin</a>
                </li>
            </ul>
        </div>
    </nav>

  
  <div class="container-fluid">
      <div class="row flex-grow-1">
          <!-- Right Column (Full screen) -->
          <div class="bg-dark text-white p-4 left-column">
              <h4 class="mb-3">Image</h4>
              <div class="custom-file mb-4">
                  <input type="file" class="custom-file-input" id="customFile" accept="image/*">
                  <label class="custom-file-label" for="customFile">Choose file</label>
              </div>

              <h4 class="mb-3">Title</h4>
              <input type="text" class="form-control mb-4" placeholder="Enter Title">

              <h4 class="mb-3">Description</h4>
              <textarea class="form-control mb-4" rows="5" placeholder="Enter Description"></textarea>

              <div class="d-flex justify-content-center">
                  <button class="btn btn-primary">Save</button>
                  <button class="btn btn-danger ml-2">Delete</button>
              </div>
          </div>

          <!-- Left Column (One third of the screen) -->
          <div class="right-column">
              <!-- Event Cards (Row) -->
              <div class="row">
                  <div class="col-md-6 mb-3">
                      <div class="card custom-card" onclick="toggleCardSelection(this)">
                          <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                          <div class="card-body">
                              <h5 class="card-title">Event Title</h5>
                              <p class="card-text">Event Description</p>
                          </div>
                      </div>
                  </div>

                  <div class="col-md-6 mb-3">
                      <div class="card custom-card" onclick="toggleCardSelection(this)">
                          <img src="https://via.placeholder.com/150" class="card-img-top" alt="...">
                          <div class="card-body">
                              <h5 class="card-title">Event Title</h5>
                              <p class="card-text">Event Description</p>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>


  <script>
      var isDisplayed = false;
      function toggleCardSelection(card) {
        if (!isDisplayed) {
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
        }
      }
  </script>


  
</body>
</html>