<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class RICDaftar_1 extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$data['reservasi']='';
		$data['daftar']='active';
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
		$this->load->view('RIVDaftar_1');
	}
	public function pencarian($array,$val){
		$return = Array();
		foreach($array as $key => $value){
			foreach($value as $keys => $values){
				if (strpos($values, $val) !== false) {
					$return[] = $value;
				}
			}
		}
		return $return;
	}
	public function table(){
		$requestData= $_REQUEST;
		
		$json_idr = $this->RIMReservasi->select_pendidikan()->result_array();
		$totalData=count($json_idr);
		
		$totalFiltered = $totalData;
		print_r($json_idr);
		$i=1;
		foreach($json_idr as $row){
			$sort[$i]['0']=$row['id']; 
			$sort[$i]['1']=$row['nama']; 
			
			$i++;
		}
		$data=$sort;
		
		//Pencarian Function
		// echo ($requestData['search']['value']);
		if($requestData['search']['value']!=NULL){
			$data=$this->pencarian($data, $requestData['search']['value']);
			$totalFiltered=count($data);
		}
		
		//Pengurutan 
		foreach ($data as $key => $row) {
			$data_sort[$key] = $row[$requestData['order'][0]['column']];
		}
		
		//Variabel			= REQUEST KEY DARI Kolom
		if($requestData['order'][0]['dir']=='asc'){
			array_multisort($data_sort, SORT_ASC,$data);
		}else{
			array_multisort($data_sort, SORT_DESC,$data);
		}
		
		//Limit data per 10 data
		$data = array_slice($data, $requestData['start'], $requestData['length']);
				
		$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data,   // total data array
			"start"            => $requestData['start'],   // total data array
			"length"            => $requestData['length']   // total data array
		);
		echo json_encode($json_data);  // send data as json format
	}
}
