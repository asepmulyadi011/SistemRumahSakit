<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<!-- Menu -->
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Daftar</li>
		</ol>
	</div>
	<!-- /Menu -->
	
	<!-- Title -->
	<div class="row">
		<div class="col-lg-12">
			<h3 class="page-header page-title-big">DAFTAR ANTRIAN RESERVASI</h3>
		</div>
	</div>
	
	<!-- Content -->
	<div class="row grid-content">
		<div class="col-md-12">
						
			<!-- Table -->
			<table data-toggle="table" data-url="<?php echo base_url('plugin/tables/data1.json'); ?>"  data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
				<thead>
				<tr>
					<th data-field="id" data-sortable="true">No. Antri</th>
					<th data-field="name"  data-sortable="true">No. CM</th>
					<th data-field="price" data-sortable="true">Nama</th>
					<th data-field="price" data-sortable="true">HP</th>
					<th data-field="price" data-sortable="true">Prioritas</th>
					<th data-field="price" data-sortable="true">Ren. Masuk</th>
					<th data-field="action" data-sortable="true">Action</th>
				</tr>
				</thead>
			</table>
			<!-- /Table -->
			
		</div>
	</div>
	<!-- /Content -->
	
	<!-- /Distance -->
	<div class="page-distance"></div>
	<!-- /Distance -->
	
</div>
