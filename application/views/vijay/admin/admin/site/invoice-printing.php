<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

  <div class="row"> </div>
  <!--/.row-->
  <div class="row" style="margin-top:10px;">
    <div class="col-lg-12">
      <?php if(isset($_SESSION['SUCESSMSG'])){ ?>
      <div class="alert bg-success" role="alert">
        <svg class="glyph stroked checkmark">
          <use xlink:href="#stroked-checkmark"></use>
        </svg>
        <?php echo $_SESSION['SUCESSMSG']; ?><a href="#" class="pull-right"><span class="glyphicon glyphicon-remove"></span></a> </div>
      <?php unset($_SESSION['SUCESSMSG']); } ?>
    </div>
  </div>
  <!--/.row-->
  <script type="text/javascript">
    function printpage()
        {
		var report = document.getElementById('myprintings');
		var printWindow = window.open('','','width=400,height=1000');
		printWindow.document.write(report.innerHTML);       
		printWindow.resizeTo(screen.width, screen.height);
	    printWindow.document.close();
		printWindow.focus();
		//alert(ss);
		printWindow.print();
	    printWindow.close();
	 //  alert( printWindow.document.close()); 
	       var parent_id=$("#parent_id").val();
		   var application_id=$("#application_id").val();
		   var pid=$("#principal_id").val();
	           $.ajax({
				url: "<?php echo site_url() ?>users_controller/submit_nirgam_uttra",
				type: 'POST',
				data: {parent_id:parent_id,application_id:application_id,pid:pid},
				success: function(data) {
				//alert(data);
				}
				});
	 
      }
	
