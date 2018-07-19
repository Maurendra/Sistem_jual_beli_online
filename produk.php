<?php 
session_start();
error_reporting(0);
include "koneksi.php";
$id=$_GET["id_produk"];
if (isset($_POST['comment_value'])) {
	$rs = $mysqli->query("INSERT INTO komen VALUES   
		('$_SESSION[id]',
		'$id',
		'$_POST[comment_value]')");
}
$rs = $mysqli->query("SELECT * FROM produk where id_produk='$_GET[id_produk]' ");
$hasil = mysqli_fetch_array($rs);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="master.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>produkjual(nama web)</title>
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
			<div class="content_top produk_top">
				<div class="foto">
					<script>
						var slideIndex = 1;
						showDivs(slideIndex);

						function plusDivs(n) {
							showDivs(slideIndex += n);
						}

						function showDivs(n) {
							var i;
							var x = document.getElementsByClassName("Slidesproduk");
							if (n > x.length) {slideIndex = 1}
								if (n < 1) {slideIndex = x.length}
									for (i = 0; i < x.length; i++) {
										x[i].style.display = "none";
									}
									x[slideIndex-1].style.display = "block";
								}
							</script>
							<img class="Slidesproduk" src="image/<?php echo "$hasil[gambar]" ?>" >

						</div>
						<div class="description">
							<div class="judul_iklan">
								<h2><?php echo "$hasil[judul]" ?></h2>
							</div>
							<div class="harga_iklan">
								<h1>RP <?php echo "$hasil[harga]" ?>,00</h1>
							</div>
							<div class="tombolbeli_iklan">
								<button type="button" name="button" >Beli</button>
							</div>
						</div>

					</div>

					<div class="content_mid">
						<div class="detail">
							<h3>Detail Produk <?php echo "$hasil[judul]" ?></h3>
							<p><?php echo "$hasil[deskripsi]" ?></p>
						</div>
					</div>

					<div class="content_bottom produk_bawah">

						<div class="box box_mid">

						</div>
						<div class="box box_mid">

						</div>
						<div class="box box_mid">

						</div>
						<div class="box box_mid">

						</div>
						<div class="box box_mid">

						</div>

					</div>

					<!--comment-->
					<div class="comment">
						<form class="comment" action="#" method="post">
							<textarea name="comment_value" rows="8" cols="80"></textarea>
							<input type="hidden" name="id_produk" value="<?php echo "$produk[id_produk]"; ?>">
							<br>
							<input type="submit" name="comment" value="comment">
						</form>
						<hr>
						<div class="show_comment">
							<h3>KOMENTAR</h3>
							<?php 
							$rs = $mysqli->query("SELECT * from komen where id_produk=$_GET[id_produk]");
							while($hasilkomen = mysqli_fetch_array($rs)){
								echo $hasilkomen['komen'] ."<br>";
								?><hr color="red"><?php
							}
							?>
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
