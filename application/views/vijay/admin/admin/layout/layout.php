<!DOCTYPE html>
<html lang="en">
    <meta charset="utf-8">
	 <?php $this->load->view('admin/layout/head'); ?>
	<body>

	<?php  $this->load->view('admin/layout/header'); ?>
	<?php $this->load->view('admin/layout/main_view',$data);?>
     <?php $this->load->view('admin/layout/js');?>
	  <?php $this->load->view('admin/layout/footer');?>   
</body>
</html>
    