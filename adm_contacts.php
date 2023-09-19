<?php

    require 'adm_master.php';

    if (isset($_GET['delete'])) {
        $message_id = $_GET['delete'];
        mysqli_query($conn, "DELETE FROM message WHERE id = '$message_id'") or die ('query failed');
        $warning[] = 'Message deleted';
        displayWarning($warning);
    }
?>

<h1 class="text-center mt-5">Messages</h1>


<div class="contaier-fluid mx-5 p-5">
    <?php
        $select_messages = mysqli_query($conn, "SELECT * FROM message") or die ('query failed');
        $c = 0;
        if(mysqli_num_rows($select_messages) > 0) {
            while ($fetch_messages = mysqli_fetch_assoc($select_messages)) {
                $c += 1;
    ?>
    <div class="card">
        <h4>Message #00<?=$c?></h4>
        <br>
        <div class="card">
        <h5 ><?= $fetch_messages['name']?></h5>
        <p><strong>ID:</strong> <?= $fetch_messages['user_id']?></p>
        <p><strong>Email:</strong> <?= $fetch_messages['email'] ?></p>
        <p><strong>Number:</strong> <?= $fetch_messages['number']?></p>
        <p><strong>Message:</strong></p>
        <p>&nbsp &nbsp &nbsp<?= $fetch_messages['message']?></p>
        </div>
        <br>
        <a class="btn btn-danger" href="adm_contacts.php?delete=<?= $fetch_messages['id'] ?>" onclick="return confirm('delete this message?');">Delete</a>
    </div>
    <br><br>
    <?php
            }
        }else{
            echo '<h2 class="text-center">No messages.</h2>';
        }
    ?>
</div>    

