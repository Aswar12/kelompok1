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
	if ($module=='keranjang' AND $act=='hapus'){
		mysqli_query($konek,"delete from keranjang where id_keranjang='$_GET[id]'");
		header('location:../../home.php?module='.$module);
	}

	//input memanggil file kategorisim.php
	elseif ($module=='keranjang' AND $act=='input') {
		mysqli_query($konek,"INSERT INTO keranjang values ('$_POST[id_keranjang]','$_POST[id_produk]','$_POST[nm_produk]','$_POST[harga]','$_POST[jumlah]','$_POST[tgl_keranjang]')");
		header('location:../../home.php?module='.$module);
	}

	//update memanggil file kategorieditsim.php
	elseif ($module=='keranjang' AND $act=='update') {
		mysqli_query($konek,"UPDATE  set id_keranjang='$_POST[id_keranjang]',id_produk='$_POST[id_produk]',nm_produk='$_POST[nm_produk]',jumlah='$_POST[jumlah]',tgl_keranjang='$_POST[tgl_keranjang]'
		where id_keranjang='$_POST[idh]'");
		header('location:../../home.php?module='.$module);
	}
 }
?>