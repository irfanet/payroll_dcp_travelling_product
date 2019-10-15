<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $this->lang->line('data_kalender'); ?>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12" id="info"></div>
    </div>
    <div class="row">
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-red"><i class="fa fa-coffee"></i></span>

          <div class="info-box-content">
            <span class="info-box-text"><?= $this->lang->line('libur'); ?></span>
            <span class="info-box-number" id="jumlahLibur"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="info-box">
          <span class="info-box-icon bg-aqua"><i class="fa fa-play"></i></span>

          <div class="info-box-content">
            <span class="info-box-text"><?= $this->lang->line('masuk'); ?></span>
            <span class="info-box-number" id="jumlahMasuk"></span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <div class="row">
      <div class="col-xs-12">
        <div class="callout callout-info">
          <center>
            <?php
            $periode = $this->db->select('*')->order_by('id_periode', "desc")->limit(1)->get('kalender')->row_array();
            ?>
            <input type="hidden" id="id_kalender" name="id_kalender" class="form-control col-md-7 col-xs-12" value="<?= ($periode['id_periode']); ?>">
            <h1 id="isiPeriode"><?= $this->lang->line('periode'); ?>: <?= ($periode['kd_periode']); ?></h1>
            <p id="isiStart"><?= $this->lang->line('mulai'); ?>: <?= tgl($periode['tgl_mulai']); ?></p><br>
            <p id="isiEnd"><?= $this->lang->line('selesai'); ?>: <?= tgl($periode['tgl_selesai']); ?></p><br>
            <button type="button" class="btn btn-block btn-default btn-lg" data-toggle="modal" id="btn_add_modal" data-target="#modal_add"><?= $this->lang->line('ganti_periode'); ?></button><br>
          </center>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="box box-solid box-default">
          <div class="box-header">
            <h3 class="box-title"><?= $this->lang->line('data_kalender'); ?></h3>
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
                  <th><?= $this->lang->line('no'); ?></th>
                  <th><?= $this->lang->line('tanggal'); ?></th>
                  <th><?= $this->lang->line('hari'); ?></th>
                  <th><?= $this->lang->line('status'); ?></th>
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
        <h4 class="modal-title" name="show_in_add"><?= $this->lang->line('ganti_periode'); ?></h4>
        <h4 class="modal-title" name="show_in_edit"><?= $this->lang->line('edit_kalender'); ?></h4>
      </div>
      <form id="form_add" data-parsley-validate class="form-horizontal form-label-left">
        <div class="modal-body">
          <div class="row" name="show_in_add">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="kd_periode"><?= $this->lang->line('kd_periode'); ?> <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <input type="text" id="kd_periode" name="kd_periode" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <div class="row" name="show_in_add">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="tgl_mulai"><?= $this->lang->line('mulai'); ?> <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <input type="text" id="tgl_mulai" name="tgl_mulai" required class="form-control col-md-7 col-xs-12" readonly>
              </div>
            </div>
          </div>
          <div class="row" name="show_in_add">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="tgl_selesai"><?= $this->lang->line('selesai'); ?> <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <input type="text" id="tgl_selesai" name="tgl_selesai" required class="form-control col-md-7 col-xs-12" readonly>
              </div>
            </div>
          </div>
          <div class="row" name="show_in_edit">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="tgl"><?= $this->lang->line('tanggal'); ?> <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <input type="text" id="tgl" name="tgl" required class="form-control col-md-7 col-xs-12" readonly>
              </div>
            </div>
          </div>
          <div class="row" name="show_in_edit">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="status"><?= $this->lang->line('status'); ?> <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <select class="form-control" name="status" id="status" class="form-control col-md-6 col-xs-12">
                  <option value="">-- Pilih Salah Satu --</option>
                  <option value="B">Biasa</option>
                  <option value="S">Setengah Hari</option>
                  <option value="L">Libur</option>
                </select>
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
    var kondisi;

    //fungsi tampil data
    function tampil_data() {
      $.ajax({
        type: "GET",
        url: '<?= base_url() ?>kalender/get_table',
        dataType: 'JSON',
        success: function(data) {
          $('#example2').dataTable().fnDestroy();
          var html = '';
          var hari = '';
          var no = 1;
          for (i = 0; i < data.length; i++, no++) {
            //isi hari b.indo
            if (data[i].hari == 'Sun') {
              hari = 'Minggu'
            } else if (data[i].hari == 'Mon') {
              hari = 'Senin'
            } else if (data[i].hari == 'Tue') {
              hari = 'Selasa'
            } else if (data[i].hari == 'Wed') {
              hari = 'Rabu'
            } else if (data[i].hari == 'Thu') {
              hari = 'Kamis'
            } else if (data[i].hari == 'Fri') {
              hari = 'Jumat'
            } else if (data[i].hari == 'Sat') {
              hari = 'Sabtu'
            }
            html += '<tr>' +
              '<td>' + no + '</td>' +
              '<td>' + data[i].tgl_format + '</td>' +
              '<td>' + hari + '</td>' +
              '<td>' + data[i].status + '</td>' +
              '<td style="align:center;">' +
              '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].tgl + '"><?= $this->lang->line('bt_edit'); ?></a>' +
              '</td>' +
              '</tr>';
          }
          $('#show_data').html(html);
          $('#example2').DataTable({
            'paging': false,
            'lengthChange': true,
            'searching': true,
            'ordering': false,
            'info': true,
            'autoWidth': true
          });
        }

      });

      $.ajax({
        type: 'GET',
        url: '<?= base_url() ?>kalender/get_jumlah',
        async: false,
        dataType: 'json',
        success: function(data) {
          var masuk = data[0].masuk;
          var libur = data[0].libur;
          $('#jumlahMasuk').html(masuk);
          $('#jumlahLibur').html(libur);
        }

      });
    }

    //ATUR HIDE AND SHOW
    $('#btn_add_modal').on('click', function() {
      $('#form_add')[0].reset();
      $('[name="show_in_add"]').show();
      $('[name="show_in_edit"]').hide();
      $('#modal_add').on('shown.bs.modal', function() {
        $('#kd_periode').focus()
      });
      kondisi = "tambah";
    });

    //TOMBOL EDIT -> GET KODE & ATUR HIDE AND SHOW
    $('#show_data').on('click', '.item_edit', function() {
      $('#modal_add').on('shown.bs.modal', function() {
        $('#status').focus()
      });
      kondisi = "edit";
      var id = $(this).attr('data');
      $.ajax({
        type: "GET",
        url: "<?= base_url() ?>kalender/get_kode",
        dataType: "JSON",
        data: {
          id: id
        },
        success: function(data) {
          $.each(data, function(tgl, status) {
            $('#modal_add').modal('show');
            $('[name="show_in_add"]').hide();
            $('[name="show_in_edit"]').show();
            $('#tgl').val(data.tgl);
            $('#status').val(data.status);
          });
        }
      });
      return false;
    });

    //UPDATE DATA
    $('#btn_simpan').on('click', function() {
      if (kondisi == "tambah") {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>kalender/atur_periode",
          dataType: "JSON",
          data: {
            kd_periode: $('#kd_periode').val(),
            tgl_mulai: $('#tgl_mulai').val(),
            tgl_selesai: $('#tgl_selesai').val()
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
              location.reload();
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
      } else {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>kalender/update_data",
          dataType: "JSON",
          data: {
            tgl: $('#tgl').val(),
            status: $('#status').val()
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
      }
    });

  });
</script>
<!-- Page script -->
<script>
  $(function() {
    //Date picker
    $('#tgl_mulai').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
      datesDisabled: '10-10-2019'
    })

    $('#tgl_selesai').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    })
  })
</script>