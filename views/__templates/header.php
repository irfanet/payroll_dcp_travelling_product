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
                    <?= $this->session->userdata('username'); ?> - <?php if ($this->session->userdata('level') == 1) {
                                                                      echo "Super Admin";
                                                                    } else if ($this->session->userdata('level') == 2) {
                                                                      echo "Manager";
                                                                    } else if ($this->session->userdata('level') == 3) {
                                                                      echo "HRD";
                                                                    } else if ($this->session->userdata('level') == 4) {
                                                                      echo "Operator Absen & SPL";
                                                                    } else if ($this->session->userdata('level') == 5) {
                                                                      echo "Operator Payroll";
                                                                    }
                                                                    ?>
                    <small> <?= $this->session->userdata('email'); ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a data-toggle="modal" data-target="#modal_profile" id="edit_profile" class="btn btn-default btn-flat"><?= $this->lang->line('bt_profil'); ?></a>
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

    <!-- EDIT PROFILE MODAL -->
    <div class="modal fade" id="modal_profile" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">

          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" name="show_in_edit">Edit Profile</h4>
          </div>
          <form autocomplete="off" id="form_profile" class="form-horizontal form-label-left" method="post" action="<?= base_url(); ?>user/edit_profile">
            <div class="modal-body">
              <div class="box-body">
                <input type="hidden" id="id_user_profile" name="id_user_profile" value="<?= $this->session->userdata('id_user'); ?>">
                <div class="row">
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    </label>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email_profile">Email <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="email_profile" name="email_profile" required class="form-control col-md-7 col-xs-12" value="<?= $this->session->userdata('email'); ?>">
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    </label>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="username_profile">Username <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="username_profile" name="username_profile" required class="form-control col-md-7 col-xs-12" value="<?= $this->session->userdata('username'); ?>">
                    </div>
                  </div>
                </div>
                <br name="show_in_add">
                <div class="row" name="show_in_add">
                  <div class="form-group">
                    <label class="control-label col-md-2 col-sm-2 col-xs-12">
                    </label>
                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="password1_profile">Password <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="password" id="password1_profile" name="password1_profile" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                </div>
                <br name="show_in_add">
                <div class="row" name="show_in_add">
                  <div class="form-group">
                    <label class="control-label col-md-1 col-sm-1 col-xs-12">
                    </label>
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password2_profile">Konfirmasi Password <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="password" id="password2_profile" name="password2_profile" class="form-control col-md-7 col-xs-12">
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_cancel">Batal</button>
              <input type="submit" name="btn_profile" id="btn_profile" value="Simpan" class="btn btn-primary">
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- END EDIT PROFILE MODAL -->
    <script type="text/javascript">
      var edit_password = document.getElementById("password1_profile"),
        edit_confirm_password = document.getElementById("password2_profile");

      function validatePassword() {
        if (edit_password.value != edit_confirm_password.value) {
          edit_confirm_password.setCustomValidity("Passwords Don't Match");
        } else if (edit_password.value.length < 6) {
          edit_confirm_password.setCustomValidity("Password must 6 characters or more");
        } else {
          edit_confirm_password.setCustomValidity('');
        }
      }

      edit_password.onchange = validatePassword;
      edit_confirm_password.onchange = validatePassword;
      edit_confirm_password.onkeyup = validatePassword;
      edit_password.onkeyup = validatePassword;
    </script>