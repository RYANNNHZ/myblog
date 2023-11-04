<?php 

require "../function/koneksi.php";

$comment_id = $_GET['comment_id'];
$post_id = $_GET['post_id'];

mysqli_query($koneksi,"DELETE FROM `comments` WHERE `comment_id` = $comment_id");

header("location:../home/other_post.php?post_id=$post_id");


?>
