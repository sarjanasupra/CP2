<?php
require "../../core/config.php";

$q = "DELETE FROM yatim WHERE ID_YATIM = '".$_GET['id']."'";		
		mysqli_query($conn, $q);
		header('location:'.BASE_URL.'/menu/donatur/');