<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Pegawai</h3>
      </div>
    </div>
    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12" id="info"></div>
    </div>
    <div class="row">
      <div class="col-lg-3 col-md-3">
        <div class="x_panel">
          <div class="x_title">
            <h2>Tambah Pegawai</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <center>
              <a class="btn btn-app btn-lg" data-toggle="modal" data-target="#modal_add" id="btn_add_modal">
                <i class="fa fa-plus"></i> Tambah
              </a>
            </center>
          </div>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-group"></i></div>
          <div class="count" id="jumlahPegawai"></div>
          <h3>Jumlah</h3>
          <p>Jumlah seluruh pegawai aktif.</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-male"></i></div>
          <div class="count" id="jumlahLaki"></div>
          <h3>Laki-laki</h3>
          <p>Jumlah pegawai laki-laki aktif.</p>
        </div>
      </div>
      <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="tile-stats">
          <div class="icon"><i class="fa fa-female"></i></div>
          <div class="count" id="jumlahPerempuan"></div>
          <h3>Perempuan</h3>
          <p>Jumlah pegawai perempuan aktif.</p>
        </div>
      </div>
    </div>
    <div class="row">
      <!-- TABEL DATA -->
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Daftar Pegawai</h2>
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
          <div class="x_content" id="coba">

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap jambo_table" cellspacing="0" width="100%">
              <thead>
                <tr class="headings">
                  <th class="column-title" width="5%">No</th>
                  <th class="column-title">NPP</th>
                  <th class="column-title">Nama Pegawai</th>
                  <th class="column-title">Sex</th>
                  <th class="column-title">Bagian</th>
                  <th class="column-title">Divisi</th>
                  <th class="column-title">Jabatan</th>
                  <th class="column-title">Gapok</th>
                  <th class="column-title">Status</th>
                  <th class="column-title" width="10%">Aksi</th>
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
        <h4 class="modal-title" name="show_in_add">Tambah Pegawai</h4>
        <h4 class="modal-title" name="show_in_edit">Edit Pegawai</h4>
      </div>
      <form id="form_add" data-parsley-validate class="form-horizontal form-label-left">
        <div class="modal-body">
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="NPP">NPP <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="NPP" name="NPP" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="nama">Nama Pegawai <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="nama" name="nama" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="sex">Sex <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="sex" id="sex" class="form-control col-md-6 col-xs-12">
                  <option value="">-- Pilih Salah Satu --</option>
                  <option value="Laki-laki">Laki-laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="id_status">Status <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="id_status" id="id_status" class="form-control col-md-6 col-xs-12" required>
                  <!-- status -->
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="kode_bagian">Bagian <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="kode_bagian" id="kode_bagian" class="form-control col-md-6 col-xs-12" required>
                  <!-- bagian -->
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="kode_divisi">Divisi <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="kode_divisi" id="kode_divisi" class="form-control col-md-6 col-xs-12" required>
                  <!-- divisi -->
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="kode_jabatan">Jabatan <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control" name="kode_jabatan" id="kode_jabatan" class="form-control col-md-6 col-xs-12" required>
                  <!-- jabatan -->
                </select>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tgl_masuk">Tanggal Masuk <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class='input-group date' id='tgl_masuk_date'>
                  <input type='text' class="form-control" name="tgl_masuk" id="tgl_masuk" required readonly />
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
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tgl_keluar">Tanggal Keluar <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class='input-group date' id='tgl_keluar_date'>
                  <input type='text' class="form-control" name="tgl_keluar" id="tgl_keluar" required readonly />
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
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tgl_kontrak">Tanggal Kontrak <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class='input-group date' id='tgl_kontrak_date'>
                  <input type='text' class="form-control" name="tgl_kontrak" id="tgl_kontrak" required readonly />
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
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="norek">Norek <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="norek" name="norek" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="gapok">Gapok <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="gapok" name="gapok" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tunjangan_tetap">Tunjangan Tetap <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="tunjangan_tetap" name="tunjangan_tetap" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tunjangan_tidak_tetap">Tunjangan Tidak Tetap <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="tunjangan_tidak_tetap" name="tunjangan_tidak_tetap" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="tunjangan_pss">Tunjangan PSS <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="tunjangan_pss" name="tunjangan_pss" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="potongan_lain">Potongan Lain <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="potongan_lain" name="potongan_lain" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="bpjs">BPJS <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="bpjs" name="bpjs" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="bonus">Bonus <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="bonus" name="bonus" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="target">Target <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="target" name="target" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="potongan_target">Potongan Target <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="potongan_target" name="potongan_target" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="dapat_lain">Pendapatan Lain <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="dapat_lain" name="dapat_lain" required class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br name="show_in_edit">
          <div class="row" name="show_in_edit">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="jml_cuti">Jumlah Cuti <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="jml_cuti" name="jml_cuti" readonly class="form-control col-md-7 col-xs-12">
              </div>
            </div>
          </div>
          <br name="show_in_edit">
          <div class="row" name="show_in_edit">
            <div class="form-group">
              <label class="control-label col-md-2 col-sm-2 col-xs-12"></span>
              </label>
              <label class="control-label col-md-2 col-sm-2 col-xs-12" for="jml_tdk_datang">Jumlah Tidak Datang <span class="required">*</span>
              </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" id="jml_tdk_datang" name="jml_tdk_datang" readonly class="form-control col-md-7 col-xs-12">
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
<!-- END TAMBAH & EDIT MODAL -->

