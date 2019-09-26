<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class divisi extends CI_Model{
		function __construct(){
			parent::__construct();
        }

        function getDivisi(){
            return $this->db->get('divisi')->result_array();
        }
	}
?>