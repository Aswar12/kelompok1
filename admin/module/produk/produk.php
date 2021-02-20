<?php
$aksi="module/produk/aksi_produk.php";

	switch($_GET['act'])
	{

	default:
		// Tampil Data - mengambil file produkshow.php
		echo"<a href='?module=produk&act=tambahdata'> Tambah </a>
		 <table id='aswar' class='table table-striped table-bordered 'cellspacing='0' width='150%'>
		 <thead>
			<tr>
				<th>NO</th> <th>Nama produk</th> <th>Deskripsi</th> <th>Gambar</th> <th>Ukuran</th> <th>Harga</th> <th>Stok</th> <th>Nama kategori</th> <th>Pilihan</th>
			
			</tr></thead>";
			$no=0;
			
			$data = mysqli_query($konek,"SELECT * FROM produk");
			while($r = mysqli_fetch_array($data))
			{
				$no++;
		echo"<tr>
				<td>$no</td> <td>$r[nm_produk]</td> <td>$r[deskripsi]</td> <td>$r[gambar]</td> <td>$r[ukuran]</td> <td>$r[harga]</td> <td>$r[stok]</td> <td>$r[nm_kategori]</td>
				<td> 
					<a href='?module=produk&act=editdata&id=$r[id_produk]'> Edit </a> | 
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
			<td>Nama Kategori</td> 
			<td><select name=id_kategori>
					<option value='null'>Silahkan Pilih Kategori</option>";
					$data = mysqli_query($konek,"SELECT * FROM kategori");
					while($r = mysqli_fetch_array($data)){
					echo"<option value='$r[nm_kategori]'> $r[nm_kategori]</option>";
					}
				echo "</select>
			</td>
			</tr>
				<tr>
					<td>Nama Produk</td> <td><input  class='form-control' type=text name=nm_produk></td>
				</tr>
				<tr>
					<td>Deskripsi</td> <td><input class='form-control' type=text name=deskripsi></td>
				</td>
				<tr>
				<td>Gambar</td> <td><input class='form-control' type=file name=gambar></td>
				</tr>
				<tr>
				<td>Ukuran Pakaian</td>
					<td>
						<input type=radio name=ukuran value=S checked>S
						<input type=radio name=ukuran value=M checked>M
						<input type=radio name=ukuran value=L checked>L
						<input type=radio name=ukuran value=XL checked>XL
						<input type=radio name=ukuran value=XXl checked>XXl
					</td>
				</tr>
				<tr>
				<td>Ukuran Sepatu</td>
					<td>
						<input type=radio name=ukuran value=36 checked>36
						<input type=radio name=ukuran value=37 checked>37
						<input type=radio name=ukuran value=38 checked>38
						<input type=radio name=ukuran value=39 checked>39
						<input type=radio name=ukuran value=40 checked>40
					</td>
				</tr>
				<tr>
				<td>Harga</td> <td><input class='form-control' type=text name=harga></td>
				</tr>			
				<tr>
				<td>Stok</td> <td><input class='form-control' type=text name=stok></td>
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
		
	// Edit Data - memanggil file produkeditfm.php
	case "editdata":
		
			$data = mysqli_query($konek,"SELECT * FROM produk where id_produk='$_GET[id]'");
			$r = mysqli_fetch_array($data);
				
		echo"<form action='$aksi?module=produk&act=update' method='POST'>
			<table class='table table-striped table-bordered'>
				<tr>
					<td>id_produk</td> 
					<td>
						<input class='form-control' type=text name=id_produk value='$r[id_produk]' disabled>
						<input class='form-control' type=hidden name='idh' value='$r[id_produk]'>
					</td>
				</tr>
				<tr>
				<td>Nama Kategori</td> 
				<td><select name=id_kategori>
						<option value='null'>Silahkan Pilih Kategori</option>";
						$data = mysqli_query($konek,"SELECT * FROM kategori");
						while($r = mysqli_fetch_array($data)){
						echo"<option value='$r[nm_kategori]'> $r[nm_kategori]</option>";
						}
					echo "</select>
				</td>
				</tr>
					<tr>
						<td>Nama Produk</td> <td><input  class='form-control' type=text name=nm_produk></td>
					</tr>
					<tr>
						<td>Deskripsi</td> <td><input class='form-control' type=text name=deskripsi></td>
					</td>
					<tr>
					<td>Gambar</td> <td><input class='form-control' type=file name=gambar></td>
					</tr>
					<tr>
					<td>Ukuran Pakaian</td>
						<td>
							<input type=radio name=ukuran value=S checked>S
							<input type=radio name=ukuran value=M checked>M
							<input type=radio name=ukuran value=L checked>L
							<input type=radio name=ukuran value=XL checked>XL
							<input type=radio name=ukuran value=XXl checked>XXl
						</td>
					</tr>
					<tr>
					<td>Ukuran Sepatu</td>
						<td>
							<input type=radio name=ukuran value=36 checked>36
							<input type=radio name=ukuran value=37 checked>37
							<input type=radio name=ukuran value=38 checked>38
							<input type=radio name=ukuran value=39 checked>39
							<input type=radio name=ukuran value=40 checked>40
						</td>
					</tr>
					<tr>
					<td>Harga</td> <td><input class='form-control' type=text name=harga></td>
					</tr>			
					<tr>
					<td>Stok</td> <td><input class='form-control' type=text name=stok></td>
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
	  