<?php
require "../../../core/config.php";

$q = "DELETE FROM jenis_donasi WHERE ID_JENISDONASI = '".$_GET['id']."'";		
		mysqli_query($conn, $q);
		header('location:'.BASE_URL.'/menu/donasi/jenis-donasi');