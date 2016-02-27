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
            jQuery('.auto_search_poli').autocomplete({
                // serviceUrl berisi URL ke controller/fungsi yang menangani request kita
                serviceUrl: site+'/IrjRegistrasi/data_poli',
                // fungsi ini akan dijalankan ketika user memilih salah satu hasil request
                onSelect: function (suggestion) {
                    $('#nm_poli').val(''+suggestion.nm_poli+' ('+suggestion.id_poli+')');
                    $('#id_poli').val(''+suggestion.id_poli);
                    $('#kd_ruang').val(''+suggestion.kd_ruang);
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
	<div class="container-fluid"><br/>
	<div class="row">
	<?php echo form_open('IrjRegistrasi/pasien_poli');?>
		<div class="col-lg-12">
			<div class="input-group">
				<input type="search" class="auto_search_poli form-control" name="nm_poli" id="nm_poli" placeholder="Cari Poli" required>
				<input type="hidden" class="form-control" name="id_poli" id="id_poli" required>
				<span class="input-group-btn">
					<button class="btn btn-primary" type="submit">Cari</button>
				</span>
			</div><!-- /input-group -->
		</div><!-- /.col-lg-6 -->
	<?php echo form_close();?>
	</div><!-- /.row --><br/>
	<div style="display:block;overflow:auto;">
		<table class="table table-hover table-striped">
		
	<?php 
				foreach($poliklinik as $row){
			?>
				<tr>
					<td>
						<a href="<?php echo site_url('IrjPelayanan/kunj_pasien_poli/'.$row->id_poli)?>">
							<?php
								echo $row->nm_poli.' ('.$row->id_poli.')';
							if($row->counter>0){
								echo '<span class="label label-danger pull-right">'.$row->counter.'</span>';
							}
							?>
						</a>
					</td>
				</tr>
			<?php
				}
			?>
		</table>
	</div>
</div>
</div>
<?php
	foot();
?>
</div>
</body>
</html>