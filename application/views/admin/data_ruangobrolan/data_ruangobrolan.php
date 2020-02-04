  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Ruang Obrolan
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Beranda</li>
        <li class="active"><i class="fa fa-comments"></i> Data Ruang Obrolan</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Ruang Obrolan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center">No.</th>
                  <th style="text-align:center">Judul Ruang Obrolan</th>
                  <th style="text-align:center">Isi Ruang Obrolan</th>
                  <th style="text-align:center">Tanggal Dibuat</th>
                  <th style="text-align:center">Dosen</th>
                  <th style="text-align:center">Mahasiswa</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no=1;
                  foreach ($tampil as $data) {
                ?>
                <tr>
                  <td style="text-align:center"><?php echo $no;?></td>
                  <td style="text-align:center"><?php echo $data->judul_topik;?></td>
                  <td style="text-align:center"><?php echo $data->isi_forum;?></td>
                  <td style="text-align:center"><?php echo $data->tanggal;?></td>
                  <td style="text-align:center"><?php echo $data->nama_dosen;?></td>
                  <td style="text-align:center"><?php echo $data->nama_mahasiswa;?></td>
                </tr>
                <?php
                  $no++;
                  }
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->