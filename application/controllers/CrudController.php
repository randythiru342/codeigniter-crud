<?php
/*
By TV TECH TUBE
For more tutorials...
Please Subscribe & Support..
https://www.youtube.com/channel/UCx-aPgI3A59rLa6CBA81GbA/
*/

defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\RichText\RichText;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Protection;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\ColumnDimension;
use PhpOffice\PhpSpreadsheet\Worksheet;

class CrudController extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			
	}
	
	public function create_product()
	{
		$this->load->view('user/create_product');
		
	}
	
	public function store_product()
	{
		$this->form_validation->set_rules('product_name','Product Name','required');
		$this->form_validation->set_rules('description','Description','required');
		$this->form_validation->set_rules('quantity','Quantity','required');
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('user/create_product');
		}
		else{
			$product_name = $this->input->post('product_name');
			$description = $this->input->post('description');
			$quantity = $this->input->post('quantity');
			$data = $this->CrudModel->store_product($product_name,$description,$quantity);
			if($data == TRUE){
				$this->session->set_flashdata('inserted', 'Data has been Inserted');
				redirect('view_product');
			}
			else{
				$this->session->set_flashdata('error', 'Invalid Request');
			}
			
		}
	}
	
	public function view_product(){
		
		
			$data['query'] = $this->CrudModel->view_product();
			$this->load->view('user/view_product', $data);
	
	}
	
	public function edit_product($id){
		
			$id = $this->uri->segment(2);
			$data['pro'] = $this->CrudModel->edit_product($id);
			$this->load->view('user/edit_product', $data);
	
	}
	public function update_product($id){
		
			$id = $this->uri->segment(2);
			$this->form_validation->set_rules('product_name','Product Name','required');
			$this->form_validation->set_rules('description','Description','required');
			$this->form_validation->set_rules('quantity','Quantity','required');
			if($this->form_validation->run() == FALSE)
			{
				
				$data['pro'] = $this->CrudModel->edit_product($id);
				$this->load->view('user/edit_product', $data);
			}
			else{
				$product_name = $this->input->post('product_name');
				$description = $this->input->post('description');
				$quantity = $this->input->post('quantity');
				$data = $this->CrudModel->update_product($id,$product_name,$description,$quantity);
				if($data == TRUE){
					$this->session->set_flashdata('updated', 'Data has been Updated!!!');
					redirect('view_product');
				}
				else{
					$this->session->set_flashdata('error', 'Invalid Request');
					redirect('view_product');
				}
			}
			
	
	}
	
	public function delete_product($id){
		
			$id = $this->uri->segment(2);
			$data = $this->CrudModel->delete_product($id);
			if($data == TRUE){
					$this->session->set_flashdata('deleted', 'Data has been Deleted!!!');
					redirect('view_product');
				}
				else{
					$this->session->set_flashdata('error', 'Invalid Request');
					redirect('view_product');
				}
	
	}
	
	public function product_report(){
		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Sl.No');
		$sheet->setCellValue('B1', 'Product Name');
		$sheet->setCellValue('C1', 'Description');
		$sheet->setCellValue('D1', 'Quantity');
		
		$data = $this->CrudModel->view_product();
		$slno = 1;
		$start = 2;
		foreach($data as $d){
			$sheet->setCellValue('A'.$start, $slno);
			$sheet->setCellValue('B'.$start, $d->product_name);
			$sheet->setCellValue('C'.$start, $d->description);
			$sheet->setCellValue('D'.$start, $d->quantity);
		
		$start = $start+1;
		$slno = $slno+1;
		}
		
		
		$styleThinBlackBorderOutline = [
					'borders' => [
						'allBorders' => [
							'borderStyle' => Border::BORDER_THIN,
							'color' => ['argb' => 'FF000000'],
						],
					],
				];
		//Font BOLD
		$sheet->getStyle('A1:D1')->getFont()->setBold(true);		
		$sheet->getStyle('A1:D10')->applyFromArray($styleThinBlackBorderOutline);
		//Alignment
		//fONT SIZE
		$sheet->getStyle('A1:D10')->getFont()->setSize(12);
		$sheet->getStyle('A1:D2')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);

		$sheet->getStyle('A2:D100')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		//Custom width for Individual Columns
		$sheet->getColumnDimension('A')->setWidth(4);
		$sheet->getColumnDimension('B')->setWidth(10);
		$sheet->getColumnDimension('C')->setWidth(15);
		$sheet->getColumnDimension('D')->setWidth(15);
		$curdate = date('d-m-Y H:i:s');

		$writer = new Xlsx($spreadsheet);

		$filename = 'Report'.$curdate;
		ob_end_clean();
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');

		$writer->save('php://output');

	}
	
	public function product_report_pdf(){
		$pdf = new FPDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',10);
		$pdf->Cell(195,10,'Product Details',1,1,'C');
		$pdf->Cell(15,10,'Sl.No',1,0,'C');
		$pdf->Cell(65,10,'Product Name',1,0,'C');
		$pdf->Cell(60,10,'Description',1,0,'C');
		$pdf->Cell(55,10,'Quantity',1,1,'C');
		$data = $this->CrudModel->view_product();
		$slno = 1;
		foreach($data as $d){
			$pdf->SetFont('Arial','',10);
			$pdf->Cell(15,10,$slno,1,0,'C');
			$pdf->Cell(65,10, $d->product_name,1,0,'C');
			$pdf->Cell(60,10, $d->description,1,0,'C');
			$pdf->Cell(55,10, $d->quantity,1,1,'C');
			$slno = $slno+1;
		}
		$curdate = date('d-m-Y His');
		$pdf->Output('product_report'.$curdate.'.pdf', 'I');
		
	}
	
}

?>
