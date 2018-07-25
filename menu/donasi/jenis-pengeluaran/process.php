<?php

require "../../../core/config.php";
session_start();

if(isset($_GET['id'])){
	$q = mysqli_query($conn, "SELECT * FROM jenis_pengeluaran WHERE ID_JENISPENGELUARAN = '".$_GET['id']."'") or die('Jenis Pengeluaran Tidak Ditemukan');
	$user = mysqli_fetch_assoc($q);
} else {
	$user = NULL;
}

if(isset($_POST['jenis_pengeluaran'])){
	if(!isset($_GET['id'])){
		$q = "INSERT INTO jenis_pengeluaran VALUES ('', 
			'".$_POST['jenis_pengeluaran']."',
			'".$_POST['keterangan']."'
		)";		
		// die(var_dump($q));
		mysqli_query($conn, $q) or die(mysqli_error($conn));
		header('location:'.BASE_URL.'/menu/donasi/jenis-pengeluaran');
	} else {
		$q = "UPDATE jenis_pengeluaran SET
			JENIS_PENGELUARAN = '".$_POST['jenis_pengeluaran']."',
			KETERANGAN = '".$_POST['keterangan']."'

			WHERE ID_JENISPENGELUARAN = '".$_GET['id']."'
		";
		mysqli_query($conn, $q);
		header('location:'.BASE_URL.'/menu/donasi/jenis-pengeluaran');
	}
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
</head>
<body id="top">

<?php include TEMPLATEPATH.'_header.php'; ?>

<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h6 class="heading">JENIS PENGELUARAN</h6>
    </div>

		<form method="POST" action="" class="">
			<label>Jenis Pengeluaran</label>
			<input type="" class="form-control" name="jenis_pengeluaran" value="<?= isset($user) ? $user['JENIS_PENGELUARAN'] : '' ?>">
			<br>
			<br>
			<label>Keterangan</label>
			<textarea class="form-control" name="keterangan"><?= isset($user) ? $user['KETERANGAN'] : '' ?></textarea>
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
</body>
</html> 