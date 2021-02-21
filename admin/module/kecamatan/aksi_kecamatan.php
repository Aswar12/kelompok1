<?php
session_start();
if (empty($_SESSION['username']) AND empty ($_SESSION['passuser'])) {
	header("location:../../index.php");
}

else{

	include "../../../config/koneksi.php";
	$module=$_GET[module];
	$act=$_GET['act'];

	//hapus memanggil file provinsidel.php
	if ($module=='kecamatan' AND $act=='hapus'){
		mysqli_query($konek,"delete from kecamatan where id_kecamatan='$_GET[id]'");
		header('location:../../home.php?module='.$module);
	}

	//input memanggil file provinsisim.php
	elseif ($module=='kecamatan' AND $act=='input') {
		mysqli_query($konek,"INSERT INTO kecamatan values ('$_POST[id_kecamatan]','$_POST[id_kota]','$_POST[nm_kecamatan]','$_POST[harga_ongkir]')");
		header('location:../../home.php?module='.$module);
	}

	//update memanggil file provinsieditsim.php
	elseif ($module=='kecamatan' AND $act=='update') {
		mysqli_query($konek,"UPDATE kecamatan set id_kota='$_POST[id_kota]',nm_kecamatan='$_POST[nm_kecamatan]',harga_ongkir='$_POST[harga_ongkir]'	
		where id_kecamatan='$_POST[idh]'");
		header('location:../../home.php?module='.$module);
	}
 }
?>