 <?php 
if(!defined('BASEPATH')) EXIT('No direct script access allowed');
require_once APPPATH."/third_party/PHPExcel.php";
require_once APPPATH."/third_party/PHPExcel/IOFactory.php";
class Excel_Upload_Controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
		//$this->load->library('session/session');

    }
public function excel_student_upload(){
 $objPHPExcel = new PHPExcel();
$file_info = pathinfo($_FILES["uploadsheet"]["name"]);
 $pid=$this->input->post('pid');
$file_directory = "assets/sheets/";
$new_file_name = date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];
if(move_uploaded_file($_FILES["uploadsheet"]["tmp_name"], $file_directory . $new_file_name))
{   // PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
    $file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    $objReader	= PHPExcel_IOFactory::createReader($file_type);
    $objPHPExcel = $objReader->load($file_directory . $new_file_name);
    $sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
    $highestRow=count($sheet_data);
	 for ($row = 2; $row <= $highestRow; $row++) {
	  $old_schools =trim($objPHPExcel->getActiveSheet()->getCell('A' . $row)->getValue());
	  $gr_code =trim($objPHPExcel->getActiveSheet()->getCell('B' . $row)->getValue());
	  $admission_no =trim($objPHPExcel->getActiveSheet()->getCell('C' . $row)->getValue());
	  $admission_date1 =$objPHPExcel->getActiveSheet()->getCell('D' . $row)->getValue();
	  $student_id_no =trim($objPHPExcel->getActiveSheet()->getCell('E' . $row)->getValue());
	  $u_id_no =trim($objPHPExcel->getActiveSheet()->getCell('F' . $row)->getValue());
	  $adhar_card =trim($objPHPExcel->getActiveSheet()->getCell('G' . $row)->getValue());
	  $pan_no =trim($objPHPExcel->getActiveSheet()->getCell('H' . $row)->getValue());
	  $Parent_mobile_no =trim($objPHPExcel->getActiveSheet()->getCell('I' . $row)->getValue());
	  $Student_roll_no =trim($objPHPExcel->getActiveSheet()->getCell('J' . $row)->getValue());
	  $Student_class_division =trim($objPHPExcel->getActiveSheet()->getCell('K' . $row)->getValue());
	  $divsion  =trim($objPHPExcel->getActiveSheet()->getCell('L' . $row)->getValue());
	  $medium =trim($objPHPExcel->getActiveSheet()->getCell('M' . $row)->getValue());
	  $Student_year =trim($objPHPExcel->getActiveSheet()->getCell('N' . $row)->getValue());
	  $Student_name =trim($objPHPExcel->getActiveSheet()->getCell('O' . $row)->getValue());
	  $gender =trim($objPHPExcel->getActiveSheet()->getCell('P' . $row)->getValue());
	  $mother_name =trim($objPHPExcel->getActiveSheet()->getCell('Q' . $row)->getValue());
	  $address =trim($objPHPExcel->getActiveSheet()->getCell('R' . $row)->getValue());
	  $redensital_address =trim($objPHPExcel->getActiveSheet()->getCell('S' . $row)->getValue());
	  $nationality =trim($objPHPExcel->getActiveSheet()->getCell('T' . $row)->getValue());
	  $dob1 =trim($objPHPExcel->getActiveSheet()->getCell('U' . $row)->getValue());
	  $date_of_birth_word =trim($objPHPExcel->getActiveSheet()->getCell('V' . $row)->getValue());
	  $birth_place =trim($objPHPExcel->getActiveSheet()->getCell('W' . $row)->getValue());
	  $sub_cast =trim($objPHPExcel->getActiveSheet()->getCell('X' . $row)->getValue());
	  $cast =trim($objPHPExcel->getActiveSheet()->getCell('Y' . $row)->getValue());
	  $Subgenre =trim($objPHPExcel->getActiveSheet()->getCell('Z' . $row)->getValue());
      $bank_no =trim($objPHPExcel->getActiveSheet()->getCell('AA' . $row)->getValue());
	  $account_no =trim($objPHPExcel->getActiveSheet()->getCell('AB' . $row)->getValue());
	  $ifc_code =trim($objPHPExcel->getActiveSheet()->getCell('AC' . $row)->getValue());
	  
	  $dob=date('Y-m-d',strtotime($dob1));
	  $admission_date=date('Y-m-d'	,strtotime($admission_date1));
	  $Date=date('Y-m-d H:i:s');
	  $Status='active';
	  $duplicate_values_check=$this->db->query("select *from tbl_parent where adhar_card='".$adhar_card."' and pid='$pid'")->row();
	  if(count($duplicate_values_check)==0){
               $insert_array=array('pid'=>$pid,'old_schools'=>$old_schools,'gr_code'=>$gr_code,'admission_date'=>$admission_date,'student_id_no'=>$student_id_no,'u_id_no'=>$u_id_no,'adhar_card'=>$adhar_card,'pan_no'=>$pan_no,'Parent_mobile_no'=>$Parent_mobile_no,'Student_roll_no'=>$Student_roll_no,'Student_class_division'=>$Student_class_division,'divsion'=>$divsion,'medium'=>$medium,'Student_year'=>$Student_year,'Student_name'=>$Student_name,'gender'=>$gender,'mother_name'=>$mother_name,'address'=>$address,'cast'=>$cast,'sub_cast'=>$sub_cast,'nationality'=>$nationality,'birth_place'=>$birth_place,'dob'=>$dob,'date_of_birth_word'=>$date_of_birth_word,'bank_no'=>$bank_no,'ifc_code'=>$ifc_code,'Date'=>$Date,'Status'=>$Status,'Subgenre'=>$Subgenre,'admission_no'=>$admission_no,'redensital_address'=>$redensital_address);
					$this->db->insert('tbl_parent',$insert_array);
					}else{
				 $insert_array=array('pid'=>$pid,'old_schools'=>$old_schools,'gr_code'=>$gr_code,'admission_date'=>$admission_date,'student_id_no'=>$student_id_no,'u_id_no'=>$u_id_no,'adhar_card'=>$adhar_card,'pan_no'=>$pan_no,'Parent_mobile_no'=>$Parent_mobile_no,'Student_roll_no'=>$Student_roll_no,'Student_class_division'=>$Student_class_division,'divsion'=>$divsion,'medium'=>$medium,'Student_year'=>$Student_year,'Student_name'=>$Student_name,'gender'=>$gender,'mother_name'=>$mother_name,'address'=>$address,'cast'=>$cast,'sub_cast'=>$sub_cast,'nationality'=>$nationality,'birth_place'=>$birth_place,'dob'=>$dob,'date_of_birth_word'=>$date_of_birth_word,'bank_no'=>$bank_no,'ifc_code'=>$ifc_code,'Subgenre'=>$Subgenre,'admission_no'=>$admission_no,'redensital_address'=>$redensital_address);
					$this->db->where('adhar_card',$adhar_card);					
					$this->db->update('tbl_parent',$insert_array);
					}
     	 }
}
unlink($file_directory.$new_file_name);
 $_SESSION['SUCESSMSG']='Excel Sheet Imported Successfully..';
 redirect('admin_import_student_excel_sheet?student_excel=sheet');
  }
  
  public function excel_sheet_upload_teachers(){
 $objPHPExcel = new PHPExcel();
$file_info = pathinfo($_FILES["uploadsheet"]["name"]);
 $pid=$this->input->post('pid');
$file_directory = "assets/sheets/";
$new_file_name = date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];
if(move_uploaded_file($_FILES["uploadsheet"]["tmp_name"], $file_directory . $new_file_name))
{   // PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
    $file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    $objReader	= PHPExcel_IOFactory::createReader($file_type);
    $objPHPExcel = $objReader->load($file_directory . $new_file_name);
    $sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	$highestRow=count($sheet_data);
	 for ($row = 2; $row <= $highestRow; $row++) {
	  $Teacher_name =trim($objPHPExcel->getActiveSheet()->getCell('A' . $row)->getValue());
	  $gender =trim($objPHPExcel->getActiveSheet()->getCell('B' . $row)->getValue());
	  $dob1 =trim($objPHPExcel->getActiveSheet()->getCell('C' . $row)->getValue());
	  $adhar_card =trim($objPHPExcel->getActiveSheet()->getCell('D' . $row)->getValue());
	  $pan_card =trim($objPHPExcel->getActiveSheet()->getCell('E' . $row)->getValue());
	  $Teacher_mobile_no =trim($objPHPExcel->getActiveSheet()->getCell('F' . $row)->getValue());
	  $Teacher_email =trim($objPHPExcel->getActiveSheet()->getCell('G' . $row)->getValue());
	  $Teacher_password =trim($objPHPExcel->getActiveSheet()->getCell('H' . $row)->getValue());
	  $schools_name =trim($objPHPExcel->getActiveSheet()->getCell('I' . $row)->getValue());
	  $divsion =trim($objPHPExcel->getActiveSheet()->getCell('J' . $row)->getValue());
	  $year  =trim($objPHPExcel->getActiveSheet()->getCell('K' . $row)->getValue());
	  $payment =trim($objPHPExcel->getActiveSheet()->getCell('L' . $row)->getValue());
	  $account_no =trim($objPHPExcel->getActiveSheet()->getCell('M' . $row)->getValue());
	  $ifc_code =trim($objPHPExcel->getActiveSheet()->getCell('N' . $row)->getValue());
	  $address=trim($objPHPExcel->getActiveSheet()->getCell('O' . $row)->getValue());
	  $dob=date('Y-m-d',strtotime($dob1));
	  $Date=date('Y-m-d H:i:s');
	  $status='active';
	  $teacher_type='teacher';
	  $duplicate_values_check=$this->db->query("select *from tbl_teacher where Teacher_email='".$Teacher_email."' and pid='$pid'")->row();
	  if(count($duplicate_values_check)==0){
               $insert_array=array('Pid'=>$pid,'Teacher_name'=>$Teacher_name,'gender'=>$gender,'dob'=>$dob,'adhar_card'=>$adhar_card,'pan_card'=>$pan_card,'Teacher_mobile_no'=>$Teacher_mobile_no,'Teacher_email'=>$Teacher_email,'Teacher_password'=>$Teacher_password,'schools_name'=>$schools_name,'divsion'=>$divsion,'year'=>$year,'payment'=>$payment,'account_no'=>$account_no,'ifc_code'=>$ifc_code,'Date'=>$Date,'status'=>$status,'teacher_type'=>$teacher_type,'address'=>$address);
					$this->db->insert('tbl_teacher',$insert_array);
					}else{
				    $update_array=array('Pid'=>$pid,'Teacher_name'=>$Teacher_name,'gender'=>$gender,'dob'=>$dob,'adhar_card'=>$adhar_card,'pan_card'=>$pan_card,'Teacher_mobile_no'=>$Teacher_mobile_no,'Teacher_email'=>$Teacher_email,'Teacher_password'=>$Teacher_password,'schools_name'=>$schools_name,'divsion'=>$divsion,'year'=>$year,'payment'=>$payment,'account_no'=>$account_no,'ifc_code'=>$ifc_code,'address'=>$address);
					$this->db->where('Teacher_email',$Teacher_email);					
					$this->db->update('tbl_teacher',$update_array);
					}
     	 }
}
unlink($file_directory.$new_file_name);
 $_SESSION['SUCESSMSG']='Excel Sheet Imported Successfully..';
 redirect('admin_import_student_excel_sheet?teacher_excel=sheet');
  }
