<?php
session_start();
include "koneksi.php";
$username = $koneksi->real_escape_string($_POST['username']);
//$password = $koneksi->real_escape_string(md5($_POST['password']));
$password_ = $koneksi->real_escape_string($_POST['password']);
$password = hash('SHA512', $password_);

$sql=$koneksi->query("SELECT * FROM user WHERE username= '$username' and password='$password'");
$row= $sql->fetch_assoc();
$result= $sql->num_rows;

//21232f297a57a5a743894a0e4a801fc3
//c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec

if ($result==TRUE)
{
  
    $user_id=$row['user_id'];
    $token=md5($username.$password);
    date_default_timezone_set('Asia/Jakarta');
    //$last_login=date('Y-m-d H:i:s');

    $koneksi->query("UPDATE user set last_login=now(), token='$password_hash' where user_id='$user_id' ");

    $_SESSION['user_id']=$row['user_id'];
    $_SESSION['username']=$row['username'];

    header("location:admin/index.php");  
    
} else {

	 echo"<script>alert('Username atau password salah !');document.location.href='login.php';</script>";

}
?>