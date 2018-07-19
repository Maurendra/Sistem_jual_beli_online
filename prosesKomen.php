<?php 
session_start();
if (isset($_SESSION['id'])) {
include "koneksi.php";
$id=$_POST["id_produk"];
$rs = $mysqli->query("INSERT INTO komen VALUES   
	('$_SESSION[id]',
	'$id',
	'$_POST[comment_value]')");
header("location: produk.php");
}else{
	header("location: home.php");
}

?>