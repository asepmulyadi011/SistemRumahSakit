<?php
	include('header.php');
	include('footer.php');
	
?>
<html>
<?php
	head();
?>
<script type='text/javascript'>
	jQuery.noConflict();//it Works :D
	var site = "<?php echo site_url();?>";
        jQuery(function(){
            jQuery('.auto_search_by_nocm').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/IRD/IrDRegistrasi/data_pasien',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#no_medrec').val(''+suggestion.no_medrec);
                }
            });
        });
        jQuery(function(){
            jQuery('.auto_search_poli').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/IRD/IrDRegistrasi/data_poli',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#id_poli').val(''+suggestion.id_poli);
                    $('#kd_ruang').val(''+suggestion.kd_ruang);
                }
            });
        });

	    var ajaxku;
function ajaxkota(id){
	var res=id.split("-");//it Works :D
    ajaxku = buatajax();
    var url="<?php echo site_url('IRD/IrDRegistrasi/data_kotakab'); ?>";
    url=url+"/"+res[0];
    url=url+"/"+Math.random();
    ajaxku.onreadystatechange=stateChanged;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
	document.getElementById("id_provinsi").value = res[0];
	document.getElementById("provinsi").value = res[1];
}

function ajaxkec(id){
	var res=id.split("-");//it Works :D
    ajaxku = buatajax();
    var url="<?php echo site_url('IRD/IrDRegistrasi/data_kecamatan'); ?>";
    url=url+"/"+res[0];
    url=url+"/"+Math.random();
    ajaxku.onreadystatechange=stateChangedKec;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
	document.getElementById("id_kotakabupaten").value = res[0];
	document.getElementById("kotakabupaten").value = res[1];
}

function ajaxkel(id){
	var res=id.split("-");//it Works :D
    ajaxku = buatajax();
    var url="<?php echo site_url('IRD/IrDRegistrasi/data_kelurahan'); ?>";
    url=url+"/"+res[0];
    url=url+"/"+Math.random();
    ajaxku.onreadystatechange=stateChangedKel;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
	document.getElementById("id_kecamatan").value = res[0];
	document.getElementById("kecamatan").value = res[1];
}
function setkel(id){
	var res=id.split("-");//it Works :D
	document.getElementById("id_kelurahandesa").value = res[0];
	document.getElementById("kelurahandesa").value = res[1];
}

function buatajax(){
    if (window.XMLHttpRequest){
    return new XMLHttpRequest();
    }
    if (window.ActiveXObject){
    return new ActiveXObject("Microsoft.XMLHTTP");
    }
    return null;
}
function stateChanged(){
    var data;
    if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
    document.getElementById("kota").innerHTML = data
    }else{
    document.getElementById("kota").value = "<option selected>Pilih Kota/Kab</option>";
    }
    }
}

function stateChangedKec(){
    var data;
    if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
    document.getElementById("kec").innerHTML = data
    }else{
    document.getElementById("kec").value = "<option selected>Pilih Kecamatan</option>";
    }
    }
}

function stateChangedKel(){
    var data;
    if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
    document.getElementById("kel").innerHTML = data
    }else{
    document.getElementById("kel").value = "<option selected>Pilih Kelurahan/Desa</option>";
    }
    }
}
</script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
	include('nav.php');
