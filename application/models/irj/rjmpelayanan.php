<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class rjmpelayanan extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////batal
		function update_status_batal($no_register){
			$this->db->query("update daftar_ulang_irj set status='C' where no_register='$no_register'");
			return true;
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////data pasien u/ di transaksi pelayanan
		function getdata_daftar_ulang_pasien($no_register){
			return $this->db->query("SELECT * FROM daftar_ulang_irj,data_pasien where daftar_ulang_irj.no_medrec=data_pasien.no_medrec and daftar_ulang_irj.no_register='$no_register'");
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////read data pelayanan poli per pasien
		function getdata_tindakan_pasien($no_register){
			return $this->db->query("SELECT * FROM pelayanan_poli, jenis_tindakan, operator where pelayanan_poli.no_register='$no_register' and jenis_tindakan.idtindakan=pelayanan_poli.idtindakan and operator.id_dokter=pelayanan_poli.id_dokter order by pelayanan_poli.xupdate desc");
		}
		function getdata_diagnosa_pasien($no_register){
			return $this->db->query("SELECT * FROM diagnosa_pasien, icd10, operator where diagnosa_pasien.no_register='$no_register' and icd10.id_diagnosa=diagnosa_pasien.id_diagnosa and operator.id_dokter=diagnosa_pasien.id_dokter order by diagnosa_pasien.xupdate desc");
		}
		function getdata_resep_pasien($no_register){
			return $this->db->query("SELECT * FROM resep_irj, operator where resep_irj.no_register='$no_register' and operator.id_dokter=resep_irj.id_dokter order by resep_irj.xupdate desc");
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////create update data pelayanan poli
		function insert_tindakan($data){
			$this->db->insert('pelayanan_poli', $data);
			return $this->db->insert_id();
		}
		function update_tindakan($data,$id_pelayanan_poli){
			$this->db->where('id_pelayanan_poli', $id_pelayanan_poli);
			$this->db->update('pelayanan_poli', $data);
			return true;
		}
		function insert_diagnosa($data){
			$this->db->insert('diagnosa_pasien', $data);
			return $this->db->insert_id();
		}
		function update_diagnosa($data,$id_diagnosa_pasien){
			$this->db->where('id_diagnosa_pasien', $id_diagnosa_pasien);
			$this->db->update('diagnosa_pasien', $data);
			return true;
		}
		function insert_resep($data){
			$this->db->insert('resep_irj', $data);
			return $this->db->insert_id();
		}
		function update_resep($data,$id_resep_irj){
			$this->db->where('id_resep_irj', $id_resep_irj);
			$this->db->update('resep_irj', $data);
			return true;
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////pulang / selesai pelayanan poli
		function update_pulang($data,$no_register){
			$this->db->where('no_register', $no_register);
			$this->db->update('daftar_ulang_irj', $data);
			return true;
		}
		function getdata_daftar_sblm($no_register){
			return $this->db->query("SELECT * FROM daftar_ulang_irj where no_register='$no_register'");
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////data pasien u/ di webservice
		function getdata_pasien($no_medrec){
			return $this->db->query("SELECT * FROM data_pasien where no_medrec='$no_medrec'");
		}
	}
?>