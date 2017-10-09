<?php
	class Employee_model extends CI_Model{
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
			($id)?$id:0;
			$row = $this->db->get_where('employee', array('id' => $id))->row();
			if(isset($row->firstname))
			{
				return $row->firstname;
			}else{
				return '';
			}

        }
	}
?>