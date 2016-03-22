<?php
	include('rjvheader.php');
	include('rjvfooter.php');
?>
<html>
<?php
	head();
?>
<script type='text/javascript'>
	jQuery.noConflict();//it Works :D
	jQuery(document).ready(function () {
		jQuery('#input_kontraktor').hide();
    });
	function pilih_cara_bayar(val_cara_bayar){
		var res=val_cara_bayar.split("-");//it Works :D
		if(val_cara_bayar!=''){
			document.getElementById("biayadaftar").value = res[1];
			document.getElementById("cara_bayar").value = res[0];
		}else{
			document.getElementById("biayadaftar").value = '';
			document.getElementById("cara_bayar").value = '';
		}
		if(res[0]=='PERUSAHAAN'){
			jQuery('#input_kontraktor').show();
		}else{
			jQuery('#input_kontraktor').hide();
		}
	}
	var site = "<?php echo site_url();?>";
        jQuery(function(){
            jQuery('.auto_search_by_nocm').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/irj/rjcautocomplete/data_pasien_by_nocm',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#cari_no_cm').val(''+suggestion.no_medrec);
                }
            });
        });
        jQuery(function(){
            jQuery('.auto_search_by_nokartu').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/irj/rjcautocomplete/data_pasien_by_nokartu',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#cari_no_kartu').val(''+suggestion.no_kartu);
                }
            });
        });
        jQuery(function(){
            jQuery('.auto_search_by_noidentitas').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/irj/rjcautocomplete/data_pasien_by_noidentitas',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#cari_no_identitas').val(''+suggestion.no_identitas);
                }
            });
        });
        jQuery(function(){
            jQuery('.auto_search_poli').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/irj/rjcautocomplete/data_poli',
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
    var url="<?php echo site_url('irj/rjcregistrasi/data_kotakab'); ?>";
    url=url+"/"+res[0];
    url=url+"/"+Math.random();
    ajaxku.onreadystatechange=stateChangedKota;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
	document.getElementById("id_provinsi").value = res[0];
	document.getElementById("provinsi").value = res[1];
}

function ajaxkec(id){
	var res=id.split("-");//it Works :D
    ajaxku = buatajax();
    var url="<?php echo site_url('irj/rjcregistrasi/data_kecamatan'); ?>";
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
    var url="<?php echo site_url('irj/rjcregistrasi/data_kelurahan'); ?>";
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
function stateChangedKota(){
    var data;
    if (ajaxku.readyState==4){
    data=ajaxku.responseText;
    if(data.length>=0){
		document.getElementById("kota").innerHTML = data;
		document.getElementById("kec").innerHTML = "<option selected value=\"\">Pilih Kecamatan</option>";
		document.getElementById("kel").innerHTML = "<option selected value=\"\">Pilih Kel/Desa</option>";
    }else{
    document.getElementById("kota").value = "<option selected value=\"\">Pilih Kota/Kab</option>";
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
    document.getElementById("kec").value = "<option selected value=\"\">Pilih Kecamatan</option>";
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
    document.getElementById("kel").value = "<option selected value=\"\">Pilih Kelurahan/Desa</option>";
    }
    }
}
jQuery(document).ready(function () {
        jQuery('#date_picker').datepicker({
			format: "yyyy-mm-dd",
			endDate: '0',
			autoclose: true,
			todayHighlight: true,
        });  
            
    });
	
function cek_nokartu(no_medrec){
    ajaxku = buatajax();
    var url="<?php echo site_url('irj/rjcwebservice/check_no_kartu'); ?>";
    url=url+"/"+no_medrec;
    ajaxku.onreadystatechange=stateChangedSEP;
    ajaxku.open("GET",url,true);
    ajaxku.send(null);
}	
	
function stateChangedSEP(){
    var data;
    if (ajaxku.readyState==4){
    data=ajaxku.responseText;
		if(data.length>=0){
			document.getElementById("data_anggota").innerHTML = data;
			$('#data_webservice').modal('show');
		}else{
			document.getElementById("data_anggota").innerHTML = "Data Tidak Ditemukan";
		}
    }
}
	
</script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
	include('rjvnav.php');
?>
<div class="content-wrapper">
	<div class="container-fluid">
	<section class="content-header">
	<!--
		<div class="row">
			<div class="col-md-12">
			  <div class="box box-info box-solid">
				<div class="box-header with-border">
				  Data Berhasil
				  <div class="box-tools pull-right">
					<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				  </div>
				</div>
			  </div>
			</div>
		</div>
	-->
	
				<div class="panel panel-primary">
					<div class="panel-heading" align="center">PENCARIAN DATA</div>
					<div class="panel-body">
						<br/>
							<ul class="nav nav-tabs">
							  <li><a href="#pane_cari_no_cm" data-toggle="tab">No CM</a></li>
							  <li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
								  lain-lain <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
								  <li><a href="#pane_cari_no_kartu" data-toggle="tab">No Kartu</a></li>
								  <li><a href="#pane_cari_no_identitas" data-toggle="tab">No Identitas</a></li>
								</ul>
							  </li>
							</ul>
								<br/>
							<div id="myTabContent" class="tab-content">
								<div class="tab-pane fade active in"  id="pane_cari_no_cm">
								<div class="col-md-6 col-md-offset-3">
									<?php echo form_open('irj/rjcregistrasi/index2');?>
									<div class="input-group">
										<input type="search" class="auto_search_by_nocm form-control" id="cari_no_cm" name="cari_no_cm" placeholder="Pencarian No CM">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-primary" type="button">Cari</button>
										</span>
									</div>
									<?php echo form_close();?>
								</div>
								</div>
								<div class="tab-pane fade" id="pane_cari_no_kartu">
								<div class="col-md-6 col-md-offset-3">
									<?php echo form_open('irj/rjcregistrasi/index2');?>
									<div class="input-group">
										<input type="search" style="width:450" class="auto_search_by_nokartu form-control" id="cari_no_kartu" name="cari_no_kartu" placeholder="Pencarian No Kartu">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-primary" type="button">Cari</button>
										</span>
									</div>
									<?php echo form_close();?>
								</div>
								</div>
								<div class="tab-pane fade" id="pane_cari_no_identitas">
								<div class="col-md-6 col-md-offset-3">
									<?php echo form_open('irj/rjcregistrasi/index2');?>
									<div class="input-group">
										<input type="search" style="width:450" class="auto_search_by_noidentitas form-control" id="cari_no_identitas" name="cari_no_identitas" placeholder="Pencarian No Identitas">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-primary" type="button">Cari</button>
										</span>
									</div>
									<?php echo form_close();?>
								</div>
								</div>
							</div>
					</div>
				</div>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-md-6">
				<div class="panel panel-info">
					<div class="panel-heading" align="center" style="background-color:#00C0C5;color:#ffffff">BIODATA</div>
					<div class="panel-body" style="background-color:#BAD8FF;">
						<br>
							<?php
							// print_r($data_pasien);
								foreach($data_pasien as $row){
								$no_medrec=$row->no_medrec;
							?>
							<div class="form-group row">
								<div class="col-sm-12">
									<center><img height="100px" class="img-rounded pull-left" src="<?php echo base_url("asset/upload/photo/".$row->foto);?>">
								</div>
							</div>
								
							<?php echo form_open_multipart('irj/rjcregistrasi/update_data_pasien');?>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="no_cm">No CM</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="<?php echo $row->no_medrec;?>" name="no_cm" readonly>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="tgl_daftar">Tanggal Daftar</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="<?php echo $row->tgl_daftar;?>" name="tgl_daftar" readonly>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="sex">Jenis Kelamin</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<?php 
													if($row->sex=='L'){
														echo '<input type="radio" name="sex" value="L" checked required>&nbsp;Laki-Laki&nbsp;&nbsp;&nbsp;
														<input type="radio" name="sex" value="P">&nbsp;Perempuan';
													}else{
														echo '<input type="radio" name="sex" value="L" required>&nbsp;Laki-Laki&nbsp;&nbsp;&nbsp;
														<input type="radio" name="sex" value="P" checked>&nbsp;Perempuan';
													}
												?>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="nama">Nama Lengkap</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="<?php echo $row->nama;?>" name="nama" required>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="jenis_identitas">Pilih Identitas</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select class="form-control" name="jenis_identitas" required>
													<option value="">-Pilih Identitas-</option>
													<option <?php if($row->jenis_identitas=='KTP') echo 'selected';?> value="KTP">KTP</option>
													<option <?php if($row->jenis_identitas=='SIM') echo 'selected';?> value="SIM">SIM</option>
													<option <?php if($row->jenis_identitas=='PASPOR') echo 'selected';?> value="PASPOR">Paspor</option>
													<option <?php if($row->jenis_identitas=='KTM') echo 'selected';?> value="KTM">KTM</option>
													<option <?php if($row->jenis_identitas=='NIP') echo 'selected';?> value="NIP">NIP</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="no_identitas">No. Identitas</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="<?php echo $row->no_identitas;?>" name="no_identitas" required>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="jenis_kartu">Pilih Kartu</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select class="form-control" name="jenis_kartu">
													<option value="">-Pilih Kartu-</option>
													<option <?php if($row->jenis_kartu=='BPJS') echo 'selected';?> value="BPJS">BPJS</option>
													<option <?php if($row->jenis_kartu=='ASKES') echo 'selected';?> value="ASKES">ASKES</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="no_kartu">No. Kartu</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="<?php echo $row->no_kartu;?>" name="no_kartu">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="tmpt_lahir">Tempat Lahir</p>
									<div class="col-sm-8">
										<input type="text" class="form-control"  value="<?php echo $row->tmpt_lahir;?>" name="tmpt_lahir" required>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="tgl_lahir">Tanggal Lahir</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" id="date_picker" value="<?php echo $row->tgl_lahir;?>" name="tgl_lahir" required>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="agama">Agama</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select class="form-control" name="agama">
													<option value="">-Pilih Agama-</option>
													<option <?php if($row->agama=='ISLAM') echo 'selected';?> value="ISLAM">Islam</option>
													<option <?php if($row->agama=='KATOLIK') echo 'selected';?> value="KATOLIK">Katolik</option>
													<option <?php if($row->agama=='PROTESTAN') echo 'selected';?> value="PROTESTAN">Protestan</option>
													<option <?php if($row->agama=='BUDHA') echo 'selected';?> value="BUDHA">Budha</option>
													<option <?php if($row->agama=='HINDU') echo 'selected';?> value="HINDU">Hindu</option>
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
												<?php 
													if($row->status=='B'){
														echo '<input type="radio" name="status" value="B" checked required>&nbsp;Belum Kawin&nbsp;&nbsp;&nbsp;
														<input type="radio" name="status" value="K">&nbsp;Sudah Kawin';
													}else{
														echo '<input type="radio" name="status" value="B" required>&nbsp;Belum Kawin&nbsp;&nbsp;&nbsp;
														<input type="radio" name="status" value="K" checked>&nbsp;Sudah Kawin';
													}
												?>
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
												<option <?php if($row->goldarah=='A') echo 'selected';?> value="A">A</option>
												<option <?php if($row->goldarah=='B') echo 'selected';?> value="B">B</option>
												<option <?php if($row->goldarah=='AB') echo 'selected';?> value="AB">AB</option>
												<option <?php if($row->goldarah=='O') echo 'selected';?> value="O">O</option>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="wnegara">Kewarganegaraan</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<select class="form-control" name="wnegara">
												<?php if($row->wnegara=='WNI'){
													echo '<option value="WNI" selected>WNI</option><option value="WNA">WNA</option>';
												}else{
													echo '<option value="WNI">WNI</option><option value="WNA" selected>WNA</option>';
												}
												?>
											</select>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="alamat">Alamat</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="<?php echo $row->alamat;?>" name="alamat">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="rt_rw">RT - RW</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<input type="text" size="4" class="form-control" value="<?php echo $row->rt;?>" name="rt"> - 
											<input type="text" size="4" class="form-control" value="<?php echo $row->rw;?>" name="rw">
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
													foreach($prop as $row1){
														echo '<option '; if($row->id_provinsi==$row1->id) echo 'selected '; echo 'value="'.$row1->id.'-'.$row1->nama.'">'.$row1->nama.'</option>';
													}
													?>
												</select>
												<input type="hidden" class="form-control" id="provinsi" placeholder="" value="<?php echo $row->provinsi;?>" name="provinsi">
												<input type="hidden" class="form-control" id="id_provinsi" placeholder="" value="<?php echo $row->id_provinsi;?>" name="id_provinsi">
											
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
													<?php 
													echo '<option value="'.$row->id_kotakabupaten.'-'.$row->kotakabupaten.'">'.$row->kotakabupaten.'</option>';?>
													<option value="">-Pilih Kota/Kabupaten-</option>
												</select>
												<input type="hidden" class="form-control" id="kotakabupaten" value="<?php echo $row->kotakabupaten;?>" name="kotakabupaten">
												<input type="hidden" class="form-control" id="id_kotakabupaten" value="<?php echo $row->id_kotakabupaten;?>" placeholder="" name="id_kotakabupaten">
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
													<?php echo '<option value="'.$row->id_kecamatan.'-'.$row->kecamatan.'">'.$row->kecamatan.'</option>';?>
													<option value="">-Pilih Kecamatan-</option>
												</select>
												<input type="hidden" class="form-control" id="kecamatan" value="<?php echo $row->kecamatan;?>" name="kecamatan">
												<input type="hidden" class="form-control" id="id_kecamatan" value="<?php echo $row->id_kecamatan;?>" placeholder="" name="id_kecamatan">
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
													<?php echo '<option value="'.$row->id_kelurahandesa.'-'.$row->kelurahandesa.'">'.$row->kelurahandesa.'</option>';?>
													<option value="">-Pilih Kelurahan/Desa-</option>
												</select>
												<input type="hidden" class="form-control" id="kelurahandesa" value="<?php echo $row->kelurahandesa;?>" name="kelurahandesa">
												<input type="hidden" class="form-control" id="id_kelurahandesa" value="<?php echo $row->id_kelurahandesa;?>" placeholder="" name="id_kelurahandesa">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="kodepos">Kode Pos</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="<?php echo $row->kodepos;?>" name="kodepos">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="pendidikan">Pendidikan</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select class="form-control" name="pendidikan">
													<option value="">-Pilih Pendidikan Terakhir-</option>
													<option <?php if($row->pendidikan=='SD') echo 'selected';?> value="SD">SD</option>
													<option <?php if($row->pendidikan=='SMP') echo 'selected';?> value="SMP">SMP</option>
													<option <?php if($row->pendidikan=='SMA') echo 'selected';?> value="SMA">SMA</option>
													<option <?php if($row->pendidikan=='S1') echo 'selected';?> value="S1">S1</option>
													<option <?php if($row->pendidikan=='S2') echo 'selected';?> value="S2">S2</option>
													<option <?php if($row->pendidikan=='S3') echo 'selected';?> value="S3">S3</option>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="pekerjaan">Pekerjaan</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="<?php echo $row->pekerjaan;?>" name="pekerjaan">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="no_telp">No. Telp</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="<?php echo $row->no_telp;?>" maxlength="12" name="no_telp">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="no_hp">No. HP</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="<?php echo $row->no_hp;?>" maxlength="12" name="no_hp">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="no_telp_kantor">No. Telp Kantor</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="<?php echo $row->no_telp_kantor;?>" maxlength="12" name="no_telp_kantor">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="email">Email</p>
									<div class="col-sm-8">
										<input type="email" class="form-control" value="<?php echo $row->email;?>" name="email">
									</div>
								</div>
								<!--
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="bahasa">Bahasa</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="" name="bahasa">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="sukubangsa">Suku Bangsa</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="" name="sukubangsa">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="nama_ayah_suami">Nama Ayah/Suami</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="" name="nm_ayah_suami">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="pekerjaan_ayah_suami">Pekerjaan Ayah/Suami</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="" name="pekerjaan_ayah_suami">
									</div>
								</div>
								-->
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="nama_ibu_istri">Nama Ibu Kandung</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="<?php echo $row->nm_ibu_istri;?>" name="nm_ibu_istri">
									</div>
								</div>
								<!--
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="pekerjaan_ibu_istri">Pekerjaan Ibu/Istri</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="" name="pekerjaan_ibu_istri">
									</div>
								</div>
								-->
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="kartusdhdicetak">Kartu Sudah Dicetak</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select class="form-control" name="kartusdhdicetak">
													<?php if($row->kartusdhdicetak=='0'){
													echo '<option value=0 selected>Belum</option><option value="1">Sudah</option>';
												}else{
													echo '<option value="0">Belum</option><option value="1" selected>Sudah</option>';
												}
												?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<!-- --->
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="foto">Update Foto</p>
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
					<div class="panel-heading" align="center" style="background-color:#529BC5;color:#ffffff">DAFTAR ULANG PASIEN IRJ</div>
					<div class="panel-body" style="background-color:#bad8e9;">
						<br>
							<?php echo form_open('irj/rjcregistrasi/insert_daftar_ulang'); ?>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="jns_kunj">Jenis Kunjungan</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<input type="hidden" class="form-control" value="<?php echo $no_medrec;?>" readonly name="no_medrec">
												<input type="radio" name="jns_kunj" value="LAMA" checked>&nbsp;Lama
												&nbsp;&nbsp;&nbsp;
												<input type="radio" name="jns_kunj" value="BARU">&nbsp;Baru
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
								<!----------------- ---->
									<p class="col-sm-4 form-control-label" id="cara_kunj">Cara Kunjungan</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select id="prop" class="form-control" name="cara_kunj" required>
													<option value="">-Pilih Cara Kunjungan-</option>
													<?php 
													foreach($cara_berkunjung as $row){
														echo '<option value="'.$row->cara_kunj.'">'.$row->cara_kunj.'</option>';
													}
													?>
												</select>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="asal_rujukan">Asal Rujukan</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="asal_rujukan">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="no_rujukan">No. SJP/Rujukan</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="no_rujukan">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="kelas_pasien">Kelas Pasien</p>
									<div class="col-sm-8">
										<select class="form-control" name="kelas_pasien" required>
											<option value="">-Pilih Kelas-</option>
											<option value="I">I</option>
											<option value="II">II</option>
											<option value="III">III</option>
											<option value="VIP">VIP</option>
										</select>
									
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="dirujuk_ke">Dirujuk Ke</p>
									<div class="col-sm-8">
											<input type="search" class="auto_search_poli form-control" id="nm_poli" placeholder="Nama Poli" required>
										<div class="form-inline">
											ID Poli : <input type="text" size="8" class="form-control" placeholder="" id="id_poli" readonly name="id_poli">
											Ruang : <input type="text" size="8" class="form-control" placeholder="" id="kd_ruang" readonly name="kd_ruang">
										</div>
									</div>
								</div>
								<div class="form-group row">
								<!----------------- ---->
									<p class="col-sm-4 form-control-label" id="lbl_cara_bayar">Cara Bayar</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select id="prop" class="form-control" name="val_cara_bayar" onchange="pilih_cara_bayar(this.value)" required>
													<option value="">-Pilih Cara Bayar-</option>
													<?php
													foreach($cara_bayar as $row){
														echo '<option value="'.$row->cara_bayar.'-'.$row->biayadaftar.'">'.$row->cara_bayar.'</option>';
													}
													?>
												</select>
												<input type="hidden" class="form-control" placeholder="" id="cara_bayar" name="cara_bayar">
											</div>
										</div>
									</div>
								</div>
								<div class="form-group row" id="input_kontraktor">
									<p class="col-sm-4 form-control-label" id="lbl_input_kontraktor">Kontraktor</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" id="id_kontraktor" name="id_kontraktor">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="lbl_biayadaftar">Biaya Daftar</p>
									<div class="col-sm-8">
										<input type="number" min=0 class="form-control" placeholder="" id="biayadaftar" name="biayadaftar">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="nama_penjamin">Nama Penjamin</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="nama_penjamin">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="hubungan">Hubungan</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" placeholder="" name="hubungan">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="vtot">Total</p>
									<div class="col-sm-8">
										<input type="number" min=0 class="form-control" placeholder="" name="vtot">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="no_sep">No SEP</p>
									<div class="col-sm-8">
										<div class="form-inline">
											&nbsp;&nbsp;<a href="#" class="btn btn-danger" onclick="cek_nokartu('<?php echo $no_medrec;?>')">Buat SEP</a>
											<input type="text" class="form-control" placeholder="" name="no_sep" readonly>
										</div>
									</div>
								</div>
								<div class="form-inline" align="center">
									<div class="form-group">
										<button type="reset" class="btn btn-primary">Reset</button>
										<a href="#" class="btn btn-primary">Cetak Kartu Poli</a>
										<button type="submit" class="btn btn-primary">Cetak Karcis</button>
									</div>
								</div>
							<?php echo form_close();
							}
							?>
					</div>
					<!--- end panel body--->
				</div><!--- end panel --->
			</div><!--- end col --->
		</div><!--- end row --->
	</section>
	</div><!--- end container --->
<!--- Modal Web Service --->
<div class="modal fade" id="data_webservice" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Data</h4>
      </div>
      <div class="modal-body">
			<div id="data_anggota"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>	
<!--- Modal --->
	
	
</div><!-- content-wrapper -->
<?php
	foot();
?>
</div><!-- wrapper -->
</body>
</html>