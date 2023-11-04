<?php
require "../function/koneksi.php";
require "../function/fungsi.php";

session_start();
echo $_SESSION['username'];
$id = $_GET['id'];


$query = mysqli_query($koneksi, "SELECT * FROM `categories`");

$tampil = ambil_semua_data_post("SELECT * FROM `posts` WHERE `post_id` = $id ");

//untuk mencari username dari user dengan sesion
$_SESSION["password"];
$cari_user_id = mysqli_query($koneksi, "SELECT * FROM `users` WHERE `password` = '$_SESSION[password]'");
$tampil_name = mysqli_fetch_assoc($cari_user_id);
if(isset($_POST['post'])){
    
    ubah_data_post($_POST);
    
}

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
<form action="" method="post">

<table>
    <tr>
        <input type="hidden" name="post_id" value="<?= $tampil[0]['post_id'] ?>">
    </tr>
    <tr>
        <td>title</td>
        <td><input type="text" name="title" value="<?= $tampil[0]['title'] ?>"></td>
    </tr>
    <tr>
        <td>content</td>
        <td><input type="text" name="content" value="<?= $tampil[0]['content'] ?>"></td>
    </tr>
    <tr>
        <input type="hidden" name="user_id" value="<?= $tampil[0]['user_id'] ?>">
    </tr>
    <tr>
        <td>kategori</td>
        <td>
            <select name="category" id="">
                <?php while ($data = mysqli_fetch_assoc($query)) : ?>
                    <option value="<?= $data['category_id'] ?>"><?= $data['name'] ?></option>
                <?php endwhile; ?>
            </select>
        </td>
    </tr>
    <tr>
        <td><input type="hidden" name="image_url" value="<?= $tampil[0]['image_url'] ?>"></td>
    </tr>
    <tr><input type="hidden" name="created_at" value="<?= $tampil[0]['created_at'] ?>"></tr>
    <tr><input type="hidden" name="update_at" value="<?= date("Y-m-d", time()) ?>" ></tr>
    <tr>
        <td><input type="submit" value="post" name="post"></td>
    </tr>
</table>
</form>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>