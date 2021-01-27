<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				 
			  }


    public function index()
    {
        if(isset($this->session->userdata["admin_wexi"]["username"])){  
            $admin_id=$this->session->userdata["admin_wexi"]["user_id"];
            $admin=$this->Home_model->get_single_row("admin_user",array("id"=>$admin_id));
            if(empty($admin)){ redirect('admin/Login') ;}
        }else{ redirect('admin/Login') ; }
        if($this->input->post("submit")=="update")
        {
            $old_pass=$this->input->post("oldpassword");
            $new_pass=$this->input->post("newpassword");
            if($admin->password==$old_pass)
            {
                $update=$this->Home_model->update("admin_user",$admin_id,array("password"=>$new_pass));
                if($update)
                {
                     $this->session->set_flashdata('message','Password change successfully');
                }else{
                     $this->session->set_flashdata('errmessage','Database error *');
                }
            }else{
                $this->session->set_flashdata('errmessage','Old Password not match');
            }
            redirect('admin/Change_password');
            
        }
        $this->load->view('admin/change_password');
    }
    
}