</script>
<style>
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 20mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 1cm;
        border: 5px red solid;
        height: 257mm;
        outline: 2cm #FFEAEA solid;
    }
    
    @page {
        size: A4;
        margin: 0;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>
  <div class="col-md-2">
    <input type="button" onClick="printpage()" value="Print" id="printpagebutton" class="btn btn-primary">
    <a href="<?php echo site_url(); ?>invoice_view_details" class="btn btn-danger"> Back</a></div>
  <div class="row">
    <?php $id=$_GET['invoice_id']; $in=$this->db->query("select i.id,i.po_number,i.valid_from,i.til_date,i.payment_terms,i.registration_charges,i.software_charges,i.data_entry_charges,i.maintenance_charges,i.customization_charges,i.other_charges,i.pid,i.created_date,i.reactivation_charges,p.Principle_school_name,p.Principle_email,p.Principle_mobile_no,p.Principle_schools_city,p.address,i.invoice_no,p.sales_id from tbl_invoice i inner join tbl_principle p on i.pid=p.Pid where i.id='$id'")->row();
	  $total_amount=$in->registration_charges+$in->software_charges+$in->data_entry_charges+$in->maintenance_charges+$in->customization_charges+$in->other_charges+$in->reactivation_charges;
		$count=$this->db->query("select id from tbl_invoice")->result();
		//echo $this->db->last_query();
		 ?>
    <div  id="myprintings">
	
		<div class="col-md-2"></div>
      <div class="col-md-9" style="color: #000; padding:20px;">
      <h3 style="text-align:center; color:#000;">TAX INVOICE</h3>
        <table border="1" style="background-color:#FFFFFF;border-collapse: collapse; width:600px; padding:10px; color:#000; text-align:left; font-size:11px;">
      <!--  <tr><th colspan="5" align="center"></th></tr>-->
          <tr>
		  <th colspan="" style="width:30%; border-right-style:none;">
		  <img src="<?php echo base_url(); ?>assets/img/imageedit_8_8928632713.png" style="width: 105px;
    height: 100px;
    margin-left: 7px;" />
		  </th>
            <th style="font-size:18px;border-left-style: none;" colspan="4"><p style="margin-left:10px; color:#000; width:330px;">VIMALAI SCHOOL MANAGEMENT</p>
        <p style="margin-left:10px; font-size:14px; color:#000000;font-weight: normal;">Fl No 05, S No 43/46, Savitri Vihar B Wing<br />
                NR Navdeep Society, Manaji Nagar,<br />
                Nahre, Pune - 411041<br />
                PH.NO:- +91 7083926023 <br />
                E-MAIL :- sales@vmbss.org<br />
                Web Site  : - vmbss.org </p></th>
          
          </tr>
          <tr>
            <th colspan="2" rowspan="2" style="width:100px;">
            <p style="color: #000;margin-left: 8px;">To,</p><p style="margin-left:20px; font-size:20px; font-weight:bold; color:#000;margin-bottom: 0px;"><?php echo $in->Principle_school_name; ?></p>
			<p style="margin-left:20px; font-size:12px; font-weight:bold; color:#000;">
            Address: <?php  echo $in->address.'&nbsp;,'.$in->Principle_schools_city; ?><br />
            Email: <?php echo $in->Principle_email; ?><br />Mobile: <?php echo $in->Principle_mobile_no; ?><br />
            </p>
            
			<p style="margin-left:20px; font-size:14px; font-weight:bold; color:#000;"></p>
			</th>
            <th style="width:60px;padding-left:5px; white-space:nowrap;">INOVICE NO:<br />
              INVOICE DATE:<BR />
              VALID FROM<BR />
              VALID TILL
            <th colspan="2" style="padding-left:5px; padding-right:5px;">
			<?php echo $in->invoice_no;?><br />
              <?php echo date('d-m-Y'); ?> <br />
              <?php echo date('d-m-Y',strtotime($in->valid_from)); ?> <br />
              <?php echo date('d-m-Y',strtotime($in->til_date)); ?> 
              </th>
          </tr>
          <tr>
            <th style="padding-left:5px;">PAYMENT TERMS:</th>
            <th colspan="2"  style="padding-left:5px; padding-right:5px;"><?php echo $in->payment_terms; ?></th>
          </tr>
          <tr>
            <th>SR.NO. </th>
            <th style="width:150px;padding-left:5px;">DESCRIPTION</th>
            <th style="text-align:left;padding-left:5px; width:50px;">HSN CODE</th>
            <th style="padding-left:5px; padding-right:5px;" colspan="2">TOTAL AMOUNT</th>
          </tr>
          <!--<tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td colspan="2">&nbsp;</td>
           <!-- <td >&nbsp;</td>
          </tr>-->
          <tr>
            <td style="padding-left:5px; padding-right:5px;">1<br />2<br />3<br />4<br />5<br />6<br />7</td>
            <td style="padding-left:5px; padding-right:5px;width: 461px;">Registration Charges<br />Software Charges<br />Data Entry Charges<br />Maintenance (AMC ) Charges<br />Customization Charges<br />Reactivation Charges<br />Other Charges</td>
            <td style="padding-left:5px; padding-right:5px;">&nbsp;</td>
            <td style="padding-left:5px; padding-right:5px;">
			<?php if(!empty($in->registration_charges)) { echo $in->registration_charges;}else{ echo 0; } ?>
            <br /><?php if(!empty($in->software_charges)) { echo $in->software_charges;}else{ echo 0; } ?><br />
			      <?php if(!empty($in->data_entry_charges)) { echo $in->data_entry_charges;}else{ echo 0; } ?><br />
            <?php if(!empty($in->maintenance_charges)) { echo $in->maintenance_charges;}else{ echo 0; } ?><br />
            <?php if(!empty($in->customization_charges)) { echo $in->customization_charges;}else{ echo 0; } ?><br />
            <?php if(!empty($in->reactivation_charges)) { echo $in->reactivation_charges;}else{ echo 0; } ?><br />
            <?php if(!empty($in->other_charges)) { echo $in->other_charges;}else{ echo 0; } ?>
            </td>
          </tr>
          <?php /*?><tr>
            <td style="padding-left:5px; padding-right:5px;">2</td>
            <td style="padding-left:5px; padding-right:5px;">Software Charges</td>
            <td style="padding-left:5px; padding-right:5px;">&nbsp;</td>
          
            <td style="padding-left:5px; padding-right:5px;" colspan="2"><?php if(!empty($in->software_charges)) { echo $in->software_charges;}else{ echo 0; } ?></td>
          </tr>
          <tr>
            <td style="padding-left:5px; padding-right:5px;">3</td>
            <td style="padding-left:5px; padding-right:5px;">Data Entry Charges</td>
            <td style="padding-left:5px; padding-right:5px;">&nbsp;</td>
         
            <td style="padding-left:5px; padding-right:5px;" colspan="2"><?php if(!empty($in->data_entry_charges)) { echo $in->data_entry_charges;}else{ echo 0; } ?></td>
          </tr>
          <tr>
            <td style="padding-left:5px; padding-right:5px;">4</td>
            <td style="padding-left:5px; padding-right:5px;">Maintenance (AMC ) Charges</td>
            <td style="padding-left:5px; padding-right:5px;">&nbsp;</td>
        
            <td style="padding-left:5px; padding-right:5px;" colspan="2"><?php if(!empty($in->maintenance_charges)) { echo $in->maintenance_charges;}else{ echo 0; } ?></td>
          </tr>
          <tr>
            <td style="padding-left:5px; padding-right:5px;">5</td>
            <td style="padding-left:5px; padding-right:5px;">Customization Charges</td>
            <td style="padding-left:5px; padding-right:5px;">&nbsp;</td>
        
            <td style="padding-left:5px; padding-right:5px;" colspan="2"><?php if(!empty($in->customization_charges)) { echo $in->customization_charges;}else{ echo 0; } ?></td>
          </tr>
          <tr>
            <td style="padding-left:5px; padding-right:5px;">6</td>
            <td style="padding-left:5px; padding-right:5px;">Reactivation Charges</td>
            <td style="padding-left:5px; padding-right:5px;">&nbsp;</td>
            <td style="padding-left:5px; padding-right:5px;" colspan="2"><?php if(!empty($in->reactivation_charges)) { echo $in->reactivation_charges;}else{ echo 0; } ?></td>
          </tr>
          <tr>
            <td style="padding-left:5px; padding-right:5px;">7</td>
            <td style="padding-left:5px; padding-right:5px;">Other Charges</td>
            <td style="padding-left:5px; padding-right:5px;">&nbsp;</td>
         
            <td style="padding-left:5px; padding-right:5px;" colspan="2"><?php if(!empty($in->other_charges)) { echo $in->other_charges;}else{ echo 0; } ?></td>
          </tr><?php */?>
          <?php /*?><tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
         
            <td colspan="2">&nbsp;</td>
          <!--  <td>&nbsp;</td>-->
          </tr><?php */?>
          <tr>
            <td colspan="2"  rowspan="2"  style="padding-left:5px; padding-right:5px;"><p style="color:#000; font-size:12px; width:400px; text-align:justify;"><strong>DECLARATION:</strong> We hereby cetify that my/our registration certificate under rule 7 section 31 of the goods and services Tax Act 2017 is in force on date on which sale of goods/services specifed in the Tax invoice is madeby me/us the transaction of sale covered by this Tax inovice has been effected by me/us and it shall be accounted for in the turnover of the saless while filling of the return and the due tax, if any, payable on the sales has been paid or shall be paid</p></td>
            <th  style="padding-left:5px; padding-right:5px;">TOTAL VALUE</th>
            <th colspan="2" style="padding-left:5px; padding-right:5px;"><?php echo round($total_amount,2);  	
			//$sgst=$total_amount-($total_amount*0.9)/100; $cgst=$total_amount-($total_amount*0.9)/100; 
			$sgst= ($total_amount*9/100);
			$cgst= ($total_amount*9/100);
			$all_amount=$total_amount+$sgst+$cgst;
			?></th>
          </tr>
          <!--<tr>
            <th colspan="2"  style="padding-left:5px;">OUTPUT CGST @9%</th>
            <th style="padding-left:5px; padding-right:5px;"><?php echo $sgst; ?></th>
          </tr>-->
          <!--<tr>
            <th colspan="2"  style="padding-left:5px;">OUTPUT SGST @9%</th>
            <th style="padding-left:5px; padding-right:5px;"><?php echo $sgst; ?></th>
          </tr>-->
        <tr>
           
            <th  style="padding-left:5px;">GRAND TOTAL</th>
            <th style="padding-left:5px; padding-right:5px;"><?php echo round($total_amount,2); ?></th>
          </tr>
          <tr>
            <td colspan="5" style="padding-left:5px;"><strong style="font-size:15px;">TERM AND CONDITIONS:-</strong>
              <p style="font-weight:bold; font-size:12px;color:#000;margin: 0 0 1px;"> 1) Services against generated invoice will be active only for one Educational year (Jun. to May. ) from the date of invoice.</p>
              <p style="font-weight:bold; font-size:12px;margin: 0 0 1px;color:#000;"> 2) If all dues of pending invoice/s will not cleared within 30 days from the date of invoicing, 
     it will be subject to deactivation &nbsp;&nbsp;&nbsp;&nbsp;of school registration.</p>
              <p style="font-weight:bold; font-size:12px;margin: 0 0 1px;color:#000;"> 3) There will be an increase of 5% on Amount of Grand Total every Year.</p>
               
               <p style="font-weight:bold; font-size:12px;margin: 0 0 1px;color:#000;"> 4) To reactivate school registration, the reactivation fee of Rs. 1000/- will be charged extra.</p>
               <p style="font-weight:bold; font-size:12px;margin: 0 0 1px;color:#000;"> 5) Delayed payment shall be charged Interest at 24% p.a from Due Date</p>
               <p style="font-weight:bold; font-size:12px;margin: 0 0 1px;color:#000;"> 6) Cheque bounce will be charged Rs. 350/- extra</p>
               <p style="font-weight:bold; font-size:12px;margin: 0 0 1px;color:#000;"> 7) All legal matters are subject to Pune Jurisdiction only.</p>
              </td>
          </tr>
          <tr>
            <th style="padding-left:5px; padding-right:5px; padding-top:1px; padding-bottom:1px;width: 200px;">
           Income Tax PAN./ No.
            </th>
            <th style="padding-left:5px; padding-right:5px;">AAQFV0648H</th>
             <th style="text-align:center; padding:10px;" rowspan="7"><br />
              <br />
              <br />
              <br /><br /><br /><br /><br /><br />
              AUTHENTICATED</th>
              <th colspan="3" rowspan="7" style="padding-left:5px;"><p style="color: #000;white-space:nowrap;">For Vimalai School Management</p>
            <?php if(!empty($in->sales_id)){
			    $sales_id=$this->db->query("select signature from tbl_sales_users where id='$in->sales_id'")->row(); ?>
         <img src="<?php echo base_url(); ?>assets/signature/<?php echo $sales_id->signature; ?>" style="width:150px; height:60px; margin-top:30px;" />
            <?php }else{ ?>
            <img src="<?php echo base_url(); ?>assets/images/signature.png" style="width:150px; height:60px;margin-top:30px;" />
            <?php } ?>
              <p style="margin-top:50px;color:#000;">Authorised Signature</p></th></tr>
       <tr><th  style="padding-left:5px; padding-right:5px;">
          GST NO. </th><th></th></tr>
           <tr><th colspan="2" style="padding-left:5px; padding-right:5px;font-size:13px;text-align: center;">
           Bank Details</th> </tr>
          <tr>  <th style="padding-left:5px; padding-right:5px;">
            Bank Name</th><th> &nbsp;&nbsp; DBS Bank</th></tr>
        <tr><th  style="padding-left:5px; padding-right:5px;">
             Bank Account Type </th><th>&nbsp;&nbsp; Commercial</th></tr>
          <tr><th  style="padding-left:5px; padding-right:5px;">
           Bank Account No  </th><th>&nbsp;&nbsp; 830210099086</th></tr>
          <tr><th  style="padding-left:5px; padding-right:5px;">
           IFSC Code  </th><th> &nbsp;&nbsp;DBSS0IN0811</th></tr>
            </th>  
          </tr>
		<tr><th style="padding-left:5px; padding-right:5px;text-align:center;"  colspan="6">THIS IS COMPUTER GENERATED INVOICE</th></tr>
        </table>
      </div>
    </div>  
</div>
<br />
<br />
</body>
</html>
