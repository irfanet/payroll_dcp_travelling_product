<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $this->lang->line('data_pegawai_non_aktif'); ?>
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
            <h3 class="box-title"><?= $this->lang->line('data_pegawai_non_aktif'); ?></h3>
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
                  <th><?= $this->lang->line('nama'); ?></th>
                  <th><?= $this->lang->line('nama_departemen'); ?></th>
                  <th><?= $this->lang->line('nama_jabatan'); ?></th>
                  <th><?= $this->lang->line('nama_line'); ?></th>
                  <th><?= $this->lang->line('gaji_pokok'); ?></th>
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
        <h4 class="modal-title" name="show_in_edit"><?= $this->lang->line('edit_pegawai'); ?></h4>
      </div>
      <form id="form_add" data-parsley-validate>
        <div class="modal-body">
          <div class="row">
            <div class="col-xs-12 col-md-6 col-sm-6">
              <div class="form-group">
                <label for="nik"><?= $this->lang->line('nik'); ?></label>
                <input type="text" class="form-control" id="nik" name="nik" required>
              </div>
              <div class="form-group">
                <label for="nama"><?= $this->lang->line('nama'); ?></label>
                <input type="text" class="form-control" id="nama" name="nama" required>
              </div>
              <div class="form-group">
                <label for="kd_departemen"><?= $this->lang->line('nama_departemen'); ?></label>
                <select type="text" class="form-control" id="kd_departemen" name="kd_departemen" required>
                  <!-- //isian -->
                </select>
              </div>
              <div class="form-group">
                <label for="kd_jabatan"><?= $this->lang->line('nama_jabatan'); ?></label>
                <select type="text" class="form-control" id="kd_jabatan" name="kd_jabatan" required>
                  <!-- //isian -->
                </select>
              </div>
              <div class="form-group">
                <label for="kd_line"><?= $this->lang->line('nama_line'); ?></label>
                <select type="text" class="form-control" id="kd_line" name="kd_line" required>
                  <!-- //isian -->
                </select>
              </div>
              <div class="form-group">
                <label for="gaji_pokok"><?= $this->lang->line('gaji_pokok'); ?></label>
                <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" required>
              </div>
            </div>
            <div class="col-xs-12 col-md-6 col-sm-6">
              <div class="form-group">
                <label for="tunj_jabatan"><?= $this->lang->line('tunj_jabatan'); ?></label>
                <input type="text" class="form-control" id="tunj_jabatan" name="tunj_jabatan" required>
              </div>
              <div class="form-group">
                <label for="tunj_kinerja"><?= $this->lang->line('tunj_kinerja'); ?></label>
                <input type="text" class="form-control" id="tunj_kinerja" name="tunj_kinerja" required>
              </div>
              <div class="form-group">
                <label for="bonus"><?= $this->lang->line('bonus'); ?></label>
                <input type="text" class="form-control" id="bonus" name="bonus" required>
              </div>
              <div class="form-group">
                <label for="insentif"><?= $this->lang->line('insentif'); ?></label>
                <input type="text" class="form-control" id="insentif" name="insentif" required>
              </div>
              <div class="form-group">
                <label for="pph21"><?= $this->lang->line('pph21'); ?></label>
                <input type="text" class="form-control" id="pph21" name="pph21" required>
              </div>
              <div class="form-group">
                <label for="norek"><?= $this->lang->line('norek'); ?></label>
                <input type="text" class="form-control" id="norek" name="norek" required>
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
        <h4 class="modal-title"><?= $this->lang->line('nonaktifkan'); ?></h4>
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

<!-- /.modal aktifkan -->
<div class="modal modal-success fade" id="modal_aktifkan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?= $this->lang->line('aktifkan'); ?></h4>
      </div>
      <div class="modal-body">
        <input type="hidden" name="id_data" id="id_data">
        <h5><?= $this->lang->line('yakin'); ?></h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?= $this->lang->line('bt_tidak'); ?></button>
        <button type="button" id="btn_aktifkan" class="btn_aktifkan btn btn-success"><?= $this->lang->line('bt_ya'); ?></button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal aktifkan -->

