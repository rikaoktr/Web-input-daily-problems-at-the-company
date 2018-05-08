<!DOCTYPE html>
<html>
<head>
	<title>TELKOM SOLVING PROBLEM</title>
	<!-- menghubungkan dengan file css -->
	<link rel="stylesheet" type="text/css" href="style.css">
	<!-- menghubungkan dengan file jquery -->
	<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
<div class="content">
	<header>
		<h1 class="judul">PT.TELKOM</h1>
		<h3 class="deskripsi">Masalah pada PT.TELKOM</h3>
	</header>
 
	<div class="menu">
		<ul>
			<li><a href="index2.php?page=beranda">beranda</a></li>
			<li><a href="input.php?page=inputmasalah">Input Masalah</a></li>
			<li><a href="search.php?page=tentang">daftar Masalah</a></li>
			<li><a href="logout.php?page=logout">Logout</a></li>
		</ul>
	</div>
 
	<div class="badan">
 
 
	<?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];
 
		switch ($page) {
			case 'beranda':
				include "halaman/beranda.php";
				break;
			case 'input Masalah':
				include "input.php";
				break;
			case 'daftar masalah';
				include "search.php";
				break;	
			case 'logout';
				include "logout.php";
				break;
			default:
				echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
				break;
		}
	}else{
		include "halaman/home.php";
	}
 
	 ?>
 
	</div>
</div>
</body>
</html>