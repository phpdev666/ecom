<?php  
defined('BASEPATH') OR exit('No direct script access allowed');  	
class Category extends CI_Controller 
{
	public function __construct()
	{
	parent::__construct();
	
	$this->load->database();
	
	$this->load->model('category_model');
	}

	public function index()  
    {  
    	$result['update']=$this->category_model->update_displayrecords();
        $this->load->view('category_list',$result);  
    }

    public function add()  
    {  
        $this->load->view('category_view');  
    }

    public function savedata()
	{
		// $this->load->view('test_view');

		if($this->input->post('save'))
		{
			$date = date("Y-m-d h:i:s");

			$data = array(
				'category_name' => $this->input->post('category_name'),
				'is_create'     => $date
			);
			$users = $this->category_model->saverecords($data);
			if($users > 0){
					$result['update']=$this->category_model->update_displayrecords();
					$result['data'] = $this->category_model->displayrecords();
			        $this->load->view('category_list',$result);
			        redirect(base_url()."Category");
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
		$result['data'] = $this->category_model->getDataByid($id);
		// print_r($result['data']);
		// exit;

		$this->load->view('edit_category',$result);

			$date = date("Y-m-d h:i:s");

			if($this->input->post('update'))
			{
				$data = array(
					'category_name' => $this->input->post('category_name'),
					'is_update'     => $date
				);
				// print_r($data);
				// exit;
			$data['data'] = $this->category_model->update_records($data,$id);
			redirect(base_url()."Category");
			}
	}

	public function deletedata($id)
	{
		$this->category_model->deleterecords($id);
		redirect(base_url()."Category");
	}    
}    
?>