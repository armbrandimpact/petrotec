<?php
	class company extends CI_Controller{
		function __construct(){
			parent::__construct();
		}
		function allcompany(){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('company/allcompany');
			$this->load->view('footer');
		}
		function addcompany(){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('company/addcompany');
			$this->load->view('footer');
		}
		function editCompany($id){
			$this->load->view('header');
			$this->load->view('sidebar');
			$this->load->view('company/editcompany');
			$this->load->view('footer');
		}
		function insCompany(){
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = '*';
			$this->load->library('upload', $config);
			$ins = array(
				'company_name' => $this->input->post('name'),
				'phone' => $this->input->post('phone'),
				'address' => $this->input->post('address'),
			);
			if(empty($this->input->post('id'))){
				$this->db->insert('company', $ins);
				$id = $this->db->insert_id();
				$this->session->set_flashdata('alert_msg', array('success', 'company', 'Successfully added company.'));
				$url = base_url('company/addcompany');
			}else{
				$id = $this->input->post('id');
				$this->db->update('company', $ins, array('id' => $id));
				$this->session->set_flashdata('alert_msg', array('success', 'company', 'Successfully edit company.'));
				$url = base_url('company/editCompany/'.$id);
			}
			if ( $this->upload->do_upload('logo'))
			{
				$this->db->delete('attachment', array('refid' => $id, 'type' => 'companylogo'));
				$data = array('upload_data' => $this->upload->data());
				$this->db->insert('attachment', array(
					'refid' => $id,
					'type' => 'companylogo',
					'url' => $data['upload_data']['file_name']
				));
			}
			redirect($url);
		}
	}
?>