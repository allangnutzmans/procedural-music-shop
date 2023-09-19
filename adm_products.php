<?php
    require 'adm_master.php';

    //ADD PRODUCT
    if(isset($_POST['add_product'])){
        $guitar_name = mysqli_real_escape_string($conn, $_POST['guitar_name']);
        $brand = mysqli_real_escape_string($conn, $_POST['brand']);
        $model = mysqli_real_escape_string($conn, $_POST['model']);
        $body_material = mysqli_real_escape_string($conn, $_POST['body_material']);
        $body_shape = mysqli_real_escape_string($conn, $_POST['body_shape']);
        $price = $_POST['price'];
        $description = mysqli_real_escape_string($conn, $_POST['description']);

        $image = $_FILES['image']['name'];
        $image_size = $_FILES['image']['size'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_folder = 'assets/uploaded_img/'.$image;  

        $query_check = mysqli_query($conn, "SELECT * FROM products WHERE guitar_name = '$guitar_name'") or die('query failed');

        if(mysqli_num_rows($query_check) > 0){
            $warning[] = 'Product name already added!';
            displayWarning($warning);
        }else{
            $query = mysqli_query($conn, "INSERT INTO products(guitar_name, brand, model, body_material, body_shape, price, description, image) VALUES('$guitar_name', '$brand', '$model', '$body_material', '$body_shape', '$price', '$description', '$image')") or die('query failed');
            
            if($query){
                if($image_size > 2000000){  
                    $warning[] = 'Image is too big.';
                    displayWarning($warning);
                }else{
                    move_uploaded_file($image_tmp_name, $image_folder);
                    var_dump(move_uploaded_file($image_tmp_name, $image_folder));
                    $message[] = 'Product and image successfully added!';
                    displayMessages($message);
                }
            }else{
                $warning[] = 'Product could not be added. Try Again.';
                displayWarning($warning);
            }
        }
    }

    //DELETE PRODUCT
    if(isset($_GET['delete'])){
        $product_id = $_GET['delete'];
        $delete_image_query = mysqli_query($conn, "SELECT image FROM products WHERE id = '$product_id'") or die('query failed');
        $fetch_image = mysqli_fetch_assoc($delete_image_query);
        unlink('assets/uploaded_img/'.$fetch_image['image']);
        mysqli_query($conn,"DELETE FROM products WHERE id = '$product_id'") or die('query failed');
        $warning[] = 'Product delected!';
        displayWarning($warning);
    }

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

        $up_image = $_FILES['up_image']['name'];
        $up_image_tmp_name = $_FILES['up_image']['tmp_name'];
        $up_image_size = $_FILES['up_image']['size'];
        $up_image_folder = 'assets/uploaded_img/'.$up_image;
        $old_image = $_FILES['old_image'];

        mysqli_query($conn, "UPDATE products SET guitar_name = '$up_product', brand = '$up_brand', model = '$up_model', body_material= '$up_body_material', body_shape = '$up_body_shape', price = '$up_price', description = '$up_description' WHERE id = '$up_id'") or die('query failed');

        if(!empty($up_image)){
            if($up_image_size > 2000000){
                $warnig[] = 'Image is too big';
                displayWarning($warning);
            }else{
                mysqli_query($conn, "UPDATE products SET image = '$up_image' WHERE id = $up_id") or die('query failed');
                move_uploaded_file($up_image_tmp_name, $up_image_folder);
                unlink('assets/uploaded_img/'.$old_image);
            }
        }else{
            $delete_image_query = mysqli_query($conn, "SELECT image FROM products WHERE id = '$up_id'") or die('query failed');
            $fetch_delete_image = mysqli_fetch_assoc($delete_image_query);
            unlink('assets/uploaded_img/'.$old_image);
        }
        header('location:adm_products.php');
    }