public function download__student_excel_format(){
$this->load->helper('download');
   $name= $_GET['filname'];
$data = file_get_contents("Student.xlsx");
force_download($name, $data);
}

public function download_teacher_excel_sheet(){
$this->load->helper('download');
   $name= $_GET['filname'];
$data = file_get_contents("Teacher.xlsx");
force_download($name, $data);
}	
	
public function download_excel_format(){
error_reporting(0);
    $styleHeading = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'FF0000'),
                'size' => 15,
                'name' => 'Verdana'
        ));
        $styleHeader = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => '080002'),
                'size' => 10,
                'name' => 'Verdana'
        ));
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        //name the worksheet
        $objPHPExcel->getActiveSheet()->getStyle("A1:N1")->applyFromArray($styleHeader);
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'student_id');
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'student_name');
        $objPHPExcel->getActiveSheet()->setCellValue('C1', 'subject_name');
        $objPHPExcel->getActiveSheet()->setCellValue('D1', 'max_marks');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'minmum_marks');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'obtained_marks');
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
           $c = 2;$serialno=1;
         $teacher_id=$_SESSION['TEACHER_ID'];
		 $t=$this->db->query("select *from tbl_teacher where Tid='$teacher_id'")->row();
		 $class=$t->schools_name;
		 $division=$t->divsion;
		 $pid=$t->Pid;
        $parent=$this->db->query("select *from tbl_parent where pid='$pid' and Student_class_division='$class' and divsion='$division'")->result();
		 foreach($parent as $row){
           $objPHPExcel->getActiveSheet()->setCellValue('A'.$c ,$row->Ptid);
		   $objPHPExcel->getActiveSheet()->setCellValue('B'.$c , $row->Student_name);
		   $objPHPExcel->getActiveSheet()->setCellValue('C'.$c , '');
		   $objPHPExcel->getActiveSheet()->setCellValue('D'.$c , '');
		   $objPHPExcel->getActiveSheet()->setCellValue('E'.$c , '');
		   $objPHPExcel->getActiveSheet()->setCellValue('F'.$c ,'');
		   $c++;
		   }
   header('Content-Type: application/vnd.ms-excel');
   header('Content-Disposition: attachment;filename="studentshhet.xls"');
   header('Cache-Control: max-age=0');
   $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
   ob_clean();
   $objWriter->save('php://output');    
   }  
 public function student_final_result_uploads(){
  $class=$this->input->post('class');
  $division=$this->input->post('division');
  $exam_name=$this->input->post('exam_name');
  $pid=$this->input->post('pid');
  $year=date('Y');
  $month=date('m');
  $date=date('Y-m-d');
 $objPHPExcel = new PHPExcel();
$file_info = pathinfo($_FILES["uploadsheet"]["name"]);
 $pid=$this->input->post('pid');
$file_directory = "assets/sheets/";
$new_file_name = date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];
if(move_uploaded_file($_FILES["uploadsheet"]["tmp_name"], $file_directory . $new_file_name)) {  
    $file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    $objReader	= PHPExcel_IOFactory::createReader($file_type);
    $objPHPExcel = $objReader->load($file_directory . $new_file_name);
    $sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	  
	  $student_id1 =trim($objPHPExcel->getActiveSheet()->getCell('A1')->getValue());
	  $student_name1 =trim($objPHPExcel->getActiveSheet()->getCell('B1')->getValue());
	  $subject_name1 =trim($objPHPExcel->getActiveSheet()->getCell('C1')->getValue());
	  $max_marks1 =trim($objPHPExcel->getActiveSheet()->getCell('D1')->getValue());
	  $minmum_marks1 =trim($objPHPExcel->getActiveSheet()->getCell('E1')->getValue());
	  $obtained_marks1 =trim($objPHPExcel->getActiveSheet()->getCell('F1')->getValue());
	  //echo $student_id.$obtained_marks;
	  //exit;
	  $highestRow=count($sheet_data);
	  if($student_id1=='student_id' && $student_name1=='student_name' && $subject_name1=='subject_name' && $max_marks1=='max_marks' && $minmum_marks1=='minmum_marks' && $obtained_marks1=='obtained_marks'){
	 for ($row = 2; $row <= $highestRow; $row++) {
	  $parent_id =trim($objPHPExcel->getActiveSheet()->getCell('A' . $row)->getValue());
	  $student_name =trim($objPHPExcel->getActiveSheet()->getCell('B' . $row)->getValue());
	  $subject_name =trim($objPHPExcel->getActiveSheet()->getCell('C' . $row)->getValue());
	  $maximum_marks =trim($objPHPExcel->getActiveSheet()->getCell('D' . $row)->getValue());
	  $minmum_marks =trim($objPHPExcel->getActiveSheet()->getCell('E' . $row)->getValue());
	  $obtained_marks =trim($objPHPExcel->getActiveSheet()->getCell('F' . $row)->getValue());
	//  echo $exam_name;
	  //exit;
			 if($exam_name=='First Term Examination'){
			    $first_terms=$this->db->query("select *from result_master where pid='$pid' and parent_id='$parent_id' and class='$class' and division='$division' and exam_name='$exam_name' and year='$year'")->row();
				
				if(count($first_terms)>=1){
				$rmid=$first_terms->rmid;
				
$insert_student_result=array('subject_name'=>$subject_name,'maximum_marks'=>$maximum_marks,'minmum_marks'=>$minmum_marks,'obtained_marks'=>$obtained_marks,'rmid'=>$rmid,'created_date'=>$date,'status'=>'active');
  $this->db->insert('result_subject_marks',$insert_student_result);
				     }else{
	$insert_array=array('division'=>$division,'class'=>$class,'pid'=>$pid,'create_date'=>$date,'exam_name'=>$exam_name,'year'=>$year,'month'=>$month,'parent_id'=>$parent_id);	 
	$this->db->insert('result_master',$insert_array);
	 $rmid=$this->db->insert_id();
$insert_student_result=array('subject_name'=>$subject_name,'maximum_marks'=>$maximum_marks,'minmum_marks'=>$minmum_marks,'obtained_marks'=>$obtained_marks,'rmid'=>$rmid,'created_date'=>$date,'status'=>'active');
  $this->db->insert('result_subject_marks',$insert_student_result);

					 }
			      }elseif($exam_name=='Second Term Examination'){
				 $second_terms=$this->db->query("select *from result_master where pid='$pid' and parent_id='$parent_id' and class='$class' and division='$division' and exam_name='$exam_name' and year='$year'")->row();
				 $this->db->insert('result_master',$insert_array);
	             $rmid=$this->db->insert_id();
				 if(count($second_terms)>=1){
				$rmid=$second_terms->rmid;
$insert_student_result=array('subject_name'=>$subject_name,'maximum_marks'=>$maximum_marks,'minmum_marks'=>$minmum_marks,'obtained_marks'=>$obtained_marks,'rmid'=>$rmid,'created_date'=>$date,'status'=>'active');
  $this->db->insert('result_subject_marks',$insert_student_result);
				     }else{
	$insert_array=array('division'=>$division,'class'=>$class,'pid'=>$pid,'create_date'=>$date,'exam_name'=>$exam_name,'year'=>$year,'month'=>$month,'parent_id'=>$parent_id);	 
	$this->db->insert('result_master',$insert_array);
	 $rmid=$this->db->insert_id();
$insert_student_result=array('subject_name'=>$subject_name,'maximum_marks'=>$maximum_marks,'minmum_marks'=>$minmum_marks,'obtained_marks'=>$obtained_marks,'rmid'=>$rmid,'created_date'=>$date,'status'=>'active');
  $this->db->insert('result_subject_marks',$insert_student_result);
					 }
				  }else{
				 $unit_test=$this->db->query("select *from result_master where pid='$pid' and parent_id='$parent_id' and class='$class' and division='$division' and exam_name='$exam_name' and year='$year' and month='$month'")->row();
				  if(count($unit_test)>=1){
				$rmid=$unit_test->rmid;
				
$insert_student_result=array('subject_name'=>$subject_name,'maximum_marks'=>$maximum_marks,'minmum_marks'=>$minmum_marks,'obtained_marks'=>$obtained_marks,'rmid'=>$rmid,'created_date'=>$date,'status'=>'active');
  $this->db->insert('result_subject_marks',$insert_student_result);
				     }else{
  $insert_array=array('division'=>$division,'class'=>$class,'pid'=>$pid,'create_date'=>$date,'exam_name'=>$exam_name,'year'=>$year,'month'=>$month,'parent_id'=>$parent_id);		   $this->db->insert('result_master',$insert_array);
	 $rmid=$this->db->insert_id();
$insert_student_result=array('subject_name'=>$subject_name,'maximum_marks'=>$maximum_marks,'minmum_marks'=>$minmum_marks,'obtained_marks'=>$obtained_marks,'rmid'=>$rmid,'created_date'=>$date,'status'=>'active');
  $this->db->insert('result_subject_marks',$insert_student_result);
					 }
				  }
         	 }
   unlink($file_directory.$new_file_name);
 $_SESSION['SUCESSMSG']='Excel Sheet Imported Successfully..';
 redirect('view-student-result?student_excel=sheet');
 }else{
 $_SESSION['EROOR']='Your Uploaded Excel Sheet Invalid Format';
 redirect('create-student-result?excel=upload');
   }
 }
}
 public function get_student_exam_form_details(){
  $class=$this->input->post('class');
  $division=$this->input->post('division');
  $exam_name=$this->input->post('exam_name');
  $pid=$this->input->post('pid');
  $year=date('Y');
  $month=date('m');
  
 $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
        if(is_uploaded_file($_FILES['uploadsheet']['tmp_name'])){
            $csvFile = fopen($_FILES['uploadsheet']['tmp_name'], 'r');
            fgetcsv($csvFile); 
			 $date=date('Y-m-d');
            while(($line = fgetcsv($csvFile)) !== FALSE){
			$parent_id=$line[0];
			 if($exam_name=='First Term Examination'){
			    $first_terms=$this->db->query("select *from result_master where pid='$pid' and parent_id='$parent_id' and class='$class' and division='$division' and exam_name='$exam_name' and year='$year'")->row();
				if(count($first_terms)>=1){
				$rmid=$first_terms->rmid;
				$subject_name =$line[2]; $maximum_marks = $line[3]; $minmum_marks =$line[4]; $obtained_marks =$line[5];
$insert_student_result=array('subject_name'=>$subject_name,'maximum_marks'=>$maximum_marks,'minmum_marks'=>$minmum_marks,'obtained_marks'=>$obtained_marks,'rmid'=>$rmid,'created_date'=>$date,'status'=>'active');
  $this->db->insert('result_subject_marks',$insert_student_result);
				     }else{
	$insert_array=array('division'=>$division,'class'=>$class,'pid'=>$pid,'create_date'=>$date,'exam_name'=>$exam_name,'year'=>$year,'month'=>$month,'parent_id'=>$parent_id);	 
	$this->db->insert('result_master',$insert_array);
	 $rmid=$this->db->insert_id();
	 $subject_name =$line[2]; $maximum_marks = $line[3]; $minmum_marks =$line[4]; $obtained_marks =$line[5];
$insert_student_result=array('subject_name'=>$subject_name,'maximum_marks'=>$maximum_marks,'minmum_marks'=>$minmum_marks,'obtained_marks'=>$obtained_marks,'rmid'=>$rmid,'created_date'=>$date,'status'=>'active');
  $this->db->insert('result_subject_marks',$insert_student_result);
					 }
			      }elseif($exam_name=='Second Term Examination'){
				 $second_terms=$this->db->query("select *from result_master where pid='$pid' and parent_id='$parent_id' and class='$class' and division='$division' and exam_name='$exam_name' and year='$year'")->row();
				 $this->db->insert('result_master',$insert_array);
	             $rmid=$this->db->insert_id();
				 if(count($second_terms)>=1){
				$rmid=$second_terms->rmid;
				$subject_name =$line[2]; $maximum_marks = $line[3]; $minmum_marks =$line[4]; $obtained_marks =$line[5];
$insert_student_result=array('subject_name'=>$subject_name,'maximum_marks'=>$maximum_marks,'minmum_marks'=>$minmum_marks,'obtained_marks'=>$obtained_marks,'rmid'=>$rmid,'created_date'=>$date,'status'=>'active');
  $this->db->insert('result_subject_marks',$insert_student_result);
				     }else{
	$insert_array=array('division'=>$division,'class'=>$class,'pid'=>$pid,'create_date'=>$date,'exam_name'=>$exam_name,'year'=>$year,'month'=>$month,'parent_id'=>$parent_id);	 
	$this->db->insert('result_master',$insert_array);
	 $rmid=$this->db->insert_id();
	$subject_name =$line[2]; $maximum_marks = $line[3]; $minmum_marks =$line[4]; $obtained_marks =$line[5];
$insert_student_result=array('subject_name'=>$subject_name,'maximum_marks'=>$maximum_marks,'minmum_marks'=>$minmum_marks,'obtained_marks'=>$obtained_marks,'rmid'=>$rmid,'created_date'=>$date,'status'=>'active');
  $this->db->insert('result_subject_marks',$insert_student_result);
					 }
				  }else{
				 $unit_test=$this->db->query("select *from result_master where pid='$pid' and parent_id='$parent_id' and class='$class' and division='$division' and exam_name='$exam_name' and year='$year' and month='$month'")->row();
				  if(count($unit_test)>=1){
				$rmid=$unit_test->rmid;
				$subject_name =$line[2]; $maximum_marks = $line[3]; $minmum_marks =$line[4]; $obtained_marks =$line[5];
$insert_student_result=array('subject_name'=>$subject_name,'maximum_marks'=>$maximum_marks,'minmum_marks'=>$minmum_marks,'obtained_marks'=>$obtained_marks,'rmid'=>$rmid,'created_date'=>$date,'status'=>'active');
  $this->db->insert('result_subject_marks',$insert_student_result);
				     }else{
  $insert_array=array('division'=>$division,'class'=>$class,'pid'=>$pid,'create_date'=>$date,'exam_name'=>$exam_name,'year'=>$year,'month'=>$month,'parent_id'=>$parent_id);		   $this->db->insert('result_master',$insert_array);
	 $rmid=$this->db->insert_id();
	 $subject_name =$line[2]; $maximum_marks = $line[3]; $minmum_marks =$line[4]; $obtained_marks =$line[5];
$insert_student_result=array('subject_name'=>$subject_name,'maximum_marks'=>$maximum_marks,'minmum_marks'=>$minmum_marks,'obtained_marks'=>$obtained_marks,'rmid'=>$rmid,'created_date'=>$date,'status'=>'active');
  $this->db->insert('result_subject_marks',$insert_student_result);
					 }
				  }
                }
            fclose($csvFile);
          $_SESSION['SUCESSMSG']='Student Result Excel Sheet Uploaded Successfully..';
		   redirect('view-student-result');
        }else{
           $_SESSION['SUCESSMSG']='Excel Sheet Not';
        }
 }
 
 public function download_student_excel_data(){
  if($_SESSION['USERTYPE']=='clerk'){ 
  $currentrecords=$this->db->query("select *from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
  $pid=$currentrecords->login_id;
  }else{
 $pid=$_SESSION['PRINCIPLE_ID'];
  }
 if((isset($_GET['class'])) && (isset($_GET['division'])) && (isset($_GET['sub_details']))){
$class=$_GET['class'];
$division=$_GET['division'];
$sub_caste=$_GET['sub_details'];
if((!empty($_GET['class'])) && (!empty($_GET['division'])) && (!empty($_GET['sub_details']))){
if($class=='all'){
$mysqluery=$this->db->query("select *from tbl_parent where  pid='".$pid."' and Student_class_division='$class' and divsion='$division' and sub_cast='$sub_caste' order by Student_name asc")->result();
}else{
$mysqluery=$this->db->query("select *from tbl_parent where pid='".$pid."' and divsion='$division' and sub_cast='$sub_caste' order by Student_name asc")->result();
 }
}elseif((!empty($_GET['class'])) && (!empty($_GET['division']))){
if($class=='all'){
$mysqluery=$this->db->query("select *from tbl_parent where pid='".$pid."' and divsion='$division' order by Student_name asc")->result();
}else{
$mysqluery=$this->db->query("select *from tbl_parent where  pid='".$pid."' and Student_class_division='$class' and divsion='$division' order by Student_name asc")->result();
//echo $this->db->last_query();
//exit();
}
}elseif((!empty($_GET['class'])) && (!empty($_GET['sub_details']))){
if($class=='all'){
$mysqluery=$this->db->query("select *from tbl_parent where pid='".$pid."' and sub_cast='$sub_caste' order by Student_name asc")->result();
}else{
$mysqluery=$this->db->query("select *from tbl_parent where  pid='".$pid."' and Student_class_division='$class' and sub_cast='$sub_caste' order by Student_name asc")->result();
}
}else{
if($class=='all'){
$mysqluery=$this->db->query("select *from tbl_parent where pid='".$pid."' order by Student_name asc")->result();
}else{
$mysqluery=$this->db->query("select *from tbl_parent where pid='".$pid."' and Student_class_division='$class' order by Student_name asc")->result();
   }
  }
 }
   //echo $this->db->last_query();
   //exit;
  // exit;
error_reporting(0);
    $styleHeading = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'FF0000'),
                'size' => 15,
                'name' => 'Verdana'
        ));
        $styleHeader = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => '080002'),
                'size' => 10,
                'name' => 'Verdana'
        ));
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        //name the worksheet
        $objPHPExcel->getActiveSheet()->getStyle("A1:AA1")->applyFromArray($styleHeader);
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Old School Name');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Admission No.');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Admission Date');
	    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Student I.D. NO.');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'U.I.D. NO.');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Aadhar No');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Pan Card');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Mobile Number');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Roll No');
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Select Class');
		$objPHPExcel->getActiveSheet()->setCellValue('K1', 'Class Division');
		$objPHPExcel->getActiveSheet()->setCellValue('L1', 'Medium');
		$objPHPExcel->getActiveSheet()->setCellValue('M1', 'Class Year');
		$objPHPExcel->getActiveSheet()->setCellValue('N1', 'Student Name');
		$objPHPExcel->getActiveSheet()->setCellValue('O1', 'Gender');
		$objPHPExcel->getActiveSheet()->setCellValue('P1', 'Mother Name');
		$objPHPExcel->getActiveSheet()->setCellValue('Q1', 'Address');
		$objPHPExcel->getActiveSheet()->setCellValue('R1', 'Religion(Caste)');
		$objPHPExcel->getActiveSheet()->setCellValue('S1', 'Subgenre (Sub-Caste)');
		$objPHPExcel->getActiveSheet()->setCellValue('T1', 'Caste Category');
		$objPHPExcel->getActiveSheet()->setCellValue('U1', 'Nationality');
		$objPHPExcel->getActiveSheet()->setCellValue('V1', 'Birth-Place ');
		$objPHPExcel->getActiveSheet()->setCellValue('W1', 'Date Of Birth(in digit)');
		$objPHPExcel->getActiveSheet()->setCellValue('X1', 'Date of Birth (In Words)');
		$objPHPExcel->getActiveSheet()->setCellValue('Y1', 'Bank Name');
		$objPHPExcel->getActiveSheet()->setCellValue('Z1', 'Account No');
		$objPHPExcel->getActiveSheet()->setCellValue('AA1', 'IFC Code');
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(30);
		$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(30);
		$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(20);
           $c = 2;$serialno=1;
		 foreach($mysqluery as $row){
           $objPHPExcel->getActiveSheet()->setCellValue('A'.$c ,$row->old_schools);
		   $objPHPExcel->getActiveSheet()->setCellValue('B'.$c ,$row->gr_code);
		   $objPHPExcel->getActiveSheet()->setCellValue('C'.$c ,$row->admission_date);
		   $objPHPExcel->getActiveSheet()->setCellValue('D'.$c ,$row->student_id_no);
		   $objPHPExcel->getActiveSheet()->setCellValue('E'.$c ,$row->u_id_no);
		   $objPHPExcel->getActiveSheet()->setCellValue('F'.$c ,$row->adhar_card);
		   $objPHPExcel->getActiveSheet()->setCellValue('G'.$c ,$row->pan_no);
		   $objPHPExcel->getActiveSheet()->setCellValue('H'.$c ,$row->Parent_mobile_no);
		   $objPHPExcel->getActiveSheet()->setCellValue('I'.$c ,$row->Student_roll_no);
		   $objPHPExcel->getActiveSheet()->setCellValue('J'.$c ,$row->Student_class_division);
		   $objPHPExcel->getActiveSheet()->setCellValue('K'.$c ,$row->divsion);
		   $objPHPExcel->getActiveSheet()->setCellValue('L'.$c ,$row->medium);
		   $objPHPExcel->getActiveSheet()->setCellValue('M'.$c ,$row->Student_year);
		   $objPHPExcel->getActiveSheet()->setCellValue('N'.$c ,$row->Student_name);
		   $objPHPExcel->getActiveSheet()->setCellValue('O'.$c ,$row->gender);
		   $objPHPExcel->getActiveSheet()->setCellValue('P'.$c ,$row->mother_name);
		   $objPHPExcel->getActiveSheet()->setCellValue('Q'.$c ,$row->address);
		   $objPHPExcel->getActiveSheet()->setCellValue('R'.$c ,$row->cast);
		   $objPHPExcel->getActiveSheet()->setCellValue('S'.$c ,$row->Subgenre);
		   $objPHPExcel->getActiveSheet()->setCellValue('T'.$c ,$row->sub_cast);
		   $objPHPExcel->getActiveSheet()->setCellValue('U'.$c ,$row->nationality);
		   $objPHPExcel->getActiveSheet()->setCellValue('V'.$c ,$row->birth_place);
		   $objPHPExcel->getActiveSheet()->setCellValue('W'.$c ,$row->dob);
		   $objPHPExcel->getActiveSheet()->setCellValue('X'.$c ,$row->date_of_birth_word);
		   $objPHPExcel->getActiveSheet()->setCellValue('Y'.$c ,$row->bank_no);
		   $objPHPExcel->getActiveSheet()->setCellValue('Z'.$c ,$row->account_no);
		   $objPHPExcel->getActiveSheet()->setCellValue('AA'.$c ,$row->ifc_code);
		   $c++;
		   }
   header('Content-Type: application/vnd.ms-excel');
   header('Content-Disposition: attachment;filename="student_list.xls"');
   header('Cache-Control: max-age=0');
   $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
   ob_clean();
   $objWriter->save('php://output');    
   }
