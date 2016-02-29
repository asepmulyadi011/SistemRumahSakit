<script>
var site = "<?php echo site_url(); ?>";
$(function(){
	$('.auto-ruang').autocomplete({
		serviceUrl: site+'/iri/ricreservasi/data_ruang',
		onSelect: function (suggestion) {
			$('#kode-ruang-pilih').val(''+suggestion.idrg);
			$('#nama-ruang-pilih').val(''+suggestion.nmruang);
		}
	});
});

var site = "<?php echo site_url(); ?>";
$(function(){
	$('.auto-no-cm-rawat-jalan').autocomplete({
		serviceUrl: site+'/iri/ricreservasi/data_pasien_irj',
		onSelect: function (suggestion) {
			$('#kode-reg').val(''+suggestion.no_reg);
			$('#name-reg').val(''+suggestion.nama);
			$('.tanggal-lahir').val(''+suggestion.tanggal_lahir);
			if(suggestion.jenis_kelamin=='L'){
				$('#laki-laki').attr('selected', 'selected');
				$('#perempuan').removeAttr('selected', 'selected');
			}else{
				$('#laki-laki').removeAttr('selected', 'selected');
				$('#perempuan').attr('selected', 'selected');
			}
			$('#telp').val(''+suggestion.telp);
			$('#hp').val(''+suggestion.hp);
			$('#kode-reg-asal').val(''+suggestion.no_reg);
			$('#name-reg-asal').val(''+suggestion.nama);
			$('#kode-dokter').val(''+suggestion.kode_dok);
			$('#name-dokter').val(''+suggestion.nama_dok);
			$('#diagnosa').val(''+suggestion.diagnosa);
		}
	});
});

var site = "<?php echo site_url(); ?>";
$(function(){
	$('.auto-no-cm-rawat-darurat').autocomplete({
		serviceUrl: site+'/iri/ricreservasi/data_pasien_ird',
		onSelect: function (suggestion) {
			$('#kode-reg').val(''+suggestion.no_reg);
			$('#name-reg').val(''+suggestion.nama);
			$('.tanggal-lahir').val(''+suggestion.tanggal_lahir);
			if(suggestion.jenis_kelamin=='L'){
				$('#laki-laki').attr('selected', 'selected');
				$('#perempuan').removeAttr('selected', 'selected');
			}else{
				$('#laki-laki').removeAttr('selected', 'selected');
				$('#perempuan').attr('selected', 'selected');
			}
			$('#telp').val(''+suggestion.telp);
			$('#hp').val(''+suggestion.hp);
			$('#kode-reg-asal').val(''+suggestion.no_reg);
			$('#name-reg-asal').val(''+suggestion.nama);
			$('#kode-dokter').val(''+suggestion.kode_dok);
			$('#name-dokter').val(''+suggestion.nama_dok);
			$('#diagnosa').val(''+suggestion.diagnosa);
		}
	});
});

$(function(){
	$('#no-cm-rawat-jalan').show();
	$('#no-cm-ruang-rawat').hide();
	$('#no-cm-rawat-darurat').hide();
});

