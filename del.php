<?php
include "db2.php";
$id = $_GET ['id'];

$del = mysql_query("DELETE FROM `input` WHERE id = '$id'");

header("location:search.php");

?>