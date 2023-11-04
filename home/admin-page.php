<?php
require "../function/koneksi.php";
require "../function/fungsi.php";

if (isset($_POST['submit'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];

    $query = "INSERT INTO `categories`(`category_id`, `name`) VALUES ('$category_id','$name')";
    mysqli_query($koneksi, $query);

    if (mysqli_affected_rows($koneksi) > 0) {
        header("Location: admin-page.php");
    } else {
        echo "Gagal menambahkan kategori";
    }
}

$categories = ambil_semua_data_post("SELECT * FROM `categories`");
$users = ambil_semua_data_post("SELECT * FROM `users`");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambahkan Kategori</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Tambahkan Kategori</h1>

        <form action="" method="post">
            <div class="mb-3">
                <label for="category_id" class="form-label">ID Kategori</label>
                <input type="text" class="form-control" id="category_id" name="category_id">
            </div>

            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <button type="submit" class="btn btn-primary" name="submit">Tambah</button>
        </form>
    </div>

    <div class="container broder">

        <div class="row border">
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 border">
                <table class="table overflow-visible">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Age</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $categori) : ?>
                            <tr>
                                <td><?= $categori['category_id'] ?></td>
                                <td><?= $categori['name'] ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 border">

                <div class="overflow-y-scroll">
                    <table class="table overflow-y-scroll">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>user</th>
                                <th>status</th>
                                <th>option</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?= $user['user_id'] ?></td>
                                    <td><?= $user['username'] ?></td>
                                    <td><?php if ($user['isAktif'] == "1") {
                                            echo "aktif";
                                        } elseif ($user['isAktif'] == "0") {
                                            echo "nonaktif";
                                        }
                                        ?></td>
                                        <td>
                                            
                                            <a class="btn btn-danger" href="../proses/nonaktif.php?id=<?= $user['user_id'] ?>" role="button">nonaktif</a>
                                            
                                            <a class="btn btn-primary" href="../proses/aktif.php?id=<?= $user['user_id'] ?>" role="button">aktif</a>
                                            
                                            
                                        </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    </div>


    <a class="btn btn-default bg-primary " style="color: white;" href="../function/logout.php" role="button">logout</a>


</body>

</html>