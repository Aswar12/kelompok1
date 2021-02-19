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
		mysqli_query($konek,"INSERT INTO produk values ('$_POST[id_produk]','$_POST[id_kategori]','$_POST[nm_produk]'),'$_POST[deksripsi]'),'$_POST[gambar]'),'$_POST[ukuran]'),'$_POST[ukuran_sepatu]'),'$_POST[harga]'),'$_POST[stok]'),'$_POST[nm_kategori]')");
		header('location:../../home.php?module='.$module);
	}

	//update memanggil file produkeditsim.php
	elseif ($module=='produk' AND $act=='update') {
		mysqli_query($konek,"UPDATE berita SET id_produk='$_POST[id_produk]',id_kategori='$_POST[id_kategori]', nm_produk= '$_POST[nm_produk]',deskripsi='$_POST[deksripsi]',gambar='$_POST[gambar]',ukuran='$_POST[ukuran]',ukuran_sepatu='$_POST[ukuran_sepatu]',harga='$_POST[harga]',stok='$_POST[stok]',nm_kategori='$_POST[nm_kategori]' where id_produk= '$_POST[id]'");
		header('location:../../home.php?module='.$module);
	}
?>