<?php
require "koneksi.php";
$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM `posts` WHERE `post_id` = $id");

header("location:../home/user-dashbord.php?validasi=berhasil");
