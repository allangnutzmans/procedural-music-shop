<?php
    require 'config.php';

    session_start();

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)) {
        header('location:login.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/styles/index.css">
    <title>Store Play</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="">
            <img src="assets/images/prs-logo.png" alt="Logo" width="150" height="70" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <a class="nav-link link-body-emphasis" aria-current="page" href="home.php">Home</a>
                <a class="nav-link link-body-emphasis" href="products.php">Products</a>
                <a class="nav-link link-body-emphasis" href="?page=instruments">Artists</a>
                <a class="nav-link link-body-emphasis" href="?page=pro">Pro Sound</a>
                <a class="nav-link link-body-emphasis" href="?page=news">Top Offers</a>
                <a class="nav-link link-body-emphasis" href="?page=corporate">Corporate Sell</a>
                <a class="nav-link link-body-emphasis" href="?page=fender">Fender</a>
            </ul>
            <div class="d-flex flex-row-reverse">
                    <a class="btn btn-dark p-2 login" href="logout.php" role="button">Logout</a>
                <div class="mb-0 mx-3 text-end">
                    <div class="">Welcome, <?= $_SESSION['fname'] ?>!</div>
                    <div>User: <?= $_SESSION['user']?></div>
                </div>
                <div class="links">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-instagram"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>

