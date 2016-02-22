<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	
	<!-- Menu -->
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Status</li>
		</ol>
	</div>
	<!-- /Menu -->
	
	<!-- Title -->
	<div class="row">
		<div class="col-lg-8">
			<h3 class="page-header page-title-big">STATUS PASIEN DI RUANGAN</h3>
		</div>
	</div>
	<!-- /Title -->
	
	<!-- Content -->
	<div class="row grid-content">
			
		<!-- Form -->
		<div class="col-md-9">
			<div class="row form-input">
				<div class="col-md-3 name-form">Cari Nomor IPD</div>
				<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Cari Nomor IPD"></div>
			</div>
			<div class="row form-input">
				<div class="col-md-3 name-form">No. Register</div>
				<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="No. Register"></div>
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
				<div class="col-md-3 name-form">Jatah Kelas</div>
				<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Jatah Kelas"></div>
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
				<div class="col-md-3 name-form">SMF</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-3"><input type="text" class="form-control input-sm" placeholder="Kode" ></div>
						<div class="col-md-9 form-right"><input type="text" class="form-control input-sm" placeholder="Nama" readonly ></div>
					</div>
				</div>
			</div>
			<div class="row form-input">
				<div class="col-md-3 name-form">Dr. Yang Merawat</div>
				<div class="col-md-9">
					<div class="row">
						<div class="col-md-3"><input type="text" class="form-control input-sm" placeholder="Kode" ></div>
						<div class="col-md-9 form-right"><input type="text" class="form-control input-sm" placeholder="Nama" readonly ></div>
					</div>
				</div>
			</div>
			<div class="row form-input">
				<div class="col-md-3 name-form">Anamnesa</div>
				<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="Anamnesa"></div>
			</div>
			<div class="row form-input">
				<div class="col-md-3 name-form">Tanggal</div>
				<div class="col-md-9"><input type="text" class="form-control input-sm" id="calendar-tanggal" placeholder="03/18/2013"></div>
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
				<div class="col-md-9">
					<select class="form-control input-sm">
						<option>A</option>
						<option>B</option>
						<option>O</option>
						<option>AB</option>
					</select>
				</div>
			</div>
			<div class="row form-input">
				<div class="col-md-3 name-form">No. IPD Ibu</div>
				<div class="col-md-9"><input type="text" class="form-control input-sm" placeholder="No. IPD Ibu"></div>
			</div>
		</div>
		<!-- /Pencarian -->
		
	</div>
	<!-- /Content -->
	
	<!-- Tabs -->
	<div class="row grid-content content-tabs">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body tabs">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#ruang-rawat" data-toggle="tab">Ruang Rawat</a></li>
						<li><a href="#dokter-rawat-bersama" data-toggle="tab">Dokter Rawat Bersama</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade in active" id="ruang-rawat">
							<!-- Table -->
							<div class="col-md-12">
								<table data-toggle="table" data-url="<?php echo base_url('plugin/tables/data2.json'); ?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
									<thead>
									<tr>
										<th data-field="id" data-sortable="true">ID</th>
										<th data-field="name"  data-sortable="true">Nama Ruang</th>
										<th data-field="price" data-sortable="true">Kelas</th>
										<th data-field="price" data-sortable="true">Bed</th>
										<th data-field="price" data-sortable="true">Waktu Masuk</th>
										<th data-field="price" data-sortable="true">Status</th>
										<th data-field="name" data-sortable="true">Waktu Keluar</th>
										<th data-field="name" data-sortable="true">Status</th>
										<th data-field="name" data-sortable="true">Hrawat</th>
									</tr>
									</thead>
								</table>		
							</div>
							<!-- /Table -->
						</div>
						<div class="tab-pane fade" id="dokter-rawat-bersama">
							<h4>Tab 1</h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eget rutrum purus. Donec hendrerit ante ac metus sagittis elementum. Mauris feugiat nisl sit amet neque luctus, a tincidunt odio auctor. </p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /Tabs -->
	
	<!-- Tabs -->
	<div class="row grid-content content-tabs">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body tabs">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#diagnosa" data-toggle="tab">Diagnosa</a></li>
						<li><a href="#pemeriksaan-fisik" data-toggle="tab">Pemeriksaan Fisik</a></li>
						<li><a href="#gizi" data-toggle="tab">Gizi</a></li>
						<li><a href="#icmp-tindakan" data-toggle="tab">ICPM Tindakan</a></li>
						<li><a href="#icd9cm-tindakan" data-toggle="tab">ICD9CM Tindakan</a></li>
						<li><a href="#infeksi-nosokomial" data-toggle="tab">Infeksi Nosokomial</a></li>
						<li><a href="#obat" data-toggle="tab">Obat</a></li>
						<li><a href="#lab" data-toggle="tab">Lab</a></li>
						<li><a href="#radiologi" data-toggle="tab">Radiologi</a></li>
						<li><a href="#pa" data-toggle="tab">PA</a></li>
						<li><a href="#rm" data-toggle="tab">RM</a></li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane fade in active" id="diagnosa">
							<!-- Table -->
							<div class="col-md-12">
								<table data-toggle="table" data-url="<?php echo base_url('plugin/tables/data2.json'); ?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
									<thead>
									<tr>
										<th data-field="id" data-sortable="true">ID</th>
										<th data-field="name"  data-sortable="true">Nama Ruang</th>
										<th data-field="price" data-sortable="true">Kelas</th>
										<th data-field="price" data-sortable="true">Bed</th>
										<th data-field="price" data-sortable="true">Waktu Masuk</th>
										<th data-field="price" data-sortable="true">Status</th>
										<th data-field="name" data-sortable="true">Waktu Keluar</th>
										<th data-field="name" data-sortable="true">Status</th>
										<th data-field="name" data-sortable="true">Hrawat</th>
									</tr>
									</thead>
								</table>		
							</div>
							<!-- /Table -->
						</div>
						<div class="tab-pane fade" id="pemeriksaan-fisik">
							<h4>Tab 1</h4>
						</div>
						<div class="tab-pane fade" id="gizi">
							<h4>Tab 2</h4>
						</div>
						<div class="tab-pane fade" id="icmp-tindakan">
							<h4>Tab 3</h4>
						</div>
						<div class="tab-pane fade" id="icd9cm-tindakan">
							<h4>Tab 4</h4>
						</div>
						<div class="tab-pane fade" id="infeksi-nosokomial">
							<h4>Tab 5</h4>
						</div>
						<div class="tab-pane fade" id="obat">
							<h4>Tab 6</h4>
						</div>
						<div class="tab-pane fade" id="lab">
							<h4>Tab 7</h4>
						</div>
						<div class="tab-pane fade" id="radiologi">
							<h4>Tab 8</h4>
						</div>
						<div class="tab-pane fade" id="pa">
							<h4>Tab 9</h4>
						</div>
						<div class="tab-pane fade" id="rm">
							<h4>Tab 10</h4>
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
	$('#calendar-tanggal').datepicker({
		
	});
</script>
