  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Kelompok
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Beranda</li>
        <li><i class="fa fa-comments"></i> Data Kelompok</li>
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
                  <select required class="form-control" name="kelompok">
                  <option value="">Pilih Kelompok</option>
                    <?php
                      foreach($kelompok as $ke) {
                        if($ke->id_kelompok==$tampil['id_kelompok']) {
                          $pilih='selected="selected"';
                        }
                        else {
                          $pilih='';
                        }
                     ?> 
                    <option <?php echo $pilih;?> value="<?php echo $ke->id_kelompok?>"><?php echo $ke->nama_kelompok;?></option>
                    <?php
                      }
                    ?>
                  </select> 
                </div>
                <div class="form-group">
                  <label>Nama Mahasiswa</label>
                  <select required class="form-control" name="mahasiswa">
                  <option value="">Pilih Mahasiswa</option>
                    <?php
                      foreach($mahasiswa as $m) {
                        if($m->id_mahasiswa==$tampil['id_mahasiswa']) {
                          $pilih='selected="selected"';
                        }
                        else {
                          $pilih='';
                        }
                     ?> 
                    <option <?php echo $pilih;?> value="<?php echo $m->id_mahasiswa?>"><?php echo $m->nama_mahasiswa;?></option>
                    <?php
                      }
                    ?>
                  </select> 
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer" style="text-align:center">
                <a href="<?php print base_url('admin/data_kelompok'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>&nbsp;&nbsp;&nbsp;
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