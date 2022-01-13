<?php
if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;
	$setLimit = 100;
	$pageLimit = ($page * $setLimit) - $setLimit;
$query='';
if(isset($_GET['searchkeyowords'])){
$searchid=$_GET['searchkeyowords'];
$mysqluery=$this->db->query("select i.id,i.po_number,i.valid_from,i.til_date,i.payment_terms,i.school_status,i.registration_charges,i.software_charges,i.data_entry_charges,i.maintenance_charges,i.customization_charges,i.other_charges,i.reactivation_charges,i.pid,i.status,i.created_date,p.Principle_school_name,p.Principle_email,p.Principle_mobile_no,p.Principle_schools_city,p.address,i.invoice_no,p.Principle_name,p.sales_id from tbl_invoice i inner join tbl_principle p on i.pid=p.Pid where (Principle_name LIKE '%".$searchid."%' OR Principle_email LIKE '%".$searchid."%' OR Principle_school_name LIKE '%".$searchid."%')  order by i.id desc LIMIT ".$pageLimit." , ".$setLimit)->result();
//$mysqluery=mysql_query($query);
}else{
$mysqluery=$this->db->query("select i.id,i.po_number,i.valid_from,i.til_date,i.payment_terms,i.school_status,i.registration_charges,i.status,i.software_charges,i.data_entry_charges,i.maintenance_charges,i.customization_charges,i.other_charges,i.pid,i.created_date,p.Principle_school_name,p.Principle_email,p.Principle_mobile_no,p.Principle_schools_city,p.address,i.invoice_no,p.Principle_name,p.sales_id,i.reactivation_charges from tbl_invoice i inner join tbl_principle p on i.pid=p.Pid order by i.id desc LIMIT ".$pageLimit." , ".$setLimit)->result();
//$mysqluery=mysql_query($query);
}
?>
		 
		 
		
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
		
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">View Invoice Details</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!--<h1 class="page-header">Edit Invoice</h1>-->
				<?php if(isset($_SESSION['SUCESSMSG'])){ ?>
				<div class="alert bg-success" role="alert">
			<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg><?php echo $_SESSION['SUCESSMSG']; ?><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>
				<?php unset($_SESSION['SUCESSMSG']); } ?>
			</div>
		</div><!--/.row-->
				
		<?php if(isset($_GET['edit_invoice_details'])){ 
		$edit_invoice=$this->db->query("select *from tbl_invoice where id='".$_GET['edit_invoice_details']."'")->row(); ?>
         <script>
	  $(document).ready(function(){
   $(".schoolleavingdate").datepicker({
        changeMonth: true,
        changeYear: true,
		dateFormat: "yy-mm-dd",
    });
	});
		  </script>
        <div class="panel pane-default">
        <div class="panel-heading">Edit Invoice</div>
         <div class="panel-body">
         <form method="post" enctype="multipart/form-data" action="<?php echo site_url(); ?>supper_admin_controller/update_invoice_details">
				  <input type="hidden"  name="id" value="<?php echo $_GET['edit_invoice_details']; ?>" />
				   <div class="row">
					<div class="form-group col-md-6">
                      <label class="control-label" for="name">Valid From</label>
                  <input type="text" id="valid_from" name="valid_from" value="<?php echo $edit_invoice->valid_from; ?>" autocomplete="off"  maxlength="200" required class="form-control schoolleavingdate">
                    </div>
                    <div class="form-group col-md-6">
                      <label class="control-label" for="name">Valid Till</label>
                  <input type="text" id="til_date"  name="til_date" value="<?php echo $edit_invoice->til_date; ?>" autocomplete="off"  maxlength="200" required class="form-control schoolleavingdate">
                    </div>
                    </div>
                    <div class="row">
					<div class="form-group col-md-6">
                      <label class="control-label" for="name">Payment Terms</label>
                  <input type="text" id="payment_terms"  name="payment_terms" value="<?php echo $edit_invoice->payment_terms; ?>" autocomplete="off" maxlength="200" required class="form-control">
                    </div>
					
					  <div class="form-group col-md-6">
                      <label class="control-label" for="name">Registration Charges</label>
                  <input type="text" id="registration_charges" value="<?php echo $edit_invoice->registration_charges; ?>" name="registration_charges" autocomplete="off"  onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" maxlength="200" required class="form-control">
                    </div>
                    </div>
                    <div class="row">
					<div class="form-group col-md-6">
                      <label class="control-label" for="name">Software Charges</label>
                  <input type="text" id="software_charges" value="<?php echo $edit_invoice->software_charges; ?>" name="software_charges" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off"  maxlength="200" required class="form-control">
                    </div>
					<div class="form-group col-md-6">
                      <label class="control-label" for="name">Data Entry Charges</label>
                  <input type="text" id="data_entry_charges" value="<?php echo $edit_invoice->data_entry_charges; ?>" name="data_entry_charges" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off"  maxlength="200" required class="form-control">
                    </div>
					</div>
                    <div class="row">
					<div class="form-group col-md-6">
                      <label class="control-label" for="name">Maintenance (AMC ) Charges</label>
                  <input type="text" id="maintenance_charges" value="<?php echo $edit_invoice->maintenance_charges; ?>"  name="maintenance_charges" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" autocomplete="off"  maxlength="200" required class="form-control">
                    </div>
					<div class="form-group col-md-6">
                      <label class="control-label" for="name">Customization Charges</label>
                  <input type="text" id="customization_charges" value="<?php echo $edit_invoice->customization_charges; ?>" name="customization_charges" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"  autocomplete="off" maxlength="200" required class="form-control">
                    </div></div>
					<div class="row">
                    <div class="form-group col-md-6">
                      <label class="control-label" for="name">Reactivation Charges</label>
                  <input type="text" id="reactivation_charges" value="<?php echo $edit_invoice->reactivation_charges; ?>" name="reactivation_charges" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')"  autocomplete="off" maxlength="200" required class="form-control">
                    </div>
					<div class="form-group col-md-6">
                      <label class="control-label" for="name">Other Charges</label>
                  <input type="text" id="other_charges" value="<?php echo $edit_invoice->other_charges; ?>" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" name="other_charges" autocomplete="off"  maxlength="200" required class="form-control">
                    </div>
                    </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary">Save</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
				 </form>
         </div>
         </div>
		<!-- /.row -->	
		<?php }elseif(isset($_GET['action'])){ 
		$principle_details=$this->db->query("select *from tbl_principle where Pid='".$_GET['action']."'")->result();
		  ?>
		<!-- /.row -->
		<?php }else{ ?>
		<div class="row">
		<div class="col-lg-12">
		<div class="row">
		<div class="col-md-6">
	<!--	<a href="pin-code-master.php?add-new=pincodemaster" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a> -->
		</div>
<div class="col-md-6">
<div class="form-group pull-right">
<form method="post">
<input type="text" id="search_id" placeholder="Search" value="<?php if(isset($_GET['searchkeyowords'])) { echo $_GET['searchkeyowords']; } ?>" required style="display: initial; width:auto;" title="Type Here" class="form-control">&nbsp;&nbsp;
<input type="submit" class="btn btn-primary" value="Search" onclick="return search_result()" />
</form>
</div>
</div>		
		</div>
		<div class="table-responsive">
		
		    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th>Sr No</th>
                          <th>Principal Name</th>
                          <th>Schools Name</th>
						  <th>School Payment</th>
                          <th>Associate Name</th>
						  <th>Associate Amount</th>
						  <th>Associate Payment</th>
						  <th>Sandip Amount</th>
                          <th>Vikram Amount</th>
                          <th>Vaibhav Amount</th>
                          <th>Vijay Amount</th>
						  <th>Total Amount</th>
                          <th style="width:18%;">Action</th>
                        </tr>
                      </thead>

                      <tbody>
					  <?php $serial = ($pageLimit * $setLimit) + 1;
									//  $sn = ($pageLimit * $limit) + 1;
									  $sn = ($page * $setLimit) + 1;
									  $page_num   =   (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
                                      $start_num =((($page_num*$setLimit)-$setLimit)+1);
									   $i=1;
									   $j= (($page-1) * $setLimit) + $i; 
									  $final_total=0;
									  $vijay_final=0;
									  $vikram_final=0;
									  $sandip_final=0;
                                                                          $vaibhav_final=0;
									  $associate_final=0;
									  $sales=0;
									   foreach($mysqluery as $row){  
							
								    
							       $num = $sn ++;
								    $total_amount=$row->registration_charges+$row->software_charges+$row->data_entry_charges+$row->maintenance_charges+$row->customization_charges+$row->other_charges+$row->reactivation_charges;
			 $sales_users_amont=0;
			if($row->sales_id==0){
		   $total_amount=$total_amount;
		   $sales_users_amont=0;
		   $sales=0;
		  }else{
		  $sales_users_amont=$total_amount;
		  $total_amount = $total_amount-($total_amount*30) / 100;
		  $associate_final=$associate_final+($sales_users_amont*30/100);
		  $sales=($sales_users_amont*30/100);
		  }
		  $vijay_amount=($total_amount*10/100);
		  $sandip_amount=($total_amount*30/100);
		  $vikram_amount=($total_amount*30/100);
                  $vaibhav_amount=($total_amount*30/100);
           $tbl_sales_users=$this->db->query("select name from tbl_sales_users where id='".$row->sales_id."'")->row();
		   $total_row_amount=$sales+$vijay_amount+$sandip_amount+$vikram_amount+$vaibhav_amount;
		   
		   $final_total=$final_total+$total_row_amount;
		   $vijay_final=$vijay_final+$vijay_amount;
		   $sandip_final=$sandip_final+$sandip_amount; 
		   $vikram_final=$vikram_final+$vikram_amount;
                   $vaibhav_final=$vikram_final+$vaibhav_amount;
			?>
                        <tr>
						<td><?php echo $j++; ?></td>
						<td><?php echo $row->Principle_name; ?></td>
                        <td><?php echo $row->Principle_school_name;   ?></td>
						<td>
						<?php if($row->school_status=='PAID') { ?>
						<a href="#" class="btn btn-success btn-sm"><?php echo $row->school_status; ?></a>
						<?php }else{ ?>
<a href="<?php echo site_url(); ?>supper_admin_controller/paid_schools_amounts?status=<?php echo $row->id; ?>"  onclick="return confirm('Are you sure this school paid amount')" class="btn btn-danger btn-sm"><?php echo $row->school_status; ?></a>
						<?php } ?>
						</td>
						<td><?php if(count($tbl_sales_users)>=1){ echo  $tbl_sales_users->name; }else{ echo 'NA'; } ?></td>
						<td><i class="fa fa-inr"></i> <?php if ($row->sales_id==0) { echo 0; }else{  echo $sales_users_amont*30/100; } ?></td>
						<td>
						<?php if($row->status=='PAID') { ?><a href="#" class="btn btn-success btn-sm"><?php echo $row->status; ?></a>
						<?php }else{ ?>
						<a href="<?php echo site_url(); ?>supper_admin_controller/paid_associate_amounts?status=<?php echo $row->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure paid this associate amount')"><?php echo $row->status; ?></a>
						<?php } ?>
						</td>
						<td><i class="fa fa-inr"></i> <?php echo $sandip_amount; ?></td>
                        <td><i class="fa fa-inr"></i> <?php echo $sandip_amount; ?></td>
                        <td><i class="fa fa-inr"></i> <?php echo $vaibhav_amount; ?></td>
                         <td><i class="fa fa-inr"></i> <?php echo $vijay_amount; ?></td>
                        
						<td><i class="fa fa-inr"></i> <?php echo $total_row_amount; ?></td>
				        
						<td>
<a href="<?php echo site_url(); ?>invoice_details?invoice_id=<?php echo $row->id; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"> View Invoice </i></a>
<a href="<?php echo site_url(); ?>invoice_view_details?edit_invoice_details=<?php echo $row->id; ?>" class="btn btn-danger btn-sm"><i class="fa fa-pencil"> Edit </i></a>
						  </td>
                        </tr>
						<?php $i++; } ?>
						<tr><th colspan="5">Total Amount</th><th><i class="fa fa-inr"></i> <?php echo $associate_final; ?></th>
						<td></td>
						<th><i class="fa fa-inr"></i> <?php echo $sandip_final; ?></th>
						<th><i class="fa fa-inr"></i> <?php echo $vikram_final; ?></th>
                                                <th><i class="fa fa-inr"></i> <?php echo $vaibhav_final; ?></th>
                                                <th><i class="fa fa-inr"></i> <?php echo $vijay_final; ?></th>
						<th><i class="fa fa-inr"></i> <?php echo $final_total; ?></th>
						<td></td>
						</tr>
                      </tbody>
                    </table>
					<div class="row">
				<div class="col-md-12">
				
				<?php if(isset($_GET['searchkeyowords'])){ echo userspaignsearchings($setLimit,$page,$_GET['searchkeyowords']); } else{  echo userspaging($setLimit,$page);  } ?>
		</div>
			</div>
		</div></div>
		</div>
		<?php } ?>
		<br /><br /><br />
	</div>
	<?php //include('footer.php');
	
	function userspaging($per_page,$page){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("select  Count(*) as totalCount ,i.id,i.po_number,i.valid_from,i.til_date,i.payment_terms,i.registration_charges,i.software_charges,i.data_entry_charges,i.maintenance_charges,i.customization_charges,i.other_charges,i.pid,i.created_date,p.Principle_school_name,p.Principle_email,p.Principle_mobile_no,p.Principle_schools_city,p.address,i.invoice_no from tbl_invoice i inner join tbl_principle p on i.pid=p.Pid order by i.id desc
")->result();
//$rec = mysql_fetch_array(mysql_query($query));
$total = $query[0]->totalCount;
$adjacents = "2"; 

$page = ($page == 0 ? 1 : $page);  
$start = ($page - 1) * $per_page;								

$prev = $page - 1;							
$next = $page + 1;
$setLastpage = ceil($total/$per_page);
$lpm1 = $setLastpage - 1;

$setPaginate = "";
if($setLastpage > 1)
{	
$setPaginate .= "<ul class='setPaginate'>";
$setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
if($page>1){
$setPaginate.= "<li><a href='{$page_url}page=$prev'>Previous</a></li>";
}
if ($setLastpage < 7 + ($adjacents * 2))
{	
for ($counter = 1; $counter <= $setLastpage; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
}
elseif($setLastpage > 5 + ($adjacents * 2))
{
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
$setPaginate.= "<li class='dot'>...</li>";
$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
}
elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
$setPaginate.= "<li class='dot'>...</li>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
$setPaginate.= "<li class='dot'>..</li>";
$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
}
else
{
$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
$setPaginate.= "<li class='dot'>..</li>";
for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
}
}

if ($page < $counter - 1){ 
$setPaginate.= "<li><a href='{$page_url}page=$next'>Next</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>Last</a></li>";
}else{
$setPaginate.= "<li><a class='current_page'>Next</a></li>";
$setPaginate.= "<li><a class='current_page'>Last</a></li>";
}

$setPaginate.= "</ul>\n";		
}


return $setPaginate;
} 


function userspaignsearchings($per_page,$page,$searchid){
$page_url="?searchkeyowords=".$searchid."&";
$ci= get_instance();
  $query = $ci->db->query("select Count(*) as totalCount,i.id,i.po_number,i.valid_from,i.til_date,i.payment_terms,i.registration_charges,i.software_charges,i.data_entry_charges,i.maintenance_charges,i.customization_charges,i.other_charges,i.pid,i.created_date,p.Principle_school_name,p.Principle_email,p.Principle_mobile_no,p.Principle_schools_city,p.address,i.invoice_no from tbl_invoice i inner join tbl_principle p on i.pid=p.Pid where (Principle_name LIKE '%".$searchid."%' OR Principle_email LIKE '%".$searchid."%' OR Principle_school_name LIKE '%".$searchid."%')  order by i.id desc")->result();
//$rec = mysql_fetch_array(mysql_query($query));
$total = $query[0]->totalCount;
$adjacents = "2"; 

$page = ($page == 0 ? 1 : $page);  
$start = ($page - 1) * $per_page;								

$prev = $page - 1;							
$next = $page + 1;
$setLastpage = ceil($total/$per_page);
$lpm1 = $setLastpage - 1;

$setPaginate = "";
if($setLastpage > 1)
{	
$setPaginate .= "<ul class='setPaginate'>";
$setPaginate .= "<li class='setPage'>Page $page of $setLastpage</li>";
if($page>1){
$setPaginate.= "<li><a href='{$page_url}page=$prev'>Previous</a></li>";
}
if ($setLastpage < 7 + ($adjacents * 2))
{	
for ($counter = 1; $counter <= $setLastpage; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
}
elseif($setLastpage > 5 + ($adjacents * 2))
{
if($page < 1 + ($adjacents * 2))		
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
$setPaginate.= "<li class='dot'>...</li>";
$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
}
elseif($setLastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
$setPaginate.= "<li class='dot'>...</li>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
$setPaginate.= "<li class='dot'>..</li>";
$setPaginate.= "<li><a href='{$page_url}page=$lpm1'>$lpm1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>$setLastpage</a></li>";		
}
else
{
$setPaginate.= "<li><a href='{$page_url}page=1'>1</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=2'>2</a></li>";
$setPaginate.= "<li class='dot'>..</li>";
for ($counter = $setLastpage - (2 + ($adjacents * 2)); $counter <= $setLastpage; $counter++)
{
if ($counter == $page)
$setPaginate.= "<li><a class='current_page'>$counter</a></li>";
else
$setPaginate.= "<li><a href='{$page_url}page=$counter'>$counter</a></li>";					
}
}
}
if ($page < $counter - 1){ 
$setPaginate.= "<li><a href='{$page_url}page=$next'>Next</a></li>";
$setPaginate.= "<li><a href='{$page_url}page=$setLastpage'>Last</a></li>";
}else{
$setPaginate.= "<li><a class='current_page'>Next</a></li>";
$setPaginate.= "<li><a class='current_page'>Last</a></li>";
}
$setPaginate.= "</ul>\n";		
}
return $setPaginate;
} 
?>
	<script>
function search_result(){
var search_id=$("#search_id").val();
var search_id2=search_id.trim();
if(search_id==""){
 alert("Please enter keywords");
 return false;
}
window.location='invoice_view_details?searchkeyowords='+search_id2;
return false;
}
</script>


