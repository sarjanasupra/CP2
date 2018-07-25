<?php
require "core/config.php";
session_start();
?>

<!DOCTYPE html>


<html lang="">
<!-- To declare your language - read more here: https://www.w3.org/International/questions/qa-html-language-declarations -->
<head>
<title>Yayasan Sohibul Yatim Surabaya</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>
<body id="top">

<?php include TEMPLATEPATH.'_header.php'; ?>


<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/01.png');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
      <h2 class="heading">YAYASAN SOHIBUL YATIM</h2>
      <p>SURABAYA</p>
      <footer><a class="btn" href="#">DONASI ONLINE<i class="fas fa-angle-right"></i></a></footer>
    </article>
    <!-- ################################################################################################ -->
  </div>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h6 class="heading">Pengurus Yayasan</h6>
    </div>
    <div class="group center btmspace-80">
      <article class="one_third first"><a class="ringcon btmspace-50" href="#"><i class="fas fa-cube"></i></a>
        <h6 class="heading">Ketua</h6>
        <p>Bapak Fadli</p>
      </article>
      <article class="one_third"><a class="ringcon btmspace-50" href="#"><i class="fas fa-chart-pie"></i></a>
    
            <h6 class="heading">Wakil</h6>
        <p>Bapak</p>
      </article>
      <article class="one_third"><a class="ringcon btmspace-50" href="#"><i class="fas fa-paw"></i></a>
        <h6 class="heading">Sekertaris</h6>
        <p>Ibu</p>
      </article>
    </div>
    <!-- / main body -->
  </main>
</div>

<?php include TEMPLATEPATH.'_footer.php'; ?>

<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>