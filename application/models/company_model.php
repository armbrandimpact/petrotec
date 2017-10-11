<?php
	class Company_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}
		function debug($array){
			echo "<pre>";
				print_r($array);
			echo "</pre>";
		}
		public function get_name($id)
        {
			$row = $this->db->get_where('company', array('id' => $id))->row();
			if(isset($row->company_name))
			{
				return $row->company_name;
			}else{
				return '';
			}

        }
	}
?>