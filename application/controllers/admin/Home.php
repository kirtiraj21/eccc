<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				 $this->load->library('session');
			  }


public function index()
 {
     //$data['feedback']=$this->Home_model->get_tbl_data("feedback");
    //$data['farms']=$this->Home_model->get_tbl_data(TBL_GROUP,[]);
    $data['users']=$this->Home_model->get_tbl_data(TBL_USER,[]);
    $data["category"] = $this->Home_model->get_tbl_data(TBL_CATEGORY,array('status'=>1));

    $this->load->view('admin/index',$data);
 }
 
 
 public function google()
 {
     //$data['feedback']=$this->Home_model->get_tbl_data("feedback");
    //$data['farms']=$this->Home_model->get_tbl_data(TBL_GROUP,[]);
    
    $this->load->view('admin/google');
 }
 
 public function privacy()
 {
    if($this->input->post('submit')){
        $arr = array('privacy'=>$this->input->post('privacy'));
        $up = $this->Home_model->update(TBL_ADMIN,1,$arr);
        if($up){
            	$this->session->set_flashdata('message', 'Privacy data updated');
			    redirect('admin/Home/privacy');
        }else{
            	$this->session->set_flashdata('errmessage', 'Database error');
			    redirect('admin/Home/privacy');
        }
    }
    $data['view']=$this->Home_model->get_single_row(TBL_ADMIN,[]);
    $this->load->view('admin/privacy',$data);
 }
  public function imprint()
 {
    if($this->input->post('submit')){
        $arr = array('imprint'=>$this->input->post('imprint'));
        $up = $this->Home_model->update(TBL_ADMIN,1,$arr);
        if($up){
            	$this->session->set_flashdata('message', 'Imprint data updated');
			    redirect('admin/Home/imprint');
        }else{
            	$this->session->set_flashdata('errmessage', 'Database error');
			    redirect('admin/Home/imprint');
        }
    }
    $data['view']=$this->Home_model->get_single_row(TBL_ADMIN,[]);
    $this->load->view('admin/imprint',$data);
 }
  
public function add()
  {    // echo "<pre>";print_r($_SESSION);exit;
        if($this->input->post('submit')){
	     $chk = $this->Home_model->get_single_row(TBL_CUSTOMER,array('email'=>$this->input->post('email')));
	     if($chk){
	         	$this->session->set_flashdata('errmessage', 'Email Id already registered');
			    redirect('admin/Customer/add');
	     }
      
        
			  if(!empty($_FILES['image']['name']))
              {
                $image = $this->singleimg('image','uploads/customer/');
              }else{
                $image = "";
              } 
			$arr = array(
			             'username'=>$this->input->post('username'),
			             'email'=>$this->input->post('email'),
			             'phone'=>$this->input->post('phone'),
			             'image'=>$image,
			             'status'=>1,
						 'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_CUSTOMER,$arr);	
            if($insert){
               
				$this->session->set_flashdata('message', 'Customer has been added successfully');
			    redirect('admin/Customer');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Customer');
			}			
			
		}
	    $data["page"]="Add";
	    echo "<pre>";print_r($_SESSION);exit;
	    $this->load->view('admin/customer_add',$data);
 }

// public function events(){
// 	$data['view']= $this->db->query("select * from events")->result() ;
// 	$this->load->view('admin/add_event',$data);
// }
// public function add_event(){
// 	$data['view']= '' ;
// 	$this->load->view('admin/add_event',$data);
// }
  
  
//   public function profile()
//   {
// 	  $this->load->model('admin/Login_admin_model') ;
// 	  $adminc = $this->Login_admin_model->user_() ;
// 	  if($this->input->post('userSubmit'))
// 	  {
		  
// 		 if($this->input->post('old_password'))
// 		{ 
// 		     if($this->input->post('old_password') == $adminc->password)
// 			 {
// 			 $user_ar = array('username' => $this->input->post('username'),
// 							 'email' => $this->input->post('email'),
// 							 'web_email' => $this->input->post('web_email'),
// 							 //'currency' => $this->input->post('currency'),
// 							 'password' => $this->input->post('password')
// 							 );
							 
// 				  $this->Login_admin_model->user_up($user_ar) ;	
// 				  $this->session->set_flashdata("successmessage","Data Updated") ;		 
// 			 }
// 			 else
// 			 {
// 		       $this->session->set_flashdata("message","Old password is wrong") ;
// 			 }
// 		}
// 		else
// 		{
// 		 $user_ar = array('username' => $this->input->post('username'),
// 						 'email' => $this->input->post('email'),
// 						 'web_email' => $this->input->post('web_email'),
// 						// 'currency' => $this->input->post('currency'),
// 						  ) ;
// 			 $this->Login_admin_model->user_up($user_ar) ;
// 			 $this->session->set_flashdata("successmessage","Data Updated") ;					  
// 		}
// 	  }
// 	  $data["view"] = $this->Login_admin_model->user_() ;
//       $this->load->view('admin/profile_setting',$data) ;
//   }
  
//   	public function change_password()
// 	{ 
// 	    $this->load->view('admin/change_password');
// 	}
	
// 	public function change_password_update()
// 	{
// 		$password=$this->input->post('password');
// 		$rpassword=$this->input->post('rpassword');
// 		if($password==$rpassword)
// 		{
// 		   $this->session->set_flashdata('message','Password Update successfully');
		   
// 		    $id=$this->session->userdata["admin_user"]["user_id"];
// 		   $password_data = array('password' => $password );
// 		   $this->Home_model->update('admin_user',$id,$password_data);
// 		}
// 		else
// 		{ 
// 			$this->session->set_flashdata('errmessage','Re-Password not match');
// 		}
// 	    redirect('admin/Home/change_password');
// 	}
	
// 	public function forget_password()
// 	{
// 	     if($this->input->post('forget'))
// 	    { 
// 	    $email= $this->input->post('email');
// 		//$bsd= base64_encode ($email);
// 		$chk=$this->Home_model->wheredetail('admin_user','email',$email);
//     		if($chk)
//     		{
//                 $id= $this->db->get_where('admin_user',['email'=>$email])->row()->id;
//                 $to = $email;
//                 $subject = "Forget password";
//                 $txt = "http://doudegajaora.com/permaflex/admin/Home/change_for_pass/$id;";
//                 $headers = "From: ";
//                 mail($to,$subject,$txt,$headers);
//     		}
//     		else
//     		{
//     		    $this->session->set_flashdata('errmessage','this email not registered');
//     		}
		
// 	    }
// 		$this->load->view('admin/forget');
// 	}

// 	public function change_for_pass($id)
// 	{  
	         
	     
// 	    if($this->input->post('set'))
// 	    {
//     	        $password=$this->input->post('password');
//     	        $id=$this->input->post('id');
//     		$rpassword=$this->input->post('rpassword');
//         		if($password==$rpassword)
//         		{
//         		   $this->session->set_flashdata('message','Password Update successfully');
        		   
        		    
//         		   $password_data = array('password' => $password );
//         		   $this->Home_model->update('admin_user',$id,$password_data);
//         		}
//         		else
//         		{ 
//         			$this->session->set_flashdata('errmessage','Re-Password not match');
//         		}
//     	    }
	    
// 	    $this->load->view('admin/email_forget',$id);
// 	}
	

	



  
      
}

