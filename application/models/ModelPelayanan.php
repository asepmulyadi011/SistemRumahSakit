<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class ModelPelayanan extends CI_Model{
		function __construct(){
			parent::__construct();
		}///pelayanan 
		function get_pasien_daftar_today(){
			return $this->db->query("SELECT * FROM irddaftar_ulang, data_pasien where irddaftar_ulang.no_medrec=data_pasien.no_medrec and irddaftar_ulang.status='0' group by irddaftar_ulang.tgl_kunjungan desc");
		}///pelayanan dan kwitansi
		function get_pasien_daftar_by_nocm($no_medrec, $st){
			return $this->db->query("SELECT * FROM irddaftar_ulang, data_pasien where irddaftar_ulang.no_medrec=data_pasien.no_medrec  and data_pasien.no_medrec='$no_medrec' and irddaftar_ulang.status='$st'");
		}
		function get_pasien_daftar_by_noregister($no_register, $st){
			return $this->db->query("SELECT * FROM irddaftar_ulang, data_pasien where irddaftar_ulang.no_medrec=data_pasien.no_medrec  and irddaftar_ulang.no_register='$no_register' and irddaftar_ulang.status='$st'");
		}
		function get_pasien_daftar_by_date($date, $st){
			return $this->db->query("SELECT * FROM irddaftar_ulang, data_pasien where irddaftar_ulang.no_medrec=data_pasien.no_medrec  and left(irddaftar_ulang.tgl_kunjungan,10) = '$date' and irddaftar_ulang.status='$st'");
		}
		
		////////////////////////////////////////////////////////////////
		function update_status_selesai($no_register){
			$this->db->query("update irddaftar_ulang set status='1' where no_register='$no_register'");
			return true;
		}
		function update_status_batal($no_register){
			$this->db->query("update irddaftar_ulang set status='C' where no_register='$no_register'");
			return true;
		}
		///////////////////////////////////////////////////////////////////////
		function getdata_daftar_ulang_pasien($no_register){
			return $this->db->query("SELECT * FROM irddaftar_ulang,data_pasien where irddaftar_ulang.no_medrec=data_pasien.no_medrec and irddaftar_ulang.no_register='$no_register'");
		}
		function getdata_tindakan_pasien($no_register){
			return $this->db->query("SELECT * FROM pelayanan_ird where no_register='$no_register' order by xupdate desc");
		}
		function getdata_diagnosa_pasien($no_register){
			return $this->db->query("SELECT * FROM diagnosa_pasien where no_register='$no_register' order by xupdate desc");
		}
		function getdata_resep_pasien($no_register){
			return $this->db->query("SELECT * FROM resep_irj where no_register='$no_register' order by xupdate desc");
		}
		//////////////////////////////////////////////////////////////////////////////
		function insert_pelayanan_poli($data){
			$this->db->insert('pelayanan_ird', $data);
			return $this->db->insert_id();
		}
		function update_pelayanan_poli($data,$id_pelayanan_poli){
			$this->db->where('id_pelayanan_poli', $id_pelayanan_poli);
			$this->db->update('pelayanan_ird', $data);
			return true;
		}
		function insert_pelayanan_diagnosa($data){
			$this->db->insert('diagnosa_pasien', $data);
			return $this->db->insert_id();
		}
		function update_pelayanan_diagnosa($data,$id_diagnosa_pasien){
			$this->db->where('id_diagnosa_pasien', $id_diagnosa_pasien);
			$this->db->update('diagnosa_pasien', $data);
			return true;
		}
		function insert_pelayanan_resep($data){
			$this->db->insert('resep_irj', $data);
			return $this->db->insert_id();
		}
		function update_pelayanan_resep($data,$id_resep_irj){
			$this->db->where('id_resep_irj', $id_resep_irj);
			$this->db->update('resep_irj', $data);
			return true;
		}
		//////////////////////////////////////////////////////////////////////
		function update_pulang($data,$no_register){
			$this->db->where('no_register', $no_register);
			$this->db->update('irddaftar_ulang', $data);
			return true;
		}
		//////////////////////////////////////////////////////////////////////
		function get_nm_poli($id_poli){
			return $this->db->query("SELECT nm_poli FROM poliklinik where id_poli='$id_poli'");
		}
		//////pasien u/ di webservice
		function getdata_pasien($no_medrec){
			return $this->db->query("SELECT * FROM data_pasien where no_medrec='$no_medrec'");
		}
		////kwitansi
		function get_kwitansi_pasien(){
			return $this->db->query("SELECT * FROM irddaftar_ulang, data_pasien where irddaftar_ulang.no_medrec=data_pasien.no_medrec and irddaftar_ulang.status='1' group by irddaftar_ulang.tgl_kunjungan desc");
		}
		// function getdata_pasien($no_register){
			// return $this->db->query("SELECT * FROM irddaftar_ulang, data_pasien, pelayanan_ird where data_pasien.no_medrec=data_pasien.no_medrec and pelayanan_ird.no_register='$no_register' and irddaftar_ulang.no_register='$no_register' group by irddaftar_ulang.no_register");
		// }
		// function getdata_tindakan_pasien($no_register){
			// return $this->db->query("SELECT * FROM pelayanan_poli where no_register='$no_register' order by xupdate desc");
		// }
		//kwitansi berdasar no dll di atas
	}
?>