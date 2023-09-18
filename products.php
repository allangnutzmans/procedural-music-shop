<?php

    require_once 'index.php';

    $select_users = mysqli_query($conn, "SELECT * FROM user") or die('connection failed');

    $select_products = mysqli_query($conn, "SELECT * FROM products") or die('conection failed');
?>

<h1 class="text-center mt-5">Products</h1> 
<div class="contaier text-center m-5 px-5">
  <div class="row row-cols-auto gx-4 text-center mx-5 px-5">
    <?php
        
        //SELECT ALL PRODUCTS
        $query = mysqli_query($conn, "SELECT * FROM products");

        while($fetch_products = mysqli_fetch_assoc($query)):
 ?>
        <div class="card text-center mb-3 col m-2" style="width: 18rem;">
            <div class="card-body d-flex">
                <h3 class="card-title"><?= $fetch_products['guitar_name']?></h3>
                <br><br>
                <div class="card-text">
                    <img class="" src="assets/uploaded_img/<?=$fetch_products['image'] ?>" alt="">
                </div>
                <br>
                <p>Model: <?= $fetch_products['model']?></p>
                <p><?= $fetch_products['description']?></p>
            </div>
        </div>
<?php
        endwhile;
?>

    </div>
</div>
<?php
    require 'footer.php'
?>