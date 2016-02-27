 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IrjPelayanan extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('ModelPelayanan','',TRUE);
		$this->load->model('ModelRegistrasi','',TRUE);
	}
	public function index()
	{
		redirect('IrjRegistrasi');
	}
	public function kunj_pasien_poli($id_poli='')//perpoli
	{
		// echo $id_poli;
		// $data['pasien_poli']=$this->ModelPelayanan->get_pasien_poli($id_poli)->result();
		$data['pasien_daftar']=$this->ModelPelayanan->get_pasien_daftar_today($id_poli)->result();
		// print_r($data['pasien_daftar']);
		// $data['poliklinik']=$this->ModelRegistrasi->get_poli()->result();//untuk nav
		$get_nm_poli=$this->ModelPelayanan->get_nm_poli($id_poli)->result();//untuk nav
		foreach($get_nm_poli as $row){
			$data['nm_poli']=$row->nm_poli;
		}
		$data['id_poli']=$id_poli;
		$this->load->view('irj/pasien_poli',$data);
	}
	public function kunj_pasien_poli_by_no()
	{
		$key=$this->input->post('key');
		$id_poli=$this->input->post('id_poli');
		// $data['poliklinik']=$this->ModelRegistrasi->get_poli()->result();//untuk nav
		if($this->input->post('based')=='no_cm'){
			$data['pasien_daftar']=$this->ModelPelayanan->get_pasien_daftar_by_nocm($id_poli,$key)->result();
		}else{
			$data['pasien_daftar']=$this->ModelPelayanan->get_pasien_daftar_by_noregister($id_poli,$key)->result();
		}
		$get_nm_poli=$this->ModelPelayanan->get_nm_poli($id_poli)->result();//untuk nav
		foreach($get_nm_poli as $row){
			$data['nm_poli']=$row->nm_poli;
		}
		$data['id_poli']=$id_poli;
		$this->load->view('irj/pasien_poli',$data);
	}
	public function kunj_pasien_poli_by_date()
	{
		$date=$this->input->post('date');
		$id_poli=$this->input->post('id_poli');
		// $data['pasien_poli']=$this->ModelPelayanan->get_pasien_poli($id_poli)->result();
		$data['pasien_daftar']=$this->ModelPelayanan->get_pasien_daftar_by_date($id_poli,$date)->result();
		// $data['poliklinik']=$this->ModelRegistrasi->get_poli()->result();//untuk nav
		$get_nm_poli=$this->ModelPelayanan->get_nm_poli($id_poli)->result();//untuk nav
		foreach($get_nm_poli as $row){
			$data['nm_poli']=$row->nm_poli;
		}
		$data['id_poli']=$id_poli;
		// print_r($data['pasien_daftar']);
		// echo $date;
		$this->load->view('irj/pasien_poli',$data);
	}
	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function pelayanan_batal($id_poli='',$no_register='')
	{	
		$id=$this->ModelPelayanan->update_status_batal($no_register);
		redirect('IrjPelayanan/kunj_pasien_poli/'.$id_poli);
		// echo "//change status daftar_ulang=C or cancel in char";
	}
	public function pelayanan_pasien($id_poli='',$no_register='')
	{
		$data['data_pasien_daftar_ulang']=$this->ModelPelayanan->getdata_daftar_ulang_pasien($no_register)->result();
		$data['data_tindakan_pasien']=$this->ModelPelayanan->getdata_tindakan_pasien($no_register)->result();
		// $data['poliklinik']=$this->ModelRegistrasi->get_poli()->result();//untuk nav
		$data['id_poli']=$id_poli;
		$data['no_register']=$no_register;
		$this->load->view('irj/form_pelayanan',$data);
		// echo "goto form";
	}
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	public function pelayanan_diagnosa($id_poli='',$no_register='')
	{
		$data['data_pasien_daftar_ulang']=$this->ModelPelayanan->getdata_daftar_ulang_pasien($no_register)->result();
		$data['data_diagnosa_pasien']=$this->ModelPelayanan->getdata_diagnosa_pasien($no_register)->result();
		// $data['poliklinik']=$this->ModelRegistrasi->get_poli()->result();//untuk nav
		$data['id_poli']=$id_poli;
		$data['no_register']=$no_register;
		$this->load->view('irj/form_diagnosa',$data);
		// echo "goto form";
	}
	public function pelayanan_resep($id_poli='',$no_register='')
	{
		$data['data_pasien_daftar_ulang']=$this->ModelPelayanan->getdata_daftar_ulang_pasien($no_register)->result();
		$data['data_resep_pasien']=$this->ModelPelayanan->getdata_resep_pasien($no_register)->result();
		// $data['poliklinik']=$this->ModelRegistrasi->get_poli()->result();//untuk nav
		$data['id_poli']=$id_poli;
		$data['no_register']=$no_register;
		$this->load->view('irj/form_resep',$data);
		// echo "goto form";
	}
	////////////////////////////////////////////////////////////////////////////////
	public function insert_pelayanan_poli()
	{
		$data['id_poli']=$this->input->post('id_poli');
		$data['no_register']=$this->input->post('no_register');
		$data['idtindakan']=$this->input->post('idtindakan');
		$data['nmtindakan']=$this->input->post('nmtindakan');
		$data['id_dokter']=$this->input->post('id_dokter');
		$data['nm_dokter']=$this->input->post('nm_dokter');
		$data['biaya_poli']=$this->input->post('biaya_poli');
		$data['qtyind']=$this->input->post('qtyind');
		$data['dijamin']=$this->input->post('dijamin');
		$data['vtot']=$this->input->post('vtot');
		$id=$this->ModelPelayanan->insert_pelayanan_poli($data);
		redirect('IrjPelayanan/pelayanan_pasien/'.$data['id_poli'].'/'.$data['no_register']);
	}
	public function insert_pelayanan_diagnosa()
	{
		$data['id_poli']=$this->input->post('id_poli');
		$data['id_dokter']=$this->input->post('id_dokter');
		$data['nm_dokter']=$this->input->post('nm_dokter');
		$data['no_register']=$this->input->post('no_register');
		$data['id_diagnosa']=$this->input->post('id_diagnosa');
		$data['diagnosa']=$this->input->post('diagnosa');
		$data['tindakan']=$this->input->post('tindakan');
		$data['klasifikasi_diagnos']=$this->input->post('klasifikasi_diagnos');
		$data['kasus']=$this->input->post('kasus');
		$id=$this->ModelPelayanan->insert_pelayanan_diagnosa($data);
		redirect('IrjPelayanan/pelayanan_diagnosa/'.$data['id_poli'].'/'.$data['no_register']);
	}
	public function insert_pelayanan_resep()
	{
		$data['id_poli']=$this->input->post('id_poli');
		$data['id_dokter']=$this->input->post('id_dokter');
		$data['nm_dokter']=$this->input->post('nm_dokter');
		$data['no_register']=$this->input->post('no_register');
		$data['resep']=$this->input->post('resep');
		$id=$this->ModelPelayanan->insert_pelayanan_resep($data);
		redirect('IrjPelayanan/pelayanan_resep/'.$data['id_poli'].'/'.$data['no_register']);
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
		$id_poli=$this->input->post('id_poli');
		$no_register=$this->input->post('no_register');
		$data['tgl_pulang']=$this->input->post('tgl_pulang');
		$data['ket_pulang']=$this->input->post('ket_pulang');
		$id=$this->ModelPelayanan->update_pulang($data,$no_register);
		$id=$this->ModelPelayanan->update_status_selesai($no_register);//kerana sebelumnya ada fungsi
		redirect('IrjPelayanan/kunj_pasien_poli/'.$id_poli);
	}
	//////////////////////////////////////////////////////////////////////////////////////////////
	public function update_tindakan()
	{
		// echo "goto detail";
		$id_poli=$this->input->post('id_poli');
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
		$id=$this->ModelPelayanan->update_pelayanan_poli($data,$id_pelayanan_poli);//kerana sebelumnya ada fungsi
		redirect('IrjPelayanan/pelayanan_pasien/'.$id_poli.'/'.$no_register);
	}
	public function update_diagnosa()
	{
		// echo "goto detail";
		$id_poli=$this->input->post('id_poli');
		$no_register=$this->input->post('no_register');
		$id_diagnosa_pasien=$this->input->post('id_diagnosa_pasien2');
		$data['id_diagnosa']=$this->input->post('id_diagnosa2');
		$data['diagnosa']=$this->input->post('diagnosa2');
		$data['id_dokter']=$this->input->post('id_dokter2');
		$data['nm_dokter']=$this->input->post('nm_dokter2');
		$data['tindakan']=$this->input->post('tindakan2');
		$data['klasifikasi_diagnos']=$this->input->post('klasifikasi_diagnos2');
		$data['kasus']=$this->input->post('kasus2');
		$id=$this->ModelPelayanan->update_pelayanan_diagnosa($data,$id_diagnosa_pasien);//kerana sebelumnya ada fungsi
		redirect('IrjPelayanan/pelayanan_diagnosa/'.$id_poli.'/'.$no_register);
	}
	public function update_resep()
	{
		// echo "goto detail";
		$id_poli=$this->input->post('id_poli');
		$no_register=$this->input->post('no_register');
		$id_resep_irj=$this->input->post('id_resep_irj2');
		$data['id_dokter']=$this->input->post('id_dokter2');
		$data['nm_dokter']=$this->input->post('nm_dokter2');
		$data['resep']=$this->input->post('resep2');
		$id=$this->ModelPelayanan->update_pelayanan_resep($data,$id_resep_irj);//kerana sebelumnya ada fungsi
		redirect('IrjPelayanan/pelayanan_resep/'.$id_poli.'/'.$no_register);
	}
}
?>