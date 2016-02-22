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
			<?php echo $this->session->flashdata('pesan_rencana_masuk');?>
			<h3 class="page-header page-title-big">RENCANA MASUK</h3>
		</div>
	</div>
	<!-- /Title -->
	
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
	
	<!-- /Distance -->
	<div class="page-distance"></div>
	<!-- /Distance -->
	
</div>
