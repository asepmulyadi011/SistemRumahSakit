<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>BPJS</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link href="<?php echo base_url('plugin/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('plugin/css/datepicker3.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('plugin/dataTables/css/jquery.dataTables.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('plugin/css/bootstrap-table.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('plugin/css/styles.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('plugin/css/custom.css'); ?>" rel="stylesheet">
		
		<script src="<?php echo base_url('plugin/js/lumino.glyphs.js'); ?>"></script>
	</head>
	<body>
		<script src="<?php echo base_url('plugin/js/jquery-1.11.1.min.js'); ?>"></script>
		<script src="<?php echo base_url('plugin/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('plugin/js/bootstrap-datepicker.js'); ?>"></script>
		<script src="<?php echo base_url('plugin/dataTables/js/jquery.dataTables.js'); ?>"></script>
		<script src="<?php echo base_url('plugin/js/bootstrap-table.js'); ?>"></script>
		<script>
			!function ($) {
				$(document).on("click","ul.nav li.parent > a > span.icon", function(){          
					$(this).find('em:first').toggleClass("glyphicon-minus");      
				}); 
				$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
			}(window.jQuery);

			$(window).on('resize', function () {
			  if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
			})
			$(window).on('resize', function () {
			  if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
			})
		</script>
	</body>
</html>
