<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class rjmregistrasi extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////registrasi biodata pasien
		function get_new_medrec(){
			return $this->db->query("select max(no_medrec) as counter from data_pasien");
		}
		function insert_pasien_irj($data){
			$this->db->insert('data_pasien', $data);
			return $this->db->insert_id();
		}
		function update_pasien_irj($data,$no_medrec){
			$this->db->where('no_medrec', $no_medrec);
			$this->db->update('data_pasien', $data);
			return true;
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////cari data pasien by
		function get_data_pasien_by_no_cm($no_cm){
			return $this->db->query("SELECT * FROM data_pasien where no_medrec='$no_cm'");
		}
		function get_data_pasien_by_no_kartu($no_kartu){
			return $this->db->query("SELECT * FROM data_pasien where no_kartu='$no_kartu'");
		}
		function get_data_pasien_by_no_identitas($no_identitas){
			return $this->db->query("SELECT * FROM data_pasien where no_identitas='$no_identitas'");
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////registrasi pasien ke irj
		function get_umur($no_medrec){
			return $this->db->query("select datediff(now(),tgl_lahir) as umurday from data_pasien where no_medrec='$no_medrec'");
		}
		function get_new_register(){
			return $this->db->query("select max(right(no_register,6)) as counter, mid(now(),3,2) as year from daftar_ulang_irj where mid(no_register,3,2) = (select mid(now(),3,2))");
		}
		function insert_daftar_ulang($data){
			$this->db->insert('daftar_ulang_irj', $data);
			return $this->db->insert_id();
		}
	}
?>