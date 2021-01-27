<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				 date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
				 $this->load->library(array('form_validation', 'email','cart','session'));

 
				
				 //if($this->session->userdata["admin_user"]["type"]=='ADMIN'){}else{ redirect('admin/Home/'); }
				 
			  }


public function index()
  {
	 
	    $data["page"]="Orders";
		$data["view"] = $this->Home_model->get_tbl_data(TBL_ORDER,array());
	    $this->load->view('admin/orders',$data);
 }

 /*      Add Category   */
 
 public function order_detail()
  {
	    $id=base64_decode($this->uri->segment(4)); 
	    $data["page"]="Order Detail";
	    $data["vieworder"] = $this->db->where('order_id',$id)->get('orders')->row();
        $data["view"] = $this->Home_model->get_tbl_data(TBL_ORDER_DETAIL,array('order_id'=>$id));
        $data["courier"] = $this->Home_model->get_tbl_data(TBL_COURIERS,array('status'=>1));
	    $this->load->view('admin/order_detail',$data);
 }


 
  public function delete($id){
   /* $stores = $this->db->query("select id,category_id from stores where category_id IN($id)")->result();
    if(!empty($stores)){
        foreach($stores as $st){
            $cat[] = explode(",",$st->category_id);
        }
       array_diff( $cat, [$id] ) ;
        echo "<pre>";
        print_r($cat);
        exit;
    }
    exit; */
    $this->Home_model->update_where(TBL_CATEGORY,array('id'=>$id),array('status'=>0));
   // $this->Home_model->delete(TBL_STORE_CATEGORY,'category_id',$id);
	$this->session->set_flashdata('message', 'Category has been deleted successfully');
	redirect('admin/Category') ;
  
  }
  
  public function orderstatus(){
      $id = base64_decode($this->uri->segment(4));
      $od = $this->db->where('order_id',$id)->get('orders')->row();
      $user_id = $od->user_id;
    $user = $this->Home_model->get_single_row(TBL_USER,array('user_id'=>$user_id));  

     
   // $this->Home_model->delete(TBL_STORE_CATEGORY,'category_id',$id);
	//$this->session->set_flashdata('message', 'Category has been deleted successfully');
	$arr = array(
                            'registration_ids' => array($user->fcm_token),
                            'notification' => array( 'title' => 'Order Shipped!', 'body' => 'Your Order '.$id.' is Shipped Successfully','type'=>'ship'),
                            'data' => array( 'title' => 'Order Shipped!', 'body' => 'Your Order '.$id.' is Shipped Successfully','type'=>'ship')
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
                        
                        $this->form_validation->set_rules('track_id', 'Tracking id', 'trim|required');
                         $this->form_validation->set_rules('courier', 'Courier ', 'trim|required');
       
                             if($this->form_validation->run() == FALSE)
                        {
                           $data["page"]="Order Detail";
	                       $data["vieworder"] = $this->db->where('order_id',$id)->get('orders')->row();
                           $data["view"] = $this->Home_model->get_tbl_data(TBL_ORDER_DETAIL,array('order_id'=>$id));
                           $data["courier"] = $this->Home_model->get_tbl_data(TBL_COURIERS,array('status'=>1));
                           $this->load->view('admin/order_detail',$data);
                        }
                        else
                        {
                        
                         $today=date('Y-m-d H:i:s');
                         $track_no=$this->input->post('track_id');
                         $courier=$this->input->post('courier');
                         $this->Home_model->update_where(TBL_ORDER,array('order_id'=>$id),array('delivery_status'=>1,'tracking_no'=>$track_no,'courier'=>$courier));
                         $insertnoti = $this->Home_model->insert(TBL_NOTIFICATION,array('user_id'=>$user_id,'type'=>'ship','order_id'=>$id,'message'=>'Your Order '.$id.' is Shipped Successfully','created_on'=>$today));
                        redirect('admin/Order/order_detail/'.$this->uri->segment(4)) ;
                        }
                    }
                    curl_close($ch);
	
  
  }
  
   
}

