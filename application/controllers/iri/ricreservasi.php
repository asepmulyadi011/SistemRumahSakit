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
		$data['pendaftaran']='';
		$data['pasien']='';
		$data['mutasi']='';
		$data['status']='';
		$data['resume']='';
		$data['kontrol']='';
		
		$no_antrian=count($this->rimreservasi->select_irna_antrian());
		$data['no_antrian']='RI'.sprintf("%08d", $no_antrian+1);
		
		$this->load->view('iri/rivlink');
		$this->load->view('iri/rivheader');
		$this->load->view('iri/rivmenu', $data);
		$this->load->view('iri/rivreservasi', $data);
		$this->load->view('iri/rivfooter');
	}
	public function insert_reservasi(){
		// RESRVASI
		$data_reservasi['tppri']=$this->input->post('asal'); // No. Antrian
		$data_reservasi['noreservasi']=$this->input->post('no_antrian'); // No. Antrian
		$data_reservasi['rujukan']=$this->input->post('rujukan'); // Rujukan
		if($data_reservasi['tppri']=='rawatjalan'){
			$data_reservasi['no_cm']=$this->input->post('no_cm_rawat_jalan'); // No. CM
		}else if($data_reservasi['tppri']=='ruangrawat'){
			$data_reservasi['no_cm']=$this->input->post('no_cm_ruang_rawat'); // No. CM
		}else{
			$data_reservasi['no_cm']=$this->input->post('no_cm_rawat_darurat'); // No. CM
		}
		$data_reservasi['no_register_asal']=$this->input->post('kode_reg_asal'); // Kode Reg. Asal
		$data_reservasi['telp']=$this->input->post('telp'); // Telp
		$data_reservasi['hp']=$this->input->post('hp'); // HP
		
		//  RENCANA MASUK
		$date_input_rencana_masuk=strtotime($this->input->post('rencana_masuk')); // Rencana masuk
		$date_rencana_masuk=date('Y-m-d', $date_input_rencana_masuk);
		$data_reservasi['tglrencanamasuk']=$date_rencana_masuk;
		$date_input_sp_rawat=strtotime($this->input->post('tgl_sp_rawat')); // Tgl. SP. Rawat
		$date_sp_rawat=date('Y-m-d', $date_input_sp_rawat);
		$data_reservasi['tglsprawat']=$date_sp_rawat;
		$data_reservasi['ruangpilih']=$this->input->post('kode_ruang'); // Kode ruang pilih
		$data_reservasi['kelas']=$this->input->post('kelas'); // Kelas
		$data_reservasi['pilihan_prioritas']=$this->input->post('pilihan_prioritas'); // Kelas
		$data_reservasi['prioritas']=$this->input->post('prioritas'); // Kelas
		if(!empty($this->input->post('infeksi'))){
			$data_reservasi['infeksi']=$this->input->post('infeksi'); // Infeksi
		}else{
			$data_reservasi['infeksi']='0';
		}
		$data_reservasi['keterangan']=$this->input->post('keterangan'); // Keterangan
		$data_reservasi['statusantrian']='0'; // Keterangan
		$data_reservasi['batal']='0'; // Keterangan
		
		// MENU
		$data['reservasi']='active';
		$data['daftar']='';
		$data['pendaftaran']='';
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
			$this->load->view('iri/rivlink');
			$this->load->view('iri/rivheader');
			$this->load->view('iri/rivmenu', $data);
			$this->load->view('iri/rivreservasi');
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
		$this->form_validation->set_rules('no_antrian', 'No. Antrian', 'required');
		if($asal=='rawatjalan'){
			$this->form_validation->set_rules('no_cm_rawat_jalan', 'No. CM', 'required');
		}else if($asal=='ruangrawat'){
			$this->form_validation->set_rules('no_cm_ruang_rawat', 'No. CM', 'required');
		}else{
			$this->form_validation->set_rules('no_cm_rawat_darurat', 'No. CM', 'required');
		}
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('telp', 'Telp', 'required');
		$this->form_validation->set_rules('hp', 'HP', 'required');
		
		$this->form_validation->set_rules('rencana_masuk', 'Rencana Masuk', 'required');
		$this->form_validation->set_rules('tgl_sp_rawat', 'Tgl. SP. Rawat', 'required');
		$this->form_validation->set_rules('kode_ruang', 'Kode Ruang', 'required');
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
				'kode_dok'			=>$row['kode_dok'],
				'nama_dok'			=>$row['nama_dok'],
				'diagnosa'			=>$row['diagnosa']
			);
		}
		echo json_encode($arr);
    }
}
