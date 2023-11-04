<?php
require "../function/koneksi.php";
require "../function/fungsi.php";

echo $_POST['username'];
echo $_POST['password'];

$cari_user_id = mysqli_query($koneksi, "SELECT * FROM `users` WHERE `password` = '$_POST[password]'");
$tampil_name = mysqli_fetch_assoc($cari_user_id);


if (isset($_POST['post'])) {
    $post_id = rand(0, 1000) * rand(0, 1000);
    $created_at = date("Y-m-d", time());
    //==================================//
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $user_id = htmlspecialchars($tampil_name['user_id']);
    $category_id = htmlspecialchars($_POST['category']);
    $image_url = $_FILES['image_url'];

if (isset($_FILES["image_url"])) {
    $nama_file = $_FILES["image_url"]["name"];
    $ukuran_file = $_FILES["image_url"]["size"];
    $tipe_file = $_FILES["image_url"]["type"];
    $lokasi_file = "../img/" . $nama_file;

    // Pindahkan file ke lokasi yang diinginkan
    if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $lokasi_file)) {
        // Simpan informasi file ke database
        $sql = "INSERT INTO `posts`(`post_id`, `title`, `content`, `user_id`, `category_id`, `image_url`, `created_at`, `update_at`) VALUES ('$post_id','$title','$content','$user_id','$category_id','$nama_file','$created_at','$created_at')";
        if (mysqli_query($koneksi, $sql)) {
            echo "File berhasil diunggah dan informasinya disimpan.";
        } else {
            echo "Terjadi kesalahan dalam penyimpanan informasi file: " . mysqli_error($koneksi);
        }
    } else {
        echo "Gagal mengunggah file.";
    }
}
header("location:../home/menu.php");
}