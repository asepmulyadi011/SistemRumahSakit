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
	var site = "<?php echo site_url();?>";
        jQuery(function(){
            jQuery('.auto_search_tindakan').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/irj/rjcautocomplete/data_tindakan/<?php echo $kelas_pasien;?>',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#idtindakan').val(''+suggestion.idtindakan);
                    $('#nmtindakan').val(''+suggestion.nmtindakan);
                    $('#biaya_poli').val(''+suggestion.total_tarif);
                }
            });
        });
		jQuery(function(){
            jQuery('.auto_search_operator').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/irj/rjcautocomplete/data_operator',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#id_dokter').val(''+suggestion.id_dokter);
                    $('#nm_dokter').val(''+suggestion.nm_dokter);
                }
            });
        });
		

function data_edit(param0,param1,param2,param3,param4,param5,param6,param7,param8){
	document.getElementById("idtindakan2").value = param0;
	document.getElementById("nmtindakan2").value = param1;
	document.getElementById("id_dokter2").value = param2;
	document.getElementById("nm_dokter2").value = param3;
	document.getElementById("biaya_poli2").value = param4;
	document.getElementById("qtyind2").value = param5;
	document.getElementById("dijamin2").value = param6;
	document.getElementById("vtot2").value = param7;
	document.getElementById("id_pelayanan_poli2").value = param8;
}
	jQuery(function(){
            jQuery('.auto_search_tindakan2').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/irj/rjcautocomplete/data_tindakan/<?php echo $kelas_pasien;?>',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#idtindakan2').val(''+suggestion.idtindakan);
                    $('#nmtindakan2').val(''+suggestion.nmtindakan);
                    $('#biaya_poli2').val(''+suggestion.total_tarif);
                }
            });
        });
		jQuery(function(){
            jQuery('.auto_search_operator2').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/irj/rjcautocomplete/data_operator',
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
	include('rjvnav.php');
?>
<div class="content-wrapper">
	<div class="container-fluid">
		<?php include('rjvdatapasien.php');?>
		<section class="content">
			<div class="row">
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading" align="center">
							<ul class="nav nav-pills nav-justified">
							  <li role="presentation" class="active"><a href="<?php echo site_url('irj/rjcpelayanan/pelayanan_tindakan/'.$id_poli.'/'.$no_register);?>">Tindakan</a></li>
							  <li role="presentation"><a href="<?php echo site_url('irj/rjcpelayanan/pelayanan_diagnosa/'.$id_poli.'/'.$no_register);?>">Diagnosa</a></li>
							  <li role="presentation"><a href="<?php echo site_url('irj/rjcpelayanan/pelayanan_resep/'.$id_poli.'/'.$no_register);?>">Resep</a></li>
							  <li role="presentation"><a href="<?php echo site_url('irj/rjcpelayanan/rad_lab/'.$id_poli.'/'.$no_register);?>">Radiologi dan Lab</a></li>
							</ul>
						</div>
						<div class="panel-body" style="display:block;overflow:auto;">
						<br/>
							<!-- form -->
							<div class="well" style="background-color:#BAD8FF;">
							<?php echo form_open('irj/rjcpelayanan/insert_tindakan'); ?>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="tindakan">Tindakan</p>
										<div class="col-sm-10">
											<div class="form-inline">
												<input type="search" style="width:100%" class="auto_search_tindakan form-control" placeholder="" id="nmtindakan" name="nmtindakan" required>
												<input type="text" class="form-control" class="form-control" readonly placeholder="ID Tindakan" id="idtindakan"  name="idtindakan">
											</div>
										</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="operator">Operator</p>
										<div class="col-sm-10">
											<div class="form-inline">
												<input type="search" style="width:100%" class="auto_search_operator form-control" placeholder="" id="nm_dokter" name="nm_dokter" required>
												<input type="text" class="form-control" placeholder="ID Dokter" id="id_dokter" readonly name="id_dokter" >
											</div>
										</div>
								</div>
								
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="lbl_biaya_poli">Biaya Poli</p>
									<div class="col-sm-10">
										<input type="number" min=0 class="form-control" value="" name="biaya_poli" id="biaya_poli">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="lbl_qtyind">Qtyind</p>
									<div class="col-sm-10">
										<input type="number" class="form-control" value="1" name="qtyind">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="lbl_dijamin">Dijamin</p>
									<div class="col-sm-10">
										<input type="text" class="form-control" value="" name="dijamin">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="lbl_vtot">Total</p>
									<div class="col-sm-10">
										<input type="number" min=0 class="form-control" value="" name="vtot">
									</div>
								</div>
								
								<div class="form-inline" align="right">
									<input type="hidden" class="form-control" value="<?php echo $kelas_pasien;?>" name="id_poli">
									<input type="hidden" class="form-control" value="<?php echo $id_poli;?>" name="id_poli">
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
								  <th>Tindakan</th>
								  <th>Operator</th>
								  <th>Biaya Poli</th>
								  <th>Qtyind</th>
								  <th>Dijamin</th>
								  <th>Total</th>
								  <th>Aksi</th>
								</tr>
							  </thead>
							  <tbody>
								<?php
								// print_r($pasien_daftar);
								$i=1;
									foreach($data_tindakan_pasien as $row){
									$id_pelayanan_poli=$row->id_pelayanan_poli;
									
								?>
									<tr>
										<td><?php echo $i++ ; ?></td>
										<td><?php echo $row->idtindakan.' - '.$row->nmtindakan ; ?></td>
										<td><?php echo $row->nm_dokter.'('.$row->id_dokter.')' ; ?></td>
										<td><?php echo $row->biaya_poli ; ?></td>
										<td><?php echo $row->qtyind ; ?></td>
										<td><?php echo $row->dijamin ; ?></td>
										<td><?php echo $row->vtot ; ?></td>
										<td>
											<!-- Button trigger modal -->
											<?php echo '<a data-toggle="modal" data-id="" title="Add this item" class="open-form-edit btn btn-warning btn-xs" href="#form-edit" onclick="data_edit(\''.$row->idtindakan.'\',\''.$row->nmtindakan.'\',\''.$row->id_dokter.'\',\''.$row->nm_dokter.'\',\''.$row->biaya_poli.'\',\''.$row->qtyind.'\',\''.$row->dijamin.'\',\''.$row->vtot.'\',\''.$row->id_pelayanan_poli.'\')">Edit</a>';?>
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
			</div>
		</section>
	</div>
	<!-- Modal -->
<div class="modal fade" id="form-edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
      </div>
	  
        <?php echo form_open('irj/rjcpelayanan/update_tindakan');?>
      <div class="modal-body">
		  <div style="display:block;overflow:auto;">
								<div class="form-group row">
								<p class="col-sm-2 form-control-label" id="tindakan">Tindakan</p>
										<div class="col-sm-8">
											<div class="form-inline">
												<input type="search" style="width:450px" class="auto_search_tindakan2 form-control" placeholder="" id="nmtindakan2" name="nmtindakan2" required>
												<input type="text" class="form-control" class="form-control" readonly placeholder="ID Tindakan" id="idtindakan2"  name="idtindakan2">
											</div>
										</div>
								</div>
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
									<p class="col-sm-2 form-control-label" id="lbl_biaya_poli">Biaya Poli</p>
									<div class="col-sm-8">
										<input type="number" min=0 class="form-control" value="" name="biaya_poli2" id="biaya_poli2">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="lbl_qtyind">Qtyind</p>
									<div class="col-sm-8">
										<input type="number" class="form-control" value="1" name="qtyind2" id="qtyind2">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="lbl_dijamin">Dijamin</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="" name="dijamin2" id="dijamin2">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="lbl_vtot">Total</p>
									<div class="col-sm-8">
										<input type="number" min=0 class="form-control" value="" name="vtot2" id="vtot2">
									</div>
								</div>
		  </div>
      </div>
      <div class="modal-footer">
		<input type="hidden" class="form-control" value="" name="id_pelayanan_poli2" id="id_pelayanan_poli2">
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

</div><!-- content-wrapper -->
<?php
	foot();
?>
</div><!-- wrapper -->
</body>
</html>

