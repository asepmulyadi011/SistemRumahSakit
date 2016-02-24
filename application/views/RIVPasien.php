<div class="wrapper">
	<div class="content-wrapper">
		
		<!-- Keterangan page -->
		<section class="content-header">
			<h1>PASIEN DALAM PERAWATAN</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
				<li><a href="#">Pasien</a></li>
			</ol>
		</section>
		<!-- /Keterangan page -->

        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-sm-12">
					<div class="box box-success">
						<br/>
						
						<!-- Form Pencarian Pasien -->
						<form class="form-horizontal" action="<?php echo site_url('RICPasien'); ?>">
							<div class="box-body">
								<div class="col-sm-8">
									<div class="form-group">
										<div class="col-sm-3 control-label">Tanggal</div>
										<div class="col-sm-9">
											<input type="text" class="form-control input-sm" id="calendar-tgl">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-3 control-label">Kode</div>
										<div class="col-sm-9">
											<input type="text" class="form-control input-sm">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-3 control-label">No. Register</div>
										<div class="col-sm-9">
											<input type="text" class="form-control input-sm">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-3 control-label">Ruangan</div>
										<div class="col-sm-9">
											<input type="text" class="form-control input-sm">
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-3 control-label"></div>
										<div class="col-sm-9">
											<button type="submit" class="btn btn-primary btn-sm" >Cari</button>
										</div>
									</div>
								</div>
							</div>
						</form>
						<!-- /Form Pencarian Pasien -->
						
					</div>
					
					<!-- Table -->
					<div class="box box-success">
						<br/>
						<div class="box-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Rendering engine</th>
										<th>Browser</th>
										<th>Platform(s)</th>
										<th>Engine version</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>Trident</td>
										<td>Internet Explorer 4.0</td>
										<td>Win 95+</td>
										<td>4</td>
										<td><button type="button" class="btn btn-primary btn-sm">Faktur</button></td>
									</tr>
									<tr>
										<td>Trident</td>
										<td>Internet Explorer 5.0</td>
										<td>Win 95+</td>
										<td>5</td>
										<td><button type="button" class="btn btn-primary btn-sm">Faktur</button></td>
									</tr>
									<tr>
										<td>Trident</td>
										<td>Internet Explorer 5.5</td>
										<td>Win 95+</td>
										<td>5.5</td>
										<td><button type="button" class="btn btn-primary btn-sm">Faktur</button></td>
									</tr>
									<tr>
										<td>Trident</td>
										<td>Internet Explorer 6</td>
										<td>Win 98+</td>
										<td>6</td>
										<td><button type="button" class="btn btn-primary btn-sm">Faktur</button></td>
									</tr>
									<tr>
										<td>Trident</td>
										<td>Internet Explorer 7</td>
										<td>Win XP SP2+</td>
										<td>7</td>
										<td><button type="button" class="btn btn-primary btn-sm">Faktur</button></td>
									</tr>
									<tr>
										<td>Trident</td>
										<td>AOL browser (AOL desktop)</td>
										<td>Win XP</td>
										<td>6</td>
										<td><button type="button" class="btn btn-primary btn-sm">Faktur</button></td>
									</tr>
									<tr>
										<td>Gecko</td>
										<td>Firefox 1.0</td>
										<td>Win 98+ / OSX.2+</td>
										<td>1.7</td>
										<td><button type="button" class="btn btn-primary btn-sm">Faktur</button></td>
									</tr>
									<tr>
										<td>Gecko</td>
										<td>Firefox 1.5</td>
										<td>Win 98+ / OSX.2+</td>
										<td>1.8</td>
										<td><button type="button" class="btn btn-primary btn-sm">Faktur</button></td>
									</tr>
									<tr>
										<td>Gecko</td>
										<td>Firefox 2.0</td>
										<td>Win 98+ / OSX.2+</td>
										<td>1.8</td>
										<td><button type="button" class="btn btn-primary btn-sm">Faktur</button></td>
									</tr>
									<tr>
										<td>Gecko</td>
										<td>Firefox 3.0</td>
										<td>Win 2k+ / OSX.3+</td>
										<td>1.9</td>
										<td><button type="button" class="btn btn-primary btn-sm">Faktur</button></td>
									</tr>
									<tr>
										<td>Gecko</td>
										<td>Camino 1.0</td>
										<td>OSX.2+</td>
										<td>1.8</td>
										<td><button type="button" class="btn btn-primary btn-sm">Faktur</button></td>
									</tr>
									<tr>
										<td>Gecko</td>
										<td>Camino 1.5</td>
										<td>OSX.3+</td>
										<td>1.8</td>
										<td><button type="button" class="btn btn-primary btn-sm">Faktur</button></td>
									</tr>
									<tr>
										<td>Gecko</td>
										<td>Netscape 7.2</td>
										<td>Win 95+ / Mac OS 8.6-9.2</td>
										<td>1.7</td>
										<td><button type="button" class="btn btn-primary btn-sm">Faktur</button></td>
									</tr>
									<tr>
										<td>Gecko</td>
										<td>Netscape Browser 8</td>
										<td>Win 98SE+</td>
										<td>1.7</td>
										<td><button type="button" class="btn btn-primary btn-sm">Faktur</button></td>
									</tr>
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
	$(function () {
		$("#example1").DataTable();
	});
	$('#calendar-tgl').datepicker();
</script>
