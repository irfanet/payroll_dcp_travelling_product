<body class="nav-md footer_fixed">
	<div class="container body">
		<div class="main_container">
			<div class="col-md-3 left_col menu_fixed">
				<div class="left_col scroll-view">
					<div class="navbar nav_title" style="border: 0;">
						<a href="#" class="site_title"><i class="fa fa-desktop"></i> <span>Payroll</span></a>
					</div>

					<div class="clearfix"></div>

					<!-- sidebar menu -->
					<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
						<div class="menu_section">
							<ul class="nav side-menu">
								<li><a href="javascript:void(0)"><i class="fa fa-home"></i> Dashboard</a></li>
								<li><a href="<?= base_url()?>user"><i class="fa fa-user"></i> User</a></li>
								<li><a><i class="fa fa-users"></i> Pegawai <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="<?= base_url()?>pegawai">Aktif</a></li>
										<li><a href="<?= base_url()?>pegawai/index_non_aktif">Non Aktif</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-fax"></i> Absensi <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="index.html">Import Data Absen</a></li>
										<li><a href="index2.html">Cek Absen</a></li>
										<li><a href="index3.html">Lihat Absen</a></li>
									</ul>
								</li>
								<li><a href="javascript:void(0)"><i class="fa fa-file-text-o"></i> SPL</a></li>
								<li><a href="javascript:void(0)"><i class="fa fa-calculator"></i> Hitung Gaji</a></li>
								<li><a href="javascript:void(0)"><i class="fa  fa-check-square-o"></i> Konfirmasi Absen</a></li>
								<li><a><i class="fa  fa-print"></i> Laporan <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="form.html">Gaji Harian</a></li>
										<li><a href="form_advanced.html">Gaji Bulanan</a></li>
										<li><a href="form_validation.html">Gaji Staff</a></li>
										<li><a href="form_wizards.html">Report Absen</a></li>
									</ul>
								</li>
								<li><a><i class="fa fa-cog"></i> Setting <span class="fa fa-chevron-down"></span></a>
									<ul class="nav child_menu">
										<li><a href="general_elements.html">Kalender</a></li>
										<li><a href="media_gallery.html">Honor Lembur</a></li>
										<li><a href="<?= base_url()?>divisi">Divisi</a></li>
										<li><a href="<?= base_url()?>jabatan">Jabatan</a></li>
										<li><a href="<?= base_url()?>status">Status</a></li>
										<li><a href="<?= base_url()?>bagian">Bagian</a></li>
									</ul>
								</li>
							</ul>
						</div>

					</div>
					<!-- /sidebar menu -->

					<!-- /menu footer buttons -->
					<div class="sidebar-footer hidden-small">
						<a data-toggle="tooltip" data-placement="top" title="Settings">
							<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="FullScreen">
							<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Lock">
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
						</a>
						<a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url()?>auth/logout">
							<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
						</a>
					</div>
					<!-- /menu footer buttons -->
				</div>
			</div>

		
