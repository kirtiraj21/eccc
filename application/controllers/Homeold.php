<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				  $this->load->library(array('form_validation', 'email','cart','session'));
				 
			  }


public function index()
  {
     redirect('website/Home');
  }
  
 
}