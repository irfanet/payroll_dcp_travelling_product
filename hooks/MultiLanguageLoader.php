 <?php   

  class MultiLanguageLoader
  {
      function initialize() {
          $ci =& get_instance();
          $ci->load->helper('language');
          $siteLang = $ci->session->userdata('site_lang');
          if ($siteLang) {
              $ci->lang->load('sidebar',$siteLang);
              $ci->lang->load('content',$siteLang);
          } else {
              $ci->lang->load('sidebar','indonesia');
              $ci->lang->load('content',$siteLang);
          }
      }
  }
  ?>