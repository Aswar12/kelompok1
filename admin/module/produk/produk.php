<?php
$aksi="module/produk/aksi_produk.php";

	switch($_GET[act])
	{

	default:
		// Tampil Data - mengambil file produkshow.php
		echo"<a href='?module=produk&act=tambahdata'> Tambah </a>
		 <table id='aswar' class='table table-striped table-bordered 'cellspacing='0' width='150%'>
		 <thead>
			<tr>
				<th>NO</th> <th>id produk</th> <th>id kategori</th> <th>Nama produk</th> <th>deskripsi</th> <th>gambar</th> <th>ukuran</th> <th>harga</th> <th>stok</th> <th>nama kategori</th> <th>Aksi</th>
			
			</tr></thead>";
			$no=0;
			
			$data = mysqli_query($konek,"SELECT * FROM produk");
			while($r = mysqli_fetch_array($data))
			{
				$no++;
		echo"<tr>
				<td>$no</td> <td>$r[id_produk]</td> <td>$r[id_kategori]</td> <td>$r[nm_produk]</td> <td>$r[deskripsi]</td> <td>$r[gambar]</td> <td>$r[ukuran]</td> <td>$r[harga]</td>  <td>$r[stok]</td> <td>$r[nm_kategori]</td> 
				<td> 
					<a href='?module=produk&act=edituser&id=$r[id_produk]'> Edit </a> | 
					<a href='$aksi?module=produk&act=hapus&id=$r[id_produk]'> Hapus </a>
				</td>
			</tr>";
			}
		echo"</table>";
	break;

	// Tambah Data - memanggil file produkfm.php
	case "tambahdata":
		echo"<form action='$aksi?module=produk&act=input' method='POST'>
			<table class='table table-striped table-bordered'>
				<tr>
					<td>id_produk</td> <td><input class='form-control' type=text name=id_produk></td>
				</tr>
				<tr>
					<td>id_kategori</td> <td><input class='form-control' type=text name=id_kategori></td>
				</tr>
				<tr>
					<td>Nama Lengkap</td> <td><input  class='form-control' type=text name=nm_lengkap></td>
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
		
	// Edit Data - memanggil file produkeditfm.php
	case "editdata":
		
			$data = mysqli_query($konek,"SELECT * FROM produk where id_produk='$_GET[id]'");
			$r = mysqli_fetch_array($data);
				
		echo"<form action='$aksi?module=produk&act=update' method='POST'>
			<table class='table table-striped table-bordered'>
				<tr>
					<td>id_produk</td> 
					<td>
						<input type=text name=id_produk value='$r[id_produk]' disabled>
						<input type=hidden name='idh' value='$r[id_produk]'>
					</td>
				</tr>
				<tr>
					<td>id_kategori</td> <td><input class='form-control' type=id_kategori name=id_kategori value='$r[id_kategori]'></td>
				</tr>
				<tr>
					<td>Nama Lengkap</td> <td><input class='form-control' type=text name=nm_lengkap value='$r[nm_lengkap]'></td>
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
	  