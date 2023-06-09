<!DOCTYPE html>
<html>

<?php
  include '../include/dashboard.inc.php';
?>

<head>
  <title>Tomodachi | Habit Tracker</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../assets/css/bootstrap-css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/sidebar.css">
  <link rel="stylesheet" href="../assets/css/pet_animation.css">
  <link rel="stylesheet" href="../assets/css/dashboard.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/0fa65bfd04.js" crossorigin="anonymous"></script>

  <link rel="shortcut icon" type="image/png" href="../assets/images/logo3.png">

</head>

<body style="background-image: url('../assets/images/bg3.png'); background-size: cover; background-repeat: repeat; background-position: center center; opacity: 92%;">

  <div class="sidebar">
    <div class="logo">
      <img src="../assets/images/logo2.png" alt="Tomodachi">
    </div>
    <a class="active" href="dashboard.front.php">Home</a>
    <a href="../front/shop.front.php">Shop</a>
    <a href="../front/study.front.php">Study</a>
    <div class="logout">
      <a href="#logout" data-bs-target="#logout" data-bs-toggle="modal">Logout</a>
    </div>
  </div>

  <div class="content">
    <div class="container" id="statsHeader">
      <!-- display stats header with AJAX -->
    </div>

    <div class="row px-4 py-2">
      <div class="col-md-4">
        <div id="wallpaper" class="pet-wallpaper">
          <div class="inventory dashboard-inventory">
            <a data-bs-target="#inventory" data-bs-toggle="modal" onclick="refreshInventory()">
              <img src="../assets/images/inventory.png" style="width: auto; height: 40px; margin-bottom: 5px;">
              <span style="margin-left: 10px; color: white; font-size: 24px;">Inventory</span>
            </a>
          </div>
          <div class="pet" id="petImg">
            <!-- display petImage with AJAX -->
          </div>
        </div>
      </div>

      <div class="col-md-4 py-1">
        <h3><img src="../assets/images/habit.png" width="30" style="margin-right: 10px">Habits</h3>
        <div class="container" style="height: 500px; width: 100%; overflow-y: scroll; position: relative; background-color: #5C6C7D; border-radius: 6px;">
          <input type="text" class="form-control" id="habitTitle" name="habitTitle" placeholder="Add a new habit" style="margin-top: 16px; font-size: 20px;" autocomplete="off">

          <div id="habitTracker" style="cursor: context-menu;">
            <!-- display habit tracker with AJAX -->
          </div>
        </div>
      </div>

      <div class="col-md-4 py-1" id="taskTracker" style="cursor: context-menu;">
        <!-- display task tracker with AJAX -->
      </div>

      <div class="card shadow text-white bg-dark" style="margin-top: 20px;">
        <div class="card-header">
          <h4 style="font-size: 24px; padding-top: 6px; padding-left: 2px; cursor: context-menu; letter-spacing: 0.4px;">Foods Storage</h4>
        </div>
        <div class="row no-gutters">
          <div class="col-md-12"></div>
          <div class="counter">
            <div class="row" id="foodCounter" style="cursor: context-menu;">
              <!-- display food with AJAX -->
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col text-end" style="margin-top: 6px;">
          <a data-bs-target="#tutorial1" data-bs-toggle="modal" class="link-secondary" style="text-align: right; font-size: 22px; color: #313539; cursor: pointer; font-weight: 600; letter-spacing: 0.4px;">Tutorial?</a>
        </div>
      </div>

    </div>
  </div>

  <!-- modals used in dashboard -->
  <div class="modal fade" id="inventory" aria-hidden="true" aria-labelledby="inventoryTitle" tabindex="-1">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-body" style="color: black" id="inventoryData">
          <!-- display inventory with AJAX -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="logout" aria-hidden="true" aria-labelledby="logoutTitle" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body" style="color: black">
          <h4>Are you sure you want to log out?</h4>
        </div>
        <div class="modal-footer">
          <a href="../include/logout.inc.php" class="btn btn-primary" role="button" aria-pressed="true">Confirm</a>
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="deadModal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body" style="color: black" id="inventoryData">
          <h3 style="margin: 20px;">Uh oh, your pet has died due to your bad habits!</h3>
          <h5 style="margin: 20px;" class="text-muted">Accumulate coins to revive it!</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- work in progress -->
  <div class="modal fade" id="levelModal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body" style="color: black" id="inventoryData">
          <center>
            <img src="../assets/images/levelup.png" width="100">
            <h3 style="margin: 20px;">Your pet has leveled up!</h3>
            <h5 style="margin: 20px;" class="text-muted">Keep up the great work.</h5>
          </center>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    var habitTitle = document.getElementById('habitTitle') ?? {
      textContent: ''
    };

    if (habitTitle && habitTitle.tagName === 'INPUT') {
      habitTitle.addEventListener('keypress', function(event) {
        if (event.key === 'Enter') {
          // prevent the form from being submitted
          event.preventDefault();

          // add habit
          addHabit();
        }
      });
    }
  </script>

  <script src="../assets/js/data/dashboard.data.js"></script>
  <script src="../assets/js/action/dashboard.action.js"></script>
  <script src="../assets/js/toast.js"></script>

  <script src="../assets/js/bootstrap-js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>

</body>

</html>