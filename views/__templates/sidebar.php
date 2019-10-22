<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar" id="section">
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header"><?= $this->lang->line('main_navigation'); ?></li>
      <li class="<?php echo $this->uri->segment(1) == 'dashboard' ? 'active': '' ?>">
        <a href="#" data-target="dashboard">
          <i class="fa fa-dashboard"></i> <span><?= $this->lang->line('dashboard'); ?></span>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(1) == 'user' ? 'active': '' ?>">
        <a href="#" data-target="user">
          <i class="fa fa-user"></i> <span><?= $this->lang->line('user'); ?></span>
        </a>
      </li>
      <li class="treeview <?php echo $this->uri->segment(1) == 'pegawai' ? 'active': '' ?>">
        <a href="#">
          <i class="fa fa-users"></i>
          <span><?= $this->lang->line('pegawai'); ?></span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="<?php echo $this->uri->segment(1) == 'pegawai' &&  $this->uri->segment(2) != 'index_non_aktif' ? 'active': ''?>">
            <a href="#" data-target="pegawai"><i class="fa fa-circle-o"></i> <?= $this->lang->line('pegawai_aktif'); ?></a>
          </li>
          <li class="<?php echo $this->uri->segment(2) == 'index_non_aktif' ? 'active': '' ?>">
            <a href="#" data-target="pegawai/index_non_aktif"><i class="fa fa-circle-o"></i> <?= $this->lang->line('pegawai_non_aktif'); ?></a>
          </li>
        </ul>
      </li>
      <li class="treeview <?php echo $this->uri->segment(1) == 'absensi' ? 'active': '' ?>">
        <a href="#">
          <i class="fa fa-fax"></i>
          <span><?= $this->lang->line('absensi'); ?></span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <!-- <li><a href="<?= base_url() ?>absensi/form_upload"><i class="fa fa-circle-o"></i><?= $this->lang->line('import_data_absensi'); ?></a></li> -->
          <li><a href="#" data-target="absensi"><i class="fa fa-circle-o"></i><?= $this->lang->line('cek_absensi'); ?></a></li>
          <li><a href="#" data-target="absensi/lihat_absensi"><i class="fa fa-circle-o"></i><?= $this->lang->line('lihat_absensi'); ?></a></li>
        </ul>
      </li>
      <li class="<?php echo $this->uri->segment(1) == 'spl' ? 'active': '' ?>">
        <a href="#" data-target="spl">
          <i class="fa fa-file-text-o"></i> <span><?= $this->lang->line('spl'); ?></span>
        </a>
      </li>
      <li class=" <?php echo $this->uri->segment(1) == 'gaji'  &&  $this->uri->segment(2) != 'index_konfirmasi_gaji' ? 'active': '' ?>">
        <a href="#" data-target="gaji">
          <i class="fa fa-calculator"></i> <span><?= $this->lang->line('hitung_gaji'); ?></span>
        </a>
      </li>
      <li class=" <?php echo $this->uri->segment(2) == 'index_konfirmasi_gaji' ? 'active': '' ?>">
        <a href="#" data-target="gaji/index_konfirmasi_gaji">
          <i class="fa fa-check-square-o"></i> <span><?= $this->lang->line('konfirmasi_gaji'); ?></span>
        </a>
      </li>
      <li class="<?php echo $this->uri->segment(1) == 'cetak' ? 'active': '' ?>">
        <a href="#" data-target="cetak">
          <i class="fa fa-print"></i> <span><?= $this->lang->line('laporan'); ?></span>
        </a>
      </li>
      <li class=" <?php echo $this->uri->segment(1) == 'kalender' ? 'active': '' ?>">
        <a href="#" data-target="kalender">
          <i class="fa fa-calendar"></i> <span><?= $this->lang->line('kalender'); ?></span>
        </a>
      </li>
      <li class="treeview  <?php echo $this->uri->segment(1) == 'setting' ? 'active': '' ?>">
        <a href="#">
          <i class="fa fa-cog"></i> <span><?= $this->lang->line('setting'); ?></span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#" data-target="honor_lembur"><i class="fa fa-circle-o"></i> <?= $this->lang->line('honor_lembur'); ?></a></li>
          <li><a href="#" data-target="departemen"><i class="fa fa-circle-o"></i> <?= $this->lang->line('departemen'); ?></a></li>
          <li><a href="#" data-target="jabatan"><i class="fa fa-circle-o"></i> <?= $this->lang->line('jabatan'); ?></a></li>
          <li><a href="#" data-target="line"><i class="fa fa-circle-o"></i> <?= $this->lang->line('line'); ?></a></li>
        </ul>
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>

<div id="isi">
  <?php $this->load->view('dashboard'); ?>
</div>

<script>
  $(document).ready(function(){
    $('#section ul li a').on('click', function(){
      var $this = $(this),
      target = $this.data('target');
      $('#isi').load('<?= base_url()?>'+target);
      return false;
    });
  });
</script>