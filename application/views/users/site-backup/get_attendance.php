<?php  $get_current_date=$date;  ?>
<div class="table-responsive" style="width: 100%;overflow: auto;" id="get_attendance_values">
		<style>                               
		</style>
		<?php $teacher_name=$this->db->query("select Teacher_name,schools_name,divsion,year,Pid from tbl_teacher where Tid='".$_SESSION['TEACHER_ID']."'")->result(); ?>
		    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                        <tr>
                          <th colspan="2" rowspan="2">TEACHER NAME :-<?php echo ucfirst($teacher_name[0]->Teacher_name); ?></th>
                          <th>CLASS:&nbsp;<?php echo $teacher_name[0]->schools_name; ?></th>
						  <th></th>
                        </tr>
						<tr><th>&nbsp;&nbsp;&nbsp;DIVISION:&nbsp;<?php echo $teacher_name[0]->divsion; ?></th><th>&nbsp;&nbsp;&nbsp;</th></tr>
						<tr><th>&nbsp;&nbsp;&nbsp;ROLL NUMBER.</th><th>&nbsp;&nbsp;&nbsp;NAME OF STUDENT.</th><?php /*?><th>&nbsp;&nbsp;&nbsp;ADHAR CARD NUMBER</th><?php */?><th>&nbsp;&nbsp;&nbsp;ATTENDANCE.</th><?php /*?><TH>&nbsp;&nbsp;&nbsp;DAYS</TH></tr><?php */?>
						<?php 
$adhar_card=$this->db->query("select *from tbl_parent where pid='".$teacher_name[0]->Pid."' and divsion='".$teacher_name[0]->divsion."' and Student_class_division='".$teacher_name[0]->schools_name."' order by Student_name asc")->result();
						
						 ?>
                      </thead>
                      <tbody>
					  <?php foreach($adhar_card as $row){ ?>
					  <tr>
					  <td><?php echo $row->Student_roll_no; ?></td>
					  <td><?php echo $row->Student_name; ?></td>
					 <?php /*?> <td><?php echo $row->adhar_card; ?></td><?php */?>
					  <?php //$date=date('Y-m-d');
			$tbl_attendance=$this->db->query("select *from tbl_attendance where attendance_date='".$get_current_date."' and pid='".$row->pid."' and  divsion='".$row->divsion."' and class_name='".$row->Student_class_division."'  and Ptid='".$row->Ptid."'")->result();
			//echo $this->db->last_query(); ?>
				<input type="hidden" name="pid<?php echo $row->Ptid; ?>" id="pid<?php echo $row->Ptid; ?>" value="<?php echo $row->pid; ?>" />
				<input type="hidden" name="tid<?php echo $row->Ptid; ?>" id="tid<?php echo $row->Ptid; ?>" value="<?php echo $row->tid; ?>" />
				<input type="hidden" name="divsion<?php echo $row->Ptid; ?>" id="divsion<?php echo $row->Ptid; ?>" value="<?php echo $row->divsion; ?>" />
				<input type="hidden" name="class_name<?php echo $row->Ptid; ?>" id="class_name<?php echo $row->Ptid; ?>" value="<?php echo $row->Student_class_division; ?>" />
				  <?php $days=date('D',strtotime($get_current_date)); //$date=date('Y-m-d');
				         
			         $holidayslist=$this->db->query("select pid,yid,date1 from child_master where date1='$get_current_date' and pid='".$row->pid."'")->result();
					 $yid=$holidayslist[0]->yid;
					 $holi=$this->db->query("select event_name from yearly_holiday_master where yid='$yid'")->result();
					 if(count($holidayslist)>=1){ ?>
					    <td style="color:orange;">Holiday&nbsp;(<?php echo $holi[0]->event_name; ?>)</td>
					   <?php 
				        }elseif($days=='Sun'){ ?>
				        <td style="color:red;">Sunday</td>	 
			      <?php }else if(count($tbl_attendance)>=1){ ?>
					  <td id="getrowscords<?php echo $row->Ptid; ?>">
					  <input type="radio" class="option-input1 radio" <?php if($tbl_attendance[0]->attendance_status=='P'){ echo 'checked'; }else{ echo ''; }?> name="attendance_status<?php echo $row->Ptid; ?>" id="attendance_status_p<?php echo $row->Ptid; ?>" onClick="attendance_status_pr(<?php echo $row->Ptid; ?>)" value="P" />&nbsp;&nbsp;<span style="color:#006600;">P</span>
					  <input type="radio" class="option-input radio" <?php if($tbl_attendance[0]->attendance_status=='A'){ echo 'checked'; }else{ echo ''; }?> name="attendance_status<?php echo $row->Ptid; ?>"     id="attendance_status_a<?php echo $row->Ptid; ?>" onClick="attendance_status_ar(<?php echo $row->Ptid; ?>)" value="A"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>
					  
					  <input type="radio" class="option-input2 radio" <?php if($tbl_attendance[0]->attendance_status=='H'){ echo 'checked'; }else{ echo ''; }?> name="attendance_status<?php echo $row->Ptid; ?>"     id="attendance_status_h<?php echo $row->Ptid; ?>" onClick="attendance_status_hr(<?php echo $row->Ptid; ?>)" value="H"/>&nbsp;&nbsp;<span style="color:#8ad919;">HP</span></td>
					  <?php }else{ ?>
					  <td id="getrowscords<?php echo $row->Ptid; ?>">
		  <input type="radio" class="option-input1 radio" name="attendance_status<?php echo $row->Ptid; ?>" onClick="attendance_status_pr(<?php echo $row->Ptid; ?>)"  id="attendance_status_p<?php echo $row->Ptid; ?>" value="P" />&nbsp;&nbsp;<span style="color:#006600;">P</span>
	 <input type="radio" class="option-input radio" name="attendance_status<?php echo $row->Ptid; ?>" onClick="attendance_status_ar(<?php echo $row->Ptid; ?>)" id="attendance_status_a<?php echo $row->Ptid; ?>"  value="A"/>&nbsp;&nbsp;<span style="color:#FF0000;">A</span>
	  <input type="radio" class="option-input2 radio" name="attendance_status<?php echo $row->Ptid; ?>" onClick="attendance_status_hr(<?php echo $row->Ptid; ?>)" id="attendance_status_h<?php echo $row->Ptid; ?>"  value="H"/>&nbsp;&nbsp;<span style="color:#8ad919;">HP</span>
	 
	 </td>
					  <?php } ?>
					 <?php /*?> <td><?php echo date('d'); ?></td><?php */?>
					  </tr>
					  <?php } ?>
					  
					  </tbody>
                      
                    </table>
					<div class="row">
				<div class="col-md-12">				
		</div>
			</div>
		</div>