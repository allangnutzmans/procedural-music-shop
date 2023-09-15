<?php

    require 'config.php';

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
            $message[] = "Passwords don't match!";
        }else{
            $query = "INSERT INTO user (first_name, last_name, email, password, address, state, city) VALUES ('$fname', '$lname', '$email', '$pass', '$address', '$state', '$city')" or die('query failed');
            mysqli_query($conn, $query);
            $message[] = 'Successfully registered!';
            header('location:login.php');
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
    <link rel="stylesheet" href="assets/styles/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Register</title>
</head>
<body>
    <?php
        if(isset($message)){
            foreach($message as $msg){
                echo 
                    '<div class="toast show align-items-center text-bg-primary border-0 message" role="alert" aria-live="assertive" aria-atomic="true">
                        <div class="d-flex">
                        <div class="toast-body"><h6>'
                            .$msg.
                        '</h6></div>
                        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                        </div>
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
                    <option value="Colorado">Colorado</option>
                    <option value="Connecticut">Connecticut</option>
                    <option value="Delaware">Delaware</option>
                    <option value="Florida">Florida</option>
                    <option value="Georgia">Georgia</option>
                    <option value="Hawaii">Hawaii</option>
                    <option value="Idaho">Idaho</option>
                    <option value="Illinois">Illinois</option>
                    <option value="Indiana">Indiana</option>
                    <option value="Iowa">Iowa</option>
                    <option value="Kansas">Kansas</option>
                    <option value="Kentucky">Kentucky</option>
                    <option value="Louisiana">Louisiana</option>
                    <option value="Maine">Maine</option>
                    <option value="Maryland">Maryland</option>
                    <option value="Massachusetts">Massachusetts</option>
                    <option value="Michigan">Michigan</option>
                    <option value="Minnesota">Minnesota</option>
                    <option value="Mississippi">Mississippi</option>
                    <option value="Missouri">Missouri</option>
                    <option value="Montana">Montana</option>
                    <option value="Nebraska">Nebraska</option>
                    <option value="Nevada">Nevada</option>
                    <option value="New Hampshire">New Hampshire</option>
                    <option value="New Jersey">New Jersey</option>
                    <option value="New Mexico">New Mexico</option>
                    <option value="New York">New York</option>
                    <option value="North Carolina">North Carolina</option>
                    <option value="North Dakota">North Dakota</option>
                    <option value="Ohio">Ohio</option>
                    <option value="Oklahoma">Oklahoma</option>
                    <option value="Oregon">Oregon</option>
                    <option value="Pennsylvania">Pennsylvania</option>
                    <option value="Rhode Island">Rhode Island</option>
                    <option value="South Carolina">South Carolina</option>
                    <option value="South Dakota">South Dakota</option>
                    <option value="Tennessee">Tennessee</option>
                    <option value="Texas">Texas</option>
                    <option value="Utah">Utah</option>
                    <option value="Vermont">Vermont</option>
                    <option value="Virginia">Virginia</option>
                    <option value="Washington">Washington</option>
                    <option value="West Virginia">West Virginia</option>
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
                <br>
                <br>
            <p class="col-12 text-center">Already have an account? <a href="login.php">Login now </a></p>
            </form>
        </div>
    </div>
</body>
</html>