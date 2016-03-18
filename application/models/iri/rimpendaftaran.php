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
		$data=$this->db->query("select *from daftar_ulang_irj join data_pasien on daftar_ulang_irj.no_medrec=data_pasien.no_medrec where daftar_ulang_irj.no_register='$no_register_asal'");
		return $data->result_array();
	}
	public function select_pasien_ird_by_no_register_asal($no_register_asal){
		$data=$this->db->query("select *from daftar_ulang_ird join data_pasien on daftar_ulang_ird.no_medrec=data_pasien.no_medrec where daftar_ulang_ird.no_register='$no_register_asal'");
		return $data->result_array();
	}
	public function select_ruang_like($value){
		$data=$this->db->query("select *from ruang where idrg like '%$value%'");
		return $data->result_array();
	}
	public function select_cara_bayar($value){
		$data=$this->db->query("select *from cara_bayar where cara_bayar like '%$value%'");
		return $data->result_array();
	}
	public function select_ruang($value){
		$data=$this->db->query("select *from ruang where idrg='$value'");
		return $data->result_array();
	}
	public function select_kontraktor($value){
		$data=$this->db->query("select *from kontraktor where nmkontraktor like '%$value%'");
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
