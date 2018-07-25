<?php
   require "../../core/config.php";

   $USERNAME = $_POST['USERNAME'];
   $NAMA_USER = $_POST['NAMA_USER'];
   $PASSWORD = $_POST['PASSWORD'];
   $JABATAN = $_POST['JABATAN'];
   $TELEPON = $_POST['TELEPON'];
   if (empty($USERNAME)){
	   echo "<script>alert('Username belum diisi')</script>";
	   echo "<meta http-equiv='refresh' content='1' url='".BASE_URL."/admin/daftaradmin.php'>";
	   }else
	if (empty($NAMA_USER)){
		echo "<script>alert('Nama belum diisi')</script>";
	   echo "<meta http-equiv='refresh' content='1' url='".BASE_URL."/admin/daftaradmin.php'>";
		}else 
	if(empty($PASSWORD)){
		echo "<script>alert('Password belum diisi')</script>";
	   echo "<meta http-equiv='refresh' content='1' url='".BASE_URL."/admin/daftaradmin.php'>";
		}else 
	if (empty($JABATAN)){
		echo "<script>alert('Jabatan belum diisi')</script>";
	   echo "<meta http-equiv='refresh' content='1' url='".BASE_URL."/admin/daftaradmin.php'>";
		}else{
	$conn = mysqli_query($conn, "insert into user(USERNAME, NAMA_USER, PASSWORD, JABATAN, TELEPON) values ('$USERNAME','$NAMA_USER','$PASSWORD','$JABATAN','$TELEPON')");
	if ($conn){
		echo "<script>alert('Berhasil Mendaftar')</script>";
		}else{
			echo "<script>alert('Gagal Mendaftar')</script>";
			}

			}
			header('location:'.BASE_URL.'/admin/login.php');
?>