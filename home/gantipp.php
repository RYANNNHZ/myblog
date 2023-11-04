<?php 
require "../function/fungsi.php";
require "../function/koneksi.php";

$user_id = $_GET['id'];

$users = ambil_semua_data_users("SELECT * FROM `users` WHERE `user_id` = $user_id");



?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <h1>ganti pp</h1>
    <form action="../proses/uppp.php" method="post" enctype="multipart/form-data">
      <input type="hidden" name="user_id" value="<?= $users['user_id'] ?>">
      <input type="hidden" name="username" value="<?= $users['username'] ?>">
      <input type="hidden" name="email" value="<?= $users['email'] ?>">
      <input type="hidden" name="password" value="<?= $users['password'] ?>">
      <input type="hidden" name="role" value="member">
      <input  type="file" class="form-control" id="image_url" name="image_url">
      <input type="hidden" name="isAktif" value="<?= $users['isAktif'] ?>">
  <input type="submit" name="pict" value="pict">
  </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>