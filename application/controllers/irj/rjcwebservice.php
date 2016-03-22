 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class rjcwebservice extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('irj/rjmpencarian','',TRUE);
		$this->load->model('irj/rjmpelayanan','',TRUE);
		$this->load->model('irj/rjmregistrasi','',TRUE);
	}
	public function index() {
		redirect('irj/rjcregistrasi');
	}
	public function check_no_kartu($no_cm='') {
		if($no_cm==''){
			echo "Masukan terlebih dulu nomor kartu BPJS/Askes anda";
		}else{
			$data_pasien=$this->rjmpelayanan->getdata_pasien($no_cm)->result();
			foreach($data_pasien as $row){
				$no_kartu=$row->no_kartu;
			}
			if($no_kartu==''){
				echo "Masukan terlebih dulu nomor kartu BPJS/Askes anda";
			}else{
				$timezone = date_default_timezone_get();
				date_default_timezone_set('UTC');
				$timestamp = strval(time()-strtotime('1970-01-01 00:00:00')); //cari timestamp
				$signature = hash_hmac('sha256', '1000' . '&' . $timestamp, '7789', true);
				$encoded_signature = base64_encode($signature);
				$http_header = array(
					   'Accept: application/json', 
					   'Content-type: application/xml',
					   'X-cons-id: 1000', //id rumah sakit
					   'X-timestamp: ' . $timestamp,
					   'X-signature: ' . $encoded_signature
				);
				date_default_timezone_set($timezone);
				$ch = curl_init('http://api.asterix.co.id/SepWebRest/peserta/'.$no_kartu);
				curl_setopt($ch, CURLOPT_HTTPGET, true);
				// curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_HTTPHEADER, $http_header);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$result = curl_exec($ch);//json file
				curl_close($ch);
				 // echo '<pre>';
				 // print_r($sep);
				 if($result!=''){//valid koneksi internet
					$sep = json_decode($result)->response;
					foreach ($sep as $key => $value){
						echo "<b>No Kartu:</b> $value->noKartu <br/>";
						echo "<b>NIK:</b> $value->nik <br/>";
						echo "<b>Nama:</b> $value->nama <br/>";
						echo "<b>Pisa:</b> $value->pisa <br/>";
						echo "<b>Sex:</b> $value->sex <br/>";
						echo "<b>Tanggal Lahir:</b> $value->tglLahir <br/>";
						echo "<b>Tanggal Cetak Kartu:</b> $value->tglCetakKartu <br/>";
						$kdprovider=$value->provUmum->kdProvider;
						$nmProvider=$value->provUmum->nmProvider;
						$kdCabang=$value->provUmum->kdCabang;
						$nmCabang=$value->provUmum->nmCabang;
						echo '<br/><b>Kode Provider:</b> '.$kdprovider;
						echo '<br/><b>Nama Provider:</b> '.$nmProvider;
						echo '<br/><b>Kode Cabang:</b> '.$kdCabang;
						echo '<br/><b>Nama Cabang:</b> '.$nmCabang;
						$kdJenisPeserta=$value->jenisPeserta->kdJenisPeserta;
						$nmJenisPeserta=$value->jenisPeserta->nmJenisPeserta;
						echo '<br/><br/><b>Kode Jenis Peserta:</b> '.$kdJenisPeserta;
						echo '<br/><b>Jenis Peserta:</b> '.$nmJenisPeserta;
						$kdKelas=$value->kelasTanggungan->kdKelas;
						$nmKelas=$value->kelasTanggungan->nmKelas;
						echo '<br/><br/><b>Kode Kelas:</b> '.$kdKelas;
						echo '<br/><b>Nama Kelas:</b> '.$nmKelas;
						echo '<br/><button type="button" class="btn btn-danger pull-right">Lanjut, Buat SEP</button><br/>';
						// print_r($value->jenisPeserta->nmJenisPeserta);
					};
				 }else{
					echo "<div style=\"color:red;\">Pastikan Anda Terhubung Internet!!</div><br/>";
					echo "Tidak ditemukan no Kartu: <b>$no_kartu<b/>";
				 }
			}
		}
	}
	

}?>