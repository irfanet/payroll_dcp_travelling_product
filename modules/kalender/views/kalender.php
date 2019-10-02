<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Kalender</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12" id="info"></div>
    </div>
    <div class="row">
      <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-coffee"></i></div>
          <div class="count" id="jumlahLibur"></div>
          <h3>Libur</h3>
          <p>Jumlah libur periode ini.</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-play-circle-o"></i></div>
          <div class="count" id="jumlahMasuk"></div>
          <h3>Masuk</h3>
          <p>Jumlah masuk periode ini.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Status Kalender</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="bs-example" data-example-id="simple-jumbotron">
              <div class="jumbotron">
                <center>
                  <input type="hidden" id="id_kalender" name="id_kalender" class="form-control col-md-7 col-xs-12">
                  <h1 id="isiPeriode">Periode: -</h1>
                  <p id="isiStart">Mulai Tanggal: -</p><br>
                  <p id="isiEnd">Berakhir Tanggal: -</p>
                </center>
              </div>
            </div>
            <div class="actionBar">
              <a class="buttonNext btn btn-success" data-toggle="modal" data-target="#modal_add" id="btn_add_modal">Atur Periode</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- TABEL DATA -->
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Hari</h2>
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

            <table class="table table-hover" cellspacing="0" width="100%">
              <thead>
                <tr class="headings">
                  <th class="column-title" width="5%">No</th>
                  <th class="column-title">Tanggal</th>
                  <th class="column-title">Hari</th>
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
</div>
<!-- /page content -->

<br>

<br>

<br>

<!-- EDIT MODAL -->
<div class="modal fade bs-example-modal-lg" id="modal_add" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title">Atur Kalender</h4>
      </div>
      <form id="form_add" data-parsley-validate class="form-horizontal form-label-left">
        <div class="modal-body">

          <div class="row" name="show_in_add">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="judul_periode">Judul Periode <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="judul_periode" name="judul_periode" required class="form-control col-md-7 col-xs-12" required>
              </div>
            </div>
          </div>
          <br name="show_in_add">
          <div class="row" name="show_in_add">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tgl_mulai">Tanggal Awal <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class='input-group date' id='tgl_kontrak_date'>
                  <input type='text' class="form-control" name="tgl_mulai" id="tgl_mulai" required readonly />
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <br name="show_in_add">
          <div class="row" name="show_in_add">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tgl_selesai">Tanggal Akhir <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class='input-group date' id='tgl_masuk_date'>
                  <input type='text' class="form-control" name="tgl_selesai" id="tgl_selesai" required readonly />
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>

          <input type="hidden" id="tgl" name="tgl" class="form-control col-md-7 col-xs-12">
          <div class="row" name="show_in_edit">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="status">Status <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
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
          <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_cancel">Batal</button>
          <input type="submit" id="btn_update" value="Simpan" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- EDIT MODAL -->

<!-- ASYNCRONUS NGERI TOK -->
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
<script type="text/javascript">
  $(document).ready(function() {
    tampil_data();
    var kondisi;
    // $('#datatable-responsive').dataTable();

    //fungsi tampil data
    function tampil_data() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>kalender/get_data',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = 'Periode: ' + data[0].judul_periode;
          $('#isiPeriode').html(html);
          var html = 'Mulai Tanggal: ' + data[0].tgl_mulai_format;
          $('#isiStart').html(html);
          var html = 'Berakhir Tanggal: ' + data[0].tgl_selesai_format;
          $('#isiEnd').html(html);
          $.ajax({
            type: "GET",
            url: '<?= base_url() ?>kalender/get_table',
            dataType: 'JSON',
            data: {
              tglStart: data[0].tgl_mulai,
              tglEnd: data[0].tgl_selesai
            },
            success: function(data) {
              html = '';
              var hari = '';
              var no=1;
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
                  '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].tgl + '">Edit</a>' + ' ' +
                  '</td>' +
                  '</tr>';
              }
              $('#show_data').html(html);
            }

          });

          $.ajax({
              type: 'GET',
              url: '<?= base_url() ?>kalender/get_jumlah',
              async: false,
              dataType: 'json',
              data: {
                tglStart: data[0].tgl_mulai,
                tglEnd: data[0].tgl_selesai
              },
              success: function(data) {
                var masuk = data[0].masuk;
                var libur = data[0].libur;
                $('#jumlahMasuk').html(masuk);
                $('#jumlahLibur').html(libur);
              }

            });
        }

      });
    }

    //ATUR HIDE AND SHOW
    $('#btn_add_modal').on('click', function() {
      $('#form_add')[0].reset();
      $('[name="show_in_add"]').show();
      $('[name="show_in_edit"]').hide();
      kondisi = "tambah";
    });

    //TOMBOL EDIT -> GET KODE & ATUR HIDE AND SHOW
    $('#show_data').on('click', '.item_edit', function() {
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
    $('#btn_update').on('click', function() {
      if (kondisi == "tambah") {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>kalender/atur_periode",
          dataType: "JSON",
          data: {
            judul_periode: $('#judul_periode').val(),
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