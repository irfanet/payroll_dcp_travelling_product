<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>User</h3>
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
            <h2>Tambah Absen</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <center>
              <a class="btn btn-app btn-lg" data-toggle="modal" id="btn_add_modal" data-target="#modal_add">
                <i class="fa fa-plus"></i> Tambah Absen
              </a>
            </center>
          </div>
        </div>
      </div>

      <!-- TABEL DATA -->
      <div class="col-md-10 col-sm-10 col-xs-10">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Absen</h2>
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
                  <th class="column-title">NPP</th>
                  <th class="column-title">Tanggal</th>
                  <th class="column-title">Absen Datang</th>
                  <th class="column-title">Absen Pulang</th>
                  <th class="column-title">Keterangan</th>
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
        <h4 class="modal-title" name="show_in_add">Tambah Absen</h4>
        <h4 class="modal-title" name="show_in_edit">Edit Absen</h4>
      </div>
      <form id="form_add" data-parsley-validate class="form-horizontal form-label-left">
        <div class="modal-body">
          <input type="hidden" id="id_absen" name="id_absen">
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="npp">NPP <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="NPP" id="NPP">
                  
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12">
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tgl">Tanggal <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class='input-group date' name="input_tgl">
                  <input type='text' class="form-control" name="tgl" id="tgl" required />
                  <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                  </span>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-1 col-sm-1 col-xs-12">
              </label>
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ajam_datang" name="jam_datang">Jam Datang <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class='input-group date' name="input_jam">
                            <input type='text' id="jam_datang" name="jam_datang" readonly class="form-control" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                    </div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-1 col-sm-1 col-xs-12">
              </label>
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="jam_pulang" name="jam_pulang">Jam Pulang <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class='input-group date' name="input_jam">
                            <input type='text' id="jam_pulang" name="jam_pulang" readonly class="form-control" />
                            <span class="input-group-addon">
                               <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                    </div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="keterangan">Keterangan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="keterangan" name="keterangan" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal" id="btn_cancel">Batal</button>
            <input type="submit" name="btn_update" id="btn_update" value="Perbaharui" class="btn btn-primary">
            <input type="submit" name="btn_simpan" id="btn_simpan" value="Simpan" class="btn btn-primary">
          </div>
      </form>
    </div>
  </div>
</div>
<!-- END TAMBAH & EDIT MODAL -->

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
<!-- Select2js -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>

<script type="text/javascript">
  $(document).ready(function() {
    tampil_data();
    tampil_npp();
    

    function tampil_npp() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>absen/get_npp',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '<option value="">-- Pilih Salah Satu --</option>';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<option value="' + data[i].NPP + '">' + data[i].nama + '</option>';
          }
          $('#NPP').html(html);
        }

      });
    }
    //fungsi tampil data
    function tampil_data() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>absen/get_koreksi_data',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '';
          var i;
          var no = 1;
          for (i = 0; i < data.length; i++) {
            html += '<tr>' +
              '<td>' + no++ + '</td>' +
              '<td>' + data[i].NPP + '</td>' +
              '<td>' + data[i].tgl + '</td>' +
              '<td>' + data[i].jam_datang + '</td>' +
              '<td>' + data[i].jam_pulang + '</td>' +
              '<td>' + data[i].keterangan + '</td>' +
              '<td style="text-align:right;">' +
              '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].id_absen + '">Edit</a>' + ' ' +
              '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].id_absen + '">Hapus</a>' +
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
      $('#form_add')[0].reset();
    });

    //TOMBOL EDIT -> GET KODE & ATUR HIDE AND SHOW
    $('#show_data').on('click', '.item_edit', function() {
      var id = $(this).attr('data');
      $.ajax({
        type: "GET",
        url: "<?= base_url() ?>absen/get_kode",
        dataType: "JSON",
        data: {
          id: id
        },
        success: function(data) {
          $.each(data, function(id_absen, NPP, tgl, jam_datang, jam_pulang, keterangan) {
            $('#modal_add').modal('show');
            $('[name="show_in_add"]').hide();
            $('[name="show_in_edit"]').show();
            $('#id_absen').val(data.id_absen);
            $('#NPP').val(data.NPP).attr('readonly', true);
            $('#tgl').val(data.tgl).attr('readonly', true);
            $('#tgl').attr('readonly', true);
            $('#jam_datang').val(data.jam_datang);
            $('#jam_pulang').val(data.jam_pulang);
            $('#keterangan').val(data.keterangan);
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
        url: "<?= base_url() ?>absen/simpan_data",
        dataType: "JSON",
        data: {
          id_absen : $('#id_absen').val(),
          NPP: $('#NPP').val(),
          tgl: $('#tgl').val(),
          jam_datang: $('#jam_datang').val(),
          jam_pulang: $('#jam_pulang').val(),
          keterangan: $('#keterangan').val()
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
    $('[name="btn_update"]').on('click', function() {
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>absen/update_data",
        dataType: "JSON",
        data: {
          id_absen: $('#id_absen').val(),
          NPP: $('#NPP').val(),
          tgl: $('#tgl').val(),
          jam_datang: $('#jam_datang').val(),
          jam_pulang: $('#jam_pulang').val(),
          keterangan: $('#keterangan').val()
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

    //HAPUS DATA
    $('#btn_hapus').on('click', function() {
      var kode = $('#id_data').val();
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>absen/hapus_data",
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