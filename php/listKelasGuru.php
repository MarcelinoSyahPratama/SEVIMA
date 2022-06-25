<?php 
require "koneksi.php";
session_start();
$nama=$_SESSION["nama"];
// function RandomString()
//     {
//         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
//         $randstring = '';
//         for ($i = 0; $i < 10; $i++) {
//             $randstring = $characters[rand(0, strlen($characters))];
//         }
//         return $randstring;
//     }

//     RandomString();

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <meta http-equiv="refresh" content="1">  -->
    <title>home</title>
    <link rel="stylesheet" href="../css/semantic.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <script src="https://kit.fontawesome.com/62f37a0509.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="pusher">
      <div class="ui container p-t">
        <div class="ui menu inverted navbar large blue">
          <div class="left menu" style="font-size: 20px;">
            <a class="item">
              Selamat Datang <?php echo strtok($nama, " "); ?>
            </a>
            <a href="paket1.php" class="item">
              Daftar Kelas
            </a>
            <a type="button" data-bs-target="#addkelas" data-bs-toggle="modal" class="item">
                Buat Kelas
              </a>
            <a href="paket1.php" class="item">
                Profile
              </a>
              <a href="paket1.php" class="item">
                Buat Ujian
              </a>
            <a href="logout.php" class="item">
              Log out
            </a>

          </div>
          <div class="header item fixed right menu">
            <b><h3 style="font-size: 25px"><strong>SEDANG</strong></h3></b>
          </div>

        </div>

        <div class="ui header">
          <div class="heading2">Kelas</div>
          <div class="ui clearing divider"></div>
        </div>

        <div class="ui stackable four column grid">
          <div class="row">
            <div class="column">
              <div class="ui card">
                <a class="image" href="" style="overflow: hidden;">
                  <img src="https://gstatic.com/classroom/themes/img_read.jpg" style="width: 130%;height: 140px;">
                </a>
                <div class="content">
                  <a class="header">XII RPL C</a>
                  <div class="meta">Matematika</div>
                  <div class="description">
                    <p>from:<strong>Marcel</strong></p>
                  </div>
                </div>
                <div class="extra content">
                  <i class="fas fa-chalkboard-teacher"></i> &nbsp;&nbsp;&nbsp;Mulai Belajar
                </div>
              </div>
              </div>              
          </div>
        </div>      
      </div>
    </div>
    <div class="modal fade" id="addkelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah mapel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="input-group input-group-sm mb-3">
                            <label for="" style="margin-right:60px;">Nama Kelas</label>
                            <input type="text" class="form-control" name="Nmapel" aria-label="Nmapel" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <label for="" style="margin-right:65px;">Nama Mapel</label>
                            <input type="text" class="form-control" name="Nmapel" aria-label="Nmapel" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>
