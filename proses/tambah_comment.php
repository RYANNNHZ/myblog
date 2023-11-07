<?php 


require "../function/koneksi.php";
require "../function/fungsi.php";

if (isset($_POST['submit'])) {

// $comment_id = crc32();
$post_id = $_POST['post_id'];
$comment_id = rand(0,1000) * rand(0,1000);
    tambah_komen($_POST,$comment_id);
    header("location:../home/other_post.php?post_id=$post_id#comment");
    
}

?>