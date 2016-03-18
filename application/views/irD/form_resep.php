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
		var site = "<?php echo site_url();?>";
		jQuery(function(){
            jQuery('.auto_search_operator').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/IRD/IrDPelayanan/data_operator',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#id_dokter').val(''+suggestion.id_dokter);
                    $('#nm_dokter').val(''+suggestion.nm_dokter);
                }
            });
        });
		
		
function data_edit(param0,param1,param2,param3){
	document.getElementById("id_dokter2").value = param0;
	document.getElementById("nm_dokter2").value = param1;
	document.getElementById("resep2").value = param2;
	document.getElementById("id_resep_irj2").value = param3;
}

		jQuery(function(){
            jQuery('.auto_search_operator2').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/IRD/IrDPelayanan/data_operator',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#id_dokter2').val(''+suggestion.id_dokter);
                    $('#nm_dokter2').val(''+suggestion.nm_dokter);
                }
            });
        });	
		
		
</script>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php
	include('nav.php');
?>
<div class="content-wrapper">
	<div class="container-fluid">
		<?php include('data_pasien.php');?>
		<section class="content">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading" align="center">
							<ul class="nav nav-pills nav-justified">
							  <li role="presentation"><a href="<?php echo site_url('IRD/IrDPelayanan/pelayanan_pasien/'.$no_register);?>">Tindakan</a></li>
							  <li role="presentation"><a href="<?php echo site_url('IRD/IrDPelayanan/pelayanan_diagnosa/'.$no_register);?>">Diagnosa</a></li>
							  <li role="presentation" class="active"><a href="<?php echo site_url('IRD/IrDPelayanan/pelayanan_resep/'.$no_register);?>">Resep</a></li>
							</ul>
						</div>
						<div class="panel-body">
							<div class="well" style="background-color:#BAD8FF;">
							<?php echo form_open('IRD/IrDPelayanan/insert_pelayanan_resep'); ?>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="operator">Operator</p>
										<div class="col-sm-8">
											<div class="form-inline">
												<input type="search" size="50" class="auto_search_operator form-control" placeholder="" id="nm_dokter" name="nm_dokter" required>
												<input type="text" class="form-control" placeholder="ID Dokter" id="id_dokter" readonly name="id_dokter" >
											</div>
										</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-4 form-control-label" id="resep">Resep</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="" name="resep" required>
									</div>
								</div>
								<div class="form-inline" align="right">
									
									<input type="hidden" class="form-control" value="<?php echo $no_register;?>" name="no_register">
									<div class="form-group">
										<button type="reset" class="btn btn-primary">Reset</button>
										<button type="submit" class="btn btn-primary">Simpan</button>
									</div>
								</div>
							<?php echo form_close();?>
							</div>
							
							<!-- table -->
								<br>
							<div style="display:block;overflow:auto;">
							<table class="table table-hover table-striped table-bordered">
							  <thead>
								<tr>
								  <th>No</th>
								  <th>Operator</th>
								  <th>Resep</th>
								  <th>Aksi</th>
								</tr>
							  </thead>
							  <tbody>
								<?php
								// print_r($pasien_daftar);
								$i=1;
									foreach($data_resep_pasien as $row){
									$id_resep_irj=$row->id_resep_irj;
									
								?>
									<tr>
										<td><?php echo $i++ ; ?></td>
										<td><?php echo $row->nm_dokter.'('.$row->id_dokter.')'; ?></td>
										<td><?php echo $row->resep; ?></td>
										<td>
											<!-- Button trigger modal -->
											<?php echo '<a data-toggle="modal" data-id="" title="Add this item" class="open-form-edit btn btn-warning btn-xs" href="#form-edit" onclick="data_edit(\''.$row->id_dokter.'\',\''.$row->nm_dokter.'\',\''.$row->resep.'\',\''.$row->id_resep_irj.'\')">Edit</a>';?>
										</td>
									</tr>
								<?php
									}
								?>
							  </tbody>
							</table>
							</div><!-- style overflow -->
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
	<!-- Modal -->
<div class="modal fade" id="form-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
      </div>
	  
        <?php echo form_open('IRD/IrDPelayanan/update_resep');?>
      <div class="modal-body">
		  <div style="display:block;overflow:auto;">
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="operator">Operator</p>
										<div class="col-sm-8">
											<div class="form-inline">
												<input type="search" style="width:450px" class="auto_search_operator2 form-control" placeholder="" id="nm_dokter2" name="nm_dokter2" required>
												<input type="text" class="form-control" placeholder="ID Dokter" id="id_dokter2" readonly name="id_dokter2" >
											</div>
										</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="lbl_resep">Resep</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="" name="resep2" id="resep2" required>
									</div>
								</div>
		  </div>
      </div>
      <div class="modal-footer">
		<input type="hidden" class="form-control" value="" name="id_resep_irj2" id="id_resep_irj2">
		<input type="hidden" class="form-control" value="<?php echo $id_poli;?>" name="id_poli">
		<input type="hidden" class="form-control" value="<?php echo $no_register;?>" name="no_register">
        <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
        <?php echo form_close();?>
  </div>
</div>
<!-- Modal -->

	
	
<?php
	foot();
?>
</div>
</div>
</body>
</html>