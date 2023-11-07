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
        <img src="../image/favicion-removebg-preview.png" style="width:50px;" alt="">
        </div>
      </nav>
    
    <div class="row d-flex justify-content-center">
        <?php foreach($datas as $data): ?>
      <div class="col-lg-4 col-sm-6 mb-4">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="../img/<?= $data['image_url'] ?>" alt=""></a>
          <div class="card-body">
              <h4 class="card-title">
                <a href="other_post.php?post_id=<?= $data['post_id'] ?>&user_id=<?= $data['user_id'] ?>" style="text-decoration: none;"><?= $data['title'] ?></a>
              </h4>
              <img src="../pic/<?= $data['foto_profile'] ?>" width="40px" alt="..." class="img-thumbnail">
              <p style="display:inline;"><b><?= $data['username']?></b></p><p style="display:inline;">|<?= $data['name'] ?>|</p>
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
        
        <?php if(isset($_GET['validasi'])): ?>
          posting()
        <?php endif; ?>
    </script>
</body>
</html>




<!-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    body {
        padding: 0 150px;
    }
</style>

<body>
    <nav class="navbar navbar-default navbar-fixed-top p-e-2 justify-content-between" role="navigation">
        <a class="navbar-brand" href="#"><img src="../image/favicion-removebg-preview.png" width="50" alt=""></a>
        <div class="dropdown">
            <a class="btn btn-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                </svg>
            </a>

            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="./user-dashbord.php">profile</a></li>
                <li><a class="dropdown-item" href="../function/logout.php">logout</a></li>
                <li><a class="dropdown-item bg-primary text-light" href="./post.php">post</a></li>
                <li><a class="dropdown-item" href="./category.php">category</a></li>
            </ul>
        </div>

    </nav>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 d-flex">
        <?php foreach ($datas as $data) : ?>
            <div class="card" style="width: 18rem;">
                <img src="../img/<?= $data['image_url'] ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><?= $data['title'] ?>(<?= $data['username'] ?>)</h5>
                    <p class="card-text"><?= $data['content'] ?></p>
                    <p class="card-text">|<?= $data['name'] ?>|</p>
                    <a href="other_post.php?post_id=<?= $data['post_id'] ?>&user_id=<?= $data['user_id'] ?>"" class=" btn btn-primary">Go somewhere</a>

                </div>
            </div>
        <?php endforeach; ?>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html> -->