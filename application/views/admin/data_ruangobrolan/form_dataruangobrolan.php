  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Ruang Obrolan
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Beranda</li>
        <li><i class="fa fa-comments"></i> Data Ruang Obrolan</li>
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
                  <select required class="form-control" name="topik">
                  <option value="">Pilih Judul Ruang Obrolan</option>
                    <?php
                      foreach($topik as $t) {
                        if($t->id_topik==$tampil['id_topik']) {
                          $pilih='selected="selected"';
                        }
                        else {
                          $pilih='';
                        }
                     ?> 
                    <option <?php echo $pilih;?> value="<?php echo $t->id_topik?>"><?php echo $t->judul_topik;?></option>
                    <?php
                      }
                    ?>
                  </select> 
                </div>
                <div class="form-group">
                  <label>Isi Ruang Obrolan</label>
                  <textarea class="form-control" rows="1" name="isi_forum" placeholder="Masukkan Isi Ruang Obrolan" required><?php echo set_value('isi_forum', $tampil['isi_forum']);?></textarea>
                </div>
                <div class="form-group">
                  <label>Nama Dosen</label>
                  <select required class="form-control" name="dosen">
                  <option value="">Pilih Dosen</option>
                    <?php
                      foreach($dosen as $d) {
                        if($d->id_dosen==$tampil['id_dosen']) {
                          $pilih='selected="selected"';
                        }
                        else {
                          $pilih='';
                        }
                     ?> 
                    <option <?php echo $pilih;?> value="<?php echo $d->id_dosen?>"><?php echo $d->nama_dosen;?></option>
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
                <a href="<?php print base_url('admin/data_ruangobrolan'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>&nbsp;&nbsp;&nbsp;
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