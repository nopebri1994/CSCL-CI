  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Mahasiswa
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Beranda</li>
        <li><i class="fa fa-book"></i> Manajemen Mahasiswa</li>
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
                  <script>
                    function hanyaAngka(evt) {
                      var charCode = (evt.which) ? evt.which : event.keyCode
                      if (charCode > 31 && (charCode < 48 || charCode > 57))
                      return false;
                      return true;
                    }
                  </script>
                  <label for="exampleInputEmail1">NIM</label>
                  <input type="text" onkeypress="return hanyaAngka(event)" class="form-control" name="nim_mahasiswa" placeholder="Masukkan NIM Mahasiswa" required maxlength="10" value="<?php echo set_value('nim_mahasiswa', $tampil['nim_mahasiswa']);?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" name="nama_mahasiswa" placeholder="Masukkan Nama Lengkap Mahasiswa" required maxlength="30" value="<?php echo set_value('nama_mahasiswa', $tampil['nama_mahasiswa']);?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kota Kelahiran</label>
                  <input type="text" class="form-control" name="tempat" placeholder="Masukkan Kota Kelahiran Mahasiswa" required maxlength="25" value="<?php echo set_value('tempat', $tampil['tempat']);?>">
                </div>
                <div class="form-group">
                <label>Tanggal Kelahiran</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="date" class="form-control" name="tanggal" required value="<?php echo set_value('tanggal', $tampil['tanggal']);?>">
                </div>
                <!-- /.input group -->
              </div>
                <!-- /.input group -->
                <div class="form-group">
                  <label for="exampleInputEmail1">Jenis Kelamin</label>
                  <div class="radio">
                    <label>
                      <?php
                        if ($tampil['jenis_kelamin']=='Perempuan') {
                          $P="checked=\"checked\"";
                          $L="";
                        }
                        else {
                          $P="";
                          $L="checked=\"checked\"";
                        }
                      ?>
                      <input type="radio" name="jenis_kelamin" id="optionsRadios1" value="Laki-laki" <?php echo $L;?>> Laki-Laki
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" name="jenis_kelamin" id="optionsRadios2" value="Perempuan" <?php echo $P;?>> Perempuan
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <textarea class="form-control" rows="1" name="alamat" placeholder="Masukkan Alamat Lengkap Mahasiswa" required><?php echo set_value('alamat', $tampil['alamat']);?></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kontak</label>
                  <input type="text" class="form-control" name="kontak" placeholder="Masukkan No.Telp. / No.HP / E-mail Mahasiswa" required maxlength="35" value="<?php echo set_value('kontak', $tampil['kontak']);?>">
                </div>
                <div class="form-group">
                  <label>Jurusan</label>
                  <select required class="form-control" name="jurusan">
                  <option value="">Pilih Jurusan</option>
                    <?php
                      foreach($jurusan as $j) {
                        if($j->id_jurusan==$tampil['id_jurusan']) {
                          $pilih='selected="selected"';
                        }
                        else {
                          $pilih='';
                        }
                     ?> 
                    <option <?php echo $pilih;?> value="<?php echo $j->id_jurusan?>"><?php echo $j->nama_jurusan;?></option>
                    <?php
                      }
                    ?>
                  </select>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" class="form-control" name="password" placeholder="Masukkan Password Mahasiswa" required maxlength="15" value="<?php echo set_value('password', $tampil['password']);?>">
                </div> 
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer" style="text-align:center">
                <a href="<?php print base_url('admin/manajemen_mahasiswa'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>&nbsp;&nbsp;&nbsp;
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