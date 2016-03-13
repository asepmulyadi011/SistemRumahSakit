<?php
class rimpendaftaran extends CI_Model {
	public function select_irna_antrian_by_noreservasi($value){
		$data=$this->db->query("select *from irna_antrian where noreservasi='$value'");
		return $data->result_array();
	}
	public function select_pasien_iri(){
		$data=$this->db->query("select *from pasien_iri");
		return $data->result_array();
	}
	public function select_pasien_irj_by_no_register_asal($no_register_asal){
		$data=$this->db->query("select *from pasien_irj where no_reg='$no_register_asal'");
		return $data->result_array();
	}
	public function select_pasien_iri_by_no_register_asal($no_register_asal){
		$data=$this->db->query("select *from pasien_iri where no_ipd='$no_register_asal'");
		return $data->result_array();
	}
	public function select_pasien_ird_by_no_register_asal($no_register_asal){
		$data=$this->db->query("select *from pasien_ird where no_reg='$no_register_asal'");
		return $data->result_array();
	}
	public function select_ruang_like($value){
		$data=$this->db->query("select *from ruang where idrg like '%$value%'");
		return $data->result_array();
	}
	
	public function insert_pendaftaran($data){
		$this->db->insert('pasien_iri', $data);
	}
	public function insert_ruang_iri($data){
		$this->db->insert('ruang_iri', $data);
	}
	public function update_irna_antrian($data, $value){
		$this->db->where('noreservasi', $value);
		$this->db->update('irna_antrian', $data);
	}
}
?>
