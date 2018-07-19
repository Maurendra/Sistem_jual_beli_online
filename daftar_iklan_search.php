<?php 
error_reporting(0);
$search=$_POST['search'];
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="master.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daftar Iklan</title>
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
					<form class="" action="daftar_iklan_search.php" method="post">
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


		<!--login-->
		<div id="id01" class="modal">

			<form class="modal-content animate" action="/action_page.php">
				<div class="imgcontainer">
					<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

				</div>

				<div class="container">
					<label><b>Username</b></label>
					<input type="text" placeholder="Enter Username" name="uname" required>

					<label><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="psw" required>

					<button type="submit">Login</button>

				</div>

				<div class="container" style="background-color:#f1f1f1">
					<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>

				</div>
			</form>
		</div>

		<script>
			var modal = document.getElementById('id01');
			window.onclick = function(event) {
				if (event.target == modal) {
					modal.style.display = "none";
				}
			}
		</script>
		<!--login end-->

		<!--content-->
		<div class="content">
			<div class="daftar_iklan">
				<?php 
				include "koneksi.php";
				$rs = $mysqli->query("SELECT * FROM produk WHERE judul LIKE '%$search%' ");
				while ($hasil = mysqli_fetch_array($rs)){?>
				<div class="wrapper_box">
					<a href="produk.php?id_produk=<?php echo $hasil[id_produk] ?> ">
						<div class="box box_mid box_iklan" style="text-align:center;">
							<img src="image/<?php echo "$hasil[gambar]" ?>" alt="">
							<p><?php echo "$hasil[judul]" ?></p>
						</div>
					</a>
					<a href="produk.php?id_produk=<?php echo $hasil[id_produk] ?>"><button type="button" name="button" class="beli_edit_button readmore" href="produk.html">Read More</button></a>
				</div>
				<?php }
				?>
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