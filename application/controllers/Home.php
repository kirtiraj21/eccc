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
      //echo "Coming soon....."; 
        $data["view"] = $this->Home_model->wheredata(TBL_PRODUCT,'hot_selling',1); 
        $data["supersale"] = $this->Home_model->wheredata(TBL_PRODUCT,'super_sale',1); 
        $data["newseason"] = $this->Home_model->wheredata(TBL_PRODUCT,'new_season',1); 
        $data["banner"] = $this->Home_model->selectdata(TBL_BANNER);  
        $data["clientsay"] = $this->Home_model->selectdata(TBL_CLIENT);
        $data["firstcat"] = $this->Home_model->getdata_asc(TBL_CATEGORY,'id',array());
        $this->load->view('Yikooo/index',$data);
  }
  

}