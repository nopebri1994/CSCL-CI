  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Kontrak Mata Kuliah
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Beranda</li>
        <li><i class="fa fa-child"></i> Manajemen Kontrak Mata Kuliah</li>
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
                <div class="form-group">
                  <label>Nama Kelas</label>
                  <select required class="form-control" name="kelas">
                  <option value="">Pilih Kelas</option>
                    <?php
                      foreach($kelas as $k) {
                        if($k->id_kelas==$tampil['id_kelas']) {
                          $pilih='selected="selected"';
                        }
                        else {
                          $pilih='';
                        }
                     ?> 
                    <option <?php echo $pilih;?> value="<?php echo $k->id_kelas?>"><?php echo $k->nama_kelas;?></option>
                    <?php
                      }
                    ?>
                  </select> 
                </div>
                <div class="form-group">
                  <label>Nama Mata Kuliah</label>
                  <select required class="form-control" name="matakuliah">
                  <option value="">Pilih Mata Kuliah</option>
                    <?php
                      foreach($matakuliah as $mt) {
                        if($mt->id_matakuliah==$tampil['id_matakuliah']) {
                          $pilih='selected="selected"';
                        }
                        else {
                          $pilih='';
                        }
                     ?> 
                    <option <?php echo $pilih;?> value="<?php echo $mt->id_matakuliah?>"><?php echo $mt->nama_matakuliah;?></option>
                    <?php
                      }
                    ?>
                  </select> 
                </div>
              <!-- /.box-body -->
              <div class="box-footer" style="text-align:center">
                <a href="<?php print base_url('admin/manajemen_kontrakmatakuliah'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>&nbsp;&nbsp;&nbsp;
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