/*public function send_bulk_mails(){
   $subject=trim($this->input->post('subject'));
   $message=trim($this->input->post('message'));
   $pid=trim($this->input->post('pid'));
   if($pid=='All'){
  $tbl_principle=$this->db->query("select Pid,Principle_name,Principle_school_name from  tbl_principle where login_id='NULL'")->result();  
 foreach($tbl_principle as $row){
 $bodymsg='<div  style="background-color:#FFFFFF;color: #000;padding:0px 20px; border:1px solid;width:600px;">';
 $bodymsg.='<div style="hight:"';
 $bodymsg=.'</div>';
$mail_subject="Enquiry Send For ".$name;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From:VMBSS.<vikram@vmbss.org>' . "\r\n";
$headers .= 'Cc: sandip@vmbss.org' . "\r\n";
$mail_sent = mail($mail_to,$mail_subject,$body,$headers);
    }
    }else{
	
	}
  }*/
   public function download_final_sheet_format(){
   error_reporting(0);
   echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
    header('Content-Type: text/html; charset=UTF-8');
  // Create new PHPExcel object
//echo date('H:i:s') . " Create new PHPExcel object\n";
$objPHPExcel = new PHPExcel();
// Create a first sheet
//echo date('H:i:s') . " Add data\n";
$styleHeading = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'FF0000'),
                'size' => 15,
                'name' => 'Verdana'
        ));
        $styleHeader = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => '080002'),
                'size' => 10,
                'name' => 'Verdana'
        ));
       // $objPHPExcel = new PHPExcel();
       // $objPHPExcel->setActiveSheetIndex(0);
        //name the worksheet
        $objPHPExcel->getActiveSheet()->getStyle("A1:E1")->applyFromArray($styleHeader);
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setCellValue('A1', "Student Name");
$objPHPExcel->getActiveSheet()->setCellValue('B1', "Aadhar Number");
$objPHPExcel->getActiveSheet()->setCellValue('C1', "Exam No");
//$objPHPExcel->getActiveSheet()->setCellValue('D1', "Subject");
$objPHPExcel->getActiveSheet()->setCellValue('D1', "Obtain Marks");
		
		$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(30);
		$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
		//$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
