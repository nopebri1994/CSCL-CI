<?php $this->load->view('admin/template/head'); ?>
<?php $this->load->view('admin/template/header'); ?>
<?php $this->load->view('admin/template/header-navbar'); ?>
<?php $this->load->view('admin/template/main-sidebar'); ?>
<?php $this->load->view('admin/'.$active_controller.'/'.$active_function); ?>
<?php $this->load->view('admin/template/footer'); ?>
<?php $this->load->view('admin/template/javascript'); ?>