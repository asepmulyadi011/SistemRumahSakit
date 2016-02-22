<?php
class RIMReservasi extends CI_Model {
	public function select_pendidikan(){
		$this->db->from('pendidikan');
		return $this->db->get();
	}
	public function select_pasien_iri(){
		$this->db->from('pasien_iri');
		return $this->db->get();
	}
}
?>
