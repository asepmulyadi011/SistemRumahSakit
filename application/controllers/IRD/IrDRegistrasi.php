<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IrDRegistrasi extends CI_Controller {
	public function __construct() {
			parent::__construct();
			$this->load->model('ModelAlamat','',TRUE);
			$this->load->model('ModelRegistrasi','',TRUE);
			$this->load->model('ModelPelayanan','',TRUE);
		}
	public function index()
	{
		$no_cm=$this->ModelRegistrasi->get_new_medrec()->result();
		foreach($no_cm as $val){
			$data['no_cm']=sprintf("%010s",$val->counter+1);
		}
		$data['prop']=$this->ModelAlamat->get_prop()->result();
		// $data['poliklinik']=$this->ModelRegistrasi->get_poli()->result();//untuk nav
		$data['cara_berkunjung']=$this->ModelRegistrasi->get_cara_berkunjung()->result();
		$data['cara_bayar']=$this->ModelRegistrasi->get_cara_bayar()->result();
		$data['message'] = $this->session->flashdata('message');
		$this->load->view('IrD/form_daftar',$data);
	}
	public function search_pasien()
	{
		$data['no_medrec']=$this->input->post('no_medrec');
		redirect('IRD/IrDRegistrasi/index2/'.$data['no_medrec']);
	}
	public function index2($no_cm='')
	{
		if($no_cm==''){
			redirect('IRD/IrDRegistrasi');
		}else{
		$data['prop']=$this->ModelAlamat->get_prop()->result();
		// $data['poliklinik']=$this->ModelRegistrasi->get_poli()->result();//untuk nav
		$data['cara_berkunjung']=$this->ModelRegistrasi->get_cara_berkunjung()->result();
		$data['cara_bayar']=$this->ModelRegistrasi->get_cara_bayar()->result();
		// print_r($data['prop']);
		$no_register=$this->ModelRegistrasi->get_new_register()->result();
		foreach($no_register as $val){
			$data['no_register']=sprintf("RD%s%06s",$val->year,$val->counter+1);
		}
		$data['data_pasien']=$this->ModelRegistrasi->get_data_pasien_by($no_cm)->result();
		// print_r($data['data_pasien']);
		$this->load->view('IrD/form_daftar2',$data);
		}
	}
	public function insert_pasien_irj()
	{
			$config['upload_path'] = './asset/upload/photo';
			$config['allowed_types'] = 'gif|png|jpg';
			$config['max_size'] = '2000000';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';
			$this->upload->initialize($config);
					
			if(!$this->upload->do_upload()){
				$data['foto']='unknown.png';
				// $error = $this->upload->display_errors();
				// echo $error;
			}else{
				$upload = $this->upload->data();
				$data['foto']=$upload['file_name'];
			}
			
		$data['no_medrec']=$this->input->post('no_cm');
		$data['jenis_identitas']=$this->input->post('jenis_identitas');
		$data['no_identitas']=$this->input->post('no_identitas');
		$data['jenis_kartu']=$this->input->post('jenis_kartu');
		$data['no_kartu']=$this->input->post('no_kartu');
		$data['nama']=$this->input->post('nama');
		$data['sex']=$this->input->post('sex');
		$data['tmpt_lahir']=$this->input->post('tmpt_lahir');
		$data['tgl_lahir']=$this->input->post('tgl_lahir');
		$data['agama']=$this->input->post('agama');
		$data['wnegara']=$this->input->post('wnegara');
		$data['status']=$this->input->post('status');
		$data['alamat']=$this->input->post('alamat');
		$data['rt']=$this->input->post('rt');
		$data['rw']=$this->input->post('rw');
		$data['id_kelurahandesa']=$this->input->post('id_kelurahandesa');
		$data['kelurahandesa']=$this->input->post('kelurahandesa');
		$data['id_kecamatan']=$this->input->post('id_kecamatan');
		$data['kecamatan']=$this->input->post('kecamatan');
		$data['id_kotakabupaten']=$this->input->post('id_kotakabupaten');
		$data['kotakabupaten']=$this->input->post('kotakabupaten');
		$data['id_provinsi']=$this->input->post('id_provinsi');
		$data['provinsi']=$this->input->post('provinsi');
		$data['kodepos']=$this->input->post('kodepos');
		$data['pendidikan']=$this->input->post('pendidikan');
		$data['pekerjaan']=$this->input->post('pekerjaan');
		$data['no_telp']=$this->input->post('no_telp');
		$data['no_hp']=$this->input->post('no_hp');
		$data['no_telp_kantor']=$this->input->post('no_telp_kantor');
		$data['email']=$this->input->post('email');
		$data['goldarah']=$this->input->post('goldarah');
		$data['bahasa']=$this->input->post('bahasa');
		$data['sukubangsa']=$this->input->post('sukubangsa');
		$data['nm_ayah_suami']=$this->input->post('nm_ayah_suami');
		$data['pekerjaan_ayah_suami']=$this->input->post('pekerjaan_ayah_suami');
		$data['nm_ibu_istri']=$this->input->post('nm_ibu_istri');
		$data['pekerjaan_ibu_istri']=$this->input->post('pekerjaan_ibu_istri');
		$data['kartusdhdicetak']=$this->input->post('kartusdhdicetak');
		$id=$this->ModelRegistrasi->insert_pasien_irj($data);
		redirect('IRD/IrDRegistrasi/index2/'.$data['no_medrec']);
	}
	public function update_pasien_irj()
	{	
			
			$config['upload_path'] = './asset/upload/photo';
			$config['allowed_types'] = 'gif|png|jpg';
			$config['max_size'] = '2000000';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';
			$this->upload->initialize($config);
					
			if(!$this->upload->do_upload()){
				// $data['foto']='unknown.png';
				// $error = $this->upload->display_errors();
				// echo $error;
			}else{
				$upload = $this->upload->data();
				$data['foto']=$upload['file_name'];
			}
			
		$no_medrec=$this->input->post('no_cm');
		$data['jenis_identitas']=$this->input->post('jenis_identitas');
		$data['no_identitas']=$this->input->post('no_identitas');
		$data['jenis_kartu']=$this->input->post('jenis_kartu');
		$data['no_kartu']=$this->input->post('no_kartu');
		$data['nama']=$this->input->post('nama');
		$data['sex']=$this->input->post('sex');
		$data['tmpt_lahir']=$this->input->post('tmpt_lahir');
		$data['tgl_lahir']=$this->input->post('tgl_lahir');
		$data['agama']=$this->input->post('agama');
		$data['wnegara']=$this->input->post('wnegara');
		$data['status']=$this->input->post('status');
		$data['alamat']=$this->input->post('alamat');
		$data['rt']=$this->input->post('rt');
		$data['rw']=$this->input->post('rw');
		$data['id_kelurahandesa']=$this->input->post('id_kelurahandesa');
		$data['kelurahandesa']=$this->input->post('kelurahandesa');
		$data['id_kecamatan']=$this->input->post('id_kecamatan');
		$data['kecamatan']=$this->input->post('kecamatan');
		$data['id_kotakabupaten']=$this->input->post('id_kotakabupaten');
		$data['kotakabupaten']=$this->input->post('kotakabupaten');
		$data['id_provinsi']=$this->input->post('id_provinsi');
		$data['provinsi']=$this->input->post('provinsi');
		$data['kodepos']=$this->input->post('kodepos');
		$data['pendidikan']=$this->input->post('pendidikan');
		$data['pekerjaan']=$this->input->post('pekerjaan');
		$data['no_telp']=$this->input->post('no_telp');
		$data['no_hp']=$this->input->post('no_hp');
		$data['no_telp_kantor']=$this->input->post('no_telp_kantor');
		$data['email']=$this->input->post('email');
		$data['goldarah']=$this->input->post('goldarah');
		$data['bahasa']=$this->input->post('bahasa');
		$data['sukubangsa']=$this->input->post('sukubangsa');
		$data['nm_ayah_suami']=$this->input->post('nm_ayah_suami');
		$data['pekerjaan_ayah_suami']=$this->input->post('pekerjaan_ayah_suami');
		$data['nm_ibu_istri']=$this->input->post('nm_ibu_istri');
		$data['pekerjaan_ibu_istri']=$this->input->post('pekerjaan_ibu_istri');
		$data['kartusdhdicetak']=$this->input->post('kartusdhdicetak');
		$id=$this->ModelRegistrasi->update_pasien_irj($data,$no_medrec);
		redirect('IRD/IrDRegistrasi/index2/'.$no_medrec);
	}
	public function insert_daftar_ulang()
	{
		
		//get umur
		$get_umur=$this->ModelRegistrasi->get_umur()->result();
		$tahun=0;
		$bulan=0;
		$hari=0;
		foreach($get_umur as $row)
		{
			// echo $row->umurday;
			$tahun=floor($row->umurday/365);
			$bulan=floor(($row->umurday - ($tahun*365))/30);
			$hari=$row->umurday - ($bulan * 30) - ($tahun * 365);
		}
		
		$data['umurrj']=$tahun;
		
		$data['uharirj']=$bulan;
		
		$data['ublnrj']=$hari;
		
		$data['no_register']=$this->input->post('no_register');
		
		$data['no_medrec']=$this->input->post('no_medrec');
		
		$data['tgl_kunjungan']=$this->input->post('tgl_kunj')." ".date('H:i:s');
		
		$data['alasan_berobat']=$this->input->post('alber');
		
		$data['datang_dengan']=$this->input->post('pasdatDg');
		
		$data['kecelakaan']=$this->input->post('kecelakaan');
		
		$data['kelas_pasien']=$this->input->post('kelas_pasien');
		
		$data['cara_bayar']=$this->input->post('cara_bayar');
		
		$data['diagnosa']=$this->input->post('id_diagnosa');	//format salah
		
		$data['kd_ruang']=$this->input->post('kd_ruang');
		
		$word = explode(",", $this->input->post('biayadaftar'));
		$d = str_replace(' ', '.', $word[0]); 
		$w = explode(".", $d);
		$data['biayadaftar'] = $w[1]; 
		  
		$data['nama_penjamin']=$this->input->post('nama_penjamin');
		
		$data['hubungan']=$this->input->post('hubungan');
		
		$data['no_sep']=$this->input->post('no_sep');
		
		$id=$this->ModelRegistrasi->insert_daftar_ulang($data);
		
		$message['message'] = $this->session->set_flashdata('message','Berhasil');
		redirect('IRD/IrDRegistrasi');
	}
	public function data_kotakab($id_prop='',$sid='')
	{
		$data=$this->ModelAlamat->get_kotakab($id_prop)->result();
			echo "<option selected value=''>Pilih Kota/Kabupaten</option>";
			foreach($data as $row){
				echo "<option value='$row->id-$row->nama'>$row->nama</option>";
			}
	}
	public function data_kecamatan($id_kabupaten='',$sid='')
	{
		$data=$this->ModelAlamat->get_kecamatan($id_kabupaten)->result();
			echo "<option selected value=''>Pilih Kecamatan</option>";
			foreach($data as $row){
				echo "<option value='$row->id-$row->nama'>$row->nama</option>";
			}
	}
	public function data_kelurahan($id_kecamatan='',$sid='')
	{
		$data=$this->ModelAlamat->get_kelurahan($id_kecamatan)->result();
			echo "<option selected value=''>Pilih Kelurahan</option>";
			foreach($data as $row){
				echo "<option value=$row->id-$row->nama'>$row->nama</option>";
			}
	}
	public function data_pasien(){
			// tangkap variabel keyword dari URL
			$keyword = $this->uri->segment(4);
			// cari di database
			$data = $this->db->from('data_pasien')->like('no_medrec',$keyword)->get()->result();	

			// format keluaran di dalam array
			foreach($data as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'	=>$row->no_medrec,
					'no_medrec'	=>$row->no_medrec
				);
			}
			// minimal PHP 5.2
			echo json_encode($arr);
		}
	/*public function data_poli(){
			// tangkap variabel keyword dari URL
			$keyword = $this->uri->segment(3);
			// cari di database
			$data = $this->db->from('kecelakaan_ird')->like('id',$keyword)->get()->result();	

			// format keluaran di dalam array
			foreach($data as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'	=>$row->id,
					'id'	=>$row->id,
					'kd_ruang'	=>$row->nm_kecelakaan
				);
			}
			// minimal PHP 5.2
			echo json_encode($arr);
		}*/

	public function list_poli()
	{	
		$data['poliklinik']=$this->ModelRegistrasi->get_poli()->result();//untuk nav
		$this->load->view('IrD/list_poli',$data);
	}
	public function pasien_poli()
	{	
		$id_poli=$this->input->post('id_poli');
		redirect('IrjPelayanan/kunj_pasien_poli/'.$id_poli);
	}
}
?>