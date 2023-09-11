<?php

    require_once 'adm_master.php';  
?>
<h1 class="text-center mt-5">Products</h1>
<div>
    <?php
//ADD PRODUCT
    if(isset($_POST['add_product'])){
        $guitar_name = mysqli_real_escape_string($conn, $_POST['guitar_name']);
        $brand = mysqli_real_escape_string($conn, $_POST['brand']);
        $model = mysqli_real_escape_string($conn, $_POST['model']);
        $body_material = mysqli_real_escape_string($conn, $_POST['body_material']);
        $body_shape = mysqli_real_escape_string($conn, $_POST['body_shape']);
        $price = $_POST['price'];
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        
        //check if products exists
        $query = mysqli_query($conn, "SELECT guitar_name FROM products WHERE guitar_name = '$guitar_name'") or die('query failed');

        if(mysqli_num_rows($query) > 0){   
            $warning[] = 'product already added!';
            displayWarning($warning);
        }else{
            //insert the data
            $query = "INSERT INTO products(guitar_name, brand, model, body_material, body_shape, price, description) VALUES ('$guitar_name', '$brand', '$model', '$body_material', '$body_shape', '$price', '$description')";
            mysqli_query($conn, $query) or die('query failed');
            $message[] = 'product added!';
            displayMessages($message);
        }
    }

    if(isset($_GET['delete'])){
        $id = $_GET['delete'];
        $select_id = mysqli_query($conn, "SELECT * FROM products WHERE id = '$id'") or die("query failed");
        $fetch_name = mysqli_fetch_assoc($select_id);
        $product_name = $fetch_name['guitar_name'];
        mysqli_query($conn, "DELETE FROM products WHERE id = '$id'") or die("query failed");
        $warning[] = "Deleted $product_name"; //not working
        header('location:adm_products.php');
    }
    ?>
</div>
<div class="edit">

</div>
<div class="contaier m-5 p-5">
    <button class="btn btn-success m-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample"><i class="fa-solid fa-circle-plus"></i><strong> New product</strong></button>
    <div class="collapse" id="collapseWidthExample">
        <div class="card-body" style="width: 100%;">
            <form action="" class="row g-3" method="post">
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
                
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="6" required></textarea>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-success m-2 col-md-1 text-center" value="add product" name="add_product" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample"><i class="fa-solid fa-circle-plus"></i><strong> Add product</strong></button>
                </div>
            </form>
        </div>    
    </div> 
    
    <table class="table mt-2">
        <thead class="table-dark">
            <td>#</td>
            <td>Guitar Name</td>
            <td>Brand</td>
            <td>Model</td>
            <td>Body Material</td>
            <td>Body Shape</td>
            <td>Price</td>
            <td>Description</td>
            <td><i class="fa-solid fa-pen-to-square" style="color: #ffffff;"></i>Edit</td>
            <td><i class="fa-solid fa-trash" style="color: #ffffff;"></i> Delete</td>
        </thead>
        <tbody class="table-striped ">
        <?php
        //shows data
        $query = "SELECT * FROM products";
        $select_products = mysqli_query($conn, $query);

        if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
                
        ?>
        <tr>
        <form action="" method="post">
            <td><?=$fetch_products['id']?></td>
            <td><?=$fetch_products['guitar_name'];?></td>
            <td><?=$fetch_products['brand']?></td>
            <td><?=$fetch_products['model']?></td>
            <td><?=$fetch_products['body_material']?></td>
            <td><?=$fetch_products['body_shape']?></td>
            <td><?=$fetch_products['price']?></td>
            <td><?=$fetch_products['description']?></td>
            <td>
                <button type="button" class="btn btn-warning" value="edit product" name="edit">Edit</button>
                <input type="hidden" name="<?php $id = $fetch_products['id']?>">
            </td>
            <td>
                <a href="adm_products.php?delete=<?=$fetch_products['id']?>">
                    <button type="button" class="btn btn-danger" value="delete product" onclick="return confirm('Do you want to delete this product?')">Delete</button>
                </a>
            </td>
        </form>
        </tr>
        </tbody>
        <?php
            }
        }
        //ler sobre o while 
        //ler sobre as associativas
        //fazer sozinho
        ?>
    </table>
