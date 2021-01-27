<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_Category extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				 	 $this->load->library(array('form_validation', 'email','cart','session'));
				
				 //if($this->session->userdata["admin_user"]["type"]=='ADMIN'){}else{ redirect('admin/Home/'); }
				 
			  }


public function index()
  {
	 
	    $data["page"]="Sub Category";
	   
		$data["view"] = $this->Home_model->get_tbl_data(TBL_SUB_CATEGORY,array('status'=>1));
	    $this->load->view('admin/sub_category',$data);
 }

 /*      Add Category   */
 
public function add()
  {     
        if($this->input->post('submit')){
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('category_id', 'Sub Category', 'trim|required');
           
       
         if($this->form_validation->run() == FALSE)
    {
       $data["page"]="Add sub category";
        $data["view_category"] = $this->Home_model->get_tbl_data(TBL_CATEGORY,array('status'=>1));
	    $this->load->view('admin/sub_category_add',$data);
        
    }
    else
    {
        $name =$this->input->post('name');
              $catcheck = $this->Home_model->get_single_row(TBL_SUB_CATEGORY,array('name'=>$name));
     if(count($catcheck) == 0){
	   //  if(!empty($_FILES['image']['name']))
				// {
				// 	$configs['upload_path'] = 'upload/maincategory/';
				// 	$configs['allowed_types'] = 'jpg|jpeg|png|gif';
				// 	$configs['file_name'] = $_FILES['image']['name'];
					
			 //	    //Load upload library and initialize configuration
				// 	$this->load->library('upload',$configs);
				// 	$this->upload->initialize($configs);
				
				// 	if($this->upload->do_upload('image'))
				// 	{
				// 		$uploadData = $this->upload->data();
				// 		$image = "upload/maincategory/".$uploadData['file_name'];
					    
				// 	}else{
				// 		$image = '';
				// 	}
				// }
			$arr = array(
			             'name'=>$this->input->post('name'),
			             'category_id'=>$this->input->post('category_id'),
			             //'image'=>$image,
			             'status'=>1,
						 'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_SUB_CATEGORY,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Sub category has been added successfully');
			    redirect('admin/Sub_Category/');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Sub_Category/');
			}
     }else{
         	$this->session->set_flashdata('errmessage', 'Category Name exist !try another name!');
			    redirect('admin/Sub_Category/');
     }
			
		}
        }else{
	    $data["page"]="Add Sub Category";
	     $data["view_category"] = $this->Home_model->get_tbl_data(TBL_CATEGORY,array('status'=>1));
	    $this->load->view('admin/sub_category_add',$data);
        }
 }
 
 public function edit($cid)
  {   
      $id = base64_decode($cid);
      $rec = $this->Home_model->get_single_row(TBL_SUB_CATEGORY,array('id'=>$id));
        if($this->input->post('submit')){
             $this->form_validation->set_rules('name', 'Name', 'trim|required');
             $this->form_validation->set_rules('category_id', 'Category', 'trim|required');
            
         if($this->form_validation->run() == FALSE)
    {
     $data["page"]="Edit Sub Category";
      $data["view_category"] = $this->Home_model->get_tbl_data(TBL_CATEGORY,array('status'=>1));
		$data["records"] = $rec;
	    $this->load->view('admin/sub_category_add',$data);
        
    }
    else
    {
    //       $name =$this->input->post('name');
    //           $catcheck = $this->Home_model->get_single_row(TBL_CATEGORY,array('name'=>$name));
    //  if(count($catcheck) == 0){
			 //if(!empty($_FILES['image']['name']))
				// {
				// 	$configs['upload_path'] = 'upload/maincategory/';
				// 	$configs['allowed_types'] = 'jpg|jpeg|png|gif';
				// 	$configs['file_name'] = $_FILES['image']['name'];
					
			 //	    //Load upload library and initialize configuration
				// 	$this->load->library('upload',$configs);
				// 	$this->upload->initialize($configs);
				
				// 	if($this->upload->do_upload('image'))
				// 	{
				// 		$uploadData = $this->upload->data();
				// 		$image = "upload/maincategory/".$uploadData['file_name'];
					    
				// 	}else{
				// 		$image = '';
				// 	}
				// }else{
				//     $image = $rec->image;
				// }
			$arr = array(
			             'name'=>$this->input->post('name'),
			             'category_id'=>$this->input->post('category_id'),
			             //'image'=>$image,
						 
						);
			$insert = $this->Home_model->update(TBL_SUB_CATEGORY,$id,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Sub Category has been updated successfully');
			    redirect('admin/Sub_Category/edit/'.$cid);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Sub_Category/edit/'.$cid);
			}
    //  }else{
    //      	$this->session->set_flashdata('errmessage', 'Category Name exist !try another name!');
			 //   redirect('admin/Category/');
    //  }
			
		}
        }else{
	    $data["page"]="Edit Sub Category";
	     $data["view_category"] = $this->Home_model->get_tbl_data(TBL_CATEGORY,array('status'=>1));
		$data["records"] = $rec;
	    $this->load->view('admin/sub_category_add',$data);
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
    $this->Home_model->update_where(TBL_SUB_CATEGORY,array('id'=>$id),array('status'=>0));
   // $this->Home_model->delete(TBL_STORE_CATEGORY,'category_id',$id);
	$this->session->set_flashdata('message', 'Sub Category has been deleted successfully');
	redirect('admin/Sub_Category') ;
  
  }
  
   
}

