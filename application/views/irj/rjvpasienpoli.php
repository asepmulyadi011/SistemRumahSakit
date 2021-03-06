<?php
	include('rjvheader.php');
	include('rjvfooter.php');
	
?>
<html>
<?php
	head();
?>
<script type='text/javascript'>
	jQuery.noConflict();//it Works :D harus semua file pake jquery
	jQuery(document).ready(function () {
        jQuery('#date_picker').datepicker({
			format: "yyyy-mm-dd",
			endDate: '0',
			autoclose: true,
			todayHighlight: true,
        });  
            
    });
</script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
	include('rjvnav.php');
?>
<div class="content-wrapper">
	<div class="container-fluid">
		<section class="content-header">
			<?php
				echo $this->session->flashdata('message_rujuk'); 
			?>
			<legend><?php echo $nm_poli.' ('.$id_poli.')';?></legend>
				<div class="panel panel-primary">
					<div class="panel-heading" align="center">PENCARIAN DATA</div><br/>
					<div class="panel-body">
						<div class="form-inline">
							<?php echo form_open('irj/rjcpelayanan/kunj_pasien_poli_by_date');?>
							  <div class="col-lg-6">
								<div class="input-group">
								  <input type="text" id="date_picker" class="form-control" placeholder="Tanggal Kunjungan" name="date" required>
								  <input type="hidden" class="form-control" name="id_poli" value="<?php echo $id_poli;?>">
								  <span class="input-group-btn">
									<button class="btn btn-primary" type="submit">Cari</button>
								  </span>
								</div><!-- /input-group -->
							  </div><!-- /.col-lg-6 -->
							<?php echo form_close();?>
							<?php echo form_open('irj/rjcpelayanan/kunj_pasien_poli_by_no');?>
							  <div class="col-lg-6">
								<div class="input-group pull-right">
									<div class="form-inline">
										<select class="form-control" name="based">
											<option value="no_cm">No CM</option>
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
							  <th>Kelas</th>
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
								  <td><?php echo $row->kelas_pasien;?></td>
								  <td>
										<a href="<?php echo site_url('irj/rjcpelayanan/pelayanan_tindakan/'.$id_poli.'/'.$no_register); ?>" class="btn btn-primary btn-xs">Tindak</a>
								  </td>
								  <td>
										<a href="<?php echo site_url('irj/rjcpelayanan/pelayanan_batal/'.$id_poli.'/'.$no_register); ?>" class="btn btn-danger btn-xs">Batal</a>
								  </td>
								</tr>
							<?php
								}
							?>
							</tbody>
						</table>
						</div><!-- style overflow -->
						<?php
							echo $this->session->flashdata('message_nodata'); 
						?>
					</div><!--- end panel body --->
				</div><!--- end panel --->
				</div><!--- end panel --->
			</section>
	</div><!--- end container --->
</div><!-- content-wrapper -->
<?php
	foot();
?>
</div><!-- wrapper -->
</body>
</html>