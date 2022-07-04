<?php
   session_start();
  if (empty($_SESSION['user_id'])){
    header("location:../login.php");
  }
include "../koneksi.php";
$username = $koneksi->real_escape_string($_POST['username']);
//$password = $koneksi->real_escape_string(md5($_POST['password']));
$password_ = $koneksi->real_escape_string($_POST['password']);
$password = hash('SHA512', $password_);

$email = $koneksi->real_escape_string($_POST['email']);



$sql=$koneksi->query("INSERT INTO 
	user(username,password,email,status) values('$username','$password','$email','1')");

	 echo"<script>alert('Penyimpanan berhasil !');document.location.href='index.php';</script>";

?>