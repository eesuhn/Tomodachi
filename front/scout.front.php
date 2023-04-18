<?php
  include '../include/shop.inc.php';
  include '../include/toast.inc.php';
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../assets/css/bootstrap-css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/sidebar.css">
  <link rel="stylesheet" href="../assets/css/shop.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  <script src="../assets/js/data/shop.data.js"></script>
  <script src="../assets/js/action/shop.action.js"></script>
  <script src="../assets/js/toast.js"></script>
</head>

<div class="sidebar">
  <div class="logo">
    <img src="../assets/images/logo2.png" alt="My Website Logo">
  </div>
  <a href="../front/dashboard.front.php">Home</a>
  <a class="active" href="../front/shop.front.php">Shop</a>
  <a href="../front/study.front.php">Study</a>
  <div class="logout">
    <a href="#logout" data-bs-target="#logout" data-bs-toggle="modal">Logout</a>
  </div>
</div>

<body style='background-color: #f2f2f2f2;'>
  <div class="content vh-100 p-0">

    <div class="coin-indicator">
      <span class="coin-icon"></span>
      <span class="coin-count">100000</span>
    </div>

    <div style="background-image: url('../assets/images/shopbg.png'); background-size: cover; background-repeat: no-repeat; background-position: center center; height: 200px;"></div>

    <ul>
      <li><a href="shop.front.php">Shop</a></li>
      <li><a class="active" href="scout.front.php">Pet Scout</a></li>
    </ul>

    <section style="background-image: url('../assets/images/scoutbg.png'); background-size: cover; background-repeat: no-repeat; background-position: center center; color: white; opacity: 92%;">
      <div style="padding: 10px">
        <h2>Pet Scout</h2>
        <h3 style="color: white">Partner up with new pets from different rarities using your earned coins!
        </h3>
      </div>

      <center>
        <img src="../assets/images/petscout.png" style="margin: auto; width: 450px;">
        <h1>1000<img src='../assets/images/coin.png' width='15'></h1>
        <button type='button' class='btn btn-primary' style="padding: 10px; width: 25%;">Scout</button><br>
        <a data-bs-target="#offeringRates" data-bs-toggle="modal" class="link-light">Check Offering Rates</a>
      </center>
    </section>

  </div>

  <div class="modal fade modal-lg" id="offeringRates" aria-hidden="true" aria-labelledby="offeringRatesTitle" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">

        <div class="modal-body" style="color: black">
          <div class="row">
            <div class="col-12 d-flex justify-content-center" style="margin-bottom: -10px;">
              <img src="../assets/images/legendary.png" width="150">
            </div>

            <?php foreach ($petData_legendary as $pet_legendary) { ?>
              <div class="col-12 d-flex justify-content-center">
                <img src="<?= $pet_legendary['petImg'] ?>" width="150">
              </div>

              <div class="col-12 d-flex justify-content-center">
                <h2><?= $pet_legendary['petName'] ?></h2>
              </div>

              <div class="col-3"></div>
              <div class="col-6 d-flex justify-content-center" style="text-align: center;">
                <h6><?= $pet_legendary['petDesc'] ?></h6>
              </div>

              <div class="col-3"></div>
            <?php } ?>
          </div>

          <div class="row">
            <div class="col-12 d-flex justify-content-center" style="margin-top: 30px; margin-bottom: -10px;">
              <img src="../assets/images/rare.png" width="150">
            </div>

            <?php foreach ($petData_rare as $pet_rare) { ?>
              <div class="col-12 d-flex justify-content-center">
                <img src="<?= $pet_rare['petImg'] ?>" width="150">
              </div>

              <div class="col-12 d-flex justify-content-center">
                <h2><?= $pet_rare['petName'] ?></h2>
              </div>

              <div class="col-3"></div>
              <div class="col-6 d-flex justify-content-center" style="text-align: center;">
                <h6><?= $pet_rare['petDesc'] ?></h6>
              </div>

              <div class="col-3"></div>
            <?php } ?>
          </div>

          <div class="row">
            <div class="col-12 d-flex justify-content-center" style="margin-top: 30px; margin-bottom: -10px;">
              <img src="../assets/images/common.png" width="150">
            </div>

            <?php foreach ($petData_common as $pet_common) { ?>
              <div class="col-12 d-flex justify-content-center">
                <img src="<?= $pet_common['petImg'] ?>" width="150">
              </div>

              <div class="col-12 d-flex justify-content-center">
                <h2><?= $pet_common['petName'] ?></h2>
              </div>

              <div class="col-3"></div>
              <div class="col-6 d-flex justify-content-center" style="text-align: center;">
                <h6><?= $pet_common['petDesc'] ?></h6>
              </div>

              <div class="col-3"></div>
            <?php } ?>
          </div>

          <div class="row" style="margin-top: 10px;">
            <div class="col-2"></div>
            <div class="col-8 d-flex justify-content-center">
              <p class="text-muted" style="text-align: center;">Looking for that special pet to add to your collection? Take a chance and try our gacha system, where legendaries appear with a 5% chance, rares with a 35% chance, and commons with a 60% chance. With a variety of pets to collect, each with their own unique rarity and value, you'll never know what you might get! So why not try your luck today and see if you can obtain the pet of your dreams?</p>
            </div>
            <div class="col-2"></div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/js/bootstrap-js/bootstrap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

</body>

<html>