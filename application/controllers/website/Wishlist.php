<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				$this->load->helper('url');

				$this->load->library("pagination");
                $this->load->model('admin/Home_model');
				$this->load->library(array('form_validation', 'email','cart','session'));
				 
			  }


public function index()
  {
      
      if(empty($this->session->userdata('user_id'))){
         redirect('website/Login');
	 }else{
	     $user_id= $this->session->userdata('user_id');
         $data['wishlist'] = $this->Home_model->wheredata(TBL_WISHLIST,'user_id',$user_id);
        $data['total'] = $this->Home_model->get_order_total(TBL_CART,$user_id);
         $this->load->view('Yikooo/wishlist',$data);
	  }
  }
  
  

 
  
  
  public function wishlistdelete()
  {
    if(empty($this->session->userdata('user_id'))){
	 redirect('website/Login');
	}else{
     $user_id= $this->session->userdata('user_id');
     $wishlist_id =base64_decode($this->uri->segment('4'));
      $wish = $this->Home_model->get_single_row(TBL_WISHLIST,array('wishlist_id'=>$wishlist_id));
          if(count($wish) > 0){
      	     $arr = array( 
      	                 "wishlist_id"=>$wishlist_id,
      	                 );
               $DELETE = $this->Home_model->delete_where(TBL_WISHLIST,$arr);
               
      	      if($DELETE){
      	      $this->session->set_flashdata('message', 'Product From Wishlist is Removed!');
			    redirect('website/Wishlist/');
      	      }else{
      	            $this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('website/Wishlist/');
      	      }
          }else{
               $this->session->set_flashdata('errmessage', 'No data found');
			    redirect('website/Wishlist/');
          } 
  }
  }
  
  
  

    
    
}