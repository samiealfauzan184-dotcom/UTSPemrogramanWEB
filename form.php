<?php
include 'koneksi.php';

$id = "";
$nama_produk = "";
$harga = "";
$stok = "";
$foto = "";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
    $data = mysqli_fetch_assoc($query);

    $nama_produk = $data['nama_produk'];
    $harga = $data['harga'];
    $stok = $data['stok'];
    $foto = $data['foto'];
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>
<?= $id ? 'Edit' : 'Tambah' ?> Produk
</h2>

<form action="simpan.php" method="POST" enctype="multipart/form-data" onsubmit="return validasi()">

    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="hidden" name="foto_lama" value="<?= $foto ?>">

    <p>Nama Produk</p>
    <input type="text" name="nama_produk" id="nama_produk"
    value="<?= $nama_produk ?>">

    <p>Harga</p>
    <input type="number" name="harga" id="harga"
    value="<?= $harga ?>">

    <p>Stok</p>
    <input type="number" name="stok" id="stok"
    value="<?= $stok ?>">

    <p>Foto</p>
    <input type="file" name="foto" id="foto">

    <br><br>

    <?php if($foto){ ?>
        <img src="uploads/<?= $foto ?>">
        <br><br>
    <?php } ?>

    <button type="submit">Simpan</button>

</form>

<script>
function validasi(){

    let nama = document.getElementById("nama_produk").value;
    let harga = document.getElementById("harga").value;
    let stok = document.getElementById("stok").value;
    let foto = document.getElementById("foto");

    if(nama == "" || harga == "" || stok == ""){
        alert("Semua field wajib diisi!");
        return false;
    }

    if(foto.files.length > 0){

        let file = foto.files[0];

        let ekstensi = ['image/jpeg', 'image/png', 'image/jpg'];

        if(!ekstensi.includes(file.type)){
            alert("File harus JPG atau PNG");
            return false;
        }

        if(file.size > 2 * 1024 * 1024){
            alert("Ukuran maksimal 2 MB");
            return false;
        }
    }

    return true;
}
</script>

</body>
</html>