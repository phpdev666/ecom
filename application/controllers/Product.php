<?php
defined('BASEPATH') OR exit('No direct script access allowed');  	
class Product extends CI_Controller 
{
	public function __construct()
	{
	parent::__construct();
	
	$this->load->database();
	
	//$this->load->model('category_model');
	}

	public function index()  
    {  
    	//$result['update']=$this->category_model->update_displayrecords();
        $this->load->view('product/product_list');  
    }

    public function add()  
    {  
        $this->load->view('product/product_add');  
    }
}
?>