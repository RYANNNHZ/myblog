<?php 
require "../function/koneksi.php";
require "../function/koneksi.php";

if (isset($_POST['pict'])) {
  $user_id = $_POST['user_id'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $role = $_POST['role'];
  $image_url = $_FILES['image_url'];
  $isAktif = $_POST['isAktif'];

if (isset($_FILES["image_url"])) {
    $nama_file = $_FILES["image_url"]["name"];
    $ukuran_file = $_FILES["image_url"]["size"];
    $tipe_file = $_FILES["image_url"]["type"];
    $lokasi_file = "../pic/" . $nama_file;

    //Pindahkan file ke lokasi yang diinginkan
    if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $lokasi_file)) {
        // Simpan informasi file ke database
        $sql = "UPDATE `users` SET `user_id`='$user_id',`username`='$username',`email`='$email',`password`='$password',`role`='$role',`foto_profile`='$nama_file',`isAktif`='$isAktif' WHERE `user_id` = $user_id";

        if (mysqli_query($koneksi, $sql)) {
            echo "File berhasil diunggah dan informasinya disimpan.";
        } else {
            echo "Terjadi kesalahan dalam penyimpanan informasi file: " . mysqli_error($koneksi);
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}
header("location:../home/user-dashbord.php");
}
?>