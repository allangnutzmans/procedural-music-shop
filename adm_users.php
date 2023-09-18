<?php

    require_once 'adm_master.php';

    if(isset($_GET['delete'])){
        $user_id = $_GET['delete'];
        $delete_query = mysqli_query($conn, "DELETE FROM users WHERE id = '$user_id'") or die('query failed');
        $warning[] = "User deleted.";
        displayWarning($warning);
    }
?>

<section>
    <div class="contaier text-center m-5 px-5">
        <div class="row row-cols-auto gx-4 text-center mx-5 px-5">
    <?php

        $select_users = mysqli_query($conn, "SELECT * FROM user");

            if(mysqli_num_rows($select_users) > 0){
                while($fetch_users = mysqli_fetch_assoc($select_users)){
?>                 <div class="card text-center col m-2" id="<?php if ($fetch_users['user_type'] == 'admin') {echo 'black"';}?>" style="width: 18rem;">
                        <div class="card-body ">
                            <h3 class="card-title"><?= $fetch_users['first_name'] .' '. $fetch_users['last_name']?></h3>
                            <br><br>
                            <div class="card-text">
                                    <p> User id: <span>#00<?= $fetch_users['id']?></span></p>
                                    <p> username: <span><?= $fetch_users['name']?></span></p>
                                    <p> Email: <span><?= $fetch_users['email']?></span></p>
                                        <p> User type: <span class="<?php if ($fetch_users['user_type'] == 'admin') {echo 'text-danger';}else{ echo "text-primary";}?>">
                                        <?= $fetch_users['user_type']; ?></span></p>
                                    <a href="adm_users.php?delete=<?= $fetch_users['id']?>" onclick="return confirm('delete this user?')" class="btn btn-danger text-center">Delete</a>
                            </div>
                        </div>
                    </div>
<?php
                }

            }
?>

        </div>
    </div>
</section>