<?php

require "../function/koneksi.php";
require "../function/fungsi.php";

$post_id = $_GET['post_id'];

$posts = ambil_semua_data_post("SELECT * FROM `posts` WHERE `post_id` = '$post_id'");
// $comments = ambil_satu_data_post("SELECT * FROM `coments` WHERE `post_id` = '$post_id'");

$post_id = $_GET['post_id'];

$comments = ambil_semua_data_post("SELECT * FROM `comments` JOIN `users` ON comments.user_id = users.user_id WHERE `post_id` = '$post_id'");

session_start();
$passUser =  $_SESSION["password"];

$userFinder = ambil_semua_data_users("SELECT * FROM `users` WHERE `password` = '$passUser'");
$user_id = $userFinder['user_id'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row">
            <?php foreach ($posts as $post) : ?>

                <div class="col-12">
                    <div class="list-group">
                        <?php foreach ($posts as $post) : ?>

                            <img src="../img/<?= $post['image_url'] ?>" class="img-thumbnail img-fluid" style="width:90%; margin:auto;" alt="...">
                            <a href="other_post.php?post_id=<?= $post['post_id'] ?>" class="list-group-item list-group-item-action" style="width: 90%; margin: auto;">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><?= $post['title'] ?></h5>
                                    <small><?= $post['created_at'] ?></small>
                                </div>
                                <p class="mb-1"><?= $post['content'] ?></p>
                                <p></p>

                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="col" style="margin: auto;">
                    <div class="container" style="margin: auto;">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-4" id="comment">
                                <form action="../proses/tambah_comment.php" method="post">
                                    <input type="hidden" name="post_id" value="<?= $post_id ?>">
                                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                                    <input type="text" name="content" class="form-control mb-3" placeholder="Tulis komentar Anda...">
                                    <input type="submit" name="submit" value="send" class="btn btn-primary">

                                    <a class="btn btn-primary" href="menu.php" role="button">back</a>

                                </form>
                            </div>
                            <div class="col-md-7">
                                <?php foreach ($comments as $post) : ?>
                                    <div class="card mb-3">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <div class="d-flex align-items-center">
                                                    <img src="../pic/<?= $post['foto_profile'] ?>" class="rounded-circle me-3" width="40" height="40">
                                                    <div>
                                                        <h5><?= $post['username'] ?></h5>
                                                        <small><?= $post['created_at'] ?></small>
                                                    </div>
                                                </div>
                                                <?php if ($user_id == $post['user_id']) : ?>
                                                    <a href="../proses/hapus-comment.php?comment_id=<?= $post['comment_id'] ?>&post_id=<?= $post_id ?>" class=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg></a>
                                                <?php endif; ?>
                                            </div>
                                            <p><?= $post['content'] ?></p>
                                        </div>
                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

    <?php endforeach; ?>
    </div>

</body>

</html>