  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Ruang Obrolan
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Beranda</li>
        <li><i class="fa fa-comments"></i> Manajemen Ruang Obrolan</li>
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
                  <label>Judul Ruang Obrolan</label>
                  <textarea class="form-control" rows="1" name="judul" placeholder="Masukkan Judul Ruang Obrolan" required><?php echo set_value('judul_topik', $tampil['judul_topik']);?></textarea>
                </div>
                <div class="form-group">
                  <label>Deskripsi Ruang Obrolan</label>
                  <textarea class="form-control" rows="1" name="isi" placeholder="Masukkan Deskripsi Ruang Obrolan" required><?php echo set_value('isi_topik', $tampil['isi_topik']);?></textarea>
                </div>
                <div class="form-group">
                  <label>Tujuan Ruang Obrolan<i> (*pilih salah satu dan abaikan jika tidak dipilih)</i></label>
                    <select class="form-control" name="kelas">
                      <option value="">Pilih Kelas</option>
                      <?php
                        foreach($kelas as $tp) {
                          if($tp->id_kelas==$tampil['id_kelas']) {
                            $pilih1='selected="selected"';
                          }
                          else {
                            $pilih1='';
                          }
                      ?>
                      <option <?php echo $pilih1;?> value="<?php echo $tp->id_kelas?>"><?php echo $tp->nama_kelas?></option>
                      <?php
                        }
                      ?>
                    </select>
                    <br>
                    <select class="form-control" name="kelompok">
                      <option value="">Pilih Kelompok</option>
                      <?php
                        foreach($kelompok as $tp) {
                          if($tp->id_kelompok==$tampil['id_kelompok']) {
                            $pilih2='selected="selected"';
                          }
                          else {
                            $pilih2='';
                          }
                      ?>
                      <option <?php echo $pilih2;?> value="<?php echo $tp->id_kelompok?>"><?php echo $tp->nama_kelompok;?></option>
                      <?php
                        }
                      ?>
                    </select>
                </div>                 
              </div>
              <!-- /.box-body -->
              <div class="box-footer" style="text-align:center">
                <a href="<?php print base_url('admin/manajemen_ruangobrolan'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>&nbsp;&nbsp;&nbsp;
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