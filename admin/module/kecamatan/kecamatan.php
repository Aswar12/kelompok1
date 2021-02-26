<?php
$aksi="module/kecamatan/aksi_kecamatan.php";

	switch($_GET['act'])
	{

	default:
		// Tampil Data - mengambil file kecamatanshow.php
		echo"<a href='?module=kecamatan&act=tambahdata' class='nav-link text-black'><i class='fa fa-plus-circle' ></i> Tambah</a>
		 <table id='aswar' class='table table-striped table-bordered 'cellspacing='0' width='150%'>
		 <thead>
			<tr>
				<th>NO</th> <th>Nama Provinsi</th> <th>Nama kota</th> <th>Nama kecamatan</th> <th>Harga Ongkir</th> <th>Aksi</th>
			</tr>
		</thead>";
			$no=0;
			
			$data = mysqli_query($konek,'SELECT * FROM kecamatan INNER JOIN kota ON kecamatan.id_kota = kota.id_kota INNER JOIN provinsi ON kota.id_provinsi = provinsi.id_provinsi');
			while($r = mysqli_fetch_array($data))
			{
				$no++;
		echo"<tr>
				<td>$no</td> <td>$r[nm_provinsi]</td> <td>$r[nm_kota]</td> <td>$r[nm_kecamatan]</td> <td>$r[harga_ongkir]</td>
				<td> 
					<a href='?module=kecamatan&act=editdata&id=$r[id_kecamatan]'> <img src='edit.png' width=20px> </a> | 
					<a href='$aksi?module=kecamatan&act=hapus&id=$r[id_kecamatan]'> <img src='hapus.png' width=20px> </a>
				</td>
			</tr>";
			}
		echo"</table>";
	break;

	// Tambah Data - memanggil file kecamatanfm.php
	case "tambahdata":
		echo"<form action='$aksi?module=kecamatan&act=input' method='POST'>
			<table class='table table-striped table-bordered'>
			<tr>
			<td>Nama Kota</td> 
			<td><select name=id_kota class='form-control'>
					<option value='null'>Silahkan Pilih kota </option>";
					$data = mysqli_query($konek,"SELECT * FROM kota");
					while($r = mysqli_fetch_array($data)){
					echo"<option value='$r[id_kota]'> $r[nm_kota]</option>";
					}
				echo "</select>
			</td>
			</tr>
				<tr>
					<td>Nama kecamatan</td> <td><input  class='form-control' type=text name=nm_kecamatan></td>
				</tr>
				<tr>
				<td>Harga Ongkir</td> <td><input  class='form-control' type=text name=harga_ongkir></td>
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
		
	// Edit Data - memanggil file kecamataneditfm.php
	case "editdata":
		
			$data = mysqli_query($konek,"SELECT * FROM kecamatan where id_kecamatan='$_GET[id]'");
			$r = mysqli_fetch_array($data);
				
		echo"<form action='$aksi?module=kecamatan&act=update' method='POST'>
			<table class='table table-striped table-bordered'>
				<tr>
					<td>id_kecamatan</td> 
					<td>
						<input class='form-control' type=text name=id_kecamatan value='$r[id_kecamatan]' disabled>
						<input class='form-control' type=hidden name='idh' value='$r[id_kecamatan]'>
					</td>
				</tr>
				<tr>
				<td>Nama Kota</td> 
				<td><select name=id_kota class='form-control'>
						<option value='null'>Silahkan Pilih kota </option>";
						$data = mysqli_query($konek,"SELECT * FROM kota");
						while($r = mysqli_fetch_array($data)){
						echo"<option value='$r[id_kota]'> $r[nm_kota]</option>";
						}
					echo "</select>
				</td>
				</tr>		
				<tr>
					<td>Nama kecamatan</td> <td><input class='form-control' type=text name=nm_kecamatan value='$r[nm_kecamatan]'></td>
				</tr>
				<tr>
					<td>Harga Ongkir</td> <td><input  class='form-control' type=text name=harga_ongkir></td>
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