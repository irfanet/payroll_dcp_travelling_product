<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Jabatan</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12" id="info"></div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <div class="x_panel">
          <div class="x_title">
            <h2>Tambah</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <center>
              <a class="btn btn-app btn-lg" data-toggle="modal" data-target="#modal_add">
                <i class="fa fa-plus"></i> Tambah
              </a>
            </center>
          </div>
        </div>
      </div>

      <!-- TABEL DATA -->
      <div class="col-md-10 col-sm-10 col-xs-10">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Jabatan</h2>
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
                  <th class="column-title">No</th>
                  <th class="column-title">Kode Jabatan</th>
                  <th class="column-title">Jabatan</th>
                  <th class="column-title">Status</th>
                  <th class="column-title" width="15%">Aksi</th>
                </tr>
              </thead>
              <tbody id="show_data">
              </tbody>
            </table>
            <!-- END TABEL DATA -->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->

<!-- TAMBAH MODAL -->
<div class="modal fade bs-example-modal-lg" id="modal_add" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Tambah Jabatan</h4>
      </div>
      <form id="form_add" data-parsley-validate class="form-horizontal form-label-left">
        <div class="modal-body">
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="kode_jabatan">Kode Jabatan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="kode_jabatan" name="kode_jabatan" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nama_jabatan">Nama Jabatan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="nama_jabatan" name="nama_jabatan" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="status">Status <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="status" id="status" class="form-control col-md-6 col-xs-12">
                  <option value="1">Leader</option>
                  <option value="2">Non-Leader</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          <input type="submit" name="submit" id="btn_simpan" value="Simpan" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- END TAMBAH MODAL -->

<!-- EDIT MODAL -->
<div class="modal fade bs-example-modal-lg" id="modal_edit" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Jabatan</h4>
      </div>
      <form id="form_edit" data-parsley-validate class="form-horizontal form-label-left">
        <input type="hidden" id="kode_jabatan2" name="kode_jabatan2" required class="form-control col-md-7 col-xs-12">
        <div class="modal-body">
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nama_jabatan">Nama Jabatan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="nama_jabatan2" name="nama_jabatan2" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="status">Status <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="status2" id="status2" class="form-control col-md-6 col-xs-12">
                  <option value="1">Leader</option>
                  <option value="2">Non-Leader</option>
                </select>
              </div>
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_cancel_update">Batal</button>
          <input type="submit" name="submit" id="btn_update" value="Simpan" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END EDIT MODAL -->

<!-- DELETE MODAL -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal_delete">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Hapus Data</h4>
      </div>
      <form>
        <div class="modal-body">
          <input type="hidden" name="id_data" id="id_data">
          <h5>Apakah anda yakin ?</h5>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
          <button type="button" id="btn_hapus" class="btn_hapus btn btn-danger">Ya</button>
        </div>
      </form>

    </div>
  </div>
</div>
<!-- END DELETE MODAL -->

