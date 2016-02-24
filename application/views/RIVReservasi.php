<div class="wrapper">
	<div class="content-wrapper">
		
		<!-- Keterangan page -->
		<section class="content-header">
			<h1>RESERVASI ANTRIAN PASIEN RAWAT INAP</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
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
							<li class="<?php echo $tab_reservasi; ?>"><a href="#reservasi" data-toggle="tab">Reservasi</a></li>
							<li class="<?php echo $tab_rencana_masuk; ?>"><a href="#rencana-masuk" data-toggle="tab">Rencana Masuk</a></li>
							<li class="<?php echo $tab_belum_approve; ?>"><a href="#belum-approve" data-toggle="tab">Belum Approve</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane <?php echo $tab_reservasi; ?>" id="reservasi">
								
								<!-- Reservasi -->
								<form class="form-horizontal" action="<?php echo site_url('RICReservasi/insert_reservasi'); ?>" method="POST">
									<div class="row">
										<div class="col-sm-6 form-left">
											<div class="box-body">
												<div class="form-group">
													<div class="col-sm-3 control-label">Asal</div>
													<div class="col-sm-4">
														<select class="form-control input-sm" name="asal">
															<option value="baru" <?php echo $st_asal1; ?>>Baru</option>
															<option value="rawat_jalan" <?php echo $st_asal2; ?>>Rawat Jalan</option>
															<option value="rawat_darurat" <?php echo $st_asal3; ?>>Rawat Darurat</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">No. Antrian</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" name="no_antrian" value="<?php echo $no_antrian; ?>">
														<font color="red"><?php echo form_error('no_antrian'); ?></font>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Rujukan</div>
													<div class="col-sm-4">
														<select class="form-control input-sm" name="rujukan">
															<option value="rujukan" <?php echo $st_rujukan1; ?>>Rujukan</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">No. CM</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" name="no_cm" value="<?php echo $no_cm; ?>">
														<font color="red"><?php echo form_error('no_cm'); ?></font>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Reg. Asal</div>
													<div class="col-sm-9" align="left">
														<div class="col-sm-3 input-left"><input type="text" class="form-control input-sm" name="kode_reg_asal" value="<?php echo $kode_reg_asal; ?>"></div>
														<div class="col-sm-9 input-right"><input type="text" class="form-control input-sm" name="name_reg_asal" value="<?php echo $name_reg_asal; ?>" readonly></div>
														<font color="red"><?php echo form_error('kode_reg_asal'); ?></font>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Jenis Kelamin</div>
													<div class="col-sm-4">
														<select class="form-control input-sm" name="jenis_kelamin">
															<option value="laki-laki" <?php echo $st_jenis_kelamin1; ?>>Laki-Laki</option>
															<option value="perempuan" <?php echo $st_jenis_kelamin2; ?>>Perempuan</option>
														</select>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Tanggal Lahir</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" id="calendar-tgl-lahir" name="tanggal_lahir" value="<?php echo $tanggal_lahir; ?>">
														<font color="red"><?php echo form_error('tanggal_lahir'); ?></font>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Telp</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" name="telp" value="<?php echo $telp; ?>">
														<font color="red"><?php echo form_error('telp'); ?></font>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">HP</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" name="hp" value="<?php echo $hp; ?>">
														<font color="red"><?php echo form_error('hp'); ?></font>
													</div>
												</div>
											</div>
										</div>
										<div class="col-sm-6">
											<div class="box-body">
												<h4 class="title-form">ASAL PASIEN</h4>
												<div class="form-group">
													<div class="col-sm-3 control-label">Reg. Asal</div>
													<div class="col-sm-9" align="left">
														<div class="col-sm-3 input-left"><input type="text" class="form-control input-sm" readonly></div>
														<div class="col-sm-9 input-right"><input type="text" class="form-control input-sm" readonly></div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Dokter</div>
													<div class="col-sm-9" align="left">
														<div class="col-sm-3 input-left"><input type="text" class="form-control input-sm" readonly></div>
														<div class="col-sm-9 input-right"><input type="text" class="form-control input-sm" readonly></div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Diagnosa</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" readonly>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-8">
											<div class="button-reservasi">
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-reservasi">Simpan</button>
											</div>							
										</div>
									</div>
									
									<!-- Modal -->
									<div class="modal fade bs-example-modal-sm" id="modal-reservasi" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
												</div>
												<div class="modal-body">
													Apakah kamu yakin dengan data tersebut?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tidak</button>
													<button type="submit" class="btn btn-primary btn-sm">Ya</button>
												</div>
											</div>
										</div>
									</div>
									<!-- /Modal -->
									
								</form>
								<!-- /Reservasi -->
								
							</div>
							<div class="tab-pane <?php echo $tab_rencana_masuk; ?>" id="rencana-masuk">
								
								<!-- Rencana Masuk -->
								<form class="form-horizontal" action="<?php echo site_url('RICReservasi/insert_rencana_masuk'); ?>" method="POST">
									<div class="row">
										<div class="col-sm-8">
											<div class="box-body">
												<div class="form-group">
													<div class="col-sm-3 control-label">Rencana Masuk</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" name="rencana_masuk" value="<?php echo $rencana_masuk; ?>">
														<font color="red"><?php echo form_error('rencana_masuk'); ?></font>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Tgl. SP. Rawat</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" id="calendar-tgl-sp-rawat" name="tgl_sp_rawat" value="<?php echo $tgl_sp_rawat; ?>">
														<font color="red"><?php echo form_error('tgl_sp_rawat'); ?></font>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Ruang Pilih</div>
													<div class="col-sm-9" align="left">
														<div class="col-sm-3 input-left"><input type="text" class="form-control input-sm" name="kode_ruang_pilih" value="<?php echo $kode_ruang_pilih; ?>"></div>
														<div class="col-sm-9 input-right"><input type="text" class="form-control input-sm" name="name_ruang_pilih" value="<?php echo $name_ruang_pilih; ?>" readonly></div>
														<font color="red"><?php echo form_error('kode_ruang_pilih'); ?></font>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Kelas</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" name="kelas" value="<?php echo $kelas; ?>">
														<font color="red"><?php echo form_error('kelas'); ?></font>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Prioritas</div>
													<div class="col-sm-2">
														<select class="form-control input-sm" name="prioritas">
															<option value="1" <?php echo $st_prioritas1; ?>>1</option>
															<option value="2" <?php echo $st_prioritas2; ?>>2</option>
															<option value="3" <?php echo $st_prioritas3; ?>>3</option>
														</select>
													</div>
													<div class="col-sm-7">
														<input type="checkbox" value="ya" name="infeksi"> Infeksi
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-3 control-label">Keterangan</div>
													<div class="col-sm-9">
														<input type="text" class="form-control input-sm" name="keterangan" value="<?php echo $keterangan; ?>">
														<font color="red"><?php echo form_error('keterangan'); ?></font>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-8">
											<div class="button-reservasi">
												<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-rencana-masuk">Simpan</button>
											</div>							
										</div>
									</div>
									
									<!-- Modal -->
									<div class="modal fade bs-example-modal-sm" id="modal-rencana-masuk" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
										<div class="modal-dialog modal-sm">
											<div class="modal-content">
												<div class="modal-header">
													<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
													<h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
												</div>
												<div class="modal-body">
													Apakah kamu yakin dengan data tersebut?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tidak</button>
													<button type="submit" class="btn btn-primary btn-sm">Ya</button>
												</div>
											</div>
										</div>
									</div>
									<!-- /Modal -->
								
								</form>
								<!-- /Rencana Masuk -->
								
							</div>
							<div class="tab-pane <?php echo $tab_belum_approve; ?>" id="belum-approve">
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
	$('#calendar-tgl-lahir').datepicker();
	$('#calendar-tgl-sp-rawat').datepicker();
</script>
