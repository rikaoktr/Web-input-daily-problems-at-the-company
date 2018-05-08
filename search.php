<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $nama = $_SESSION['nama'];
    $divisi = $_SESSION['divisi'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>

<?php
include "koneksi.php"; // menghubungkan ke file koneksi.php agar terhubung dengan database

?>

<!DOCTYPE html>
<html>
<head>
 <title>Lihat Data</title>
 <link rel="stylesheet" type="text/css" href="style4.css">
<!-- CSS untuk mempercantik tampilan-->
 <style type="text/css">
td{
 text-align: center;
}
</style>

</head>

<body>
<link rel="stylesheet" type="text/css" href="stylesearch.css">
<fieldset>
<legend><h1>Data permasalahan PT.Telkom</h1></legend>
 <div style="margin-bottom:15px;" align="right">
  <form action="" method="post">
  <tr><td>Masalah</td><td>  
<input type="text" name="input_cari" placeholder="Cari Berdasar Masalah" class="css-input" style="width:250px;" />
<input type="submit" name="cari" value="Cari" class="btn" style="padding:3px;" margin="6px;" width="50px;"  />
  </select>
 </div>
 <a href="search.php"> 
<button onClick="window.print();">Print</button> 
</a>

 <table width="100%" border="1px solid #ffffff" style="border-collapse:collapse;">
  <tr style="background-color:#ffffff;">
   <th>No</th>
   <th>Nama</th>
   <th>Divisi</th>
   <th>Tanggal Masalah</th>
   <th>Masalah</th>
   <th>Penanganan Masalah</th>
   <th>Update</th>
   <th>delete</th>
  </tr>
   </form>
   <?php 

   $input_cari = @$_POST['input_cari']; 
   $cari = @$_POST['cari'];

   if($cari) {

    if($input_cari != "") {
    $sql = mysql_query("select * from input where masalah like '%$input_cari%'") or die (mysql_error());   
    } else {
    $sql = mysql_query("select * from input") or die (mysql_error());
    }
    } else {
    $sql = mysql_query("select * from input") or die (mysql_error());
    }

   // mengecek data
   $cek = mysql_num_rows($sql);
   // jika data kurang dari 1
   if($cek < 1) {
    ?>
     <tr> <!--muncul peringata bahwa data tidak di temukan-->
      <td colspan="7" align="center style="padding:10px;""> Data Tidak Ditemukan</td>
     </tr>
    <?php
   } else {

   // mengulangi data agar tidak hanya 1 yang tampil
   while($data = mysql_fetch_array($sql)) {

   ?>
   <tr>
    <td><?php echo $data['id'] ?></td>
    <td><?php echo $data['nama'] ?></td>
	<td><?php echo $data['divisi'] ?></td>
    <td><?php echo $data['tgl_masalah'] ?></td>
	<td><?php echo $data['masalah'] ?></td>
    <td><?php echo $data['penanganan_masalah'] ?></td>
    
    <td align="center">
    <a href="edit.php?id=<?php echo $data['id'];?>"><img src="JAVA_VIDEOS_TUTORIALS/update.png" width ="30" height ="30"></a>
    </td>
	<td align="center">
	<a href="del.php?id=<?php echo $data['id'];?>"><img src="JAVA_VIDEOS_TUTORIALS/delete.jpg" width ="30" height ="30"></a>
    </td>
    </tr>
  <?php 

  } 
 }
?>
 </table>
</fieldset>
</body>
</html>
