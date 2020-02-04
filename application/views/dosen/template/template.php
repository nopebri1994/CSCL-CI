<?php $this->load->view('dosen/template/head'); ?>
<?php $this->load->view('dosen/template/header'); ?>
<?php $this->load->view('dosen/template/header-navbar'); ?>
<?php $this->load->view('dosen/template/main-sidebar'); ?>
<?php $this->load->view('dosen/'.$active_controller.'/'.$active_function); ?>
<?php $this->load->view('dosen/template/footer'); ?>
<?php $this->load->view('dosen/template/javascript'); ?>