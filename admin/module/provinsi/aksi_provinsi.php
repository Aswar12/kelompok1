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
	if ($module=='provinsi' AND $act=='hapus'){
		mysqli_query($konek,"delete from provinsi where username='$_GET[id]'");
		header('location:../../home.php?module='.$module);
	}

	//input memanggil file provinsisim.php
	elseif ($module=='provinsi' AND $act=='input') {
		mysqli_query($konek,"INSERT INTO provinsi values ('$_POST[username]','$_POST[password]','$_POST[nm_lengkap]')");
		header('location:../../home.php?module='.$module);
	}

	//update memanggil file provinsieditsim.php
	elseif ($module=='provinsi' AND $act=='update') {
		mysqli_query($konek,"UPDATE provinsi set password='$_POST[password]',nm_lengkap='$_POST[nm_lengkap]'
		where username='$_POST[idh]'");
		header('location:../../home.php?module='.$module);
	}
 }
?>