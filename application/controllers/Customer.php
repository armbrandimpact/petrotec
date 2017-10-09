<?php
class customer extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	function allcustomer(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('customer/allcustomer');
		$this->load->view('footer');
	}
	function addcustomer(){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('customer/addcustomer');
		$this->load->view('footer');
	}
	function editCustomer($id){
		$this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('customer/editCustomer');
		$this->load->view('footer');
	}
	function inscustomer(){
		$ins = array(
			'title' => $this->input->post('title'),
			'fname' => $this->input->post('fname'),
			'lname' => $this->input->post('lname'),
			'company' => $this->input->post('company'),
			'email' => $this->input->post('email'),
			'phone' => $this->input->post('phone'),
			'mobile' => $this->input->post('mobile'),
			'fax' => $this->input->post('fax'),
			'billingaddress' => $this->input->post('billing_address'),
			'city' => $this->input->post('city'),
			'country' => $this->input->post('country'),
			'notes' => $this->input->post('notes'),
		);
		if(empty($this->input->post('id'))){
			$this->db->insert('customer', $ins);
			$this->session->set_flashdata('alert_msg', array('success', 'customer', 'Successfully added customer.'));
			redirect('customer/addcustomer');
		}else{
			$this->db->update('customer', $ins, array('id' => $this->input->post('id')));
			$this->session->set_flashdata('alert_msg', array('success', 'customer', 'Successfully edit customer.'));
			redirect('customer/editCustomer/'.$this->input->post('id'));
		}
	}
}