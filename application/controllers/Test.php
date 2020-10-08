<?php
class Test extends CI_Controller {

	public function __construct()
	{
	parent::__construct();
	
	$this->load->database();
	
	$this->load->model('Test_model');
	}

	public function index()  
	{
		$result['update']=$this->Test_model->update_displayrecords();
		// $result['data'] = $this->Test_model->displayrecords();
        $this->load->view('list_view',$result);
	}

	public function add()  
    {  
        $this->load->view('test_view');  
    }    

	public function savedata()
	{
		// $this->load->view('test_view');

		if($this->input->post('save'))
		{
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'email'      => $this->input->post('email')
			);
			$users = $this->Test_model->saverecords($data);
			if($users > 0){
					$result['update']=$this->Test_model->update_displayrecords();
					$result['data'] = $this->Test_model->displayrecords();
			        $this->load->view('list_view',$result);
			}else{
					echo "Insert error !";
			}
		}
	}

	public function update_data($id)
	{
		// echo $id;
		// echo $this->uri->segment(3);
		// exit;
		//$id = $this->input->get('id');
		$result['data'] = $this->Test_model->getDataByid($id);
		// print_r($result['data']);
		// exit;

		$this->load->view('update_view',$result);

			if($this->input->post('update'))
			{
				$data = array(

					'first_name' => $this->input->post('first_name'),
					'last_name'  => $this->input->post('last_name'),
					'email'      => $this->input->post('email')
				);
				// print_r($data);
				// exit;
			$data['data'] = $this->Test_model->update_records($data,$id);
			redirect(base_url()."Test");
			}
	}

	public function deletedata($id)
	{
		$this->Test_model->deleterecords($id);
		redirect(base_url()."Test");
	}
}
?>