// Set data validation
//echo date('H:i:s') . " Set data validation\n";
$id=$_SESSION['TEACHER_ID'];
$teachers=$this->db->query("select schools_name,Pid from tbl_teacher where Tid='$id'")->row();
$tbl_parent=$this->db->query("select *from tbl_parent where Student_class_division='$teachers->schools_name' and pid='$teachers->Pid'")->result();
$c = 2;$serialno=1;
		 foreach($tbl_parent as $row){
		   $objPHPExcel->getActiveSheet()->setCellValue('A'.$c ,$row->Student_name);
		   $objPHPExcel->getActiveSheet()->setCellValue('B'.$c ,$row->adhar_card);
		   $objPHPExcel->getActiveSheet()->setCellValue('C'.$c ,'');
$objValidation = $objPHPExcel->getActiveSheet()->getCell('D'.$c)->getDataValidation();
$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_WHOLE );
$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_STOP );
$objValidation->setAllowBlank(true);
$objValidation->setShowInputMessage(true);
$objValidation->setShowErrorMessage(true);
$objValidation->setErrorTitle('Input error');
$objValidation->setError('Number is not allowed!');
$objValidation->setPromptTitle('Allowed input');
$objValidation->setPrompt('Only numbers between 1 and 200 are allowed.');
$objValidation->setFormula1(1);
$objValidation->setFormula2(200);

	// Make sure to put the list items between " and "  !!!
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
/*$tbl_subject_master=$this->db->query("select subject from tbl_subject_master where id='1'")->row();
$objValidation = $objPHPExcel->getActiveSheet()->getCell('D'.$c)->getDataValidation();
$objValidation->setType( PHPExcel_Cell_DataValidation::TYPE_LIST );
$objValidation->setErrorStyle( PHPExcel_Cell_DataValidation::STYLE_INFORMATION );
$objValidation->setAllowBlank(false);
$objValidation->setShowInputMessage(true);
$objValidation->setShowErrorMessage(true);
$objValidation->setShowDropDown(true);
$objValidation->setErrorTitle('Input error');
$objValidation->setError('This subject not allowed');
$objValidation->setPromptTitle('Pick from list');
$objValidation->setPrompt('Please pick a value from the drop-down list.');
$objValidation->setFormula1('"इंग्रजी,कला,मराठी,हिंदी,संस्कृत,परिसर,अभ्यास,शिक्षण,संगणक,विज्ञान,Marathi,English,Hindi,Methematics,Socialogy,History"');	
*/
// Make sure to put the list items between " and "  !!!
// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$c++;
$serialno++;
}
$objPHPExcel->setActiveSheetIndex(0);
// Save Excel 2007 file
//echo date('H:i:s') . " Write to Excel2007 format\n";
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
//$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
$filename=$_SESSION['TEACHER_ID'].date('Y-m-d').'.xls';
$objWriter->save('assets/result/'.$filename);
$this->load->helper('download');
$data = file_get_contents("assets/result/".$filename);
force_download($filename, $data);
//$file_directory='assets/result/';
//echo $files;
//exit;
// Echo memory peak usage
//unlink('assets/'.$filename);
echo date('H:i:s') . " Peak memory usage: " . (memory_get_peak_usage(true) / 1024 / 1024) . " MB\r\n";
// Echo done
echo date('H:i:s') . " Done writing file.\r\n";

     
  }
  
  public function send_bulk_mails(){
   $subject=trim($this->input->post('subject'));
   $message=trim($this->input->post('message'));
   $pid=trim($this->input->post('pid'));
   $mail_sent='';
   if($pid=='All'){
  $tbl_principle=$this->db->query("select Pid,Principle_name,Principle_school_name,Principle_email from  tbl_principle where login_id='NULL'")->result();  
 foreach($tbl_principle as $row){
 $bodymsg='<div  style="background-color:#FFFFFF;color: #000;padding:0px 20px; border:1px solid;width:600px;">';
 $bodymsg.='<div style=""><strong>Respected, '.$row->Principle_name.'</strong><br><p>'.$message.'</p><br><br><br><br>';
 $bodymsg.='</div><div style="width:100%;"><p style="text-align-center">
 <strong style="color:purple;font-size:25px;">VIMALAI SCHOOL MANAGEMENT</strong><br>Mobile No. 7448286207<br>Email: vikram@vmbss.org<br>Web: vmbss.org</div></div>';
$mail_subject=$subject;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From:VIMALAI SCHOOL MANAGEMENT.<vikram@vmbss.org>' . "\r\n";
$headers .= 'Cc: sandip@vmbss.org' . "\r\n";
$mail_sent = mail($row->Principle_email,$mail_subject,$bodymsg,$headers);
    }
    }else{
 $tbl_principle=$this->db->query("select Pid,Principle_name,Principle_school_name,Principle_email from  tbl_principle where Pid='$pid' and login_id='NULL'")->row();  
$bodymsg='<div  style="background-color:#FFFFFF;color: #000;padding:0px 20px; border:1px solid;width:600px;">';
 $bodymsg.='<div style=""><strong>Respected, '.$tbl_principle->Principle_name.'</strong><br><p>'.$message.'</p><br><br><br><br>';
 $bodymsg.='</div><div style="width:100%;"><p style="text-align-center">
 <strong style="color:purple;font-size:25px;">VIMALAI SCHOOL MANAGEMENT</strong><br>Mobile No. 7448286207<br>Email: vikram@vmbss.org<br>Web: vmbss.org</div></div>';
$mail_subject=$subject;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From:VIMALAI SCHOOL MANAGEMENT.<vikram@vmbss.org>' . "\r\n";
$headers .= 'Cc: sandip@vmbss.org' . "\r\n";
$mail_sent = mail($tbl_principle->Principle_email,$mail_subject,$bodymsg,$headers);
	}
 if($mail_sent==true){
    $_SESSION['SUCESSMSG']='Mail Sent Successfully..';
  redirect('common-mail-notification');
  }else{
  echo 'Not Send';
  }
 }
