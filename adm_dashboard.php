<?php

    require_once 'adm_master.php';

    $select_users = mysqli_query($conn, "SELECT * FROM user") or die('connection failed');

    $select_products = mysqli_query($conn, "SELECT * FROM products") or die('conection failed');
?>
<h1 class="text-center mt-5">Dashboard</h1> 
<div class="contaier text-center m-5 p-5">
  <div class="row row-cols-auto gx-4 mx-3">
  <div class="card text-center mb-3 col m-2" style="width: 18rem;">
    <div class="card-body">
      <h2 class="card-title">Number of users</h2>
      <br><br>
      <?php
          $n_of_users = mysqli_num_rows($select_users);
      ?>
      <h2 class="card-text"><?= $n_of_users-1?></h2>
      <br>
      <p>total accounts</p>
    </div>
  </div>
  <div class="card text-center mb-3 col m-2" style="width: 18rem;">
    <div class="card-body">
      <h2 class="card-title">Number of products</h2>
      <br><br>
      <?php
          $n_of_users = mysqli_num_rows($select_products);
      ?>
      <h2 class="card-text"><?= $n_of_users?></h2>
      <br>
      <p>total products</p>
    </div>
  </div>
  </div>
</div>

</table>