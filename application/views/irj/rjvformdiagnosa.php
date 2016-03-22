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
            jQuery('.auto_search_diagnosa').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/irj/rjcautocomplete/data_diagnosa',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#id_diagnosa').val(''+suggestion.id_diagnosa);
                    $('#sub_diagnosa').val(''+suggestion.sub_diagnosa);
                    $('#id_icd10').val(''+suggestion.id_icd10);
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
	document.getElementById("id_icd102").value = param0;
	document.getElementById("sub_diagnosa2").value = param1;
	document.getElementById("id_diagnosa2").value = param2;
	document.getElementById("id_dokter2").value = param3;
	document.getElementById("nm_dokter2").value = param4;
	document.getElementById("tindakan2").value = param5;
	document.getElementById("klasifikasi_diagnos2").value = param6;
	document.getElementById("kasus2").value = param7;
	document.getElementById("id_diagnosa_pasien2").value = param8;
}
	jQuery(function(){
            jQuery('.auto_search_diagnosa2').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/irj/rjcautocomplete/data_diagnosa',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#id_diagnosa2').val(''+suggestion.id_diagnosa);
                    $('#sub_diagnosa2').val(''+suggestion.sub_diagnosa);
                    $('#id_icd102').val(''+suggestion.id_icd10);
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
							  <li role="presentation"><a href="<?php echo site_url('irj/rjcpelayanan/pelayanan_tindakan/'.$id_poli.'/'.$no_register);?>">Tindakan</a></li>
							  <li role="presentation" class="active"><a href="<?php echo site_url('irj/rjcpelayanan/pelayanan_diagnosa/'.$id_poli.'/'.$no_register);?>">Diagnosa</a></li>
							  <li role="presentation"><a href="<?php echo site_url('irj/rjcpelayanan/pelayanan_resep/'.$id_poli.'/'.$no_register);?>">Resep</a></li>
							  <li role="presentation"><a href="<?php echo site_url('irj/rjcpelayanan/rad_lab/'.$id_poli.'/'.$no_register);?>">Radiologi dan Lab</a></li>
							</ul>
						</div>
						<div class="panel-body" style="display:block;overflow:auto;">
							<br/>
							<!-- form -->
							<div class="well" style="background-color:#BAD8FF;">
							<?php echo form_open('irj/rjcpelayanan/insert_diagnosa'); ?>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="lbl_diagnosa">Diagnosa</p>
										<div class="col-sm-10">
											<div class="form-inline">
												<input type="search" style="width:100%" class="auto_search_diagnosa form-control" placeholder="" id="sub_diagnosa" name="sub_diagnosa">
												<input type="text" class="form-control" readonly placeholder="ID Diagnosa" id="id_diagnosa"  name="id_diagnosa" required>
												<input type="text" class="form-control" readonly placeholder="ID ICD" id="id_icd10"  name="id_icd10" required>
											</div>
										</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="operator">Operator</p>
										<div class="col-sm-10">
											<div class="form-inline">
												<input type="search" style="width:100%" class="auto_search_operator form-control" placeholder="" id="nm_dokter" name="nm_dokter" required>
												<input type="text" class="form-control" placeholder="ID Dokter" id="id_dokter" readonly name="id_dokter">
											</div>
										</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="tindakan">Tindakan</p>
									<div class="col-sm-10">
										<input type="text" class="form-control" value="" name="tindakan">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="lbl_klasifikasi_diagnos">Klasifikasi</p>
									<div class="col-sm-10">
										<input type="text" class="form-control" value="" name="klasifikasi_diagnos">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="kasus">Kasus</p>
									<div class="col-sm-10">
										<select class="form-control" name="kasus">
											<option value="LAMA">Lama</option>
											<option value="BARU">Baru</option>
										</select>
									</div>
								</div>
								<div class="form-inline" align="right">
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
								  <th>Diagnosa</th>
								  <th>Operator</th>
								  <th>Tindakan</th>
								  <th>Klasifikasi Diagnosa</th>
								  <th>Kasus</th>
								  <th>Aksi</th>
								</tr>
							  </thead>
							  <tbody>
								<?php
								// print_r($pasien_daftar);
								$i=1;
									foreach($data_diagnosa_pasien as $row){
									$id_diagnosa_pasien=$row->id_diagnosa_pasien;
									
								?>
									<tr>
										<td><?php echo $i++ ; ?></td>
										<td><?php echo $row->id_icd10.' - '.$row->sub_diagnosa.' ('.$row->id_diagnosa.')'; ?></td>
										<td><?php echo $row->nm_dokter.'('.$row->id_dokter.')'; ?></td>
										<td><?php echo $row->tindakan; ?></td>
										<td><?php echo $row->klasifikasi_diagnos; ?></td>
										<td><?php echo $row->kasus; ?></td>
										<td>
											<!-- Button trigger modal -->
											<?php echo '<a data-toggle="modal" data-id="" title="Add this item" class="open-form-edit btn btn-warning btn-xs" href="#form-edit" onclick="data_edit(\''.$row->id_icd10.'\',\''.$row->sub_diagnosa.'\',\''.$row->id_diagnosa.'\',\''.$row->id_dokter.'\',\''.$row->nm_dokter.'\',\''.$row->tindakan.'\',\''.$row->klasifikasi_diagnos.'\',\''.$row->kasus.'\',\''.$row->id_diagnosa_pasien.'\')">Edit</a>';?>
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
	  
        <?php echo form_open('irj/rjcpelayanan/update_diagnosa');?>
      <div class="modal-body">
		  <div style="display:block;overflow:auto;">
								<div class="form-group row">
								<p class="col-sm-2 form-control-label" id="lbl_diagnosa">Diagnosa</p>
										<div class="col-sm-8">
											<div class="form-inline">
												<input type="search" style="width:550px" class="auto_search_diagnosa2 form-control" placeholder="" id="sub_diagnosa2" name="sub_diagnosa2" required>
												<input type="text" class="form-control" class="form-control" readonly placeholder="ID Tindakan" id="id_diagnosa2"  name="id_diagnosa2">
												<input type="text" class="form-control" class="form-control" readonly placeholder="ID ICD" id="id_icd102"  name="id_icd102">
											</div>
										</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="operator">Operator</p>
										<div class="col-sm-8">
											<div class="form-inline">
												<input type="search" style="width:550px" class="auto_search_operator2 form-control" placeholder="" id="nm_dokter2" name="nm_dokter2" required>
												<input type="text" class="form-control" placeholder="ID Dokter" id="id_dokter2" readonly name="id_dokter2" >
											</div>
										</div>
								</div>
								
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="lbl_tindakan">Tindakan</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="" name="tindakan2" id="tindakan2">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="lbl_klasifikasi_diagnos">Klasifikasi Diagnosa</p>
									<div class="col-sm-8">
										<input type="text" class="form-control" value="1" name="klasifikasi_diagnos2" id="klasifikasi_diagnos2">
									</div>
								</div>
								<div class="form-group row">
									<p class="col-sm-2 form-control-label" id="lbl_kasus">kasus</p>
									<div class="col-sm-4">
										<select class="form-control" id="kasus2" name="kasus2">
											<option value="LAMA">Lama</option>
											<option value="BARU">Baru</option>
										</select>
									</div>
								</div>
		  </div>
      </div>
      <div class="modal-footer">
		<input type="hidden" class="form-control" value="" name="id_diagnosa_pasien2" id="id_diagnosa_pasien2">
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