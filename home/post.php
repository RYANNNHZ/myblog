<?php
require "../function/koneksi.php";
require "../function/fungsi.php";

session_start();



$query = mysqli_query($koneksi, "SELECT * FROM `categories`");

$cari_user_id = mysqli_query($koneksi, "SELECT * FROM `users` WHERE `password` = '$_SESSION[password]'");
$tampil_name = mysqli_fetch_assoc($cari_user_id);

if (isset($_POST['post'])) {
    // $uniqueString = uniqid();
    $post_id = rand(0, 1000) * rand(0, 1000);

    $created_at = date("Y-m-d", time());

    $title = $_POST["title"];
    $content = $_POST["content"];
    $category_id = $_POST["category"];
    $image_url = $_POST["image_url"];
    $user_id = $tampil_name["user_id"];

    posting_content("INSERT INTO `posts` (`post_id`, `title`, `content`, `user_id`, `category_id`, `image_url`, `created_at`, `update_at`) VALUES ('$post_id', '$title', '$content', '$user_id', '$category_id', '$image_url', '$created_at', '$created_at');");
    // header("location:menu.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">

        <form action="../proses/uplodpost.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="username" value="<?= $_SESSION['username'] ?>">
            <input type="hidden" name="password" value="<?= $_SESSION['password'] ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="content">Content</label>
                        <input type="text" class="form-control" id="content" name="content">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select class="form-select" id="category" name="category">
                            <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                                <option value="<?= $data['category_id'] ?>"><?= $data['name'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="image_url">Image</label>
                        <input type="file" class="form-control" id="image_url" name="image_url">
                    </div>
                </div>
            </div>
            <div class="text-center mt-3">
                <button type="submit" class="btn btn-primary" name="post">Post</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>