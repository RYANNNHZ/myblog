<?php

include "koneksi.php";


function tambah_data_register_user($data){
    global $koneksi;
    mysqli_query($koneksi, $data);
    
}

function tambah_data_login_user($data){
    global $koneksi;
    mysqli_query($koneksi,$data);
}

function ambil_semua_data_users($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = mysqli_fetch_assoc($result);
    
    return $rows;
}

function ambil_satu_data_post($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = mysqli_fetch_assoc($result);
    
    return $rows;
}


function posting_content($data){
    global $koneksi;
    mysqli_query($koneksi,$data);
    header("location:./menu.php");

}

function ambil_semua_data_post($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
function take_post($query){
    global $koneksi;
    $result = mysqli_query($koneksi,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function ubah_data_post($data){
    global $koneksi;
    
    $post_id = $data["post_id"];
    $title = $data["title"];
    $content = $data["content"];
    $user_id = $data["user_id"];
    $category_id = $data["category"];
    $image_url = $data["image_url"];
    $created_at = $data["created_at"];
    $update_at = $data["update_at"];

    mysqli_query($koneksi,"UPDATE `posts` SET `post_id`='$post_id',`title`='$title',`content`='$content',`user_id`='$user_id',`category_id`='$category_id',`image_url`='$image_url',`created_at`='$created_at',`update_at`='$update_at' WHERE `post_id` = $post_id");

    header("location:../home/user-dashbord.php");
}


function tambah_komen($data,$comment_id){
    global $koneksi;

// $uniqueString = uniqid();
// $comment_id = crc32($uniqueString);
$created_at = date("Y-m-d", time());

    
    $post_id = $data['post_id'];
    $user_id = $data['user_id'];
    $content = $data['content'];
    // echo $comment_id;
    // die();

    mysqli_query($koneksi,"INSERT INTO `comments`(`comment_id`, `post_id`, `user_id`, `content`, `created_at`, `update_at`) VALUES ('$comment_id','$post_id','$user_id','$content','$created_at','$created_at')");

    
}

function generateRandomNumbers(int $numberOfTerms): array
{
    $randomNumbers = [];

    // Seed the random number generator with the current time.
    mt_srand(microtime(true));

    // Generate 36 random numbers.
    for ($i = 0; $i < $numberOfTerms; $i++) {
        $randomNumbers[] = sprintf("%09d", mt_rand());
    }

    return $randomNumbers;
}



function ubah_data_user($data){
    global $koneksi;
    mysqli_query($koneksi,$data);
    header("location:");
}
