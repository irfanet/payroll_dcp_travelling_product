<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Divisi</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-2">
        <div class="x_panel">
          <div class="x_title">
            <h2>Tambah Divisi</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <!-- Large modal -->
            <center>
              <a class="btn btn-app btn-lg" data-toggle="modal" data-target="#modal_add">
                <i class="fa fa-plus"></i> Tambah
              </a>
            </center>

            <div class="modal fade bs-example-modal-lg" id="modal_add" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">

                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Divisi</h4>
                  </div>
                  <form method="post" role="form" action="<?= base_url(); ?>divisi/addDivisi" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                    <div class="modal-body">
                      <div class="row">
                        <div class="form-group">
                          <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
                          </label>
                          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="kode_divisi">Kode Divisi <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="kode_divisi" name="kode_divisi" required class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="form-group">
                          <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
                          </label>
                          <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nama_divisi">Nama Divisi <span class="required">*</span>
                          </label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="nama_divisi" name="nama_divisi" required class="form-control col-md-7 col-xs-12">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                      <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-10 col-sm-10 col-xs-10">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Divisi</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap jambo_table" cellspacing="0" width="100%">
              <thead>
                <tr class="headings">
                  <th class="column-title" width="5%">No</th>
                  <th class="column-title">Kode Divisi</th>
                  <th class="column-title">Divisi</th>
                  <th class="column-title"  width="15%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                foreach ($divisi as $d) : ?>
                  <tr>
                    <td><?= $no; ?></td>
                    <td><?= $d['kode_divisi']; ?></td>
                    <td><?= $d['nama_divisi']; ?></td>
                    <td>
                      <a data-toggle="modal" data-target="#modal_edit_<?= $d['kode_divisi']; ?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                      <a href="#" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal_delete_<?= $d['kode_divisi']; ?>"><i class="fa fa-trash-o"></i> Delete </a>
                    </td>

                    <!-- Large modal -->
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modal_edit_<?= $d['kode_divisi']; ?>">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel">Edit Data</h4>
                          </div>
                          <form method="post" role="form" action="<?= base_url(); ?>divisi/editDivisi/<?= $d['kode_divisi']; ?>" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                            <div class="modal-body">
                              <div class="row">
                                <div class="form-group">
                                  <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
                                  </label>
                                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="kode_divisi">Kode Divisi <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="kode_divisi" name="kode_divisi" required="required" readonly class="form-control col-md-7 col-xs-12" value="<?= $d['kode_divisi']; ?>">
                                  </div>
                                </div>
                              </div>
                              <br>
                              <div class="row">
                                <div class="form-group">
                                  <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
                                  </label>
                                  <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nama_divisi">Nama Divisi <span class="required">*</span>
                                  </label>
                                  <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="nama_divisi" name="nama_divisi" required class="form-control col-md-7 col-xs-12" value="<?= $d['nama_divisi']; ?>">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                              <input type="submit" name="submit" value="Simpan" class="btn btn-primary">
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- Small modal -->
                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal_delete_<?= $d['kode_divisi']; ?>">
                      <div class="modal-dialog modal-sm">
                        <div class="modal-content">

                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <h4 class="modal-title" id="myModalLabel2">Yakin mau menghapus?</h4>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                            <a href="<?= base_url(); ?>divisi/deleteDivisi/<?= $d['kode_divisi']; ?>"><button type="button" class="btn btn-danger">Ya</button></a>
                          </div>

                        </div>
                      </div>
                    </div>
                  </tr>

                <?php $no++;
                endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->