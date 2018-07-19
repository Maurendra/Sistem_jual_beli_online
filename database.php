<?php 
session_start();
include "koneksi.php";
if (isset($_GET['olahData'])) {
	if (($_GET['olahData'])=="delete") {
		$id=$_GET["ID"];
		$rs = $mysqli->query("DELETE from produk where id_produk=$id");
		header("location: profil_member.php");
	}
	else{
		echo "ye";
	}
}
if (isset($_POST['olahData'])) {
	if (($_POST['olahData'])=="Save") {
		$id=$_SESSION['id'];
		$file_tmp = $_FILES['file']['tmp_name'];
		$nama = $_FILES['file']['name'];
		$rs = $mysqli->query("INSERT INTO produk VALUES ('$id',
			'NULL',
			'$_POST[judul]',
			'$_POST[harga]',
			'$_POST[kategori]',
			'$_POST[deskripsi]',
			'0',
			'0',
			'0',
			'$nama')");
		move_uploaded_file($file_tmp, 'image/'.$nama);
		header("location: profil_member.php");
	}elseif (($_POST['olahData'])=="Edit") {
		$id=$_SESSION['id'];
		$file_tmp = $_FILES['file']['tmp_name'];
		$nama = $_FILES['file']['name'];
		$rs = $mysqli->query("UPDATE produk 
			SET
			judul = '$_POST[judul]',
			harga = '$_POST[harga]',
			kategori = '$_POST[kategori]',
			deskripsi = '$_POST[deskripsi]',
			gambar = '$nama'
			WHERE id_produk = '$_POST[id_produk]' ");
		move_uploaded_file($file_tmp, 'image/'.$nama);
		echo "ya";
		header("location: profil_member.php");
	}
}
?>