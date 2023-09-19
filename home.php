<?php
    require 'index.php';
 ?>   

<h1 class="home">HOMEPAGE</h1>

<h1 class="text-center mt-5">Latest added</h1> 
<?php

if(isset($_POST['add_to_cart'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_qtd = $_POST['quantity'];

    $cart_check = mysqli_query($conn, "SELECT * FROM cart WHERE user_id = '$user_id' AND name = '$product_name'") or die ('query failed');
    
    if(mysqli_num_rows($cart_check) > 0){
        $warning[] = "Product already added!";
        displayWarning($warning);
    }else{
        mysqli_query($conn, "INSERT INTO cart (user_id, name, price, quantity, image) VALUES('$user_id', '$product_name', '$product_price', '$product_qtd', '$product_image')") or die ('query failed');
        $message[] = "Product added to the cart!";
        displayMessages($message);
    }
}

?>
<div class="contaier text-center m-5 px-5">
<div class="row row-cols-auto gx-4 text-center mx-5 px-5">

<?php
    
    //SELECT 6 PRODUCTS
    $query = mysqli_query($conn, "SELECT * FROM products LIMIT 10");

    if(mysqli_num_rows($query)):
    while($fetch_products = mysqli_fetch_assoc($query)):
?>
    <form action="" method="post" class="card text-center mb-3 m-2" style="width: 18em;">
        <div class="card-body">
            <h3 class="card-title"><?= $fetch_products['guitar_name']?></h3>
            <br><br>
            <div class="card-text">
                <img class="" src="assets/uploaded_img/<?=$fetch_products['image'] ?>" alt="">
            </div>
            <br>
            <p>Model: <?= $fetch_products['model']?></p>
            <p>$<?= $fetch_products['price']?></p>
            <input type="number" name="quantity" value="1" class="form-control mx-5 px-1 text-center" style="width:50%;">
            <br>
            <input type="hidden" name="product_name" value="<?=$fetch_products['guitar_name']?>" class="form-control">
            <input type="hidden" name="product_price" value="<?=$fetch_products['price']?>" class="form-control">
            <input type="hidden" name="product_image" value="<?=$fetch_products['image']?>" class="form-control">
            <input type="submit" name="add_to_cart" value="add to cart" class="form-control btn btn-primary">
        </div>
    </form>
<?php
    endwhile;
    else:
        echo '<h2 class="text-center"> No products added yet!</h2>';
    endif;
?>
    </div>
</div>
<div class="text-center">
    <a href="<?php include 'products.php'?>" class="btn btn-primary btn-lg mb-5">Load more</a>
</div>

<?php
    require 'footer.php'
?>