<?php
	class Units extends CI_Controller{
		function __construct(){
			parent::__construct();
		}
		function index(){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('units/allunits');
			$this->load->view('footer');
		}
	}
?>