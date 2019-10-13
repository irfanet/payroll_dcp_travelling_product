<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $this->lang->line('data_absensi'); ?>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12" id="info"></div>
    </div>
    <div class="row">
      <div class="col-xs-12 col-md-12 col-lg-2">
        <div class="box box-solid box-default">
          <div class="box-header">
            <h3 class="box-title"><?= $this->lang->line('import_absensi'); ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <center>
              <a class="btn btn-app btn-lg" data-toggle="modal" id="btn_add_modal" data-target="#modal_import">
                <i class="fa fa-plus"></i> <?= $this->lang->line('import'); ?>
              </a>
              <br>
              <a href="<?= base_url()?>absensi/export" class="btn btn-app btn-lg" id="export">
                <i class="fa fa-file-excel-o"></i> <?= $this->lang->line('export'); ?>
              </a>
            </center>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="col-xs-12 col-md-12 col-lg-10">
        <!-- Custom Tabs (Pulled to the right) -->
        <div class="nav-tabs-custom bg-info">
          <ul class="nav nav-tabs pull-right">
            <li class="active"><a href="#tab_1-1" data-toggle="tab"><?= $this->lang->line('berangkat'); ?></a></li>
            <li><a href="#tab_2-2" data-toggle="tab"><?= $this->lang->line('tidak_berangkat'); ?></a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#order_by">
              <?= $this->lang->line('absensi_orderby'); ?> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#action1"><?= $this->lang->line('absensi_semua'); ?></a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#action2"><?= $this->lang->line('masuk_normal'); ?></a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#action3"><?= $this->lang->line('terlambat'); ?></a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#action4"><?= $this->lang->line('izin'); ?></a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#action5"><?= $this->lang->line('sakit'); ?></a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#action6"><?= $this->lang->line('izin_resmi'); ?></a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#action7"><?= $this->lang->line('cuti'); ?></a></li>
                <li role="presentation" class="divider"></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
              </ul>
            </li>
            <li class="pull-left header"><i class="fa fa-th"></i><?= $this->lang->line('data_absensi'); ?></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_1-1">
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <table id="example" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="15"><?= $this->lang->line('no'); ?></th>
                      <th><?= $this->lang->line('nik'); ?></th>
                      <th><?= $this->lang->line('nama_karyawan'); ?></th>
                      <th><?= $this->lang->line('tgl_absensi'); ?></th>
                      <th><?= $this->lang->line('jam_datang'); ?></th>
                      <th><?= $this->lang->line('jam_pulang'); ?></th>
                      <th><?= $this->lang->line('kd_status'); ?></th>
                      <th><?= $this->lang->line('lembur'); ?></th>
                      <th width="15%"><?= $this->lang->line('aksi'); ?></th>
                    </tr>
                  </thead>
                  <tbody id="show_data">
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.tab-pane -->
            <div class="tab-pane" id="tab_2-2">
              <!-- /.box-header -->
              <div class="box-body table-responsive">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="15"><?= $this->lang->line('no'); ?></th>
                      <th><?= $this->lang->line('nik'); ?></th>
                      <th><?= $this->lang->line('nama_karyawan'); ?></th>
                      <th><?= $this->lang->line('kd_status'); ?></th>
                      <th width="15%"><?= $this->lang->line('aksi'); ?></th>
                    </tr>
                  </thead>
                  <tbody id="show_data2">
                  </tbody>
                </table>
              </div>
              <!-- /.box-body -->
            </div>
          </div>
          <!-- /.tab-content -->
        </div>
        <!-- nav-tabs-custom -->
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- /.modal upload excel -->
<div class="modal fade" id="modal_import">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= $this->lang->line('import_absensi'); ?></h4>
      </div>
      <form method="post" action='<?= base_url("absensi/import_excel") ?>' enctype="multipart/form-data" class="form-horizontal form-label-left">
        <div class="modal-body">
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="import_tgl_absensi"><?= $this->lang->line('tgl_absensi'); ?> <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <input type="text" id="import_tgl_absensi" name="import_tgl_absensi" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="file_excel"><?= $this->lang->line('excel_absensi'); ?> <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <input type="file" name="file" accept=".xls" id="exampleInputFile" required>
                <p class="help-block"><?= $this->lang->line('ket_file'); ?></p>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('bt_batal'); ?></button>
          <input type="submit" name="import" value="<?= $this->lang->line('bt_upload'); ?>" class="btn btn-primary">
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal upload excel -->

