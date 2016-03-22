 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rjcpelayanan extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('irj/rjmpencarian','',TRUE);
		$this->load->model('irj/rjmpelayanan','',TRUE);
		$this->load->model('irj/rjmregistrasi','',TRUE);
	}
	public function index()
	{
		redirect('irj/rjcregistrasi');
	}
	
	public function list_poli()
	{	
		$data['poliklinik']=$this->rjmpencarian->get_poli()->result();
		$this->load->view('irj/rjvlistpoli',$data);
	}
	public function pasien_poli()//pencarian
	{	
		$id_poli=$this->input->post('id_poli');
		redirect('irj/rjcpelayanan/kunj_pasien_poli/'.$id_poli);
	}
	
		////////////////////////////////////////////////////////////////////////////////////////////////////////////batal
	public function pelayanan_batal($id_poli='',$no_register='')
	{	
		$id=$this->rjmpelayanan->update_status_batal($no_register);
		redirect('irj/rjcpelayanan/kunj_pasien_poli/'.$id_poli);
	}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////pencarian list antrian pasien per poli by
	public function kunj_pasien_poli($id_poli='')//perpoli
	{
		$data['pasien_daftar']=$this->rjmpencarian->get_pasien_daftar_today($id_poli)->result();
		$get_nm_poli=$this->rjmpencarian->get_nm_poli($id_poli)->result();
		foreach($get_nm_poli as $row){
			$data['nm_poli']=$row->nm_poli;
		}
		$data['id_poli']=$id_poli;
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
		$this->load->view('irj/rjvpasienpoli',$data);
	}
	public function kunj_pasien_poli_by_no()
	{
		$key=$this->input->post('key');
		$id_poli=$this->input->post('id_poli');//perpoli
		if($this->input->post('based')=='no_cm'){
			$data['pasien_daftar']=$this->rjmpencarian->get_pasien_daftar_by_nocm($id_poli,$key)->result();
		}else{
			$data['pasien_daftar']=$this->rjmpencarian->get_pasien_daftar_by_noregister($id_poli,$key)->result();
		}
		$get_nm_poli=$this->rjmpencarian->get_nm_poli($id_poli)->result();
		foreach($get_nm_poli as $row){
			$data['nm_poli']=$row->nm_poli;
		}
		$data['id_poli']=$id_poli;
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
		$this->load->view('irj/rjvpasienpoli',$data);
	}
	public function kunj_pasien_poli_by_date()
	{
		$date=$this->input->post('date');
		$id_poli=$this->input->post('id_poli');//perpoli
		$data['pasien_daftar']=$this->rjmpencarian->get_pasien_daftar_by_date($id_poli,$date)->result();
		$get_nm_poli=$this->rjmpencarian->get_nm_poli($id_poli)->result();
		foreach($get_nm_poli as $row){
			$data['nm_poli']=$row->nm_poli;
		}
		$data['id_poli']=$id_poli;
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
		$this->load->view('irj/rjvpasienpoli',$data);
	}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////read data pelayanan poli per pasien
	public function pelayanan_tindakan($id_poli='',$no_register='')
	{
		$data['data_pasien_daftar_ulang']=$this->rjmpelayanan->getdata_daftar_ulang_pasien($no_register)->result();
		foreach($data['data_pasien_daftar_ulang'] as $row){
			$data['kelas_pasien']=$row->kelas_pasien;
		}
		$data['data_tindakan_pasien']=$this->rjmpelayanan->getdata_tindakan_pasien($no_register)->result();
		$data['id_poli']=$id_poli;
		$data['no_register']=$no_register;
		$this->load->view('irj/rjvformtindakan',$data);
	}
	public function pelayanan_diagnosa($id_poli='',$no_register='')
	{
		$data['data_pasien_daftar_ulang']=$this->rjmpelayanan->getdata_daftar_ulang_pasien($no_register)->result();
		$data['data_diagnosa_pasien']=$this->rjmpelayanan->getdata_diagnosa_pasien($no_register)->result();
		$data['id_poli']=$id_poli;
		$data['no_register']=$no_register;
		$this->load->view('irj/rjvformdiagnosa',$data);
	}
	public function pelayanan_resep($id_poli='',$no_register='')
	{
		$data['data_pasien_daftar_ulang']=$this->rjmpelayanan->getdata_daftar_ulang_pasien($no_register)->result();
		$data['data_resep_pasien']=$this->rjmpelayanan->getdata_resep_pasien($no_register)->result();
		$data['id_poli']=$id_poli;
		$data['no_register']=$no_register;
		$this->load->view('irj/rjvformresep',$data);
	}
	public function rad_lab($id_poli='',$no_register='')
	{
		$data['data_pasien_daftar_ulang']=$this->rjmpelayanan->getdata_daftar_ulang_pasien($no_register)->result();
		$data['id_poli']=$id_poli;
		$data['no_register']=$no_register;
		$this->load->view('irj/rjvformradlab',$data);
	}

		////////////////////////////////////////////////////////////////////////////////////////////////////////////create update data pelayanan poli
	public function insert_tindakan()
	{
		$id_poli=$this->input->post('id_poli');
		$data['no_register']=$this->input->post('no_register');
		$data['idtindakan']=$this->input->post('idtindakan');
		$data['nmtindakan']=$this->input->post('nmtindakan');
		$data['id_dokter']=$this->input->post('id_dokter');
		$data['biaya_poli']=$this->input->post('biaya_poli');
		$data['qtyind']=$this->input->post('qtyind');
		$data['dijamin']=$this->input->post('dijamin');
		$data['vtot']=$this->input->post('vtot');
		$id=$this->rjmpelayanan->insert_tindakan($data);
		redirect('irj/rjcpelayanan/pelayanan_tindakan/'.$id_poli.'/'.$data['no_register']);
	}
	public function insert_diagnosa()
	{
		$id_poli=$this->input->post('id_poli');
		$data['id_dokter']=$this->input->post('id_dokter');
		$data['no_register']=$this->input->post('no_register');
		$data['id_diagnosa']=$this->input->post('id_diagnosa');
		$data['id_icd10']=$this->input->post('id_icd10');
		$data['sub_diagnosa']=$this->input->post('diagnosa');
		$data['tindakan']=$this->input->post('tindakan');
		$data['klasifikasi_diagnos']=$this->input->post('klasifikasi_diagnos');
		$data['kasus']=$this->input->post('kasus');
		$id=$this->rjmpelayanan->insert_diagnosa($data);
		redirect('irj/rjcpelayanan/pelayanan_diagnosa/'.$id_poli.'/'.$data['no_register']);
	}
	public function insert_resep()
	{
		$id_poli=$this->input->post('id_poli');
		$data['id_dokter']=$this->input->post('id_dokter');
		$data['no_register']=$this->input->post('no_register');
		$data['resep']=$this->input->post('resep');
		$id=$this->rjmpelayanan->insert_resep($data);
		redirect('irj/rjcpelayanan/pelayanan_resep/'.$id_poli.'/'.$data['no_register']);
	}
	public function update_tindakan()
	{
		$id_poli=$this->input->post('id_poli');
		$no_register=$this->input->post('no_register');
		$id_pelayanan_poli=$this->input->post('id_pelayanan_poli2');
		$data['idtindakan']=$this->input->post('idtindakan2');
		$data['nmtindakan']=$this->input->post('nmtindakan2');
		$data['id_dokter']=$this->input->post('id_dokter2');
		$data['biaya_poli']=$this->input->post('biaya_poli2');
		$data['qtyind']=$this->input->post('qtyind2');
		$data['dijamin']=$this->input->post('dijamin2');
		$data['vtot']=$this->input->post('vtot2');
		$id=$this->rjmpelayanan->update_tindakan($data,$id_pelayanan_poli);
		redirect('irj/rjcpelayanan/pelayanan_tindakan/'.$id_poli.'/'.$no_register);
	}
	public function update_diagnosa()
	{
		$id_poli=$this->input->post('id_poli');
		$no_register=$this->input->post('no_register');
		$id_diagnosa_pasien=$this->input->post('id_diagnosa_pasien2');
		$data['id_dokter']=$this->input->post('id_dokter2');
		$data['id_diagnosa']=$this->input->post('id_diagnosa2');
		$data['id_icd10']=$this->input->post('id_icd102');
		$data['sub_diagnosa']=$this->input->post('diagnosa2');
		$data['tindakan']=$this->input->post('tindakan2');
		$data['klasifikasi_diagnos']=$this->input->post('klasifikasi_diagnos2');
		$data['kasus']=$this->input->post('kasus2');
		$id=$this->rjmpelayanan->update_diagnosa($data,$id_diagnosa_pasien);
		redirect('irj/rjcpelayanan/pelayanan_diagnosa/'.$id_poli.'/'.$no_register);
	}
	public function update_resep()
	{
		$id_poli=$this->input->post('id_poli');
		$no_register=$this->input->post('no_register');
		$id_resep_irj=$this->input->post('id_resep_irj2');
		$data['id_dokter']=$this->input->post('id_dokter2');
		$data['resep']=$this->input->post('resep2');
		$id=$this->rjmpelayanan->update_resep($data,$id_resep_irj);
		redirect('irj/rjcpelayanan/pelayanan_resep/'.$id_poli.'/'.$no_register);
	}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////pulang / selesai pelayanan poli
	public function update_pulang()
	{	
		$id_poli=$this->input->post('id_poli');
		$no_register=$this->input->post('no_register');
		$data['tgl_pulang']=$this->input->post('tgl_pulang');
		$data['ket_pulang']=$this->input->post('ket_pulang');
		$data['status']=1;
		$id=$this->rjmpelayanan->update_pulang($data,$no_register);
		// echo $data['ket_pulang'];
		if($data['ket_pulang']=='DIRUJUK_RAWATJALAN'){
			$data2['id_poli']=$this->input->post('id_poli_rujuk');
			$data2['kd_ruang']=$this->input->post('kd_ruang_rujuk');
			
			$no_register_new=$this->rjmregistrasi->get_new_register()->result();
			foreach($no_register_new as $val){
				$data2['no_register']=sprintf("RJ%s%06s",$val->year,$val->counter+1);
			}
			
			$data_sblm=$this->rjmpelayanan->getdata_daftar_sblm($no_register)->result();
			foreach($data_sblm as $row){
				
				$data2['umurrj']=$row->umurrj;
				$data2['uharirj']=$row->uharirj;
				$data2['ublnrj']=$row->ublnrj;
				$data2['no_medrec']=$row->no_medrec;
				$data2['jns_kunj']=$row->jns_kunj;
				$data2['cara_kunj']=$row->cara_kunj;
				$data2['asal_rujukan']=$row->asal_rujukan;
				$data2['no_rujukan']=$row->no_rujukan;
				$data2['kelas_pasien']=$row->kelas_pasien;
				$data2['cara_bayar']=$row->cara_bayar;
				
				$data2['biayadaftar']=$row->biayadaftar;
				$data2['nama_penjamin']=$row->nama_penjamin;
				$data2['hubungan']=$row->hubungan;
				$data2['vtot']=$row->vtot;
				$data2['no_sep']=$row->no_sep;
				
			}
			// print_r($data2);
				$id=$this->rjmregistrasi->insert_daftar_ulang($data2);
				$this->session->set_flashdata('message_rujuk','<div class="row">
						<div class="col-md-12">
						  <div class="box box-success box-solid">
							<div class="box-header with-border">
							  <div class="box-title">Registrasi Berhasil Dirujuk Rawat Jalan</div>
							  <div class="box-tools pull-right">
								<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
							  </div>
							</div>
						  </div>
						</div>
					</div>');
		}
		
		redirect('irj/rjcpelayanan/kunj_pasien_poli/'.$id_poli);
	}
}
?>