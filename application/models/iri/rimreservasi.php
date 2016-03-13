<?php
class rimreservasi extends CI_Model {
	public function select_irna_antrian_by_noreservasi($value){
		$data=$this->db->query("select *from irna_antrian where noreservasi like '%$value%'");
		return $data->result_array();
	}
	public function select_pasien_irj_like($value){
		$data=$this->db->query("select *from pasien_irj where no_cm like '%$value%'");
		return $data->result_array();
	}
	public function select_pasien_iri_like($value){
		$data=$this->db->query("select *from pasien_iri join ruang_iri on pasien_iri.no_ipd=ruang_iri.no_ipd where pasien_iri.no_cm like '%$value%'");
		return $data->result_array();
	}
	public function select_pasien_ird_like($value){
		$data=$this->db->query("select *from pasien_ird where no_cm like '%$value%'");
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
