<header class="main-header">
	<a href="<?php echo site_url('rscberanda'); ?>" class="logo">
		<span class="logo-mini">IRJ</span>
		<span class="logo-lg">Instalasi Rawat Jalan</span>
	</a>
	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
	
			<li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo base_url('asset/img/avatar.png'); ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs">User0001</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo base_url('asset/img/avatar.png'); ?>" class="img-circle" alt="User Image">
                    <p>
                      User0001
                      <small>Admin</small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profil</a>
                    </div>
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Keluar</a>
                    </div>
                  </li>
                </ul>
              </li>
			</ul>
		</div>
	</nav>
</header>
<aside class="main-sidebar">
	<section class="sidebar">
		<ul class="sidebar-menu">
			<li class="header">Menu Rawat Jalan</li>
			<li>
				<a href="<?php echo site_url('irj/rjcregistrasi'); ?>">
					<i class="fa fa-edit"></i>
					<span>Registrasi</span>
				</a>
			</li>
			<li>
				<a href="<?php echo site_url('irj/rjcpelayanan/list_poli'); ?>">
					<i class="fa fa-home"></i>
					<span>Pelayanan</span>
				</a>
			</li>
			<li>
				<a href="<?php echo site_url('irj/rjckwitansi/kwitansi'); ?>">
					<i class="fa fa-book"></i>
					<span>Kwitansi</span>
					<!--<small class="label pull-right bg-green">new</small>-->
				</a>
			</li>
		</ul>
	</section>
</aside>