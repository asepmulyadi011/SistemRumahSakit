<?php
class rimdaftar extends CI_Model {
	public function select_irna_antrian_all(){
		$data=$this->db->query("select *from irna_antrian");
		return $data->result_array();
	}
	public function select_irna_antrian_order($column, $sort, $start, $length){
		$data=$this->db->query("select *from irna_antrian order by $column $sort limit $start, $length");
		return $data->result_array();
	}
	public function select_irna_antrian_search($column, $sort, $start, $length, $value){
		$data=$this->db->query("select *from irna_antrian where noreservasi like '%$value%' or no_cm like '%$value%' or hp like '%$value%' or prioritas like '%$value%' or tglrencanamasuk like '%$value%' order by $column $sort limit $start, $length");
		return $data->result_array();
	}
	public function select_pasien_irj_by_no_register_asal($no_register_asal){
		$data=$this->db->query("select *from pasien_irj where no_reg='$no_register_asal'");
		return $data->result_array();
	}
}
?>
