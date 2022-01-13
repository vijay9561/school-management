<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
		
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Partner Commission</li>
			</ol>
		</div><!--/.row-->
		
	<!--/.row-->
		<div class="row">
		<div class="col-lg-12">
		<div class="row">
		<div class="col-md-6">
		</div>
<div class="col-md-6">
<div class="form-group pull-right">
<?php /*?><form method="post">
<input type="text" id="search_id" placeholder="Search" value="<?php if(isset($_GET['searchkeyowords'])) { echo $_GET['searchkeyowords']; } ?>" required style="display: initial; width:auto;" title="Type Here" class="form-control">&nbsp;&nbsp;
<input type="submit" class="btn btn-primary" value="Search" onclick="return search_result()" />
</form><?php */?>
</div>
</div>		
		</div>
		<?php 
		
		$invoice=$this->db->query("select *from tbl_invoice")->result();
		$s_vijay_amount='';
		$g_vijay='';
		$s_vikram_amount=''; $g_vikram='';
		$v_sandip_amount=''; $g_sandip=''; 
		foreach($invoice as $row){
		$get=$this->db->query("select SUM(registration_charges+software_charges+data_entry_charges+maintenance_charges+customization_charges+other_charges+reactivation_charges) as totalamount from tbl_invoice where id='$row->id'")->row();
		$pin=$this->db->query("select *from tbl_principle where Pid='$row->pid'")->row();
		if($pin->sales_id==0){
		   $total_amount=$get->totalamount;
		  }else{
		  $total_amount = $get->totalamount-($get->totalamount*30) / 100;
		  }
		  $vijay_amount=($total_amount*10/100);
		  $sandip_amount=($total_amount*45/100);
		  $vikram_amount=($total_amount*45/100);
		 // $vcgst= ($vijay_amount*18/100);
		  //$vikgram_gst= ($vikram_amount*18/100);
		 // $sandip_gst=($sandip_amount*18/100);
		 
	    $s_vijay_amount=$s_vijay_amount+$vijay_amount;
	   $s_vikram_amount=$s_vikram_amount+$vikram_amount;
	   $v_sandip_amount=$v_sandip_amount+$sandip_amount;

		}
		?>
		<div class="table-responsive">
		
		    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr No</th>
                          <th>Partner Name</th>
                          <th>Email ID</th>
						   <th>Mobile No</th>
                        <!--  <th>Sales Amount</th>-->
                          <!--<th>GST(18%)</th>-->
						  <th>Payment</th>
                        </tr>
                        </thead>
                       <tbody>
	<tr><td>1</td><td>VIKRAM SHILWANT</td><td>vikram@vmbss.org</td><td>8380038202</td>
	<!--<td> <?php echo  number_format($s_vikram_amount-($s_vikram_amount*18) / 100, 2, '.', ''); ?></td>-->
	<!--<td><?php  echo $v1_gst_final=number_format(($s_vikram_amount*18/100),2, '.', ''); ?></td>-->
	<td><?php echo  number_format($s_vikram_amount, 2, '.', ''); ?></td>
	</tr>
	<tr><td>2</td><td>SANDEEP SURWASE</td><td>sandeep@vmbss.org</td><td>7448286205</td>
	<!--<td> <?php echo  number_format($v_sandip_amount-($v_sandip_amount*18) / 100, 2, '.', ''); ?></td>-->
	<!--<td><?php  echo $s_gst_final=number_format(($v_sandip_amount*18/100),2, '.', ''); ?></td>-->
	<td><?php echo number_format($v_sandip_amount,2, '.', ''); ?></td>
	
	<tr><td>2</td><td>VIJAY JADHAV</td><td>vijay@vmbss.org</td><td>9158680769</td>
	<!--<td> <?php echo  number_format($s_vijay_amount-($s_vijay_amount*18) / 100,2, '.', ''); ?></td>-->
	<!--<td><?php  echo $v_gst_final=number_format(($s_vijay_amount*18/100),2, '.', ''); ?></td>-->
	<td><?php echo number_format($s_vijay_amount,2, '.', ''); ?></td>
	
	</tr>
	<tr><td colspan="4"></td><!--<td><?php echo number_format($v1_gst_final+$s_gst_final+$v_gst_final,2, '.', ''); ?></td>--><td><?php echo number_format($s_vikram_amount+$v_sandip_amount+$s_vijay_amount,2, '.', ''); ?></td></tr>
	</tbody>
	</table>  
					<div class="row">
				<div class="col-md-12">
				
			
		         </div>
			</div>                         
		  </div>
		</div>                                                                              
		</div>
	</div>