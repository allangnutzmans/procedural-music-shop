<?php

    require 'config.php';
    
    session_start();

    if(isset($_POST['submit'])){

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

        $query = "SELECT * FROM user WHERE email = '$email' AND password = '$pass'" or die('query failed');
        $find_user = mysqli_query($conn, $query);

        if(mysqli_num_rows($find_user) > 0){

            $adm_query = "SELECT * FROM user WHERE email = 'psr@admin.com'" or die('query failed');
            $adm_row = mysqli_query($conn, $query);

            if($adm_row == true){  //nao deu certo
                header('location:adm.php');

            }else{
                $row = mysqli_fetch_assoc($find_user);

                $_SESSION['user_id'] = $row['id'];
                $_SESSION['user'] = $row['email'];
                $_SESSION['fname'] = $row['fname'];
                $_SESSION['lname'] = $row['lname'];
                $_SESSION['password'] = $row['password'];

                header('location:home.php');
            }

        }else{
            $message[] = 'Incorrect email or password.';
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
    <title>Login</title>
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
            <h1 class="text-center">Login</h1>
            <form action="" method="post" class="row g-3">
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email">
                </div>
                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Password</label>
                    <input type="password" class="form-control" id="inputPassword4" name="password">
                </div>
                <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
                <p>Don't have an account? <a href="register.php">Register now </a></p>
            </form>
        </div>
    </div>
</body>
</html>