<script type="text/javascript">
  $(document).ready(function() {
    tampil_data();

    //fungsi tampil data
    function tampil_data() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>pegawai/get_data_non_aktif',
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
              '<td>' + data[i].nama_departemen + '</td>' +
              '<td>' + data[i].nama_jabatan + '</td>' +
              '<td>' + data[i].nama_line + '</td>' +
              '<td align="right">IDR ' + data[i].gaji_pokok.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") + '</td>' +
              '<td style="text-align:center;">' +
              '<a href="javascript:;" class="btn btn-info btn-xs item_edit" data="' + data[i].nik + '"><?= $this->lang->line('bt_edit'); ?></a>' + ' ' +
              '<a href="javascript:;" class="btn btn-success btn-xs item_aktifkan" data="' + data[i].nik + '"><?= $this->lang->line('aktifkan'); ?></a>' + ' ' +
              '<a href="javascript:;" class="btn btn-danger btn-xs item_hapus" data="' + data[i].nik + '"><?= $this->lang->line('bt_hapus'); ?></a>' +
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
          tampil_line();
          tampil_departemen();
          tampil_jabatan();
        }

      });
    }

    //GET LINE
    function tampil_line() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>pegawai/get_line',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '<option value=""><?= $this->lang->line('pilih'); ?></option>';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<option value="' + data[i].kd_line + '">' + data[i].nama_line + '</option>';
          }
          $('#kd_line').html(html);
        }

      });
    }

    //GET DEPARTEMEN
    function tampil_departemen() {
      $.ajax({
        type: 'ajax',
        url: '<?= base_url() ?>pegawai/get_departemen',
        async: false,
        dataType: 'json',
        success: function(data) {
          var html = '<option value=""><?= $this->lang->line('pilih'); ?></option>';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<option value="' + data[i].kd_departemen + '">' + data[i].nama_departemen + '</option>';
          }
          $('#kd_departemen').html(html);
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
          var html = '<option value=""><?= $this->lang->line('pilih'); ?></option>';
          var i;
          for (i = 0; i < data.length; i++) {
            html += '<option value="' + data[i].kd_jabatan + '">' + data[i].nama_jabatan + '</option>';
          }
          $('#kd_jabatan').html(html);
        }

      });
    }

    //TOMBOL EDIT -> GET KODE & ATUR HIDE AND SHOW
    $('#show_data').on('click', '.item_edit', function() {
      kondisi = "edit";
      $('#modal_add').on('shown.bs.modal', function() {
        $('#nama').focus()
      });
      var id = $(this).attr('data');
      $.ajax({
        type: "GET",
        url: "<?= base_url() ?>pegawai/get_kode",
        dataType: "JSON",
        data: {
          id: id
        },
        success: function(data) {
          $.each(data, function(nik, nama, kd_line, kd_departemen, kd_jabatan, norek, gaji_pokok, tunj_jabatan, tunj_kinerja, bonus, insentif, pph21) {
            $('#modal_add').modal('show');
            $('[name="show_in_add"]').hide();
            $('[name="show_in_edit"]').show();
            $('#nik').val(data.nik).attr('readonly', true);
            $('#nama').val(data.nama);
            $('#kd_line').val(data.kd_line);
            $('#kd_departemen').val(data.kd_departemen);
            $('#kd_jabatan').val(data.kd_jabatan);
            $('#norek').val(data.norek);
            $('#gaji_pokok').val(data.gaji_pokok);
            $('#tunj_jabatan').val(data.tunj_jabatan);
            $('#tunj_kinerja').val(data.tunj_kinerja);
            $('#bonus').val(data.bonus);
            $('#insentif').val(data.insentif);
            $('#pph21').val(data.pph21);
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

    //TOMBOL AKTIFKAN -> GET KODE
    $('#show_data').on('click', '.item_aktifkan', function() {
      var id = $(this).attr('data');
      $('#modal_aktifkan').modal('show');
      $('[name="id_data"]').val(id);
    });

    //SIMPAN DATA
    $('#btn_simpan').on('click', function() {
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>pegawai/update_data",
        dataType: "JSON",
        data: {
          nik: $('#nik').val(),
          nama: $('#nama').val(),
          kd_line: $('#kd_line').val(),
          kd_departemen: $('#kd_departemen').val(),
          kd_jabatan: $('#kd_jabatan').val(),
          norek: $('#norek').val(),
          gaji_pokok: $('#gaji_pokok').val(),
          tunj_jabatan: $('#tunj_jabatan').val(),
          tunj_kinerja: $('#tunj_kinerja').val(),
          bonus: $('#bonus').val(),
          insentif: $('#insentif').val(),
          pph21: $('#pph21').val()
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
        url: "<?= base_url() ?>pegawai/non_aktifkan_pegawai",
        dataType: "JSON",
        data: {
          kode: kode
        },
        success: function(data) {
          $('#modal_delete').modal('hide');
          tampil_data();
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

    //HAPUS DATA
    $('#btn_hapus').on('click', function() {
      var kode = $('#id_data').val();
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>pegawai/hapus_data",
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

    //AKTIFKAN DATA
    $('#btn_aktifkan').on('click', function() {
      var kode = $('#id_data').val();
      $.ajax({
        type: "POST",
        url: "<?= base_url() ?>pegawai/aktifkan_pegawai",
        dataType: "JSON",
        data: {
          kode: kode
        },
        success: function(data) {
          $('#modal_aktifkan').modal('hide');
          tampil_data();
          $('#info').append('<div class="alert alert-success"><i class="fa fa-check"></i>' +
            ' Pegawai telah diaktifkan !' + '</div>');
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