<?php 
class model{
	function __construct(){
		$connect = mysqli_connect("localhost", "root", "", "Project");
	}

	function execute($query){
		$connect = mysqli_connect("localhost", "root", "", "Project");
		return mysqli_query($connect, $query);
	}

	function selectAllProdukFromKategori($kategori){
		$query = "select * from produk where kategori='$kategori' ";
		return $this->execute($query);
	}

	function selectProdukFromID($ID){
		$query = "select * from produk where id_produk='$ID' ";
		return $this->execute($query);
	}

	function selectAllProduk(){
		$query = "select * from produk";
		return $this->execute($query);
	}

	function insertMember($id, $username, $nama, $ttl, $no_hp, $email, $password){
		$query = "insert into member values ('$id', '$username', '$nama', '$ttl', '$no_hp', '$email', '$password')";
		return $this->execute($query);
	}

	function insertProduk($id_member, $id_produk, $judul, $harga, $kategori, $deskripsi, $status_laku, $status_konfirm, $status_komen, $gambar){
		$query = "insert into produk values ('$id_member', '$id_produk', '$judul', '$harga', '$kategori', '$deskripsi', '$status_laku', '$status_konfirm', '$status_komen', '$gambar')";
		return $this->execute($query);
	}

	function insertKomen($id_member, $id_produk, $komen){
		$query = "insert into komen values ('$id_member', '$id_produk', '$komen')";
		return $this->execute($query);
	}

	function insertOrderProduk($id_member, $id_produk, $status_read){
		$query = "insert into orderproduk values ('$id_member', '$id_produk', '$status_read')";
		return $this->execute($query);
	}

	function insertPesanMember($id_member, $id_produk, $pesan, $status_read){
		$query = "insert into pesanmember values ('$id_member', '$id_produk', '$pesan', '$status_read')";
		return $this->execute($query);
	}

	function updateMember($id, $username, $nama, $ttl, $no_hp, $email, $password){
		$query = "update member set username='$username', nama='$nama', ttl='$ttl', no_hp='$no_hp', email='$email', password='$password' where id_member='id' ";
		return $this->execute($query);
	}

	function updateProduk($id_member, $id_produk, $judul, $harga, $kategori, $deskripsi, $status_laku, $status_konfirm, $status_komen, $gambar){
		$query = "update produk set judul='$judul', harga='$harga', kategori='$kategori', deskripsi='$deskripsi', status_laku='$status_laku', status_konfirm='$status_konfirm', status_komen='$status_komen', gambar='$gambar' where id_produk='$id_produk' ";
		return $this->execute($query);
	}

	function deleteMember($id_member){
		$query = "delete from member where id_member='$id_member' ";
		return $this->execute($query);
	}

	function deleteProduk($id_produk){
		$query = "delete from produk where id_produk='$id_produk' ";
		return $this->execute($query);
	}

}
?>
