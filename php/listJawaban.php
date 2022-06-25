<?php
session_start();
require "koneksi.php";
$idtugas = $_GET["id"];
$idguru = $_SESSION["id"];
$nama=$_SESSION["nama"];
$tglnow = date("Y/m/d");
if(isset($_POST["menilai"]) ) {
    $nilai = $_POST["nilai"];
    $idsiswa = $_POST["id_siswa"];
    mysqli_query($conn, "UPDATE jawaban SET nilai = $nilai WHERE id_siswa = $idsiswa AND id_tugas=$idtugas");
    // return mysqli_affected_rows($conn);  
  }
$datajawaban = query("SELECT nama FROM user INNER JOIN jawaban ON user.id = jawaban.id_siswa");
$judul = query("SELECT judulTugas FROM tugas INNER JOIN jawaban ON tugas.id = jawaban.id_tugas");
$jawab = query("SELECT * FROM jawaban");
// $filename = "../jawabansiswa/GOOD.txt";
// readfile($filename);


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
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
              Selamat Belajar  <?php echo strtok($nama, " "); ?>
            </a>
            <a href="listKelasGuru.php" class="item">
              Daftar Kelas
            </a>
              <a type="button" data-bs-target="#addtugas" data-bs-toggle="modal" class="item">
                Tambah Tugas
              </a>
            <a href="logout.php" class="item">
              Log out
            </a>

          </div>
          <div class="header item fixed right menu">
            <b><h3 style="font-size: 25px"><strong>SEDANG</strong></h3></b>
          </div>
          
        </div>
        <?php foreach ($jawab as $rowse) :   ?>
        <?php foreach  ($datajawaban as $row): ?>
        <?php foreach  ($judul as $rows) : ?>
        <div class="ui header">
          <div class="heading2">Jawaban</div>
          <div class="ui clearing divider"></div>
        </div>
          
        <div class="listmateri">
            <div class="kiri">
                    <h3><?php echo $rows["judulTugas"]; ?></h3>
                    <p><?php echo $row["nama"]; ?></p>
                    <p>Nilai Anda Adalah<?php echo $rowse["nilai"]; ?></p>
                    <form action="" method="post">
                      <input type="number" placeholder="Beri Nilai Disini" name="nilai">
                      <input type="text" name="id_siswa" style="display:none;" value=<?php echo $rowse["id_siswa"];?>>
                      <button type="submit" name="menilai">Beri Nilai</button>
                    </form>
                    <a href="../jawabansiswa/<?php echo $rowse["jawaban"] ?>" target="_BLANK"><button name="buka">Buka Tugas</button></a>
                
            </div>
        </div>
        <?php endforeach; ?>
        <?php endforeach; ?>
        <?php endforeach; ?>
      </div>
    </div>
  </body>
  </body>
</html>
