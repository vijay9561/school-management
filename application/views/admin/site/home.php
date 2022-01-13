		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url();?>dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-blue panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<span style="font-size:3.5em;" class="fa fa-university"></span>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php $allprinciple=$this->db->query("select *from tbl_principle where data_operators='principal'")->result(); echo count($allprinciple); ?></div>
							<a href="<?php echo site_url(); ?>admin-principle"><div class="text-muted">Schools</div></a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-red panel-widget ">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<span style="font-size:3.5em;" class="fa fa-users"></span>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php $tbl_sales_users=$this->db->query("select *from tbl_sales_users")->result(); echo count($tbl_sales_users); ?></div>
							<a href="<?php echo site_url(); ?>salesman_users"><div class="text-muted">Sales Users</div></a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-orange panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<span style="font-size:3.5em;" class="fa fa-file"></span>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php $tbl_invoice=$this->db->query("select *from tbl_invoice")->result(); echo count($tbl_invoice); ?></div>
							<a href="<?php echo site_url(); ?>invoice_view_details"><div class="text-muted">Inovice</div></a>
						</div>
					</div>
				</div>
			</div>
			
			<!--<div class="col-xs-12 col-md-6 col-lg-3">
				<div class="panel panel-teal  panel-widget">
					<div class="row no-padding">
						<div class="col-sm-3 col-lg-5 widget-left">
							<span style="font-size:3.5em;" class="fa fa-image"></span>
						</div>
						<div class="col-sm-9 col-lg-7 widget-right">
							<div class="large"><?php $tbl_fees=$this->db->query("select *from tbl_fees")->result(); echo count($tbl_fees); ?></div>
							<a href="<?php echo site_url(); ?>invoice_view_details"><div class="text-muted">Slider Images</div></a>
						</div>
					</div>
				</div>
			</div>-->
		</div><!--/.row-->	
			</div><!--/.col-->
		</div><!--/.row-->
	</div>	<!--/.main-->
