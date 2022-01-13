<?php
if(isset($_GET["page"]))
	$page = (int)$_GET["page"];
	else
	$page = 1;
	$setLimit = 100;
	$pageLimit = ($page * $setLimit) - $setLimit;
$query='';
$pid=$_SESSION['PRINCIPLE_ID'];
if(isset($_GET['searchkeyowords'])){
$searchid=$_GET['searchkeyowords'];
$mysqluery=$this->db->query("select i.id,i.valid_from,i.til_date,i.payment_terms,i.registration_charges,i.software_charges,i.data_entry_charges,i.maintenance_charges,i.customization_charges,i.other_charges,i.pid,i.created_date,p.Principle_school_name,p.Principle_email,p.Principle_mobile_no,p.Principle_schools_city,p.address,i.invoice_no,p.Principle_name from tbl_invoice i inner join tbl_principle p on i.pid=p.Pid where (Principle_name LIKE '%".$searchid."%' OR Principle_email LIKE '%".$searchid."%' OR Principle_school_name LIKE '%".$searchid."%') and p.Pid='$pid' order by i.id desc LIMIT ".$pageLimit." , ".$setLimit)->result();
//$mysqluery=mysql_query($query);
}else{
$mysqluery=$this->db->query("select i.id,i.valid_from,i.til_date,i.payment_terms,i.registration_charges,i.software_charges,i.data_entry_charges,i.maintenance_charges,i.customization_charges,i.other_charges,i.pid,i.created_date,p.Principle_school_name,p.Principle_email,p.Principle_mobile_no,p.Principle_schools_city,p.address,i.invoice_no,p.Principle_name from tbl_invoice i inner join tbl_principle p on i.pid=p.Pid where p.Pid='$pid' order by i.id desc LIMIT ".$pageLimit." , ".$setLimit)->result();
//$mysqluery=mysql_query($query);
}
?>
		 
		 
		
<div class="container main">			

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">View Invoice Details</h1>
				
			</div>
		</div><!--/.row-->
				
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
                          <th>Principal Name</th>
                          <th>Email ID</th>
						   <th>Mobile No</th>
						  <th>Schools Name</th>
                          <th>Action</th>
                        </tr>
                      </thead>

                      <tbody>
						<?php          
						$serial = ($pageLimit * $setLimit) + 1;
						$sn = ($page * $setLimit) + 1;
						$page_num   =   (int) (!isset($_GET['page']) ? 1 : $_GET['page']);
						$start_num =((($page_num*$setLimit)-$setLimit)+1);
						$i=1;
						$j= (($page-1) * $setLimit) + $i; 
						foreach($mysqluery as $row){  
						$num = $sn ++;
						?>
                        <tr>
						<td><?php echo $j++; ?></td>
						<td><?php echo $row->Principle_name; ?></td>
						<td><?php echo $row->Principle_email; ?></td>
						<td><?php echo $row->Principle_mobile_no; ?></td>
				        <td><?php echo $row->Principle_school_name; ?></td>
						<td>
                        <a href="<?php echo site_url(); ?>school_invoice?invoice_id=<?php echo $row->id; ?>" class="btn btn-primary"><i class="fa fa-eye"> View Invoice </i></a>
						</td>
                        </tr>
						<?php $i++; } ?>
                      </tbody>
                    </table>
					<div class="row">
				<div class="col-md-12">
				
				<?php if(isset($_GET['searchkeyowords'])){ echo userspaignsearchings($setLimit,$page,$_GET['searchkeyowords'],$pid); } else{  echo userspaging($setLimit,$page,$pid);  } ?>
		</div>
			</div>
		</div></div>
		</div>
		<?php } ?>
		<br /><br /><br /><br />
	</div>
	<?php //include('../../admin/site/footer.php');
	
	function userspaging($per_page,$page,$pid){
$page_url="?";
$ci= get_instance();
$query = $ci->db->query("select  Count(*) as totalCount ,i.id,i.po_number,i.valid_from,i.payment_terms,i.registration_charges,i.software_charges,i.data_entry_charges,i.maintenance_charges,i.customization_charges,i.other_charges,i.pid,i.created_date,p.Principle_school_name,p.Principle_email,p.Principle_mobile_no,p.Principle_schools_city,p.address,i.invoice_no from tbl_invoice i inner join tbl_principle p on i.pid=p.Pid where p.Pid='$pid' order by i.id desc
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


function userspaignsearchings($per_page,$page,$searchid,$pid){
$page_url="?searchkeyowords=".$searchid."&";
$ci= get_instance();
$query = $ci->db->query("select Count(*) as totalCount,i.id,i.po_number,i.valid_from,i.payment_terms,i.registration_charges,i.software_charges,i.data_entry_charges,i.maintenance_charges,i.customization_charges,i.other_charges,i.pid,i.created_date,p.Principle_school_name,p.Principle_email,p.Principle_mobile_no,p.Principle_schools_city,p.address,i.invoice_no from tbl_invoice i inner join tbl_principle p on i.pid=p.Pid where (Principle_name LIKE '%".$searchid."%' OR Principle_email LIKE '%".$searchid."%' OR Principle_school_name LIKE '%".$searchid."%') and p.Pid='$pid'  order by i.id desc")->result();
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
window.location='schools_invoice_details?searchkeyowords='+search_id2;
return false;
}
</script>


