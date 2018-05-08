<?php 
include "db2.php";  
if (isset ($_POST['done']))
{
	
$nama =  $_POST['nama'];
$divisi =  $_POST['divisi']; 
$tanggal = $_POST['tanggal']; 
$masalah = $_POST['masalah']; 
$penanganan_masalah =  $_POST['penanganan_masalah'];
function ubahTanggal($tanggal){
 $pisah = explode('/',$tanggal);
 $array = array($pisah[2],$pisah[0],$pisah[1]);
 $satukan = implode('-',$array);
 return $satukan;
}
 
$tgl_masalah = ubahTanggal($tanggal);
 
$insert = mysql_query("INSERT INTO `input`(`nama`, `divisi`, `tgl_masalah`, `masalah`, `penanganan_masalah` ) VALUES ('$nama', '$divisi', '$tgl_masalah', '$masalah', '$penanganan_masalah')");
if($insert)
{
	header("location: search.php");
}
else
{
	echo "error";
}
}
?> 

<body>
<link rel="stylesheet" type="text/css" href="styleinput.css">
<link href="jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
<script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
<script src="jquery-ui-1.11.4/jquery-ui.js"></script>
<script src="jquery-ui-1.11.4/jquery-ui.min.js"></script>
<link rel="stylesheet" href="jquery-ui-1.11.4/jquery-ui.theme.css">
<script>
$(document).ready(function(){
$("#tanggal").datepicker({
})
})
</script>
<form method="POST"> 
<table border='2' width='50%' cellpadding='2'  cellspacing='2' 
align='center'> 

<caption><h2>Input Masalah</h2></caption> 
<tr><td>nama</td><td><input type="text" name="nama" size="50" 
maxlength="900"/></td></tr> 
<tr><td>Divisi</td><td>  
<select name="divisi"> 
<option value="Pilih Status Anda">Pilih divisi anda</option> 
<option value="Divisi 1">Divisi 1</option> 
<option value="Divisi 2">Divisi 2</option> 
</select> 
</td></tr> 
<tr><td>Tanggal</td><td><input type="text" name="tanggal" id="tanggal" size="50" 
maxlength="900"/></td></tr> 
<tr><td>masalah</td><td><input type="text" name="masalah"  size="50" 
maxlength="900"/></td></tr> 
<tr><td>penanganan masalah</td><td><input type="text" name="penanganan_masalah"  size="50" 
maxlength="900"/></td></tr> 
<tr><td></td><td><input type="submit" name="done"/></td></tr> 
</table> 
</body>