<!-- /.modal tambah dan edit -->
<div class="modal fade" id="modal_add">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" name="show_in_edit"><?= $this->lang->line('edit_user'); ?></h4>
      </div>
      <form id="form_add" data-parsley-validate class="form-horizontal form-label-left">
        <div class="modal-body">
          <input type="hidden" id="id_absensi" name="id_absensi">
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="nik"><?= $this->lang->line('nik'); ?> <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <input type="text" id="nik" name="nik" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="tgl_absensi"><?= $this->lang->line('tgl_absensi'); ?> <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <input type="text" id="tgl_absensi" name="tgl_absensi" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="jam_datang" name="jam_datang"><?= $this->lang->line('jam_datang'); ?> <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <input type="text" id="jam_datang" name="jam_datang" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="jam_pulang" name="jam_pulang"><?= $this->lang->line('jam_pulang'); ?> <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <input type="text" id="jam_pulang" name="jam_pulang" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="kd_status"><?= $this->lang->line('kd_status'); ?> <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <select class="form-control" name="kd_status" id="kd_status">

                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="row" name="show_in_edit">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="lembur"><?= $this->lang->line('lembur'); ?> <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <input type="text" id="lembur" name="lembur" required class="form-control col-md-7 col-xs-12">  
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

<!-- /.modal hapus -->
<div class="modal modal-danger fade" id="modal_delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= $this->lang->line('hapus_data'); ?></h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_data" id="id_data">
        <h5><?= $this->lang->line('yakin'); ?></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('bt_tidak'); ?></button>
        <button type="button" id="btn_hapus" class="btn btn-outline"><?= $this->lang->line('bt_ya'); ?></button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal hapus -->


