<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/navbar.css">

</head>

<body style="background-color:#f1f1f1;">

  <nav class="navbar">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Contact</a></li>
      <li><a href="front/login.front.php">Login</a></li>
    </ul>
  </nav>

  <div class="row px-4 py-4">
    <div class="col-12 d-flex justify-content-center">
      <img src="assets/images/logo1.png" style="width: 40%; height: auto;">
    </div>
    <div class="col-12 d-flex justify-content-center">
      <p class="h1" style="text-align: center; width: 75%;">Tomodachi is a direct translation from the Japanese word, Friend. It serves as a personal companion for students
        and are equipped with functionalities that aid in daily productivity, with the primary focus on being a habit tracker.
        </p1>
    </div>

    <div class="row py-4 px-4" style="width:75%; margin:auto;">
      <div class="col-12 col-md-4 py-4">
        <div class="card">
          <img src="assets/images/collect.png" class="card-img-top" width="300">
          <div class="card-body" style="background-color: black; color:white">
            <p class="card-text" style="font-size: 24px;">Collect a variety of your own companions as you progress through the journey.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4 py-4">
        <div class="card">
          <img src="assets/images/refine.png" class="card-img-top">
          <div class="card-body" style="background-color: black; color:white">
            <p class="card-text" style="font-size: 24px;">Take on this initiative to refine yourself and become more productive.</p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-4 py-4">
        <div class="card">
          <img src="assets/images/care.png" class="card-img-top" width="300">
          <div class="card-body" style="background-color: black; color:white">
            <p class="card-text" style="font-size: 24px;">Earn rewards and care for your companions as you achieve your goals.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="d-flex align-items-center justify-content-center">
      <div class="text-center">
        <a href="front/login.front.php"><img src="assets/images/joinbutton.png" style="width: 30%; height: auto;"></a>
      </div>
    </div>
  </div>

  <footer class="bg-dark text-center text-lg-start text-white">
  <div class="container p-4">
    <div class="row">
      <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
        <h5 class="text-uppercase">Tomodachi</h5>
        <p>
          Final Year Project, DIIT AUG 2021
        </p>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Quick Access</h5>
        <ul class="list-unstyled mb-0">
          <li>
            <a href="#!" class="text-white">About us</a>
          </li>
          <li>
            <a href="#!" class="text-white">Contact us</a>
          </li>
          <li>
            <a href="#!" class="text-white">Login</a>
          </li>
        </ul>
      </div>
      <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
        <h5 class="text-uppercase">Creators</h5>
        <ul class="list-unstyled mb-0 text-white">
          <li>
            Lim Yi Hong
          </li>
          <li>
            Mak Wei Jen
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>

<div class="modal fade modal-lg" id="loginModal" aria-hidden="true" aria-labelledby="loginTitle" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="loginTitle">Log in to your Account</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="login_user" method="POST" action="">
        <div class="modal-body">
          <div class="row">
            <div class="col-6" style="background-image: url(uploads/registerpic.png);background-size: cover; height:100%; background-position: center;">
            </div>
            <div class="col-6">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="e.g. john@gmail.com" required>
              <div id="emailHelp" class="form-text">Please enter a valid email address</div>
              <label for="text">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter a secure password" required>
              <a href="#registerModal" data-bs-target="#registerModal" data-bs-toggle="modal">Don't have an account?</a>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Proceed</button>
        </div>
      </form>
    </div>
  </div>
</div>


  <script src="js/bootstap.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.min.js" integrity="sha384-heAjqF+bCxXpCWLa6Zhcp4fu20XoNIA98ecBC1YkdXhszjoejr5y9Q77hIrv8R9i" crossorigin="anonymous"></script>
  
</body>


</html>


