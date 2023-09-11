<?php
    require 'config.php';
    include 'adm_master.php';

    $query = "SELECT * FROM user";
    $select_users = mysqli_query($conn, $query);

?>
<h1 class="text-center mt-5">Dashboard</h1>
<div class="contaier m-5 p-5">
    <div class="card">

    </div>

    <table class="table">
        <thead class="table-dark">
            <td>#</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Address</td>
            <td>State</td>
            <td>City</td>
        </thead>

        <?php
        //ler sobre o while 
        //ler sobre as associativas
        //fazer sozinho

        
        ?>
    </table>