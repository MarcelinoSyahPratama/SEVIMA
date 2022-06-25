<?php 
require 'koneksi.php';
session_start();

if( isset($_POST["login"]) ) {

	$uname = $_POST["uname"];
	$password = $_POST["password"];

	$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$uname' ");

	//cek username
	if( mysqli_num_rows($result) === 1 ) {
		//cek password
		$row = mysqli_fetch_assoc($result);
		if( password_verify($password, $row["password"]) ) {
			//set session
			$_SESSION["login"] = true;
			$_SESSION["nama"] = $row["nama"];
			$_SESSION["username"] = $row["username"];
			$_SESSION["id"] = $row["id"];
			$_SESSION["tipe"] = $row["tipe"];
			$user = $row["level"] == 'user';
			$admin = $row["level"] == 'admin';
			if($user) {
			
			$_SESSION["user"] = true;
			}else if($admin) {
			
			$_SESSION["admin"] = true;
			exit;
			}
		}
	}

$error = true;
}

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="refresh" content="1" > 
	<link rel="stylesheet" type="text/css" href="../css/login.css">
	<title>login</title>
</head>
<body>
	<div class="main">
		<center>
			<div class="kiri"> 
				<div class="judul"><h1>SEDANG</h1></div>
					<div class="gambar">
						<div class="foto"><img src="https://smpn1batujajar.sch.id/wp-content/uploads/2020/10/pjj-daring.jpg" alt="gambar pengajar"></div>
					</div>
				<div class="text"><h2>SEDANG(Sekolah Daring) <br>Mempermudah Belajarmu</h2></div>
				<div class="text1"><p style="font-size:20px;">Hadirnya SEDANG bertujuan untuk membantu proses belajar mengajar menjadi lebih mudah dan maksimal</p></div>
			</div>
		</center>
		<div class="kanan">
			<div class="box-login" style="margin: 65px;">
				<h2>Login To SEDANG</h2>
				<p style="margin-bottom:60px;">Solusi tepat untuk melakukan pembelajaran secara daring.</p>
				
				<form action="" method="post">
					<ul style="list-style:none;">
						<li>
							<label for="email" style="font-size: 0.9em;color:#9ea0a5;">Username</label><br>
							<input type="text" name="email" id="email" placeholder="Masukkan Email">
						</li>
						<li>
							<label for="password" style="font-size: 0.9em;color:#9ea0a5;">Password</label><br>
							<input type="password" name="password" id="password" placeholder="Masukkan Password">
						</li>
						<li>
							<button type="submit" name="login">Login</button>
						</li>
						<li><a href="reg.php"><p style="float: left;color: red;">Belum punya akun?</p></a><p style="float: right;color: red;">forgot password</p></li>
					</ul>
				</form>
			</div>
		</div>
	</div>
</body>
</html>