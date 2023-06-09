<?php
    // start session if not started
    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $userID = $_SESSION['userID'];

    include '../back/connection.back.php';
    include '../back/pet.back.php';
    include '../back/currency.back.php';
    include '../back/food.back.php';
    include '../back/wallpaper.back.php';
    include '../include/toast.inc.php';
    include '../include/tutorial.inc.php';
?>