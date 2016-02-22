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
			
			<!-- Form -->
			<div class="row grid-content">
				<div class="col-md-6 grid-left-daftar">
					<div class="row form-input">
						<div class="col-md-4 name-form">Ruangan</div>
						<div class="col-md-8">
							<div class="row">
								<div class="col-xs-6 col-md-4"><input type="text" class="form-control input-sm" placeholder="Kode"></div>
								<div class="col-xs-12 col-sm-6 col-md-8 form-right"><input type="text" class="form-control input-sm" placeholder="Nama" readonly ></div>
							</div>
						</div>
					</div>
					<div class="row form-input">
						<div class="col-md-4 name-form">Kelas</div>
						<div class="col-md-8"><input type="text" class="form-control input-sm" placeholder="Kelas"></div>
					</div>
				</div>
				<div class="col-md-6 grid-left"></div>
			</div>
			<!-- /Form -->
			
			<!-- Table -->
			<div class="dataTable_wrapper">
				<table class="table table-bordered table-striped table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th>id</th>
							<th>nama</th>
						</tr>
					</thead>
					<tbody>   
					</tbody>
				</table>
			</div>
			<!-- /Table -->
			
		</div>
	</div>
	<!-- /Content -->
</div>
<script>
	$(document).ready(function(){
		var dataTable = $('#dataTables-example').DataTable({
			"processing": true,
			"serverSide": true,
			"ajax":{
				url :"<?php echo site_url('CDaftar/table/')?>", // json datasource
				type: "post",
				error: function(){  // error handling
					$(".employee-grid-error").html("");
					$("#dataTables-example").append('<tbody class="employee-grid-error"><tr><th colspan="3">Tidak Ada Data</th></tr></tbody>');
					$("#employee-grid_processing").css("display","none");
				}
			}
		} );	
    });
</script>
