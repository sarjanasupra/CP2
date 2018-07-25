<?php

require "../../core/config.php";
session_start();

// if(isset($_GET['id'])){
// 	$q = mysqli_query($conn, "SELECT * FROM yatim WHERE ID_YATIM = '".$_GET['id']."'");
// 	$user = mysqli_fetch_assoc($q);
// } else {
// 	$user = NULL;
// }

$jenis_pengeluaran = mysqli_query($conn, "SELECT * FROM jenis_pengeluaran");

if(isset($_POST['id_trans'])){
	// if(!isset($_GET['id'])){
	// 	header('location:'.BASE_URL.'/menu/yatim/');
	// } else {
	// 	$q = "UPDATE yatim SET
	// 		NIK = '".$_POST['nik']."',
	// 		NAMA_YATIM = '".$_POST['nama_yatim']."',
	// 		JENIS_KELAMINYATIM = '".$_POST['jenis_kel']."',
	// 		ALAMAT = '".$_POST['alamat']."',
	// 		STATUS = '".$_POST['status']."'

	// 		WHERE ID_YATIM = '".$_GET['id']."'
	// 	";
	// 	mysqli_query($conn, $q);
	// 	header('location:'.BASE_URL.'/menu/yatim/');
	// }

		$total = 0;
		$q_trans = "INSERT INTO transaksi_keluar VALUES ('".$_POST['id_trans']."', 
			'".$_SESSION['user']."',
			'".date('Y-m-d')."',
			'0'
		)";		
		mysqli_query($conn, $q_trans) or die(mysqli_error($conn));

		foreach($_POST['jenis_pengeluaran'] as $key => $barang){
			$q_detail = "INSERT INTO detil_transkeluar VALUES(
				'".$_POST['jenis_pengeluaran'][$key]."',
				'".$_POST['id_trans']."',
				'".$_POST['keterangan'][$key]."',
				'".$_POST['harga'][$key]."'
			)";
			$total += (int) $_POST['harga'][$key];
			mysqli_query($conn, $q_detail) or die(mysqli_error($conn));
		}


		$q_update_total = "UPDATE transaksi_keluar SET JUMLAH_KELUAR = '".$total."' 
			WHERE ID_TRANSKELUAR = '".$_POST['id_trans']."'
		";
		mysqli_query($conn, $q_update_total) or die(mysqli_error($conn));
		
		header('location:'.BASE_URL.'/menu/donasi?donasi=tersalurkan');
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
      <h6 class="heading">Salurkan Donasi</h6>
    </div>

		<form method="POST" action="" class="">
			<label>ID TRANS</label>
			<input type="text" name="id_trans">
			<br>
			<br>

			<div id="dynamic-input">
				<table>
					<tr>
						<td>
							<label>JENIS PENGELUARAN</label>
							<select name="jenis_pengeluaran[]">
								<?php while ($data = mysqli_fetch_array($jenis_pengeluaran)) { ?>
									<option value="<?= $data['ID_JENISPENGELUARAN'] ?>"><?= $data['JENIS_PENGELUARAN'] ?></option>
								<?php } ?>
							</select>
							<br>
							<br>
						</td>
						<td>
							<label>KETERANGAN</label>
							<textarea name="keterangan[]"></textarea>
						</td>
						<td>
							<label>HARGA</label>
							<input type="number" name="harga[]">
						</td>
					</tr>
				</table>	
			</div>
			<div id="place"></div>

			<br>
			<button type="button" onclick="newInput()">Tambah pengeluaran</button>

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