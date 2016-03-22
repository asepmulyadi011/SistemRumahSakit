<?php
class rimdaftar extends CI_Model {
	public function select_irna_antrian_all(){
		$data=$this->db->query("select *from irna_antrian where batal='N' and statusantrian='N'");
		return $data->result_array();
	}
	public function select_pasien_irj_by_no_register_asal($no_register_asal){
		$data=$this->db->query("select *from daftar_ulang_irj join data_pasien on daftar_ulang_irj.no_medrec=data_pasien.no_medrec where daftar_ulang_irj.no_register='$no_register_asal'");
		return $data->result_array();
	}
	public function select_pasien_iri_by_no_register_asal($no_register_asal){
		$data=$this->db->query("select *from pasien_iri where no_ipd='$no_register_asal'");
		return $data->result_array();
	}
	public function select_pasien_ird_by_no_register_asal($no_register_asal){
		$data=$this->db->query("select *from daftar_ulang_ird join data_pasien on daftar_ulang_ird.no_medrec=data_pasien.no_medrec where daftar_ulang_ird.no_register='$no_register_asal'");
		return $data->result_array();
	}
	public function select_ruang_like($value){
		$data=$this->db->query("select *from ruang where idrg like '%$value%' order by idrg asc");
		return $data->result_array();
	}
	public function update_reservasi($noreservasi, $data){
		$this->db->where('noreservasi', $noreservasi);
		$this->db->update('irna_antrian', $data);
	}
}
?>
