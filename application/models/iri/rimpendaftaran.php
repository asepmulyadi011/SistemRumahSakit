<?php
class rimpendaftaran extends CI_Model {
	public function select_irna_antrian_by_noreservasi($value){
		$data=$this->db->query("select *from irna_antrian where noreservasi='$value'");
		return $data->result_array();
	}
}
?>
