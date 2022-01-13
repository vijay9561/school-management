<?php if(isset($_SESSION['SALES_ID'])) { ?>
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
$mysqluery=$this->db->query("select *from tbl_invoice i inner join tbl_principle p on p.Pid=i.pid  where (p.Principle_school_name LIKE '%".$searchid."%') and  p.sales_id='".$_SESSION['SALES_ID']."' order by i.id desc LIMIT ".$pageLimit." , ".$setLimit)->result();
//$mysqluery=mysql_query($query);
}else{
$mysqluery=$this->db->query("select *from tbl_invoice i inner join tbl_principle p on p.Pid=i.pid  where  p.sales_id='".$_SESSION['SALES_ID']."' order by i.id desc LIMIT ".$pageLimit." , ".$setLimit)->result();
//$mysqluery=mysql_query($query);
//echo $this->db->last_query();
//exit;
}
		 ?>

		
<div class="container main">		
		<?php if(isset($_GET['add-new'])){ ?>
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
                          <th>Salesman Name</th>
                          <th>Email ID</th>
						   <th>Mobile No</th>
						  <th>Pan No</th>
                          <th>Aadhar card</th>
						  <th>School Name</th>
						  <th>Amount</th>
						  <th>Payment</th>
                       
                        </tr>
                      </thead>

                      <tbody>
					  <?php $total_payment=''; $total_amount=''; $serial = ($pageLimit * $setLimit) + 1;
									//  $sn = ($pageLimit * $limit) + 1;
									  $sn = ($page * $setLimit) + 1;
									  $page_num   =   (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
                                      $start_num =((($page_num*$setLimit)-$setLimit)+1);
									   $i=1;
									   $j= (($page-1) * $setLimit) + $i; 
									   foreach($mysqluery as $row){  
								//$slNo = $i+$start_num;
								    
							       $num = $sn ++;
				$c=$this->db->query("select *from tbl_sales_users where id='".$_SESSION['SALES_ID']."'")->row();
				$allamount_get=$this->db->query("select SUM(registration_charges+software_charges+data_entry_charges+maintenance_charges+customization_charges+other_charges+reactivation_charges) as totalamount from tbl_invoice where id='$row->id'")->row();

					   ?>
                        <tr>
						<td><?php echo $j++; ?></td>
						<td><?php echo $c->name; ?></td>
						<td><?php echo $c->email; ?></td>
						<td><?php echo $c->mobile_no; ?></td>
				        <td><?php echo $c->pan_no; ?></td>
						<td><?php echo $c->aadhar_card; ?></td>
						<td><?php echo $row->Principle_school_name; ?></td>
						<td><?php echo $allamount_get->totalamount;   $total_amount=$total_amount+$allamount_get->totalamount;  ?></td>
						<td><?php echo $allamount_get->totalamount*30/100;  $subtot=$allamount_get->totalamount*30/100;  $total_payment=$total_payment+$subtot; ?></td>

                     
                        </tr>
						<?php $i++; } ?>
						<tr><td colspan="7"></td><td><?php echo $total_amount; ?></td><td><?php echo $total_payment; ?></td></tr>
                      </tbody>
                    </table>
					<div class="row">
				<div class="col-md-12">
				
	<?php $sales_id=$_SESSION['SALES_ID']; if(isset($_GET['searchkeyowords'])){ echo userspaignsearchings($setLimit,$page,$_GET['searchkeyowords'],$_SESSION['SALES_ID']); } else{  
				echo userspaging($setLimit,$page,$sales_id);  } ?>
		</div>
			</div>
		</div></div>
		</div>
		<?php } ?>
	</div>
	
<?php }else{ ?>
	<script>window.location="<?php echo site_url(); ?>";</script>
	<?php } ?>
	<?php //include('../../admin/site/footer.php');
	
	function userspaging($per_page,$page,$sales_id){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_invoice i inner join tbl_principle p on p.Pid=i.pid where p.sales_id='$sales_id'")->result();
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


function userspaignsearchings($per_page,$page,$searchid,$sales_id){
$page_url="?searchkeyowords=".$searchid."&";
$ci= get_instance();
$query = $ci->db->query("SELECT COUNT(*) as totalCount FROM tbl_invoice i inner join tbl_principle p on i.pid=p.Pid  where (Principle_school_name LIKE '%".$searchid."%') and  p.sales_id='$sales_id'")->result();
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
	function deletepincodes(id){
	var con=confirm('are you sure to this remove records !');
	if(con==true){
	$.ajax({
	url: "<?php echo site_url(); ?>supper_admin_controller/delete_principle",
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
window.location='salesman-school-details?searchkeyowords='+search_id2;
return false;
}
</script>

