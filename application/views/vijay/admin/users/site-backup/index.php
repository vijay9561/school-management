<style>
.marquee {
  width: 100%;
  overflow: hidden;
  border: 1px solid #ccc;
  background: #ccc;
}
.margin_div{ margin-top:230px;}
@media(max-width:500px){
.margin_div{ margin-top:56px;}
}
</style>


	
		<?php if((isset($_SESSION['PRINCIPLE_ID'])) || (isset($_SESSION['PARENT_ID'])) || (isset($_SESSION['TEACHER_ID']))){   
		if(isset($_SESSION['PRINCIPLE_ID'])){
		if($_SESSION['USERTYPE']=='clerk'){
		$getprincipal_id=$this->db->query("select login_id from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
		$pid=$getprincipal_id->login_id;
		}else{
		$pid=$_SESSION['PRINCIPLE_ID'];
		} 
	}
		if(isset($_SESSION['TEACHER_ID'])){
		$getprincipal_id=$this->db->query("select Pid from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->row();
		$pid=$getprincipal_id->Pid;
		  }
		  
		  if(isset($_SESSION['PARENT_ID'])){
		$getprincipal_id=$this->db->query("select pid from tbl_parent where Ptid='".$_SESSION['PARENT_ID']."'")->row();
		$pid=$getprincipal_id->pid;
		  }
		 $expiry_date=date('Y-m-d');
$tgetquery=$this->db->query("select notification_name from notification_master where pid='$pid' and expiry_date>='$expiry_date' and start_date<='$expiry_date'")->result();
//echo $this->db->last_query();
		 ?>
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="padding-left:0px;padding-right:0px;">	
	<?php if(count($tgetquery)>=1){ ?>
		<div class="row">
		<div class="col-md-12">
		 <div class="TickerNews" id="T1">
		    <div class="ti_wrapper">
		        <div class="ti_slide">
		            <div class="ti_content">
		
		<!--<div class="marquee-sibling"></div>-->
			
					<?php foreach($tgetquery as $row){ ?>
						
						 <div class="ti_news"> <?php echo $row->notification_name; ?></div>
						<?php } ?>
				</div></div>
				</div></div></div>
	</div>
	<?php } ?>
	<div class="responsive-slider" data-spy="responsive-slider"      style="width:100%;" data-autoplay="true">
        <div class="slides" data-group="slides">
      		<ul>
			<?php 
			 $main_sliders1=$this->db->query("select *from tbl_main_slider where status='active' and pid='$pid'")->result(); 
			 if(count($main_sliders1)==0){
			  $main_sliders=$this->db->query("select *from tbl_main_slider where status='active' and  slider_type='supper' limit 0,2")->result(); 
			  }else{
			   $main_sliders=$this->db->query("select *from tbl_main_slider where status='active' and pid='$pid'")->result();   
			  }
			 foreach($main_sliders as  $row){ ?>
  	    		<li>
              <div class="slide-body" data-group="slide">
                <img src="<?php echo base_url(); ?>assets/slider/<?php echo $row->slider_banner_images; ?>">
                <div class="caption header margin_div" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300" style="">
                  <h2 style="color:#f9f60c;position:absolute;top:500px;"><?php echo $row->slider_Heading; ?></h2>
                  <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300"><?php echo $row->slider_small_heading; ?></div>
                </div>
              </div>
  	    		</li>
  	    		<?php } ?>
  	    	</ul>
       </div>
      <!-- Responsive slider - END -->
    </div>
			</div><!--/.col-->
		<?PHP   } else{ ?>
		<style>
		</style>
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main" style="padding-left:0px; padding-right:0px;">			
  <!-- Indicators -->
  
      <!-- Responsive slider - START -->
    	<div class="responsive-slider" data-spy="responsive-slider"      style="width:100%;" data-autoplay="true">
        <div class="slides" data-group="slides">
      		<ul>
			<?php $main_sliders=$this->db->query("select *from tbl_main_slider where status='active' and slider_type='supper'")->result();  foreach($main_sliders as  $row){ ?>
  	    		<li>
              <div class="slide-body" data-group="slide">
                <img src="<?php echo base_url(); ?>assets/slider/<?php echo $row->slider_banner_images; ?>">
                <div class="caption header margin_div" data-animate="slideAppearRightToLeft" data-delay="500" data-length="300" style="">
                  <h2 style="color:#f9f60c;"><?php echo $row->slider_Heading; ?></h2>
                  <div class="caption sub" data-animate="slideAppearLeftToRight" data-delay="800" data-length="300"><?php echo $row->slider_small_heading; ?></div>
                </div>
                <div class="caption img-html5" data-animate="slideAppearLeftToRight" data-delay="200">
               <?php /*?>   <img src="<?php echo base_url(); ?>assets/img/book.png"><?php */?>
                </div>
                <div class="caption img-css3" data-animate="slideAppearLeftToRight">
                <?php /*?>  <img src="<?php echo base_url(); ?>assets/img/css3.png"><?php */?>
                </div>
              </div>
  	    		</li>
  	    		<?php } ?>
  	    	</ul>
       </div>
      <!-- Responsive slider - END -->
    </div>

  
			</div><!--/.col-->
		</div>
		<?php } ?>
