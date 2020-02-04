  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Kelompok
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Beranda</li>
        <li class="active"><i class="fa fa-comments"></i> Manajemen Kelompok</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <?php
              if($this->session->flashdata('sukses')):
            ?>
              <div class="alert bg-green">
                <button class="close" data-dismiss="alert" type="button">x</button>
                <i class='fa fa-check'></i>
                <?php
                  echo $this->session->flashdata('sukses');
                ?>
              </div>
            <?php
              endif;
            ?>
            <div class="box-header">
              <h3 class="box-title">Data Kelompok</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <a class="btn btn-success" href="<?php print base_url('admin/manajemen_kelompok/tambah_kelompok'); ?>"><i class="fa fa-plus"></i> Tambah Data Kelompok</a><br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center">No.</th>
                  <th style="text-align:center">Nama Kelompok</th>
                  <th style="text-align:center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                  $no=1;
                  foreach ($tampil as $data) {
                ?>
                <tr>
                  <td style="text-align:center"><?php echo $no;?></td>
                  <td style="text-align:center"><?php echo $data->nama_kelompok;?></td>
                  <td style="text-align:center">
                    <a href="<?php print base_url('admin/manajemen_kelompok/ubah_kelompok'); ?>/<?php echo $data->id_kelompok;?>" class="btn btn-warning btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                    <a href="<?php print base_url('admin/manajemen_kelompok/hapus_kelompok'); ?>/<?php echo $data->id_kelompok;?>" onclick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $data->nama_kelompok;?> ?')" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash-o"></i></a>
                  </td>
                </tr>
                <?php
                  $no++;
                  }
                ?>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
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