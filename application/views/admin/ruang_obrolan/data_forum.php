  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Topik Ruang Obrolan <?php echo $tampil['judul_topik']; ?>
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-home"></i> Beranda</li>
        <li><i class="fa fa-comments"></i> Ruang Obrolan</li>
        <li class="active"><i class="fa fa-commenting"></i> Topik Ruang Obrolan <?php echo $tampil['judul_topik']; ?></li>
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
            <div class="box-body">
              <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php echo $tampil['isi_topik'];?></h3>
                    <div class="box-tools pull-right">
                      Tanggal Dibuat : <?php echo $tampil['tanggal_topik'];?>
                    </div>
                </div>
                <div class="box-body">
                  <?php
                    foreach($comment as $c) { 
                      if($c->id_dosen=='') {
                  ?>
                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-info clearfix">
                      <?php 
                        foreach($nama_mhs as $nm) {
                          if($nm->id_mahasiswa==$c->id_mahasiswa) {
                            $nama_mahasiswa=$nm->nama_mahasiswa;
                          }
                        }
                      ?>
                      <span class="direct-chat-name pull-right"><?php echo $nama_mahasiswa?></span>
                      <span class="direct-chat-timestamp pull-left"><?php echo $c->tanggal?></span>
                    </div>
                    <!-- /.direct-chat-info -->
                    <img class="direct-chat-img" src="<?php print base_url('assets/AdminLTE-2.4.5/'); ?>dist/img/user3-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                    <?php echo $c->isi_forum?>
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                    <?php
                      }
                      else {
                    ?>
                  <div class="direct-chat-messages">
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                         <?php 
                        foreach($nama_dosen as $nd) {
                          if($nd->id_dosen==$c->id_dosen) {
                            $nama_dosen=$nd->nama_dosen;
                          }
                        }
                      ?>
                        <span class="direct-chat-name pull-left"><?php echo $nama_dosen?></span>
                        <span class="direct-chat-timestamp pull-right"><?php echo $c->tanggal?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?php print base_url('assets/AdminLTE-2.4.5/'); ?>dist/img/user1-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                        <?php echo $c->isi_forum?>
                      </div>
                      <!-- /.direct-chat-text -->
                    </div>
                  <?php
                      }
                    }
                  ?>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <?php echo form_open('admin/Data_ruangobrolan/input_msg');?>
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Ketikkan Pesan Disini ..." class="form-control">
                    <input type="hidden" name="segment" value="<?php echo $id_segment;?>">
                    <span class="input-group-btn">
                      <button type="submit" class="btn btn-primary btn-flat">Send</button>
                    </span>
                  <?php echo form_close();?>
                  </div>
                </div>
              <!-- /.box -->
            </div>
            <!-- /.box-header -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->