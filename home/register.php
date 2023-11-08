<?php

require "../function/koneksi.php";
require "../function/fungsi.php";

if (isset($_POST['submit'])) {
    $user_id = rand(0,1000) * rand(0,1000);
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];


    tambah_data_register_user("INSERT INTO `users`(`user_id`, `username`, `email`, `password`, `role`, `isAktif`) VALUES ('$user_id','$username','$email','$password','member','1')");
    session_start();
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['role'] = $_POST['role'];
    $_SESSION['password'] = $_POST['password'];
    header("location:menu.php?regis=berhasil");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" href="../image/favicion (2).png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            margin-top: 20px;
        }

        .banner{
            background-image: url("../image/content-login.png");
            background-position: center;
            background-size:cover;

        }
        
        .blue{
            opacity: 0.5;
            width: 100%;
            height: 100%;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="row d-flex justify-content-center">
            <div class="col-5 col-xl-6 col-lg-7 col-xxl-5 banner">
                <div class="blue"></div>
            </div>
            <div class="col-lg-5 col-12" style="height: 570px;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-sm-12">
                            <form action="" method="POST" class="w-100">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username:</label>
                                    <input type="text" id="username" name="username" class="form-control" required autocomplete="off">
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">email:</label>
                                    <input type="text" id="email" name="email" class="form-control" required autocomplete="off">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password:</label>
                                    <input type="password" id="password" name="password" class="form-control" required autocomplete="oof">
                                </div>

                                <input type="submit" name="submit" value="Login" class="btn btn-primary">
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="panel panel-default bg-primary fixed-bottom d-flex align-items-center justify-content-center">
            <div class="panel-body m-2">
                <img src="../image/favicion (2).png" width="40" alt="">
            </div>
            <div class="panel-footer">
                Copyright © 2023. Jn-corp
            </div>
        </div>

</body>

</html>

