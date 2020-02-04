  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Dosen
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Beranda</li>
        <li><i class="fa fa-book"></i> Manajemen Dosen</li>
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
                  <label for="exampleInputEmail1">NIP / NUPTK</label>
                  <input type="text" class="form-control" name="nip_dosen" placeholder="Masukkan NIP / NUPTK Dosen" required maxlength="20" onkeypress="return hanyaAngka(event)" value="<?php echo set_value('nip_dosen', $tampil['nip_dosen']);?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama</label>
                  <input type="text" class="form-control" name="nama_dosen" placeholder="Masukkan Nama Lengkap Dengan Gelar Dosen" required maxlength="30" value="<?php echo set_value('nama_dosen', $tampil['nama_dosen']);?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Kota Kelahiran</label>
                  <input type="text" class="form-control" name="tempat" placeholder="Masukkan Kota Kelahiran Dosen" required maxlength="25" value="<?php echo set_value('tempat', $tampil['tempat']);?>">
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
                        if ($tampil['jenis_kelamin']=='P') {
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
                  <textarea class="form-control" rows="1" name="alamat" placeholder="Masukkan Alamat Lengkap Dosen" required><?php echo set_value('alamat', $tampil['alamat']);?></textarea>
                </div>
                 <div class="form-group">
                  <label for="exampleInputPassword1">Kontak</label>
                  <input type="text" class="form-control" name="kontak" placeholder="Masukkan No.Telp. / No.HP / E-mail Dosen" required maxlength="35" value="<?php echo set_value('kontak', $tampil['kontak']);?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="text" class="form-control" name="password" placeholder="Masukkan Password Dosen" required maxlength="15" value="<?php echo set_value('password', $tampil['password']);?>">
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer" style="text-align:center">
                <a href="<?php print base_url('admin/manajemen_dosen'); ?>"><button type="button" class="btn btn-danger">Batal</button></a>&nbsp;&nbsp;&nbsp;
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