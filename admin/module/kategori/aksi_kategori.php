<?php
session_start();
if (empty($_SESSION['username']) AND empty ($_SESSION['passuser'])) {
	header("location:../../index.php");
}

else{

	include "../../../config/koneksi.php";
	$module=$_GET[module];
	$act=$_GET['act'];

	//hapus memanggil file kategoridel.php
	if ($module=='kategori' AND $act=='hapus'){
		mysqli_query($konek,"delete from kategori where username='$_GET[id]'");
		header('location:../../home.php?module='.$module);
	}

	//input memanggil file kategorisim.php
	elseif ($module=='kategori' AND $act=='input') {
		mysqli_query($konek,"INSERT INTO kategori values ('$_POST[id_kategori]','$_POST[nm_kategori]')");
		header('location:../../home.php?module='.$module);
	}

	//update memanggil file kategorieditsim.php
	elseif ($module=='kategori' AND $act=='update') {
		mysqli_query($konek,"UPDATE kategori set nm_kategori='$_POST[nm_kategori]'
		where id_kategori='$_POST[idh]'");
		header('location:../../home.php?module='.$module);
	}
 }
?>