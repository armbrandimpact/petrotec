<?php
class Company extends CI_Controller{
	function __construct(){
		parent::__construct();
        $this->load->model('company_model');
	}
	function index(){            
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('company/index');
        $this->load->view('footer');
	}
    function create(){
        $this->load->view('header');
        $this->load->view('sidebar');
        $this->load->view('company/create');
        $this->load->view('footer');
    }
    function store(){
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
		$this->load->library('upload', $config);
		$ins = array(
			'company_name' => $this->input->post('company_name'),
			'company_phone' => $this->input->post('company_phone'),
			'company_address' => $this->input->post('company_address'),
		);
		$this->db->insert('company', $ins);
		$id = $this->db->insert_id();
		if ( $this->upload->do_upload('company_logo'))
		{
			$data = array('upload_data' => $this->upload->data());
            $this->db->update('company', array('company_logo' => $data['upload_data']['file_name']),array('id'=> $id));
		}
		redirect('company/index');
    }
	
    public function edit($id)
    {
        $this->load->view('header');
		$this->load->view('sidebar');
		$this->load->view('company/edit');
		$this->load->view('footer');
    }
    public function update()
    {
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
        $this->load->library('upload', $config);
        $id = $this->input->post('id');
        $row = $this->db->get_where('company',array('id'=>$id))->row();
		$update = array(
			'company_name' => $this->input->post('company_name'),
			'company_phone' => $this->input->post('company_phone'),
			'company_address' => $this->input->post('company_address'),
		);
		$this->db->update('company', $update,array('id'=> $id));
		if ( $this->upload->do_upload('company_logo'))
		{
            
            unlink("uploads/".$row->company_logo);
            
			$data = array('upload_data' => $this->upload->data());
            $this->db->update('company', array('company_logo' => $data['upload_data']['file_name']),array('id'=> $id));
        }
        redirect('company/index');
    }
    public function delete($id)
    {
        $row = $this->db->get_where('company',array('id'=>$id))->row();
        unlink("uploads/".$row->company_logo);
        $this->db->delete('company', array('id' => $id));
        
        redirect('company/index');
    }
}
?>