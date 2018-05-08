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
			<li><a href="index.php?page=home">Home</a></li>
			<li><a href="index.php?page=tentangtelkom">Tentang Telkom</a></li>
			<li><a href="system.php?page=login/Sign-up">Login/Sign-up</a></li>
		</ul>
	</div>
 
	<div class="badan">
 
 
	<?php 
	if(isset($_GET['page'])){
		$page = $_GET['page'];
 
		switch ($page) {
			case 'home':
				include "halaman/home.php";
				break;
			case 'tentangtelkom':
				include "halaman/tentangtelkom.php";
				break;	
			case 'login/Sign-up':
				include "system.php";
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