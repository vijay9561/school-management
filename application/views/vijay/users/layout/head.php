<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SCHOOL MANAGEMENT are schools mangement application to the all maharshtara district schools. in that schools application we are easily manage all student records as well as student attendance mangement,online student attendance manage to the teacher">
  <meta name="keywords" content="SchoolsBook Attendance,Leaving Certificate,Bonafied Certificate,Student Individual Notification,Student Every day performce,Examination Time Table,School Time Table">
<link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url(); ?>assets/img/android-icon-192x192.png">
  <meta name="author" content="Sandip Survase,Vikram shilwant,Vijay Jadhav">

<title>SCHOOL MANAGEMENT-<?php  echo $title; ?>

</title>

<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/datepicker3.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/bootstrap-table.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/styles.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/css/responsive-slider.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet" media="all">
<script src="<?php echo base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.tickerNews.min.js"></script>
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/jquery.timepicker.min.css">
 <script src="<?php echo base_url(); ?>assets/js/jquery.timepicker.min.js"></script>
 <script type="text/javascript">
	    	$(function(){
	    		var timer = !2;
				_Ticker = $("#T1").newsTicker();
				_Ticker.on("mouseenter",function(){
					var __self = this;
					timer = setTimeout(function(){
						__self.pauseTicker();
					},500);

				});
				_Ticker.on("mouseleave",function(){
					clearTimeout(timer);
					if(!timer) return !2;
					this.startTicker();
				});
			});
	    </script>
		<script type="text/javascript">
	    	$(function(){
	    		var timer = !1;
				_Ticker = $("#T2").newsTicker();
				_Ticker.on("mouseenter",function(){
					var __self = this;
					timer = setTimeout(function(){
						__self.pauseTicker();
					},500);
				});
				_Ticker.on("mouseleave",function(){
					clearTimeout(timer);
					if(!timer) return !1;
					this.startTicker();
				});
			});
	    </script>
		<script type="text/javascript">
	    	$(function(){
	    		var timer = !1;
				_Ticker = $("#T3").newsTicker();
				_Ticker.on("mouseenter",function(){
					var __self = this;
					timer = setTimeout(function(){
						__self.pauseTicker();
					},500);
				});
				_Ticker.on("mouseleave",function(){
					clearTimeout(timer);
					if(!timer) return !1;
					this.startTicker();
				});
			});
	    </script>
</head>

