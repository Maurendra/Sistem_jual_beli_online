<?php
session_start(); 
include "model/model.php";
include "koneksi.php";
$model = new model();
if (($_POST['button'])=="Daftar") {
	$model->insertMember(NULL, $_POST['username'], $_POST['nama'], $_POST['ttl'], $_POST['no_hp'], $_POST['email'], md5($_POST['password']));
	header("location: home.php");
}elseif (($_POST['button'])=="Login") {
	$rs = $mysqli->query("SELECT * FROM member");
	while ($hasil = mysqli_fetch_array($rs)){
		if (((($_POST['uname'])==($hasil['email'])) || (($_POST['uname'])==($hasil['username']))) &&(md5($_POST['psw'])==($hasil['password']))) {
			$_SESSION['user'] = $_POST['uname'];
			$_SESSION['id'] = $hasil['id_member'];
			header("location: home.php");
		}
	}
}elseif (($_POST['button'])=="Logout") {
	session_destroy();
	header("location: home.php");
}elseif(($_POST['button'])=="Edit"){
	$rs = $mysqli->query("UPDATE member 
		SET username = '$_POST[username]',
		nama = '$_POST[nama]',
		ttl = '$_POST[ttl]',
		no_hp = '$_POST[no_hp]',
		email = '$_POST[email]'
		WHERE id_member = '$_SESSION[id]' ");
	header("location: profil_member.php");
}
?>