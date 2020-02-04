  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Kelompok
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Beranda</li>
        <li><i class="fa fa-comments"></i> Manajemen Kelompok</li>
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
                  <label>Nama Kelompok</label>
                  <textarea class="form-control" rows="1" name="nama_kelompok" placeholder="Masukkan Nama Kelompok" required><?php echo set_value('nama_kelompok', $tampil['nama_kelompok']);?></textarea>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer" style="text-align:center">
                <a href="<?php print base_url('admin/manajemen_kelompok'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>&nbsp;&nbsp;&nbsp;
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