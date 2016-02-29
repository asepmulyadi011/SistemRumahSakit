<?php
class rimdaftar extends CI_Model {
	public function select_irna_antrian_all($kode_ruang, $kelas){
		if($kode_ruang=='-' && $kelas!='-'){
			$data=$this->db->query(
			"select *from irna_antrian
			where kelas='$kelas' and batal='N' and statusantrian='N'");
		}else if($kode_ruang!='-' && $kelas=='-'){
			$data=$this->db->query(
			"select *from irna_antrian
			where ruangpilih='$kode_ruang' and batal='N' and statusantrian='N'");
		}else if($kode_ruang!='-' && $kelas!='-'){
			$data=$this->db->query(
			"select *from irna_antrian
			where ruangpilih='$kode_ruang' and kelas='$kelas' and batal='N' and statusantrian='N'");
		}else{
			$data=$this->db->query(
			"select *from irna_antrian
			where batal='N' and statusantrian='N'");
		}
		return $data->result_array();
	}
	public function update_reservasi($noreservasi, $data){
		$this->db->where('noreservasi', $noreservasi);
		$this->db->update('irna_antrian', $data);
	}
	public function select_pasien_irj_by_no_register_asal($no_register_asal){
		$data=$this->db->query("select *from pasien_irj where no_reg='$no_register_asal'");
		return $data->result_array();
	}
	public function select_pasien_ird_by_no_register_asal($no_register_asal){
		$data=$this->db->query("select *from pasien_ird where no_reg='$no_register_asal'");
		return $data->result_array();
	}
	public function select_ruang_like($value){
		$data=$this->db->query("select *from ruang where idrg like '%$value%' order by idrg asc");
		return $data->result_array();
	}
}
?>
