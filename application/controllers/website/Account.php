<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
	
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
        
        $this->load->view('Yikooo/profile');
        }
  }
  
  
  public function edit_profile()
  {
        if(empty($this->session->userdata('user_id'))){ 
            redirect('website/Login');
        }else{
           // echo $this->input->post('submit');die;
            if($this->input->post('submit')){
            
              $this->form_validation->set_rules('name', 'Name', 'trim|required');
             $this->form_validation->set_rules('email', 'Email', 'trim|required');
              $this->form_validation->set_rules('address', 'Address', 'trim|required');
               
       
         if($this->form_validation->run() == FALSE)
    {
        $this->load->view('Yikooo/profile-edit');
    }
    else
    {  
              $user_id = $this->session->userdata('user_id');
               $user = $this->Home_model->get_single_row(TBL_USER,array('user_id'=>$user_id)); 
               if(!empty($_FILES['image']['name']))
				{
					$configs['upload_path'] = 'upload/userprofile/';
					$configs['allowed_types'] = 'jpg|jpeg|png|gif';
					$configs['file_name'] = $_FILES['image']['name'];
					
			 	    //Load upload library and initialize configuration
					$this->load->library('upload',$configs);
					$this->upload->initialize($configs);
				  
					if($this->upload->do_upload('image'))
					{
					  $uploadData = $this->upload->data();
						$image = "upload/userprofile/".$uploadData['file_name'];
					    
					}else{
					    echo $this->upload->display_errors(); die;
						$image = '';
					}
				}else{
				    if($user->image!=''){
				    $image = $user->image;
				    }else{
				        $image = '';
				    }
				}
              
              $arr=array(
                        'name'=>$this->input->post('name'),
                         'email'=>$this->input->post('email'),
                          'address'=>$this->input->post('address'),
                            'image'=>$image
                         );
                         
                         
               $update = $this->Home_model->updatewhere(TBL_USER,'user_id',$user_id,$arr);
               //$user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id)); 
               if($update){
      	        $this->session->set_flashdata('message', 'Profile has been Updated successfully');
			    redirect('website/Account/edit_profile');
      	       }else{
      	        	$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			     redirect('website/Account/edit_profile');  
      	      }
            }
            }else{
              $this->load->view('Yikooo/profile-edit');
            }
        }
  }
  
  
  public function address()
  {
        if(empty($this->session->userdata('user_id'))){ 
            redirect('website/Login');
        }else{
             $user_id = $this->session->userdata('user_id');
         $data['add'] = $this->Home_model->get_tbl_data(TBL_SHIPPING_ADD,array('user_id'=>$user_id,'status'=>1));
             
        $this->load->view('Yikooo/manage-address',$data);
        }
  }
  
  
  
  public function edit_address()
  {
        if(empty($this->session->userdata('user_id'))){ 
            redirect('website/Login');
        }else{
              $id = base64_decode($this->uri->segment(4)); 
              if($this->input->post('submit')){
                 $this->form_validation->set_rules('name', 'Name', 'trim|required');
                 $this->form_validation->set_rules('address_type', 'address Type', 'trim|required');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
                $this->form_validation->set_rules('city', 'City', 'trim|required');
                $this->form_validation->set_rules('country', 'Country', 'trim|required');
                $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
               if($this->form_validation->run() == FALSE){
                  $this->load->view('Yikooo/address-edit');
                  }
              else
              {
              $addr_id = base64_decode($this->input->post('uid'));
              
                $arr=array(
                        
                        'name'=>$this->input->post('name'),
                         'phone'=>$this->input->post('phone'),
                         'add_type'=>$this->input->post('address_type'),
                          'address'=>$this->input->post('address'),
                            'city'=>$this->input->post('city'),
                             'country'=>$this->input->post('country'),
                              'zipcode'=>$this->input->post('zipcode'),
                         );
                         
                         
               $insert = $this->Home_model->update(TBL_SHIPPING_ADD,$addr_id,$arr);
               //$user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id)); 
               if($insert){
      	        $this->session->set_flashdata('message', 'Shipping Address has been Updated successfully');
			    redirect('website/Account/address');
      	       }else{
      	        	$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			     redirect('website/Account/address');  
      	      }
            }
        
              }
         $data['rec'] = $this->Home_model->wheredetail(TBL_SHIPPING_ADD,'id',$id);
             
        $this->load->view('Yikooo/address-edit',$data);
       
  }
}

    public function add_address()
  { 
        if(empty($this->session->userdata('user_id'))){ 
            redirect('website/Login');
        }else{
             if($this->input->post('submit')){
                 $this->form_validation->set_rules('name', 'Name', 'trim|required');
                 $this->form_validation->set_rules('address_type', 'address Type', 'trim|required');
                $this->form_validation->set_rules('address', 'Address', 'trim|required');
                $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
                $this->form_validation->set_rules('city', 'City', 'trim|required');
                $this->form_validation->set_rules('country', 'Country', 'trim|required');
                $this->form_validation->set_rules('zipcode', 'Zipcode', 'trim|required');
               if($this->form_validation->run() == FALSE){
                  $this->load->view('Yikooo/address-edit');
                  }
              else
              {
              $user_id = $this->session->userdata('user_id');
              
                $arr=array(
                        'user_id'=>$user_id,
                        'name'=>$this->input->post('name'),
                         'phone'=>$this->input->post('phone'),
                         'add_type'=>$this->input->post('address_type'),
                          'address'=>$this->input->post('address'),
                            'city'=>$this->input->post('city'),
                             'country'=>$this->input->post('country'),
                              'zipcode'=>$this->input->post('zipcode'),
                              'status'=>1
                         );
                         
                         
               $insert = $this->Home_model->insert(TBL_SHIPPING_ADD,$arr);
               //$user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id)); 
               if($insert){
                  $url = $this->input->post('url');
      	        $this->session->set_flashdata('message', 'Shipping Address has been Added successfully');
      	        if($url == 'checkout'){
      	            redirect('website/Checkout/');
      	        }else{
      	            redirect('website/Account/address');
      	        }
			    
      	       }else{
      	        	$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			     redirect('website/Account/address');  
      	      }
            }
        }
        
        $this->load->view('Yikooo/address-edit');
        }
  }
  
   public function delete_address()
  {
        if(empty($this->session->userdata('user_id'))){ 
            redirect('website/Login');
        }else{
            $addr_id = base64_decode($this->uri->segment(4));
            $arr=array('status'=>0);
        $delete = $this->Home_model->update(TBL_SHIPPING_ADD,$addr_id,$arr);
             if($delete){
      	        $this->session->set_flashdata('message', 'Shipping Address has been Deleted successfully');
			    redirect('website/Account/address');
      	       }else{
      	        	$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			     redirect('website/Account/address');  
      	      }
       
        }
  }
  
  
  public function myorders()
  {
        if(empty($this->session->userdata('user_id'))){ 
            redirect('website/Login');
        }else{
             $user_id = $this->session->userdata('user_id');
         $data['order'] = $this->Home_model->wheredata(TBL_ORDER,'user_id',$user_id);
             
        $this->load->view('Yikooo/order-history',$data);
        }
  }
  
  
   public function myordersdetail()
  {
        if(empty($this->session->userdata('user_id'))){ 
            redirect('website/Login');
        }else{
        $user_id=$this->session->userdata('user_id');
        $ord_id = base64_decode($this->uri->segment(4));
        $data['user'] = $this->Home_model->wheredetail(TBL_USER,'user_id',$user_id);

        $data['order'] = $this->Home_model->wheredetail(TBL_ORDER,'order_id',$ord_id);

        $data['orderdetail'] = $this->Home_model->wheredata(TBL_ORDER_DETAIL,'order_id',$ord_id);
        $this->load->view('Yikooo/order-detail',$data);
        }
  }
  
  
 
  
  
  
}