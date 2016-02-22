<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	
	<!-- Menu -->
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Mutasi</li>
		</ol>
	</div>
	<!-- /Menu -->
	
	<!-- Title -->
	<div class="row">
		<div class="col-lg-8">
			<?php echo $this->session->flashdata('pesan_mutasi');?>
			<h3 class="page-header page-title-big">MUTASI RUANGAN</h3>
		</div>
	</div>
	<!-- /Title -->
	
	<!-- Content -->
	<div class="row grid-content">
		<form action="<?php echo site_url('CMutasi/insert_mutasi'); ?>">
			
			<!-- Form -->
			<div class="col-md-9">
				<div class="row form-input">
					<div class="col-md-3 name-form">Cari No. IPD</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="No. IPD"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">No. Register IPD</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="No. Register IPD"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">No. CM</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="No. CM"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">Penjamin</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Penjamin"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">No. Peserta</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="No. Peserta"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">Ruang</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Ruang"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">Kelas</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Kelas"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">Nama</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Nama"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">Alamat</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Alamat"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">Tanggal</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" id="calendar-tanggal" placeholder="03/18/2013"></div>
				</div>
				<div class="row form-input">
					<div class="col-md-3 name-form">Jatah Kelas</div>
					<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Jatah Kelas"></div>
				</div>
			</div>
			<!-- /Pencarian -->
			
			<!-- Button -->
			<div class="col-md-9 grid-button-top">
				<div class="form-inline">
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-mutasi">Simpan</button>
					<button type="button" class="btn btn-primary btn-sm">Data Pasien</button>
					<button type="button" class="btn btn-primary btn-sm">Data Sebelumnya</button>
					<button type="button" class="btn btn-primary btn-sm">Data Berikutnya</button>
					<button type="button" class="btn btn-warning btn-sm">Tombol Penting</button>
					<button type="button" class="btn btn-danger btn-sm">Keluar</button>
				</div>
			</div>
			<!-- /Button -->
			
			<!-- Modal -->
			<div class="modal fade bs-example-modal-sm" id="modal-mutasi" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
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
	
	<!-- Content -->
	<div class="row grid-content">
		
		<!-- Table -->
		<div class="col-md-12">
			<table data-toggle="table" data-url="<?php echo base_url('plugin/tables/data2.json'); ?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
				<thead>
				<tr>
					<th data-field="id" data-sortable="true">Tgl. Masuk</th>
					<th data-field="name"  data-sortable="true">No. Register</th>
					<th data-field="price" data-sortable="true">Nama</th>
					<th data-field="price" data-sortable="true">Kelas</th>
					<th data-field="price" data-sortable="true">No. Bed</th>
					<th data-field="price" data-sortable="true">Penjamin</th>
					<th data-field="name" data-sortable="true">Kode Dokter</th>
					<th data-field="name" data-sortable="true">Dokter Yang Merawat</th>
					<th data-field="name" data-sortable="true">LOS</th>
					<th data-field="name" data-sortable="true">Total Biaya</th>
					<th data-field="action" data-sortable="true">Action</th>
				</tr>
				</thead>
			</table>		
		</div>
		<!-- /Table -->

	</div>
	<!-- /Content -->
	
	<!-- /Distance -->
	<div class="page-distance"></div>
	<!-- /Distance -->
	
</div>
<script>
	$('#calendar-tanggal').datepicker({
		
	});
</script>
