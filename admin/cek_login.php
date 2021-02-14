<?php

// menangkap varibel dari form index.php
 $username = $_POST['username'];
 $password = $_POST['password'];



    $query = $konek->prepare("SELECT * FROM admin WHERE username=:user AND password=:pass");
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