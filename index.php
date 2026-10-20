<?php
 require "function.php";
 $mahasiswa = query_db("SELECT * FROM mahasiswa");
//  var_dump($mahasiswa);
// jika tombol cari ditekan
    if (isset($_POST["cari"])) {
        $keyword = $_POST["keyword"];
        $mahasiswa = cari_data($keyword);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="page-index">
    <div class="container">
    <h3 style="text-align: center">Daftar Mahasiswa UPI PWK</h3>

    <div class="top-bar">

    <!-- Searching -->
            <form action="" method="post" class="search-box">
                <input type="text" name="keyword" placeholder="Cari mahasiswa...">
                <button type="submit" name="cari" class="btn btn-cari">Cari</button>
            </form>


        <!-- Untuk tombol tambah data -->
        <a href="tambah_data.php" class="btn btn-tambah">+Tambah Data</a>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1; ?>
            <?php foreach ($mahasiswa as $data): ?>
            <tr>
                <td><?= $nomor; ?></td>
                <td><?= $data["id"]; ?></td>
                <td><?= $data["nim"]; ?></td>
                <td><?= $data["nama"]; ?></td>
                <td><?= $data["email"]; ?></td>
                <td><?= $data["jurusan"]; ?></td>
                <td><?= $data["gambar"]; ?></td>
                <td>
                    <a  href="edit_data.php?id=<?php echo $data["id"];?>" class="btn btn-ubah">Ubah</a>
                    <a href="hapus_data.php?id=<?php echo $data["id"];?>" class="btn btn-hapus">Hapus</a>    
                </td>  
            </tr>
            <?php $nomor++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
</body>
</html>