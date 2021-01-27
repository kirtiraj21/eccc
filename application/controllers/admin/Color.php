<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Color extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				 $this->load->library(array('form_validation', 'email','cart','session'));
				
				 //if($this->session->userdata["admin_user"]["type"]=='ADMIN'){}else{ redirect('admin/Home/'); }
				 
			  }


public function index()
  {
	 
	    $data["page"]="Color";
		$data["view"] = $this->Home_model->get_tbl_data(TBL_COLOR,array('status'=>1));
	    $this->load->view('admin/color',$data);
 }

 /*      Add Category   */
 
public function add()
  {     
        if($this->input->post('submit')){
            $this->form_validation->set_rules('name', 'Color Name', 'trim|required');
       
         if($this->form_validation->run() == FALSE)
    {
        $data["page"]="Add Color";
	    $this->load->view('admin/color_add',$data);
    }
    else
    {
         $name =$this->input->post('name');
              $catcheck = $this->Home_model->get_single_row(TBL_COLOR,array('name'=>$name,'status'=>1));
     if(count($catcheck) == 0){
	  
			$arr = array(
			             'name'=>$this->input->post('name'),
			             'code'=>$this->input->post('color_code'),
			             'status'=>1,
						 'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_COLOR,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Color has been added successfully');
			    redirect('admin/Color');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Color');
			}			
			
     }else{
         	$this->session->set_flashdata('errmessage', 'brand Name exist !try another name!');
			    redirect('admin/Brand/');
     }
		
			
		}
        }else{
	    $data["page"]="Add Color";
	    $this->load->view('admin/color_add',$data);}
 }
 
 public function edit($cid)
  {   
      $id = base64_decode($cid);
      $rec = $this->Home_model->get_single_row(TBL_COLOR,array('id'=>$id));
        if($this->input->post('submit')){
			 $this->form_validation->set_rules('name', 'Color Name', 'trim|required');
       
         if($this->form_validation->run() == FALSE)
    {
        $data["page"]="Edit Color";
		$data["records"] = $rec;
	    $this->load->view('admin/color_add',$data);
    }
    else
    {
			$arr = array(
			             'name'=>$this->input->post('name'),
			             'code'=>$this->input->post('color_code'),
						 
						);
			$insert = $this->Home_model->update(TBL_COLOR,$id,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Color has been updated successfully');
				redirect('admin/Color/edit/'.$cid);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Color/edit/'.$cid);
			}			
			
		}
        }else{
	    $data["page"]="Edit Color";
		$data["records"] = $rec;
	    $this->load->view('admin/color_add',$data);
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

