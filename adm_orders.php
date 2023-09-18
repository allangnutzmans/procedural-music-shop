
<?php

require 'adm_master.php';

session_start();


if(isset($_POST['update_payment'])){
    $order_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];

    mysqli_query($conn, "UPDATE orders SET payment_status = '$update_payment' WHERE id = '$order_id'")  or die('query failed');;

    $message[] = "Payment status updated to <u>$update_payment</u>";
    displayMessages($message);
}

if(isset($_GET['delete'])){
    $order_id = $_GET['delete'];

    mysqli_query($conn, "DELETE FROM orders WHERE id = '$order_id'")  or die('query failed');;

    $warning[] = "Order #00$order_id was deleted";
    displayWarning($warning);

}

?>

<section class="orders">
    
    <h1 class="text-center mt-5">Placed orders</h1>

    <div class="contaier mx-5 p-5">
                <?php

                $select_orders = mysqli_query($conn, "SELECT * FROM orders")  or die('query failed');

                if(mysqli_num_rows($select_orders) > 0){
                    while ($fetch_orders = mysqli_fetch_assoc($select_orders)):
                ?>
                <div class="card mb-3 m-2" style="width: 30rem;">
                    <div class="card-body d-flex">
                        <div class="card-text">
                            <h3>Placement #00<?= $fetch_orders['id'] ?></h3>
                            <p>User id: <span><?=$fetch_orders['user_id']?></span></p>
                            <p>Placed on: <span><?=$fetch_orders['placed_on']?></span></p>
                            <p>Name: <span><?=$fetch_orders['name']?></span></p>
                            <p>Number: <span><?=$fetch_orders['number']?></span></p>
                            <p>Email: <span><?=$fetch_orders['email']?></span></p>
                            <p>Address: <span><?=$fetch_orders['address']?></span></p>
                            <p>Total products: <span><?=$fetch_orders['total_products']?></span></p>
                            <p>Total price: <span><?=$fetch_orders['total_price']?></span></p>
                            <p>Method: <span><?=$fetch_orders['method']?></span></p>
                            
                            <form action="" method="post">
                                <input type="hidden" name="order_id" value="<?= $fetch_orders['id'] ?>">
                                <select name="update_payment">
                                    <option value="" selected disabled ><?= $fetch_orders['payment_status'] ?></option>
                                    <option value="pending">pending</option>
                                    <option value="complete">complete</option>
                                </select>
                                <input type="submit" value="Update" name="update_order" class="btn btn-warning text-center">
                                <a href="adm_orders.php?delete=<?=$fetch_orders['id']?>" onclick="return confirm('delete this order?')" class="btn btn-danger text-center">Delete</a>
                            </form>
                        </div>
                    </div>
                    <?php
                    endwhile;
                }else{
                    echo '<h2 class="text-center">No orders placed yet.</h2>';
                }
                ?>
                </div>


</section>