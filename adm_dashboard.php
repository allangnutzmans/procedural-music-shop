<?php
    require_once 'config.php';
    require_once 'adm_master.php';

    $query = "SELECT * FROM user";
    $select_users = mysqli_query($conn, $query);

    //cont rows


?>
<h1 class="text-center mt-5">Dashboard</h1> 
<div class="contaier m-5 p-5">
<div class="card text-center mb-3" style="width: 18rem;">
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

    </table>