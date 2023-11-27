<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require("../koneksi_db.php");

$query = "SELECT absen.*, mahasiswa.nama_lengkap as nama_mahasiswa, dosen.nama_lengkap as nama_dosen 
            FROM absen
            JOIN mahasiswa ON absen.mahasiswa_id=mahasiswa.mahasiswa_id
            JOIN dosen ON absen.dosen_id=dosen.dosen_id";
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
        <h3>Data Absen</h3>
        <div class="add-button">
        <a href="/jurnal_kelas/absen/tambah.php">
            <button>Tambah Data</button>
        </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Mahasiswa</th>
                    <th>Dosen</th>
                    <th>Keterangan</th>
                    <th class="action-colum">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($hasil)) { ?>
                <tr>
                    <td></td>
                    <td><?php echo $row['tanggal']; ?></td>
                    <td><?php echo $row['nama_mahasiswa']; ?></td>
                    <td><?php echo $row['nama_dosen']; ?></td>
                    <td><?php echo $row['keterangan']; ?></td>
                    <td class="action-column">
                        <a href="/jurnal_kelas/absen/edit.php?absen_id=<?php echo $row['absen_id']; ?>">
                            <button>Edit</button>
                        </a>
                        <button class="delete-button" onclick="hapus_data(<?php echo $row['absen_id']; ?>)">Hapus</button>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </body>
    <script>
        function hapus_data(prodi_id){
            var hapus = confirm("Apakah anda yakin menghapus data ini ?");
            if(hapus) {
                var hapus_data_db = <?php hapus?>
            }
        }
    </script>
</html>