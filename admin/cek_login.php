<?php

// membuat koneksi ke database
 try {
    $koneksi = new PDO("mysql:host=localhost; port=3306; dbname=kelompok1", "root", "");
    $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // print("Berhasil cukk");
} catch (PDOexception $e) {
    print ("koneksi bermasalah ".$e->getMessage());
}

// menangkap varibel dari form index.php
 $username = $_POST['username'];
 $password = $_POST['password'];


    $query = $koneksi->prepare("SELECT * FROM admin WHERE username=:user AND password=:pass");
    $query->execute([':user'=>$username, ':pass'=>$password]);

    $row = $query->fetch();
    // print_r($row);
    // die();
    if ($row) {
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['status'] = 'login';
        header("location:home.php");
    }else{
        header("location:index.php");
    }




?>