<?php
if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;
	$setLimit = 50;
	$pageLimit = ($page * $setLimit) - $setLimit;
$query='';
if(isset($_GET['searchkeyowords'])){
$searchid=$_GET['searchkeyowords'];
$mysqluery=$this->db->query("select p.Principle_school_name,p.Principle_mobile_no,s.txid,s.payment_amount,s.payment_id,s.payment_type,s.dates,s.payment_method,s.payment_status,s.inovice_id,s.id,s.school_id from school_payment s inner join tbl_principle p on p.Pid=s.school_id  where (p.Principle_school_name LIKE '%".$searchid."%' OR p.Principle_mobile_no LIKE '%".$searchid."%' OR s.payment_amount LIKE '%".$searchid."%' OR s.payment_id LIKE '%".$searchid."%' OR s.payment_type LIKE '%".$searchid."%' OR  s.payment_method LIKE '%".$searchid."%') and p.data_operators='principal'  order by s.id desc LIMIT ".$pageLimit." , ".$setLimit)->result();
//$mysqluery=mysql_query($query);
}else{
$mysqluery=$this->db->query("select p.Principle_school_name,p.Principle_mobile_no,s.txid,s.payment_amount,s.payment_id,s.payment_type,s.dates,s.payment_method,s.payment_status,s.inovice_id,s.id,s.school_id from school_payment s inner join tbl_principle p on p.Pid=s.school_id where  p.data_operators='principal'  order by s.id desc LIMIT ".$pageLimit." , ".$setLimit)->result();
//$mysqluery=mysql_query($query);
}
		 ?>
		 <script>	
