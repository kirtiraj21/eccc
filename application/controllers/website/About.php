<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				  $this->load->library(array('form_validation', 'email','cart','session'));
				 
			  }


public function index()
  {
      $data['about'] = $this->Home_model->get_single_row(TBL_ABOUT,array());   
      $this->load->view('Yikooo/about',$data);
  }
  
  
  
}