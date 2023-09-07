<?php

    include 'config.php';

    if(isset($_POST['submit'])){
        
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
        $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $state = mysqli_real_escape_string($conn, $_POST['state']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);
    

    $query = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'") or die('query failed');

    if(mysqli_num_rows($query) > 0){
        $message[] = 'User already registered!';
    }else{
        if($cpass != $pass){
            $message = "Passwords don't match!";
        }else{
            mysqli_query($conn, "INSERT INTO `user`( `first_name`, `last_name`, `email`, `password`, `address`, `state`, `city`) VALUES ( '$fname', '$lname','$email', '$pass', '$address', '$state', '$city')");
            $message[] = 'Successfully registered!';
            //header();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Register</title>
</head>
<body>

    <?php
        if(isset($message)){
            foreach($message as $msg){
                echo '
                <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                  <img src="..." class="rounded me-2" alt="...">
                  <strong class="me-auto">Message</strong>
                  <small class="text-body-secondary">Just now</small>
                  <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">'
                  .$msg.
                '</div>
              </div>';
            }
        }
    ?>
    <div class="contaier m-5 p-5">
    <div class="card">
        <h1 class="text-center">Register</h1>
            <form action="" method="post" class="row g-3">
            <div class="col-md-6">
                <label for="inputName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="inputFirstName" name="fname" required>
            </div>
            <div class="col-md-6">
                <label for="inputLastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="inputLastName" name="lname" required>
            </div>
            <div class="col-md-12">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="inputEmail" name="email" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="inputPassword" name="password" required>
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Confim Password</label>
                <input type="password" class="form-control" id="CPassword" name="cpassword" required>
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" required>
            </div>
            <div class="col-md-6">
                <label for="inputState" class="form-label">State</label>
                <select id="inputState" class="form-select" name="state">
                <option selected disabled>Choose...</option>
                    <option value="Alabama">Alabama</option>
                    <option value="Alaska">Alaska</option>
                    <option value="Arizona">Arizona</option>
                    <option value="Arkansas">Arkansas</option>
                    <option value="California">California</option>
                    <option value="Carolina del Norte">Carolina del Norte</option>
                    <option value="Carolina del Sur">Carolina del Sur</option>
                    <option value="Colorado">Colorado</option>
                    <option value="Connecticut">Connecticut</option>
                    <option value="Dakota del Norte">Dakota del Norte</option>
                    <option value="Dakota del Sur">Dakota del Sur</option>
                    <option value="Delaware">Delaware</option>
                    <option value="Florida">Florida</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Hawái">Hawái</option>
                    <option value="Idaho">Idaho</option>
                    <option value="Illinois">Illinois</option>
                    <option value="Indiana">Indiana</option>
                    <option value="Iowa">Iowa</option>
                    <option value="Kansas">Kansas</option>
                    <option value="Kentucky">Kentucky</option>
                    <option value="Luisiana">Luisiana</option>
                    <option value="Maine">Maine</option>
                    <option value="Maryland">Maryland</option>
                    <option value="Massachusetts">Massachusetts</option>
                    <option value="Míchigan">Míchigan</option>
                    <option value="Minnesota">Minnesota</option>
                    <option value="Misisipi">Misisipi</option>
                    <option value="Misuri">Misuri</option>
                    <option value="Montana">Montana</option>
                    <option value="Nebraska">Nebraska</option>
                    <option value="Nevada">Nevada</option>
                    <option value="Nueva Hampshire">Nueva Hampshire</option>
                    <option value="Nueva Jersey">Nueva Jersey</option>
                    <option value="Nueva York">Nueva York</option>
                    <option value="Nuevo México">Nuevo México</option>
                    <option value="Ohio">Ohio</option>
                    <option value="Oklahoma">Oklahoma</option>
                    <option value="Oregón">Oregón</option>
                    <option value="Pensilvania">Pensilvania</option>
                    <option value="Rhode Island">Rhode Island</option>
                    <option value="Tennessee">Tennessee</option>
                    <option value="Texas">Texas</option>
                    <option value="Utah">Utah</option>
                    <option value="Vermont">Vermont</option>
                    <option value="Virginia">Virginia</option>
                    <option value="Virginia Occidental">Virginia Occidental</option>
                    <option value="Washington">Washington</option>
                    <option value="Wisconsin">Wisconsin</option>
                    <option value="Wyoming">Wyoming</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">City</label>
                <input type="text" class="form-control" id="inputCity" name="city" required>
            </div>
            <div class="col-12">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" required >
                <label class="form-check-label" for="gridCheck">
                    I Confirm the authenticity of the data
                </label>
                </div>
            </div>
            <div class="col-12 text-center">
                <input type="submit" name="submit" class="btn btn-primary" value="Register">
            <p class="col-12 text-center">Already have an account? <a href="login.php">Login now </a></p>
            </form>
        </div>
    </div>
</body>
</html>