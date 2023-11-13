<?php 
$servername = "localhost";
$username = "uli";
$password = "@Homedata123";
$database = "jurnal_kelas";

$koneksi = new mysqli($servername, $username, $password, $database);

if ($koneksi->connect_errno) {
    die("Koneksi Error ".$koneksi->connect_error);
}

?>