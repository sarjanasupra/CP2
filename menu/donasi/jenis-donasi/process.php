<?php

require "../../../core/config.php";
session_start();

if(isset($_GET['id'])){
	$q = mysqli_query($conn, "SELECT * FROM jenis_donasi WHERE ID_JENISDONASI = '".$_GET['id']."'") or die('Jenis Donasi Tidak Ditemukan');
	$user = mysqli_fetch_assoc($q);
} else {
	$user = NULL;
}

if(isset($_POST['jenis_donasi'])){
	if(!isset($_GET['id'])){
		$q = "INSERT INTO jenis_donasi VALUES ( 
			'".$_POST['id_donasi']."',
			'".$_POST['jenis_donasi']."'
		)";		
		// die(var_dump($q));
		mysqli_query($conn, $q) or die(mysqli_error($conn));
		header('location:'.BASE_URL.'/menu/donasi/jenis-donasi');
	} else {
		$q = "UPDATE jenis_donasi SET
			JENIS_DONASI = '".$_POST['jenis_donasi']."',
			ID_JENISDONASI = '".$_POST['id_donasi']."'

			WHERE ID_JENISDONASI = '".$_GET['id']."'
		";
		mysqli_query($conn, $q);
		header('location:'.BASE_URL.'/menu/donasi/jenis-donasi');
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
      <h6 class="heading">JENIS DONASI</h6>
    </div>

		<form method="POST" action="" class="">
			<label>ID Donasi</label>
			<input type="" class="form-control" name="id_donasi" value="<?= isset($user) ? $user['ID_JENISDONASI'] : '' ?>">
			<br>
			<br>
			<label>Jenis Donasi</label>
			<input type="" class="form-control" name="jenis_donasi" value="<?= isset($user) ? $user['JENIS_DONASI'] : '' ?>">
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