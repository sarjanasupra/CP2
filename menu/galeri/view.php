<?php
$q = mysqli_query($conn, "SELECT * FROM galeri");
$i = 0;
?>

	<?php if(isset($_SESSION['user'])){ ?>
	<a href="process.php" class="btn btn-default">Tambah</a>
	<br><br>
	<?php } ?>

	<table>
		
		<tbody>
			<tr>
		<?php 
			while ($data = mysqli_fetch_array($q)) {
			$i++;
		?>
				<td  style="text-align:center">
					<img style="height:200px" src="<?= str_replace(FCPATH, BASE_URL, $data['FOTO']) ?>">
					<br>
					<?= $data['DESKRIPSI'] ?>
					<?php if(isset($_SESSION['user'])){ ?>
						<br>
						<br>
						<a href="delete.php?id=<?= $data['ID_GALERI'] ?>" class="btn btn-danger">HAPUS</a>
					<?php }?>
				</td>
				<?php
					// Membagi jadi 3 kolom 
					if($i==3){
					$i = 0;
				?>
					</tr><tr>
				<?php } ?>
				
		<?php } ?>
			</tr>
		</tbody>

	
	</table>


