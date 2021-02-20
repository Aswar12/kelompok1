<?php
session_start();
if (empty($_SESSION['username']) AND empty ($_SESSION['passuser'])) {
	header("location:../../index.php");
}

else{

	include "../../../config/koneksi.php";
	$module=$_GET[module];
	$act=$_GET[act];

	//hapus memanggil file admindel.php
	if ($module=='admin' AND $act=='hapus'){
		mysqli_query($konek,"delete from admin where username='$_GET[id]'");
		header('location:../../home.php?module='.$module);
	}

	//input memanggil file adminsim.php
	elseif ($module=='admin' AND $act=='input') {
		mysqli_query($konek,"INSERT INTO admin values ('$_POST[username]','$_POST[password]','$_POST[nm_lengkap]','$_POST[email]','$_POST[foto]','$_POST[alamat]')");
		header('location:../../home.php?module='.$module);
	}

	//update memanggil file admineditsim.php
	elseif ($module=='admin' AND $act=='update') {
		mysqli_query($konek,"UPDATE admin set password='$_POST[password]',nm_lengkap='$_POST[nm_lengkap]','$_POST[email]','$_POST[foto]','$_POST[alamat]'
		where username='$_POST[idh]'");
		header('location:../../home.php?module='.$module);
	}
 }
?>