<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="<?= base_url() ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>DCP</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">Payroll<b> DCP Travelling Product</b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Periode -->
            <li class="dropdown notifications-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-calendar"></i>
                <span class="hidden-xs">
                  <?php
                    $periode = $this->db->select('*')->order_by('id_periode', "desc")->limit(1)->get('kalender')->row_array();
                    echo $periode['kd_periode'];
                  ?>
                </span>
              </a>
                <ul class="dropdown-menu">
                <li class="header"><?= $this->lang->line('periode_kerja'); ?></li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    <li>
                      <a href="#">
                        <i class="fa  fa-calendar-check-o"></i> <?= '<span> ' . tgl($periode['tgl_mulai']). '</span>';?>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <center> <i class="fa fa-arrows-v"></i> </center>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="fa  fa-calendar-times-o"></i>  <?= '<span> ' . tgl($periode['tgl_selesai']). '</span>';?>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="footer"><a href="<?= base_url()?>kalender"><?= $this->lang->line('lihat_detail'); ?></a></li>
              </ul>
            </li>

            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i>
                <span class="hidden-xs"><?= $this->session->userdata('username'); ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?= base_url()?>assets/img/user.png" class="img-circle" alt="User Image">
                  <p>
                    <?= $this->session->userdata('username'); ?> - <?= $this->session->userdata('level'); ?>
                    <small> <?= $this->session->userdata('email'); ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat"><?= $this->lang->line('bt_profil'); ?></a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url() ?>auth/logout" class="btn btn-default btn-flat"><?= $this->lang->line('bt_logout'); ?></a>
                  </div>
                </li>
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
          </ul>
        </div>
      </nav>
    </header>