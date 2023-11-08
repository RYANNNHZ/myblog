<?php
session_start();

require "../function/koneksi.php";
require "../function/fungsi.php";

if (!$_SESSION) {
  header("location:login.php");
} elseif ($_SESSION['username'] == 'ADMIN') {
  header("location:admin-page.php");
}




$datas = ambil_semua_data_post("SELECT * FROM `posts` JOIN `categories` ON posts.category_id = categories.category_id JOIN `users` ON posts.user_id = users.user_id");

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>menu</title>
  <style>
    .content-image {
      width: 100%;
      height: 370px;
      background-position: center;
      background-size: cover;
    }


    @media (max-width:760px) {
      .content-image {
        height: 270px;
      }
    }

    @media (max-width:573px) {
      .content-image {
        height: 420px;
      }
    }

    @media (max-width:540px) {
      .content-image {
        height: 400px;

      }
    }

    @media (max-width:350px) {
      .content-image {
        height: 300px;

      }
    }

    @media (max-width:280px) {
      .content-image {
        height: 200px;

      }
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <div class="container">



    <div class="collapse" id="navbarToggleExternalContent" data-bs-theme="dark">
      <div class="bg-dark p-4">

        <h5 class="text-body-secondary"><a href="./user-dashbord.php" style="text-decoration: none;">profile</a></h5><br>
        <h5 class="text-body-secondary"><a href="./post.php" style="text-decoration: none;">post</a></h5><br>
        <h5 class="text-body-secondary"><a href="./category.php" style="text-decoration: none;">category</a></h5><br>
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
    </nav>

    <div class="row d-flex">
      <?php foreach ($datas as $data) : ?>
        <div class="col-lg-4 col-sm-6 mb-4">
          <div class="card h-100">
            <!-- <img class="card-img-top rounded" src="../img/<?= $data['image_url'] ?>" alt=""> -->
            <a href="./other_post.php?post_id=<?= $data['post_id'] ?>">
              <div class="content-image" style="background-image: url('../img/<?= $data['image_url'] ?>');"></div>
            </a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="other_post.php?post_id=<?= $data['post_id'] ?>&user_id=<?= $data['user_id'] ?>" style="text-decoration: none;"><?= $data['title'] ?></a>
              </h4>
              <img src="../pic/<?= $data['foto_profile'] ?>" width="40px" alt="..." class="img-thumbnail">
              <p style="display:inline;"><a style="text-decoration: none; color:black;" href="../home/other_profile.php?id=<?= $data['user_id'] ?>"><b><?= $data['username'] ?></b></a></p>
              <p style="display:inline;">|<?= $data['name'] ?>|</p>
              <p class="card-text"><?= $data['content'] ?></p>

            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>


  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function posting() {
      Swal.fire({
        position: "top-end",
        icon: "success",
        title: "berhasil posting",
        showConfirmButton: false,
        timer: 1500
      });
    }

    function regis() {
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "success",
        title: "Signed in successfully"
      });
    }

    function login() {
      const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: "success",
        title: "log in successfully"
      });
    }

    <?php if (isset($_GET['validasi'])) : ?>
      posting()
    <?php endif; ?>

    <?php if (isset($_GET['regis'])) : ?>
      regis()
    <?php endif; ?>

    <?php if (isset($_GET['login'])) : ?>
      login()
    <?php endif; ?>
  </script>
</body>

</html>