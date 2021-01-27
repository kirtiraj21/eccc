<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				  $this->load->library(array('form_validation', 'email','cart','session'));
				 
			  }


public function index()
  { 
      if(empty($this->session->userdata('user_id'))){
        $data['country']=$this->Home_model->selectdataasc(TBL_COUNTRY);
      $this->load->view('Yikooo/login',$data);
      }else{
          redirect('website/Account');
      }
  }
  
  
  
public function otppage()
  {  if(!empty($this->session->userdata('user_id'))){
	     redirect('website/Account');
	 }else{
      $this->load->view('Yikooo/otp');
	 }
  }
  
  public function phone_number_register(){
    
	$phone = $this->input->post('phone'); 
	$country = $this->input->post('country_code');
    $this->form_validation->set_rules('phone', 'phone', 'trim|required');
    $this->form_validation->set_rules('country_code', 'country code', 'trim|required');
   
    if($this->form_validation->run() == FALSE)
    {
       // $message = strip_tags(validation_errors());
       $data['country']=$this->Home_model->selectdataasc(TBL_COUNTRY);
         $this->load->view('Yikooo/login',$data);
        
    }
    else
    {
         $ph= $country.$phone;
        
         //$otp = mt_rand(100000,999999);
         $otp = 1234;
      $user = $this->Home_model->get_single_row(TBL_USER,array('phone'=>$ph));   
      $data = count($user);
if($data == 0){
        //   $ch = curl_init();

        //   curl_setopt($ch, CURLOPT_URL,"https://sms1.fire-mobile.com:8080/midway/sendsms.ashx");
        //   curl_setopt($ch, CURLOPT_POST, 1);
        //   curl_setopt($ch, CURLOPT_POSTFIELDS,
        //   "Gw-Username=yikooo&Gw-Password=Kh8yG&Gw-From=Yikooo&Gw-To=$phone&Gw-Coding=1&Gw-Text=Your+one+time+verification+code+for+your+asiafiesta+registration+is+$otp");


        //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //   $server_output = curl_exec($ch);
        //   $err = curl_error($ch);
        //   curl_close ($ch);
        //   if ($err) {
        //   echo "$err";
        //   $result = array('status'=>FALSE, 'message'=>'Something went wrong Sms api error');
        //   } else {
      	    $arr = array( 
      	                 "phone"=>$ph,
      	                 "otp"=>$otp,
      	                 "reff_id"=>$str,
      	                 "created_on"=>date('Y-m-d H:i:s')
      	                );
      	                //print_r($arr); die;
      	    
      	    $insert = $this->Home_model->insert(TBL_USER,$arr);
      	    if($insert){
      	      //$this->session->set_flashdata('message', 'Category has been added successfully');
			    redirect('website/Login/otppage/'.base64_encode($ph));
      	    }else{
      	        	$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('website/Login');  
      	    }
      // } 
 }else{
     
        //  $ch = curl_init();

        //   curl_setopt($ch, CURLOPT_URL,"https://sms1.fire-mobile.com:8080/midway/sendsms.ashx");
        //   curl_setopt($ch, CURLOPT_POST, 1);
        //   curl_setopt($ch, CURLOPT_POSTFIELDS,
        //   "Gw-Username=yikooo&Gw-Password=Kh8yG&Gw-From=Yikooo&Gw-To=$phone&Gw-Coding=1&Gw-Text=Your+one+time+verification+code+for+your+asiafiesta+registration+is+$otp");


        //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //   $server_output = curl_exec($ch);
        //   $err = curl_error($ch);
        //   curl_close ($ch);
        //   if ($err) {
        //   //echo "cURL Error #:" . $err;
        //   echo "$err";
        //   } else {
           $arr = array(  
                         "otp"=>$otp,
      	                 "created_on"=>date('Y-m-d H:i:s')
      	                );
      	    
      	    $insert = $this->Home_model->update_user(TBL_USER,$ph,$arr);
      	     if($insert){
      	      //$this->session->set_flashdata('message', 'Category has been added successfully');
			    redirect('website/Login/otppage/'.base64_encode($ph));
      	    }else{
      	        	$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('website/Login');  
      	    }
         // $result = array('status'=>TRUE, 'message'=>'You already registered!!');  
      //}
 }
   
 }
 
 
} 


public function otp_verification(){
	 if(!empty($this->session->userdata('user_id'))){
	     redirect('website/Account');
	 }else{
    $this->form_validation->set_rules('code1', 'otp', 'trim|required');
    //$this->form_validation->set_rules('phone', 'phone', 'trim|required');
   
    if($this->form_validation->run() == FALSE)
    {
        $this->load->view('Yikooo/otp');
        
    }
    else
    {
        $phone = $this->input->post('phone');
         $c1 = $this->input->post('code1'); 
         $c2 = $this->input->post('code2');
         $c3 = $this->input->post('code3');
         $c4 = $this->input->post('code4');
         $otp = $c1.$c2.$c3.$c4; 
      $user = $this->Home_model->get_single_row(TBL_USER,array('phone'=>$phone,'otp'=>$otp));   
      $data = count($user);
      if($data > 0){
          $this->session->set_userdata('user_id',$user->user_id);
      	 $this->load->view('Yikooo/profile');
       }else{
          $this->session->set_flashdata('errmessage', 'Invalid otp');
			  redirect('website/Login/otppage/'.base64_encode($phone));;   
       }
      
   
 }
 
} 
}

	public function logout() {
	     //echo "<pre>";print_r($_SESSION);exit;
		    $this->session->unset_userdata('user_id');
		  // echo "<pre>";print_r($_SESSION);exit;
			$this->session->sess_destroy();
			redirect ('website/Login/');
		}
  
}