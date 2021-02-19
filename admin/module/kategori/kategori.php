<?php
$aksi="module/kategori/aksi_kategori.php";

	switch($_GET[act])
	{

	default:
		// Tampil Data - mengambil file kategorishow.php
		echo"<a href='?module=kategori&act=tambahdata'> Tambah </a>
		 <table id='aswar' class='table table-striped table-bordered 'cellspacing='0' width='150%'>
		 <thead>
			<tr>
				<th>NO</th> <th>Nama kategori</th><th>Aksi</th>
			
			</tr></thead>";
			$no=0;
			
			$data = mysqli_query($konek,"SELECT * FROM kategori");
			while($r = mysqli_fetch_array($data))
			{
				$no++;
		echo"<tr>
				<td>$no</td> <td>$r[nm_kategori]</td>
				<td> 
					<a href='?module=kategori&act=editdata&id=$r[id_kategori]'> Edit </a> | 
					<a href='$aksi?module=kategori&act=hapus&id=$r[id_kategori]'> Hapus </a>
				</td>
			</tr>";
			}
		echo"</table>";
	break;

	// Tambah Data - memanggil file kategorifm.php
	case "tambahdata":
		echo"<form action='$aksi?module=kategori&act=input' method='POST'>
			<table class='table table-striped table-bordered'>
				
				<tr>
					<td>nm_kategori</td> <td><input class='form-control' type=text name=nm_kategori></td>
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
		
	// Edit Data - memanggil file kategorieditfm.php
	case "editdata":
		
			$data = mysqli_query($konek,"SELECT * FROM kategori where id_kategori='$_GET[id]'");
			$r = mysqli_fetch_array($data);
				
		echo"<form action='$aksi?module=kategori&act=update' method='POST'>
			<table class='table table-striped table-bordered'>
				<tr>
					<td>id_kategori</td> 
					<td>
						<input type=text name=id_kategori value='$r[id_kategori]' disabled>
						<input type=hidden name='idh' value='$r[id_kategori]'>
					</td>
				</tr>
				<tr>
					<td>Nama kategori</td> <td><input class='form-control' type=nm_kategori name=nm_kategori value='$r[nm_kategori]'></td>
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
	  