<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require("../koneksi_db.php");

if (isset($_POST['simpan'])) {
    $nama_prodi = $_POST['nama_prodi'];
    $nama_pendek = $_POST['nama_pendek'];

    $query = "INSERT INTO prodi (nama_prodi, nama_pendek) VALUES ('$nama_prodi', '$nama_pendek')";
    $simpan = $koneksi->query($query);
    $koneksi->close();

    if ($simpan) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Gagal menambahkan data";
    }
}
?>
<html>
    <head>
        <title>Jurnal Kelas</title>
        <link href="../style.css" rel="stylesheet">
    </head>
    <body>
        <h1>Aplikasi Jurnal Kelas</h1>
        <h3>Tambah Program Studi</h3>
        <form action="" method="POST">
            <p>
                <label>Nama Prodi</label>
                <input type="text" name="nama_prodi" required>
            </p>
            <p>
                <label>Nama Pendek</label>
                <input type="text" name="nama_pendek" required>
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