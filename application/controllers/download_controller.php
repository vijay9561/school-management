<?php
//if(!defined('BASEPATH')) EXIT('No direct script access allowed');
class download_controller extends CI_Controller{
function __construct(){
 		parent::__construct();
 	}
public function download_excel_format(){
//ini_set('max_execution_time', 600); //increase max_execution_time to 10 min if data set is very large
	//create a file
	$csv_file = fopen('php://output', 'w');
	$filename = "export_".date("Y.m.d").".csv";
	header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename='.$filename.'');
	
	
	//header('Content-type: application/csv');
	//header('Content-Disposition: attachment; filename="'.$filename.'"');
	//$contenttype = "application/force-download"; 
 //   header("Content-Type: " . $contenttype);
	//header('Content-type: "application/vnd.ms-excel"; charset=utf-8');
    //header("Content-Disposition: attachment; filename=\"" . basename($filename) . "\";");
    //readfile($filename);
//exit();
	//or
      //  $results = $this->ModelName->find('all', array());
	// The column headings of your .csv file
	$header_row = array("student_id", "student_name", "subject_name", "max_marks", "minmum_marks", "obtained_marks");
	fputcsv($csv_file,$header_row,',','"');
	 $teacher_id=$_SESSION['TEACHER_ID'];
		 $t=$this->db->query("select *from tbl_teacher where Tid='$teacher_id'")->row();
		 $class=$t->schools_name;
		 $division=$t->divsion;
		 $pid=$t->Pid;
	// Each iteration of this while loop will be a row in your .csv file where each field corresponds to the heading of the column
	 $parent=$this->db->query("select *from tbl_parent where pid='$pid' and Student_class_division='$class' and divsion='$division'")->result();
		 foreach($parent as $row){
		// Array indexes correspond to the field names in your db table(s)
		$row = array($row->Ptid,$row->Student_name);
		fputcsv($csv_file,$row,',','"');
	}
	
	fclose($csv_file);
	exit;
}
}
 ?>