<style type="text/css">
#logoutbtn {
    color: rgba(255,255,255,.5);
    background: #AA5670;
    padding-top: 20px;
    padding-left:10px;
    padding-right:10px;
}
#logoutbtn a {
    background: #AA5670;
}
#logoutbtn {
    display: block;
    position: relative;
    float: right;
    height: 58px;
    line-height: 1;
    z-index: 999;
  }
</style>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row0">
  <header id="header" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <div id="logo" class="one_quarter first">
      <a href="index.html"><img src="<?= BASE_URL ?>/images/ysys.png" style="width:35%"></a>
    </div>
    <div class="three_quarter">
    <h1>Yayasan Sohibul Yatim Surabaya</h1>
      <ul class="nospace clear">
        <li class="one_third first">
          <div class="block clear"><a href="#"><i class="fas fa-phone"></i></a> <span><strong>Telepon :</strong> +62 821-3214-2030</span></div>
        </li>
        <li class="one_third">
          <div class="block clear"><a href="#"><i class="fas fa-envelope"></i></a> <span><strong>Email :</strong> YayasanSohibul@mail.com</span></div>
        </li>
        <li class="one_third">
          <div class="block clear"><a href="#"><i class="fas fa-clock"></i></a> <span><strong> Setiap Hari:</strong> 09.00am - 18.00pm</span></div>
        </li>
      </ul>
    </div>
    <!-- ################################################################################################ -->
  </header>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<div class="wrapper row1">
  <section class="hoc clear"> 
    <!-- ################################################################################################ -->
    <nav id="mainav">
      <ul class="clear">
        <li class="active"><a href="<?= BASE_URL ?>">Beranda</a></li>
        <li><a href="<?= BASE_URL ?>/menu/yatim">Anak Yatim</a></li>
        <li><a href="<?= BASE_URL ?>/menu/donatur">Donatur</a></li>
        <!-- <li><a href="<?= BASE_URL ?>/menu/program">Program</a></li> -->
        <!-- <li><a href="<?= BASE_URL ?>/menu/berita">Berita</a></li> -->
        <li><a href="<?= BASE_URL ?>/menu/galeri">Galeri</a></li>
        <li><a href="<?= BASE_URL ?>/menu/donasi?donasi=masuk">Donasi Online</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
    <?php if(isset($_SESSION['user'])){ ?>
    <div id="logoutbtn">
      <div>
          <strong><a href="<?= BASE_URL ?>/admin/logout.php">Logout</a></strong>
      </div>
    </div>
    <?php } ?>
    <!-- ################################################################################################ -->
  </section>
</div>