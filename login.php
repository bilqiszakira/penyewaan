<?php
session_start(); include "koneksi.php";
if(isset($_SESSION['login'])){ header("Location: dashboard.php"); exit; }
$error="";
if(isset($_POST['login'])){
 $u=mysqli_real_escape_string($conn,$_POST['username']);
 $p=md5($_POST['password']);
 $q=mysqli_query($conn,"SELECT * FROM users WHERE username='$u' AND password='$p'");
 if(mysqli_num_rows($q)){
  $d=mysqli_fetch_assoc($q);
  $_SESSION['login']=true; $_SESSION['id']=$d['id']; $_SESSION['nama']=$d['nama']; $_SESSION['role']=$d['role'];
  header("Location: dashboard.php"); exit;
 } else $error="Username atau password salah!";
}
?>
<!doctype html><html><head><title>Login Penyewaan</title><link rel="stylesheet" href="assets/style.css"></head>
<body class="login-body"><div class="login-box"><h2>APLIKASI PENYEWAAN</h2><p>Login untuk masuk</p>
<?php if($error): ?><div class="error"><?=$error?></div><?php endif; ?>
<form method="post"><input name="username" placeholder="Username" required><input type="password" name="password" placeholder="Password" required><button name="login">LOGIN</button></form>
<p><small>Admin: admin / admin123<br>Petugas: petugas / petugas123</small></p></div></body></html>