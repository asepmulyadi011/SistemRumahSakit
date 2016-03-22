<div class="wrapper">
	<div class="content-wrapper">
		
		<!-- Keterangan page -->
		<section class="content-header">
			<h1>MUTASI RUANGAN</h1>
			<ol class="breadcrumb">
				<li><a href="#"><i class="fa fa-home"></i> Home</a></li>
				<li><a href="#">Mutasi</a></li>
			</ol>
		</section>
		<!-- /Keterangan page -->

        <!-- Main content -->
        <section class="content">
			<div class="row">
				<div class="col-sm-12">
					<?php echo $this->session->flashdata('pesan');?>
					<div class="box box-success">
						<br/>
						
						<!-- Form Mutasi -->
						<form class="form-horizontal" action="<?php echo site_url('iri/ricmutasi/insert_mutasi'); ?>">
							<div class="box-body">
								<div class="row">
									<div class="col-sm-6">
										<div class="box-body form-left">
											<div class="form-group">
												<div class="col-sm-3 control-label">No. Register IPD</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm" value="<?php echo $pasien_iri[0]['no_ipd']; ?>">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">No. CM</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm" value="<?php echo $irna_antrian[0]['no_medrec']; ?>">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">Nama</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm" value="<?php echo $irna_antrian[0]['nama']; ?>">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">Alamat</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm" value="<?php echo $irna_antrian[0]['alamat']; ?>">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">Penjamin</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm" value="<?php echo $pasien_iri[0]['nmpembayarri']; ?>">
												</div>
											</div>
											<br/>
											<h4 class="title-form">ASAL RUANGAN</h4>
											<div class="form-group">
												<div class="col-sm-3 control-label">Bed</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm" name="bed" value="<?php echo $pasien_iri[0]['bed']; ?>" readonly>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">Ruang</div>
												<div class="col-sm-9">
													<span class="label-form-validation"></span>
													<input type="text" class="form-control input-sm auto_ruang" id="ruang" name="ruang" value="<?php echo $pasien_iri[0]['idrg']; ?>" readonly>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label"></div>
												<div class="col-sm-9">
													<span class="label-form-validation"></span>
													<div class="col-sm-8 input-left"><input type="text" class="form-control input-sm" id="nm_ruang" name="nm_ruang" value="<?php echo $pasien_iri[0]['nmruang']; ?>" readonly></div>
													<div class="col-sm-4 input-right"><input type="text" class="form-control input-sm" id="kelas" name="kelas" value="<?php echo $pasien_iri[0]['kelas']; ?>" readonly></div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">Tgl. Masuk</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm" name="tglmasukrg" value="<?php echo $pasien_iri[0]['tgl_masuk']; ?>" readonly>
												</div>
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="box-body">
											<h4 class="title-form">TUJUAN RUANGAN</h4>
											<div class="form-group">
												<div class="col-sm-3 control-label">Bed</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm" name="bed">
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">Ruang</div>
												<div class="col-sm-9">
													<span class="label-form-validation"></span>
													<input type="text" class="form-control input-sm auto_ruang" id="ruang" name="ruang" value="<?php echo $irna_antrian[0]['ruangpilih']; ?>" readonly>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label"></div>
												<div class="col-sm-9">
													<span class="label-form-validation"></span>
													<div class="col-sm-8 input-left"><input type="text" class="form-control input-sm" id="nm_ruang" name="nm_ruang" value="<?php echo $irna_antrian[0]['nmruang']; ?>" readonly></div>
													<div class="col-sm-4 input-right"><input type="text" class="form-control input-sm" id="kelas" name="kelas" value="<?php echo $irna_antrian[0]['koderg']; ?>" readonly></div>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-3 control-label">Tgl. Masuk</div>
												<div class="col-sm-9">
													<input type="text" class="form-control input-sm" name="tglmasukrg" value="<?php echo $irna_antrian[0]['tglrencanamasuk']; ?>" readonly>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="button-reservasi">
											<button type="button" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</button>
										</div>
									</div>
								</div>
								
								<!-- Modal -->
								<div class="modal fade bs-example-modal-sm" id="modal-mutasi" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title" id="myModalLabel">Konfirmasi</h4>
											</div>
											<div class="modal-body">
												Apakah kamu yakin dengan data tersebut?
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal"><i class="fa fa-remove"></i> Tidak</button>
												<button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check"></i> Ya</button>
											</div>
										</div>
									</div>
								</div>
								<!-- /Modal -->
							</div>
						</form>
						<!-- /Form Mutasi -->
						
					</div>
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
