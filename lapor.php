<?php
  session_start();
  if (!isset($_SESSION['login'])) {
    header("location: login.php");
  }
  require "db_config.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <a href="lapor.php">Lapor Covid</a>
    <br>
    <a href="grafik.php">Lihat Grafik</a>
    <br>
    <a href="ekspor.php">Ekspor Data</a>
    <br>
    <a href="logout.php">logout</a>
    <br>
    <form class="" method="post">
      NIK :
      <input type="text" name="nik">
      <br>
      Nama :
      <input type="text" name="nama">
      <br>
      Alamat :
      <textarea name="alamat" rows="8" cols="80"></textarea>
      <br>
      Jenis Kelamin :
      <select name="jkel">
        <option value="laki-laki" selected>Laki Laki</option>
        <option value="perempuan">Perempuan</option>
      </select>
      <br>
      RT :
      <input type="number" min="1" name="rt">
      <br>
      Tanggal Terinfeksi :
      <input type="date" name="tanggal">
      <br>
      <input type="submit" name="submit" value="Submit">
    </form>
    <?php
      if (isset($_POST['submit'])) {
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jkel = $_POST['jkel'];
        $rt = $_POST['rt'];
        $infeksi = $_POST['tanggal'];

        $sql = "INSERT INTO `laporan`(`nik`, `nama`, `alamat`, `jkel`, `rt`, `infeksi`) VALUES ('$nik','$nama','$alamat','$jkel','$rt','$infeksi')";
        if (mysqli_query($conn, $sql)) {
          echo "<script>alert('Done');location.replace('index.php');</script>";
        }else {
          echo "<script>alert('Failed');</script>";
        }
      }
    ?>
  </body>
</html>
