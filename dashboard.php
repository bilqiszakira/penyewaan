<?php
include "auth/cek_login.php"; include "koneksi.php";
function total($c,$t,$w=""){ $q=mysqli_query($c,"SELECT COUNT(*) n FROM $t $w"); return mysqli_fetch_assoc($q)['n'];}
$b=total($conn,'barang'); $p=total($conn,'pelanggan'); $s=total($conn,'transaksi',"WHERE status='Disewa'"); $k=total($conn,'transaksi',"WHERE status='Dikembalikan'");
?><!doctype html><html><head><title>Dashboard</title><link rel="stylesheet" href="assets/style.css"></head><body>
<div class="sidebar"><h2>PENYEWAAN</h2><a href="dashboard.php">Dashboard</a><?php if($_SESSION['role']=='admin'): ?><a href="users/index.php">Data User</a><?php endif; ?><a href="barang/index.php">Barang</a><a href="kategori/index.php">Kategori</a><a href="pelanggan/index.php">Pelanggan</a><a href="transaksi/index.php">Transaksi</a><a href="pengembalian/index.php">Pengembalian</a><a href="laporan.php">Laporan</a><a href="logout.php">Logout</a></div>
<div class="content"><h1>Dashboard</h1><p>Selamat datang <b><?=$_SESSION['nama']?></b> (<?=$_SESSION['role']?>)</p><div class="cards">
<div class="card"><h3>Barang</h3><h1><?=$b?></h1></div><div class="card"><h3>Pelanggan</h3><h1><?=$p?></h1></div><div class="card"><h3>Sedang Disewa</h3><h1><?=$s?></h1></div><div class="card"><h3>Selesai</h3><h1><?=$k?></h1></div></div></div></body></html>