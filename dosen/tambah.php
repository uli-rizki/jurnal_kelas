<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require("../koneksi_db.php");

$query_prodi = "SELECT * FROM prodi";
$prodi = $koneksi->query($query_prodi);

if (isset($_POST['simpan'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $prodi_id = $_POST['prodi_id'];
    $status = $_POST['aktif'];

    $query = "INSERT INTO dosen (nama_lengkap, jenis_kelamin, prodi_id, aktif) VALUES ('$nama_lengkap', '$jenis_kelamin', '$prodi_id', '$status')";
    $simpan = $koneksi->query($query);

    if ($simpan) {
        echo "Data berhasil ditambahkan";
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
        <h3>Tambah Dosen</h3>
        <form action="" method="POST">
            <p>
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" required>
            </p>
            <p>
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" required>
                    <option value="">-- Pilih --</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </p>
            <p>
                <label>Program Studi</label>
                <select name="prodi_id" required>
                    <option value="">-- Pilih --</option>
                    <?php while($row = mysqli_fetch_array($prodi)) { ?>
                        <option value="<?php echo $row['prodi_id']; ?>"><?php echo $row['nama_prodi']; ?></option>
                    <?php } ?>
                </select>
            </p>
            <p>
                <label>Status</label>
                <select name="aktif" required>
                    <option value="">-- Pilih --</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </p>
            <p>
                <input type="submit" name="simpan" value="Simpan">
                <a href="/jurnal_kelas/dosen/tampil.php">
                    <button type="button">Kembali</button>
                </a>
            </p>
        </form>
    </body>
</html>