<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RICReservasi extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$data['reservasi']='active';
		$data['daftar']='';
		$data['pendaftaran']='';
		$data['pasien']='';
		$data['mutasi']='';
		$data['status']='';
		$data['resume']='';
		$data['kontrol']='';
		
		$this->load->view('RIVLink');
		$this->load->view('RIVHeader');
		$this->load->view('RIVMenu', $data);
		
		$this->load->model('RIMReservasi');
	}
	public function index(){
		// TAB
		$data['tab_reservasi'] = 'active'; // Status tab aktif
		$data['tab_rencana_masuk'] = '';
		$data['tab_belum_approve'] = '';
		// RESERVASI
		$data['st_asal1']='selected'; // Asal
		$data['st_asal2']='';
		$data['st_asal3']='';
		$data['no_antrian']=''; // No. Antrian
		$data['st_rujukan1']='selected'; // Rujukan
		$data['rujukan']=''; // Rujukan
		$data['no_cm']=''; // No. CM
		$data['kode_reg_asal']=''; // Kode Reg. Asal
		$data['name_reg_asal']=''; // Nama Reg. Asal
		$data['st_jenis_kelamin1']='selected'; // Jenis kelamin
		$data['st_jenis_kelamin2']='';
		$data['tanggal_lahir']=''; // Tangggal lahir
		$data['telp']=''; // Telp
		$data['hp']=''; // HP
		// RENCANA MASUK
		$data['rencana_masuk']=''; // Rencana masuk
		$data['tgl_sp_rawat']=''; // Tgl. SP. Rawat
		$data['kode_ruang_pilih']=''; // Kode ruang pilih
		$data['name_ruang_pilih']=''; // Name ruang pilih
		$data['kelas']=''; // Kelas
		$data['st_prioritas1']='selected'; // Prioritas
		$data['st_prioritas2']='';
		$data['st_prioritas3']='';
		$data['keterangan']=''; // Keterangan
		
		$this->load->view('RIVReservasi', $data);
		$this->load->view('RIVFooter');
	}
	public function insert_reservasi(){
		// TAB
		$data['tab_reservasi'] = 'active'; // Status tab aktif
		$data['tab_rencana_masuk'] = '';
		$data['tab_belum_approve'] = '';
		// RESRVASI
		$asal=$this->input->post('asal'); // Asal
		$data['st_asal1']='';
		$data['st_asal2']='';
		$data['st_asal3']='';
		if($asal=='baru'){
			$data['st_asal1']='selected';
		}else if($asal=='rawat_jalan'){
			$data['st_asal2']='selected';
		}else{
			$data['st_asal3']='selected';
		}
		$data['no_antrian']=$this->input->post('no_antrian'); // No. Antrian
		$rujukan=$this->input->post('no_antrian'); // Rujukan
		$data['st_rujukan1']='';
		if($rujukan=='rujukan'){
			$data['st_rujukan1']='selected';
		}
		$data['rujukan']=$this->input->post('rujukan'); // Rujukan
		$data['no_cm']=$this->input->post('no_cm'); // No. CM
		$data['kode_reg_asal']=$this->input->post('kode_reg_asal'); // Kode Reg. Asal
		$data['name_reg_asal']=$this->input->post('name_reg_asal'); // Nama Reg. Asal
		$jenis_kelamin=$this->input->post('jenis_kelamin'); // Jenis kelamin
		$data['st_jenis_kelamin1']='';
		$data['st_jenis_kelamin2']='';
		if($jenis_kelamin=='laki-laki'){
			$data['st_jenis_kelamin1']='selected';
		}else{
			$data['st_jenis_kelamin2']='selected';
		}
		$data['tanggal_lahir']=$this->input->post('tanggal_lahir'); // Tanggal lahir
		$data['telp']=$this->input->post('telp'); // Telp
		$data['hp']=$this->input->post('hp'); // HP
		// RENCANA MASUK
		$data['rencana_masuk']=''; // Rencana masuk
		$data['tgl_sp_rawat']=''; // Tgl. SP. Rawat
		$data['kode_ruang_pilih']=''; // Kode Ruang Pilih
		$data['name_ruang_pilih']=''; // Nama Ruang Pilih
		$data['kelas']=''; // Kelas
		$data['st_prioritas1']='selected'; // Prioritas
		$data['st_prioritas2']='';
		$data['st_prioritas3']='';
		$data['keterangan']=''; // Keterangan
		// FORM VALIDATION
		$this->validation_reservasi(); // Form validasi
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('pesan',
			"<div class='alert alert-danger alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<i class='icon fa fa-check'></i> Data gagal tersimpan!
			</div>");
			$this->load->view('RIVReservasi', $data);
		}else{
			$this->session->set_flashdata('pesan',
			"<div class='alert alert-success alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<i class='icon fa fa-check'></i> Data telah tersimpan!
			</div>");
			redirect('RICReservasi');
		}
	}
	public function validation_reservasi(){ // Form validasi untuk reservasi
		$this->form_validation->set_rules('no_antrian', 'No. Antrian', 'required');
		$this->form_validation->set_rules('no_cm', 'No. CM', 'required');
		$this->form_validation->set_rules('kode_reg_asal', 'Reg. Asal', 'required');
		$this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('telp', 'Telp', 'required');
		$this->form_validation->set_rules('hp', 'HP', 'required');
	}
	public function insert_rencana_masuk(){
		// TAB
		$data['tab_reservasi'] = '';
		$data['tab_rencana_masuk'] = 'active'; // Status tab aktif
		$data['tab_belum_approve'] = '';
		// RESERVASI
		$data['st_asal1']='selected'; // Asal
		$data['st_asal2']='';
		$data['st_asal3']='';
		$data['no_antrian']=''; // No. Antrian
		$data['st_rujukan1']='selected'; // Rujukan
		$data['rujukan']=''; // Rujukan
		$data['no_cm']=''; // No. CM
		$data['kode_reg_asal']=''; // Kode Reg. Asal
		$data['name_reg_asal']=''; // Nama Reg. Asal
		$data['st_jenis_kelamin1']='selected'; // Jenis kelamin
		$data['st_jenis_kelamin2']='';
		$data['tanggal_lahir']=''; // Tanggal lahir
		$data['telp']=''; // Telp
		$data['hp']=''; // HP
		//  RENCANA MASUK
		$data['rencana_masuk']=$this->input->post('rencana_masuk'); // Rencana masuk
		$data['tgl_sp_rawat']=$this->input->post('tgl_sp_rawat'); // Tgl. SP. Rawat
		$data['kode_ruang_pilih']=$this->input->post('kode_ruang_pilih'); // Kode ruang pilih
		$data['name_ruang_pilih']=$this->input->post('name_ruang_pilih'); // Nama ruang pilih
		$data['kelas']=$this->input->post('kelas'); // Kelas
		$prioritas=$this->input->post('prioritas'); // Prioritas
		$data['st_prioritas1']='';
		$data['st_prioritas2']='';
		$data['st_prioritas3']='';
		if($prioritas=='1'){
			$data['st_prioritas1']='selected';
		}else if($prioritas=='2'){
			$data['st_prioritas2']='selected';
		}else{
			$data['st_prioritas3']='selected';
		}
		$data['keterangan']=$this->input->post('keterangan'); // Keterangan
		// FORM VALIDATION
		$this->validation_rencana_masuk(); // Form validasi
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('pesan',
			"<div class='alert alert-danger alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<i class='icon fa fa-check'></i> Data gagal tersimpan!
			</div>");
			$this->load->view('RIVReservasi', $data);
		}else{
			$this->session->set_flashdata('pesan',
			"<div class='alert alert-success alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<i class='icon fa fa-check'></i> Data telah tersimpan!
			</div>");
			
			redirect('RICReservasi');
		}
	}
	public function validation_rencana_masuk(){ // Form validasi untuk rencana masuk
		$this->form_validation->set_rules('rencana_masuk', 'Rencana Masuk', 'required');
		$this->form_validation->set_rules('tgl_sp_rawat', 'Tgl. SP. Rawat', 'required');
		$this->form_validation->set_rules('kode_ruang_pilih', 'Kode Ruang Pilih', 'required');
		$this->form_validation->set_rules('kelas', 'Kelas', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
	}
}
