<?php
    require_once 'config.php';

    session_start();

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/styles/admin.css">
    <title>Store Play</title>
</head>
<body>
<header>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="adm_master.php">PSR ADMIN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <a class="nav-link link-body-emphasis" aria-current="page" href="adm_dashboard.php">Dashboard</a>
                <a class="nav-link link-body-emphasis" href="adm_products.php">Products</a>
                <a class="nav-link link-body-emphasis" href="adm_orders.php">Orders</a>
                <a class="nav-link link-body-emphasis" href="adm_users.php">Users</a>
                <a class="nav-link link-body-emphasis" href="adm_contacts.php">Messages</a>
            </ul>
            <div class="d-flex flex-row-reverse">
                    <a class="btn btn-dark p-2 login" href="logout.php" role="button">Logout</a>
            </div>
        </div>
    </div>
</nav>
</header>


