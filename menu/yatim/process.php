<?php

require "../../core/config.php";
session_start();

if(isset($_GET['id'])){
	$q = mysqli_query($conn, "SELECT * FROM yatim WHERE ID_YATIM = '".$_GET['id']."'");
	$user = mysqli_fetch_assoc($q);
} else {
	$user = NULL;
}

if(isset($_POST['nik'])){
	if(!isset($_GET['id'])){
		$q = "INSERT INTO yatim(USERNAME, NIK, NAMA_YATIM, JENIS_KELAMINYATIM, ALAMAT) VALUES ('".$_SESSION['user']."', 
			'".$_POST['nik']."',
			'".$_POST['nama_yatim']."',
			'".$_POST['jenis_kel']."',
			'".$_POST['status']."',
			'".$_POST['alamat']."'
		)";		
		// die(var_dump($q));
		mysqli_query($conn, $q) or die(mysqli_error($conn));
		header('location:'.BASE_URL.'/menu/yatim/');
	} else {
		$q = "UPDATE yatim SET
			NIK = '".$_POST['nik']."',
			NAMA_YATIM = '".$_POST['nama_yatim']."',
			JENIS_KELAMINYATIM = '".$_POST['jenis_kel']."',
			ALAMAT = '".$_POST['alamat']."',
			STATUS = '".$_POST['status']."'

			WHERE ID_YATIM = '".$_GET['id']."'
		";
		mysqli_query($conn, $q);
		header('location:'.BASE_URL.'/menu/yatim/');
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
      <h6 class="heading">ANAK YATIM</h6>
    </div>

		<form method="POST" action="" class="">
			<label>NIK</label>
			<input type="" class="form-control" name="nik" value="<?= isset($user) ? $user['NIK'] : '' ?>">
			<br>
			<br>
			<label>Nama Yatim</label>
			<input type="" class="form-control" name="nama_yatim" value="<?= isset($user) ? $user['NAMA_YATIM'] : '' ?>">
			<br>
			<br>
			<label>Jenis Kelamin Yatim</label>
			<select name="jenis_kel">
				<option value="Laki-Laki" <?= isset($user) && ($user['JENIS_KELAMINYATIM']=='Perempuan') ? 'selected' : '' ?>>Laki - Laki</option>
				<option value="Perempuan" <?= isset($user) && ($user['JENIS_KELAMINYATIM']=='Perempuan') ? 'selected' : '' ?>>Perempuan</option>
			</select>
			<br>
			<br>
			<label>Alamat</label>
			<textarea class="form-control" name="alamat"><?= isset($user) ? $user['ALAMAT'] : '' ?></textarea>
			<br>
			<br>
			<label>Status</label>
			<textarea class="form-control" name="status"><?= isset($user) ? $user['STATUS'] : '' ?></textarea>
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