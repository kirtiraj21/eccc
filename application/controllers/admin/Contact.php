<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				 $this->load->library(array('form_validation', 'email','cart','session'));
				
				 //if($this->session->userdata["admin_user"]["type"]=='ADMIN'){}else{ redirect('admin/Home/'); }
				 
			  }


public function index()
  {
	 
	    $data["page"]="Contact Information";
		$data["view"] = $this->Home_model->get_tbl_data(TBL_CONTACT,array());
	    $this->load->view('admin/contact',$data);
 }

 /*      Add Category   */
 
public function add()
  {     
        if($this->input->post('submit')){
                     $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
            // $this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
            // $this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
       
         if($this->form_validation->run() == FALSE)
    {  
        $data["page"]="Add Contact Information";
	    $this->load->view('admin/contact_add',$data);
        
    }
    else
    {
	  
			$arr = array(
			             'email'=>$this->input->post('email'),
			             'address'=>$this->input->post('address'),
			              'phone'=>$this->input->post('phone'),
			             //'latitude'=>$this->input->post('latitude'),
			             //'longitude'=>$this->input->post('longitude')
						);
			$insert = $this->Home_model->insert(TBL_CONTACT,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Contact has been added successfully');
			    redirect('admin/Contact');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Contact');
			}			
			
		}
        }else{
	    $data["page"]="Add Contact Information";
	    $this->load->view('admin/contact_add',$data);
        }
 }
 
 public function edit($cid)
  {   
      $id = base64_decode($cid);
      $rec = $this->Home_model->get_single_row(TBL_CONTACT,array('id'=>$id));
        if($this->input->post('submit')){
             $this->form_validation->set_rules('email', 'Email', 'trim|required');
            $this->form_validation->set_rules('address', 'Address', 'trim|required');
            $this->form_validation->set_rules('phone', 'Phone', 'trim|required');
            //  $this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
            // $this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
       
         if($this->form_validation->run() == FALSE)
    {
       $data["page"]="Edit Contact";
		$data["records"] = $rec;
	    $this->load->view('admin/contact_add',$data);
        
    }
    else
    {
	     
			
			$arr = array(
			             'email'=>$this->input->post('email'),
			             'address'=>$this->input->post('address'),
			              'phone'=>$this->input->post('phone'),
			             //'latitude'=>$this->input->post('latitude'),
			             //'longitude'=>$this->input->post('longitude')
						 
						);
			$insert = $this->Home_model->update(TBL_CONTACT,$id,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Contact has been updated successfully');
				redirect('admin/Contact/edit/'.$cid);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Contact/edit/'.$cid);
			}			
			
		}
        }else{
	    $data["page"]="Edit Contact";
		$data["records"] = $rec;
	    $this->load->view('admin/contact_add',$data);
        }
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
    $this->Home_model->update_where(TBL_COLOR,array('id'=>$id),array('status'=>0));
   // $this->Home_model->delete(TBL_STORE_CATEGORY,'category_id',$id);
	$this->session->set_flashdata('message', 'Color has been deleted successfully');
	redirect('admin/Color') ;
  
  }
  
   
}

