<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	
	<!-- Menu -->
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Reservasi</li>
		</ol>
	</div>
	<!-- /Menu -->
	
	<!-- Title -->
	<div class="row">
		<div class="col-lg-8">
			<?php echo $this->session->flashdata('pesan');?>
			<h3 class="page-header page-title-big">RESERVASI ANTRIAN PASIEN RAWAT INAP</h3>
		</div>
	</div>
	<!-- /Title -->
	
	<!-- Tabs -->
	<div class="row grid-content content-tabs">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body tabs">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#reservasi" data-toggle="tab">Reservasi</a></li>
						<li><a href="#rencana-masuk" data-toggle="tab">Rencana Masuk</a></li>
						<li><a href="#belum-approve" data-toggle="tab">Belum Approve</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade in active" id="reservasi">
							
							<!-- Content -->
							<div class="row">
								
								<!-- Form -->
								<div class="col-md-9">
									
									<!-- Reservasi -->
									<form action="<?php echo site_url('CReservasi/insert_reservasi'); ?>">
										<div class="row form-input">
											<div class="col-md-3 name-form">Asal</div>
											<div class="col-md-9">
												<select class="form-control input-sm" name="asal">
													<option value="Baru" <?php echo $stasal1; ?> >Baru</option>
													<option value="Rawat Jalan" <?php echo $stasal2; ?> >Rawat Jalan</option>
													<option value="Rawat Darurat" <?php echo $stasal3; ?> >Rawat Darurat</option>
												</select>
											</div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">No. Antrian</div>
											<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="No Antrian" value="<?php echo $noantrian; ?>" readonly></div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">Rujukan</div>
											<div class="col-md-9">
												<select class="form-control input-sm" name="rujukan">
													<option value="Rujukan" <?php echo $strujukan1; ?> >Rujukan</option>
												</select>
											</div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">No CM</div>
											<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="No CM"></div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">Reg. Asal</div>
											<div class="col-md-9">
												<div class="row">
													<div class="col-md-3"><input type="text" class="form-control input-sm" placeholder="Kode"></div>
													<div class="col-md-9 form-right"><input type="text" class="form-control input-sm" placeholder="Nama" readonly ></div>
												</div>
											</div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">Jenis Kelamin</div>
											<div class="col-md-9">
												<select class="form-control input-sm">
													<option>Laki-Laki</option>
													<option>Perempuan</option>
												</select>
											</div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">Tanggal Lahir</div>
											<div class="col-md-9 name-form"><input type="text" class="form-control input-sm" id="calendar-tgl-lahir" placeholder="03/18/2013"></div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">Telp</div>
											<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Telp"></div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">HP</div>
											<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="HP"></div>
										</div>
										<div class="row form-input">
											<div class="col-md-3"></div>
											<div class="col-md-9"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-reservasi">Simpan</button></div>
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
														Apakah kamu yakin?
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
									
									<!-- Asal Pasien -->
									<h4 class="page-header page-title">ASAL PASIEN</h4>
									<div class="row form-input">
										<div class="col-md-3 name-form">Poli / Ruang Asal</div>
										<div class="col-md-9">
											<div class="row">
												<div class="col-md-3"><input type="text" class="form-control input-sm" placeholder="Kode" readonly ></div>
												<div class="col-md-9 form-right"><input type="text" class="form-control input-sm" placeholder="Nama" readonly ></div>
											</div>
										</div>
									</div>
									<div class="row form-input">
										<div class="col-md-3 name-form">Dokter</div>
										<div class="col-md-9">
											<div class="row">
												<div class="col-md-3"><input type="text" class="form-control input-sm" placeholder="Kode" readonly ></div>
												<div class="col-md-9 form-right"><input type="text" class="form-control input-sm" placeholder="Nama" readonly ></div>
											</div>
										</div>
									</div>
									<div class="row form-input">
										<div class="col-md-3 name-form">Diagnosa</div>
										<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Diagnosa" readonly ></div>
									</div>
									<!-- /Asal Pasien -->			
								
								</div>
								<!-- /Form -->
								
							</div>
							<!-- /Content -->
							
						</div>
						<div class="tab-pane fade" id="rencana-masuk">
							
							<!-- Content -->
							<div class="row grid-content">
										
								<!-- Form -->
								<div class="col-md-9">
									
									<!-- Rencana Masuk -->
									<form action="<?php echo site_url('CReservasi/insert_rencana_masuk'); ?>">
										<div class="row form-input">
											<div class="col-md-3 name-form">Rencana Masuk</div>
											<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Rencana Masuk" ></div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">Tgl SP. Rawat</div>
											<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Tgl SP. Rawat" ></div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">Ruang Pilih</div>
											<div class="col-md-9">
												<div class="row">
													<div class="col-md-3"><input type="text" class="form-control input-sm" placeholder="Kode" ></div>
													<div class="col-md-9 form-right"><input type="text" class="form-control input-sm" placeholder="Nama" readonly ></div>
												</div>
											</div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">Kelas</div>
											<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Kelas" ></div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">Prioritas</div>
											<div class="col-md-9">
												<div class="row">
													<div class="col-md-6">
														<select class="form-control input-sm">
															<option>Prioritas</option>
														</select>
													</div>
													<div class="col-md-6 form-right"><input type="checkbox"> Infeksi</label></div>
												</div>
											</div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">Keterangan</div>
											<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Keterangan" ></div>
										</div>
										<div class="row form-input">
											<div class="col-md-3"></div>
											<div class="col-md-9"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-rencana-masuk">Simpan</button></div>
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
														Apakah kamu yakin?
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
								<!-- /Form -->
								
							</div>
							<!-- /Content -->
							
						</div>
						<div class="tab-pane fade" id="belum-approve">
							
							<!-- Content -->
							<form action="<?php echo site_url('CReservasi/insert_belum_approve'); ?>">
								<div class="row grid-content">
									
									<!-- Right -->
									<div class="col-md-9">
										
										<!-- Belum Approve -->
										<div class="row form-input">
											<div class="col-md-3 name-form">Tgl Approve</div>
											<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="01/01/2016" readonly ></div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">Jam Approve</div>
											<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="20:00" readonly ></div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">Bed</div>
											<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Bed" ></div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">Kelas</div>
											<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Kelas" ></div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">Ruang</div>
											<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Ruang" ></div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">User Approve</div>
											<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="User Approve" ></div>
										</div>
										<div class="row form-input">
											<div class="col-md-3 name-form">No. Register</div>
											<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="No Register" ></div>
										</div>
										<div class="row form-input">
											<div class="col-md-3"></div>
											<div class="col-md-9"><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-belum-approve">Simpan</button></div>
										</div>
										
										<!-- Modal -->
										<div class="modal fade bs-example-modal-sm" id="modal-belum-approve" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
											<div class="modal-dialog modal-sm">
												<div class="modal-content">
													<div class="modal-header">
														<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
														<h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
													</div>
													<div class="modal-body">
														Apakah kamu yakin?
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Tidak</button>
														<button type="submit" class="btn btn-primary btn-sm">Ya</button>
													</div>
												</div>
											</div>
										</div>
										<!-- /Modal -->
													
									</div>
									<!-- /Right -->
									
								</div>
							</form>
							<!-- /Content -->
							
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Tabs -->
	
	<!-- /Distance -->
	<div class="page-distance"></div>
	<!-- /Distance -->
	
</div>
<script>
	$('#calendar-tgl-lahir').datepicker({
		
	});
</script>
