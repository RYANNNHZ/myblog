<?php
session_start();
require "../function/koneksi.php";
require "../function/fungsi.php";
$query = mysqli_query($koneksi, "SELECT * FROM `categories`");

if (!$_SESSION) {
    header("location:login.php");
} elseif ($_SESSION['username'] == 'ADMIN') {
    header("location:admin-page.php");
}

$posts = ambil_semua_data_post("SELECT * FROM `posts` INNER JOIN `categories` ON posts.category_id = categories.category_id INNER JOIN `users` ON posts.user_id = users.user_id");


if (isset($_POST['pilih'])) {
    $id = $_POST['category'];
    $sql = "SELECT * FROM posts INNER JOIN categories ON posts.category_id = categories.category_id INNER JOIN `users` ON posts.user_id = users.user_id WHERE categories.category_id = $id";
    $posts = $koneksi->query($sql);

    // $data = mysqli_query($koneksi,"SELECT * FROM `posts` INNER JOIN `categories` ON posts.category_id = categories.category_id INNER JOIN `users` ON posts.user_id = users.user_id WHERE `category_id` = '$id'");
    // $posts = mysqli_fetch_assoc($data);
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>menu</title>
    <link rel="shortcut icon" href="../image/favicion (2).png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
    
    .content-image{
      width: 100%;
      height: 370px;
      background-position: center;
      background-size: cover;
    }


    @media (max-width:760px){
      .content-image{
        height: 270px;
      }
    }
    @media (max-width:573px){
      .content-image{
        height: 420px;
      }
    }
    @media (max-width:540px){
      .content-image{
        height: 400px;

      }
    }
    @media (max-width:350px){
      .content-image{
        height: 300px;

      }
    }
    @media (max-width:280px){
      .content-image{
        height: 200px;

      }
    }
  </style>
</head>

<body>

    <div class="container">



        <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
            <div class="bg-dark p-4">

                <h5 class="text-body-secondary"><a href="./user-dashbord.php" style="text-decoration: none;">profile</a></h5><br>
                <h5 class="text-body-secondary"><a href="./post.php" style="text-decoration: none;">post</a></h5><br>
                <h5 class="text-body-secondary"><a href="./menu.php" style="text-decoration: none;">menu</a></h5><br>
                <h5 class="text-body-secondary"><a href="../function/logout.php" style="text-decoration: none;">logout</a></h5>
            </div>
        </div>
        <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <img src="../image/favicion (2).png" style="width:50px;" alt="">

            </div>
            <form action="" method="post">
                <div class="wraper-category d-flex w-100 m-2">
                    <select class="form-select" aria-label="Default select example" name="category">
                        <option selected>pilih category</option>
                        <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                            <option value="<?= $data['category_id'] ?>"><?= $data['name'] ?></option>
                        <?php endwhile; ?>
                    </select>

                    <button type="submit" style="border: 1px solid white;"  class="btn btn-primary m-1" name="pilih">pilih</button>


                    <!-- <a href="" style="border: 1px solid white;" role="button" type="submit" class="btn btn-primary m-1" name="pilih">pilih</a> -->
            </form>
    </div>
    </nav>

    <div class="row">
        <?php foreach ($posts as $post) : ?>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card h-100">
                    <a href="./other_post.php?post_id=<?= $post['post_id'] ?>"><div class="content-image" style="background-image: url('../img/<?= $post['image_url'] ?>');" ></div></a>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a href="other_post.php?post_id=<?= $post['post_id'] ?>&user_id=<?= $post['user_id'] ?>" style="text-decoration: none;"><?= $post['title'] ?></a>
                        </h4>
                        <img src="../pic/<?= $post['foto_profile'] ?>" width="40px" alt="..." class="img-thumbnail">
                        <p style="display:inline;"><a style="text-decoration: none; color:black;" href="../home/other_profile.php?id=<?= $post['user_id'] ?>"><b><?= $post['username'] ?></b></a></p
                        <p style="display:inline;">|<?= $post['name'] ?>|</p>
                        <p class="card-text"><?= $post['content'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
