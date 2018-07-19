<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="master.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home(nama web)</title>
	<script>
		function cekPass(){
			var pass1=document.getElementById("password").value;
			var pass2=document.getElementById("re-password").value;
			if(pass1!=pass2){
				document.getElementById("notifpass").innerHTML="password tidak sama";
			}else{
				document.getElementById("notifpass").innerHTML="password sama";
			}
		}     
	</script>
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
					<a href="home.html"><img src="image/unity-logo.png" alt=""></a>
				</div>
				<div class="search">
					<form class="" action="daftar_iklan_search.php" method="POST">
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

			<form class="modal-content animate" action="index.php" method="POST">
				<div class="imgcontainer">
					<span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>

				</div>

				<div class="container">
					<label><b>Nama Lengkap</b></label>
					<input type="text" placeholder="Nama Lengkap Anda" name="nama" required>

					<label><b>Username</b></label>
					<input type="text" placeholder="Username" name="username" required>

					<label><b>Tanggal Lahir</b></label>
					<input type="text" placeholder="Tanggal Lahir" name="ttl" required>

					<label><b>Nomer HP</b></label>
					<input type="text" placeholder="Nomer HP" name="no_hp" >

					<label><b>Email</b></label>
					<input type="email" placeholder="Email" name="email" required>

					<label><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="password" required>

					<label><b>Ulangi Password Anda</b></label>
					<input type="password" placeholder="Enter Password" name="re-password" oninput="cekPass()" required> 
					<span id="notifpass"></span>

					<button type="submit" name="button" value="Daftar">Daftar</button>

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

			<form class="modal-content animate" action="index.php" method="POST">
				<div class="imgcontainer">
					<span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
				</div>
				<div class="container">
					<label><b>Username</b></label>
					<input type="text" placeholder="Enter Username" name="uname" required>

					<label><b>Password</b></label>
					<input type="password" placeholder="Enter Password" name="psw" required>

					<button type="submit" name="button" value="Login">Login</button>

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
			<div class="content_top">

				<div class="slide">
					<a href="#"><img class="mySlides" src="image/aksesoris-1.jpg" ></a>
					<a href="#"><img class="mySlides" src="image/sepatu-9.jpg" ></a>
					<a href="#"><img class="mySlides" src="image/mainan-8.jpg" ></a>

					<script>
						var myIndex = 0;
						carousel();

						function carousel() {
							var i;
							var x = document.getElementsByClassName("mySlides");
							for (i = 0; i < x.length; i++) {
								x[i].style.display = "none";
							}
							myIndex++;
							if (myIndex > x.length) {myIndex = 1}
								x[myIndex-1].style.display = "block";
                setTimeout(carousel, 2000); // Change image every 2 seconds
            }
        </script>

    </div>

    <div class="box">
    	<img src="image/logo-nike.jpg" alt="">
    </div>
    <div class="box">
    	<img src="image/logo-casio.png" alt="">
    </div>
    <div class="box">
    	<img src="image/logo-samsung.jpg" alt="">
    </div>
    <div class="box">
    	<img src="image/logo-ripcurl.png" alt="">
    </div>
</div>

<!--content1-->
<div class="content_mid one">
	<script>
		var slideIndex = 1;
		showDivs(slideIndex);

		function plusDivs(n) {
			showDivs(slideIndex += n);
		}

		function showDivs(n) {
			var i;
			var x = document.getElementsByClassName("Slides");
			if (n > x.length) {slideIndex = 1}
				if (n < 1) {slideIndex = x.length}
					for (i = 0; i < x.length; i++) {
						x[i].style.display = "none";
					}
					x[slideIndex-1].style.display = "block";
				}
			</script>

			<button class="button left" onclick="plusDivs(-1)">&#10094;</button>
			<div class="box_Slides">
				<div class="Slides SH">
					<?php 
					include "koneksi.php";
					$rs = $mysqli->query("SELECT * FROM produk where kategori='Elektronik' ");
					while ($hasil = mysqli_fetch_array($rs)){?>
					<a href="produk.php?id_produk=<?php echo $hasil['id_produk'] ?>">
						<div class="box box_mid" style="text-align:center;">
							<img src="image/<?php echo "$hasil[gambar]" ?> " alt="">
							<p><?php echo "$hasil[judul]" ?></p>
							<p style="color: #FF0A0A;">Rp. <?php echo "$hasil[harga]" ?> ,00</p>
						</div>
					</a>

					<?php
				}
				?>
			</div>
			<div class="Slides SH">
				<a href="produk.html"><div class="box box_mid">
					<img src="satu.jpg" alt="">
				</div>
			</a>
		</div>

	</div>
	<button class="button right" onclick="plusDivs(1)">&#10095;</button>
</div>

<!--content2-->
<div class="content_mid two">
	<script>
		var slideIndex = 1;
		showDivs2(slideIndex);

		function plusDivs2(n) {
			showDivs2(slideIndex += n);
		}

		function showDivs2(n) {
			var i;
			var x = document.getElementsByClassName("Slides2");
			if (n > x.length) {slideIndex = 1}
				if (n < 1) {slideIndex = x.length}
					for (i = 0; i < x.length; i++) {
						x[i].style.display = "none";
					}
					x[slideIndex-1].style.display = "block";
				}
			</script>

			<button class="button left" onclick="plusDivs2(-1)">&#10094;</button>
			<div class="box_Slides">
				<div class="Slides2 SH">
					<?php 
					include "koneksi.php";
					$rs = $mysqli->query("SELECT * FROM produk where kategori='Pakaian' ");
					while ($hasil = mysqli_fetch_array($rs)){?>
					<a href="produk.php?id_produk=<?php echo $hasil['id_produk'] ?>"><div class="box box_mid" style="text-align:center;">
						<img src="image/<?php echo "$hasil[gambar]" ?> " alt="">
						<p><?php echo "$hasil[judul]" ?></p>
						<p style="color: #FF0A0A;">Rp. <?php echo "$hasil[harga]" ?> ,00</p>
					</div>
				</a>

				<?php
			}
			?>
		</div>
		<div class="Slides2 SH">
			<a href="produk.html"><div class="box box_mid">
				<img src="satu.jpg" alt="">
			</div>
		</a>
	</div>

