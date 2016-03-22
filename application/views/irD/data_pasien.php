	<section class="content-header">
		<div class="row">
				<?php
					// print_r($data_pasien);
					foreach($data_pasien_daftar_ulang as $row){
				?>
			<div class="col-sm-4">
				<div class="well">
						<div align="center"><img height="100px" class="img-rounded" src="<?php echo base_url("asset/upload/photo/".$row->foto);?>"></div>
						<ul class="nav">
							<li><div align="left"><b>Nama:</b> <?php echo $row->nama;?></div></li>
							<li><div align="left"><b>No. CM:</b> <?php echo $row->no_medrec;?></div></li>
							<li><div align="left"><b>No. Register:</b> <?php echo $row->no_register;?></div></li>
							<li><div align="left"><b>Umur:</b> <?php echo $row->umurrj;?> Tahun <?php echo $row->ublnrj;?> Bulan <?php echo $row->uharirj;?> Hari</div></li>
							<li><div align="left"><b>Tanggal Kujungan:</b> <?php echo $row->tgl_kunjungan;?></div></li>
						</ul>
						<?php
							}
						?>
				</div>
			</div>
			<div class="col-sm-8">
				<div class="panel panel-danger">
					<div class="panel-heading" align="center" style="background-color:#DD4B39;color:#ffffff">Status Pulang</div>
					<div class="panel-body">
					<br/>
						<?php echo form_open('IRD/IrDPelayanan/update_pulang'); ?>
							<div class="form-group row">
								<p class="col-sm-4 form-control-label" id="tgl_pulang">Tanggal</p>
								<div class="col-sm-8">
									<input type="date" class="form-control" value="" name="tgl_pulang" required>
								</div>
							</div>
							<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="ket_pulang">Pilih Identitas</p>
									<div class="col-sm-8">
										<div class="form-inline">
											<div class="form-group">
												<select class="form-control" name="ket_pulang" required>
													<option value="">-Pilih Ket Pulang-</option>
													<option value="PULANG">Pulang</option>
													<option value="DIRUJUK_RAWATJALAN">Dirujuk Rawat Jalan</option>
													<option value="DIRUJUK_RAWATINAP">Dirujuk Rawat Inap</option>
												</select>
											</div>
										</div>
									</div>
								</div>
							<div class="form-inline" align="right">
								<input type="hidden" class="form-control" value="<?php echo $no_register;?>" name="no_register">
								<div class="form-group">
									<button type="reset" class="btn btn-primary">Reset</button>
									<button type="submit" class="btn btn-primary">Simpan</button>
								</div>
							</div>
						<?php echo form_close();?>
					</div>
				</div>
			</div>
		</div>
	</section>