<!-- ASYNCRONUS NGERI TOK -->
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script type="text/javascript">
  $(document).ready(function() {
    tampil_data();
    // $('#datatable-responsive').dataTable();

    //fungsi tampil data
    function tampil_data() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>jabatan/get_data',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          var no = 1;
          for (i = 0; i < data.length; i++) {
            html += '<tr>' +
              '<td>' + no++ + '</td>' +
              '<td>' + data[i].kode_jabatan + '</td>' +
              '<td>' + data[i].nama_jabatan + '</td>' +
              '<td>' + data[i].status + '</td>' +
              '<td style="text-align:right;">' +
              '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].kode_jabatan + '">Edit</a>' + ' ' +
              '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].kode_jabatan + '">Hapus</a>' +
              '</td>' +
              '</tr>';
          }
          $('#show_data').html(html);
        }

      });
    }

    //TOMBOL EDIT -> GET KODE 
    $('#show_data').on('click', '.item_edit', function() {
      var id = $(this).attr('data');
      $.ajax({
        type: "GET",
        url: "<?= base_url() ?>jabatan/get_kode",
        dataType: "JSON",
        data: {
          id: id
        },
        success: function(data) {
          $.each(data, function(kode_jabatan, nama_jabatan, status) {
            $('#modal_edit').modal('show');
            $('[name="kode_jabatan2"]').val(data.kode_jabatan);
            $('[name="nama_jabatan2"]').val(data.nama_jabatan);
            $('[name="status2"]').val(data.status);
          });
        }
      });
      return false;
    });

    //TOMBOL HAPUS -> GET KODE
    $('#show_data').on('click', '.item_hapus', function() {
      var id = $(this).attr('data');
      $('#modal_delete').modal('show');
      $('[name="id_data"]').val(id);
    });

    //SIMPAN DATA
    $('#btn_simpan').on('click', function() {
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>jabatan/simpan_data",
        dataType: "JSON",
        data: {
          kode_jabatan: $('#kode_jabatan').val(),
          nama_jabatan: $('#nama_jabatan').val(),
          status: $('#status').val()
        },
        success: function(data) {
          if (data.success == true) {
            $('#info').append('<div class="alert alert-success"><i class="fa fa-check"></i>' +
              ' <b>Berhasil</b> ! Data telah disimpan ' + '</div>');
            $('.form-group').removeClass('has-error')
              .removeClass('has-success');
            $('.text-danger').remove();
            $('.alert-success').delay(500).show(1000, function() {
              $(this).delay(2000).slideUp(500, function() {
                $(this).remove();
              });
            })
            $('#form_add')[0].reset();
            $('#modal_add').modal('hide');
            tampil_data();
          } else {
            $.each(data.messages, function(key, value) {
              var element = $('#' + key);
              element.closest('div.form-group')
                .removeClass('has-error')
                .addClass(value.length > 0 ? 'has-error' : 'has-success')
                .find('.text-danger')
                .remove();
              element.after(value);
            });
          }
        }
      });
      return false;
    });

    //UPDATE DATA
    $('#btn_update').on('click', function() {
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>jabatan/update_data",
        dataType: "JSON",
        data: {
          kode_jabatan: $('#kode_jabatan2').val(),
          nama_jabatan: $('#nama_jabatan2').val(),
          status: $('#status2').val()
        },
        success: function(data) {
          if (data.success == true) {
            $('#info').append('<div class="alert alert-success"><i class="fa fa-check"></i>' +
              ' Berhasil ! Data telah diperbaharui ' + '</div>');
            $('.form-group').removeClass('has-error')
              .removeClass('has-success');
            $('.text-danger').remove();
            $('.alert-success').delay(500).show(1000, function() {
              $(this).delay(2000).slideUp(500, function() {
                $(this).remove();
              });
            })
            $('#form_edit')[0].reset();
            $('#modal_edit').modal('hide');
            tampil_data();
          } else {
            $.each(data.messages, function(key, value) {
              var element = $('#' + key);
              element.closest('div.form-group')
                .removeClass('has-error')
                .addClass(value.length > 0 ? 'has-error' : 'has-success')
                .find('.text-danger')
                .remove();
              element.after(value);
            });
          }
        }

      });
      return false;
    });

    //HAPUS DATA
    $('#btn_hapus').on('click', function() {
      var kode = $('#id_data').val();
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>jabatan/hapus_data",
        dataType: "JSON",
        data: {
          kode: kode
        },
        success: function(data) {
          $('#modal_delete').modal('hide');
          tampil_data();
          $('#info').append('<div class="alert alert-danger"><i class="fa fa-trash-o"></i>' +
            ' Data telah dihapus !' + '</div>');
          $('.alert-danger').delay(500).show(1000, function() {
            $(this).delay(2000).slideUp(500, function() {
              $(this).remove();
            });
          })
        }
      });
      return false;
    });

  });
</script>