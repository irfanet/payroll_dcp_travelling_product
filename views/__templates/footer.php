<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <select onchange="javascript:window.location.href='<?php echo base_url(); ?>multilanguageswitcher/switch/'+this.value;">
      <option value="indonesia" <?php if ($this->session->userdata('site_lang') == 'indonesia') echo 'selected="selected"'; ?>>Indonesia</option>
      <option value="chinese" <?php if ($this->session->userdata('site_lang') == 'chinese') echo 'selected="selected"'; ?>>Chinese</option>
    </select>
  </div>
  <strong>Copyright &copy; 2019 <a href="<?= base_url() ?>">Heisenberg</a>.</strong> All rights
  reserved.
</footer>
</div>
<!-- ./wrapper -->
</body>

</html>

<!-- Select2 -->
<script src="<?= base_url(); ?>assets/bower_components/select2/dist/js/select2.full.min.js"></script>