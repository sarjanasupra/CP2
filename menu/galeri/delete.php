<?php
require "../../core/config.php";
$sel = mysqli_query($conn, "SELECT * FROM galeri WHERE ID_GALERI = '".$_GET['id']."'");
$r = mysqli_fetch_assoc($sel);

unlink($r['FOTO']); // menghapus file di direktori

$q = "DELETE FROM galeri WHERE ID_GALERI = '".$_GET['id']."'";		
		mysqli_query($conn, $q);
		header('location:'.BASE_URL.'/menu/galeri/');