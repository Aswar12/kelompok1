<?php
$aksi="module/keranjang/aksi_keranjang.php";

	switch($_GET['act'])
	{

	default:
		// Tampil Data - mengambil file keranjangshow.php
		echo"<a href='?module=keranjang&act=tambahdata' class='nav-link text-black'><i class='fa fa-plus-circle' ></i> Tambah</a>
		 <table id='aswar' class='table table-striped table-bordered 'cellspacing='0' width='150%'>
		 <thead>
			<tr>
				<th>NO</th> <th>Nama Produk</th> <th>Harga</th> <th>Jumlah</th> <th>Tgl_Keranjang</th> <th>Pilihan</th>
			
			</tr></thead>";
			$no=0;
			
			$data = mysqli_query($konek,"SELECT * FROM keranjang");
			while($r = mysqli_fetch_array($data))
			{
				$no++;
		echo"<tr>
				<td>$no</td> <td>$r[nm_produk]</td> <td>$r[harga]</td> <td>$r[jumlah]</td> <td>$r[tgl_keranjang]</td>
				<td> 
					<a href='?module=keranjang&act=editdata&id=$r[id_keranjang]'> <img src='edit.png' width=20px> </a> | 
					<a href='$aksi?module=keranjang&act=hapus&id=$r[id_keranjang]'> <img src='hapus.png' width=20px </a>
				</td>
			</tr>";
			}
		echo"</table>";
	break;

	// Tambah Data - memanggil file keranjangfm.php
	case "tambahdata":
		echo"<form action='$aksi?module=keranjang&act=input' method='POST'>
			<table class='table table-striped table-bordered'>
			<tr>
			<td>Nama Produk</td> 
			<td><select name=id_produk class='form-control' >
					<option value='null'>Silahkan Pilih Produk</option>";
					$data = mysqli_query($konek,"SELECT * FROM produk");
					while($r = mysqli_fetch_array($data)){
					echo"<option value='$r[id_produk]'> $r[nm_produk]</option>";
					}
				echo "</select>
			</tr>
			<tr>
			<td>Harga Produk</td> 
			<td>";
					$data = mysqli_query($konek,"SELECT * FROM produk");
					while($r = mysqli_fetch_array($data)){
					echo"<input class='form-control' type=text name=harga value=' $r[harga]'></td>";
					}
				echo "
			</tr>		
				<tr>
					<td>Jumlah</td> <td><input class='form-control' type=text name=jumlah ></td>
				</td>
				<tr>
				<td>Tgl Keranjang</td> <td><input class='form-control' type=date name=tgl_keranjang></td>
				</tr>
					<td></td>
					<td>
						<input class='btn btn-default' type=submit name=simpan value='Kirim'>
						<input class='btn btn-default' type=reset name=batal value='Batal'>
					</td>
				</tr>
			</table>
		</form>";	
	break;
		
	// Edit Data - memanggil file keranjangeditfm.php
	case "editdata":
		
			$data = mysqli_query($konek,"SELECT * FROM keranjang where id_keranjang='$_GET[id]'");
			$r = mysqli_fetch_array($data);
				
		echo"<form action='$aksi?module=keranjang&act=update' method='POST'>
			<table class='table table-striped table-bordered'>
				<tr>
					<td>id_keranjang</td> 
					<td>
						<input class='form-control' type=text name=id_keranjang value='$r[id_keranjang]' disabled>
						<input class='form-control' type=hidden name='idh' value='$r[id_keranjang]'>
					</td>
				</tr>
				<tr>
			<td>id produk</td> 
			<td><select name=id_produk class='form-control'>
					<option value='null'>Silahkan Pilih produk</option>";
					$data = mysqli_query($konek,"SELECT * FROM produk");
					while($r = mysqli_fetch_array($data)){
					echo"<option value='$r[id_produk]'> $r[id_produk]</option>";
					}
				echo "</select>
			</td>
			</tr>
			<tr>
			<td>Nama Produk</td> 
			<td><select name=id_produk class='form-control'>
					<option value='null'>Silahkan Pilih produk</option>";
					$data = mysqli_query($konek,"SELECT * FROM produk");
					while($r = mysqli_fetch_array($data)){
					echo"<option value='$r[nm_produk]'> $r[nm_produk]</option>";
					}
				echo "</select>
			</td>
			</tr>
			<tr>
			<td>Harga</td> 
			<td><select name=id_produk class='form-control'>
					<option value='null'>Silahkan Pilih Harga</option>";
					$data = mysqli_query($konek,"SELECT * FROM produk");
					while($r = mysqli_fetch_array($data)){
					echo"<option value='$r[harga]'> $r[harga]</option>";
					}
				echo "</select>
			</td>
			</tr>
				<tr>
					<td>Jumlah</td> <td><input class='form-control' type=text name=jumlah></td>
				</td>
				<tr>
				<td>Tgl Keranjang</td> <td><input class='form-control' type=date name=tgl_keranjang></td>
				</tr>
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
	  