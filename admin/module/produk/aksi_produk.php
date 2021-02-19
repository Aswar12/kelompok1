<?php
session_start();
if (empty($_SESSION['username']) AND empty ($_SESSION['passuser'])) {
	header("location:../../index.php");
}

else{

	include "../../../config/koneksi.php";
	$module=$_GET[module];
	$act=$_GET[act];

	//hapus memanggil file produkdel.php
	if ($module=='produk' AND $act=='hapus'){
		mysqli_query($konek,"delete from produk where username='$_GET[id]'");
		header('location:../../home.php?module='.$module);
	}

	//input memanggil file produksim.php
	elseif ($module=='produk' AND $act=='input') {
		mysqli_query($konek,"INSERT INTO produk values ('$_POST[]','$_POST[password]','$_POST[nm_lengkap]')");
		header('location:../../home.php?module='.$module);
	}

	//update memanggil file produkeditsim.php
	elseif ($module=='produk' AND $act=='update') {
		mysqli_query($konek,"UPDATE produk set password='$_POST[password]',nm_lengkap='$_POST[nm_lengkap]'
		where username='$_POST[idh]'");
		header('location:../../home.php?module='.$module);
	}
 }
?>