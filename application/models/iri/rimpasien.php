<?php
class rimpasien extends CI_Model {
	public function select_pasien_iri_all(){
		$data=$this->db->query("select *from pasien_iri join ruang_iri on pasien_iri.no_ipd=ruang_iri.no_ipd");
		return $data->result_array();
	}
}
?>
