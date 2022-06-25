<?php
session_start();
require "koneksi.php";
$idsiswa = $_SESSION["id"];
$tglnow = date("Y/m/d");

$datatugas = query("SELECT * FROM tugas ORDER BY id desc");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="1" > 
    <title>home</title>
    <link rel="stylesheet" href="../css/semantic.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/65e8e6eaa7.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="pusher">
      <div class="ui container p-t">
        <div class="ui menu inverted navbar large blue">
          <div class="left menu" style="font-size: 20px;">
            <a class="item">
              Selamat Belajar <strong><?php echo strtok($_SESSION["nama"], " ") ?></strong>
            </a>
            <a href="listKelas.php" class="item">
              Daftar Kelas
            </a>
              <a href="listTugasSemua.php" class="item">
                Daftar Tugas
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
          <div class="heading2">Materi</div>
          <div class="ui clearing divider"></div>
        </div>
        <?php foreach ($datatugas as $row) : ?>
        <div class="listmateri">
            <div class="kiri">
                <a href="detailtugas.php?id=<?php echo $row["id"] ?>">
                    <h3><?php echo $row["judulTugas"] ?></h3>
                    <p>Waktu Pengerjaan : <?php echo $row["tglpost"] ?> Sampai <?php echo $row["deadline"] ?></p>
                </a>
            </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </body>
  </body>
</html>
