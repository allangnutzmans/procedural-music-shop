<?php

require 'index.php';

$user_id = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $number = $_POST['number'];
    $msg =  mysqli_real_escape_string($conn, $_POST['message']);

    $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('query failed');
   
    if (mysqli_num_rows($select_message) > 0) {
        $warning[] = 'Message already delivered';
        displayWarning($warning);
    }else{
        mysqli_query($conn, "INSERT INTO `message`(user_id, name, email, number, message) VALUES ('$user_id', '$name', '$email', '$number', '$$msg')") or die('query failed');
        $message[] = 'Your message was sent';
        displayMessages($message);
    }
}

?>
<h1 class="text-center m-5"> Contact us!</h1>
<div class="container text-center">
<form action="" method="post" class="contaier text-center m-5 px-5 col-12">

    <div class="input-group mb-3">
    <input type="text" class="form-control" name="name" placeholder="Your name">
    </div>

    <div class="input-group mb-3">
    <input type="email" class="form-control" name="email" placeholder="Your e-mail">
    </div>
    <div class="input-group mb-3">

    <span class="input-group-text" id="basic-addon2">+55</span>
    <input type="tel" class="form-control" name="number" placeholder="Phone number">
    </div>

    <div class="input-group">
    <span class="input-group-text">Your message:</span>
    <textarea class="form-control" name="message" rows="10"></textarea>
    </div>

    <input type="submit" class="btn btn-primary mt-4" value="Send" name="submit" >
</form>
</div>

<?php include 'footer.php'; ?>