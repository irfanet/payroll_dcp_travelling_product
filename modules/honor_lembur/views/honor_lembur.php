<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Honor Lembur</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12" id="info"></div>
    </div>
    <div class="row">

      <!-- TABEL DATA -->
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Honor Lembur</h2>
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
                  <th class="column-title">Status</th>
                  <th class="column-title">Honor Per Jam</th>
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

<!-- TAMBAH & EDIT MODAL -->
<div class="modal fade bs-example-modal-lg" id="modal_add" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" name="show_in_edit">Edit Honor Lembur</h4>
      </div>
      <form id="form_add" data-parsley-validate class="form-horizontal form-label-left">
        <div class="modal-body">
          <input type="hidden" id="id_setting" name="id_setting" class="form-control col-md-7 col-xs-12">

          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="status_jabatan">Nama Jabatan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="status_jabatan" name="status_jabatan" readonly class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nominal">Honor per Jam <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="nominal" name="nominal" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_cancel">Batal</button>
          <input type="submit" name="show_in_edit" id="btn_update" value="Perbaharui" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- END TAMBAH & EDIT MODAL -->

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
        url: '<?= base_url() ?>honor_lembur/get_data',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          var status;
          for (i = 0; i < data.length; i++) {
            if(data[i].status_jabatan==1){status='Leader';}else{status='Non-Leader';};
            html += '<tr>' +
              '<td>' + status + '</td>' +
              '<td align="right">' + data[i].nominal.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>' +
              '<td style="text-align:right;">' +
              '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].id_setting + '">Edit</a>' + ' ' +
              '</td>' +
              '</tr>';
          }
          $('#show_data').html(html);
        }

      });
    }

    //ATUR HIDE AND SHOW
    $('#btn_add_modal').on('click', function() {
      $('#form_add')[0].reset();
      $('[name="show_in_add"]').show();
      $('[name="show_in_edit"]').hide();
    });

    //TOMBOL EDIT -> GET KODE & ATUR HIDE AND SHOW
    $('#show_data').on('click', '.item_edit', function() {
      var id = $(this).attr('data');
      $.ajax({
        type: "GET",
        url: "<?= base_url() ?>honor_lembur/get_kode",
        dataType: "JSON",
        data: {
          id: id
        },
        success: function(data) {
          $.each(data, function(id_setting, status_jabatan, nominal) {
            $('#modal_add').modal('show');
            $('[name="show_in_add"]').hide();
            $('[name="show_in_edit"]').show();
            var status;
            if(data.status_jabatan==1){status='Leader';}else{status='Non-Leader';};
            $('#id_setting').val(data.id_setting);
            $('#status_jabatan').val(status);
            $('#nominal').val(data.nominal);
          });
        }
      });
      return false;
    });

    //UPDATE DATA
    $('#btn_update').on('click', function() {
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>honor_lembur/update_data",
        dataType: "JSON",
        data: {
          id_setting: $('#id_setting').val(),
          nominal: $('#nominal').val()
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

  });
</script>