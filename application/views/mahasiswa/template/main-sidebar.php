  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php print base_url('assets/AdminLTE-2.4.5/'); ?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('nama_pengguna');?></p>
           <?php echo $this->session->userdata('kode_pengguna');?>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li><a href="<?php print base_url('mahasiswa/beranda'); ?>"><i class="fa fa-home"></i> <span>Beranda</span></a></li>
        <li><a href="#"><i class="fa fa-comments"></i> <span>Ruang Obrolan</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Pesan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Kotak Masuk</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Kotak Keluar</a></li>
          </ul>
        </li>
        <li><a href="#"><i class="fa fa-line-chart"></i> <span>Kemajuan</span></a></li>
      <li><a href="#"><i class="fa fa-folder-open"></i> <span>Penyimpanan Internal</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>