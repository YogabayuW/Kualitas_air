		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?= base_url() ?>" class="brand-link">
				<img src="<?= base_url() ?>assets/dist/img/logo udang.png" alt="Gambar Ikan Koi"
					class="brand-image img-circle" style="opacity: .8">
				<span class="brand-text">Mizukoi</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="info">
						<div class="container">
							<div class="row">
								<div class="col-sm">
									<img src="<?= base_url() ?>assets/dist/img/users.png" class="img-circle elevation-2"
										alt="User Image">
								</div>
								<div class="col-sm">
									<a href="#" class="d-block mt-1"><?= $user['nama_admin']?></a>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- untuk membaca link  -->
				<?php $link = $this->uri->segment(2); ?>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
						data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class 
						with font-awesome or any other icon font library -->
						<li class="nav-item">
							<a href="<?=base_url('admin/C_dashboard')?>"
								class="nav-link <?php if($link === 'C_dashboard'){echo 'active';} ?> ">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>Beranda</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?= base_url('admin/C_admin') ?>" class="nav-link 
								<?php if($link === 'C_admin'){echo 'active';} ?>">
								<i class="fas fa-user nav-icon"></i>
								<p>Admin</p>
							</a>
						</li>

						<!-- <li class="nav-item">
							<a href="<?= base_url('admin/C_suhu') ?>" class="nav-link 
								<?php if($link === 'C_suhu'){echo 'active';} ?>">
								<i class="fas fa-thermometer-half nav-icon"></i>
								<p>Suhu</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?= base_url('admin/C_ph') ?>" class="nav-link 
								<?php if($link === 'C_ph'){echo 'active';} ?>">
								<i class="fas fa-vial nav-icon"></i>
								<p>PH</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?= base_url('admin/C_tds') ?>" class="nav-link 
								<?php if($link === 'C_tds'){echo 'active';} ?>">
								<i class="fas fa-thermometer nav-icon"></i>
								<p>TDS</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="<?= base_url('admin/C_rule') ?>" class="nav-link 
								<?php if($link === 'C_rule'){echo 'active';} ?>">
								<i class="fas fa-exclamation-circle nav-icon"></i>
								<p>Rule</p>
							</a>
						</li> -->
						<li class="nav-item">
							<a href="<?= base_url('admin/C_riwayat') ?>" class="nav-link 
								<?php if($link === 'C_riwayat'){echo 'active';} ?>">
								<i class="fas fa-history nav-icon"></i>
								<p>Riwayat</p>
							</a>
						</li>
		
						</li>
				</nav>
			</div>
		</aside>
