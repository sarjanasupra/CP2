<?php

require "../../core/config.php";
session_start();

if(isset($_GET['id'])){
	$q = mysqli_query($conn, "SELECT * FROM donatur WHERE ID_DONATUR = '".$_GET['id']."'");
	$user = mysqli_fetch_assoc($q);
} else {
	$user = NULL;
}

if(isset($_POST['nik'])){
	if(!isset($_GET['id'])){
		$q = "INSERT INTO donatur(USERNAME, NAMA_DONATUR, JENIS_KELAMIN,ALAMAT,STATUS) VALUES ('".$_SESSION['user']."', 
			'".$_POST['ID_DONATUR']."',
			'".$_POST['NAMA_DONATUR']."',
			'".$_POST['jenis_kel']."',
			'".$_POST['alamat']."'
			'".$_POST['status']."'
		)";		
		// die(var_dump($q));
		mysqli_query($conn, $q) or die(mysqli_error($conn));
		header('location:'.BASE_URL.'/menu/yatim/');
	} else {
		$q = "UPDATE donatur SET
			NIK = '".$_POST['nik']."',
			NAMA_YATIM = '".$_POST['NAMA_DONATUR']."',
			JENIS_KELAMINYATIM = '".$_POST['jenis_kel']."',
			ALAMAT = '".$_POST['alamat']."'

			WHERE ID_DONATUR = '".$_GET['id']."'
		";
		mysqli_query($conn, $q);
		header('location:'.BASE_URL.'/menu/donatur/');
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
      <h6 class="heading">DONATUR</h6>
    </div>

		<form method="POST" action="">
			<label>ID DONATUR</label>
			<input type="" class="form-control" name="ID_DONATUR" value="<?= isset($user) ? $user['ID_DONATUR'] : '' ?>">
			<br>
			<br>
			<label>NAMA DONATUR</label>
			<input type="" class="form-control" name="NAMA_DONATUR" value="<?= isset($user) ? $user['NAMA_DONATUR'] : '' ?>">
			<br>
			<br>
			<label>Jenis Kelamin</label>
			<select name="jenis_kel">
				<option value="Laki-Laki" <?= isset($user) && ($user['JENIS_KELAMIN']=='Perempuan') ? 'selected' : '' ?>>Laki - Laki</option>
				<option value="Perempuan" <?= isset($user) && ($user['JENIS_KELAMIN']=='Perempuan') ? 'selected' : '' ?>>Perempuan</option>
			</select>
			<br>
			<br>
			<label>Alamat</label>
			<textarea class="form-control" name="alamat"><?= isset($user) ? $user['ALAMAT'] : '' ?></textarea>
			<br>
			<br>
			<button type="submit">Submit</button>
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