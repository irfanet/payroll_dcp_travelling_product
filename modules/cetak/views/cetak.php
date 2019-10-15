<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $this->lang->line('data_laporan'); ?>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12" id="info"></div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-4">
        <div class="box box-solid box-default">
          <div class="box-header">
            <h3 class="box-title"><?= $this->lang->line('slip_gaji'); ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <center>
              <a class="btn btn-app btn-lg" href="<?= base_url()?>cetak/slip_gaji">
                <i class="glyphicon glyphicon-print"></i> <?= $this->lang->line('cetak'); ?>
              </a>
            </center>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="col-xs-12 col-md-12 col-lg-4">
        <div class="box box-solid box-default">
          <div class="box-header">
            <h3 class="box-title"><?= $this->lang->line('transfer_gaji'); ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <center>
              <a class="btn btn-app btn-lg" href="<?= base_url()?>cetak/cetak_transfer">
                <i class="glyphicon glyphicon-print"></i> <?= $this->lang->line('cetak'); ?>
              </a>
            </center>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="col-xs-12 col-md-12 col-lg-4">
        <div class="box box-solid box-default">
          <div class="box-header">
            <h3 class="box-title"><?= $this->lang->line('rekap_gaji'); ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <center>
              <a class="btn btn-app btn-lg" href="<?= base_url()?>cetak/rekap_gaji">
                <i class="glyphicon glyphicon-print"></i> <?= $this->lang->line('cetak'); ?>
              </a>
            </center>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->