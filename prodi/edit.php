<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require("../koneksi_db.php");

// Ambil data berdasarkan id
$prodi_id = $_GET['prodi_id'];

$query_prodi = "SELECT * FROM prodi WHERE prodi_id=$prodi_id";
$hasil_prodi = $koneksi->query($query_prodi);
$prodi = mysqli_fetch_assoc($hasil_prodi);

if (isset($_POST['simpan'])) {
    $prodi_id = $_POST['prodi_id'];
    $nama_prodi = $_POST['nama_prodi'];
    $nama_pendek = $_POST['nama_pendek'];

    $query_update = "UPDATE prodi SET nama_prodi='$nama_prodi', nama_pendek='$nama_pendek' WHERE prodi_id=$prodi_id";
    $simpan = $koneksi->query($query_update);

    if ($simpan) {
        echo "Data berhasil diedit";
    } else {
        echo "Gagal menambahkan data";
    }
}

$koneksi->close();
?>
<html>
    <head>
        <title>Jurnal Kelas</title>
        <link href="../style.css" rel="stylesheet">
    </head>
    <body>
        <h1>Aplikasi Jurnal Kelas</h1>
        <h3>Edit Program Studi</h3>
        <form action="" method="POST">
            <input type="hidden" name="prodi_id" value="<?php echo $prodi['prodi_id']; ?>">
            <p>
                <label>Nama Prodi</label>
                <input type="text" name="nama_prodi" value="<?php echo $prodi['nama_prodi']; ?>" required>
            </p>
            <p>
                <label>Nama Pendek</label>
                <input type="text" name="nama_pendek" value="<?php echo $prodi['nama_pendek']; ?>" required>
            </p>
            <p>
                <input type="submit" name="simpan" value="Simpan">
                <a href="/jurnal_kelas/prodi/tampil.php">
                    <button type="button">Kembali</button>
                </a>
            </p>
        </form>
    </body>
</html>