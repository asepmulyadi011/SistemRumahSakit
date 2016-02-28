<div class="wrapper">
	<div class="content-wrapper">
		
		<!-- Keterangan page -->
		<section class="content-header">
			<h1>PENDAFTARAN RAWAT INAP</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="#">Pendaftaran</a></li>
			</ol>
		</section>
		<!-- /Keterangan page -->

        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-sm-12">
					<?php echo $this->session->flashdata('pesan');?>
					<div class="box box-success">
						<br/>
						
						<!-- Form Pendaftaran -->
						<form class="form-horizontal" action="<?php echo site_url('iri/ricpendaftaran/insert_pendaftaran'); ?>">
							<div class="box-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="box-body">
											<div class="form-group">
												<div class="col-sm-3 control-label">No. Reg. IRJ/IRD</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">No. CM</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">Tgl. Daftar</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm" id="calendar-tgl-daftar">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">Cara Bayar</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">SMF</div>
												<div class="col-sm-9" align="left">
													<div class="col-sm-3 input-left"><input type="text" class="form-control input-sm"></div>
													<div class="col-sm-9 input-right"><input type="text" class="form-control input-sm"></div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">Cara Masuk</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">Dokter</div>
												<div class="col-sm-9" align="left">
													<div class="col-sm-3 input-left"><input type="text" class="form-control input-sm"></div>
													<div class="col-sm-9 input-right"><input type="text" class="form-control input-sm"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6 form-right">
										<div class="box-body">
											<div class="form-group">
												<div class="col-sm-3 control-label">No. Register IPD</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">No. Reg. Lama</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">Nama</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">Tgl. Lahir</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm" id="calendar-tgl-lahir">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">Jenis Kelamin</div>
												<div class="col-sm-4">
													<select class="form-control input-sm">
														<option>Laki-Laki</option>
														<option>Perempuan</option>
													</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">Gol. Darah</div>
												<div class="col-sm-4">
													<select class="form-control input-sm">
														<option>A</option>
														<option>B</option>
														<option>O</option>
														<option>AB</option>
													</select>
												</div>
												<div class="col-sm-5">
													<input type="checkbox" value="Y" name="infeksi"> Bayi Baru Lahir
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">No. Register Ibu</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<!-- Tabs -->
							<div class="nav-tabs-custom">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#biodata" data-toggle="tab">Biodata</a></li>
									<li class=""><a href="#penanggung-jawab" data-toggle="tab">Penanggung Jawab</a></li>
									<li class=""><a href="#ruangan" data-toggle="tab">Ruangan</a></li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="biodata">
									
									</div>
									<div class="tab-pane" id="penanggung-jawab">
									
									</div>
									<div class="tab-pane" id="ruangan">
										<div class="row">
											<div class="col-sm-8">
												<div class="box-body">
													<div class="form-group">
														<div class="col-sm-3 control-label">Ruang</div>
														<div class="col-sm-9" align="left">
															<div class="col-sm-3 input-left"><input type="text" class="form-control input-sm"></div>
															<div class="col-sm-9 input-right"><input type="text" class="form-control input-sm"></div>
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-3 control-label">Tgl. Masuk</div>
														<div class="col-sm-9">
															<input type="text" class="form-control input-sm" id="calendar-tgl-masuk">
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-3 control-label">Kelas</div>
														<div class="col-sm-9">
															<input type="text" class="form-control input-sm">
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-3 control-label">Bed</div>
														<div class="col-sm-9">
															<input type="text" class="form-control input-sm">
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-3 control-label">Status</div>
														<div class="col-sm-9">
															<input type="text" class="form-control input-sm">
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /Tabs -->
							
							<!-- Button -->
							<div class="row">
								<div class="col-sm-8">
									<div class="button-pendaftaran">
										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-pendaftaran"><i class="fa fa-save"></i> Simpan</button>
									</div>							
								</div>
							</div>
							<!-- /Button -->
							
							<!-- Modal -->
							<div class="modal fade bs-example-modal-sm" id="modal-pendaftaran" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
						<!-- /Form Pendaftaran -->
						
					</div>
					
				</div>
			</div>
		</section>
		<!-- /Main content -->
		
	</div>
</div>
<script>
	$('#calendar-tgl-daftar').datepicker();
	$('#calendar-tgl-lahir').datepicker();
	$('#calendar-tgl-masuk').datepicker();
</script>
