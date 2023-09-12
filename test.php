<?php
    require 'adm_master.php';

    //UPDATE
    if(isset($_POST['update_product'])){
        $up_id = $_POST['update_p_id'];
        $up_product = $_POST['up_guitar_name'];
        $up_brand = $_POST['up_brand'];
        $up_model = $_POST['up_model'];
        $up_body_material = $_POST['up_body_material'];
        $up_body_shape = $_POST['up_body_shape'];
        $up_price = $_POST['up_price'];
        $up_description = $_POST['up_description'];

        mysqli_query($conn, "UPDATE products SET guitar_name = '$up_product', brand = '$up_brand', model = '$up_model', body_material= '$up_body_material', body_shape = '$up_body_shape', price = '$up_price', description = '$up_description' WHERE id = '$up_id'") or die('query failed');

        header('location:admin_products.php');
    }
?>
<h1 class="text-center mt-5">Products</h1>
    <div>
        <?php
                if(isset($message)){
                    displayMessages($message);
                }elseif(isset($warnig)){
                    displayWarning($warnig);
                }
            ?>  
    </div>    
<section class="contaier mx-5 px-5">
<?php
if(isset($_GET['update'])){
    $product_id = $_GET['update'];
    $p_id_query = mysqli_query($conn, "SELECT * FROM products WHERE id = '$product_id'") or die('query failed');
    if(mysqli_num_rows($p_id_query) > 0){
        while($fetch_product = mysqli_fetch_assoc($p_id_query)){
?>
            <form action="" class="row g-3" method="post">
            <input type="hidden" name="update_p_id" value="<?php echo $product_id; ?>">
                <div class="col-md-3">
                    <label for="text" class="form-label">Guitar name</label>
                    <input type="text" class="form-control" id="up_guitar" name="up_guitar_name" value="<?= $fetch_product['guitar_name']?>" required>
                </div>
                <div class="col-md-3">
                    <label for="text" class="form-label">Brand</label>
                    <input type="text" class="form-control" id="up_brand" name="up_brand"  value="<?= $fetch_product['brand']?>" required>
                </div>
                <div class="col-3">
                    <label for="model" class="form-label">Model</label>
                    <input type="text" class="form-control" name="up_model" id="up_model"  value="<?= $fetch_product['model']?>" required>
                </div>
                <div class="col-md-3">
                    <label for="body_m" class="form-label">Body Material</label>
                    <input type="text" class="form-control" name="up_body_material" id="up_body_m"  value="<?= $fetch_product['body_material']?>" required>
                </div>
                <div class="col-md-3">
                    <label for="shape" class="form-label">Body Shape</label>
                    <input type="text" class="form-control" name="up_body_shape" id="up_shape" required  value="<?= $fetch_product['body_shape']?>">
                </div>
                <div class="col-md-2">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" step="0.01" name="up_price" required  value="<?= $fetch_product['price']?>">
                    </div>
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="up_description" name="up_description" rows="6" required  value="<?= $fetch_product['price']?>"></textarea>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-warning m-2 col-md-1 text-center" name="update_product"><i class="fa-solid fa-circle-plus"></i><strong> Update product</strong></button>
                    &nbsp;
                    <button class="btn bt-danger" type="reset">Cancel</button>
                </div>
            </form>
<?php
        }
    }  
}
?>
</section>

<section class="display-data mx-5 px-5">
    <?php

    //DISPLAY DATA
    $select_all = mysqli_query($conn, "SELECT * from products") or die('query failed');

        if(mysqli_num_rows($select_all) > 0){
            echo '
            <table class="table table-dark table-striped table-hover">
                <thead>
                    <td>#</td>
                    <td>Guitar Name &nbsp;<a href=""><i class="fa-solid fa-sort" style="color:#ffffff"></i></a></td>
                    <td>Brand</td>
                    <td>Model</td>
                    <td>Body Material</td>
                    <td>Body Shape</td>
                    <td>Price</td>
                    <td>Description</td>
                    <td><i class="fa-solid fa-pen-to-square"></i> Edit</td>
                    <td><i class="fa-solid fa-trash" style="color: #ffffff;"></i> Delete</td>
                </thead>
                <tbody>';
            while($fetch_product = mysqli_fetch_assoc($select_all)){
        ?>  <tr>
                <td><?=$fetch_product['id']?></td>          
                <td><?=$fetch_product['guitar_name']?></td>
                <td><?=$fetch_product['brand']?></td>
                <td><?=$fetch_product['model']?></td>
                <td><?=$fetch_product['body_material']?></td>
                <td><?=$fetch_product['body_shape']?></td>
                <td><?= number_format($fetch_product['price'], 2, ',', '.')?></td>
                <td><?=$fetch_product['description']?></td>
                <td>
                    <a href="test.php?update=<?= $fetch_product['id'] ?>">
                    <button type="button" class="btn btn-warning">
                        <i class="fa-solid fa-pen-to-square"></i> Edit
                    </button>
                    </a>
                </td>
                <td>
                    <a href="adm_products.php?delete=<?=$fetch_product['id']?> ">
                    <button type="button" class="btn btn-danger" onclick="return confirm('Do you really want to delete this product?')">
                        <i class="fa-solid fa-trash"></i> Delete 
                    </button>
                </a>
                </td>
            </tr>
        <?php
            }
        }else{
           echo '<h2 class="text-center">No product added yet.</h2>';
            }         
        ?>
        </tbody>
    </table>
</section>