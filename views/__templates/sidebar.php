<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <li>
        <a href="#">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>
      <li>
        <a href="<?= base_url(); ?>user">
          <i class="fa fa-user"></i> <span>User</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-users"></i>
          <span>Pegawai</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url() ?>pegawai"><i class="fa fa-circle-o"></i> Aktif</a></li>
          <li><a href="<?= base_url() ?>pegawai/index_non_aktif"><i class="fa fa-circle-o"></i> Non-Aktif</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-fax"></i>
          <span>Absensi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url() ?>absen/form_upload"><i class="fa fa-circle-o"></i> Import Data Absensi</a></li>
          <li><a href="<?= base_url() ?>absen"><i class="fa fa-circle-o"></i> Cek Absensi</a></li>
          <li><a href="<?= base_url() ?>absen/koreksi_absen"><i class="fa fa-circle-o"></i> Lihat Absensi</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= base_url(); ?>spl">
          <i class="fa fa-file-text-o"></i> <span>SPL</span>
        </a>
      </li>
      <li>
        <a href="<?= base_url(); ?>gaji">
          <i class="fa fa-calculator"></i> <span>Hitung Gaji</span>
        </a>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-check-square-o"></i> <span>Konfirmasi Gaji</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-print"></i> <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url(); ?>cetak"><i class="fa fa-circle-o"></i> Gaji Harian</a></li>
          <li><a href="simple.html"><i class="fa fa-circle-o"></i> Gaji Bulanan</a></li>
          <li><a href="simple.html"><i class="fa fa-circle-o"></i> Gaji Staff</a></li>
          <li><a href="simple.html"><i class="fa fa-circle-o"></i> Absensi</a></li>
        </ul>
      </li>
      <li>
        <a href="<?= base_url()?>kalender">
          <i class="fa fa-calendar"></i> <span>Kalender</span>
        </a>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-cog"></i> <span>Setting</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url()?>honor_lembur"><i class="fa fa-circle-o"></i> Honor Lembur</a></li>
          <li><a href="../examples/profile.html"><i class="fa fa-circle-o"></i> Departemen</a></li>
          <li><a href="<?= base_url()?>jabatan"><i class="fa fa-circle-o"></i> Jabatan</a></li>
          <li><a href="../examples/register.html"><i class="fa fa-circle-o"></i> Line</a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>