<script type="text/javascript">
  $(document).ready(function() {
    var kondisi;
    var url;
    var tabel;
    var show_data;
    url = "absensi/get_data";
    tabel = "#example";
    show_data = "#show_data";
    tampil_data();
    tampil_status();

    $('a[href="#action1"]').on('click', function() {
      url = "absensi/get_data";
      tabel = "#example";
      show_data = "#show_data";
      tampil_data();
    });
    $('a[href="#action2"]').on('click', function() {
      url = "absensi/get_masuk_normal";
      tabel = "#example";
      show_data = "#show_data";
      $('#order_by').text('Masuk Normal');
      tampil_data();
    });
    $('a[href="#action3"]').on('click', function() {
      url = "absensi/get_terlambat";
      tabel = "#example";
      show_data = "#show_data";
      tampil_data();
    });
    $('a[href="#tab_1-1"]').on('click', function() {
      url = "absensi/get_data";
      tabel = "#example";
      show_data = "#show_data";
      tampil_data();
    });
    $('a[href="#tab_2-2"]').on('click', function() {
      url2 = "absensi/get_koreksi_data";
      tabel2 = "#example2";
      show_data2 = "#show_data2";
      tampil_data2();
    });



    function tampil_status() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>absensi/get_status',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '<option value="">-- Pilih Salah Satu --</option>';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<option value="' + data[i].kd_status + '">' + data[i].nama_status + '</option>';
          }
          $('#kd_status').html(html);
        }

      });
    }

    //hitung terlambat permenit
    function hitung_terlambat(jam) {
      var time_start = new Date();
      var time_end = new Date();
      var jam_masuk = "08:00:00".split(':');
      var jam_datang = jam.split(':');

      time_start.setHours(jam_masuk[0], jam_masuk[1], jam_masuk[2], 0)
      time_end.setHours(jam_datang[0], jam_datang[1], jam_datang[2], 0)

      return (time_end - time_start)/60000
    }

    //fungsi tampil data
    function tampil_data() {
      $.ajax({
        type: 'ajax',
        url: "<?= base_url() ?>" + url + "",
        async: false,
        dataType: 'json',
        success: function(data) {
          $("" + tabel + "").dataTable().fnDestroy();
          var status;
          var tgl;
          var html = '';
          var i;
          var no = 1;
          for (i = 0; i < data.length; i++) {
            var terlambat;
            terlambat = hitung_terlambat(data[i].jam_datang);
            if (data[i].kd_status == "TR") {
              status = data[i].nama_status + " <br> " + terlambat +  " menit " ;
            } else {
              status = data[i].nama_status;
            }
            html += '<tr>' +
              '<td>' + no++ + '</td>' +
              '<td>' + data[i].nik + '</td>' +
              '<td>' + data[i].nama + '</td>' +
              '<td>' + data[i].tgl_absensi + '</td>' +
              '<td>' + data[i].jam_datang + '</td>' +
              '<td>' + data[i].jam_pulang + '</td>' +
              '<td>' + status + '</td>' +
              '<td>' + data[i].lembur + '</td>' +
              '<td style="text-align:center;">' +
              '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].id_absensi + '"><?= $this->lang->line('bt_edit'); ?></a>' + ' ' +
              // '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].id_absensi + '"><?= $this->lang->line('bt_hapus'); ?></a>' +
              '</td>' +
              '</tr>';
          }
          $("" + show_data + "").html(html);
          $("" + tabel + "").DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
          });
        }
      });
    }

    //fungsi tampil data tdk berangkat
    function tampil_data2() {
      $.ajax({
        type: 'ajax',
        url: "<?= base_url() ?>" + url2 + "",
        async: false,
        dataType: 'json',
        success: function(data) {
          $("" + tabel2 + "").dataTable().fnDestroy();
          var html = '';
          var i;
          var no = 1;
          for (i = 0; i < data.length; i++) {
            html += '<tr>' +
              '<td>' + no++ + '</td>' +
              '<td>' + data[i].nik + '</td>' +
              '<td>' + data[i].nama + '</td>' +
              '<td>' + status + '</td>' +
              '<td style="text-align:center;">' +
              '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].id_absensi + '"><?= $this->lang->line('bt_edit'); ?></a>' + ' ' +
              // '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].id_absensi + '"><?= $this->lang->line('bt_hapus'); ?></a>' +
              '</td>' +
              '</tr>';
          }
          $("" + show_data2 + "").html(html);
          $("" + tabel2 + "").DataTable({
            'paging': true,
            'lengthChange': true,
            'searching': true,
            'ordering': true,
            'info': true,
            'autoWidth': true
          });
        }
      });
    }


    //ATUR HIDE AND SHOW
    $('#btn_add_modal').on('click', function() {
      kondisi = "tambah";
      $('#form_add')[0].reset();
      $('[name="show_in_edit"]').hide();
      $('#tgl_absensi').attr('readonly', false);
      $('#nama_karyawan').attr('readonly', false);
      $('#modal_add').on('shown.bs.modal', function() {
        $('#tgl_absensi').focus()
      });
    });

    //TOMBOL EDIT -> GET KODE & ATUR HIDE AND SHOW
    $('#show_data').on('click', '.item_edit', function() {
      kondisi = "edit";
      var id = $(this).attr('data');
      $.ajax({
        type: "GET",
        url: "<?= base_url() ?>absensi/get_kode",
        dataType: "JSON",
        data: {
          id: id
        },
        success: function(data) {
          $.each(data, function(id_absensi, nik, tgl_absensi, jam_datang, jam_pulang, kd_status, lembur) {
            $('#modal_add').modal('show');
            // $('[name="show_in_edit"]').show();
            $('#id_absensi').val(data.id_absensi);
            $('#nik').val(data.nik);
            $('#jam_datang').val(data.jam_datang);
            $('#jam_pulang').val(data.jam_pulang);
            $('#tgl_absensi').val(data.tgl_absensi).attr('readonly', true);
            // $('#nama_karyawan').val(data.nama_karyawan).attr('readonly', false);
            $('#kd_status').val(data.kd_status);
            $('#lembur').val(data.lembur);

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
      if (kondisi == "tambah") {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>absensi/simpan_data",
          dataType: "JSON",
          data: {
            tgl_absensi: $('#tgl_absensi').val(),
            nama_karyawan: $('#nama_karyawan').val(),
            jam_datang: $('#jam_datang').val(),
            jam_pulang: $('#jam_pulang').val(),
            kd_status: $('#kd_status').val()
          },
          success: function(data) {
            if (data.success == true) {
              $('#info').append('<div class="alert alert-success"><i class="fa fa-check"></i>' +
                ' <?= $this->lang->line('notif_simpan'); ?> ' + '</div>');
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
      //EDIT DATA
      else if (kondisi == "edit") {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>absensi/update_data",
          dataType: "JSON",
          data: {
            id_absensi: $('#id_absensi').val(),
            nik: $('#nik').val(),
            tgl_absensi: $('#tgl_absensi').val(),
            jam_datang: $('#jam_datang').val(),
            jam_pulang: $('#jam_pulang').val(),
            kd_status: $('#kd_status').val(),
            lembur: $('#lembur').val()
          },
          success: function(data) {
            if (data.success == true) {
              $('#info').append('<div class="alert alert-success"><i class="fa fa-check"></i>' +
                ' <?= $this->lang->line('notif_update'); ?> ' + '</div>');
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

    //HAPUS DATA
    $('#btn_hapus').on('click', function() {
      var kode = $('#id_data').val();
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>absensi/hapus_data",
        dataType: "JSON",
        data: {
          kode: kode
        },
        success: function(data) {
          $('#modal_delete').modal('hide');
          tampil_data();
          $('#info').append('<div class="alert alert-danger"><i class="fa fa-trash-o"></i>' +
            ' <?= $this->lang->line('notif_hapus'); ?>' + '</div>');
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

  $(function() {
    //Date picker
    $('#tgl_absensi').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    })
  })
  $(function() {
    //Date picker
    $('#import_tgl_absensi').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy'
    })
  })
</script>