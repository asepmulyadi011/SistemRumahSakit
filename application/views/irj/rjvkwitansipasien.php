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
		</section>
		<section class="content">
			<div class="row">
				<div class="panel panel-default">
					<div class="panel-heading" align="center">Rekap Tindakan</div>
					<div class="panel-body">
						<br/>
						<div style="display:block;overflow:auto;">
						<?php
							foreach($data_pasien as $row){
						?>
							<table class="table">
							  <tbody>
								<tr>
									<th>No CM</th>
									<td>:</td>
									<td><?php echo $row->no_medrec;?></td>
									<th>Tanggal Kunjungan</th>
									<td>:</td>
									<td><?php echo $row->tgl_kunjungan;?></td>
								</tr>
								<tr>
									<th>No. Register</th>
									<td>:</td>
									<td><?php echo $row->no_register;?></td>
									<th>Kelas Pasien</th>
									<td>:</td>
									<td><?php echo $row->kelas_pasien;?></td>
								</tr>
								<tr>
									<th>Nama Pasien</th>
									<td>:</td>
									<td><?php echo $row->nama;?></td>
									<th>Poli</th>
									<td>:</td>
									<td><?php echo $row->nm_poli.' ('.$row->id_poli.')';?></td>
								</tr>
							  </tbody>
							</table>
						<?php
							}
						?>
							<table class="table table-hover table-striped table-bordered">
							  <thead>
								<tr>
								  <th>No</th>
								  <th>Tindakan</th>
								  <th>Biaya</th>
								</tr>
							  </thead>
							  <tbody>
								
								<?php
								// print_r($pasien_daftar);
								$i=1;
								$vtot=0;
									foreach($data_tindakan as $row){
									$vtot=$vtot+$row->biaya_poli;
								?>
									<tr>
									  <td><?php echo $i++;?></td>
									  <td><?php echo $row->idtindakan.' - '.$row->nmtindakan ;?></td>
									  <td><div class="pull-right"><?php echo "Rp ". number_format( $row->biaya_poli, 2 , ',' , '.' );?></div></td>
									  </td>
									</tr>
								<?php
									}
								?>
									<tr>
									  <th colspan="2">Total</th>
									  <th><div class="pull-right"><?php echo "Rp ". number_format( $vtot, 2 , ',' , '.' );?></div></th>
									</tr>
								</tbody>
							</table>
						</div><!-- style overflow -->
						<?php
							echo $this->session->flashdata('message_no_tindakan'); 
							if($this->session->flashdata('message_no_tindakan')==''){
						?>
							<div class="form-inline" align="right">
								<div class="form-group">
									<a href="<?php echo site_url('irj/rjckwitansi/cetak_kwitansi/'.$no_register);?>" target="_blank"><input type="submit" class="btn btn-primary btn-sm" id="btn_simpan" value="Cetak"></a>
								</div>
							</div>
						<?php
							}
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