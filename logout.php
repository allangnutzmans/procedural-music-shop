<?php

require 'config.php';

session_start();

session_abort();

session_destroy();

header('location:login.php');

?>