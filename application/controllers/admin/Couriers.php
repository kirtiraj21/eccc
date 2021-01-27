<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Couriers extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				$this->load->library(array('form_validation', 'email','cart','session'));
				 //if($this->session->userdata["admin_user"]["type"]=='ADMIN'){}else{ redirect('admin/Home/'); }
				 
			  }


public function index()
  {
	 
	    $data["page"]="Couriers";
		$data["view"] = $this->Home_model->get_tbl_data(TBL_COURIERS,array('status'=>1));
	    $this->load->view('admin/couriers',$data);
 }

 /*      Add Category   */
 
public function add()
  {     
        if($this->input->post('submit')){
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
       
         if($this->form_validation->run() == FALSE)
    {
        $data["page"]="Add Brand";
	    $this->load->view('admin/couriers_add',$data);
    }
    else
    {
         $name =$this->input->post('name');
              $catcheck = $this->Home_model->get_single_row(TBL_COURIERS,array('name'=>$name,'status'=>1));
     if(count($catcheck) == 0){
	   
			$arr = array(
			             'name'=>$this->input->post('name'),
			             //'image'=>$image,
			             'status'=>1,
						 'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_COURIERS,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Couriers has been added successfully');
			    redirect('admin/Couriers');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Couriers');
			}
     }else{
         	$this->session->set_flashdata('errmessage', 'Couriers Name exist !try another name!');
			    redirect('admin/Couriers/');
     }
		
			
		}
        }else{
	    $data["page"]="Add couriers";
	    $this->load->view('admin/couriers_add',$data);
        }
 }
 
 public function edit($cid)
  {   
      $id = base64_decode($cid);
      $rec = $this->Home_model->get_single_row(TBL_COURIERS,array('id'=>$id));
        if($this->input->post('submit')){
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
       
         if($this->form_validation->run() == FALSE)
    {
        $data["page"]="Edit couriers";
		$data["records"] = $rec;
	    $this->load->view('admin/couriers_add',$data);
    }
    else
    {
   
			$arr = array(
			             'name'=>$this->input->post('name'),
			            // 'image'=>$image,
						 
						);
			$insert = $this->Home_model->update(TBL_COURIERS,$id,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'couriers has been updated successfully');
				redirect('admin/Couriers/edit/'.$cid);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Couriers/edit/'.$cid);
			}	
    //     }else{
    //      	$this->session->set_flashdata('errmessage', 'brand Name exist !try another name!');
			 //   redirect('admin/Brand/');
    //       }
			
		}
        }else{
	    $data["page"]="Edit Couriers";
		$data["records"] = $rec;
	    $this->load->view('admin/brand_add',$data);
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
    $this->Home_model->update_where(TBL_COURIERS,array('id'=>$id),array('status'=>0));
   // $this->Home_model->delete(TBL_STORE_CATEGORY,'category_id',$id);
	$this->session->set_flashdata('message', 'Couriers has been deleted successfully');
	redirect('admin/Couriers') ;
  
  }
  
   
}

