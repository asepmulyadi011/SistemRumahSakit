<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class rjmkwitansi extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function get_pasien_kwitansi(){
			return $this->db->query("SELECT * FROM daftar_ulang_irj, data_pasien, poliklinik where cetak_kwitansi='0' and daftar_ulang_irj.status='1' and daftar_ulang_irj.no_medrec=data_pasien.no_medrec and poliklinik.id_poli=daftar_ulang_irj.id_poli order by daftar_ulang_irj.xupdate desc");
		}
		function get_pasien_kwitansi_by_nocm($no_medrec){
			return $this->db->query("SELECT * FROM daftar_ulang_irj, data_pasien, poliklinik where cetak_kwitansi='0' and daftar_ulang_irj.status='1' and daftar_ulang_irj.no_medrec=data_pasien.no_medrec and poliklinik.id_poli=daftar_ulang_irj.id_poli and data_pasien.no_medrec='$no_medrec' order by daftar_ulang_irj.xupdate desc");
		}
		function get_pasien_kwitansi_by_noregister($no_register){
			return $this->db->query("SELECT * FROM daftar_ulang_irj, data_pasien, poliklinik where cetak_kwitansi='0' and daftar_ulang_irj.status='1' and daftar_ulang_irj.no_medrec=data_pasien.no_medrec and poliklinik.id_poli=daftar_ulang_irj.id_poli and daftar_ulang_irj.no_register='$no_register' order by daftar_ulang_irj.xupdate desc");
		}
		function get_pasien_kwitansi_by_date($date){
			return $this->db->query("SELECT * FROM daftar_ulang_irj, data_pasien, poliklinik where cetak_kwitansi='0' and daftar_ulang_irj.status='1' and daftar_ulang_irj.no_medrec=data_pasien.no_medrec and poliklinik.id_poli=daftar_ulang_irj.id_poli and left(daftar_ulang_irj.tgl_kunjungan,10)='$date' order by daftar_ulang_irj.xupdate desc");
		}
		/////////////////////////////////////////////////////////////////////////////////
		function getdata_pasien($no_register){
			return $this->db->query("SELECT * FROM daftar_ulang_irj, data_pasien, poliklinik where data_pasien.no_medrec=data_pasien.no_medrec and poliklinik.id_poli=daftar_ulang_irj.id_poli and daftar_ulang_irj.no_register='$no_register' group by daftar_ulang_irj.no_register");
		}
		function getdata_tindakan_pasien($no_register){
			return $this->db->query("SELECT * FROM pelayanan_poli where no_register='$no_register' order by xupdate desc");
		}
	}
?>