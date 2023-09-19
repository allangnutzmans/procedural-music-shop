<?php

    require_once 'adm_master.php';

    $select_users = mysqli_query($conn, "SELECT * FROM user") or die('connection failed');

    $select_products = mysqli_query($conn, "SELECT * FROM products") or die('conection failed');

  //TOTAL PENDING
    $select_orders_pending = mysqli_query($conn, "SELECT * FROM orders WHERE payment_status = 'pending'") or die('conection failed');

    $total_pending = 0;
    if(mysqli_num_rows($select_orders_pending) > 0){
      while ($fetch_pending = mysqli_fetch_assoc($select_orders_pending)) {
        $total_pending += $fetch_pending['total_price'];
      }
    }

  //TOTAL COMPLETE
    $select_orders_complete = mysqli_query($conn, "SELECT * FROM orders WHERE payment_status = 'complete'") or die('conection failed');
    
    $total_complete = 0;
    if(mysqli_num_rows($select_orders_complete) > 0){
      while($fetch_complete = mysqli_fetch_assoc($select_orders_complete)){
        $total_complete += $fetch_complete['total_price'];
      }
    }

    $select_orders = mysqli_query($conn, "SELECT * FROM orders");

    $select_messages = mysqli_query($conn, "SELECT * FROM message");
?>
<h1 class="text-center mt-5">Dashboard</h1> 
<div class="contaier text-center mx-5 p-5">
  <div class="row row-cols-auto gx-2 mx-3">
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
          $n_of_products = mysqli_num_rows($select_products);
      ?>
      <h2 class="card-text"><?= $n_of_products?></h2>
      <br>
      <p>total products</p>
    </div>
  </div>

  <div class="card text-center mb-3 col m-2" style="width: 18rem;">
    <div class="card-body">
      <h2 class="card-title">Pending orders</h2>
      <br><br>
      <h2 class="card-text">$<?= $total_pending?></h2>
      <br>
      <p>total pending</p>
    </div>
  </div>

  <div class="card text-center mb-3 col m-2" style="width: 18rem;">
    <div class="card-body">
      <h2 class="card-title">Completed orders</h2>
      <br><br>
      <h2 class="card-text">$<?= $total_complete ?></h2>
      <br>
      <p>total complete</p>
    </div>
  </div>


  <div class="card text-center mb-3 col m-2" style="width: 18rem;">
    <div class="card-body">
      <h2 class="card-title">Number of orders</h2>
      <?php
        $n_orders = mysqli_num_rows($select_orders);
      ?>
      <br><br>
      <h2 class="card-text"><?= $n_orders?></h2>
      <br>
      <p>orders placed</p>
    </div>    
  </div>

  <div class="card text-center mb-3 col m-2" style="width: 18rem;">
    <div class="card-body">
      <h2 class="card-title">Messages</h2>
      <?php
        $n_messages = mysqli_num_rows($select_messages)
      ?>
      <br><br>
      <h2 class="card-text"><?= $n_messages ?></h2>
      <br>
      <p>new messages</p>
    </div>    
  </div>


  </div>
</div>

</table>