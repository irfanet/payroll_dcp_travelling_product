<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $this->lang->line('data_honor'); ?>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12" id="info"></div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="box box-solid box-default">
          <div class="box-header">
            <h3 class="box-title"><?= $this->lang->line('data_honor'); ?></h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <div class="btn-group">
                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-cog"></i></button>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#" id="a_operator">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                </ul>
              </div>
            </div>
          </div>


          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th><?= $this->lang->line('honor'); ?></th>
                  <th width="15%"><?= $this->lang->line('aksi'); ?></th>
                </tr>
              </thead>
              <tbody id="show_data">
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- /.modal tambah dan edit -->
<div class="modal fade" id="modal_add">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" name="show_in_edit"><?= $this->lang->line('edit_honor'); ?></h4>
      </div>
      <form id="form_add" data-parsley-validate class="form-horizontal form-label-left">
        <div class="modal-body">
          <input type="hidden" id="id_honor" name="id_honor" required class="form-control col-md-7 col-xs-12">
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="honor"><?= $this->lang->line('honor'); ?> <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <input type="text" id="honor" name="honor" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('bt_batal'); ?></button>
          <input type="submit" name="btn_simpan" id="btn_simpan" value="<?= $this->lang->line('bt_simpan'); ?>" class="btn btn-primary">
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal tambah dan edit -->

<script type="text/javascript">
  $(document).ready(function() {
    tampil_data();

    //fungsi tampil data
    function tampil_data() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>honor_lembur/get_data',
        async: false,
        dataType: 'json',
        success: function(data) {
          $('#example2').dataTable().fnDestroy();
          var html = '';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<tr>' +
              '<td>IDR ' + data[i].honor.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>' +
              '<td style="text-align:center;">' +
              '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].id_honor + '"><?= $this->lang->line('bt_edit'); ?></a>' + ' ' +
              '</td>' +
              '</tr>';
          }
          $('#show_data').html(html);
          $('#example2').DataTable({
            'paging': false,
            'lengthChange': true,
            'searching': false,
            'ordering': false,
            'info': true,
            'autoWidth': true
          });
        }

      });
    }

    //TOMBOL EDIT -> GET KODE & ATUR HIDE AND SHOW
    $('#show_data').on('click', '.item_edit', function() {
      kondisi = "edit";
      var id = $(this).attr('data');
      $.ajax({
        type: "GET",
        url: "<?= base_url() ?>honor_lembur/get_kode",
        dataType: "JSON",
        data: {
          id: id
        },
        success: function(data) {
          $.each(data, function(id_honor, honor) {
            $('#modal_add').modal('show');
            $('[name="show_in_add"]').hide();
            $('[name="show_in_edit"]').show();
            $('#id_honor').val(data.id_honor).attr('readonly', true);
            $('#honor').val(data.honor);
            $('#modal_add').on('shown.bs.modal', function() {
              $('#honor').focus()
            });
          });
        }
      });
      return false;
    });

    //SIMPAN DATA
    $('#btn_simpan').on('click', function() {
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>honor_lembur/update_data",
        dataType: "JSON",
        data: {
          id_honor: $('#id_honor').val(),
          honor: $('#honor').val()
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