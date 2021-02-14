<?php
    $host = 'localhost';
    $user ='root';
    $pass = '';
    $db   ='kelompok1';
    $konek = mysqli_connect("$host","$user","$pass","$db");
    if($konek)
        {
        echo ('koneksi sukses');
        } else {
        echo ('koneksi gagal');
        }

?>