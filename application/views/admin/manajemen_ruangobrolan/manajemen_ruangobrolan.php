  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manajemen Ruang Obrolan
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Beranda</li>
        <li class="active"><i class="fa fa-comments"></i> Manajemen Ruang Obrolan</li>
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
              <h3 class="box-title">Data Ruang Obrolan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              
              <a class="btn btn-success" href="<?php print base_url('admin/manajemen_ruangobrolan/tambah_ruangobrolan'); ?>"><i class="fa fa-plus"></i> Tambah Data Ruang Obrolan</a><br><br>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th style="text-align:center">No.</th>
                  <th style="text-align:center">Judul Ruang Obrolan</th>
                  <th style="text-align:center">Deskripsi Ruang Obrolan</th>
                  <th style="text-align:center">Tanggal Dibuat</th>
                  <th style="text-align:center">Tujuan Kelas / Kelompok</th>
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
                  <td style="text-align:center"><?php echo $data->judul_topik;?></td>
                  <td style="text-align:center"><?php echo $data->isi_topik;?></td>
                  <td style="text-align:center"><?php echo $data->tanggal_topik;?></td>
                  <?php 
                  if($data->id_kelas==''){
                    foreach($kelompok as $kel){
                      if($data->id_kelompok==$kel->id_kelompok){
                        $tujuan=$kel->nama_kelompok;
                      }
                    }
                  }else{
                    foreach($kelas as $kel){
                      if($data->id_kelas==$kel->id_kelas){
                        $tujuan=$kel->nama_kelas;
                      }
                    }
                  }
                  ?>
                   <td style="text-align:center"><?php echo $tujuan;?></td>
                  <td style="text-align:center">
                    <a href="<?php print base_url('admin/manajemen_ruangobrolan/ubah_ruangobrolan'); ?>/<?php echo $data->id_topik;?>" class="btn btn-warning btn-xs" title="Ubah"><i class="fa fa-pencil"></i></a>
                    <a href="<?php print base_url('admin/manajemen_ruangobrolan/hapus_ruangobrolan'); ?>/<?php echo $data->id_topik;?>" onclick="return confirm('Apakah anda yakin ingin menghapus data <?php echo $data->judul_topik;?> ?')" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash-o"></i></a>
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