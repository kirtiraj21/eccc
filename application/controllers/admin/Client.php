<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Client extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				 $this->load->library(array('form_validation', 'email','cart','session'));
				 //if($this->session->userdata["admin_user"]["type"]=='ADMIN'){}else{ redirect('admin/Home/'); }
				 
			  }


public function index()
  {
	 
	    $data["page"]="Client Say";
		$data["view"] = $this->Home_model->get_tbl_data(TBL_CLIENT,array());
	    $this->load->view('admin/client',$data);
 }

 /*      Add Category   */
 
public function add()
  {     
        if($this->input->post('submit')){
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
       
         if($this->form_validation->run() == FALSE)
    {
       $data["page"]="Add Client say";
	    $this->load->view('admin/client_add',$data);
        
    }
    else
    {
	     
			$arr = array(
			             'title'=>$this->input->post('title'),
			             'description'=>$this->input->post('description'),
						 'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_CLIENT,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Client Say has been added successfully');
			    redirect('admin/Client/');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Client/');
			}			
			
		}
	   
     }else{
       $data["page"]="Add Client Say";
	    $this->load->view('admin/client_add',$data);
    }
}
  
 
 public function edit($cid)
  {   
      $id = base64_decode($cid);
      $rec = $this->Home_model->get_single_row(TBL_CLIENT,array('id'=>$id));
        if($this->input->post('submit')){
            
             $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
       
         if($this->form_validation->run() == FALSE)
    {
       $data["page"]="Edit Client Say";
		$data["records"] = $rec;
	    $this->load->view('admin/client_add',$data);
        
    }
    else
    {
			
			$arr = array(
			             'title'=>$this->input->post('title'),
			             'description'=>$this->input->post('description'),
						 'created_on'=>date('Y-m-d h:i:s')
						 
						);
			$insert = $this->Home_model->update(TBL_CLIENT,$id,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Client Say  has been updated successfully');
			    redirect('admin/Client/edit/'.$cid);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Client/edit/'.$cid);
			}			
			
		}
		
        }else{
	    $data["page"]="Edit Client Say";
		$data["records"] = $rec;
	    $this->load->view('admin/client_add',$data);
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
    //$this->Home_model->update_where(TBL_CATEGORY,array('id'=>$id),array('status'=>0));
    $this->Home_model->delete(TBL_CLIENT,'id',$id);
	$this->session->set_flashdata('message', 'Category has been deleted successfully');
	redirect('admin/Client') ;
  
  }
  
   
}

