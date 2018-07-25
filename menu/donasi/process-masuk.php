<?php

require "../../core/config.php";
session_start();

$donatur = mysqli_query($conn, "SELECT * FROM donatur");
$jenis_donasi = mysqli_query($conn, "SELECT * FROM jenis_donasi");

if(isset($_POST['donatur'])){

		$q_trans = "INSERT INTO transaksi_masuk VALUES ('".$_POST['id_trans']."', 
			'".$_POST['donatur']."',
			'".$_SESSION['user']."',
			'".date('Y-m-d')."'
		)";		
		mysqli_query($conn, $q_trans) or die(mysqli_error($conn));

		foreach($_POST['nama_barang'] as $key => $barang){
			$q_detail = "INSERT INTO detil_pemasukan VALUES(
				'".$_POST['jenis_donasi']."',
				'".$_POST['id_trans']."',
				'".$_POST['nama_barang'][$key]."',
				'".$_POST['satuan'][$key]."',
				'".$_POST['jumlah'][$key]."',
				'".$_POST['jenis_pembayaran'][$key]."'
			)";
			mysqli_query($conn, $q_detail) or die(mysqli_error($conn));
		}

		header('location:'.BASE_URL.'/menu/donasi?donasi=masuk');
}

?>
<!DOCTYPE html>
<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title><?= SITE_TITLE ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="<?=BASE_URL?>/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<style type="text/css">
	table{
		margin-bottom: 0;
	}
</style>
</head>
<body id="top">

<?php include TEMPLATEPATH.'_header.php'; ?>

<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h6 class="heading">DONASI BARU</h6>
    </div>

		<form method="POST" action="" class="">
			<label>ID TRANS</label>
			<input type="text" name="id_trans">
			<br>
			<br>
			<label>DONATUR</label>
			<select name="donatur">
				<?php while ($data = mysqli_fetch_array($donatur)) { ?>
					<option value="<?= $data['ID_DONATUR'] ?>"><?= $data['NAMA_DONATUR'] ?></option>
				<?php } ?>
			</select>
			<br>
			<br>
			<label>JENIS DONASI</label>
			<select name="jenis_donasi">
				<?php while ($data = mysqli_fetch_array($jenis_donasi)) { ?>
					<option value="<?= $data['ID_JENISDONASI'] ?>"><?= $data['JENIS_DONASI'] ?></option>
				<?php } ?>
			</select>
			<br>
			<br>

			<div id="dynamic-input">
				<table>
					<tr>
						<td>
							<label>NAMA BARANG</label>
							<input type="text" name="nama_barang[]">
						</td>
						<td>
							<label>SATUAN</label>
							<input type="text" name="satuan[]">
						</td>
						<td>
							<label>JUMLAH</label>
							<input type="text" name="jumlah[]">
						</td>
						<td>
							<label>JENIS PEMBAYARAN</label>
							<input type="text" name="jenis_pembayaran[]">							
						</td>
					</tr>
				</table>	
			</div>
			<div id="place"></div>

			<br>
			<button type="button" onclick="newInput()">Tambah Barang</button>

			<br>
			<br>

			<button type="submit">SIMPAN</button>
		</form>

    <!-- / main body -->
  </main>
</div>

<?php include TEMPLATEPATH.'_footer.php'; ?>


<!-- JAVASCRIPTS -->
<script src="<?=BASE_URL?>layout/scripts/jquery.min.js"></script>
<script src="<?=BASE_URL?>layout/scripts/jquery.backtotop.js"></script>
<script src="<?=BASE_URL?>layout/scripts/jquery.mobilemenu.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	function newInput(){
		$('#place').append($('#dynamic-input').html());
	}
</script>
</body>
</html> 