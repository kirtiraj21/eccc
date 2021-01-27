<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				 $this->load->library('session');
			  }


public function index()
 {
    $admn=$this->Home_model->get_single_row(TBL_ADMIN,[]);
    if($this->input->post('submit')){
	      
	       $username = $this->input->post('username');
	       $reff = $this->input->post('reff');
	       $email = $this->input->post('email'); 
	       	//echo $_FILES['logo']['name'];die;
				
			if(!empty($_FILES['logo']['name']))
				{
					$configs['upload_path'] = 'upload/adminprofile/';
					$configs['allowed_types'] = 'jpg|jpeg|png|gif';
					$configs['file_name'] = $_FILES['logo']['name'];
					
			 	    //Load upload library and initialize configuration
					$this->load->library('upload',$configs);
					$this->upload->initialize($configs);
				
					if($this->upload->do_upload('logo'))
					{
					  
						$uploadData = $this->upload->data();
						$logo = "upload/adminprofile/".$uploadData['file_name'];
					    
					}else{
					   
						$logo = '';
					}
				}else{
				    $logo = $admn->admin_logo;
				}
	       
	       
	       
	       $user_ar = array('username' =>$username,'email'=>$email,'admin_logo'=>$logo,'refferal_code'=>$reff);
		   $userdata = $this->Home_model->update(TBL_ADMIN,1,$user_ar) ;
		   $this->session->set_flashdata("message1","Data changed successfully") ;
		   redirect('admin/Profile');
      
	  }
	 
    if($this->input->post('changepasswprd')){
	      //echo "<pre>";print_r($_POST);exit;
	       $oldpass = $this->input->post('old_password');
	       $newpass = $this->input->post('password'); 
	      
	      if($oldpass != $admn->password){
	          $this->session->set_flashdata("errmessage","Old password not matched") ;	
	          
	          redirect('admin/Profile');
	      }else{
	           $user_ar = array('password' =>$newpass  );
			   $userdata = $this->Home_model->update(TBL_ADMIN,1,$user_ar) ;
			   $this->session->set_flashdata("message","Password changed successfully") ;
			  
			   redirect('admin/Profile');
	      }
	  }
	$data['view'] = $admn;  
    $this->load->view('admin/profile',$data);
 }
 

  

    
}