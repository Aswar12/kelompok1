<?php
$aksi="module/provinsi/aksi_provinsi.php";

	switch($_GET[act])
	{

	default:
		// Tampil Data - mengambil file provinsishow.php
		echo"<a href='?module=provinsi&act=tambahdata' class='nav-link text-black'><i class='fa fa-plus-circle' ></i> Tambah</a>
		 <table id='kelompok1' class='table table-striped table-bordered 'cellspacing='0' width='150%'>
		 <thead>
			<tr>
				<th>NO</th> <th>Nama provinsi</th><th>Aksi</th>
			
			</tr></thead>";
			$no=0;
			
			$data = mysqli_query($konek,"SELECT * FROM provinsi");
			while($r = mysqli_fetch_array($data))
			{
				$no++;
		echo"<tr>
				<td>$no</td> <td>$r[nm_provinsi]</td> 
				<td> 
					<a href='?module=provinsi&act=editdata&id=$r[id_provinsi]'> <img src='edit.png' width=20px> </a> | 
					<a href='$aksi?module=provinsi&act=hapus&id=$r[id_provinsi]'> <img src='hapus.png' width=20px> </a>
				</td>
			</tr>";
			}
		echo"</table>";
	break;

	// Tambah Data - memanggil file provinsifm.php
	case "tambahdata":
		echo"<form action='$aksi?module=provinsi&act=input' method='POST'>
			<table class='table table-striped table-bordered'>
				<tr>
					<td>Nama provinsi</td> <td><input  class='form-control' type=text name=nm_provinsi></td>
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
		
	// Edit Data - memanggil file provinsieditfm.php
	case "editdata":
		
			$data = mysqli_query($konek,"SELECT * FROM provinsi where id_provinsi='$_GET[id]'");
			$r = mysqli_fetch_array($data);
				
		echo"<form action='$aksi?module=provinsi&act=update' method='POST'>
			<table class='table table-striped table-bordered'>
				<tr>
					<td>id_provinsi</td> 
					<td>
						<input type=text name=id_provinsi value='$r[id_provinsi]' disabled>
						<input type=hidden name='idh' value='$r[id_provinsi]'>
					</td>
				</tr>
				<tr>
					<td>Nama provinsi</td> <td><input class='form-control' type=text name=nm_provinsi value='$r[nm_provinsi]'></td>
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
	  