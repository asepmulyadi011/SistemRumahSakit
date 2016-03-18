<?php
class rimreservasi extends CI_Model {
	public function select_irna_antrian_by_noreservasi($value){
		$data=$this->db->query("select *from irna_antrian where noreservasi like '%$value%'");
		return $data->result_array();
	}
	public function select_pasien_irj_like($value){
		$data=$this->db->query("select *from daftar_ulang_irj join data_pasien join poliklinik on daftar_ulang_irj.no_medrec=data_pasien.no_medrec and daftar_ulang_irj.id_poli=poliklinik.id_poli where daftar_ulang_irj.no_register like '%$value%'");
		return $data->result_array();
	}
	public function select_pasien_iri_like($value){
		$data=$this->db->query("select *from pasien_iri join data_pasien on pasien_iri.no_cm=data_pasien.no_medrec where pasien_iri.no_ipd like '%$value%'");
		return $data->result_array();
	}
	public function select_pasien_ird_like($value){
		$data=$this->db->query("select *from daftar_ulang_ird join data_pasien join poliklinik on daftar_ulang_ird.no_medrec=data_pasien.no_medrec and daftar_ulang_ird.id_poli=poliklinik.id_poli where daftar_ulang_ird.no_register like '%$value%'");
		return $data->result_array();
	}
	public function select_ruang_like($value){
		$data=$this->db->query("select *from ruang where idrg like '%$value%'");
		return $data->result_array();
	}
	
	public function insert_reservasi($data){
		$this->db->insert('irna_antrian', $data);
	}
}
?>
