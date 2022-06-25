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
    <!-- <meta http-equiv="refresh" content="1" >  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
						<li><a type="button" data-bs-toggle="modal" data-bs-target="#regis"><p style="float: left;color: red;">Belum punya akun?</p></a><p style="float: right;color: red;">forgot password</p></li>
					</ul>
				</form>
			</div>
		</div>
	</div>
    <div class="modal fade" id="regis" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Registrasi</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="display: block;">
                        
                        <div class="input-group input-group-sm mb-3">
                            <label for="">Nama</label>
                            <input type="text" class="form-control" name="nama" aria-label="nama" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <label for="">Username</label>
                            <input type="text" class="form-control" name="username" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <label for="">Password</label>
                            <input type="text" class="form-control" name="pass" id="pass" aria-label="passwprd" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <label for="">Re-Password</label>
                            <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                            <input type="checkbox" onclick="viewpass()"> Lihat Password
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal insert -->
<!-- <div class="example-modal">
  <div id="tambahuser" class="modal fade" role="dialog" style="display:none;">
    <div class="modal-dialog"> 
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h3 class="modal-title">Registrasi User Baru</h3>
        </div>
        <div class="modal-body">
          <form action="../user/function_user.php?act=tambahuser" method="post" role="form">
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Id User <span class="text-red">*</span></label>         
              <div class="col-sm-8"><input type="text" class="form-control" name="id_user" placeholder="Id User" value=""></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Username <span class="text-red">*</span></label>
              <div class="col-sm-8"><input type="text" class="form-control" name="username" placeholder="Username" value=""></div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">Password <span class="text-red">*</span></label>
              <div class="col-sm-8"><input type="password" class="form-control" name="password" placeholder="Password" id="myPassword" value="">
              <input type="checkbox" onclick="myFunction()"> Lihat Password
              <script>
              function myFunction() {
                var x = document.getElementById("myPassword");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
              }
              </script>
              </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
              <label class="col-sm-3 control-label text-right">User Role <span class="text-red">*</span></label>
                <div class="col-sm-8"><select name="role" class="form-control select2" style="width: 100%;">
                  <option value="User" selected="selected">-- Pilih Satu --</option>
                  <option value="admin">Administrator</option>
                  <option value="staff">Staff</option>
                </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
              <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>modal insert close -->
<script>
    function viewpass() {
        var x = document.getElementById("Pass");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</body>
</html>