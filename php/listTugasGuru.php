<?php
session_start();
require "koneksi.php";
$idkel = $_GET["id"];
$idguru = $_SESSION["id"];
$tglnow = date("Y/m/d");
$nama = $_SESSION["nama"];
if(isset($_POST["tambahtugas"]) ) {
    $Jtugas = $_POST["Jtugas"];
    $soal = $_POST["soal"];
    $deadline = $_POST["deadline"];
    mysqli_query($conn, "INSERT INTO tugas VALUES('', '$idguru', '$idkel','$Jtugas','$soal','$tglnow','$deadline')");
    // return mysqli_affected_rows($conn);  
  }
  function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM tugas where id=$id");
  
    return mysqli_affected_rows($conn);
  }
$datatugas = query("SELECT * FROM tugas WHERE id_guru=$idguru AND id_kelas=$idkel ORDER BY id desc");
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
              Selamat Belajar   <?php echo strtok($nama, " ");?>
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
        <div class="ui header">
          <div class="heading2">Materi</div>
          <div class="ui clearing divider"></div>
        </div>
        <?php foreach ($datatugas as $row) : ?>
        <div class="listmateri">
            <div class="kiri">
                <a href="detailtugasGuru.php?id=<?php echo $row["id"] ?>">
                    <h3><?php echo $row["judulTugas"] ?></h3>
                    <p>Waktu Pengerjaan : <?php echo $row["tglpost"] ?> Sampai <?php echo $row["deadline"] ?></p>
                </a>
            </div>
            <div class="kanan">
                <a href="hapusmateri.php?id=<?php echo $row['id'] ?>"><button class="btn-danger"><i class="fa-solid fa-trash"></i></button></a>
            </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <div class="modal fade" id="addtugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah mapel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="input-group input-group-sm mb-3">
                            <label for="" style="margin-right:60px;">Judul Tugas</label>
                            <input type="text" class="form-control" name="Jtugas" aria-label="Jtugas" aria-describedby="basic-addon1">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <label for="" style="margin-right:90px;">Soal</label>
                            <textarea class="form-control" name="soal" id="soal"></textarea>
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <label for="" style="margin-right:65px;">Deadline</label>
                            <input type="date" class="form-control" name="deadline" aria-label="deadline" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="tambahtugas">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </body>
  </body>
</html>
