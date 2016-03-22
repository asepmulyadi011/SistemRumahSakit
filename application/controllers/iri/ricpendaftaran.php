<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ricpendaftaran extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->model('iri/rimpendaftaran');
	}
	public function index($noreservasi=''){
		$data['reservasi']='';
		$data['daftar']='active';
		$data['pasien']='';
		$data['mutasi']='';
		$data['status']='';
		$data['resume']='';
		$data['kontrol']='';
		
		$value=array(
			'noreservasi'=>$noreservasi
		);
		$this->session->set_userdata($value);
		$irna_antrian=$this->rimpendaftaran->select_irna_antrian_by_noreservasi($this->session->userdata('noreservasi'));
		$no_ruang=$irna_antrian[0]['ruangpilih'];
		$ruang=$this->rimpendaftaran->select_ruang($no_ruang);
		$tppri=$irna_antrian[0]['tppri'];
		if($tppri=='rawatjalan'){
			$pasien=$this->rimpendaftaran->select_pasien_irj_by_no_register_asal($irna_antrian[0]['no_register_asal']);
		}else if($tppri=='ruangrawat'){
			$pasien=$this->rimpendaftaran->select_pasien_iri_by_no_register_asal($irna_antrian[0]['no_register_asal']);
		}else{
			$pasien=$this->rimpendaftaran->select_pasien_ird_by_no_register_asal($irna_antrian[0]['no_register_asal']);
		}
		$data_reservasi['irna_reservasi']=$irna_antrian;
		$data_reservasi['ruang']=$ruang;
		$data_reservasi['pasien']=$pasien;
		
		$this->load->view('iri/rivlink');
		$this->load->view('iri/rivheader');
		$this->load->view('iri/rivmenu', $data);
		$this->load->view('iri/rivpendaftaran', $data_reservasi);
		$this->load->view('iri/rivfooter');
	}
	public function data_ruang() {
		// 1. Folder - 2. Nama controller - 3. nama fungsinya - 4. formnya
		$keyword = $this->uri->segment(4);
		$data = $this->rimpendaftaran->select_ruang_like($keyword);
		foreach($data as $row){
			$arr['query'] = $keyword;
			$arr['suggestions'][] 	= array(
				'value'				=>$row['idrg'].' - '.$row['nmruang'].' - '.$row['koderg'],
				'idrg'				=>$row['idrg'],
				'nmruang'			=>$row['nmruang'],
				'kelas'				=>$row['koderg']
			);
		}
		echo json_encode($arr);
    }
	public function data_cara_bayar() {
		// 1. Folder - 2. Nama controller - 3. nama fungsinya - 4. formnya
		$keyword = $this->uri->segment(4);
		$data = $this->rimpendaftaran->select_cara_bayar($keyword);
		foreach($data as $row){
			$arr['query'] = $keyword;
			$arr['suggestions'][] 	= array(
				'value'				=>$row['cara_bayar'],
				'carabayar'			=>$row['cara_bayar'],
			);
		}
		echo json_encode($arr);
    }
	public function data_kontraktor() {
		// 1. Folder - 2. Nama controller - 3. nama fungsinya - 4. formnya
		$keyword = $this->uri->segment(4);
		$data = $this->rimpendaftaran->select_kontraktor($keyword);
		foreach($data as $row){
			$arr['query'] = $keyword;
			$arr['suggestions'][] 	= array(
				'value'				=>$row['nmkontraktor'],
				'id_kontraktor'		=>$row['id_kontraktor'],
				'nmkontraktor'		=>$row['nmkontraktor'],
			);
		}
		echo json_encode($arr);
    }
	public function insert_pendaftaran(){
		// Form kiri
		$data_pendaftaran['noregasal']=$this->input->post('noregasal');
		$data_pendaftaran['no_cm']=$this->input->post('no_cm');
		$data_pendaftaran['tgldaftarri']=date('Y-m-d');
		$data_pendaftaran['carabayar']=$this->input->post('carabayar');
		$data_pendaftaran['id_smf']=$this->input->post('id_smf');
		$data_pendaftaran['id_dokter']=$this->input->post('id_dokter');
		$data_pendaftaran['dokter']=$this->input->post('nmdokter');
		// Form kanan
		$no=count($this->rimpendaftaran->select_pasien_iri())+1;
		$data_pendaftaran['no_ipd']='RI'.sprintf("%08d", $no);
		$data_pendaftaran['noipdlama']=$this->input->post('noipdlama');
		$data_pendaftaran['nama']=$this->input->post('nama');
		$data_pendaftaran['tgl_masuk']=$this->input->post('tgldaftarri');
		// Tab penanggung jawab
		$data_pendaftaran['nosjp']=$this->input->post('nama');
		$data_pendaftaran['nopembayarri']=$this->input->post('nopembayarri');
		$data_pendaftaran['id_kontraktor']=$this->input->post('id_kontraktor');
		$data_pendaftaran['ketpembayarri']=$this->input->post('ketpembayarri');
		$data_pendaftaran['nmpembayarri']=$this->input->post('nmpembayarri');
		$data_pendaftaran['golpembayarri']=$this->input->post('golpembayarri');
		$data_pendaftaran['jatahklsiri']=$this->input->post('jatahklsiri');
		$data_pendaftaran['nmpjawabri']=$this->input->post('nmpjawabri');
		$data_pendaftaran['alamatpjawabri']=$this->input->post('alamatpjawabri');
		$data_pendaftaran['notlppjawab']=$this->input->post('notlppjawab');
		$data_pendaftaran['kartuidpjawab']=$this->input->post('kartuidpjawab');
		$data_pendaftaran['noidpjawab']=$this->input->post('noidpjawab');
		$data_pendaftaran['hubpjawabri']=$this->input->post('hubpjawabri');
		// Tab ruangan
		$data_ruang_iri['no_ipd']=$data_pendaftaran['no_ipd'];
		$data_ruang_iri['idrg']=$this->input->post('ruang');
		$data_ruang_iri['bed']=$this->input->post('bed');
		$data_ruang_iri['kelas']=$this->input->post('kelas');
		$data_ruang_iri['tglmasukrg']=$this->input->post('tglmasukrg');
		
		// MENU
		$data['reservasi']='';
		$data['daftar']='active';
		$data['pasien']='';
		$data['mutasi']='';
		$data['status']='';
		$data['resume']='';
		$data['kontrol']='';
		
		$this->validation_pendaftaran(); // Form validasi
		if($this->form_validation->run()==FALSE){
			$this->session->set_flashdata('pesan',
			"<div class='alert alert-danger alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<i class='icon fa fa-check'></i> Data gagal tersimpan!
			</div>");
			redirect('iri/ricpendaftaran');
		}else{
			$this->session->set_flashdata('pesan',
			"<div class='alert alert-success alert-dismissable'>
				<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
				<i class='icon fa fa-check'></i> Data telah tersimpan!
			</div>");
			$data_update['statusantrian']='Y';
			$this->rimpendaftaran->update_irna_antrian($data_update, $data_pendaftaran['noipdlama']);
			$this->rimpendaftaran->insert_pendaftaran($data_pendaftaran);
			$this->rimpendaftaran->insert_ruang_iri($data_ruang_iri);
			redirect('iri/ricdaftar');
		}
	}
	public function validation_pendaftaran(){
		$this->form_validation->set_rules('noregasal', 'No. Reg. Asal', 'required');
	}
}