</div>
<button class="button right" onclick="plusDivs2(1)">&#10095;</button>
</div>
<!--content3-->
<div class="content_mid three">
	<script>
		var slideIndex = 1;
		showDivs3(slideIndex);

		function plusDivs3(n) {
			showDivs3(slideIndex += n);
		}

		function showDivs3(n) {
			var i;
			var x = document.getElementsByClassName("Slides3");
			if (n > x.length) {slideIndex = 1}
				if (n < 1) {slideIndex = x.length}
					for (i = 0; i < x.length; i++) {
						x[i].style.display = "none";
					}
					x[slideIndex-1].style.display = "block";
				}
			</script>

			<button class="button left" onclick="plusDivs3(-1)">&#10094;</button>
			<div class="box_Slides">
				<div class="Slides3 SH">
					<?php 
					include "koneksi.php";
					$rs = $mysqli->query("SELECT * FROM produk where kategori='Mainan' ");
					while ($hasil = mysqli_fetch_array($rs)){?>
					<a href="produk.php?id_produk=<?php echo $hasil['id_produk'] ?>"><div class="box box_mid" style="text-align:center;">
						<img src="image/<?php echo "$hasil[gambar]" ?> " alt="">
						<p><?php echo "$hasil[judul]" ?></p>
						<p style="color: #FF0A0A;">Rp. <?php echo "$hasil[harga]" ?> ,00</p>
					</div>
				</a>

				<?php
			}
			?>
		</div>
		<div class="Slides3 SH">
			<a href="produk.html"><div class="box box_mid">
				<img src="satu.jpg" alt="">
			</div>
		</a>
	</div>

</div>
<button class="button right" onclick="plusDivs3(1)">&#10095;</button>
</div>

<!--content4-->
<div class="content_mid four">
	<script>
		var slideIndex = 1;
		showDivs4(slideIndex);

		function plusDivs4(n) {
			showDivs4(slideIndex += n);
		}

		function showDivs4(n) {
			var i;
			var x = document.getElementsByClassName("Slides4");
			if (n > x.length) {slideIndex = 1}
				if (n < 1) {slideIndex = x.length}
					for (i = 0; i < x.length; i++) {
						x[i].style.display = "none";
					}
					x[slideIndex-1].style.display = "block";
				}
			</script>

			<button class="button left" onclick="plusDivs4(-1)">&#10094;</button>
			<div class="box_Slides">
				<div class="Slides4 SH">
					<?php 
					include "koneksi.php";
					$rs = $mysqli->query("SELECT * FROM produk where kategori='Aksesoris' ");
					while ($hasil = mysqli_fetch_array($rs)){?>
					<a href="produk.php?id_produk=<?php echo $hasil['id_produk'] ?>"><div class="box box_mid" style="text-align:center;">
						<img src="image/<?php echo "$hasil[gambar]" ?> " alt="">
						<p><?php echo "$hasil[judul]" ?></p>
						<p style="color: #FF0A0A;">Rp. <?php echo "$hasil[harga]" ?> ,00</p>
					</div>
				</a>

				<?php
			}
			?>
		</div>
		<div class="Slides4 SH">
			<a href="produk.html"><div class="box box_mid">
				<img src="satu.jpg" alt="">
			</div>
		</a>
	</div>

</div>
<button class="button right" onclick="plusDivs4(1)">&#10095;</button>
</div>
<!--content5-->
<div class="content_mid five">
	<script>
		var slideIndex = 1;
		showDivs5(slideIndex);

		function plusDivs5(n) {
			showDivs5(slideIndex += n);
		}

		function showDivs5(n) {
			var i;
			var x = document.getElementsByClassName("Slides5");
			if (n > x.length) {slideIndex = 1}
				if (n < 1) {slideIndex = x.length}
					for (i = 0; i < x.length; i++) {
						x[i].style.display = "none";
					}
					x[slideIndex-1].style.display = "block";
				}
			</script>

			<button class="button left" onclick="plusDivs5(-1)">&#10094;</button>
			<div class="box_Slides">
				<div class="Slides5 SH">
					<?php 
					include "koneksi.php";
					$rs = $mysqli->query("SELECT * FROM produk where kategori='Sepatu' ");
					while ($hasil = mysqli_fetch_array($rs)){?>
					<a href="produk.php?id_produk=<?php echo $hasil['id_produk'] ?>"><div class="box box_mid" style="text-align:center;">
						<img src="image/<?php echo "$hasil[gambar]" ?> " alt="">
						<p><?php echo "$hasil[judul]" ?></p>
						<p style="color: #FF0A0A;">Rp. <?php echo "$hasil[harga]" ?> ,00</p>
					</div>
				</a>

				<?php
			}
			?>
		</div>
		<div class="Slides5 SH">
			<a href="produk.html"><div class="box box_mid">
				<img src="satu.jpg" alt="">
			</div>
		</a>
	</div>
</div>
<button class="button right" onclick="plusDivs5(1)">&#10095;</button>
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
