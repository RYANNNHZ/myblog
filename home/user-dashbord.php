<?php

require "../function/koneksi.php";
require "../function/fungsi.php";
session_start();

// $id = $_GET['id'];


$password =  $_SESSION['password'];


if (!$_SESSION) {
    header("location:login.php");
} elseif ($_SESSION['username'] == 'ADMIN') {
    header("location:admin-page.php");
}

$tampil = ambil_semua_data_users("SELECT * FROM `users` WHERE `password` = '$password'");
$posts = ambil_semua_data_post("SELECT * FROM `posts` WHERE `user_id` = '$tampil[user_id]' ");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    .back {
        position: fixed;
        top: 10px;
    }
</style>

<body class="bg-light">
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <a href="gantipp.php?id=<?= $tampil['user_id'] ?>">
                        <img src="../pic/<?= $tampil['foto_profile'] ?>" class="card-img-top" alt="Profile Image">
                    </a>
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= $tampil['username'] ?></h5>
                        <p class="card-text"><?= $tampil['role'] ?></p>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="list-group">
                    <?php foreach ($posts as $post) : ?>
                        <img src="../img/<?= $post['image_url'] ?>" class="img-thumbnail" alt="...">

                        <a href="other_post.php?post_id=<?= $post['post_id'] ?>" class="list-group-item list-group-item-action">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?= $post['title'] ?></h5>
                                <small><?= $post['created_at'] ?></small>
                            </div>
                            <p class="mb-1"><?= $post['content'] ?></p>
                            <p class="mb-1"><?= $post['post_id'] ?></p>
                            <small>Category: <?= $post['category_id'] ?></small>

                            <!-- onclick="return alertshow()" -->
                            <!-- href="../function/hapus.php?id=<?= $post['post_id'] ?>"  -->
                            <a onclick="alertshow(<?= $post['post_id'] ?>)" class="btn btn-danger btn-sm">Hapus</a> 
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <a href="./menu.php" class="btn btn-primary mt-3 back">Back</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function alertshow(post_id) {
            Swal.fire({
                title: "yakin?",
                text: "Yakin akan menghapus post ini!",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "delete this!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    });
                    document.location.href="../function/hapus.php?id="+post_id;
                }
            });
        }
    </script>
</body>

</html>