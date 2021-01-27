<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				  $this->load->library(array('form_validation', 'email','cart','session'));
				 
			  }


public function index()
  { 

      $data['contact_info'] = $this->Home_model->get_single_row(TBL_CONTACT,array());
      $this->load->view('Yikooo/contact',$data);
     
  }
  
  
  // $config['charset'] = 'utf-8';
// $config['mailtype'] = 'html';
// $this->email->initialize($config);
// $this->email->to("kirtiraj.cloudwapp@gmail.com");
// $this->email->from('info@mobidudes.com','Abeer Food');
// $this->email->subject('Successfully Registered');
// $this->email->message('test');
// //$this->email->send();
//  if($this->email->send()){
//   echo 'true';  
//  }else{
//     echo 'false';  
//  }


public function submitform()
  { 
      
      if($this->input->post('submit')){

           $this->form_validation->set_rules('name', 'Name', 'trim|required');
             $this->form_validation->set_rules('email', 'email', 'trim|required');
              $this->form_validation->set_rules('phone', 'phone', 'trim|required');
               $this->form_validation->set_rules('subject', 'subject', 'trim|required');
                $this->form_validation->set_rules('message', 'message', 'trim|required');
       
         if($this->form_validation->run() == FALSE)
    {
       $data['contact_info'] = $this->Home_model->get_single_row(TBL_CONTACT,array());
      $this->load->view('Yikooo/contact',$data);
    }
    else
    {    $name=$this->input->post('name');
          $email=$this->input->post('email');
           $subject=$this->input->post('subject');
            $phone=$this->input->post('phone');
             $message=$this->input->post('message');
	  
			$arr = array(
			             'name'=>$this->input->post('name'),
			             'email'=>$this->input->post('email'),
			             'phone'=>$this->input->post('phone'),
			             'subject'=>$this->input->post('subject'),
			             'message'=>$this->input->post('message'),
			             'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_CONTACT_LIST,$arr);	
            if($insert){
                
   $config['charset'] = 'utf-8';
$config['mailtype'] = 'html';
$this->email->initialize($config);
$this->email->to("kirtiraj.cloudwapp@gmail.com,er.dilipmehta09@gmail.com");
$this->email->from('info@mobidudes.com','Yikooo');
$this->email->subject('New Contact Request');
$this->email->message('<!DOCTYPE html>
<html lang="en">
<head>
  	<title> YIKOOO </title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div style="width: 600px; background: #f1efef; display: block; margin-left: auto; margin-right: auto; margin-top: 15px;" class="main_outer">
	<div style="width: 100%; padding: 35px 0px; background: #62EB69; border: 1px solid #d0cece;">
		<h1 style="text-align: center; margin: auto; color: #fff; font-weight: 600; letter-spacing: 1px;"> YIKOOO </h1>
	</div>
	<div style="width: 100%; padding: 30px 0px; background: #f5f5f5;">
		<div style="width: 100%; padding: 0px 20px; background: none;">
			<h3 style="margin: 0; text-align: center; font-weight: 600; font-size: 24px; color: #333;     margin-bottom: 40px;"> View Contact </h3>
			<div style="margin-bottom: 20px; margin-top: 40px;">
				<label style="margin-bottom: 0; text-align: left; font-size: 18px; color: #555; font-weight: 200;"> <span style="display: inline-block; width: 190px; color: #333; font-weight: 600;">Name </span>'.$name.' </label>
			</div>
			<div style="margin-bottom: 20px;">
				<label style="margin-bottom: 0; text-align: left; font-size: 18px; color: #555; font-weight: 200;"> <span style="display: inline-block; width: 190px; color: #333; font-weight: 600;">Email </span> '.$email.' </label>
			</div>
			<div style="margin-bottom: 20px;">
				<label style="margin-bottom: 0; text-align: left; font-size: 18px; color: #555; font-weight: 200;"> <span style="display: inline-block; width: 190px; color: #333; font-weight: 600;">Phone Number </span> '.$phone.' </label>
			</div>
			<div style="margin-bottom: 20px;">
				<label style="margin-bottom: 0; text-align: left; font-size: 18px; color: #555; font-weight: 200;"> <span style="display: inline-block; width: 190px; color: #333; font-weight: 600;">Subject </span> '.$subject.' </label>
			</div>
			<div style="margin-bottom: 20px;">
				<label style="margin-bottom: 0; text-align: left; font-size: 18px; color: #555; font-weight: 200;"> <span style="display: block; width: 190px; color: #333; font-weight: 600; margin-bottom: 5px;">Message </span> '.$message.' </label>
			</div>

			
		</div>
	</div>
	<div style="width: 100%; background: #62EB69; padding: 20px 0px;">
		<p style="margin: 0; text-align: center; color: #fff; letter-spacing: 1px;"> &copy; copyright | All rights reserved </p>
	</div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</body>
</html>');
//$this->email->send();
 if($this->email->send()){
 	$this->session->set_flashdata('message', 'Contact has been  successfully');
			    redirect('website/Contact'); 
 }else{
    $this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('website/Contact'); 
 }
			
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			   redirect('website/Contact'); 
			}			
			
		}
      }
  }
  
  
}