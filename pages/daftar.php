<?php
  if (isset($_GET['lapor'])) {
    $id = $_GET['lapor'];
    $tanggal_sembuh = date("Y-m-d");
    mysqli_query($conn, "UPDATE `laporan` SET `status`='0', `tanggal_sembuh`='$tanggal_sembuh' WHERE id='$id'");
    header("location: ./?page=daftar");
  }
?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Daftar Laporan</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <!-- /.card-header -->
      <div class="card-body">
        <table id="daftar_laporan" class="table table-bordered table-striped">
          <thead>
            <tr>
              
              <th>NIK</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Jenis Kelamin</th>
              <th>RT</th>
              <th>Tanggal Terinfeksi</th>
              <th>Tanggal Lapor</th>
              <th>Lapor Sembuh</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data_laporan as $d): ?>
              <tr>
                
                <td><?= $d['nik'] ?></td>
                <td><?= $d['nama'] ?></td>
                <td><?= $d['alamat'] ?></td>
                <td><?= $d['jkel'] ?></td>
                <td><?= $d['rt'] ?></td>
                <td><?= $d['infeksi'] ?></td>
                <td><?= $d['tanggal_lapor'] ?></td>
                <td>
                  <?php if ($d['status'] == '1'): ?>
                    <a href="./?page=daftar&lapor=<?= $d['id'] ?>" class="btn btn-success">Sembuh</a>
                  <?php else: ?>
                    Sudah Sembuh
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</section>
