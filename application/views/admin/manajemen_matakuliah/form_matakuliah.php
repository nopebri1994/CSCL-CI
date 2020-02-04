  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Mata Kuliah
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Beranda</li>
        <li><i class="fa fa-book"></i> Manajemen Mata Kuliah</li>
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
                  <label for="exampleInputEmail1">Kode Mata Kuliah</label>
                  <input type="text" class="form-control" name="kode_matakuliah" placeholder="Masukkan Kode Mata Kuliah" required maxlength="5" value="<?php echo set_value('kode_matakuliah', $tampil['kode_matakuliah']);?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Mata Kuliah</label>
                  <input type="text" class="form-control" name="nama_matakuliah" placeholder="Masukkan Nama Mata Kuliah" required maxlength="50" value="<?php echo set_value('nama_matakuliah', $tampil['nama_matakuliah']);?>">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer" style="text-align:center">
                <a href="<?php print base_url('admin/manajemen_matakuliah'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>&nbsp;&nbsp;&nbsp;
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