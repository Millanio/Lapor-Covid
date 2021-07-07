<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Isi Data untuk Melapor</h1>
        <h1 class="m-0 text-dark">Harap Refresh Halaman Jika Terlanjur Menekan Tombol Submit Namun Muncul Tanda Seru </h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<section class="content">
  <div class="container-fluid">
    <div class="card">
      <!-- /.card-header -->
      <!-- form start -->
      <form method="post">
        <div class="card-body">
          <div class="form-group">
            <label>NIK</label>
            <input type="text" class="form-control" placeholder="NIK" name="nik" required oninvalid="this.setCustomValidity('Mohon isi kolom ini..')">
          </div>
          <div class="form-group">
            <label>Nama</label>
            <input type="text" class="form-control" placeholder="Nama" name="nama" required oninvalid="this.setCustomValidity('Mohon isi kolom ini..')">
          </div>
          <div class="form-group">
            <label>Alamat</label>
            <textarea class="form-control" rows="4" placeholder="Alamat" name="alamat" required oninvalid="this.setCustomValidity('Mohon isi kolom ini..')"></textarea>
          </div>
          <div class="form-group">
            <label>Jenis Kelamin</label>
            <select class="form-control select2bs4" style="width: 100%;" name="jkel" required oninvalid="this.setCustomValidity('Mohon isi kolom ini..')">
              <option value="laki-laki">Laki - Laki</option>
              <option value="perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form-group">
            <label>RT</label>
            <input type="number" class="form-control" placeholder="RT" name="rt" required oninvalid="this.setCustomValidity('Mohon isi kolom ini..')">
          </div>
          <div class="form-group">
            <label>Tanggal Terinfeksi</label>
            <input type="date" class="form-control" name="tanggal" required oninvalid="this.setCustomValidity('Mohon isi kolom ini..')">
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="submit" class="btn btn-primary float-right">Submit</button>
        </div>
      </form>

      <?php
        if (isset($_POST['nik'])) {
          $nik = $_POST['nik'];
          $nama = $_POST['nama'];
          $alamat = $_POST['alamat'];
          $jkel = $_POST['jkel'];
          $rt = $_POST['rt'];
          $infeksi = $_POST['tanggal'];

          $sql = "INSERT INTO `laporan`(`nik`, `nama`, `alamat`, `jkel`, `rt`, `infeksi`) VALUES ('$nik','$nama','$alamat','$jkel','$rt','$infeksi')";
          if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Laporan Diterima.');location.replace('./?page=daftar');</script>";
          }else {
            echo "<script>alert('Laporan Gagal, Hubungi Admin!');</script>";
          }
        }
      ?>
    </div>
  </div>
</section>
