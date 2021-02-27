<?php
	if ($_GET['module']=='home'){
		echo"hai";
	}

	//bagian produk
	elseif ($_GET['module']=='produk') 
	{
		include "module/produk/produk.php";
	}
	elseif ($_GET['module']=='kategori') 
	{
		include "module/kategori/kategori.php";
	}
	elseif ($_GET['module']=='provinsi') 
	{
		include "module/provinsi/provinsi.php";
	}
	elseif ($_GET['module']=='kota') 
	{
		include "module/kota/kota.php";
	}
	elseif ($_GET['module']=='keranjang') 
	{
		include "module/keranjang/keranjang.php";
	}
	elseif ($_GET['module']=='admin') 
	{
		include "module/admin/admin.php";
	}
	elseif ($_GET['module']=='kecamatan') 
	{
		include "module/kecamatan/kecamatan.php";
	}
	elseif ($_GET['module']=='det_pembelian') 
	{
		include "module/det_pembelian/det_pembelian.php";
	}
?>