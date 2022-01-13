<?php 

class Teachers_Api_Controller extends CI_Controller {
    public function __construct() {
        parent::__construct();
        require APPPATH .'third_party/PHPExcel.php';
    }
public function download_excel_result_examination_format(){
error_reporting(0);
include('config.php');
$months=date('m');
$years=date('Y');
$year=$_GET['year'];
$month=$_GET['month'];
if(($month<=$months) && ($year<=$years)){
$mysqlquery=mysql_query("select *from employee order by empid asc");
require_once '../PHPExcel.php';
require_once '../PHPExcel/IOFactory.php';
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
                'size' => 11,
                'name' => 'Verdana'
        ));
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getActiveSheet()->setTitle('Muster Salary');
        $objPHPExcel->getActiveSheet()->mergeCells("B1:J1");
        $objPHPExcel->getActiveSheet()->getStyle("B1:J1")->applyFromArray($styleHeading);
        $objPHPExcel->getActiveSheet()->getStyle("A3:AC3")->applyFromArray($styleHeader);
		
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(35);
		$objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(25);
        $objPHPExcel->getActiveSheet()->setCellValue('B1', 'All Employee Monthly Salary Report');
        $objPHPExcel->getActiveSheet()->setCellValue('K1', 'Date:');
        $objPHPExcel->getActiveSheet()->getStyle("K1")->applyFromArray($styleHeader);
        $objPHPExcel->getActiveSheet()->setCellValue('L1', date('Y-m-d'));
		
        $objPHPExcel->getActiveSheet()->setCellValue('A3', 'Sr no.');
        $objPHPExcel->getActiveSheet()->setCellValue('B3', 'Employee Code');
        $objPHPExcel->getActiveSheet()->setCellValue('C3', 'Employee Name');
        $objPHPExcel->getActiveSheet()->setCellValue('D3', 'Timing');
        $objPHPExcel->getActiveSheet()->setCellValue('E3', 'Gate Pass');
        $objPHPExcel->getActiveSheet()->setCellValue('F3', 'Holiday');
        $objPHPExcel->getActiveSheet()->setCellValue('G3', 'Net Salary');
        $objPHPExcel->getActiveSheet()->setCellValue('H3', 'PF');
		$objPHPExcel->getActiveSheet()->setCellValue('I3', 'E.S.I');
		$objPHPExcel->getActiveSheet()->setCellValue('J3', 'P.T');
		$objPHPExcel->getActiveSheet()->setCellValue('K3', 'TDS');
		$objPHPExcel->getActiveSheet()->setCellValue('L3', 'Room Rent');
		$objPHPExcel->getActiveSheet()->setCellValue('M3', 'Advance CUT');
		$objPHPExcel->getActiveSheet()->setCellValue('N3', 'Commssion');
		$objPHPExcel->getActiveSheet()->setCellValue('O3', 'Incentive');
		$objPHPExcel->getActiveSheet()->setCellValue('P3', 'Earning Type 1');
		$objPHPExcel->getActiveSheet()->setCellValue('Q3', 'Earning Amount 1');
		$objPHPExcel->getActiveSheet()->setCellValue('R3', 'Earning Type 2');
		$objPHPExcel->getActiveSheet()->setCellValue('S3', 'Earning Amount 2');
		$objPHPExcel->getActiveSheet()->setCellValue('T3', 'Earning Type 3');
		$objPHPExcel->getActiveSheet()->setCellValue('U3', 'Earning Amount 3');
		
