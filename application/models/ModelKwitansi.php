<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class ModelKwitansi extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function get_pasien_daftar_today(){
			return $this->db->query("SELECT * FROM irddaftar_ulang, data_pasien where irddaftar_ulang.no_medrec=data_pasien.no_medrec and irddaftar_ulang.status='0' group by irddaftar_ulang.tgl_kunjungan desc");
		}
		function get_pasien_daftar_by_nocm($no_medrec){
			return $this->db->query("SELECT * FROM irddaftar_ulang, data_pasien where irddaftar_ulang.no_medrec=data_pasien.no_medrec  and data_pasien.no_medrec='$no_medrec' and irddaftar_ulang.status='0'");
		}
		function get_pasien_daftar_by_noregister($no_register){
			return $this->db->query("SELECT * FROM irddaftar_ulang, data_pasien where irddaftar_ulang.no_medrec=data_pasien.no_medrec  and irddaftar_ulang.no_register='$no_register' and irddaftar_ulang.status='0'");
		}
		function get_pasien_daftar_by_date($date){
			return $this->db->query("SELECT * FROM irddaftar_ulang, data_pasien where irddaftar_ulang.no_medrec=data_pasien.no_medrec  and left(irddaftar_ulang.tgl_kunjungan,10) = '$date' and irddaftar_ulang.status='0'");
		}
	}
?>