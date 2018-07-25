<?php
   require "../core/config.php";
   session_start();
   if(isset($_SESSION['user'])) {
   header('location:'.BASE_URL); }
?>

<title>Form Pendaftaran</title>
<div align='center'>
  <form action="process/prosesdaftar.php" method="post">
  <table>
  <tbody>
  <tr><td colspan="2" align="center"><h1>Daftar Baru</h1></td></tr>
  <tr><td>Username</td><td> : <input name="USERNAME" type="text"></td></tr>
  <tr><td>Nama</td><td> : <input name="NAMA_USER" type="text"></td></tr>
  <tr><td>Password</td><td> : <input name="PASSWORD" type="password"></td></tr>
  <tr><td>Jabatan</td><td> : <input name="JABATAN" type="text"></td></tr>
  <tr><td>Telepon</td><td> : <input name="TELEPON" type="text"></td></tr>
  <tr><td colspan="2" align="right"><input value="Daftar" type="submit"> <input value="Batal" type="reset"></td></tr>
  <tr><td colspan="2" align="center">Sudah Punya akun ? <a href="<?= BASE_URL ?>/admin/login.php"><b>Login</b></a></td></tr>
  </tbody>
  </table>
  </form>
</div>