public function uploaded_final_result_students(){
 $class=$this->input->post('class');
  $division=$this->input->post('division');
  $examination_name=$this->input->post('examination_name');
  $subject=$this->input->post('subject');
  $exam_type=$this->input->post('exam_type');
  $pid=$this->input->post('pid');
  $year=date('Y');
  $month=date('m');
  $date=date('Y-m-d');
 $objPHPExcel = new PHPExcel();
$file_info = pathinfo($_FILES["uploadsheet"]["name"]);
 $pid=$this->input->post('pid');
$file_directory = "assets/sheets/";
$new_file_name = date("d-m-Y ") . rand(000000, 999999) .".". $file_info["extension"];
if(move_uploaded_file($_FILES["uploadsheet"]["tmp_name"], $file_directory . $new_file_name)) {  
    $file_type	= PHPExcel_IOFactory::identify($file_directory . $new_file_name);
    $objReader	= PHPExcel_IOFactory::createReader($file_type);
    $objPHPExcel = $objReader->load($file_directory . $new_file_name);
    $sheet_data	= $objPHPExcel->getActiveSheet()->toArray(null,true,true,true);
	  
	  $studen_name1 =trim($objPHPExcel->getActiveSheet()->getCell('A1')->getValue());
	  $aadhar_no1 =trim($objPHPExcel->getActiveSheet()->getCell('B1')->getValue());
	  $exam_no1 =trim($objPHPExcel->getActiveSheet()->getCell('C1')->getValue());
	  $obtain_marks1 =trim($objPHPExcel->getActiveSheet()->getCell('D1')->getValue());
      $highestRow=count($sheet_data);
	  if($studen_name1=='Student Name' && $aadhar_no1=='Aadhar Number' && $exam_no1=='Exam No' && $obtain_marks1=='Obtain Marks'){
	 for ($row = 2; $row <= $highestRow; $row++) {
	  $parent_id =trim($objPHPExcel->getActiveSheet()->getCell('A' . $row)->getValue());
	  $aadhar_no =trim($objPHPExcel->getActiveSheet()->getCell('B' . $row)->getValue());
	  $exam_no =trim($objPHPExcel->getActiveSheet()->getCell('C' . $row)->getValue());
	  $obtain_marks =trim($objPHPExcel->getActiveSheet()->getCell('D' . $row)->getValue());
	   $Ptid=$this->db->query("select Ptid,pid from tbl_parent where adhar_card='$aadhar_no'")->row();
		$parent_id=$Ptid->Ptid;		 
		$pid=$Ptid->pid;		 
		 $exam_duplications=$this->db->query("select *from tbl_final_result_master where pid='$pid' and parent_id='$parent_id' and class='$class' and division='$division' and examination_name='$examination_name' and year='$year' and subject='$subject' and exam_type='$exam_type'")->row();
	 //echo $this->db->last_query();
		// exit;
			 if($exam_type=='First Terms'){
				if(count($exam_duplications)==0){
$insert_student_result=array('class'=>$class,'division'=>$division,'parent_id'=>$parent_id,'examination_name'=>$examination_name,'subject'=>$subject,'pid'=>$pid,'exam_type'=>$exam_type,'year'=>date('Y'),'exam_no'=>$exam_no,'obtained_marks'=>$obtain_marks,'created_date'=>date('Y-m-d'));
  $this->db->insert('tbl_final_result_master',$insert_student_result);
				     }else{
	$insert_student_result=array('class'=>$class,'division'=>$division,'parent_id'=>$parent_id,'examination_name'=>$examination_name,'subject'=>$subject,'pid'=>$pid,'exam_type'=>$exam_type,'year'=>date('Y'),'exam_no'=>$exam_no,'obtained_marks'=>$obtain_marks);
  $this->db->where('id',$exam_duplications->id);	
  $this->db->update('tbl_final_result_master',$insert_student_result);
					 }
			      }elseif($exam_type=='Second Terms'){
				 if(count($exam_duplications)==0){
			$insert_student_result=array('class'=>$class,'division'=>$division,'parent_id'=>$parent_id,'examination_name'=>$examination_name,'subject'=>$subject,'pid'=>$pid,'exam_type'=>$exam_type,'year'=>date('Y'),'exam_no'=>$exam_no,'obtained_marks'=>$obtain_marks,'created_date'=>date('Y-m-d'));
  $this->db->insert('tbl_final_result_master',$insert_student_result);
				     }else{
	$insert_student_result=array('class'=>$class,'division'=>$division,'parent_id'=>$parent_id,'examination_name'=>$examination_name,'subject'=>$subject,'pid'=>$pid,'exam_type'=>$exam_type,'year'=>date('Y'),'exam_no'=>$exam_no,'obtained_marks'=>$obtain_marks);
  $this->db->where('id',$exam_duplications->id);	
  $this->db->update('tbl_final_result_master',$insert_student_result);
					 }
				  }
         	 }
   unlink($file_directory.$new_file_name);
 $_SESSION['SUCESSMSG']='Excel Sheet Imported Successfully..';
 redirect('create-final-result');
 }else{
 $_SESSION['ErrorsMsg']='Your Uploaded Excel Sheet Invalid Format';
 redirect('create-final-result');
   }
  }
 }
 
 
  public function teachers_excel_sheet_download(){
 
$getrecords=$this->db->query("select login_id,Pid from tbl_principle where Pid='".$_SESSION['PRINCIPLE_ID']."'")->row();
if($_SESSION['USERTYPE']=='clerk'){ 
$pid=$getrecords->login_id;
}else{
$pid=$getrecords->Pid;
}
$mysqluery=$this->db->query("select *from tbl_teacher where Pid='$pid'")->result();
   //echo $this->db->last_query();
   //exit;
  // exit;
error_reporting(0);
    $styleHeading = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'FF0000'),
                'size' => 15,
                'name' => 'Verdana'
        ));
        $styleHeader = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => '080002'),
                'size' => 10,
                'name' => 'Verdana'
        ));
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        //name the worksheet
        $objPHPExcel->getActiveSheet()->getStyle("A1:M1")->applyFromArray($styleHeader);
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(15);
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'Teacher Name');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Gener');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Date Of Birth');
	    $objPHPExcel->getActiveSheet()->setCellValue('D1', 'Aadhar Card');
        $objPHPExcel->getActiveSheet()->setCellValue('E1', 'Pan Card');
        $objPHPExcel->getActiveSheet()->setCellValue('F1', 'Mobile No');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Email ID');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Class & Division');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Class Year');
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Monthly Salary');
		$objPHPExcel->getActiveSheet()->setCellValue('K1', 'Account No');
		$objPHPExcel->getActiveSheet()->setCellValue('L1', 'IFSC Code');
		$objPHPExcel->getActiveSheet()->setCellValue('M1', 'Address');
		
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
		
           $c = 2;$serialno=1;
		 foreach($mysqluery as $row){
           $objPHPExcel->getActiveSheet()->setCellValue('A'.$c ,$row->Teacher_name);
		   $objPHPExcel->getActiveSheet()->setCellValue('B'.$c ,$row->gender);
		   $objPHPExcel->getActiveSheet()->setCellValue('C'.$c ,$row->dob);
		   $objPHPExcel->getActiveSheet()->setCellValue('D'.$c ,$row->adhar_card);
		   $objPHPExcel->getActiveSheet()->setCellValue('E'.$c ,$row->pan_card);
		   $objPHPExcel->getActiveSheet()->setCellValue('F'.$c ,$row->Teacher_mobile_no);
		   $objPHPExcel->getActiveSheet()->setCellValue('G'.$c ,$row->Teacher_email);
		   $objPHPExcel->getActiveSheet()->setCellValue('H'.$c ,$row->schools_name.''. $row->schools_name);
		   $objPHPExcel->getActiveSheet()->setCellValue('I'.$c ,$row->year);
		   $objPHPExcel->getActiveSheet()->setCellValue('J'.$c ,$row->payment);
		   $objPHPExcel->getActiveSheet()->setCellValue('K'.$c ,$row->account_no);
		   $objPHPExcel->getActiveSheet()->setCellValue('L'.$c ,$row->ifc_code);
		   $objPHPExcel->getActiveSheet()->setCellValue('M'.$c ,$row->address);
		   $c++;
		   }
   header('Content-Type: application/vnd.ms-excel');
   header('Content-Disposition: attachment;filename="Teacherlist.xls"');
   header('Cache-Control: max-age=0');
   $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
   ob_clean();
   $objWriter->save('php://output');    
   }
}
?>