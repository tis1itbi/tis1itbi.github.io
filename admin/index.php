<?php
  session_start();
  if (empty($_SESSION['user_id'])){
    header("location:../login.php");
  }
?>

Hello <?php echo $_SESSION['username']; ?><br>
<a href="../logout.php">Logout</a> 
| 
<a href="add-user.php">Tambah User</a>