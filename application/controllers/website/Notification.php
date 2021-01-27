<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				$this->load->helper('url');
                $this->load->model('admin/Home_model');
			}


public function index()
  {
      
      if(empty($this->session->userdata('user_id'))){
         redirect('website/Login');
	 }else{
	     $user_id= $this->session->userdata('user_id');
	      $this->Home_model->update_where(TBL_NOTIFICATION,array('user_id'=>$user_id),array('seen_status'=>1));
          $data['notificationdata'] = $this->Home_model->wheredata(TBL_NOTIFICATION,'user_id',$user_id);
        //  print_r($data['notification']); die;
          $this->load->view('Yikooo/notification',$data);
	  }
  }
  
    public function delete()
  {
    if(empty($this->session->userdata('user_id'))){
	 redirect('website/Login');
	}else{
     $user_id= $this->session->userdata('user_id');
     $noti_id =base64_decode($this->uri->segment('4'));
      $noti = $this->Home_model->get_single_row(TBL_NOTIFICATION,array('noti_id'=>$noti_id));
          if(count($noti) > 0){
      	     $arr = array( 
      	                 "noti_id"=>$noti_id,
      	                 );
               $DELETE = $this->Home_model->delete_where(TBL_NOTIFICATION,$arr);
               
      	      if($DELETE){
      	      $this->session->set_flashdata('message', 'Notification is Removed!');
			    redirect('website/Notification/');
      	      }else{
      	            $this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('website/Notification/');
      	      }
          }else{
               $this->session->set_flashdata('errmessage', 'No data found');
			    redirect('website/Notification/');
          } 
  }
  }
  

 
    
}