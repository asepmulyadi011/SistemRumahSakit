<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ricdaftar extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->model('mrawatinap/rimdaftar');
	}
	public function index(){
		$data['reservasi']='';
		$data['daftar']='active';
		$data['pendaftaran']='';
		$data['pasien']='';
		$data['mutasi']='';
		$data['status']='';
		$data['resume']='';
		$data['kontrol']='';
		
		$this->load->view('vrawatinap/rivlink');
		$this->load->view('vrawatinap/rivheader');
		$this->load->view('vrawatinap/rivmenu', $data);
		$this->load->view('vrawatinap/rivdaftar');
		$this->load->view('vrawatinap/rivfooter');
	}
	public function get_irna_antrian(){
		$requestData= $_REQUEST; //menampung post request dari ajax
		
		$columns = array( // datatable column index  => database column name
			0 =>'noreservasi', 
			1 =>'no_cm',
			2 =>'nama',
			3 =>'hp',
			4 =>'prioritas',
			5 =>'ren_masuk',
			6 =>'aksi'
		);
		
		$result['data'] = $this->rimdaftar->select_irna_antrian_all();
		
		// select *from pendidikan
		$totalData=count($result['data']);
		
		//------------------------------------------------------------AMBIL DATA----------------------------------------
		$result['data'] = $this->rimdaftar->select_irna_antrian_order($columns[$requestData['order'][0]['column']],$requestData['order'][0]['dir'],$requestData['start'],$requestData['length']);
		// select *from pendidikan order by $column $order limit start, length;
		$totalDataQuery=count($result['data']);
		$totalFiltered = $totalData;
		//--------------------------------------------------------------------------------------------------------------
		
		//----------------------------------------------------------KALAU ADA SEARCH------------------------------------
		if(!empty($requestData['columns'][0]['search']['value'])){
			$result['data'] = $this->rimdaftar->select_irna_antrian_search($columns[$requestData['order'][0]['column']],$requestData['order'][0]['dir'],$requestData['start'],$requestData['length'],$requestData['columns'][0]['search']['value']);
			// select *from pendidikan order by $column $order limit start, length where id like value or nama like value;
			//jika data null
			$totalDataQuery=count($result['data']);
			$totalFiltered=count($result['data']);
		}
		
		//--------------------------------------------------------------------------------------------------------------
		for($i=0;$i<$totalDataQuery;$i++){
			$sort[$i]['0']=$result['data'][$i]['noreservasi']; // No Reservasi
			$sort[$i]['1']=$result['data'][$i]['no_cm']; // No. CM
			$data_asal=$result['data'][$i]['tppri']; // TPPRI
			$no_register_asal=$result['data'][$i]['no_register_asal']; // No Register Asal
			if($data_asal=='rawatjalan'){
				$data_rawat_jalan=$this->rimdaftar->select_pasien_irj_by_no_register_asal($no_register_asal);
			}
			$sort[$i]['2']=$data_rawat_jalan[0]['nama']; // Nama
			$sort[$i]['3']=$result['data'][$i]['hp']; // HP
			$sort[$i]['4']=$result['data'][$i]['prioritas']; // Prioritas
			$data_tgl_rencana_masuk=strtotime($result['data'][$i]['tglrencanamasuk']); // Tanggal Rencana Masuk
			$tgl_rencana_masuk=date('d/m/Y', $data_tgl_rencana_masuk);
			$sort[$i]['5']=$tgl_rencana_masuk;
			$sort[$i]['6']='<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-approve"><i class="fa fa-plus"></i> Approve</button> <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-approve"><i class="fa fa-remove"></i> Batal</button>';
		}
		if($totalDataQuery==0){
			$data=Array();
		}else{
			$data=$sort;
		}
		
		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data,   // total data array
			"start"           => $requestData['start'],   // total data array
			"length"          => $requestData['length'],   // total data array
			);
		echo json_encode($json_data);  // send data as json format
	}
}
