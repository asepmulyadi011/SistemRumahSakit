<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	
	<!-- Menu -->
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Pasien</li>
		</ol>
	</div>
	<!-- /Menu -->
	
	<!-- Title -->
	<div class="row">
		<div class="col-lg-8">
			<h3 class="page-header page-title-big">DATA PASIEN</h3>
		</div>
	</div>
	<!-- /Title -->
	
	<!-- Content -->
	<div class="row grid-content">
		
		<!-- Pencarian -->
		<div class="col-md-9">
			<div class="row form-input">
				<div class="col-md-3 name-form">Tanggal</div>
				<div class="col-md-9"><input type="text" class="form-control input-sm" id="calendar-tanggal" placeholder="03/18/2013"></div>
			</div>
			<div class="row form-input">
				<div class="col-md-3 name-form">Kode</div>
				<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Kode"></div>
			</div>
			<div class="row form-input">
				<div class="col-md-3 name-form">No. Register</div>
				<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="No. Register"></div>
			</div>
			<div class="row form-input">
				<div class="col-md-3 name-form">Ruangan</div>
				<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Ruangan"></div>
			</div>
		</div>
		<!-- /Pencarian -->
		
		<!-- Button -->
		<div class="col-md-9 grid-button-top">
			<div class="form-inline">
				<button type="button" class="btn btn-warning btn-sm">Tombol Penting</button>
				<button type="button" class="btn btn-primary btn-sm">Cari</button>
				<button type="button" class="btn btn-primary btn-sm">Batal</button>
				<button type="button" class="btn btn-danger btn-sm">Keluar</button>
			</div>
		</div>
		<!-- /Button -->

	</div>
	<!-- /Content -->
	
	<!-- Title -->
	<div class="row">
		<div class="col-lg-8">
			<h3 class="page-header page-title-big">PASIEN DALAM PERAWATAN</h3>
		</div>
	</div>
	<!-- /Title -->
	
	<!-- Content -->
	<div class="row grid-content">
		
		<!-- Form -->
		<div class="col-md-9">
			<div class="row form-input">
				<div class="col-md-3 name-form">Tanggal</div>
				<div class="col-md-9"><input type="text" class="form-control input-sm" id="calendar-tanggal" placeholder="03/18/2013"></div>
			</div>
			<div class="row form-input">
				<div class="col-md-3 name-form">Kode</div>
				<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Kode"></div>
			</div>
			<div class="row form-input">
				<div class="col-md-3 name-form">No. Register</div>
				<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="No. Register"></div>
			</div>
			<div class="row form-input">
				<div class="col-md-3 name-form">Ruangan</div>
				<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Ruangan"></div>
			</div>
		</div>
		<!-- /Form -->
		
		<!-- Button -->
		<div class="col-md-9 grid-button-top">
			<div class="form-inline">
				<button type="button" class="btn btn-primary btn-sm">Mutasi Ruangan</button>
				<button type="button" class="btn btn-primary btn-sm">Rekalkulasi</button>
				<button type="button" class="btn btn-primary btn-sm">Slip Tindakan</button>
				<button type="button" class="btn btn-primary btn-sm">Slip Dari Ruang Lain</button>
				<button type="button" class="btn btn-primary btn-sm">Rekap Pelayanan</button>
			</div>
		</div>
		<!-- /Button -->
		
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
