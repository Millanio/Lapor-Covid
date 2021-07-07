
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Home</h1>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3><?= $jumlah_sembuh ?></h3>

            <p>Jumlah Sembuh</p>
          </div>
          <div class="icon">
            <i class="ion ion-checkmark-round"></i>
          </div>
          <a href="./?page=daftar" class="small-box-footer">Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
          <div class="inner">
            <h3><?= $jumlah_infeksi ?></h3>

            <p>Jumlah Terinfeksi</p>
          </div>
          <div class="icon">
            <i class="ion ion-chevron-up"></i>
          </div>
          <a href="./?page=daftar" class="small-box-footer">Lebih Lanjut <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
    <img src="img/covid-login.png" class="bg-primary" width="100%" alt="">
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
