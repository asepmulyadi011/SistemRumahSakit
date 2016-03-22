	<script>
	jQuery(document).ready(function () {
        jQuery('#date_picker').datepicker({
			format: "yyyy-mm-dd",
			endDate: '0',
			autoclose: true,
			todayHighlight: true,
        }); 
		jQuery('#dirujuk_rj_ke_poli').hide();
    });
	function pilih_ket_pulang(ket_plg){
		if(ket_plg=='DIRUJUK_RAWATJALAN'){
			jQuery('#dirujuk_rj_ke_poli').show();
			document.getElementById("btn_simpan").value = 'Cetak Karcis';
		}else{
			jQuery('#dirujuk_rj_ke_poli').hide();
			document.getElementById("btn_simpan").value = 'Simpan';
		}
	}

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
	</script>
	<section class="content-header">
		<div class="row">
				<?php
					// print_r($data_pasien);
					foreach($data_pasien_daftar_ulang as $row){
				?>
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading" align="center">Data Pasien</div>
					<div class="panel-body"><br/>
				<div class="row">
					<div class="col-sm-3">
						<div align="center"><img height="100px" class="img-rounded" src="<?php echo base_url("asset/upload/photo/".$row->foto);?>"></div>
					</div>
					<div class="col-sm-9">
						<table class="table-sm table-striped" style="font-size:15">
						  <tbody>
							<tr>
								<th>Nama</th>
								<td>:</td>
								<td><?php echo $row->nama;?></td>
							</tr>
							<tr>
								<th>No. CM</th>
								<td>:</td>
								<td><?php echo $row->no_medrec;?></td>
							</tr>
							<tr>
								<th>No. Register</th>
								<td>:</td>
								<td><?php echo $row->no_register;?></td>
							</tr>
							<tr>
								<th>Umur</th>
								<td>:</td>
								<td><?php echo $row->umurrj.' Tahun '.$row->ublnrj.' Bulan '.$row->uharirj.' Hari';?></td>
							</tr>
							<tr>
								<th>Gol Darah</th>
								<td>:</td>
								<td><?php echo $row->goldarah;?></td>
							</tr>
							<tr>
								<th>Tanggal Kujungan</th>
								<td>:</td>
								<td><?php echo $row->tgl_kunjungan;?></td>
							</tr>
						  </tbody>
						</table>
					</div>
				</div>
					<br/>
			</div>
			</div>
			</div>
			<?php
				}
			?>
			<div class="col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading" align="center">Status Pulang</div>
					<div class="panel-body">
					<br/>
						<?php echo form_open('irj/rjcpelayanan/update_pulang'); ?>
							<div class="form-group row">
								<p class="col-sm-4 form-control-label" id="tgl_pulang">Tanggal</p>
								<div class="col-sm-8">
									<input type="text" id="date_picker" class="form-control input-sm" value="" name="tgl_pulang" required>
								</div>
							</div>
							<div class="form-group row">
								<p class="col-sm-4 form-control-label" id="lbl_ket_pulang">Pilih Identitas</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select class="form-control input-sm" name="ket_pulang" id="ket_pulang" onchange="pilih_ket_pulang(this.value)" required>
													<option value="">-Pilih Ket Pulang-</option>
													<option value="PULANG">Pulang</option>
													<option value="DIRUJUK_RAWATJALAN">Dirujuk Rawat Jalan</option>
													<option value="DIRUJUK_RAWATINAP">Dirujuk Rawat Inap</option>
												</select>
											</div>
										</div>
									</div>
							</div>
							<div class="form-group row" id="dirujuk_rj_ke_poli">
								<p class="col-sm-4 form-control-label label-sm" id="dirujuk_ke"></p>
									<div class="col-sm-8">
											Dirujuk Ke:
											<input type="search" style="width:300px" class="auto_search_poli form-control input-sm" id="nm_poli" placeholder="Nama Poli">
										<div class="form-inline">
											ID Poli : <input type="text" size="8" class="form-control input-sm" placeholder="" id="id_poli" readonly name="id_poli_rujuk">
											Ruang : <input type="text" size="8" class="form-control input-sm" placeholder="" id="kd_ruang" readonly name="kd_ruang_rujuk">
										</div>
									</div>
							</div>
							<div class="form-inline" align="right">
								<input type="hidden" class="form-control" value="<?php echo $id_poli;?>" name="id_poli">
								<input type="hidden" class="form-control" value="<?php echo $no_register;?>" name="no_register">
								<div class="form-group">
									<button type="reset" class="btn btn-default btn-sm">Reset</button>
									<input type="submit" class="btn btn-primary btn-sm" id="btn_simpan" value="Simpan">
								</div>
							</div>
						<?php echo form_close();?>
					</div>
				</div>
			</div>
		</div>
	</section>