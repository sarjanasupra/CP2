<?php

require "../../core/config.php";
session_start();


$namafolder=FCPATH."/images/galeri/"; //folder tempat menyimpan file
if (!empty($_FILES["foto"]["tmp_name"]))
{
	$deskripsi = $_POST['keterangan'];
    $jenis_gambar=$_FILES['foto']['type'];
    if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
    {          
    	$temp = explode(".", $_FILES["foto"]["name"]); //mengambil ekstensi gambar
		$gambar = $namafolder . rand(3, 10) . round(microtime(true)) . '.' . end($temp); //menyimpan dengan nama file gambar baru
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $gambar)) {
           $simpan= "INSERT INTO galeri VALUES ('','$gambar','$deskripsi')";
           mysqli_query($conn,$simpan);
       ?>
                <script language="javascript">
                    alert('Berhasil menambahkan');
                    document.location="../galeri";
                </script>
               <?php
        } else {
             ?>
                <script language="javascript">
                    alert('Gagal menambahkan');
                    document.location="";
                </script>
               <?php
        }
   } else {
        ?>
            <script language="javascript">
                alert('Gambar harus berformat .jpg .png .gif');
                document.location="";
            </script>
           <?php
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
      <h6 class="heading">GALERI</h6>
    </div>

		<form method="POST" action="" enctype="multipart/form-data">
			<label>Foto</label>
			<input type="file" class="form-control" name="foto">
			<br>
			<br>
			<label>Keterangan</label>
			<textarea class="form-control" name="keterangan"></textarea>
			<br>
			<br>
			<button type="submit">Simpan</button>
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