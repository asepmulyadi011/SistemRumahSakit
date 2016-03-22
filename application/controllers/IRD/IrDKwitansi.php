 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IrDKwitansi extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('ModelPelayanan','',TRUE);
		$this->load->model('ModelRegistrasi','',TRUE);
	}
	// public function index(){
		// $data['pasien_daftar']=$this->ModelPelayanan->get_kwitansi_pasien()->result();
		// $this->load->view('irD/data_kwitansi',$data);
	// }
	public function index()
	{
		redirect('IRD/IrDRegistrasi','refresh');
	}
	public function kwitansi()
	{	
		 $data['pasien_daftar']=$this->ModelPelayanan->get_kwitansi_pasien()->result();
		if(sizeof($data['pasien_daftar'])==0){
			$this->session->set_flashdata('message_nodata','<div class="row">
						<div class="col-md-12">
						  <div class="box box-default box-solid">
							<div class="box-header with-border">
							  <center>Tidak ada lagi data</center>
							</div>
						  </div>
						</div>
					</div>');
		}else{
			$this->session->set_flashdata('message_nodata','');
		}
		$this->load->view('irD/data_kwitansi',$data);
	}
	public function kwitansi_by_no()
	{	
		$key=$this->input->post('key');
		$st = 1 ;
		if($this->input->post('based')=='no_cm'){
			$data['pasien_daftar']=$this->ModelPelayanan->get_pasien_daftar_by_nocm($key, $st)->result();
		}else{
			$data['pasien_daftar']=$this->ModelPelayanan->get_pasien_daftar_by_noregister($key, $st)->result();
		}
		if(sizeof($data['pasien_daftar'])==0){
			$this->session->set_flashdata('message_nodata','<div class="row">
						<div class="col-md-12">
						  <div class="box box-default box-solid">
							<div class="box-header with-border">
							  <center>Tidak ada lagi data</center>
							</div>
						  </div>
						</div>
					</div>');
		}else{
			$this->session->set_flashdata('message_nodata','');
		}
		$this->load->view('irD/data_kwitansi',$data);
	}
	public function kwitansi_by_date()
	{	
		$date=$this->input->post('date');
		$st = 1 ;
		$data['pasien_daftar']=$this->ModelPelayanan->get_pasien_daftar_by_date($date, $st)->result();
		if(sizeof($data['pasien_daftar'])==0){
			$this->session->set_flashdata('message_nodata','<div class="row">
						<div class="col-md-12">
						  <div class="box box-default box-solid">
							<div class="box-header with-border">
							  <center>Tidak ada lagi data</center>
							</div>
						  </div>
						</div>
					</div>');
		}else{
			$this->session->set_flashdata('message_nodata','');
		}
		$this->load->view('irD/data_kwitansi',$data);
	}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////read data pelayanan poli per pasien
	public function kwitansi_pasien($no_register)
	{	
		$data['no_register']=$no_register;
		$data['data_pasien']=$this->ModelPelayanan->getdata_pasien($no_register)->result();
		$data['data_tindakan']=$this->ModelPelayanan->getdata_tindakan_pasien($no_register)->result();
		if(sizeof($data['data_tindakan'])==0){
			$this->session->set_flashdata('message_no_tindakan','<div class="row">
						<div class="col-md-12">
						  <div class="box box-default box-solid">
							<div class="box-header with-border">
							  <center>Tindakan belum diisi</center>
							</div>
						  </div>
						</div>
					</div>');
		}else{
			$this->session->set_flashdata('message_no_tindakan','');
		}
		$this->load->view('irj/rjvkwitansipasien',$data);
	}
	public function cetak_kwitansi($no_register)
	{	
	//update status cetak_kwitansi
		$this->load->helper('pdf_helper');
		$data_pasien=$this->rjmkwitansi->getdata_pasien($no_register)->result();
		$data_tindakan=$this->rjmkwitansi->getdata_tindakan_pasien($no_register)->result();
		foreach($data_pasien as $row){
		$konten=
				"<table>
						<tr>
							<th width=\"15%\"><b>No. CM</b></th>
							<td width=\"25%\">".$row->no_medrec."</td>
							<th width=\"20%\"><b>Tanggal Kunjungan</b></th>
							<td width=\"40%\">".$row->tgl_kunjungan."</td>
						</tr>
						<tr>
							<th><b>No. Register</b></th>
							<td>".$row->no_register."</td>
							<th><b>Kelas Pasien</b></th>
							<td>".$row->kelas_pasien."</td>
						</tr>
						<tr>
							<th><b>Nama Pasien</b></th>
							<td>".$row->nama."</td>
							<th><b>Poli</b></th>
							<td>".$row->nm_poli.' ('.$row->id_poli.')'."</td>
						</tr>
				</table>
				<br/><br/>
				<table border=\"1\">
						<tr>
							<th width=\"5%\"><p align=\"center\"><b>No</b></p></th>
							<th width=\"75%\"><p align=\"center\"><b>Tindakan</b></p></th>
							<th width=\"20%\"><p align=\"center\"><b>Biaya</b></p></th>
						</tr>
			";
				$i=1;
				$vtot=0;
				foreach($data_tindakan as $row1){
					$vtot=$vtot+$row1->biaya_poli;
					$konten=$konten."
					<tr>
						<td><p align=\"center\">".$i++."</p></td>
						<td>".$row1->idtindakan.' - '.$row1->nmtindakan."</td>
						<td><p align=\"right\">Rp ".number_format( $row1->biaya_poli, 2 , ',' , '.' )."</p></td>
					</tr>";
				}
					$konten=$konten."
					<tr>
						<th colspan=\"2\"><p align=\"right\"><b>Total   </b></p></th>
						<th bgcolor=\"yellow\"><p align=\"right\">Rp ".number_format( $vtot, 2 , ',' , '.' )."</p></th>
					</tr>
			</table>
		";
		}
		$file_name="KW_$row->no_register.pdf";
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			tcpdf();
			$obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
			$obj_pdf->SetCreator(PDF_CREATOR);
			$title = "Rekap Tagihan Rumah Sakit";
			$obj_pdf->SetTitle($title);
			$obj_pdf->SetHeaderData('', '', $title, 'Rumah Sakit XXXX XXXX');
			$obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
			$obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
			$obj_pdf->SetDefaultMonospacedFont('helvetica');
			$obj_pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
			$obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
			$obj_pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
			$obj_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
			$obj_pdf->SetFont('helvetica', '', 9);
			$obj_pdf->setFontSubsetting(false);
			$obj_pdf->AddPage();
			ob_start();
				$content = $konten;
			ob_end_clean();
			$obj_pdf->writeHTML($content, true, false, true, false, '');
			// $obj_pdf->Output('C:\xampp\htdocs\jobvacancy\assets\pdf\CVPelamar.pdf', 'F');
			$obj_pdf->Output(FCPATH.'asset/download/irj/rjkwitansi/'.$file_name, 'FI');
		// redirect('irj/rjckwitansi/kwitansi/','refresh');
	}
}?>