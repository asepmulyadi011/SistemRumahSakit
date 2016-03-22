 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IrDPelayanan extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('ModelPelayanan','',TRUE);
		$this->load->model('ModelRegistrasi','',TRUE);
	}
	public function index()
	{
		redirect('IRD/IrDRegistrasi');
	}
	public function kunj_pasien()//perhari ini dan status masih di rs
	{
		$data['pasien_daftar']=$this->ModelPelayanan->get_pasien_daftar_today()->result();
		$this->load->view('irD/pasien_poli',$data);
	}
	public function kunj_pasien_ird()
	{
		$key=$this->input->post('key');
		$st = 0 ;
		if($this->input->post('based')=='no_cm'){
			$data['pasien_daftar']=$this->ModelPelayanan->get_pasien_daftar_by_nocm($key, $st)->result();
		}else if($this->input->post('based')=='no_register'){
			$data['pasien_daftar']=$this->ModelPelayanan->get_pasien_daftar_by_noregister($key, $st)->result();
		}else{
			$data['pasien_daftar']=$this->ModelPelayanan->get_pasien_daftar_by_date($key, $st)->result();
		}
			$this->load->view('irD/pasien_poli',$data);
	}
	public function pelayanan_pasien($no_register='')
	{
		$data['data_pasien_daftar_ulang']=$this->ModelPelayanan->getdata_daftar_ulang_pasien($no_register)->result();
		$data['data_tindakan_pasien']=$this->ModelPelayanan->getdata_tindakan_pasien($no_register)->result();
		$data['no_register']=$no_register;
		$this->load->view('irD/form_pelayanan',$data);
		// echo "goto form";
	}
	public function pelayanan_diagnosa($no_register='')
	{
		$data['data_pasien_daftar_ulang']=$this->ModelPelayanan->getdata_daftar_ulang_pasien($no_register)->result();
		$data['data_diagnosa_pasien']=$this->ModelPelayanan->getdata_diagnosa_pasien($no_register)->result();
		$data['no_register']=$no_register;
		$this->load->view('irD/form_diagnosa',$data);
	}
	public function pelayanan_resep($no_register='')
	{
		$data['data_pasien_daftar_ulang']=$this->ModelPelayanan->getdata_daftar_ulang_pasien($no_register)->result();
		$data['data_resep_pasien']=$this->ModelPelayanan->getdata_resep_pasien($no_register)->result();
		$data['no_register']=$no_register;
		$this->load->view('irD/form_resep',$data);
	}
	////////////////////////////////////////////////////////////////////////////////
	public function insert_pelayanan_poli()
	{
		$data['no_register']=$this->input->post('no_register');
		$data['idtindakan']=$this->input->post('idtindakan');
		$data['nmtindakan']=$this->input->post('nmtindakan');
		$data['id_dokter']=$this->input->post('id_dokter');
		$data['nm_dokter']=$this->input->post('nm_dokter');
		$data['biaya_poli']=$this->input->post('biaya_poli');
		$data['qtyind']=$this->input->post('qtyind');
		$data['dijamin']=$this->input->post('dijamin');
		$data['vtot']=$this->input->post('vtot');
		redirect('IRD/IrDPelayanan/pelayanan_pasien/'.$data['no_register']);
	}
	public function insert_pelayanan_diagnosa()
	{
		$data['id_dokter']=$this->input->post('id_dokter');
		$data['nm_dokter']=$this->input->post('nm_dokter');
		$data['no_register']=$this->input->post('no_register');
		$data['id_diagnosa']=$this->input->post('id_diagnosa');
		$data['diagnosa']=$this->input->post('diagnosa');
		$data['tindakan']=$this->input->post('tindakan');
		$data['klasifikasi_diagnos']=$this->input->post('klasifikasi_diagnos');
		$data['kasus']=$this->input->post('kasus');
		redirect('IRD/IrDPelayanan/pelayanan_diagnosa/'.$data['no_register']);
	}
	public function insert_pelayanan_resep()
	{
		$data['id_dokter']=$this->input->post('id_dokter');
		$data['nm_dokter']=$this->input->post('nm_dokter');
		$data['no_register']=$this->input->post('no_register');
		$data['resep']=$this->input->post('resep');
		redirect('IRD/IrDPelayanan/pelayanan_resep/'.$data['no_register']);
	}
	//////////////////////////////////////////////////////////////////////////////////////////////////
		public function data_tindakan(){
			// tangkap variabel keyword dari URL
			$keyword = $this->uri->segment(3);
			// cari di database
			$data = $this->db->from('jenis_tindakan')->like('nmtindakan',$keyword)->get()->result();	

			// format keluaran di dalam array
			foreach($data as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'	=>$row->nmtindakan,
					'idtindakan'	=>$row->idtindakan,
					'nmtindakan'	=>$row->nmtindakan
				);
			}
			// minimal PHP 5.2
			echo json_encode($arr);
		}
		public function data_operator(){
			// tangkap variabel keyword dari URL
			$keyword = $this->uri->segment(3);
			// cari di database
			$data = $this->db->from('operator')->like('nm_dokter',$keyword)->get()->result();	

			// format keluaran di dalam array
			foreach($data as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'	=>$row->nm_dokter,
					'id_dokter'	=>$row->id_dokter,
					'nm_dokter'	=>$row->nm_dokter
				);
			}
			// minimal PHP 5.2
			echo json_encode($arr);
		}
		public function data_diagnosa(){
			// tangkap variabel keyword dari URL
			$keyword = $this->uri->segment(3);
			// cari di database
			$data = $this->db->from('icd10')->like('sub_diagnosa',$keyword)->get()->result();	

			// format keluaran di dalam array
			foreach($data as $row)
			{
				$arr['query'] = $keyword;
				$arr['suggestions'][] = array(
					'value'	=>$row->sub_diagnosa,
					'id'	=>$row->id,
					'sub_diagnosa'	=>$row->sub_diagnosa
				);
			}
			// minimal PHP 5.2
			echo json_encode($arr);
		}
	//////////////////////////////////////////////////////////////////////////////////////////////////
	public function update_pulang()
	{	
		$no_register=$this->input->post('no_register');
		$data['tgl_pulang']=$this->input->post('tgl_pulang');
		$data['ket_pulang']=$this->input->post('ket_pulang');
		$id=$this->ModelPelayanan->update_pulang($data,$no_register);
		$id=$this->ModelPelayanan->update_status_selesai($no_register);//kerana sebelumnya ada fungsi
		redirect('IRD/IrDPelayanan/kunj_pasien');
	}
	//////////////////////////////////////////////////////////////////////////////////////////////
	public function update_tindakan()
	{
		$no_register=$this->input->post('no_register');
		$id_pelayanan_poli=$this->input->post('id_pelayanan_poli2');
		$data['idtindakan']=$this->input->post('idtindakan2');
		$data['nmtindakan']=$this->input->post('nmtindakan2');
		$data['id_dokter']=$this->input->post('id_dokter2');
		$data['nm_dokter']=$this->input->post('nm_dokter2');
		$data['biaya_poli']=$this->input->post('biaya_poli2');
		$data['qtyind']=$this->input->post('qtyind2');
		$data['dijamin']=$this->input->post('dijamin2');
		$data['vtot']=$this->input->post('vtot2');
		redirect('IRD/IrDPelayanan/pelayanan_pasien/'.$no_register);
	}
	public function update_diagnosa()
	{
		$no_register=$this->input->post('no_register');
		$id_diagnosa_pasien=$this->input->post('id_diagnosa_pasien2');
		$data['id_diagnosa']=$this->input->post('id_diagnosa2');
		$data['diagnosa']=$this->input->post('diagnosa2');
		$data['id_dokter']=$this->input->post('id_dokter2');
		$data['nm_dokter']=$this->input->post('nm_dokter2');
		$data['tindakan']=$this->input->post('tindakan2');
		$data['klasifikasi_diagnos']=$this->input->post('klasifikasi_diagnos2');
		$data['kasus']=$this->input->post('kasus2');
		redirect('IRD/IrDPelayanan/pelayanan_diagnosa/'.$no_register);
	}
	public function update_resep()
	{
		$no_register=$this->input->post('no_register');
		$id_resep_irj=$this->input->post('id_resep_irj2');
		$data['id_dokter']=$this->input->post('id_dokter2');
		$data['nm_dokter']=$this->input->post('nm_dokter2');
		$data['resep']=$this->input->post('resep2');
		redirect('IRD/IrDPelayanan/pelayanan_resep/'.$no_register);
	}
}
?>