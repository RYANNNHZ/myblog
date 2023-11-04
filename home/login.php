<?php

require "../function/koneksi.php";
require "../function/fungsi.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body {
            margin-top: 20px;
        }

        .banner{
            background-image: url("../image/regis.jpg");
            background-position: center;
            background-size:cover;
            opacity: 0.5;
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

        <div class="row">
            <div class="col-5 banner">
                <div class="blue"></div>
            </div>
            <div class="col-7" style="height: 570px;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <form action="" method="POST" class="w-100">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username:</label>
                                    <input type="text" id="username" name="username" class="form-control" required autocomplete="off">
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
                <img src="../image/favicion-removebg-preview.png" width="40" alt="">
            </div>
            <div class="panel-footer">
                Copyright © 2023. smk mutu cikampek
            </div>
        </div>

</body>

</html>
<?php

if (isset($_POST['submit'])) {

    $users = ambil_semua_data_users("SELECT * FROM `users` WHERE `username` = '$_POST[username]' AND `password` = '$_POST[password]'");

    // foreach ($users as $user ) {
    //     echo $user['username']."<br>";
    // }

    // var_dump($users);
    // die();

    if ($users) {
        if ($users['isAktif'] == 1) {
            session_start();

            // echo ;
            $_SESSION['username'] = $users['username'];
            $_SESSION['role'] = $users['role'];
            $_SESSION['password'] = $users['password'];

            header("location:menu.php");
        } else {
            echo "akun anda di ban sementara oleh admin";
        }
    }
}
?>