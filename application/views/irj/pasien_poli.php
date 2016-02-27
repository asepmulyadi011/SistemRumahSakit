<?php
	include('header.php');
	include('footer.php');
	
?>
<html>
<?php
	head();
?>
<script type='text/javascript'>
	jQuery.noConflict();//it Works :D harus semua file pake jquery
</script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
	include('nav.php');
?>
<div class="content-wrapper">
	<div class="container-fluid">
		<section class="content-header">
			<legend><?php echo $nm_poli.' ('.$id_poli.')';?></legend>
			<!--
				<div class="row">
					<div class="col-md-12">
					  <div class="box box-info box-solid">
						<div class="box-header with-border">
						  <h3 class="box-title">Message</h3>
						  <div class="box-tools pull-right">
							<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
						  </div>
						</div>
					  </div>
					</div>
				</div>
			-->	
				<div class="panel panel-primary">
					<div class="panel-heading" align="center">PENCARIAN DATA</div><br/>
					<div class="panel-body">
						<div class="form-inline">
							<?php echo form_open('IrjPelayanan/kunj_pasien_poli_by_date');?>
							  <div class="col-lg-6">
								<div class="input-group">
								  <input type="date" class="form-control" name="date" required>
								  <input type="hidden" class="form-control" name="id_poli" value="<?php echo $id_poli;?>">
								  <span class="input-group-btn">
									<button class="btn btn-primary" type="submit">Cari</button>
								  </span>
								</div><!-- /input-group -->
							  </div><!-- /.col-lg-6 -->
							<?php echo form_close();?>
							<?php echo form_open('IrjPelayanan/kunj_pasien_poli_by_no');?>
							  <div class="col-lg-6">
								<div class="input-group">
									<div class="form-inline">
										<select class="form-control" name="based">
											<option value="no_cm">NO CM</option>
											<option value="no_register">No Register</option>
										</select>
										<input type="text" class="form-control" name="key" placeholder="No. CM/ No. Register" required>
										<input type="hidden" class="form-control" name="id_poli" value="<?php echo $id_poli;?>">
										<span class="input-group-btn">
											<button class="btn btn-primary" type="submit">Cari</button>
										</span>
									</div><!-- /input-group -->
								</div><!-- /input-group -->
							  </div><!-- /.col-lg-6 -->
							<?php echo form_close();?>
						</div><!-- /inline -->
					</div><!-- /panel body -->
				</div><!-- /panel -->
			</section>
			<section class="content">
				<div class="row">
						<div class="panel panel-info">
							<div class="panel-heading" align="center" style="background-color:#529BC5;color:#ffffff">DAFTAR ANTRIAN PASIEN POLI</div>
							<div class="panel-body">
								<br/>
						<div style="display:block;overflow:auto;">
						<table class="table table-hover table-striped table-bordered">
						  <thead>
							<tr>
							  <th>No</th>
							  <th>Tanggal Kunjungan</th>
							  <th>No Medrec</th>
							  <th>No Registrasi</th>
							  <th>Nama</th>
							  <th>Bayar</th>
							  <th>Aksi</th>
							</tr>
						  </thead>
						  <tbody>
							
							<?php
							// print_r($pasien_daftar);
							$i=1;
								foreach($pasien_daftar as $row){
								$no_register=$row->no_register;
								
							?>
								<tr>
								  <td><?php echo $i++;?></td>
								  <td><?php echo $row->tgl_kunjungan;?></td>
								  <td><?php echo $row->no_medrec;?></td>
								  <td><?php echo $row->no_register;?></td>
								  <td><?php echo $row->nama;?></td>
								  <td><?php echo $row->vtot;?></td>
								  <td>
										<a href="<?php echo site_url('IrjPelayanan/pelayanan_pasien/'.$id_poli.'/'.$no_register); ?>" class="btn btn-primary btn-xs">Tindak</a>
								  </td>
								  <td>
										<a href="<?php echo site_url('IrjPelayanan/pelayanan_batal/'.$id_poli.'/'.$no_register); ?>" class="btn btn-danger btn-xs">Batal</a>
								  </td>
								</tr>
							<?php
								}
							?>
							</tbody>
						</table>
						</div><!-- style overflow -->
					</div><!--- end panel body --->
				</div><!--- end panel --->
				</div><!--- end panel --->
			</section>
	</div><!--- end container --->
</div><!--- wrap content --->
<?php
	foot();
?>
</div>
</body>
</html>