<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class rjmpencarian extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////daftar_ulang
		function get_cara_berkunjung(){
			return $this->db->query("SELECT * FROM cara_berkunjung");
		}
		function get_cara_bayar(){
			return $this->db->query("SELECT * FROM cara_bayar");
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////pencarian list antrian pasien per poli by
		function get_pasien_daftar_today($id_poli){
			return $this->db->query("SELECT * FROM daftar_ulang_irj, data_pasien where daftar_ulang_irj.id_poli='$id_poli' and daftar_ulang_irj.no_medrec=data_pasien.no_medrec  and left(daftar_ulang_irj.tgl_kunjungan,10) = left(now(),10) and daftar_ulang_irj.status='0'");
		}
		function get_pasien_daftar_by_nocm($id_poli,$no_medrec){
			return $this->db->query("SELECT * FROM daftar_ulang_irj, data_pasien where daftar_ulang_irj.id_poli='$id_poli' and daftar_ulang_irj.no_medrec=data_pasien.no_medrec  and data_pasien.no_medrec='$no_medrec' and daftar_ulang_irj.status='0'");
		}
		function get_pasien_daftar_by_noregister($id_poli,$no_register){
			return $this->db->query("SELECT * FROM daftar_ulang_irj, data_pasien where daftar_ulang_irj.id_poli='$id_poli' and daftar_ulang_irj.no_medrec=data_pasien.no_medrec  and daftar_ulang_irj.no_register='$no_register' and daftar_ulang_irj.status='0'");
		}
		function get_pasien_daftar_by_date($id_poli,$date){
			return $this->db->query("SELECT * FROM daftar_ulang_irj, data_pasien where daftar_ulang_irj.id_poli='$id_poli' and daftar_ulang_irj.no_medrec=data_pasien.no_medrec  and left(daftar_ulang_irj.tgl_kunjungan,10) = '$date' and daftar_ulang_irj.status='0'");
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////alamat
		function get_prop(){
			return $this->db->query("SELECT * FROM provinsi order by nama");
		}
		function get_kotakab($id_prop){
			return $this->db->query("SELECT * FROM kotakabupaten where id_prov='$id_prop' order by nama");
		}
		function get_kecamatan($id_kabupaten){
			return $this->db->query("SELECT * FROM kecamatan where id_kabupaten='$id_kabupaten' order by nama");
		}
		function get_kelurahan($id_kecamatan){
			return $this->db->query("SELECT * FROM kelurahandesa where id_kecamatan='$id_kecamatan' order by nama");
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////list_poli
		function get_poli(){
			return $this->db->query("SELECT poliklinik.id_poli,poliklinik.nm_poli,(select count(id_poli) from daftar_ulang_irj where poliklinik.id_poli=daftar_ulang_irj.id_poli and daftar_ulang_irj.status='0' and left(daftar_ulang_irj.tgl_kunjungan,10) = left(now(),10)) as counter FROM poliklinik left join daftar_ulang_irj on poliklinik.id_poli=daftar_ulang_irj.id_poli group by poliklinik.id_poli;");
		}
		function get_nm_poli($id_poli){//judul poli -> header dalam list antrian
			return $this->db->query("SELECT nm_poli FROM poliklinik where id_poli='$id_poli'");
		}
		////////////////////////////////////////////////////////////////////////////////////////////////////////////tarif_tindakan
		function get_tarif_tindakan($keyword,$kelas_pasien){//judul poli -> header dalam list antrian
			return $this->db->query("select * from jenis_tindakan, tarif_tindakan where jenis_tindakan.nmtindakan like '%$keyword%' and jenis_tindakan.idtindakan=tarif_tindakan.idtindakan and tarif_tindakan.kelas='$kelas_pasien' and jenis_tindakan.cito='B'");
		}
		
	}
?>