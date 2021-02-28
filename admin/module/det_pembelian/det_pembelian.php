<?php
$aksi="module/det_pembelian/aksi_det_pembelian.php";

	switch($_GET['act'])
	{

	default:
		// Tampil Data - mengambil file det_pembelianshow.php
		echo"<a href='?module=det_pembelian&act=tambahdata' class='nav-link text-black'><i class='fa fa-plus-circle' ></i> Tambah</a>
		 <table id='aswar' class='table table-striped table-bordered 'cellspacing='0' width='150%'>
		 <thead>
			<tr>
				<th>NO</th> <th>Id Keranjang</th> <th>Nama Pembeli</th> <th>Nama Kecamatan</th> <th>alamat</th> <th>status</th> <th>Tgl Pembelian</th> <th>Aksi</th>
			
			</tr></thead>";
			$no=0;
			
			$data = mysqli_query($konek,"SELECT * FROM det_pembelian inner join keranjang on det_pembelian.id_keranjang = keranjang.id_keranjang inner join pembeli on pembeli.id_pembeli inner join kecamatan on kecamatan.id_kecamatan");
			while($r = mysqli_fetch_array($data))
			{
				$no++;
		echo"<tr>
				<td>$no</td> <td>$r[id_keranjang]</td> <td>$r[nm_pembeli]</td> <td>$r[nm_kecamatan]</td> <td>$r[alamat]</td> <td>$r[status]</td> <td>$r[tgl_pembelian]</td>
				<td> 
					<a href='?module=det_pembelian&act=editdata&id=$r[id_detpembelian]'> <img src='edit.png' width=20px> </a> | 
					<a href='$aksi?module=det_pembelian&act=hapus&id=$r[id_detpembelian]'> <img src='hapus.png' width=20px> </a>
				</td>
			</tr>";
			}
		echo"</table>";
	break;

    case "tambahdata":
		echo"<form action='$aksi?module=det_pembelian&act=input' method='POST'>
			<table class='table table-striped table-bordered'>
            <tr>
			<td>ID Keranjang</td> 
			<td><select name='id_keranjang' class='form-control'>
					<option value='null'>Silahkan Pilih Keranjang</option>";
					$data = mysqli_query($konek,"SELECT * FROM keranjang");
					while($r = mysqli_fetch_array($data)){
					echo"<option value='$r[id_keranjang]'> $r[id_keranjang]</option>";
					}
				echo "</select>
			</td>
			</tr>
            <tr>
			<td>Nama Pembeli</td> 
			<td><select name='nm_pembeli' class='form-control'>
					<option value='null'>Silahkan Pilih Pembeli</option>";
					$data = mysqli_query($konek,"SELECT * FROM pembeli");
					while($r = mysqli_fetch_array($data)){
					echo"<option value='$r[id_pembeli]'> $r[nm_pembeli]</option>";
					}
				echo "</select>
			</td>
			</tr>
            <tr>
			<td>Nama Kecamatan</td> 
			<td><select name='nm_pembeli' class='form-control'>
					<option value='null'>Silahkan Pilih Kecamatan</option>";
					$data = mysqli_query($konek,"SELECT * FROM kecamatan");
					while($r = mysqli_fetch_array($data)){
					echo"<option value='$r[id_kecamatan]'> $r[nm_kecamatan]</option>";
					}
				echo "</select>
			</td>
			</tr>   
				<tr>
					<td>alamat</td> <td><input class='form-control' type=text name=alamat></td>
				</tr>
                <tr>
				<td>Status</td>
				<td>
					<input type=radio name=ukuran value=baru checked>baru
					<input type=radio name=ukuran value=lama checked>lama
					<input type=radio name=ukuran value=terkirim checked>terkirim
				</td>
				</tr>
                <tr>
					<td>Tgl Pembelian</td> <td><input class='form-control' type=date name=tgl_pembelian></td>
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

    case "editdata":
		
        $data = mysqli_query($konek,"SELECT * FROM det_pembelian where id_detpembelian='$_GET[id]'");
        $r = mysqli_fetch_array($data);
            
    echo"<form action='$aksi?module=det_pembelian&act=update' method='POST'>
        <table class='table table-striped table-bordered'>
            <tr>
                <td>id_detpembelian</td> 
                <td>
                    <input class='form-control' type=text name=id_produk value='$r[id_detpembelian]' disabled>
                    <input class='form-control' type=hidden name='idh' value='$r[id_detpembelian]'>
                </td>
            </tr>
            <tr>
			<td>ID Keranjang</td> 
			<td><select name='id_keranjang' class='form-control'>
					<option value='null'>Silahkan Pilih Keranjang</option>";
					$data = mysqli_query($konek,"SELECT * FROM keranjang");
					while($r = mysqli_fetch_array($data)){
					echo"<option value='$r[id_keranjang]'> $r[id_keranjang]</option>";
					}
				echo "</select>
			</td>
			</tr>
            <tr>
			<td>Nama Pembeli</td> 
			<td><select name='nm_pembeli' class='form-control'>
					<option value='null'>Silahkan Pilih Pembeli</option>";
					$data = mysqli_query($konek,"SELECT * FROM pembeli");
					while($r = mysqli_fetch_array($data)){
					echo"<option value='$r[id_pembeli]'> $r[nm_pembeli]</option>";
					}
				echo "</select>
			</td>
			</tr>
            <tr>
			<td>Nama Kecamatan</td> 
			<td><select name='nm_pembeli' class='form-control'>
					<option value='null'>Silahkan Pilih Kecamatan</option>";
					$data = mysqli_query($konek,"SELECT * FROM kecamatan");
					while($r = mysqli_fetch_array($data)){
					echo"<option value='$r[id_kecamatan]'> $r[nm_kecamatan]</option>";
					}
				echo "</select>
			</td>
			</tr>   
				<tr>
					<td>alamat</td> <td><input class='form-control' type=text name=alamat></td>
				</tr>
                <tr>
				<td>Status</td>
				<td>
					<input type=radio name=ukuran value=baru checked>baru
					<input type=radio name=ukuran value=lama checked>lama
					<input type=radio name=ukuran value=terkirim checked>terkirim
				</td>
				</tr>
                <tr>
					<td>Tgl Pembelian</td> <td><input class='form-control' type=date name=tgl_pembelian></td>
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
