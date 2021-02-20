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
?>