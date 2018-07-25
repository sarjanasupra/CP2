<?php
$q = mysqli_query($conn, "SELECT * FROM donatur");
?>

	<?php if(isset($_SESSION['user'])){ ?>
	<a href="process.php" class="btn btn-default">Tambah</a>
	<br><br>
	<?php } ?>

	<table>
		<thead>
			<tr>
				<th>ID_DONATUR</th>
				<th>NAMA_DONATUR</th>
				<th>JENIS_KELAMIN</th>
				<th>ALAMAT</th>
				<th>TELEPON</th>
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
				<td><?= $data['ID_DONATUR'] ?></td>
				<td><?= $data['NAMA_DONATUR'] ?></td>
				<td><?= $data['JENIS_KELAMIN'] ?></td>
				<td><?= $data['ALAMAT'] ?></td>
				<td><?= $data['TELEPON'] ?></td>
				<td><?= $data['STATUS'] ?></td>
				<?php if(isset($_SESSION['user'])){ ?>
				<td>
					<a href="process.php?id=<?= $data['ID_DONATUR'] ?>" class="btn btn-default">Edit</a>
					<a href="delete.php?id=<?= $data['ID_DONATUR'] ?>" class="btn btn-danger">Hapus</a>
				</td>
				<?php }?>
			</tr>
		<?php } ?>
		</tbody>

	
	</table>


