
<?php if($_GET['donasi'] == "masuk"): ?>

<?php
$q = mysqli_query($conn, "
		SELECT dm.*, tm.*, d.*, u.*, jd.* FROM detil_pemasukan AS dm
		JOIN transaksi_masuk AS tm ON tm.ID_TRANSMASUK = dm.ID_TRANSMASUK
		JOIN jenis_donasi AS jd ON jd.ID_JENISDONASI = dm.ID_JENISDONASI
		JOIN donatur AS d ON tm.ID_DONATUR = d.ID_DONATUR
		JOIN user AS u ON u.USERNAME = tm.USERNAME 
	") or die(mysqli_error($conn));

// die(var_dump(mysqli_fetch_array($q)));
?>

	<a href="?donasi=tersalurkan" class="btn btn-default">Lihat Donasi Tersalurkan</a>
	<?php if(isset($_SESSION['user'])){ ?>
	<a href="process-masuk.php" class="btn btn-default">Tambah Donasi Baru</a>
	<a href="jenis-donasi" class="btn btn-default">Jenis Donasi</a>
	<br><br>
	<?php } ?>

	<table>
		<thead>
			<tr>
				<th>NAMA DONATUR</th>
				<th>JENIS DONASI</th>
				<th>NAMA BARANG</th>
				<th>SATUAN</th>
				<th>JUMLAH</th>
				<th>JENIS PEMBAYARAN</th>
				<th>TANGGAL</th>
				<?php if(isset($_SESSION['user'])){ ?>
				<!-- <th>#</th> -->
				<?php }?>
			</tr>
		</thead>
		
		<tbody>
		<?php 
			while ($data = mysqli_fetch_array($q)) {
		?>
			<tr>
				<td><?= $data['NAMA_DONATUR'] ?></td>
				<td><?= $data['JENIS_DONASI'] ?></td>
				<td><?= $data['NAMABARANG'] ?></td>
				<td><?= $data['SATUAN'] ?></td>
				<td><?= $data['JUMLAH'] ?></td>
				<td><?= $data['JENIS_PEMBAYARAN'] ?></td>
				<td><?= $data['TANGGAL_MASUK'] ?></td>
				<?php if(isset($_SESSION['user'])){ ?>
				<!-- <td>
					<a href="process.php?id=<?= $data['ID_YATIM'] ?>" class="btn btn-default">Edit</a>
					<a href="delete.php?id=<?= $data['ID_YATIM'] ?>" class="btn btn-danger">Hapus</a>
				</td> -->
				<?php }?>
			</tr>
		<?php } ?>
		</tbody>

	
	</table>

<?php elseif($_GET['donasi'] == "tersalurkan"): ?>

	<?php
$q = mysqli_query($conn, "
		SELECT dk.*, dk.KETERANGAN AS ketkeluar, tk.*, jp.* FROM detil_transkeluar AS dk
		JOIN transaksi_keluar AS tk ON tk.ID_TRANSKELUAR = dk.ID_TRANSKELUAR
		JOIN jenis_pengeluaran AS jp ON jp.ID_JENISPENGELUARAN = dk.ID_JENISPENGELUARAN
	") or die(mysqli_error($conn));

// die(var_dump(mysqli_fetch_array($q)));
?>

	<a href="?donasi=masuk" class="btn btn-default">Lihat Donasi Masuk</a>
	<?php if(isset($_SESSION['user'])){ ?>
	<a href="process-keluar.php" class="btn btn-default">Tambah Pengeluaran</a>
	<a href="jenis-pengeluaran" class="btn btn-default">Jenis Pengeluaran</a>
	<br><br>
	<?php } ?>

	<table>
		<thead>
			<tr>
				<th>NAMA PENGELUARAN</th>
				<th>JENIS PENGELUARAN</th>
				<th>JUMLAH</th>
				<th>TANGGAL</th>
				<?php if(isset($_SESSION['user'])){ ?>
				<!-- <th>#</th> -->
				<?php }?>
			</tr>
		</thead>
		
		<tbody>
		<?php 
			while ($data = mysqli_fetch_array($q)) {
		?>
			<tr>
				<td><?= $data['ketkeluar'] ?></td>
				<td><?= $data['KETERANGAN'] ?> (<?= $data['JENIS_PENGELUARAN'] ?>)</td>
				<td><?= $data['HARGA_DETIL'] ?></td>
				<td><?= $data['TANGGAL_KELUAR'] ?></td>
				<?php if(isset($_SESSION['user'])){ ?>
				<!-- <td>
					<a href="process.php?id=<?= $data['ID_YATIM'] ?>" class="btn btn-default">Edit</a>
					<a href="delete.php?id=<?= $data['ID_YATIM'] ?>" class="btn btn-danger">Hapus</a>
				</td> -->
				<?php }?>
			</tr>
		<?php } ?>
		</tbody>

	
	</table>


<?php endif; ?>