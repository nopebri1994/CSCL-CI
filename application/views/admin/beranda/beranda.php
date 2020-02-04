  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Beranda
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Beranda</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Selamat Datang <?php echo $this->session->userdata('nama_pengguna');?>,</h3>
            </div>
            <div class="box-body">
              <p>Selamat datang di halaman utama sistem CSCL (<i>Computer Supported Collaborative Learning</i>).</p>
            </div>
          </div>
        </div>
      </div>
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php foreach($jumlah_matakuliah->result() as $total_matakuliah) { echo $total_matakuliah->total; } ?></h3>

              <p>Mata Kuliah</p>
            </div>
            <div class="icon">
              <i class="fa fa-book"></i>
            </div>
            <a href="manajemen_matakuliah" class="small-box-footer">Lihat data <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php foreach($jumlah_jurusan->result() as $total_jurusan) { echo $total_jurusan->total; } ?></h3>

              <p>Jurusan</p>
            </div>
            <div class="icon">
              <i class="fa fa-university"></i>
            </div>
            <a href="manajemen_jurusan" class="small-box-footer">Lihat data <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php foreach($jumlah_kelas->result() as $total_kelas) { echo $total_kelas->total; } ?></h3>

              <p>Kelas</p>
            </div>
            <div class="icon">
              <i class="fa fa-map-pin"></i>
            </div>
            <a href="manajemen_kelas" class="small-box-footer">Lihat data <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>65</h3>

              <p>Mahasiswa</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat data <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3>65</h3>

              <p>Dosen</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">Lihat data <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->