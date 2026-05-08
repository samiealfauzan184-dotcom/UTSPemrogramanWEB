<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn, "SELECT * FROM produk WHERE id='$id'");
$row = mysqli_fetch_assoc($data);

unlink("uploads/" . $row['foto']);

mysqli_query($conn, "DELETE FROM produk WHERE id='$id'");

echo "
<script>
alert('Data berhasil dihapus');
window.location='index.php';
</script>
";
?>