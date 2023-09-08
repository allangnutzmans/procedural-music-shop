<?php

    require 'config.php';

    //mysqli_query($conn, "CREATE TABLE friends (id int, name varchar(20))");
    
    $query = "INSERT INTO friends VALUES(1, 'Harmut'),(2, 'Ulf'), (3, 'Miqueias')";

    mysqli_query($conn, $query);

    echo mysqli_sqlstate($conn);

    mysqli_real_query($conn, "SELECT * FROM friends");

    $real_query = mysqli_field_count($conn);

    echo $real_query;

?>