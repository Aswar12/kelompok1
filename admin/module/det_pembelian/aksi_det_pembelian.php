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
	if ($module=='det_pembelian' AND $act=='hapus'){
		mysqli_query($konek,"delete from det_pembelian where id_detpembelian='$_GET[id]'");
		header('location:../../home.php?module='.$module);
	}
    elseif ($module=='det_pembelian' AND $act=='input') {
		mysqli_query($konek,"INSERT INTO det_pembelian values ('$_POST[id_keranjang]','$_POST[id_pembeli]','$_POST[id_kecamatan]','$_POST[alamat]','$_POST[status]','$_POST[tgl_pembelian]')");
		header('location:../../home.php?module='.$module);
	}
    elseif ($module=='det_pembelian' AND $act=='update') {
		mysqli_query($konek,"UPDATE det_pembelian set id_keranjang='$_POST[id_keranjang]',id_pembeli='$_POST[id_pembeli]',id_kecamatan='$_POST[id_kecamatan]',alamat='$_POST[alamat]',status='$_POST[status]',tgl_pembelian='$_POST[tgl_pembelian]'
		where id_kategori='$_POST[idh]'");
		header('location:../../home.php?module='.$module);
	}
 }
?>