?>
<div class="content-wrapper">
	<div class="container-fluid">
	<section class="content-header">
	<?php
		if($message!=''){
	?>
		<div class="row">
			<div class="col-md-12">
			  <div class="box box-info box-solid">
				<div class="box-header with-border">
				  <h3 class="box-title">Registrasi Berhasil</h3>
				  <div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				  </div>
				</div>
			  </div>
			</div>
		</div>
	<?php
		}
	?>
				<div class="panel panel-primary">
					<div class="panel-heading" align="center"><h4>PENCARIAN DATA<h4></div>
					<div class="panel-body">
						<br>
						<?php echo form_open('IRD/IrDRegistrasi/search_pasien');?>
						<div class="col-md-6 col-md-offset-3">
							<div class="input-group">
								<input type="search" class="auto_search_by_nocm form-control" id="no_medrec" name="no_medrec" placeholder="Pencarian NO CM">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-primary" type="button">Cari</button>
								</span>
							</div>
						</div>
						<?php echo form_close();?>
					</div>
				</div>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading" align="center" style="background-color:#00C0C5;color:#ffffff"><h4>BIODATA</h4></div>
					<div class="panel-body" style="background-color:#BAD8FF;">
						<br>
							<?php echo form_open_multipart('IRD/IrDRegistrasi/insert_pasien_irj');?>
						<input type="hidden" class="form-control" value="<?php echo $no_cm;?>" name="no_cm" >
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="nama">Nama Lengkap</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="nama" required>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="sex">Jenis Kelamin</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<input type="radio" name="sex" value="L" required>&nbsp;Laki-Laki
												&nbsp;&nbsp;&nbsp;
												<input type="radio" name="sex" value="P">&nbsp;Perempuan
											</div>
										</div>
									</div>
								</div>
								
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="jenis_identitas">Pilih Identitas</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select class="form-control" name="jenis_identitas" required>
													<option value="">-Pilih Identitas-</option>
													<option value="KTP">KTP</option>
													<option value="SIM">SIM</option>
													<option value="PASPOR">Paspor</option>
													<option value="KTM">KTM</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="no_identitas">No. Identitas</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="no_identitas" required>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="jenis_kartu">Pilih Kartu</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select class="form-control" name="jenis_kartu">
													<option value="">-Pilih Kartu-</option>
													<option value="BPJS">BPJS</option>
													<option value="ASKES">ASKES</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="no_kartu">No. Kartu</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="no_kartu">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="tmpt_lahir">Tempat Lahir</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="tmpt_lahir" required>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="tgl_lahir">Tanggal Lahir</p>
									<div class="col-sm-8">
										<input type="date" class="form-control" placeholder="eg : 2001-05-11" name="tgl_lahir" required>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="agama">Agama</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select class="form-control" name="agama">
													<option value="">-Pilih Agama-</option>
													<option value="Islam">Islam</option>
													<option value="Katolik">Katolik</option>
													<option value="Protestan">Protestan</option>
													<option value="Budha">Budha</option>
													<option value="Hindu">Hindu</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="status">Status</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<input type="radio" name="sex" value="B">&nbsp;Belum Kawin
												&nbsp;&nbsp;&nbsp;
												<input type="radio" name="sex" value="K">&nbsp;Sudah Kawin
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="goldarah">Golongan Darah</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<select class="form-control" name="goldarah">
												<option value="">-Pilih Golongan Darah-</option>
												<option value="A">A</option>
												<option value="B">B</option>
												<option value="AB">AB</option>
												<option value="O">O</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="wnegara">Kewarganegaraan</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<select class="form-control" name="wnegara">
												<option value="WNI">WNI</option>
												<option value="WNA">WNA</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="alamat">Alamat</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="alamat">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="rt_rw">RT - RW</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<input type="text" size="4" class="form-control" placeholder="" name="rt"> - 
											<input type="text" size="4" class="form-control" placeholder="" name="rw">
										</div>
									</div>
								</div>
								<div class="form-group row">
								<!----------------- ---->
									<p class="col-sm-4 form-control-label" id="lbl_provinsi">Provinsi</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select id="prop" class="form-control" onchange="ajaxkota(this.value)">
													<option value="">-Pilih Provinsi-</option>
													<?php 
													foreach($prop as $row){
														echo '<option value="'.$row->id.'-'.$row->nama.'">'.$row->nama.'</option>';
													}
													?>
												</select>
												<input type="hidden" class="form-control" id="provinsi" placeholder="" name="provinsi">
												<input type="hidden" class="form-control" id="id_provinsi" placeholder="" name="id_provinsi">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="lbl_kotakabupaten">Kota/Kabupaten</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select id="kota" class="form-control" onchange="ajaxkec(this.value)">
													<option value="">-Pilih Kota/Kabupaten-</option>
												</select>
												<input type="hidden" class="form-control" id="kotakabupaten" placeholder="" name="kotakabupaten">
												<input type="hidden" class="form-control" id="id_kotakabupaten" placeholder="" name="id_kotakabupaten">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="lbl_kecamatan">Kecamatan</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select id="kec" class="form-control" onchange="ajaxkel(this.value)">
													<option value="">-Pilih Kecamatan-</option>
												</select>
												<input type="hidden" class="form-control" id="kecamatan" placeholder="" name="kecamatan">
												<input type="hidden" class="form-control" id="id_kecamatan" placeholder="" name="id_kecamatan">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="lbl_kelurahandesa">Kelurahan</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select id="kel" class="form-control" onchange="setkel(this.value)">
													<option value="">-Pilih Kelurahan/Desa-</option>
												</select>
												<input type="hidden" class="form-control" id="kelurahandesa" placeholder="" name="kelurahandesa">
												<input type="hidden" class="form-control" id="id_kelurahandesa" placeholder="" name="id_kelurahandesa">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="kodepos">Kode Pos</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="kodepos">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="pendidikan">Pendidikan</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select class="form-control" name="pendidikan">
													<option value="">-Pilih Pendidikan Terakhir-</option>
													<option value="sd">SD</option>
													<option value="smp">SMP</option>
													<option value="sma">SMA</option>
													<option value="sma">S1</option>
													<option value="sma">S2</option>
													<option value="sma">S3</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="pekerjaan">Pekerjaan</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="pekerjaan">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="no_telp">No. Telp</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" maxlength="12" name="no_telp">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="no_hp">No. HP</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" maxlength="12" name="no_hp">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="no_telp_kantor">No. Telp Kantor</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" maxlength="12" name="no_telp_kantor">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="email">Email</p>
									<div class="col-sm-8">
										<input type="email" class="form-control" placeholder="" name="email">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="bahasa">Bahasa</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="bahasa">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="sukubangsa">Suku Bangsa</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="sukubangsa">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="nm_ayah_suami">Nama Ayah/Suami</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="nm_ayah_suami">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="pekerjaan_ayah_suami">Pekerjaan Ayah/Suami</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="pekerjaan_ayah_suami">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="nm_ibu_istri">Nama Ibu/Istri</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="nm_ibu_istri">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="pekerjaan_ibu_istri">Pekerjaan Ibu/Istri</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="pekerjaan_ibu_istri">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="kartusdhdicetak">Kartu Sudah Dicetak</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select class="form-control" name="kartusdhdicetak">
													<option value="0">Belum</option>
													<option value="1">Sudah</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<!-- --->
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="foto">Foto</p>
									<div class="col-sm-8">
										<input type="file" name="userfile" class="form-control" accept="image/jpeg, image/png, image/gif">
									</div>
								</div>
								<div class="form-inline" align="center">
									<div class="form-group">
										<button type="reset" class="btn btn-primary">Reset</button>
										<button type="submit" class="btn btn-primary">Simpan</button>
										<a href="#" class="btn btn-primary">Cetak Kartu</a>
									</div>
								</div>
							<?php echo form_close();?>
					</div>
					<!--- end panel body--->
				</div>
				<!--- end panel --->
			</div>
		<!--- end col --->
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading" align="center" style="background-color:#529BC5;color:#ffffff"><h4>DAFTAR ULANG PASIEN IRD</h4></div>
					<div class="panel-body" style="background-color:#bad8e9;">
						<br>
							<?php echo form_open(); ?>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="namapserta">Nama Peserta</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="namapserta" disabled>
									</div>
								</div>
								
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="ruangan">Ruangan</p>
									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="" name="ruangan" disabled>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="kelas_pasien">Kelas Pasien</p>
									<div class="col-sm-4">
								<input type="text" class="form-control" placeholder="" name="kelas" value="Kelas II" disabled>
								<input type="hidden" name="kelas_pasien" value="II"></div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="tgl_kunj">Tanggal Kunjungan</p>
									<div class="col-sm-4">
										<input type="date" class="form-control" placeholder="eg : 2001-05-11" name="tgl_kunj" disabled required>
									</div>
								</div>
								
								<div class="form-group row">
								<!----------------- ---->
									<p class="col-sm-4 form-control-label" id="cara_bayar">Cara Bayar</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select id="prop" class="form-control" name="cara_bayar" disabled>
													<option value="">-Pilih Cara Bayar-</option>
													<?php 
													foreach($cara_bayar as $row){
														echo '<option value="'.$row->cara_bayar.'">'.$row->cara_bayar.'</option>';
													}
													?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="biayadaftar">Biaya Daftar</p>
									<div class="col-sm-8">
										<input type="number" min=0 class="form-control" placeholder="" name="biayadaftar" disabled>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="nama_penjamin">Nama Penjamin</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="nama_penjamin" disabled>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="alber">Alasan Berobat</p >
										<div class="col-sm-3"><select class="form-control" name="alber" disabled>
											<option value="sakit">Sakit</option>
											<option value="checkup">Check Up</option>
											<option value="lain">lain-lain</option>
										</select></div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="pasdatDg">Datang dengan</p>
									<div class="col-sm-3"><select class="form-control" name="pasdatDg" disabled>
										<option value="klg">Keluarga</option>
										<option value="ttg">Tetangga</option>
										<option value="lain">Lain-lain</option>
									</select></div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="Kclkaan">Kecelakaan</p>
									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="" name="id_Kclkaan" disabled>
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="" name="Kclkaan" readonly>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="diagnosa">Diagnosa</p>
									<div class="col-sm-3">
										<input type="text" class="form-control" placeholder="" name="id_diagnosa" disabled>
									</div>
									<div class="col-sm-4">
										<input type="text" class="form-control" placeholder="" name="diagnosa" readonly>
									</div>
								</div>
								
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="hubkel">Hubungan Keluarga</p>
									<div class="col-sm-4">
										<select class="form-control" name="hubkel" disabled>
											<option value="">-Hubungan Keluarga-</option>
											<option value="klg">Keluarga</option>
											<option value="Pk_kant">Pekerja Kantor</option>
											<option value="lain">Lain-lain</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="no_sep">No SEP</p>
									<div class="col-sm-8">
										<div class="form-inline">
											&nbsp;&nbsp;<a href="#" class="btn btn-danger" disabled>Buat SEP</a>
											<input type="text" class="form-control" placeholder="" name="no_sep" disabled>
										</div>
									</div>
								</div>
								<div class="form-inline" align="center">
									<div class="form-group">
										<button type="reset" class="btn btn-primary" disabled>Reset</button>
										<a href="#" class="btn btn-danger" disabled>Cetak Kartu Poli</a>
										<button type="submit" class="btn btn-primary" disabled>Cetak Karcis</button>
									</div>
								</div>
							<?php echo form_close(); ?>
					</div>
					<!--- end panel body--->
				</div><!--- end panel --->
			</div><!--- end col --->
		</div><!--- end row --->
	</section>
	</div><!--- end container --->
</div><!--- wrapp content --->
<?php
	foot();
?>
</div>
</body>
</html>
