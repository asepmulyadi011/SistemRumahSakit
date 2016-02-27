use irj;
drop table resep_irj;
drop table diagnosa_pasien;
drop table icd10;
drop table pelayanan_poli;
drop table tarif_tindakan;
drop table jenis_tindakan;
drop table poliklinik;
drop table daftar_ulang;
drop table data_pasien;
drop table operator;
drop table cara_bayar;
drop table cara_berkunjung;


create table poliklinik(
	id_poli varchar(5),
	nm_poli varchar(100),
	nm_pokpoli varchar(50),
	pok_poli_rs varchar(10),
	kd_ruang varchar(10),
	jns_layanan varchar(50),
	PRIMARY KEY(id_poli)
);
create table `operator`(
	id_dokter varchar(10),
	nm_dokter varchar(100),
	pok_dokter varchar(50),
	nipeg varchar(50),
	no_rek varchar(50),
	npwp varchar(50),
	PRIMARY KEY(id_dokter)
);
create table cara_bayar(
	cara_bayar varchar(50),
	klsrawatjalan varchar(10),
	no_urut int,
	kode varchar(5),
	PRIMARY KEY(cara_bayar)
);
create table cara_berkunjung(
	cara_kunj varchar(50),
	pokcarakunj varchar(50),
	kelas_rawatjalan varchar(10),
	PRIMARY KEY(cara_kunj)
);

create table data_pasien(
	no_medrec varchar(10),
	jenis_identitas varchar(10),
	no_identitas varchar(20),
	jenis_kartu varchar(10),
	no_kartu varchar(20),
	tgl_daftar timestamp DEFAULT now(),
	nama varchar(100),
	sex char,
	tmpt_lahir varchar(100),
	tgl_lahir date,
	agama varchar(10),
	wnegara varchar(10),
	status char,
	alamat varchar(100),
	rt varchar(5),
	rw varchar(5),
	id_kelurahandesa varchar(10),
	kelurahandesa varchar(100),
	id_kecamatan varchar(7),
	kecamatan varchar(100),
	id_kotakabupaten varchar(4),
	kotakabupaten varchar(100),
	id_provinsi varchar(2),
	provinsi varchar(100),
	kodepos varchar(10),
	pendidikan varchar(20),
	pekerjaan varchar(100),
	no_telp varchar(20),
	no_hp varchar(20),
	no_telp_kantor varchar(20),
	email varchar(100),
	goldarah varchar(2),
	bahasa varchar(50),
	sukubangsa varchar(50),
	nm_ayah_suami varchar(100),
	pekerjaan_ayah_suami varchar(100),
	nm_ibu_istri varchar(100),
	pekerjaan_ibu_istri varchar(100),
	kartusdhdicetak char default 0,
	tglcetakkartu date,
	foto varchar(255),
	xupdate timestamp DEFAULT now() ON UPDATE now(),
	xuser varchar(100),
	xterminal varchar(100),
	PRIMARY KEY(no_medrec)
);
create table daftar_ulang(
	no_register varchar(10),
	no_medrec varchar(10),
	tgl_kunjungan timestamp DEFAULT CURRENT_TIMESTAMP,
	jns_kunj varchar(10),
	ublnrj int default 0,
	uharirj int default 0,
	umurrj int default 0,
	cara_kunj varchar(50),
	asal_rujukan varchar(100),
	no_rujukan varchar(20),
	kelas_pasien varchar(10),
	cara_bayar varchar(50),
	id_poli varchar(5),
	kd_ruang varchar(10),
	biayadaftar int default 0,
	nama_penjamin varchar(100),
	hubungan varchar(100),
	vtot int default 0,
	status char default 0,
	tgl_pulang date,
	ket_pulang varchar(50),
	no_sep varchar(20),
	xupdate timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	xuser varchar(100),
	xterminal varchar(100),
	PRIMARY KEY (no_register),
	FOREIGN KEY (no_medrec) references data_pasien(no_medrec)
);
create table jenis_tindakan(
	idtindakan varchar(10),
	nmtindakan varchar(100),
	cito char,
	PRIMARY KEY(idtindakan)
);
create table tarif_tindakan(
	id_tarif_tindakan int auto_increment,
	id_tindakan varchar(10),
	kelas varchar(10),
	jasa_sarana int default 0,
	jasa_rs int default 0,
	jasa_dr int default 0,
	tanastesi int default 0,
	total_tarif int default 0,
	tarif_askin int default 0,
	tarif_askes int default 0,
	costshare int default 0,
	PRIMARY KEY(id_tarif_tindakan)
);
create table pelayanan_poli(
	id_pelayanan_poli int auto_increment,
	no_register varchar(10),
	tgl_kunjungan timestamp DEFAULT CURRENT_TIMESTAMP,
	idtindakan varchar(10),
	nmtindakan varchar(100),
	id_dokter varchar(10),
	nm_dokter varchar(100),
	id_poli varchar(5),
	jasa_poli int default 0,
	biaya_poli int default 0,
	qtyind int default 1,
	jasa_anesti int default 0,
	taskesirj int default 0,
	jnsaskesirj int default 0,
	cshareirj int default 0,
	jasa_opdr int default 0,
	jp_rs int default 0,
	jasa_instrj int default 0,
	fljasapoli int default 0,
	novoucher varchar(20),
	no_jasmed varchar(20),
	vtot int default 0,
	dijamin varchar(50),
	xupdate timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	xuser varchar(100),
	xterminal varchar(100),
	PRIMARY KEY(id_pelayanan_poli),
	FOREIGN KEY (no_register) references daftar_ulang(no_register)
);
create table icd10(
	id varchar(10),
	sub_diagnosa varchar (200),
	id_icd10 varchar(10),
	nama_diagnosa varchar(200),
	PRIMARY KEY(id)
);
create table diagnosa_pasien(
	id_diagnosa_pasien int auto_increment,
	no_register varchar(10),
	tgl_kunjungan timestamp DEFAULT CURRENT_TIMESTAMP,
	id_dokter varchar(10),
	nm_dokter varchar(100),
	id_diagnosa varchar(10),
	diagnosa varchar(255),
	id_poli varchar(5),
	tindakan varchar(100),
	klasifikasi_diagnos varchar(50),
	kasus varchar(20),
	no_dtd int,
	xupdate timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	xuser varchar(100),
	xterminal varchar(100),
	PRIMARY KEY (id_diagnosa_pasien),
	FOREIGN KEY (no_register) references daftar_ulang(no_register)
);
create table resep_irj(
	id_resep_irj int auto_increment,
	no_register varchar(10),
	id_dokter varchar(10),
	nm_dokter varchar(100),
	id_poli varchar(5),
	resep varchar(255),
	xupdate timestamp DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	xuser varchar(100),
	xterminal varchar(100),
	PRIMARY KEY (id_resep_irj),
	FOREIGN KEY (no_register) references daftar_ulang(no_register)
);