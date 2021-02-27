<?php
session_start();
if (empty($_SESSION['username']) AND empty ($_SESSION['password'])) {
	header("location:../../index.php");
}

else{

	include "../../../config/koneksi.php";
	$module=$_GET[module];
	$act=$_GET['act'];

	//hapus memanggil file kategoridel.php
	if ($module=='produk' AND $act=='hapus'){
		mysqli_query($konek,"delete from produk where id_produk='$_GET[id]'");
		header('location:../../home.php?module='.$module);
	}

	//input memanggil file kategorisim.php
	elseif ($module=='produk' AND $act=='input') {
		mysqli_query($konek,"INSERT INTO produk values ('$_POST[id_produk]','$_POST[nm_kategori]','$_POST[nm_produk]','$_POST[deskripsi]','$_POST[gambar]','$_POST[ukuran]','$_POST[harga]','$_POST[stok]')");
		header('location:../../home.php?module='.$module);
	}

	//update memanggil file kategorieditsim.php
	elseif ($module=='produk' AND $act=='update') {
		mysqli_query($konek,"UPDATE  set id_produk='$_POST[id_produk]',id_kategori='$_POST[id_kategori]',nm_produk='$_POST[nm_produk]',deskripsi='$_POST[deskripsi]',gambar='$_POST[gambar]',ukuran='$_POST[ukuran]',harga='$_POST[harga]',stok='$_POST[stok]'
		where id_produk='$_POST[idh]'");
		header('location:../../home.php?module='.$module);
	}
 }
?>