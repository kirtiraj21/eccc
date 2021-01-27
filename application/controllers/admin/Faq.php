<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				
				 //if($this->session->userdata["admin_user"]["type"]=='ADMIN'){}else{ redirect('admin/Home/'); }
				 
			  }


public function index()
  {
	 
	    $data["page"]="Faq";
		$data["view"] = $this->Home_model->get_tbl_data(TBL_FAQ,array());
	    $this->load->view('admin/faq',$data);
 }

 /*      Add Category   */
 
public function add()
  {     
        if($this->input->post('submit')){
	     if(!empty($_FILES['image']['name']))
				{
					$configs['upload_path'] = 'upload/maincategory/';
					$configs['allowed_types'] = 'jpg|jpeg|png|gif';
					$configs['file_name'] = $_FILES['image']['name'];
					
			 	    //Load upload library and initialize configuration
					$this->load->library('upload',$configs);
					$this->upload->initialize($configs);
				
					if($this->upload->do_upload('image'))
					{
						$uploadData = $this->upload->data();
						$image = "upload/maincategory/".$uploadData['file_name'];
					    
					}else{
						$image = '';
					}
				}
			$arr = array(
			              'title'=>$this->input->post('title'),
			             'description'=>$this->input->post('description'),
			             'status'=>1,
						 'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_FAQ,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'FAQ has been added successfully');
			    redirect('admin/Faq/');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Faq/');
			}			
			
		}
	    $data["page"]="Add Faq";
	    $this->load->view('admin/faq_add',$data);
 }
 
 public function edit($cid)
  {   
      $id = base64_decode($cid);
      $rec = $this->Home_model->get_single_row(TBL_FAQ,array('id'=>$id));
        if($this->input->post('submit')){
			 if(!empty($_FILES['image']['name']))
				{
					$configs['upload_path'] = 'upload/mainabout/';
					$configs['allowed_types'] = 'jpg|jpeg|png|gif';
					$configs['file_name'] = $_FILES['image']['name'];
					
			 	    //Load upload library and initialize configuration
					$this->load->library('upload',$configs);
					$this->upload->initialize($configs);
				
					if($this->upload->do_upload('image'))
					{
						$uploadData = $this->upload->data();
						$image = "upload/mainabout/".$uploadData['file_name'];
					    
					}else{
						$image = '';
					}
				}else{
				    $image = $rec->image;
				}
			$arr = array(
			             'title'=>$this->input->post('title'),
			             'description'=>$this->input->post('description'),
			            
						 
						);
			$insert = $this->Home_model->update(TBL_FAQ,$id,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Faq has been updated successfully');
			    redirect('admin/Faq/edit/'.$cid);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Faq/edit/'.$cid);
			}			
			
		}
	    $data["page"]="Edit Faq";
		$data["records"] = $rec;
	    $this->load->view('admin/faq_add',$data);
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
  
   
}

