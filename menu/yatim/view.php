<?php
$q = mysqli_query($conn, "SELECT * FROM yatim");
?>

	<?php if(isset($_SESSION['user'])){ ?>
	<a href="process.php" class="btn btn-default">Tambah</a>
	<br><br>
	<?php } ?>

	<table>
		<thead>
			<tr>
				<th>NIK</th>
				<th>NAMA</th>
				<th>JENIS KELAMIN</th>
				<th>ALAMAT</th>
				<th>STATUS</th>
				<?php if(isset($_SESSION['user'])){ ?>
				<th>#</th>
				<?php }?>
			</tr>
		</thead>
		
		<tbody>
		<?php 
			while ($data = mysqli_fetch_array($q)) {
		?>
			<tr>
				<td><?= $data['NIK'] ?></td>
				<td><?= $data['NAMA_YATIM'] ?></td>
				<td><?= $data['JENIS_KELAMINYATIM'] ?></td>
				<td><?= $data['ALAMAT'] ?></td>
				<td><?= $data['STATUS'] ?></td>
				<?php if(isset($_SESSION['user'])){ ?>
				<td>
					<a href="process.php?id=<?= $data['ID_YATIM'] ?>" class="btn btn-default">Edit</a>
					<a href="delete.php?id=<?= $data['ID_YATIM'] ?>" class="btn btn-danger">Hapus</a>
				</td>
				<?php }?>
			</tr>
		<?php } ?>
		</tbody>

	
	</table>


