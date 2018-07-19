<?php 
session_start();
error_reporting(0);
if (isset($_SESSION['id'])) {
	if (isset($_GET['id_produk'])) {
		include "koneksi.php";
		$rs = $mysqli->query("SELECT * FROM produk where id_produk = $_GET[id_produk]");
		$produk = mysqli_fetch_array($rs);
		$judul="Edit Iklan";
		$jenisOlah="Edit";
	}else{
		$judul="Buat Iklan";
		$jenisOlah="Save";
	}
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="master.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Form Produk</title>
	</head>
	<body>
		<!--header-->
		<header>
			<div class="header">
				<div class="header_top">

					<div class="login-regis">
						<?php 
						if (isset($_SESSION['id'])) {
							?>
							<form action="index.php" method="POST">
								<input type="submit" name="button" value="Logout">
							</form>
							<?php
						}else{
							?>
							<h3><a href="#" onclick="document.getElementById('id01').style.display='block'"> Login </a>  </h3>
							<h3><a href="#" onclick="document.getElementById('id02').style.display='block'"> Registrasi </a></h3>
							<?php
						}
						?>
					</div>

					<div class="logo">
						<a href="home.php"><img src="image/unity-logo.png" alt=""></a>
					</div>
					<div class="search">
						<form class="" action="daftar_iklan.html" method="post">
							<input type="text" name="search" placeholder="Pencarian, barang, pakaian, aksesosis dan lain-lain">
							<input type="submit" name="submit" value="Search">
						</form>
					</div>



				</div>
				<div class="header_mid">
					<div class="menu">
						<ul>
							<li><a href="daftar_iklan.php?kategori=Elektronik">ELEKTRONIK</a></li>
							<li><a href="daftar_iklan.php?kategori=Pakaian">PAKAIAN</a></li>
							<li><a href="daftar_iklan.php?kategori=Mainan">MAINAN</a></li>
							<li><a href="daftar_iklan.php?kategori=Aksesoris">AKSESORIS</a></li>
							<li><a href="daftar_iklan.php?kategori=Sepatu">SEPATU</a></li>
							<?php 
							if (isset($_SESSION['user'])) {
								?>
								<li><a href="profil_member.php?id=<?php echo $_SESSION['id'] ?>">
									<img src="image/profil-default_foto.png" alt="" width="20" height="20">
									PROFIL
								</a></li>
								<?php
							}
							?>
						</ul>
					</div>
				</div>

			</div>
		</header>
		<!--Registration end-->
		<div class="form_produk">
			<h1><?php echo "$judul"; ?></h1>
			<div class="form_iklan">
				<form action="database.php" method="POST" name="form-login" enctype="multipart/form-data">
					<table style="font-style: oblique; font-weight: bold; font-size: 20px;">
						<tr>
							<td width="150">Judul</td>
							<td width="30">:</td>
							<td width="550"><input type="text" name="judul" class="form-control" minlength="3" placeholder="Judul Iklan Anda" value="<?php echo "$produk[judul]" ?>" required /></td>
						</tr>
						<tr height="15"></tr>
						<tr>
							<td width="150">Harga</td>
							<td width="30">:</td>
							<td width="550"><input type="text" name="harga" class="form-control" minlength="3" placeholder="Harga" value="<?php echo "$produk[harga]" ?>" required /></td>
						</tr>
						<tr height="15"></tr>

						<tr>
							<td width="150">Kategori</td>
							<td width="30">:</td>
							<td width="550">
								<select name="kategori" id="" required>
									<option value="-" selected="selected">-</option>
									<option value="Pakaian">Pakaian</option>
									<option value="Sepatu">Sepatu</option>
									<option value="Elektronik">Elektronik</option>
									<option value="Aksesoris">Aksesoris</option>
									<option value="Mainan">Mainan</option>
								</select>
							</td>
						</tr>
						<tr height="15"></tr>
						<tr>
							<td width="150">Deskripsi</td>
							<td width="30">:</td>
							<td width="550"><textarea name="deskripsi" id="" cols="80" rows="20" value="<?php echo "$produk[deskripsi]" ?>"></textarea></td>
						</tr>
						<tr height="15"></tr>
						<tr>
							<td width="150">Foto</td>
							<td width="30">:</td>
							<td width="550">
								<input type="file" name="file" ></td>
							</tr>
							<tr height="15"></tr>
							<tr>
								<td width="150"><input type="hidden" name="id_produk" value="<?php echo "$produk[id_produk]"; ?>"></td>
								<td width="30"></td>
								<td width="550"><input type="submit" name="olahData" value="<?php echo "$jenisOlah"; ?>"></td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>
		<!--footer-->
		<footer>
			<div class="footer">
			</div>
		</footer>
	</div>

</body>
</html>
<?php
}else{
	header("location: home.php");
}
?>