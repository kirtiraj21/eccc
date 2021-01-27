<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {
	
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
        $data['cart'] = $this->Home_model->wheredata(TBL_CART,'user_id',$user_id);
         $data['total'] = $this->Home_model->get_order_total(TBL_CART,$user_id);
       $this->load->view('Yikooo/cart',$data);
	  }
  }
  
  

 
  
  
  public function cartdelete()
  {
    if(empty($this->session->userdata('user_id'))){
	 redirect('website/Login');
	}else{
     $user_id= $this->session->userdata('user_id');
     $cart_id =base64_decode($this->uri->segment('4'));
      $wish = $this->Home_model->get_single_row(TBL_CART,array('id'=>$cart_id));
          if(count($wish) > 0){
      	     $arr = array( 
      	                 "id"=>$cart_id,
      	                 );
               $DELETE = $this->Home_model->delete_where(TBL_CART,$arr);
               
      	      if($DELETE){
      	      $this->session->set_flashdata('message', ' Product from cart has been removed ');
			    redirect('website/Cart/');
      	      }else{
      	            $this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('website/Cart/');
      	      }
          }else{
               $this->session->set_flashdata('errmessage', 'No data found');
			    redirect('website/Cart/');
          } 
  }
  }
  
  
    public function addtocart()
  {
       $user_id= $this->session->userdata('user_id');
     $cart_id =$this->input->post('cart_id');
      $operation =$this->input->post('operation');
      $cart = $this->Home_model->get_single_row(TBL_CART,array('id'=>$cart_id));
       $prod = $this->Home_model->get_single_row(TBL_PRODUCT,array('id'=>$cart->product_id));
      $cartqty = $cart->qty;
          if(count($cart) > 0){
              if($operation == 'less'){
                  $qty = $cart->qty - 1;
              }else{
                  $qty = $cart->qty + 1;
              }
             
              if($operation == 'less' && $cartqty == 1){
                $message = ' Minimum 1 Quantity is required!';
                 $result = array('condition'=>0, 'message'=>$message,'qty'=>1);
             }elseif($operation == 'gain' && $cartqty==$prod->stock){
                   $message =  ' Sorry! We have only '.$prod->stock.' Product In Stock.';
                $result = array('condition'=>0, 'message'=>$message,'qty'=>$cartqty);
             }else{
              $total = $cart->price_after_discount * $qty;
               $arr = array( 
      	                 "qty"=>$qty,
      	                 "total"=>$total,
      	                 "created_on"=>date('Y-m-d H:i:s')
      	                 );
      	                 //print_r($arr);die;
               $UPDATE = $this->Home_model->update_where(TBL_CART,array("id"=>$cart_id),$arr);
      	      if($UPDATE){
      	       $odtotal = $this->Home_model->get_order_total(TBL_CART,$user_id);   
      	      $result = array('condition'=>1, 'qty'=>$qty,'total'=>$total,'ordertotal'=>$odtotal->total_price);
      	      }else{
      	           $message = 'Some Problem Occured !try Again later!';
                   $result = array('status'=>FALSE, 'message'=>$message);
      	      }
             }
             
             echo json_encode($result);
          
  }
  
  
  
}

    
    
}