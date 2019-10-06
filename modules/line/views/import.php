<div class="row">
	<div class="col-md-12">
		<div class="widget box">
			<div class="widget-header">
				<h4><i class="icon-reorder"></i> Form Import Data Pegawai</h4>
			</div>
			<div class="widget-content">
				<form class="form-horizontal row-border" method="post" action='<?= base_url("bagian/import_excel") ?>' enctype="multipart/form-data">

					<div class="form-group">
						<label class="col-md-2 control-label">File Data Pegawai <span class="required">*</span></label>
						<div class="col-md-8">
							<input type="file" name="file" class="required" data-style="fileinput" data-inputsize="medium" required=""></small>
							<p class="help-block">XLS only (xls/*)</p>
							<label for="file" class="has-error help-block" generated="true" style="display:none;"></label>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label"></label>
						<button type="submit" name="import" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>