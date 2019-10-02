<!-- top navigation -->
<div class="top_nav">
	<div class="nav_menu">
		<nav>
			<div class="nav toggle">
				<a id="menu_toggle"><i class="fa fa-bars"></i></a>
			</div>

			<ul class="nav navbar-nav navbar-right">
				<li class="">
					<a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
						<?= $this->session->userdata('username'); ?>
						<span class=" fa fa-angle-down"></span>
					</a>
					<ul class="dropdown-menu dropdown-usermenu pull-right">
						<li><a data-toggle="modal" data-target="#modal_profile" id="edit_profile"> Profile</a></li>
						<li><a href="<?= base_url() ?>auth/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
					</ul>
				</li>
			</ul>
		</nav>
	</div>
</div>
<!-- /top navigation -->

<!-- TAMBAH & EDIT MODAL -->
<div class="modal fade bs-example-modal-lg" id="modal_profile" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
				</button>
				<h4 class="modal-title" name="show_in_edit">Edit Profile</h4>
			</div>
			<form autocomplete="off" id="form_profile" class="form-horizontal form-label-left" method="post" action="<?= base_url(); ?>user/edit_profile">
				<div class="modal-body">
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
								<input type="password" id="password1_profile" name="password1_profile" class="form-control col-md-7 col-xs-12" onchange='check();'>
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
								<input type="password" id="password2_profile" name="password2_profile" class="form-control col-md-7 col-xs-12" onchange='check();'>
							</div>
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" id="btn_cancel">Batal</button>
					<input type="submit" name="btn_profile" id="btn_profile" value="Simpan" class="btn btn-primary">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END TAMBAH & EDIT MODAL -->
<script type="text/javascript">
	function check(){
         var pass  = document.getElementById("password1_profile").value;
         var rpass  = document.getElementById("password2_profile").value;
        if(pass != rpass){
			$('#btn_profile').hide();
        }else if(pass == '' && rpass == ''){
			$('#btn_profile').show();
        }else{
			$('#btn_profile').show();
        }
}
</script>