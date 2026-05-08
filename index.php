<?php
include 'koneksi.php';

$data = mysqli_query($conn, "SELECT * FROM produk");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Data Produk</h2>

<a href="form.php" class="tambah">+ Tambah Produk</a>

<br><br>

<table>
    <tr>
        <th>No</th>
        <th>Foto</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    while($row = mysqli_fetch_assoc($data)){
    ?>
    <tr>
        <td><?= $no++ ?></td>

        <td>
            <img src="uploads/<?= $row['foto'] ?>">
        </td>

        <td><?= $row['nama_produk'] ?></td>

        <td>Rp <?= number_format($row['harga']) ?></td>

        <td><?= $row['stok'] ?></td>

        <td>
            <a href="form.php?id=<?= $row['id'] ?>" class="edit">Edit</a>

            <a href="hapus.php?id=<?= $row['id'] ?>"
            class="hapus"
            onclick="return confirm('Yakin hapus data?')">
            Hapus
            </a>
        </td>
    </tr>
    <?php } ?>

</table>

</body>
</html>