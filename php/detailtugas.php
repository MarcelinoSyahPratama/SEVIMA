<?php 
require "koneksi.php";
session_start();
$idsiswa = $_SESSION["id"];
$idsoal=$_GET["id"];
if(isset($_POST["ambiltugas"]) ) {
    
    $filejawaban = upload();
    if( !$filejawaban ) {
        return false;
    }
    mysqli_query($conn, "INSERT INTO jawaban VALUES('', '$idsiswa', '$idsoal','$filejawaban','')");
    // return mysqli_affected_rows($conn);  
  }

  function upload(){
    $name_file = $_FILES['filejawaban']['name'];
    $size_file = $_FILES['filejawaban']['size'];
    $error = $_FILES['filejawaban']['error'];
    $tmp_name = $_FILES['filejawaban']['tmp_name'];
    
    //cek upload
    if( $error === 4 ) {
        echo "<script>
                alert('Pilih file Terlebih Dahulu')
              </script>
              ";
        return false;
    }
    
    //cek format file
    $format_file = explode('.', $name_file);
    $format_file = strtolower(end($format_file));
    
    //cek size image
    if( $size_file > 1000000 ) {
        echo "<script>
                alert('Ukuran File Terlalu Besar')
              </script>
              ";
        return false;
    }
    
    //upload image
    //generate name image
    $new_file_name = uniqid();
    $new_file_name .='.';
    $new_file_name .= $format_file;
    
    move_uploaded_file($tmp_name, '../jawabansiswa/' . $new_file_name);
    return $new_file_name;
    }
$datasoal = query("SELECT * FROM tugas WHERE id=$idsoal");
$datanilai  = query("SELECT * FROM jawaban WHERE id_siswa = $idsiswa AND id_tugas = $idsoal");
$verify = query("SELECT * FROM jawaban WHERE id_siswa=$idsiswa AND id_tugas=$idsoal");
if($verify){
    echo '<style type="text/css">
    .tugasselesai {
        display: none;
    }
    #statusselesai{
        display:block;
    }
    </style>';
}else{
    echo '<style type="text/css">
    #statusselesai{
        display:none;
    }
    </style>';
}
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
            <a href="listKelas.php" class="item">
              Daftar Kelas
            </a>
            <a href="#.php" class="item">
                Gabung Kelas
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
        <?php foreach ($datasoal as $row) : ?>
        <div class="ui header">
          <div class="heading2"><h1><?php echo $row["judulTugas"] ?></h1> <p><?php echo $_SESSION["nama"] ?> | <?php echo $row["tglpost"] ?> Sampai <?php echo $row["deadline"] ?></p><p>Nilai Anda = <?php foreach ($datanilai as $rowa){echo $rowa["nilai"];} ?> </p></div>
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
                        <h2 class="tugasselesai" style="color: white;">Kirim Tugas</h2>
                        <h2 id="statusselesai" style="color: white;"> SELESAI</h2>
                        <form action="" method="post" enctype="multipart/form-data" class="tugasselesai">
                            <input type="file" class="form-control" name="filejawaban">
                            <button type="submit" class="form-control" name="ambiltugas">Kirim</button>
                        </form>
                    </div>
                </center>
            </div>
        </div>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </body>
</html>
