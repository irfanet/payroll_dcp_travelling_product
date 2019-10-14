<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $this->lang->line('data_gaji'); ?>
    </h1>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12" id="info"></div>
    </div>
    <div class="row">
      <div class="col-xs-3 col-md-3 col-lg-2">
        <div class="box box-solid box-default">
          <div class="box-header">
            <h3 class="box-title"><?= $this->lang->line('hitung_gaji'); ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <center>
              <a class="btn btn-app btn-lg"  href="<?= base_url()?>gaji/hitung_gaji">
                <i class="fa fa-calculator"></i> <?= $this->lang->line('hitung'); ?>
              </a>
            </center>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="col-xs-3 col-md-3 col-lg-2">
        <div class="box box-solid box-default">
          <div class="box-header">
            <h3 class="box-title"><?= $this->lang->line('export'); ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <center>
              <a class="btn btn-app btn-lg" href="<?= base_url()?>gaji/export">
                <i class="fa fa-file-excel-o"></i> <?= $this->lang->line('export'); ?>
              </a>
            </center>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <div class="col-xs-3 col-md-3 col-lg-2">
        <div class="box box-solid box-default">
          <div class="box-header">
            <h3 class="box-title">JSON</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <center>
              <a class="btn btn-app btn-lg"  href="<?= base_url()?>gaji/hitung_gaji_json" target="_blank">
                <i class="fa fa-file-code-o"></i> Cek JSON
              </a>
            </center>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-12 col-lg-12">
            <div class="box box-solid box-default">
            <div class="box-header">
                <h3 class="box-title"><?= $this->lang->line('data_spl'); ?></h3>
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
                    <th><?= $this->lang->line('nik'); ?></th>
                    <th><?= $this->lang->line('nama_karyawan'); ?></th>
                    <th><?= $this->lang->line('departemen'); ?></th>
                    <th><?= $this->lang->line('jabatan'); ?></th>
                    <th><?= $this->lang->line('jumlah'); ?></th>
                    <th><?= $this->lang->line('hari_kerja'); ?></th>
                    <th><?= $this->lang->line('izin'); ?></th>
                    <th><?= $this->lang->line('absen'); ?></th>
                    <th><?= $this->lang->line('sakit'); ?></th>
                    <th><?= $this->lang->line('izin_resmi'); ?></th>
                    <th><?= $this->lang->line('cuti'); ?></th>
                    <th><?= $this->lang->line('lembur'); ?></th>
                    <th><?= $this->lang->line('menit_terlambat'); ?></th>
                    <th><?= $this->lang->line('hari_terlambat'); ?></th>
                    <th><?= $this->lang->line('periode'); ?></th>
                    <th><?= $this->lang->line('total_gaji'); ?></th>
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
        <h4 class="modal-title" name="show_in_add"><?= $this->lang->line('tambah_spl'); ?></h4>
        <h4 class="modal-title" name="show_in_edit"><?= $this->lang->line('edit_spl'); ?></h4>
      </div>
      <form id="form_add" data-parsley-validate class="form-horizontal form-label-left">
        <div class="modal-body">
          <!-- <input type="hidden" id="id_absensi" name="id_absensi"> -->
          <input type="hidden" id="jml" name="jml">
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="id_absensi_nik"><?= $this->lang->line('nama_karyawan'); ?> <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <select class="form-control select2"  style="width: 100%;" multiple name="id_absensi_nik" id="id_absensi_nik">
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="tgl_lembur"><?= $this->lang->line('tgl_lembur'); ?> <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-6">
                <input type="text" id="tgl_lembur" name="tgl_lembur" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br name="show_in_add">
          <div class="row" name="show_in_add">
            <div class="form-group">
              <label class="control-label col-md-4 col-sm-4 col-xs-4" for="lembur" name="lembur"><?= $this->lang->line('lembur'); ?> <span class="required">*</span>
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
      
    $('.select2').select2()
    tampil_data();
    tampil_nik();
    var kondisi;

    document.getElementById("id_absensi_nik").onchange = function () {
      var count = $('#id_absensi_nik option:selected').length;
      $("#jml").val(count);
    }

    function tampil_nik() {
        $.ajax({
          type: 'ajax',
          url: '<?= base_url() ?>gaji/get_nik',
          async: false,
          dataType: 'json',
          success: function(data) {
            var html = '<option value="" disabled>-- Pilih Salah Satu --</option>';
            var i;
            for (i = 0; i < data.length; i++) {
              html += '<option value="' + data[i].id_absensi + '">' +  data[i].nik + " - " + data[i].nama + '</option>';
            }
            $('#id_absensi_nik').html(html);
          }

        });
    }

    //fungsi tampil data
    function tampil_data() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>gaji/get_data',
        async: false,
        dataType: 'json',
        success: function(data) {
          $('#example2').dataTable().fnDestroy();
          var html = '';
          var i;
          var no = 1;
          for (i = 0; i < data.length; i++) {
            html += '<tr>' +
              '<td>' + no++ + '</td>' +
              '<td>' + data[i].nik + '</td>' +
              '<td>' + data[i].nama + '</td>' +
              '<td>' + data[i].kd_departemen + '</td>' +
              '<td>' + data[i].kd_jabatan + '</td>' +
              '<td>' + data[i].jumlah + '</td>' +
              '<td>' + data[i].hari_kerja + '</td>' +
              '<td>' + data[i].izin + '</td>' +
              '<td>' + data[i].absen + '</td>' +
              '<td>' + data[i].sakit + '</td>' +
              '<td>' + data[i].izin_resmi + '</td>' +
              '<td>' + data[i].cuti + '</td>' +
              '<td>' + data[i].lemburan + '</td>' +
              '<td>' + data[i].menit_terlambat + '</td>' +
              '<td>' + data[i].hari_terlambat + '</td>' +
              '<td>' + data[i].kd_periode + '</td>' +
              '<td>IDR. ' + data[i].total_gaji.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>' +
              '<td style="text-align:center;">' +
            //   '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].id_absensi + '"><?= $this->lang->line('bt_edit'); ?></a>' + ' ' +
              '<a href="javascript:;" class="btn btn-warning btn-xs item_salah" data="' + data[i].id_gaji + '">X</a>' +
              '</td>' +
              '</tr>';
          }
          $('#show_data').html(html);
          $('#example2').DataTable({
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
      $('[name="show_in_add"]').show();
      $('[name="show_in_edit"]').hide();
      $('#nik').attr('readonly', false);
      $('#tgl_lembur').attr('readonly', false);
      $('#modal_add').on('shown.bs.modal', function() {
        $('#nik').focus()
      });
    });

    //TOMBOL EDIT -> GET KODE & ATUR HIDE AND SHOW
    $('#show_data').on('click', '.item_edit', function() {
      kondisi = "edit";
      var id = $(this).attr('data');
      $.ajax({
        type: "GET",
        url: "<?= base_url() ?>gaji/get_kode",
        dataType: "JSON",
        data: {
          id: id
        },
        success: function(data) {
          $.each(data, function(id_absensi, nik, tgl_lembur, level, is_active) {
            $('#modal_add').modal('show');
            $('[name="show_in_add"]').hide();
            $('[name="show_in_edit"]').show();
            $('#id_absensi').val(data.id_absensi);
            $('#nik').val(data.nik).attr('readonly', true);
            $('#tgl_lembur').val(data.tgl_lembur).attr('readonly', false);
            $('#level').val(data.level);
            $('#is_active').val(data.is_active);
            $('#modal_add').on('shown.bs.modal', function() {
              $('#tgl_lembur').focus()
            });
          });
        }
      });
      return false;
    });

    //TOMBOL SALAH -> GET KODE
    $('#show_data').on('click', '.item_salah', function() {
      var id = $(this).attr('data');
      $.ajax({
        type: "GET",
        url: "<?= base_url() ?>gaji/data_salah",
        dataType: "JSON",
        data: {
          id: id
        },
        success: function(data) {
          // $('#modal_delete').modal('hide');
          tampil_data();
          $('#info').append('<div class="alert alert-warning"><i class="fa fa-trash-o"></i>' +
            ' <?= $this->lang->line('notif_hapus'); ?>' + '</div>');
          $('.alert-warning').delay(500).show(1000, function() {
            $(this).delay(2000).slideUp(500, function() {
              $(this).remove();
            });
          })
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
          url: "<?= base_url() ?>gaji/simpan_data",
          dataType: "JSON",
          data: {
            id_absensi_nik: $('#id_absensi_nik').val(),
            jml: $('#jml').val(),
            lembur: $('#lembur').val(),
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
          url: "<?= base_url() ?>gaji/update_data",
          dataType: "JSON",
          data: {
            id_absensi_nik: $('#id_absensi_nik').val(),
            tgl_lembur: $('#tgl_lembur').val(),
            level: $('#level').val(),
            is_active: $('#is_active').val()
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

     //DATA SALAH
     $('#btn_hapus').on('click', function() {
      var kode = $('#id_data').val();
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>gaji/hapus_data",
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

    //HAPUS DATA
    $('#btn_hapus').on('click', function() {
      var kode = $('#id_data').val();
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>gaji/hapus_data",
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
</script>