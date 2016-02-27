<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class ModelRegistrasi extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function get_cara_berkunjung(){
			return $this->db->query("SELECT * FROM cara_berkunjung");
		}
		function get_cara_bayar(){
			return $this->db->query("SELECT * FROM cara_bayar");
		}
		///////////////////////////////////////////////////////////////////////////////////
		function get_new_medrec(){
			return $this->db->query("select max(no_medrec) as counter from pasien_irj");
		}
		function insert_pasien_irj($data){
			$this->db->insert('pasien_irj', $data);
			return $this->db->insert_id();
		}
		function update_pasien_irj($data,$no_medrec){
			$this->db->where('no_medrec', $no_medrec);
			$this->db->update('pasien_irj', $data);
			return true;
		}
		function get_data_pasien_by($no_cm){
			return $this->db->query("SELECT * FROM pasien_irj where no_medrec='$no_cm'");
		}
		////////////////////////////////////////////////////////////////
		function get_umur(){
			return $this->db->query("select datediff(now(),tgl_lahir) as umurday from pasien_irj");
		}
		///////////////////////////////////////////////////////////////////////////////////
		function get_new_register(){
			return $this->db->query("select max(right(no_register,6)) as counter, mid(now(),3,2) as year from daftar_ulang where mid(no_register,3,2) = (select mid(now(),3,2))");
		}
		function insert_daftar_ulang($data){
			$this->db->insert('daftar_ulang', $data);
			return $this->db->insert_id();
		}
		///////////////////////////////////////////////////////////////////////////////////
		function get_poli(){
			return $this->db->query("SELECT poliklinik.id_poli,poliklinik.nm_poli,(select count(id_poli) from daftar_ulang where poliklinik.id_poli=daftar_ulang.id_poli and daftar_ulang.status='0' and left(daftar_ulang.tgl_kunjungan,10) = left(now(),10)) as counter FROM poliklinik left join daftar_ulang on poliklinik.id_poli=daftar_ulang.id_poli group by poliklinik.id_poli;");
		}
		///////////////////////////////////////////////////////////////////////////////////
	}
?>