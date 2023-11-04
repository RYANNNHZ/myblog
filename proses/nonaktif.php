<?php 
require "../function/koneksi.php";
require "../function/koneksi.php";

$id = $_GET['id'];
echo $id;
$query = mysqli_query($koneksi,"SELECT * FROM `users` WHERE `user_id` = '$id'");
$data = mysqli_fetch_assoc($query);

$username = $data['username'];
$email = $data['email'];
$password = $data['password'];
$role = $data['role'];


mysqli_query($koneksi,"UPDATE `users` SET `user_id`='$id',`username`='$username',`email`='$email',`password`='$password',`role`='$role',`isAktif`='0' WHERE `user_id` = $id");

header("location:../home/admin-page.php");
?>
