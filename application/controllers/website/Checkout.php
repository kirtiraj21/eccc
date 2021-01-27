<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				$this->load->helper('url');

				$this->load->library("pagination");
                $this->load->model('admin/Home_model');
				$this->load->library(array('form_validation', 'email','cart','session'));
				date_default_timezone_set('Asia/Kolkata');
				 
			  }


public function index()
  {
      
      if(empty($this->session->userdata('user_id'))){
         redirect('website/Login');
	 }else{
	    
	     $user_id= $this->session->userdata('user_id');
	     
         $cartdata= $this->Home_model->wheredata(TBL_CART,'user_id',$user_id);
         foreach($cartdata as $cdata){
          $prod = $this->Home_model->get_single_row(TBL_PRODUCT,array('id'=>$cdata->product_id));
           if($prod->stock < $cdata->qty){
               $this->session->set_flashdata('errmessage', 'Red background products is out of stock,Please remove those & Try Again!!');
               redirect('website/Cart');
           }
         }
        
         
          if($this->input->post('submit')){
              
             
              $user_id = $this->session->userdata('user_id');
              $user = $this->Home_model->get_single_row(TBL_USER,array('user_id'=>$user_id));  
                $t = $this->Home_model->get_order_total(TBL_CART,$user_id);
         
                    $ord_id = "ORD".rand(9999,99999);
                    $c_id = $this->input->post('c_id');
                    $d_off = $this->input->post('d_off');
                    $o_totl = $this->input->post('n_t');
                    if($c_id =='' && $d_off =='' && $o_totl == ''){
                   // $t = $this->Home_model->get_order_total(TBL_CART,$user_id);
                     $total =$t->total_price;
                    
                    }else{
                      $total  = $o_totl;
                    }
                    
                    $arr = array( 
      	                 "user_id"=>$user_id,
      	                 "order_id"=>$ord_id,
      	                 "transaction_id"=>'trans123',
      	                 "order_total"=>$t->total_price,
      	                 "coupon_discount"=>$d_off,
      	                 "total_amount"=>$total,
      	                 "address_id" =>$this->input->post('add_id'),
      	                 "created_on"=>date('Y-m-d H:i:s'),
      	                 "delivery_date"=>date('Y-m-d H:i:s', strtotime('+15 days')),
      	         
      	                );
      	    
      	            $insertorder = $this->Home_model->insert(TBL_ORDER,$arr);
                  if($insertorder){ 
                     foreach($cartdata as $datac){
                       $proddetail = array('order_id'=>$ord_id,
      	                                   'product_id'=>$datac->product_id,
      	                                   'size'=>$datac->size,
      	                                   'color'=>$datac->color,
      	                                   'qty'=>$datac->qty,
      	                                   'total_price'=>$datac->total,
      	                                   'price'=>$datac->price_after_discount);
      	                                   
      	         $insertdetail = $this->Home_model->insert(TBL_ORDER_DETAIL,$proddetail);
      	         $proddetail = $this->Home_model->get_single_row(TBL_PRODUCT,array('id'=>$datac->product_id));   
      	         $oldstock = $proddetail->stock;
      	         $newstock = $oldstock - $datac->qty;
      	         $sarr=array('stock'=>$newstock);
                 $updateprod = $this->Home_model->updatewhere(TBL_PRODUCT,'id',$datac->product_id,$sarr);
                 
           
                      }
                      if($c_id != ''){
                          $insertcoupon = $this->Home_model->insert(TBL_USED_COUPON,array('user_id'=>$user_id,'coupon_id'=>$c_id,'order_id'=>$ord_id));
                      }
                      $arrdel = array("user_id"=>$user_id);
                     $DELETE = $this->Home_model->delete_where(TBL_CART,$arrdel);
                     
                     $arr = array(
                            'registration_ids' => array($user->fcm_token),
                            'notification' => array( 'title' => 'Order Placed!', 'body' => 'Your Order Is Placed Successfully','type'=>'order'),
                            'data' => array( 'title' => 'Order Placed!', 'body' => 'Your Order Is Placed Successfully','type'=>'order')
                        );
                    $url = 'https://fcm.googleapis.com/fcm/send';
                    $fields = (array) $arr;
                    define("GOOGLE_API_KEY","AAAAFK8vjWk:APA91bEpWmtTQ3Plei5Nmybt41vsl2a9YaFhnbu8s6MQ9MlNTvzZraS-9R8QYBqzIRrlYH-k8h2xRkwOITh5RkxhZ-6-Fzh37s-sE57Mvj-TAK99S4c0TbiztZwuMauF2j-K36x3OMlP");
                    $headers = array(
                        'Authorization: key=' . GOOGLE_API_KEY,
                        'Content-Type: application/json'
                    );
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);   
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                    $result = curl_exec($ch);               
                    if ($result === FALSE) {
                        die('Curl failed: ' . curl_error($ch));
                    }else{
                        $today=date('Y-m-d H:i:s');
                        $insertnoti = $this->Home_model->insert(TBL_NOTIFICATION,array('user_id'=>$user_id,'type'=>'order','order_id'=>$ord_id,'message'=>'Your Order '.$ord_id.' is Placed Successfully','created_on'=>$today));
                        redirect('website/Checkout/order_com');
                    }
                    curl_close($ch);
                     
                  }else{
                      $this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			        redirect('website/Checkout');  
                  }
			    
      	       
            
        }
          $data['total'] = $this->Home_model->get_order_total(TBL_CART,$user_id);
         $data['cartdata']= $this->Home_model->wheredata(TBL_CART,'user_id',$user_id);
        $data['add']= $this->Home_model->wheredata(TBL_SHIPPING_ADD,'user_id',$user_id);

        $this->load->view('Yikooo/checkout',$data);
       
	  }
  }
  
  public function order_com(){
       $this->load->view('Yikooo/order-complete');
  }


       public function add_coupon()
  {
       $user_id= $this->session->userdata('user_id');
       $name= $this->input->post('c_name');
       $cupon= $this->Home_model->get_single_row(TBL_COUPON,array('name'=>$name));
       $used_cupon= $this->Home_model->get_tbl_data(TBL_USED_COUPON,array('user_id'=>$user_id,'coupon_id'=>$cupon->id));
      
          if(count($cupon) > 0){
           $today = date('Y-m-d'); 
           if(count($used_cupon) <= $cupon->uses && $cupon->expiry_date >= $today){
                $odtotal = $this->Home_model->get_order_total(TBL_CART,$user_id); 
                 $d = $cupon->discount; 
                 $ot=$odtotal->total_price;
                 if($ot >= $cupon->min_purchase ){
                 $c_off = ($ot*$d)/100;
                 $newtotal = $ot - $c_off;
                 $result = array('condition'=>1, 'message'=>'ok','c_off'=>$c_off,'grand_total'=>$newtotal,'coupon_id'=>$cupon->id) ;
                 }else{
                  $message = 'Coupon Minimum Purchase is '.$cupon->min_purchase.'!!';
                   $result = array('condition'=>0, 'message'=>$message);
                 }
      	      
      	      }else{
      	           $message = 'Coupon Code is Expired!!';
                   $result = array('condition'=>0, 'message'=>$message);
      	      }
             
             
           
          
  }else{
       $message = 'Coupon Code Is not valid!!';
                   $result = array('condition'=>0, 'message'=>$message);
  }
  
    echo json_encode($result);
  
}

 
  

    
    
}