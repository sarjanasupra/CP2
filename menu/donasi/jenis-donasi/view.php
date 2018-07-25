<?php
$q = mysqli_query($conn, "SELECT * FROM jenis_donasi");
?>

	<?php if(isset($_SESSION['user'])){ ?>
	<a href="process.php" class="btn btn-default">Tambah</a>
	<br><br>
	<?php } ?>

	<table>
		<thead>
			<tr>
				<th>ID JENIS</th>
				<th>JENIS DONASI</th>
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
				<td><?= $data['ID_JENISDONASI'] ?></td>
				<td><?= $data['JENIS_DONASI'] ?></td>
				<?php if(isset($_SESSION['user'])){ ?>
				<td>
					<a href="process.php?id=<?= $data['ID_JENISDONASI'] ?>" class="btn btn-default">Edit</a>
					<a href="delete.php?id=<?= $data['ID_JENISDONASI'] ?>" class="btn btn-danger">Hapus</a>
				</td>
				<?php }?>
			</tr>
		<?php } ?>
		</tbody>

	
	</table>