<!-- DELETE MODAL -->
<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" id="modal_delete">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel2">Non Aktifkan Pegawai</h4>
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
    tampil_status();
    tampil_bagian();
    tampil_divisi();
    tampil_jabatan();
    tampil_jumlah();
    // $('#datatable-responsive').dataTable();
    var kondisi;

    //fungsi tampil data
    function tampil_data() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>pegawai/get_data',
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
              '<td>' + data[i].nama + '</td>' +
              '<td>' + data[i].sex + '</td>' +
              '<td>' + data[i].nama_bagian + '</td>' +
              '<td>' + data[i].nama_divisi + '</td>' +
              '<td>' + data[i].nama_jabatan + '</td>' +
              '<td align="right">' + data[i].gapok.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>' +
              '<td>' + data[i].nama_status + '</td>' +
              '<td style="text-align:right;">' +
              '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].NPP + '">Edit</a>' + ' ' +
              '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].NPP + '">Non Aktifkan</a>' +
              '</td>' +
              '</tr>';
          }
          $('#show_data').html(html);
        }

      });
    }

    //GET JUMLAH
    function tampil_jumlah() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>pegawai/get_jumlah',
        async: false,
        dataType: 'json',
        success: function(data) {
          var jumlah = data[0].jumlah;
          var laki = data[0].laki;
          var perempuan = data[0].perempuan;
          $('#jumlahPegawai').html(jumlah);
          $('#jumlahLaki').html(laki);
          $('#jumlahPerempuan').html(perempuan);
        }

      });
    }

    //GET STATUS
    function tampil_status() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>pegawai/get_status',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '<option value="">-- Pilih Salah Satu --</option>';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<option value="' + data[i].id_status + '">' + data[i].nama_status + '</option>';
          }
          $('#id_status').html(html);
        }

      });
    }

    //GET BAGIAN
    function tampil_bagian() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>pegawai/get_bagian',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '<option value="">-- Pilih Salah Satu --</option>';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<option value="' + data[i].kode_bagian + '">' + data[i].nama_bagian + '</option>';
          }
          $('#kode_bagian').html(html);
        }

      });
    }

    //GET DIVISI
    function tampil_divisi() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>pegawai/get_divisi',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '<option value="">-- Pilih Salah Satu --</option>';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<option value="' + data[i].kode_divisi + '">' + data[i].nama_divisi + '</option>';
          }
          $('#kode_divisi').html(html);
        }

      });
    }

    //GET JABATAN
    function tampil_jabatan() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>pegawai/get_jabatan',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '<option value="">-- Pilih Salah Satu --</option>';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<option value="' + data[i].kode_jabatan + '">' + data[i].nama_jabatan + '</option>';
          }
          $('#kode_jabatan').html(html);
        }

      });
    }

    //ATUR HIDE AND SHOW
    $('#btn_add_modal').on('click', function() {
      $('#form_add')[0].reset();
      $('[name="show_in_add"]').show();
      $('[name="show_in_edit"]').hide();
      $('#NPP').attr('readonly', false);
      kondisi = "tambah";
    });

    //TOMBOL EDIT -> GET KODE & ATUR HIDE AND SHOW
    $('#show_data').on('click', '.item_edit', function() {
      kondisi = "edit";
      var id = $(this).attr('data');
      $.ajax({
        type: "GET",
        url: "<?= base_url() ?>pegawai/get_kode",
        dataType: "JSON",
        data: {
          id: id
        },
        success: function(data) {
          $.each(data, function(NPP, nama, sex, id_status, kode_bagian, kode_divisi, kode_jabatan, tgl_masuk_format, tgl_keluar_format, tgl_kontrak_format, norek, gapok, tunjangan_tetap, tunjangan_tidak_tetap, tunjangan_pss, potongan_lain, bpjs, bonus, target, potongan_target, dapat_lain, jml_cuti, jml_tdk_datang) {
            $('#modal_add').modal('show');
            $('[name="show_in_add"]').hide();
            $('[name="show_in_edit"]').show();
            $('#NPP').val(data.NPP).attr('readonly', true);
            $('#nama').val(data.nama);
            $('#sex').val(data.sex);
            $('#id_status').val(data.id_status);
            $('#kode_bagian').val(data.kode_bagian);
            $('#kode_divisi').val(data.kode_divisi);
            $('#kode_jabatan').val(data.kode_jabatan);
            $('#tgl_masuk').val(data.tgl_masuk_format);
            $('#tgl_keluar').val(data.tgl_keluar_format);
            $('#tgl_kontrak').val(data.tgl_kontrak_format);
            $('#norek').val(data.norek);
            $('#gapok').val(data.gapok);
            $('#tunjangan_tetap').val(data.tunjangan_tetap);
            $('#tunjangan_tidak_tetap').val(data.tunjangan_tidak_tetap);
            $('#tunjangan_pss').val(data.tunjangan_pss);
            $('#potongan_lain').val(data.potongan_lain);
            $('#bpjs').val(data.bpjs);
            $('#bonus').val(data.bonus);
            $('#target').val(data.target);
            $('#potongan_target').val(data.potongan_target);
            $('#dapat_lain').val(data.dapat_lain);
            $('#jml_cuti').val(data.jml_cuti);
            $('#jml_tdk_datang').val(data.jml_tdk_datang);
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
    $('#btn_update').on('click', function() {
      if (kondisi == "tambah") {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>pegawai/simpan_data",
          dataType: "JSON",
          data: {
            NPP: $('#NPP').val(),
            nama: $('#nama').val(),
            sex: $('#sex').val(),
            id_status: $('#id_status').val(),
            kode_bagian: $('#kode_bagian').val(),
            kode_divisi: $('#kode_divisi').val(),
            kode_jabatan: $('#kode_jabatan').val(),
            tgl_masuk: $('#tgl_masuk').val(),
            tgl_keluar: $('#tgl_keluar').val(),
            tgl_kontrak: $('#tgl_kontrak').val(),
            norek: $('#norek').val(),
            gapok: $('#gapok').val(),
            tunjangan_tetap: $('#tunjangan_tetap').val(),
            tunjangan_tidak_tetap: $('#tunjangan_tidak_tetap').val(),
            tunjangan_pss: $('#tunjangan_pss').val(),
            potongan_lain: $('#potongan_lain').val(),
            bpjs: $('#bpjs').val(),
            bonus: $('#bonus').val(),
            target: $('#target').val(),
            potongan_target: $('#potongan_target').val(),
            dapat_lain: $('#dapat_lain').val()
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
              tampil_status();
              tampil_bagian();
              tampil_divisi();
              tampil_jabatan();
              tampil_jumlah();
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

    //UPDATE DATA
    $('#btn_update').on('click', function() {
      if (kondisi == "edit") {
        $.ajax({
          type: "POST",
          url: "<?= base_url() ?>pegawai/update_data",
          dataType: "JSON",
          data: {
            NPP: $('#NPP').val(),
            nama: $('#nama').val(),
            sex: $('#sex').val(),
            id_status: $('#id_status').val(),
            kode_bagian: $('#kode_bagian').val(),
            kode_divisi: $('#kode_divisi').val(),
            kode_jabatan: $('#kode_jabatan').val(),
            tgl_masuk: $('#tgl_masuk').val(),
            tgl_keluar: $('#tgl_keluar').val(),
            tgl_kontrak: $('#tgl_kontrak').val(),
            norek: $('#norek').val(),
            gapok: $('#gapok').val(),
            tunjangan_tetap: $('#tunjangan_tetap').val(),
            tunjangan_tidak_tetap: $('#tunjangan_tidak_tetap').val(),
            tunjangan_pss: $('#tunjangan_pss').val(),
            potongan_lain: $('#potongan_lain').val(),
            bpjs: $('#bpjs').val(),
            bonus: $('#bonus').val(),
            target: $('#target').val(),
            potongan_target: $('#potongan_target').val(),
            dapat_lain: $('#dapat_lain').val()
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
              tampil_status();
              tampil_bagian();
              tampil_divisi();
              tampil_jabatan();
              tampil_jumlah();
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
        url: "<?= base_url() ?>pegawai/non_aktifkan_pegawai",
        dataType: "JSON",
        data: {
          kode: kode
        },
        success: function(data) {
          $('#modal_delete').modal('hide');
          tampil_data();
          tampil_status();
          tampil_bagian();
          tampil_divisi();
          tampil_jabatan();
          tampil_jumlah();
          $('#info').append('<div class="alert alert-danger"><i class="fa fa-trash-o"></i>' +
            ' Pegawai telah dinon-aktifkan !' + '</div>');
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