$(document).ready(function() {
	$('.auto_ruang').autocomplete({
		serviceUrl: site+'/iri/ricreservasi/data_ruang',
		onSelect: function (suggestion) {
			$('#kode-ruang-pilih').val(''+suggestion.idrg);
			$('#nama-ruang-pilih').val(''+suggestion.nmruang);
		}
	});
	
	$("#form-reservasi").validate({ 
		rules: { 
			no_cm: "required",
			name_reg: "required",
			tanggal_lahir: "required",
			telp: "required",
			name_reg_asal: "required",
			name_dokter: "required",
			diagnosa: "required",
			
			rencana_masuk: "required",
			tgl_sp_rawat: "required",
			name_ruang: "required",
			kelas: "required",
			keterangan: "required"
		}
	}); 
	
	$('#pilihan-prioritas').change(function(){
		var kasus = $('#pilihan-prioritas').val();
		if(kasus=='-'){
			$('#normal').attr('selected', 'selected');
			$('#high').removeAttr('selected', 'selected');
		}else{
			$('#normal').removeAttr('selected', 'selected');
			$('#high').attr('selected', 'selected');
		}
	});
	
	$('#asal').change(function(){
		var asal = $('#asal').val();
		if(asal=='rawatjalan'){
			$('#no-cm-rawat-jalan').show();
			$('#no-cm-ruang-rawat').hide();
			$('#no-cm-rawat-darurat').hide();
		}else if(asal=='ruangrawat'){
			$('#no-cm-rawat-jalan').hide();
			$('#no-cm-ruang-rawat').show();
			$('#no-cm-rawat-darurat').hide();
		}else{
			$('#no-cm-rawat-jalan').hide();
			$('#no-cm-ruang-rawat').hide();
			$('#no-cm-rawat-darurat').show();
		}
	});
});
</script>
<div class="wrapper">
	<div class="content-wrapper">
		
		<!-- Keterangan page -->
		<section class="content-header">
			<h1>RESERVASI ANTRIAN PASIEN RAWAT INAP</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="#">Reservasi</a></li>
			</ol>
		</section>
		<!-- /Keterangan page -->
		
        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-sm-12">
					<?php echo $this->session->flashdata('pesan');?>
					
					<!-- Tabs -->
					<div class="nav-tabs-custom">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#reservasi" data-toggle="tab">Reservasi</a></li>
							<li class=""><a href="#approve" data-toggle="tab">Approve</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="reservasi">
								
								<!-- Reservasi -->
								<form class="form-horizontal" action="<?php echo site_url('iri/ricreservasi/insert_reservasi'); ?>" method="POST" id="form-reservasi">
									<div class="row">
										<div class="col-sm-6 form-left">
											<div class="box-body">
												<div class="form-group">
													<div class="col-sm-3 control-label">Asal</div>
													<div class="col-sm-4">
														<select class="form-control input-sm" id="asal" name="asal">
															<option value="rawatjalan">Rawat Jalan</option>
															<option value="ruangrawat">Ruang Rawat</option>
															<option value="rawatdarurat">Rawat Darurat</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">No. Antrian *</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" name="no_reservasi" value="<?php echo $no_reservasi; ?>" readonly>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Rujukan</div>
													<div class="col-sm-4">
														<select class="form-control input-sm" name="rujukan">
															<option value="regional">Regional</option>
															<option value="nasional">Nasional</option>
															<option value="rslain">RS Lain</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">No. CM *</div>
													<div class="col-sm-9">
														<span class="label-form-validation"></span>
														<input type="text" class="form-control input-sm auto-no-cm-rawat-jalan" name="no_cm_rawat_jalan" id="no-cm-rawat-jalan">
														<input type="text" class="form-control input-sm auto-no-cm-ruang-rawat" name="no_cm_ruang_rawat" id="no-cm-ruang-rawat">
														<input type="text" class="form-control input-sm auto-no-cm-rawat-darurat" name="no_cm_rawat_darurat" id="no-cm-rawat-darurat">
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Reg. Asal</div>
													<div class="col-sm-9" align="left">
														<span class="label-form-validation"></span>
														<div class="col-sm-4 input-left"><input type="text" class="form-control input-sm" name="kode_reg" id="kode-reg" readonly></div>
														<div class="col-sm-8 input-right"><input type="text" class="form-control input-sm" name="name_reg" id="name-reg" readonly></div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Jenis Kelamin</div>
													<div class="col-sm-4">
														<select class="form-control input-sm" name="jenis-kelamin">
															<option id="laki-laki" value="L">Laki-Laki</option>
															<option id="perempuan" value="P">Perempuan</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Tanggal Lahir *</div>
													<div class="col-sm-9">
														<span class="label-form-validation"></span>
														<input type="text" class="form-control input-sm tanggal-lahir" id="calendar-tgl-lahir" name="tanggal_lahir">
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Telp *</div>
													<div class="col-sm-9">
														<span class="label-form-validation"></span>
														<input type="text" class="form-control input-sm" name="telp" id="telp">
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">HP</div>
													<div class="col-sm-9">
														<span class="label-form-validation"></span>
														<input type="text" class="form-control input-sm" name="hp" id="hp">
													</div>
												</div>
											</div>
											
											<div class="box-body">
												<h4 class="title-form">ASAL PASIEN</h4>
												<div class="form-group">
													<div class="col-sm-3 control-label">Reg. Asal</div>
													<div class="col-sm-9" align="left">
														<span class="label-form-validation"></span>
														<div class="col-sm-4 input-left"><input type="text" class="form-control input-sm" name="kode_reg_asal" id="kode-reg-asal" readonly></div>
														<div class="col-sm-8 input-right"><input type="text" class="form-control input-sm" name="name_reg_asal" id="name-reg-asal" readonly></div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Dokter</div>
													<div class="col-sm-9" align="left">
														<span class="label-form-validation"></span>
														<div class="col-sm-4 input-left"><input type="text" class="form-control input-sm" name="kode_dokter" id="kode-dokter" readonly></div>
														<div class="col-sm-8 input-right"><input type="text" class="form-control input-sm" name="name_dokter" id="name-dokter" readonly></div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Diagnosa</div>
													<div class="col-sm-9">
														<span class="label-form-validation"></span>
														<input type="text" class="form-control input-sm" name="diagnosa" id="diagnosa" readonly>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="box-body">
												<h4 class="title-form">RENCANA MASUK</h4>
												<div class="form-group">
													<div class="col-sm-3 control-label">Rencana Masuk *</div>
													<div class="col-sm-9">
														<span class="label-form-validation"></span>
														<input type="text" class="form-control input-sm" id="calendar-tgl-rencana-masuk" name="rencana_masuk">
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Tgl. SP. Rawat *</div>
													<div class="col-sm-9">
														<span class="label-form-validation"></span>
														<input type="text" class="form-control input-sm" id="calendar-tgl-sp-rawat" name="tgl_sp_rawat">
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Ruang Pilih *</div>
													<div class="col-sm-9" align="left">
														<span class="label-form-validation"></span>
														<div class="col-sm-3 input-left"><input type="text" class="form-control input-sm auto-ruang" id="kode-ruang-pilih" name="kode_ruang"></div>
														<div class="col-sm-9 input-right"><input type="text" class="form-control input-sm" id="nama-ruang-pilih" name="name_ruang" readonly></div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Kelas *</div>
													<div class="col-sm-2">
														<span class="label-form-validation"></span>
														<select class="form-control input-sm" name="kelas">
															<option value="I">I</option>
															<option value="II">II</option>
															<option value="III">III</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Kasus</div>
													<div class="col-sm-4">
														<select class="form-control input-sm" id="pilihan-prioritas" name="pilihan_prioritas">
															<option value="-">-</option>
															<option value="IRD">Emergency</option>
															<option value="KEMO">Kemoterapi</option>
															<option value="HEMO">Hemodialisa</option>
															<option value="OPERASI">Operasi Terjadwal</option>
															<option value="TALA">Talamesia</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Prioritas</div>
													<div class="col-sm-3">
														<select class="form-control input-sm" name="prioritas">
															<option id="normal" value="normal">Normal</option>
															<option id="high" value="high">High</option>
														</select>
													</div>
													<div class="col-sm-6">
														<input type="checkbox" value="Y" name="infeksi"> Infeksi
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Keterangan *</div>
													<div class="col-sm-9">
														<span class="label-form-validation"></span>
														<input type="text" class="form-control input-sm" name="keterangan" id="keterangan">
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="button-reservasi">
												<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
												<button type="button" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> Batal</button>
											</div>							
										</div>
									</div>
									
									<!-- Modal -->
									<div class="modal fade bs-example-modal-sm" id="modal-reservasi" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
												</div>
												<div class="modal-body">
													Apakah kamu yakin dengan data tersebut?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Tidak</button>
													<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Ya</button>
												</div>
											</div>
										</div>
									</div>
									<!-- /Modal -->
									
								</form>
								<!-- /Reservasi -->
								
							</div>
							<div class="tab-pane" id="approve">
								<div class="row">
									<div class="col-sm-8">
								
										<!-- Rencana Masuk -->
										<div class="form-horizontal">
											<div class="box-body">
												<div class="form-group">
													<div class="col-sm-3 control-label">Tgl. Approve</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" readonly>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Jam Approve</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" readonly>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Bed</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" readonly>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Kelas</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" readonly>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Ruang</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" readonly>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">User Approve</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" readonly>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">No. Register</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" readonly>
													</div>
												</div>
											</div>
											
										</div>
										<!-- /Belum Approve -->
									
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- /Tabs -->
					
				</div>
			</div>
		</section>
		<!-- /Main content -->
		
	</div>
</div>
<script>
	$('#calendar-tgl-lahir').datepicker({
		format: 'yyyy-mm-dd'
	});
	$('#calendar-tgl-sp-rawat').datepicker({
		format: 'yyyy-mm-dd'
	});
	$('#calendar-tgl-rencana-masuk').datepicker({
		format: 'yyyy-mm-dd'
	});
</script>
