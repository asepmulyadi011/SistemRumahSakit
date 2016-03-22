<?php
class rimpasien extends CI_Model {
	public function select_pasien_iri_all(){
		$data=$this->db->query("select pasien_iri.tgl_masuk, pasien_iri.no_ipd, pasien_iri.nama, ruang_iri.kelas, ruang_iri.bed, pasien_iri.nmpembayarri from pasien_iri join ruang_iri on pasien_iri.no_ipd=ruang_iri.no_ipd");
		return $data->result_array();
	}
	public function select_pasien_iri_order($column, $sort, $start, $length){
		$data=$this->db->query("select pasien_iri.tgl_masuk, pasien_iri.no_ipd, pasien_iri.nama, ruang_iri.kelas, ruang_iri.bed, pasien_iri.nmpembayarri from pasien_iri join ruang_iri on pasien_iri.no_ipd=ruang_iri.no_ipd order by $column $sort limit $start, $length");
		return $data->result_array();
	}
	public function select_pasien_iri_search($column, $sort, $start, $length, $value){
		$data=$this->db->query("select pasien_iri.tgl_masuk, pasien_iri.no_ipd, pasien_iri.nama, ruang_iri.kelas, ruang_iri.bed, pasien_iri.nmpembayarri from pasien_iri join ruang_iri on pasien_iri.no_ipd=ruang_iri.no_ipd where pasien_iri.tgl_masuk like '%$value%' or pasien_iri.no_ipd like '%$value%' or pasien_iri.nama like '%$value%' or ruang_iri.kelas like '%$value%' or ruang_iri.bed like '%$value%' or pasien_iri.nmpembayarri like '%$value%'");
		return $data->result_array();
	}
}
?>
