<?php
  include("db_config.php");
  require("vendor/autoload.php");
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

  $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setCellValue('A1', 'ID');
  $sheet->setCellValue('B1', 'NIK');
  $sheet->setCellValue('C1', 'Nama');
  $sheet->setCellValue('D1', 'Alamat');
  $sheet->setCellValue('E1', 'Jenis Kelamin');
  $sheet->setCellValue('F1', 'RT');
  $sheet->setCellValue('G1', 'Tanggal Terinfeksi');
  $sheet->setCellValue('H1', 'Tanggal Lapor');
  $sheet->setCellValue('I1', 'Lapor Sembuh');

  $query = mysqli_query($conn, "SELECT * FROM laporan");
  $i = 2;

  while ($d = mysqli_fetch_assoc($query)) {
    $sheet->setCellValue('A'.$i, $d['id']);
    $sheet->setCellValue('B'.$i, $d['nik']);
    $sheet->setCellValue('C'.$i, $d['nama']);
    $sheet->setCellValue('D'.$i, $d['alamat']);
    $sheet->setCellValue('E'.$i, $d['jkel']);
    $sheet->setCellValue('F'.$i, $d['rt']);
    $sheet->setCellValue('G'.$i, $d['infeksi']);
    $sheet->setCellValue('H'.$i, $d['tanggal_lapor']);
    if ($d['status'] == '0'){
      $sheet->setCellValue('I'.$i, "Sudah Sembuh");
    }else{
      $sheet->setCellValue('I'.$i, "Belum Sembuh");
    }
    $i++;
  }

  $styleArray = [
    'borders' => [
      'allBorders' => [
        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
      ]
    ]
  ];
  $i = $i - 1;
  $sheet->getStyle('A1:I'.$i)->applyFromArray($styleArray);

  $writer = new Xlsx($spreadsheet);
  $writer->save('file_excel/daftar_laporan.xlsx');
  header("location: index.php?page=export");
?>
