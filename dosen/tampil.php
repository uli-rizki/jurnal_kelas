<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require("../koneksi_db.php");

$query = "SELECT dosen.*, prodi.nama_prodi FROM dosen
        JOIN prodi ON dosen.prodi_id=prodi.prodi_id
        ";
$hasil = $koneksi->query($query);
$koneksi->close();
?>
<html>
    <head>
        <title>Jurnal Kelas</title>
        <link href="../style.css" rel="stylesheet">
    </head>
    <body>
        <h1>Aplikasi Jurnal Kelas</h1>
        <h3>Data Dosen</h3>
        <div class="add-button">
        <a href="/jurnal_kelas/dosen/tambah.php">
            <button>Tambah Data</button>
        </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Prodi</th>
                    <th>Aktif</th>
                    <th class="action-colum">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_array($hasil)) { ?>
                <tr>
                    <td><?php echo $row['dosen_id']; ?></td>
                    <td><?php echo $row['nama_lengkap']; ?></td>
                    <td><?php echo $row['jenis_kelamin']; ?></td>
                    <td><?php echo $row['nama_prodi']; ?></td>
                    <td><?php 
                        if($row['aktif'] == 1) {
                            echo "Ya";
                        } else {
                            echo "Tidak";
                        }
                        ?>
                    </td>
                    <td class="action-column">
                    </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </body>
</html>