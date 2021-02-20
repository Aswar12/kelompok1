<?php
$aksi="module/kota/aksi_kota.php";

	switch($_GET[act])
	{

	default:
		// Tampil Data - mengambil file kotashow.php
		echo"<a href='?module=kota&act=tambahdata'> Tambah </a>
		 <table id='aswar' class='table table-striped table-bordered 'cellspacing='0' width='150%'>
		 <thead>
			<tr>
				<th>NO</th> <th>Nama Provinsi</th><th>Nama Kota</th> <th>Aksi</th>
			</tr>
		</thead>";
			$no=0;
			
			$data = mysqli_query($konek,'SELECT * FROM kota k, provinsi p WHERE  p.id_provinsi = k.id_provinsi');
			while($r = mysqli_fetch_array($data))
			{
				$no++;
		echo"<tr>
				<td>$no</td> <td>$r[nm_provinsi]</td> <td>$r[nm_kota]</td>
				<td> 
					<a href='?module=kota&act=editdata&id=$r[id_kota]'> Edit </a> | 
					<a href='$aksi?module=kota&act=hapus&id=$r[id_kota]'> Hapus </a>
				</td>
			</tr>";
			}
		echo"</table>";
	break;

	// Tambah Data - memanggil file kotafm.php
	case "tambahdata":
		echo"<form action='$aksi?module=kota&act=input' method='POST'>
			<table class='table table-striped table-bordered'>
				<tr>
					<td>Nama kota</td> <td><input  class='form-control' type=text name=nm_kota></td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input class='btn btn-default' type=submit name=simpan value='Kirim'>
						<input class='btn btn-default' type=reset name=batal value='Batal'>
					</td>
				</tr>
			</table>
		</form>";	
	break;
		
	// Edit Data - memanggil file kotaeditfm.php
	case "editdata":
		
			$data = mysqli_query($konek,"SELECT * FROM kota where id_kota='$_GET[id]'");
			$r = mysqli_fetch_array($data);
				
		echo"<form action='$aksi?module=kota&act=update' method='POST'>
			<table class='table table-striped table-bordered'>
				<tr>
					<td>id_kota</td> 
					<td>
						<input type=text name=id_kota value='$r[id_kota]' disabled>
						<input type=hidden name='idh' value='$r[id_kota]'>
					</td>
				</tr>
				<tr>
					<td>Nama kota</td> <td><input class='form-control' type=text name=nm_kota value='$r[nm_kota]'></td>
				</tr>
				<tr>
					<td></td> 
					<td>
						<input type=submit class='btn btn-default' name=simpan value='Update'>
						<input type=reset class='btn btn-default' name=batal value='Batal'>
					</td>
				</tr>
			</table>
		</form>";
	break;
}
?>
	  