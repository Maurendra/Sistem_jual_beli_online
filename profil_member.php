<?php 
session_start();
include "koneksi.php";
if (isset($_SESSION['id'])) {	
	$rs = $mysqli->query("SELECT * FROM member where id_member = $_SESSION[id]");
	$dataMember = mysqli_fetch_array($rs);
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="table.css">
		<link rel="stylesheet" href="master.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php echo "$dataMember[username]" ?></title>
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
		<!--header end-->
		<!--wrapper-->
		<div id="wrapper">


			<!--Registration-->
			<div id="id02" class="modal">

				<form class="modal-content animate" action="/action_page.php">
					<div class="imgcontainer">
						<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>

					</div>

					<div class="container">
						<label><b>Username</b></label>
						<input type="text" placeholder="Username" name="name" required>

						<label><b>Tanggal Lahir</b></label>
						<input type="text" placeholder="Tanggal Lahir" name="tgl" required>

						<label><b>Nomer HP</b></label>
						<input type="text" placeholder="Nomer HP" name="nomerhp" >

						<label><b>Email</b></label>
						<input type="email" placeholder="Email" name="email" required>

						<label><b>Password</b></label>
						<input type="password" placeholder="Enter Password" name="psw" required>

						<button type="submit">Daftar</button>

					</div>

					<div class="container" style="background-color:#f1f1f1">
						<button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>

					</div>
				</form>
			</div>

			<script>
				var modal = document.getElementById('id02');

			</script>
			<!--Registration end-->



			<!--content-->
			<div class="content">
				<div id="modalSendMessage" class="modal" style="">
					<!-- Modal content -->
					<div class="user_modal-content" style="margin-left: 30em; width: 50em;">
						<div class="user_modal-header">
							<h2>Kirim Pesan Anda</h2>
							<span class="close" onclick="document.getElementById('modalSendMessage').style.display='none'">&times;</span>
						</div>
						<div class="container" style="margin-left: 5em;">
							<textarea name="message_value" id="" cols="30" rows="10"></textarea>
							<form action="send_message.php" method="POST">
								<input type="submit" value="Send">
							</form>
						</div>
						<div class="user_modal-body">

						</div>
						<div class="user_modal-footer">

						</div>
					</div>
				</div>
				<div id="modalReadMessage" class="modal" style="">
					<!-- Modal content -->
					<div class="user_modal-content" style="margin-left: 30em; width: 50em;">
						<div class="user_modal-header" >
							<h2>Pesan Anda</h2>
							<span class="close" onclick="document.getElementById('modalReadMessage').style.display='none'">&times;</span>
						</div>
						<div class="container" >
							<div>Pesan pesan Anda</div>
							<hr style="border: solid black;">
							<div>Pesan pesan Anda</div>
							<hr style="border: solid black;">
						</div>
						<div class="user_modal-body">

						</div>
						<div class="user_modal-footer">

						</div>
					</div>
				</div>
				<div id="modalReadNotif" class="modal" style="">
					<!-- Modal content -->
					<div class="user_modal-content" style="margin-left: 30em; width: 50em;">
						<div class="user_modal-header">
							<h2>Notifikasi Anda</h2>
							<span class="close" onclick="document.getElementById('modalReadNotif').style.display='none'">&times;</span>
						</div>
						<div class="container" >
							<div>Notifikasi Anda</div>
							<hr style="border: solid black;">
							<div>Notifikasi Anda</div>
							<hr style="border: solid black;">
						</div>
						<div class="user_modal-body">

						</div>
						<div class="user_modal-footer">

						</div>
					</div>
				</div>
				<div class="content_user">
					<h2 ><?php echo "$dataMember[nama]" ?></h2>
					<div class="foto_profile">
						<img src="default_picture_upload.jpg" alt="">
					</div>
					<div class="biodata">
						<table>
							<form action="index.php" method="POST">
								<tr>
									<td >Username</td>
									<td > : </td>
									<td ><input type="text" name="username" value="<?php echo "$dataMember[username]" ?>"></td>
								</tr>
								<tr>
									<td >Nama</td>
									<td > : </td>
									<td ><input type="text" name="nama" value="<?php echo "$dataMember[nama]" ?>"></td>
								</tr>
								<tr>
									<td >Tempat Tanggal Lahir</td>
									<td > : </td>
									<td ><input type="text" name="ttl" value="<?php echo "$dataMember[ttl]" ?>"></td>
								</tr>
								<tr>
									<td >Email</td>
									<td > : </td>
									<td ><input type="text" name="email" value="<?php echo "$dataMember[email]" ?>"></td>
								</tr>
								<tr>
									<td >No. Hp</td>
									<td > : </td>
									<td ><input type="text" name="no_hp" value="<?php echo "$dataMember[no_hp]" ?>"></td>
								</tr>
							</table>

						</div>
					</div>


					<div id="panel_user">
						<button class="edit_profile_button" type="submit" name="button" value="Edit">Edit Akun</button>
					</form>
					<button id="myBtn" class="edit_profile_button " type="button" name="button" onclick="document.getElementById('modalSendMessage').style.display='block'">Kirim Pesan</button>
					<button id="btnReadPesan" class="edit_profile_button " type="button" name="button" onclick="document.getElementById('modalReadMessage').style.display='block'">Pesan ()</button>
					<button id="btnReadPesan" class="edit_profile_button " type="button" name="button" onclick="document.getElementById('modalReadNotif').style.display='block'">Notifikasi ()</button>
				</div>

				<div class="daftar_iklan_member">
					<table cellpadding="5" width="900px" align="center">
						<thead>
							<tr>
								<th>JUDUL</th>
								<th>HARGA</th>
								<th>KATEGORI</th>
								<th>AKSI</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$rs = $mysqli->query("SELECT * FROM produk where id_member = $_SESSION[id]");
							while ($hasil = mysqli_fetch_array($rs)){
								?>
								<tr >
									<td > <a href="form_produk.php?id_produk=<?php echo "$hasil[id_produk]" ?>"><?php echo "$hasil[judul]" ?></a></td>
									<td > <?php echo "$hasil[harga]" ?></td>
									<td > <?php echo "$hasil[kategori]" ?></td>
									<td > 
										<a href="database.php?ID=<?php echo "$hasil[id_produk]" ?>&olahData=delete">
											<button type="submit" name="olahData" value="delete">DELETE</button>
										</a>
									</td>
								</tr>
								<?php
							}
							?>
							<td><a href="form_produk.php?id_member=<?php echo "$_SESSION[id]" ?> "><button type="submit" name="olahData" value="tambah">TAMBAH PRODUK</button></a></td>
							<tbody>
							</table>
						</div>
					</div>
					<!--footer-->
					<footer>
						<div class="footer">
						</div>
					</footer>
				</div>
				<script>

					var modal = document.getElementById('modalSendMessage');

					window.onclick = function(event) {
						if (event.target == modal) {
							modal.style.display = "none";
						}
						if(event.target == modal2){
							modal2.style.display == "none";
						}
					}
				</script>
			</body>
			</html>
			<?php
		}else{
			header("location: home.php");
		}
		?>

