<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require("../koneksi_db.php");

$query = "SELECT * FROM prodi";
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
        <h3>Data Program Studi</h3>
        <div class="add-button">
        <a href="/jurnal_kelas/prodi/tambah.php">
            <button>Tambah Data</button>
        </a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Prodi</th>
                    <th>Nama Pendek</th>
                    <th class="action-colum">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_array($hasil)) { ?>
                <tr>
                    <td><?php echo $row['prodi_id']; ?></td>
                    <td><?php echo $row['nama_prodi']; ?></td>
                    <td><?php echo $row['nama_pendek']; ?></td>
                    <td class="action-column">
                        <a href="/jurnal_kelas/prodi/edit.php?prodi_id=<?php echo $row['prodi_id']; ?>">
                            <button>Edit</button>
                        </a>
                        <button class="delete-button" onclick="hapus_data(<?php echo $row['prodi_id']; ?>)">Hapus</button>
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