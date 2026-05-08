<?php
include 'koneksi.php';

$id = $_POST['id'];
$nama_produk = $_POST['nama_produk'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$foto_lama = $_POST['foto_lama'];

$namaFoto = $foto_lama;

if($_FILES['foto']['name'] != ""){

    $file = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];

    $ext = pathinfo($file, PATHINFO_EXTENSION);

    $namaFoto = time() . '.' . $ext;

    move_uploaded_file($tmp, 'uploads/' . $namaFoto);
}

if($id == ""){

    mysqli_query($conn, "INSERT INTO produk
    VALUES (
    NULL,
    '$nama_produk',
    '$harga',
    '$stok',
    '$namaFoto'
    )");

    echo "
    <script>
    alert('Data berhasil ditambah');
    window.location='index.php';
    </script>
    ";

}else{

    mysqli_query($conn, "UPDATE produk SET
    nama_produk='$nama_produk',
    harga='$harga',
    stok='$stok',
    foto='$namaFoto'
    WHERE id='$id'
    ");

    echo "
    <script>
    alert('Data berhasil diupdate');
    window.location='index.php';
    </script>
    ";
}
?>