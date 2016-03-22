<div class="wrapper">
	<div class="content-wrapper">
		
		<!-- Keterangan page -->
		<section class="content-header">
			<h1>PASIEN DALAM PERAWATAN</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="#">Pasien</a></li>
			</ol>
		</section>
		<!-- /Keterangan page -->

        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-sm-12">
					
					<!-- Table -->
					<div class="box box-success">
						<br/>
						<div class="box-body">
							<table id="dataTables-example" class="table table-bordered table-striped data-table">
								<thead>
									<tr>
										<th>Tgl. Masuk</th>
										<th>No. Register</th>
										<th>Nama</th>
										<th>Kelas</th>
										<th>No. Bed</th>
										<th>Penjamin</th>
										<th>Dokter Yang Merawat</th>
										<th>LOS</th>
										<th>Total Biaya</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>
					<!-- /Table -->
					
				</div>
			</div>
		</section>
		<!-- /Main content -->
		
	</div>
</div>
<script>
	$(document).ready(function() {
		var dataTable = $('#dataTables-example').DataTable( {
			"processing": true,
			"serverSide": true,
			"bPaginate": true,
			"bLengthChange": true,
			"bFilter": true,
			"bSort": true,
			"bInfo": true,
			"bAutoWidth": true,
			"ajax":{
				url :"<?php echo site_url('iri/ricpasien/get_pasien_iri'); ?>",
				type: "post",
				error: function(){
					$(".employee-grid-error").html("");
					$("#dataTables-example").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#employee-grid_processing").css("display","none");
				}
			}
		});
		$('<button type="button" id="filter" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>').appendTo('div.dataTables_filter');
		$("div.dataTables_filter input").unbind();
		$('#filter').click(function(e){
			var value = $('.dataTables_filter input').val();
			dataTable.columns(0).search(value).draw();
		});
	});
	
	// $(document).ready(function() {
		// var dataTable = $('#dataTables-example').DataTable( {
			// "ajax":{
				// url :"<?php echo site_url('iri/ricpasien/get_pasien_iri'); ?>", // json datasource
				// type: "post",
				// error: function(){
					// $(".employee-grid-error").html("");
					// $("#dataTables-example").append('<tbody class="employee-grid-error"><tr><th colspan="3">Tidak ada data</th></tr></tbody>');
					// $("#employee-grid_processing").css("display","none");
				// }
			// }
		// });
	// });
	
	$('#calendar-tgl').datepicker();
</script>
