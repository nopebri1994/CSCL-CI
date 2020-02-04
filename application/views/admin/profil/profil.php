  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Beranda</li>
        <li class="active"><i class="fa fa-user"></i> Profil</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php print base_url('assets/AdminLTE-2.4.5/'); ?>dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $this->session->userdata('nama_pengguna');?></h3>

              <p class="text-muted text-center"><?php echo $this->session->userdata('kode_pengguna');?></p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#settings" data-toggle="tab">Ubah Akun</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Kode Pengguna</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="kode_pengguna" placeholder="Masukkan Kode Pengguna" value="">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nama Pengguna</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="nama_pengguna" placeholder="Masukkan Nama Pengguna" required maxlength="30">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Kata Sandi</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="katasandi_pengguna" placeholder="Masukkan Kata Sandi Pengguna">
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="reset" class="btn btn-primary">Ulangi</button>
                      <button type="submit" class="btn btn-success">Ubah</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>