function submit_data(id){
   var payment_mode=$("#payment_mode"+id).val();
     var cheque_no=$('#cheque_no'+id).val();
   
   if(payment_mode==""){
    $("#payment_moder"+id).html("Please select payment status");
     return false;
   }else{
     $("#payment_moder"+id).html(" ");   
   }
 
     if(cheque_no==""){
      $("#cheque_nor"+id).html("Please enter paid or disapprove details");
      return false;
     }else{
       $("#cheque_nor"+id).html(" ");     
     }
   }
       
		 </script>
		
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
		
			<ol class="breadcrumb">
				<li><a href="<?php echo site_url(); ?>dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active">Salesman Users</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<?php if(isset($_SESSION['SUCESSMSG'])){ ?>
				<div class="alert bg-success" role="alert">
			<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg><?php echo $_SESSION['SUCESSMSG']; ?><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a>
				</div>
				<?php unset($_SESSION['SUCESSMSG']); } ?>
			</div>
		</div><!--/.row-->
				
		<?php if(isset($_GET['add-new'])){ ?>
		
		
		<!-- /.row -->	
		<?php }elseif(isset($_GET['action'])){ 
		$sales=$this->db->query("select *from tbl_sales_users where id='".$_GET['action']."'")->row();
		  ?>
		<!-- /.row -->
		<?php }else{ ?>
		<div class="row">
		<div class="col-lg-12">
		<div class="row">
		<div class="col-md-6">
	<!--<a href="<?php echo site_url(); ?>salesman_users?add-new=pincodemaster" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New</a>-->
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
                          <th>School Name</th>
                          <th>Mobile No</th>
	                  <th>Payment Amount</th>
			  <th>Payment ID / Cheque No</th>
                          <th>Transaction ID</th>
                          <th>Payment Type</th>
                          <th>Payment Method</th>
                          <th>Payment Date</th>
			<th>Status</th>
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
									   foreach($mysqluery as $row){  
								//$slNo = $i+$start_num;
								    
							       $num = $sn ++;

					   ?>
                        <tr>
						<td><?php echo $j++; ?></td>
						<td><?php echo $row->Principle_school_name; ?></td>
						<td><?php echo $row->Principle_mobile_no; ?></td>
						<td><?php echo $row->payment_amount; ?></td>
				                <td><?php echo $row->payment_id; ?></td>
						<td><?php echo $row->txid; ?></td>
						<td><?php echo $row->payment_type; ?></td>
                                               <td><?php echo $row->payment_method; ?></td>
                                           <td><?php echo  date('d-m-Y',strtotime($row->dates)); ?></td>
                                           <td>
				           <?php if($row->payment_status=='PAID'){ ?>
                                               <span class="btn btn-success">Paid</span>
                                           <?PHP }elseif($row->payment_status=='PENDING'){ ?>
                                              <span class="btn btn-warning"  data-toggle="modal" data-target="#payfees<?php echo $i; ?>">PENDING</span>
                                           <?php }else{ ?>
                                             <span class="btn btn-danger">DISAPPROVE</span>
                                           <?php }  ?>
                                           </td>
                        </tr>
                        
                        <div class="modal" tabindex="-1" id="payfees<?php echo $i; ?>" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Pay Online Payment</h5>
        <button type="button" style="margin-top: -23px;background-color: #080808;padding: 1px 8px;border-radius: 50%;padding-bottom: 6px;" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form method="post" action="<?php echo site_url(); ?>supper_admin_controller/changed_status_payment">
              <input type="hidden" id="inovice_id<?php echo $i ?>" value="<?php echo base64_encode($row->inovice_id) ?>" name="inovice_id">
              <input type="hidden" id="id<?php echo $i ?>" value="<?php echo base64_encode($row->id) ?>" name="id">
              <input type="hidden" id="pid<?php echo $i ?>" value="<?php echo base64_encode($row->school_id) ?>" name="pid">
              <div class="form-group">
                  <label>Select Payment Status</label>  
                  <select id="payment_mode<?php echo $i; ?>" name="payment_status" onchange="payment_moder(<?php echo $i; ?>)" class="form-control">
                      <option value="">Select Payment Status</option> 
                      <option value="PAID">PAID</option>
                      <option value="DISAPPROVE">DISAPPROVE</option>
                  </select>
                  <span id="payment_moder<?php echo $i; ?>" class="text-danger"></span>
              </div> 
              <div class="form-group">
                  <label>PAID/DISAPPROVE Details</label>  
                  <textarea type="text" class="form-control" name="note" id="cheque_no<?php echo $i; ?>"></textarea>
                   <span id="cheque_nor<?php echo $i; ?>" class="text-danger"></span>
              </div> 
              <div class="form-group">
                  <input type="submit" class="btn btn-primary" onclick="return submit_data(<?php echo $i; ?>)" value="Submit" >
              </div>
          </form>
      </div>
      <div class="modal-footer">
       <!-- <button type="button" class="btn btn-primary">Save changes</button>-->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
						<?php $i++; } ?>
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
	</div>
	<?php //include('footer.php');
	
	function userspaging($per_page,$page){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount,p.Principle_school_name,p.Principle_mobile_no,s.txid,s.payment_amount,s.payment_id,s.payment_type,s.dates,s.payment_method,s.payment_status,s.inovice_id,s.id from school_payment s inner join tbl_principle p on p.Pid=s.school_id where  p.data_operators='principal'  order by s.id desc")->result();
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
$query = $ci->db->query("SELECT COUNT(*) as totalCount,p.Principle_school_name,p.Principle_mobile_no,s.txid,s.payment_amount,s.payment_id,s.payment_type,s.dates,s.payment_method,s.payment_status,s.inovice_id,s.id from school_payment s inner join tbl_principle p on p.Pid=s.school_id  where (p.Principle_school_name LIKE '%".$searchid."%' OR p.Principle_mobile_no LIKE '%".$searchid."%' OR s.payment_amount LIKE '%".$searchid."%' OR s.payment_id LIKE '%".$searchid."%' OR s.payment_type LIKE '%".$searchid."%' OR  s.payment_method LIKE '%".$searchid."%') and p.data_operators='principal'  order by s.id desc")->result();
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
	function deleletusers(id){
	var con=confirm('are you sure to this remove records !');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>supper_admin_controller/delete_salesman_users",
	type: 'POST',
	data: {id:id},
	success: function(data) {
	if(data==1){
	location.reload();
	}else{ alert("Not Deleted")}
	}
	});
	}else{
	}
	}
	
	function inactivestatus(id){
	var con=confirm('are you sure to the update status !');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>supper_admin_controller/principle_status_inactive",
	type: 'POST',
	data: {id:id},
	success: function(data) {
	if(data==1){
	location.reload();
	}else{ alert("Not Deleted")}
	}
	});
	}else{
	}
	}
	
	function activeusersstatus(id){
	var con=confirm('are you sure to the update status !');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>supper_admin_controller/principle_status_active",
	type: 'POST',
	data: {id:id},
	success: function(data) {
	if(data==1){
	location.reload();
	}else{ alert("Not Deleted")}
	}
	});
	}else{
	}
	}
	
	function search_result(){
var search_id=$("#search_id").val();
var search_id2=search_id.trim();
if(search_id==""){
 alert("Please enter keywords");
 return false;
}
window.location='online_payment_details?searchkeyowords='+search_id2;
return false;
}
</script>


