<?php
  require "../core/config.php";
   session_start();
   if(isset($_SESSION['user'])) {
    header('location:'.BASE_URL); 
    }
?>

<title>Form Login</title>
<div align='center'>
  <form action="<?= BASE_URL ?>/admin/process/login.php" method="post">
  <h1>Masuk</h1>
  <table>
  <tbody>
  <tr><td>Username</td><td> : <input name="username" type="text" required=""></td></tr>
  <tr><td>Password</td><td> : <input name="password" type="password" required=""></td></tr>
  <tr><td colspan="2" align="right"><input value="Login" type="submit"> <input value="Batal" type="reset"></td></tr>
  <tr><td colspan="2" align="center">Belum Punya akun ? <a href="daftaradmin.php"><b>Daftar</b></a></td></tr>
  </tbody>
  </table>
  </form>
</div>