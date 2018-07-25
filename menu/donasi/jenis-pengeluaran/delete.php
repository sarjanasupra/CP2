<?php
require "../../../core/config.php";

$q = "DELETE FROM jenis_pengeluaran WHERE ID_JENISPENGELUARAN = '".$_GET['id']."'";		
		mysqli_query($conn, $q);
		header('location:'.BASE_URL.'/menu/donasi/jenis-pengeluaran');