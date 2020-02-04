  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Kelas
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Beranda</li>
        <li><i class="fa fa-map-pin"></i> Manajemen Kelas</li>
        <li class="active"><?php echo $judul2;?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-6">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $judul1;?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php
              echo form_open($action, array('role' => 'form'));
            ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Kode Kelas</label>
                  <input type="text" class="form-control" name="kode_kelas" placeholder="Masukkan Kode Kelas" required maxlength="2" value="<?php echo set_value('kode_kelas', $tampil['kode_kelas']);?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Kelas</label>
                  <input type="text" class="form-control" name="nama_kelas" placeholder="Masukkan Nama Kelas" required maxlength="7" value="<?php echo set_value('nama_kelas', $tampil['nama_kelas']);?>">
                </div>
                <div class="form-group">
                  <script>
                    function hanyaAngka(evt) {
                      var charCode = (evt.which) ? evt.which : event.keyCode
                      if (charCode > 31 && (charCode < 48 || charCode > 57))
                      return false;
                      return true;
                    }
                  </script>
                  <label for="exampleInputPassword1">Tahun Ajaran</label>
                  <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" name="tahun_ajaran" placeholder="Masukkan Tahun Ajaran" required maxlength="5" value="<?php echo set_value('tahun_ajaran', $tampil['tahun_ajaran']);?>">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer" style="text-align:center">
                <a href="<?php print base_url('admin/manajemen_kelas'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>&nbsp;&nbsp;&nbsp;
                <button type="reset" class="btn btn-info">Ulangi</button>&nbsp;&nbsp;&nbsp;
                <button type="submit" class="btn btn-success">Simpan</button>
              </div>
            <?php echo form_close();?>
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