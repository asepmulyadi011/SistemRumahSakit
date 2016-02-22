<!-- Content -->
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<!-- Menu -->
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Pendaftaran</li>
		</ol>
	</div>
	<!-- /Menu -->
	
	<!-- Title -->
	<div class="row">
		<div class="col-lg-8">
			<?php echo $this->session->flashdata('pesan_pendaftaran');?>
			<h3 class="page-header page-title-big">PENDAFTARAN RAWAT INAP</h3>
		</div>
	</div>
	
	<!-- Content -->
	<div class="row grid-content">
		<form action="<?php echo site_url('CPendaftaran/insert_pendaftaran'); ?>">
		
			<!-- Button -->
			<div class="col-md-9 grid-button-top">
				<div class="form-inline">
					<button type="button" class="btn btn-primary btn-sm">Daftar Baru</button>
					<button type="button" class="btn btn-primary btn-sm">Cetak Identitas Pasien</button>
					<button type="button" class="btn btn-primary btn-sm">Cetak RM1</button>
					<button type="button" class="btn btn-warning btn-sm">Cetak Gelang Pasien</button>
					<button type="button" class="btn btn-warning btn-sm">Cetak Label Barcode</button>
				</div>
			</div>
			<!-- /Button -->
			
			<!-- Form -->
			<div class="col-md-9">
				<div class="row form-input">
					<div class="col-md-3 name-form">No. Reg. IRJ/IRD</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="No. Reg. IRJ/IRD"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">No. CM</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="No. CM"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">Tgl. Daftar</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" id="calendar-tgl-daftar" placeholder="03/18/2013"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">Cara Bayar</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Cara Bayar"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">SMF</div>
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-3"><input type="text" class="form-control input-sm" placeholder="Kode" ></div>
							<div class="col-md-9 form-right"><input type="text" class="form-control input-sm" placeholder="Nama" readonly ></div>
						</div>
					</div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">Cara Masuk</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Cara Masuk"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">Dokter</div>
					<div class="col-md-9">
						<div class="row">
							<div class="col-md-3"><input type="text" class="form-control input-sm" placeholder="Kode" ></div>
							<div class="col-md-9 form-right"><input type="text" class="form-control input-sm" placeholder="Nama" readonly ></div>
						</div>
					</div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">No. Register IPD</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="No. Register IPD"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">No. Reg. Lama</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="No. Reg. Lama"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">Nama</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Nama"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">Tgl. Lahir</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" id="calendar-tgl-lahir" placeholder="03/18/2013"></div>
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
					<div class="col-md-3 name-form">Gol. Darah</div>
					<div class="col-md-2">
						<select class="form-control input-sm">
							<option>A</option>
							<option>B</option>
							<option>O</option>
							<option>AB</option>
						</select>
					</div>
				</div>
				<div class="row form-input form-radio">
					<div class="col-md-3 name-form">Bayi Baru Lahir</div>
					<div class="col-md-9 btn-checkbox">
						<div class="form-inline">
							<input type="radio" name="optionsRadios"> Ya
							<input type="radio" name="optionsRadios"> Tidak
						</div>
					</div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">No. Register Ibu</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="No. Register Ibu"></div>
				</div>
			</div>
			<!-- /Form -->

			<!-- Button -->
			<div class="col-md-9 grid-button-bottom">
				<div class="form-inline">
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-pendaftaran">Simpan</button>
					<button type="button" class="btn btn-primary btn-sm">Cari Data Pasien</button>
					<button type="button" class="btn btn-primary btn-sm">Data Sebelumnya</button>
					<button type="button" class="btn btn-primary btn-sm">Data Berikutnya</button>
					<button type="button" class="btn btn-warning btn-sm">Tombol Penting</button>
					<button type="button" class="btn btn-danger btn-sm">Keluar</button>
				</div>
			</div>
			<!-- /Button -->
			
			<!-- Modal -->
			<div class="modal fade bs-example-modal-sm" id="modal-pendaftaran" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
	</div>
	<!-- /Content -->
	
	<!-- Tabs -->
	<div class="row grid-content content-tabs">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body tabs">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#biodata" data-toggle="tab">Biodata</a></li>
						<li><a href="#penanggung-jawab" data-toggle="tab">Penanggung Jawab</a></li>
						<li><a href="#ruangan" data-toggle="tab">Ruangan</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade in active" id="biodata">
							<h4>Tab 1</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget rutrum purus. Donec hendrerit ante ac metus sagittis elementum. Mauris feugiat nisl sit amet neque luctus, a tincidunt odio auctor. </p>
						</div>
						<div class="tab-pane fade" id="penanggung-jawab">
							<h4>Tab 2</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget rutrum purus. Donec hendrerit ante ac metus sagittis elementum. Mauris feugiat nisl sit amet neque luctus, a tincidunt odio auctor. </p>
						</div>
						<div class="tab-pane fade" id="ruangan">
							<div class="row">
								<div class="col-md-9">
									<div class="row form-input">
										<div class="col-md-3 name-form">Ruang</div>
										<div class="col-md-9">
											<div class="row">
												<div class="col-md-3"><input type="text" class="form-control input-sm" placeholder="Kode" ></div>
												<div class="col-md-9 form-right"><input type="text" class="form-control input-sm" placeholder="Nama" readonly ></div>
											</div>
										</div>
									</div>
									<div class="row form-input">
										<div class="col-md-3 name-form">Tanggal Lahir</div>
										<div class="col-md-9 name-form"><input type="text" class="form-control input-sm" id="calendar-tgl-masuk" placeholder="03/18/2013"></div>
									</div>
									<div class="row form-input">
										<div class="col-md-3 name-form">Kelas</div>
										<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Kelas" readonly></div>
									</div>
									<div class="row form-input">
										<div class="col-md-3 name-form">Bed</div>
										<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Bed" readonly></div>
									</div>
									<div class="row form-input">
										<div class="col-md-3 name-form">Status</div>
										<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Status" readonly></div>
									</div>
									<div class="row form-input">
										<div class="col-md-3 name-form"></div>
										<div class="col-md-9"><button type="button" class="btn btn-primary btn-sm">Antrian Reservasi</button></div>
									</div>
								</div>
								<div class="col-md-3"></div>
							</div>
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
<!-- /Content -->
<script>
	$('#calendar-tgl-daftar').datepicker({
		
	});
	$('#calendar-tgl-lahir').datepicker({
		
	});
	$('#calendar-tgl-masuk').datepicker({
		
	});
</script>