		$objPHPExcel->getActiveSheet()->setCellValue('V3', 'Deduction Type 1');
		$objPHPExcel->getActiveSheet()->setCellValue('W3', 'Deduction Amount 1');
		$objPHPExcel->getActiveSheet()->setCellValue('X3', 'Deduction Type 2');
		$objPHPExcel->getActiveSheet()->setCellValue('Y3', 'Deduction Amount 2');
		$objPHPExcel->getActiveSheet()->setCellValue('Z3', 'Deduction Type 3');
		$objPHPExcel->getActiveSheet()->setCellValue('AA3', 'Deduction Amount 3');
		$objPHPExcel->getActiveSheet()->setCellValue('AB3', 'Double Leave Deduction');
		$objPHPExcel->getActiveSheet()->setCellValue('AC3', 'Total Salary');
		
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(7);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(35);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(17);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(10);
		$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(17);
		$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(15);
		$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(20);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(25);
		$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(15);
        $c = 5;$serialno=1;
         while($row=mysql_fetch_array($mysqlquery)) {
		  $engineername=mysql_query("select *from salary where empid='".$row['empid']."' and month='$month' and year='$year'");
		  $muster=mysql_fetch_array($engineername);
			$objPHPExcel->getActiveSheet()->setCellValue('A' . $c,$serialno);
			$objPHPExcel->getActiveSheet()->setCellValue('B' . $c,$row['empid']);
			$objPHPExcel->getActiveSheet()->setCellValue('C' . $c,$row['name']);
			$objPHPExcel->getActiveSheet()->setCellValue('D' . $c,$muster['timing']);
			$objPHPExcel->getActiveSheet()->setCellValue('E' . $c,$muster['gate_pass']);
			$objPHPExcel->getActiveSheet()->setCellValue('F' . $c,$muster['holidays']);
			$objPHPExcel->getActiveSheet()->setCellValue('G' . $c,$muster['net_salary']);
			$objPHPExcel->getActiveSheet()->setCellValue('H' . $c,$muster['pf']);
			$objPHPExcel->getActiveSheet()->setCellValue('I' . $c,$muster['esi']);
			$objPHPExcel->getActiveSheet()->setCellValue('J' . $c,$muster['pt']);
			$objPHPExcel->getActiveSheet()->setCellValue('K' . $c,$muster['tds']);
			$objPHPExcel->getActiveSheet()->setCellValue('L' . $c,$muster['room_rent']);
			$objPHPExcel->getActiveSheet()->setCellValue('M' . $c,$muster['monthly_paid_amount']);
			$objPHPExcel->getActiveSheet()->setCellValue('N' . $c,$muster['commission']);
			$objPHPExcel->getActiveSheet()->setCellValue('O' . $c,$muster['incentives']);
			$objPHPExcel->getActiveSheet()->setCellValue('P' . $c,$muster['earning_type1']);
			$objPHPExcel->getActiveSheet()->setCellValue('Q' . $c,$muster['earning_ammount1']);
			$objPHPExcel->getActiveSheet()->setCellValue('R' . $c,$muster['earning_type2']);
			$objPHPExcel->getActiveSheet()->setCellValue('S' . $c,$muster['earning_ammount2']);
			$objPHPExcel->getActiveSheet()->setCellValue('T' . $c,$muster['earning_type3']);
			$objPHPExcel->getActiveSheet()->setCellValue('U' . $c,$muster['earning_ammount3']);
			$objPHPExcel->getActiveSheet()->setCellValue('V' . $c,$muster['deduction_ammount1']);
			$objPHPExcel->getActiveSheet()->setCellValue('W' . $c,$muster['deduction_type1']);
			$objPHPExcel->getActiveSheet()->setCellValue('X' . $c,$muster['deduction_ammount2']);
			$objPHPExcel->getActiveSheet()->setCellValue('Y' . $c,$muster['deduction_type2']);
			$objPHPExcel->getActiveSheet()->setCellValue('Z' . $c,$muster['deduction_ammount3']);
			$objPHPExcel->getActiveSheet()->setCellValue('AA' . $c,$muster['deduction_type3']);
			$objPHPExcel->getActiveSheet()->setCellValue('AB' . $c,$muster['double_deduction']);
			$objPHPExcel->getActiveSheet()->setCellValue('AC' . $c,$muster['total_salary']);
            $c++;$serialno++;
        }      
            $filename = 'monthly-employee-salary-'.$months.'-'.$year; //save our workbook as this file name
             header('Content-Type: application/xlsx'); 
        header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		ob_end_clean();
		//$objWriter->setInputEncoding('ISO-8859-1');
        $objWriter->save('php://output');
		ob_clean();
       }else{
	   header("Location:monthly-salary.php");
	   $_SESSION['Errorr']='Can not select future year or month only select current month,year or pervious month,year';
	   }   
  }
}
	
?>