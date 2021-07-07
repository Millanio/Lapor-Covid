<?php
  include("db_config.php");
  require_once("dompdf/autoload.inc.php");
  use Dompdf\Dompdf;
  $dompdf = new Dompdf();
  $query = mysqli_query($conn, "SELECT * FROM laporan");
  $html = "<center>
    <h3>Daftar Laporan</h3>
  </center>
  <br>
  <table border='1' width='100%'>
    <tr>
      <th>ID</th>
      <th>NIK</th>
      <th>Nama</th>
      <th>Alamat</th>
      <th>Jenis Kelamin</th>
      <th>RT</th>
      <th>Tanggal Terinfeksi</th>
      <th>Tanggal Lapor</th>
      <th>Lapor Sembuh</th>
    </tr>";

    while ($d = mysqli_fetch_assoc($query)) {
      $html .= "<tr>
        <td>".$d['id']."</td>
        <td>".$d['nik']."</td>
        <td>".$d['nama']."</td>
        <td>".$d['alamat']."</td>
        <td>".$d['jkel']."</td>
        <td>".$d['rt']."</td>
        <td>".$d['infeksi']."</td>
        <td>".$d['tanggal_lapor']."</td>
        <td>";
      if ($d['status'] == '0'){
        $html .= "Sudah Sembuh";
      }else{
        $html .= "Belum Sembuh";
      }
      $html .= "
        </td>
      </tr>";
    }

    $html .= "</table>
  </body>";

  $dompdf->loadHtml($html);
  $dompdf->setPaper('A4', 'potrait');
  $dompdf->render();
  $dompdf->stream('daftar_laporan.pdf');
?>
