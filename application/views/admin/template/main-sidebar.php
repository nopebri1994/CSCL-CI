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
          <p> <?php echo $this->session->userdata('nama_pengguna');?></p>
          <?php echo $this->session->userdata('kode_pengguna');?>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
     <?php
        $level=$this->session->userdata('level');
        $this->db->select('tabel_menu.id_menu, nama_menu, link, icon');
        $this->db->from('tabel_menu');
        $this->db->join('hak_akses','tabel_menu.id_menu=hak_akses.id_menu');
        $this->db->where('hak_akses.level',$level);
        $data_menu=$this->db->get()->result();

        $this->db->select('sub_menu.id_menu,sub_menu.nama_submenu, sub_menu.link, sub_menu.icon_sub,');
        $this->db->from('sub_menu');
        $this->db->join('hak_akses','sub_menu.id_submenu=hak_akses.id_submenu');
        $this->db->where('hak_akses.level',$level);
        $data_submenu=$this->db->get()->result();
        $cek_submenu=0;
        foreach($data_menu as $dm ){
          foreach($data_submenu as $ds){
            if($ds->id_menu==$dm->id_menu){
              $cek_submenu=1;
            }
          } 
          if($cek_submenu==0){
         ?>
          <li><a href="<?php echo $dm->link ?>"><i class="<?php echo $dm->icon;?>"></i><span><?php echo $dm->nama_menu?></span></a></li>
         <?php 
         }else if($cek_submenu==1){
         ?>
         <li class="treeview">
          <a href="#">
            <i class="<?php echo $dm->icon?>"></i>
            <span><?php echo $dm->nama_menu?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php
          foreach($data_submenu as $ds){
            if($ds->id_menu==$dm->id_menu){
          ?>
            <li><a href="<?php echo $ds->link?>"><i class="<?php echo $ds->icon_sub?>"></i> <?php echo $ds->nama_submenu?></a></li>
          <?php
               }
              }
          ?>
                 </ul>
              </li>
          <?php
             }    
            }  
            
    ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>