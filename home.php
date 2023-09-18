<?php
    require 'index.php';

    $select_users = mysqli_query($conn, "SELECT * FROM user") or die('connection failed');

$select_products = mysqli_query($conn, "SELECT * FROM products") or die('conection failed');
?>

<h1 class="home">HOMEPAGE</h1>



<h1 class="text-center mt-5">Latest added</h1> 
<div class="contaier text-center m-5 px-5">
<div class="row row-cols-auto gx-4 text-center mx-5 px-5">

<?php
    
    //SELECT 6 PRODUCTS
    $query = mysqli_query($conn, "SELECT * FROM products LIMIT 10");

    if(mysqli_num_rows($query)):
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
            <p>Description: <?= $fetch_products['description']?></p>
        </div>
    </div>
<?php
    endwhile;
    else:
        echo '<h2 class="text-center"> No products added yet!</h2>';
    endif;
?>
    </div>
</div>
<div class="text-center">
    <a href="<?php //include 'load_products.php'?>" class="btn btn-primary btn-lg mb-5">Load more</a>
</div> 
<?php
require 'footer.php'
?>