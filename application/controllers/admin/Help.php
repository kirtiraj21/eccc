<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				
				 //if($this->session->userdata["admin_user"]["type"]=='ADMIN'){}else{ redirect('admin/Home/'); }
				 
			  }


public function index()
  {
	 
	    $data["page"]="Help";
		$data["view"] = $this->Home_model->get_tbl_data(TBL_HELP,array());
	    $this->load->view('admin/help',$data);
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
			             'name'=>$this->input->post('name'),
			             'image'=>$image,
			             'status'=>1,
						 'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_CATEGORY,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Category has been added successfully');
			    redirect('admin/Category/');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Category/');
			}			
			
		}
	    $data["page"]="Add Category";
	    $this->load->view('admin/category_add',$data);
 }
 
 public function edit()
  {   
      //$id = base64_decode($cid);
      $rec = $this->Home_model->get_single_row(TBL_HELP,array());
        if($this->input->post('submit')){
			 
			$arr = array(
			             //'title'=>$this->input->post('title'),
			             'description'=>$this->input->post('description'),
			            // 'image'=>$image,
						 
						);
			 $datap = $this->db->select('*')->from('help')->get()->row();
  	       
			if($datap!=''){
           $insert = $this->Home_model->update(TBL_HELP,$datap->id,$arr);	
			}else{
			   	$insert = $this->Home_model->insert(TBL_HELP,$arr);	 
			}
		
            if($insert){
				$this->session->set_flashdata('message', 'Help has been updated successfully');
			    redirect('admin/Help/edit/'.$cid);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Help/edit/'.$cid);
			}			
			
		}
	    $data["page"]="Edit Help";
		$data["records"] = $rec;
	    $this->load->view('admin/help_add',$data);
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

