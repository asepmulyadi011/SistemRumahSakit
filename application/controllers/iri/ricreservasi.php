<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ricreservasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->model('iri/rimreservasi');
	}
	public function index(){
		// MENU
		$data['reservasi']='active';
		$data['daftar']='';
		$data['pasien']='';
		$data['mutasi']='';
		$data['status']='';
		$data['resume']='';
		$data['kontrol']='';
		
		$datenow=date('Ymd');
		$noreservasi=count($this->rimreservasi->select_irna_antrian_by_noreservasi($datenow))+1;
		$data['noreservasi']=$datenow.'-'.$noreservasi;
		
		$this->load->view('iri/rivlink');
		$this->load->view('iri/rivheader');
		$this->load->view('iri/rivmenu', $data);
		$this->load->view('iri/rivreservasi', $data);
		$this->load->view('iri/rivfooter');
	}
	public function insert_reservasi(){
		// RESRVASI
		$data_reservasi['tppri']=$this->input->post('tppri'); // No. Antrian
		$data_reservasi['noreservasi']=$this->input->post('noreservasi'); // No. Antrian
		$data_reservasi['rujukan']=$this->input->post('rujukan'); // Rujukan
		if($data_reservasi['tppri']=='rawatjalan'){
			$data_reservasi['no_cm']=$this->input->post('no_cm_rawatjalan'); // No. CM
		}else if($data_reservasi['tppri']=='ruangrawat'){
			$data_reservasi['no_cm']=$this->input->post('no_cm_ruangrawat'); // No. CM
		}else{
			$data_reservasi['no_cm']=$this->input->post('no_cm_rawatdarurat'); // No. CM
		}
		$data_reservasi['no_register_asal']=$this->input->post('no_register_asal'); // Kode Reg. Asal
		$data_reservasi['tglreserv']=date('Y-m-d'); // Tanggal Reservasi
		$data_reservasi['telp']=$this->input->post('telp'); // Telp
		$data_reservasi['hp']=$this->input->post('hp'); // HP
		$data_reservasi['id_poli']=$this->input->post('id_poli'); // Id Poli
		$data_reservasi['poliasal']=$this->input->post('poliasal'); // Poli Asal
		$data_reservasi['id_dokter']=$this->input->post('id_dokter'); // Poli Asal
		$data_reservasi['dokter']=$this->input->post('dokter'); // Poli Asal
		$data_reservasi['diagnosa']=$this->input->post('diagnosa'); // Poli Asal
		
		//  RENCANA MASUK
		$data_reservasi['tglrencanamasuk']=$this->input->post('tglrencanamasuk'); // Rencana masuk
		$data_reservasi['tglsprawat']=$this->input->post('tglsprawat'); // Tgl. SP. Rawat
		$data_reservasi['ruangpilih']=$this->input->post('ruang'); // Kode ruang pilih
		$data_reservasi['kelas']=$this->input->post('kelas'); // Kelas
		$data_reservasi['pilihan_prioritas']=$this->input->post('pilihan_prioritas'); // Kelas
		$data_reservasi['prioritas']=$this->input->post('prioritas'); // Kelas
		if(!empty($this->input->post('infeksi'))){
			$data_reservasi['infeksi']=$this->input->post('infeksi'); // Infeksi
		}else{
			$data_reservasi['infeksi']='N';
		}
		$data_reservasi['keterangan']=$this->input->post('keterangan'); // Keterangan
		$data_reservasi['statusantrian']='N'; // Keterangan
		$data_reservasi['batal']='N'; // Keterangan
		
		// MENU
		$data['reservasi']='active';
		$data['daftar']='';
		$data['pasien']='';
		$data['mutasi']='';
		$data['status']='';
		$data['resume']='';
		$data['kontrol']='';
		
		// FORM VALIDATION
		$this->validation_reservasi($data_reservasi['tppri']); // Form validasi
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('pesan',
			"<div class='alert alert-danger alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<i class='icon fa fa-check'></i> Data gagal tersimpan!
			</div>");
			$data['no_reservasi']=$this->input->post('no_reservasi');
			$this->load->view('iri/rivlink');
			$this->load->view('iri/rivheader');
			$this->load->view('iri/rivmenu', $data);
			$this->load->view('iri/rivreservasi', $data);
			$this->load->view('iri/rivfooter');
		}else{
			$this->session->set_flashdata('pesan',
			"<div class='alert alert-success alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<i class='icon fa fa-check'></i> Data telah tersimpan!
			</div>");
			$this->rimreservasi->insert_reservasi($data_reservasi);
			redirect('iri/ricreservasi');
		}
	}
	public function validation_reservasi($asal){ // Form validasi untuk reservasi
		$this->form_validation->set_rules('noreservasi', 'No. Reservasi', 'required');
		if($asal=='rawatjalan'){
			$this->form_validation->set_rules('no_cm_rawatjalan', 'No. CM', 'required');
		}else if($asal=='ruangrawat'){
			$this->form_validation->set_rules('no_cm_ruangrawat', 'No. CM', 'required');
		}else{
			$this->form_validation->set_rules('no_cm_rawatdarurat', 'No. CM', 'required');
		}
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('tgllahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('telp', 'Telp', 'required');
		$this->form_validation->set_rules('hp', 'HP', 'required');
		$this->form_validation->set_rules('poliasal', 'Poli/Ruang Asal', 'required');
		
		$this->form_validation->set_rules('tglrencanamasuk', 'Rencana Masuk', 'required');
		$this->form_validation->set_rules('tglsprawat', 'Tgl. SP. Rawat', 'required');
		$this->form_validation->set_rules('nm_ruang', 'Kode Ruang', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
	}
	public function data_ruang() {
		// 1. Folder - 2. Nama controller - 3. nama fungsinya - 4. formnya
		$keyword = $this->uri->segment(4);
		$data = $this->rimreservasi->select_ruang_like($keyword);
		foreach($data as $row){
			$arr['query'] = $keyword;
			$arr['suggestions'][] 	= array(
				'value'				=>$row['idrg'],
				'idrg'				=>$row['idrg'],
				'nmruang'			=>$row['nmruang']
			);
		}
		echo json_encode($arr);
    }
	public function data_pasien_irj() {
		// 1. Folder - 2. Nama controller - 3. nama fungsinya - 4. formnya
		$keyword = $this->uri->segment(4);
		$data = $this->rimreservasi->select_pasien_irj_like($keyword);
		foreach($data as $row){
			$coba=strtotime($row['tanggal_lahir']);
			$date=date('d/m/Y', $coba);
			
			$arr['query'] = $keyword;
			$arr['suggestions'][] 	= array(
				'value'				=>$row['no_cm'],
				'no_cm'				=>$row['no_cm'],
				'no_reg'			=>$row['no_reg'],
				'nama'				=>$row['nama'],
				'jenis_kelamin'		=>$row['jenis_kelamin'],
				'tanggal_lahir'		=>$date,
				'telp'				=>$row['telp'],
				'hp'				=>$row['hp'],
				'id_poli'			=>$row['id_poli'],
				'poliasal'			=>$row['poliasal'],
				'id_dokter'			=>$row['id_dokter'],
				'dokter'			=>$row['dokter'],
				'diagnosa'			=>$row['diagnosa']
			);
		}
		echo json_encode($arr);
    }
	public function data_pasien_ird() {
		// 1. Folder - 2. Nama controller - 3. nama fungsinya - 4. formnya
		$keyword = $this->uri->segment(4);
		$data = $this->rimreservasi->select_pasien_ird_like($keyword);
		foreach($data as $row){
			$coba=strtotime($row['tanggal_lahir']);
			$date=date('d/m/Y', $coba);
			
			$arr['query'] = $keyword;
			$arr['suggestions'][] 	= array(
				'value'				=>$row['no_cm'],
				'no_cm'				=>$row['no_cm'],
				'no_reg'			=>$row['no_reg'],
				'nama'				=>$row['nama'],
				'jenis_kelamin'		=>$row['jenis_kelamin'],
				'tanggal_lahir'		=>$date,
				'telp'				=>$row['telp'],
				'hp'				=>$row['hp'],
				'id_poli'			=>$row['id_poli'],
				'poliasal'			=>$row['poliasal'],
				'id_dokter'			=>$row['id_dokter'],
				'dokter'			=>$row['dokter'],
				'diagnosa'			=>$row['diagnosa']
			);
		}
		echo json_encode($arr);
    }
}
