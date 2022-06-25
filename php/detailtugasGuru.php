<?php 
require "koneksi.php";
session_start();
$idsoal=$_GET["id"];
$datasoal = query("SELECT * FROM tugas WHERE id=$idsoal");
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
              Selamat Belajar 
            </a>
            <a href="paket1.php" class="item">
              Daftar Kelas
            </a>
            <a href="paket1.php" class="item">
                Gabung Kelas
              </a>
            <a href="paket1.php" class="item">
                Profile
              </a>
              <a href="paket1.php" class="item">
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
        <?php foreach ($datasoal as $row) : ?>
        <div class="ui header">
          <div class="heading2"><h1><?php echo $row["judulTugas"] ?></h1> <p><?php echo $_SESSION["nama"] ?> | <?php echo $row["tglpost"] ?> Sampai <?php echo $row["deadline"] ?></p></div>
          <div class="ui clearing divider"></div>
        </div>
        <div class="tugas">
            <div class="soal">
                <h2><strong>Soal</strong></h2>
                <p><?php echo $row["soal"] ?></p>
            </div>
            <div class="jawab">
                <center>
                    <div class="kirimjawab">
                            <button type="submit" class="form-control" name="ambiltugas">Lihat Jawaban Siswa</button>
                    </div>
                </center>  
            </div>
        </div>
        <?php endforeach; ?>

        

        


      </div>

    </div>
  </body>
</html>
