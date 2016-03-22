<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rjcregistrasi extends CI_Controller {
	public function __construct() {
			parent::__construct();
			$this->load->model('irj/rjmpencarian','',TRUE);
			$this->load->model('irj/rjmregistrasi','',TRUE);
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////registrasi biodata pasien
	public function index()
	{
		$data['prop']=$this->rjmpencarian->get_prop()->result();
		$data['cara_berkunjung']=$this->rjmpencarian->get_cara_berkunjung()->result();
		$data['cara_bayar']=$this->rjmpencarian->get_cara_bayar()->result();
		$this->load->view('irj/rjvformdaftar',$data);
	}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////registrasi pasien ke irj
	public function index2($no_cm='')
	{
		if($no_cm!=''){//update
			$data['data_pasien']=$this->rjmregistrasi->get_data_pasien_by_no_cm($no_cm)->result();
			$data['prop']=$this->rjmpencarian->get_prop()->result();
			$data['cara_berkunjung']=$this->rjmpencarian->get_cara_berkunjung()->result();
			$data['cara_bayar']=$this->rjmpencarian->get_cara_bayar()->result();
			$this->load->view('irj/rjvformdaftar2',$data);
		}else if($_SERVER['REQUEST_METHOD']!='POST'){
			redirect('irj/rjcregistrasi');
		}else{
			if($this->input->post('cari_no_cm')!=''){
				$data['data_pasien']=$this->rjmregistrasi->get_data_pasien_by_no_cm($this->input->post('cari_no_cm'))->result();
			}else if($this->input->post('cari_no_kartu')!=''){
				$data['data_pasien']=$this->rjmregistrasi->get_data_pasien_by_no_kartu($this->input->post('cari_no_kartu'))->result();
			}else if($this->input->post('cari_no_identitas')!=''){
				$data['data_pasien']=$this->rjmregistrasi->get_data_pasien_by_no_identitas($this->input->post('cari_no_identitas'))->result();
			}
			$data['prop']=$this->rjmpencarian->get_prop()->result();
			$data['cara_berkunjung']=$this->rjmpencarian->get_cara_berkunjung()->result();
			$data['cara_bayar']=$this->rjmpencarian->get_cara_bayar()->result();
			$this->load->view('irj/rjvformdaftar2',$data);
		}
	}
	public function insert_data_pasien()
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
		
		$no_cm=$this->rjmregistrasi->get_new_medrec()->result();
		foreach($no_cm as $val){
			$data['no_medrec']=sprintf("%010s",$val->counter+1);
		}
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
		// $data['bahasa']=$this->input->post('bahasa');
		// $data['sukubangsa']=$this->input->post('sukubangsa');
		// $data['nm_ayah_suami']=$this->input->post('nm_ayah_suami');
		// $data['pekerjaan_ayah_suami']=$this->input->post('pekerjaan_ayah_suami');
		$data['nm_ibu_istri']=$this->input->post('nm_ibu_istri');
		// $data['pekerjaan_ibu_istri']=$this->input->post('pekerjaan_ibu_istri');
		$data['kartusdhdicetak']=$this->input->post('kartusdhdicetak');
		$id=$this->rjmregistrasi->insert_pasien_irj($data);
		redirect('irj/rjcregistrasi/index2/'.$data['no_medrec']);
	}
	public function update_data_pasien()
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
		// $data['bahasa']=$this->input->post('bahasa');
		// $data['sukubangsa']=$this->input->post('sukubangsa');
		// $data['nm_ayah_suami']=$this->input->post('nm_ayah_suami');
		// $data['pekerjaan_ayah_suami']=$this->input->post('pekerjaan_ayah_suami');
		$data['nm_ibu_istri']=$this->input->post('nm_ibu_istri');
		// $data['pekerjaan_ibu_istri']=$this->input->post('pekerjaan_ibu_istri');
		$data['kartusdhdicetak']=$this->input->post('kartusdhdicetak');
		$id=$this->rjmregistrasi->update_pasien_irj($data,$no_medrec);
		redirect('irj/rjcregistrasi/index2/'.$no_medrec);
	}
	public function insert_daftar_ulang()
	{
		$no_medrec=$this->input->post('no_medrec');
		//get umur
		$get_umur=$this->rjmregistrasi->get_umur($no_medrec)->result();
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
		
		$no_register=$this->rjmregistrasi->get_new_register()->result();
		foreach($no_register as $val){
			$data['no_register']=sprintf("RJ%s%06s",$val->year,$val->counter+1);
		}
		$data['umurrj']=$tahun;
		$data['uharirj']=$hari;
		$data['ublnrj']=$bulan;
		$data['no_medrec']=$no_medrec;
		$data['jns_kunj']=$this->input->post('jns_kunj');
		$data['cara_kunj']=$this->input->post('cara_kunj');
		$data['asal_rujukan']=$this->input->post('asal_rujukan');
		$data['no_rujukan']=$this->input->post('no_rujukan');
		$data['kelas_pasien']=$this->input->post('kelas_pasien');
		$data['cara_bayar']=$this->input->post('cara_bayar');
		$data['id_kontraktor']=$this->input->post('id_kontraktor');
		$data['id_poli']=$this->input->post('id_poli');
		$data['kd_ruang']=$this->input->post('kd_ruang');
		$data['biayadaftar']=$this->input->post('biayadaftar');
		$data['nama_penjamin']=$this->input->post('nama_penjamin');
		$data['hubungan']=$this->input->post('hubungan');
		$data['vtot']=$this->input->post('vtot');
		$data['no_sep']=$this->input->post('no_sep');
		$id=$this->rjmregistrasi->insert_daftar_ulang($data);
		$message['message'] = $this->session->set_flashdata('message','<div class="row">
						<div class="col-md-12">
						  <div class="box box-success box-solid">
							<div class="box-header with-border">
							  <div class="box-title">Registrasi Berhasil</div>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							  </div>
							</div>
						  </div>
						</div>
					</div>');
		redirect('irj/rjcregistrasi');
	}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////alamat
	public function data_kotakab($id_prop='',$sid='')
	{
		$data=$this->rjmpencarian->get_kotakab($id_prop)->result();
			echo "<option selected value=''>Pilih Kota/Kabupaten</option>";
			foreach($data as $row){
				echo "<option value='$row->id-$row->nama'>$row->nama</option>";
			}
	}
	public function data_kecamatan($id_kabupaten='',$sid='')
	{
		$data=$this->rjmpencarian->get_kecamatan($id_kabupaten)->result();
			echo "<option selected value=''>Pilih Kecamatan</option>";
			foreach($data as $row){
				echo "<option value='$row->id-$row->nama'>$row->nama</option>";
			}
	}
	public function data_kelurahan($id_kecamatan='',$sid='')
	{
		$data=$this->rjmpencarian->get_kelurahan($id_kecamatan)->result();
			echo "<option selected value=''>Pilih Kelurahan</option>";
			foreach($data as $row){
				echo "<option value='$row->id-$row->nama'>$row->nama</option>";
			}
	}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
?>