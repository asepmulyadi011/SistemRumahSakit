<?php
class rimmutasi extends CI_Model {
	public function select_irna_antrian_by_noreservasi($value){
		$data=$this->db->query("select *from irna_antrian join data_pasien join ruang on irna_antrian.no_cm=data_pasien.no_medrec and irna_antrian.ruangpilih=ruang.idrg where noreservasi='$value'");
		return $data->result_array();
	}
	public function select_pasien_iri_by_no_ipd($value){
		$data=$this->db->query("select *from pasien_iri join data_pasien join ruang_iri join ruang on pasien_iri.no_cm=data_pasien.no_medrec and pasien_iri.no_ipd=ruang_iri.no_ipd and ruang_iri.idrg=ruang.idrg where pasien_iri.no_ipd='$value'");
		return $data->result_array();
	}
}
?>
