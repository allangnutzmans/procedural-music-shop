<?php
 include 'config.php';

session_start();

if(!isset($user_id)){
    header('location:login.php');
}

