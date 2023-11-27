<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require("../koneksi_db.php");

$query_mhs = "SELECT * FROM mahasiswa";
$mahasiswa = $koneksi->query($query_mhs);

$query_dosen = "SELECT * FROM dosen";
$dosen = $koneksi->query($query_dosen);

if (isset($_POST['simpan'])) {
    $tanggal = $_POST['tanggal'];
    $mahasiswa_id = $_POST['mahasiswa_id'];
    $dosen_id = $_POST['dosen_id'];
    $keterangan = $_POST['keterangan'];

    $query = "INSERT INTO absen(tanggal,mahasiswa_id,dosen_id,keterangan) VALUES ('$tanggal', '$mahasiswa_id', '$dosen_id', '$keterangan')";
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
        <h3>Tambah Absen</h3>
        <form action="" method="POST">
            <p>
                <label>Tanggal</label>
                <input type="date" name="tanggal" required>
            </p>
            <p>
                <label>Mahasiswa</label>
                <select name="mahasiswa_id" required>
                    <option value="">-- Pilih --</option>
                    <?php while($mhs = mysqli_fetch_array($mahasiswa)) { ?>
                        <option value="<?php echo $mhs['mahasiswa_id']; ?>"><?php echo $mhs['nama_lengkap']; ?></option>
                    <?php } ?>
                </select>
            </p>
            <p>
                <label>Dosen</label>
                <select name="dosen_id" required>
                    <option value="">-- Pilih --</option>
                    <?php while($row = mysqli_fetch_array($dosen)) { ?>
                        <option value="<?php echo $row['dosen_id']; ?>"><?php echo $row['nama_lengkap']; ?></option>
                    <?php } ?>
                </select>
            </p>
            <p>
                <label>Keterangan</label>
                <select name="keterangan" required>
                    <option value="">-- Pilih --</option>
                    <option value="hadir">Hadir</option>
                    <option value="izin">Izin</option>
                    <option value="alpa">Alpa</option>
                </select>
            </p>
            <p>
                <input type="submit" name="simpan" value="Simpan">
                <a href="/jurnal_kelas/absen/tampil.php">
                    <button type="button">Kembali</button>
                </a>
            </p>
        </form>
    </body>
</html>