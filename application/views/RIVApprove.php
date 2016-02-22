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
			<?php echo $this->session->flashdata('pesan_belum_approve');?>
			<h3 class="page-header page-title-big">BELUM APPROVE</h3>
		</div>
	</div>
	<!-- /Title -->
	
	<!-- Content -->
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
	<!-- /Content -->
	
	<!-- /Distance -->
	<div class="page-distance"></div>
	<!-- /Distance -->
	
</div>
