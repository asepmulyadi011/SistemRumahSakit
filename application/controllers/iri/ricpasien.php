<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ricpasien extends CI_Controller {
	public function __construct(){
		parent::__construct();
		
		$this->load->model('iri/rimpasien');
	}
	public function index(){
		$data['reservasi']='';
		$data['daftar']='';
		$data['pasien']='active';
		$data['mutasi']='';
		$data['status']='';
		$data['resume']='';
		$data['kontrol']='';
		
		$this->load->view('iri/rivlink');
		$this->load->view('iri/rivheader');
		$this->load->view('iri/rivmenu', $data);
		$this->load->view('iri/rivpasien');
		$this->load->view('iri/rivfooter');
	}
	public function get_pasien_iri(){
		$requestData= $_REQUEST; //menampung post request dari ajax
		
		$columns = array( // datatable column index  => database column name
			0=>'tgl_masuk', // Tanggal Masuk
			1=>'no_ipd', // No. Register
			2=>'nama', // Nama
			3=>'kelas', // Kelas
			4=>'bed', // No. Bed
			5=>'nmpembayarri', // Penjamin
			6=>'dokter', // Dokter Yang Merawat
			7=>'los', // LOS
			8=>'total', // Total Biaya
		);
		$result['data'] = $this->rimpasien->select_pasien_iri_all();
		
		// select *from pendidikan
		$totalData=count($result['data']);
		
		
		//------------------------------------------------------------AMBIL DATA----------------------------------------
		$result['data'] = $this->rimpasien->select_pasien_iri_order($columns[$requestData['order'][0]['column']],$requestData['order'][0]['dir'],$requestData['start'],$requestData['length']);
		// select *from pendidikan order by $column $order limit start, length;
		$totalDataQuery=count($result['data']);
		$totalFiltered = $totalData;
		//--------------------------------------------------------------------------------------------------------------
		
		
		//----------------------------------------------------------KALAU ADA SEARCH------------------------------------
		if(!empty($requestData['columns'][0]['search']['value'])){
			$result['data'] = $this->rimpasien->select_pasien_iri_search($columns[$requestData['order'][0]['column']],$requestData['order'][0]['dir'],$requestData['start'],$requestData['length'],$requestData['columns'][0]['search']['value']);
			// select *from pendidikan order by $column $order limit start, length where id like value or nama like value;
			//jika data null
			$totalDataQuery=count($result['data']);
			$totalFiltered=count($result['data']);
		}
		
		//--------------------------------------------------------------------------------------------------------------
		for($i=0;$i<$totalDataQuery;$i++){
			$sort[$i]['0']=$result['data'][$i]['tgl_masuk']; // No Reservasi
			$sort[$i]['1']=$result['data'][$i]['no_ipd']; // No. CM
			$sort[$i]['2']=$result['data'][$i]['nama']; // Nama
			$sort[$i]['3']=$result['data'][$i]['kelas']; // Nama
			$sort[$i]['4']=$result['data'][$i]['bed']; // Nama
			$sort[$i]['5']=$result['data'][$i]['nmpembayarri']; // Nama
			$sort[$i]['6']='-'; // HP
			$sort[$i]['7']='-'; // HP
			$sort[$i]['8']='-'; // Prioritas
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
		
		// $result=$this->rimpasien->select_pasien_iri_all();
		// $totalDataQuery=count($result);
		
		// if($totalDataQuery==0){
			// $data=Array();
		// }
		
		// for($i=0;$i<$totalDataQuery;$i++){
			// $data[$i]['0']=$result[$i]['tgl_masuk']; // Tanggal Masuk
			// $data[$i]['1']=$result[$i]['no_ipd']; // No. Register
			// $data[$i]['2']=$result[$i]['nama']; // Nama
			// $data[$i]['3']=$result[$i]['kelas']; // Kelas
			// $data[$i]['4']=$result[$i]['bed']; // No. Bed
			// $data[$i]['5']=$result[$i]['nmpembayarri']; // Penjamin
			// $data[$i]['6']='-'; // Dokter Yang Merawat
			// $data[$i]['7']='-'; // LOS
			// $data[$i]['8']='-'; // Total Biaya
		// }
		
		// $json_data=array(
			// "data"=>$data // total data array
		// );
		// echo json_encode($json_data); // send data as json format
	}
}
