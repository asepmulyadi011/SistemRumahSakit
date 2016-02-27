<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class ModelPelayanan extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function get_pasien_poli($id_poli){
			return $this->db->query("SELECT * FROM daftar_ulang where id_poli='$id_poli'");
		}
		function get_pasien_daftar_today($id_poli){
			return $this->db->query("SELECT * FROM daftar_ulang, pasien_irj where daftar_ulang.id_poli='$id_poli' and daftar_ulang.no_medrec=pasien_irj.no_medrec  and left(daftar_ulang.tgl_kunjungan,10) = left(now(),10) and daftar_ulang.status='0'");
		}
		function get_pasien_daftar_by_nocm($id_poli,$no_medrec){
			return $this->db->query("SELECT * FROM daftar_ulang, pasien_irj where daftar_ulang.id_poli='$id_poli' and daftar_ulang.no_medrec=pasien_irj.no_medrec  and pasien_irj.no_medrec='$no_medrec' and daftar_ulang.status='0'");
		}
		function get_pasien_daftar_by_noregister($id_poli,$no_register){
			return $this->db->query("SELECT * FROM daftar_ulang, pasien_irj where daftar_ulang.id_poli='$id_poli' and daftar_ulang.no_medrec=pasien_irj.no_medrec  and daftar_ulang.no_register='$no_register' and daftar_ulang.status='0'");
		}
		function get_pasien_daftar_by_date($id_poli,$date){
			return $this->db->query("SELECT * FROM daftar_ulang, pasien_irj where daftar_ulang.id_poli='$id_poli' and daftar_ulang.no_medrec=pasien_irj.no_medrec  and left(daftar_ulang.tgl_kunjungan,10) = '$date' and daftar_ulang.status='0'");
		}
		
		////////////////////////////////////////////////////////////////
		function update_status_selesai($no_register){
			$this->db->query("update daftar_ulang set status='1' where no_register='$no_register'");
			return true;
		}
		function update_status_batal($no_register){
			$this->db->query("update daftar_ulang set status='C' where no_register='$no_register'");
			return true;
		}
		///////////////////////////////////////////////////////////////////////
		function getdata_daftar_ulang_pasien($no_register){
			return $this->db->query("SELECT * FROM daftar_ulang,pasien_irj where daftar_ulang.no_medrec=pasien_irj.no_medrec and daftar_ulang.no_register='$no_register'");
		}
		function getdata_tindakan_pasien($no_register){
			return $this->db->query("SELECT * FROM pelayanan_poli where no_register='$no_register' order by xupdate desc");
		}
		function getdata_diagnosa_pasien($no_register){
			return $this->db->query("SELECT * FROM diagnosa_pasien where no_register='$no_register' order by xupdate desc");
		}
		function getdata_resep_pasien($no_register){
			return $this->db->query("SELECT * FROM resep_irj where no_register='$no_register' order by xupdate desc");
		}
		//////////////////////////////////////////////////////////////////////////////
		function insert_pelayanan_poli($data){
			$this->db->insert('pelayanan_poli', $data);
			return $this->db->insert_id();
		}
		function update_pelayanan_poli($data,$id_pelayanan_poli){
			$this->db->where('id_pelayanan_poli', $id_pelayanan_poli);
			$this->db->update('pelayanan_poli', $data);
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
			$this->db->update('daftar_ulang', $data);
			return true;
		}
		//////////////////////////////////////////////////////////////////////
		function get_nm_poli($id_poli){
			return $this->db->query("SELECT nm_poli FROM poliklinik where id_poli='$id_poli'");
		}
	}
?>