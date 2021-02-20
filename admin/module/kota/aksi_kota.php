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
	if ($module=='kota' AND $act=='hapus'){
		mysqli_query($konek,"delete from kota where id_kota='$_GET[id]'");
		header('location:../../home.php?module='.$module);
	}

	//input memanggil file provinsisim.php
	elseif ($module=='kota' AND $act=='input') {
		mysqli_query($konek,"INSERT INTO kota values ('$_POST[id_kota]','$_POST[id_provinsi]','$_POST[nm_kota]')");
		header('location:../../home.php?module='.$module);
	}

	//update memanggil file provinsieditsim.php
	elseif ($module=='kota' AND $act=='update') {
		mysqli_query($konek,"UPDATE kota set id_provinsi='$_POST[id_provinsi]',nm_kota='$_POST[nm_kota]'
		where id_kota='$_POST[idh]'");
		header('location:../../home.php?module='.$module);
	}
 }
?>