?>
<h1 class="text-center mt-5">Products</h1>

    <section class="add-product">
    <div class="contaier mx-5 p-5">
        <button class="btn btn-success m-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample"><i class="fa-solid fa-circle-plus"></i><strong> New product</strong></button>
        <div class="collapse" id="collapseWidthExample">
            <div class="card-body" style="width: 100%;">
                <form action="" class="row g-3" method="post" enctype="multipart/form-data">

                    <div class="col-md-3">
                        <label for="text" class="form-label">Guitar name</label>
                        <input type="text" class="form-control" id="guitar" name="guitar_name" required>
                    </div>
                    <div class="col-md-3">
                        <label for="text" class="form-label">Brand</label>
                        <input type="text" class="form-control" id="brand" name="brand" required>
                    </div>
                    <div class="col-3">
                        <label for="model" class="form-label">Model</label>
                        <input type="text" class="form-control" name="model" id="model" placeholder="Stratocaster, Telecaster, Flying V..." required>
                    </div>
                    <div class="col-md-3">
                        <label for="body_m" class="form-label">Body Material</label>
                        <input type="text" class="form-control" name="body_material" id="body_m" required>
                    </div>
                    <div class="col-md-3">
                        <label for="shape" class="form-label">Body Shape</label>
                        <input type="text" class="form-control" name="body_shape" id="shape" required>
                    </div>
                    <div class="col-md-2">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" step="0.01" name="price" required>
                    </div>
                    <div class="col-md-2">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" accept="image/jpg, image/jpeg, image/png" class="form-control" id="image" name="image" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description" rows="6" required></textarea>
                    </div>
                    <div class="row">
                        <button type="submit" class="btn btn-success m-2 col-md-1 text-center" value="add_product" name="add_product" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample"><i class="fa-solid fa-circle-plus"></i><strong> Add product</strong></button>
                    </div>
                </form>
            </div>    
        </div> 
    </div>  
</section>
<section class="contaier mx-5 px-5">


<?php
    //UPDATE FORM//
    if(isset($_GET['update'])){
        $product_id = $_GET['update'];
        $p_id_query = mysqli_query($conn, "SELECT * FROM products WHERE id = '$product_id'") or die('query failed');
        if(mysqli_num_rows($p_id_query) > 0){
            while($fetch_product = mysqli_fetch_assoc($p_id_query)){
?>
           
        <form action="" class="row g-3" method="post" enctype="multipart/form-data"> 

                <input type="hidden" name="update_p_id" value="<?= $fetch_product['id']; ?>">
                <input type="hidden" name="old_image" value="<?= $fetch_product['image'] ?>">
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
                <div class="col-md-2">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="box" name="up_image" accept="image/jpg, image/jpeg, image/png" required>
                </div>
                <div class="row">
                <div class="col-10">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="up_description" name="up_description" rows="6" required><?= $fetch_product['description']?></textarea>
                </div>
                <img class="col-2 img-thumbnail float-end" src="assets/uploaded_img/<?= $fetch_product['image'] ?>" alt=""> 
                <div class="">
                    <button type="submit" class="btn btn-warning text-center" value="update_product" name="update_product">
                        <i class="fa-solid fa-circle-plus"></i><strong> Update product</strong>
                    </button>
                </div>
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
                    <td>Image</td>
                    <td><i class="fa-solid fa-pen-to-square"></i> Edit</td>
                    <td><i class="fa-solid fa-trash" style="color: #ffffff;"></i> Delete</td>
                </thead>
                <tbody>';
                function Img($img){
                    if(is_string($img)){   
                        return $img;
                    }else{

                        return '';
                    }
                }
            while($fetch_product = mysqli_fetch_assoc($select_all)){
?>  
            <tr>
                <td><?=$fetch_product['id']?></td>          
                <td><?=$fetch_product['guitar_name']?></td>
                <td><?=$fetch_product['brand']?></td>
                <td><?=$fetch_product['model']?></td>
                <td><?=$fetch_product['body_material']?></td>
                <td><?=$fetch_product['body_shape']?></td>
                <td>$ <?= number_format($fetch_product['price'], 2, ',', '.')?></td>
                <td><?=$fetch_product['description']?></td>
                <td><a href="<?= Img($fetch_product['image'])?>"><?= Img($fetch_product['image'])?></a></td>
                <td>
                    <a href="adm_products.php?update=<?= $fetch_product['id']?>">
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