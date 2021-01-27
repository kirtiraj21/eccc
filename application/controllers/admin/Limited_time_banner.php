<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Limited_time_banner extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				 $this->load->library(array('form_validation', 'email','cart','session'));

				
				 //if($this->session->userdata["admin_user"]["type"]=='ADMIN'){}else{ redirect('admin/Home/'); }
				 
			  }


public function index()
  {
	 
	    $data["page"]=" Limited Time Banner";
		$data["view"] = $this->Home_model->get_tbl_data(TBL_LIMITED_TIME_BANNER,array());
	    $this->load->view('admin/limited_banner',$data);
 }

 /*      Add Category   */
 
public function add()
  {     
        if($this->input->post('submit')){
         
          $this->form_validation->set_rules('name', 'Name', 'trim|required');
            //$this->form_validation->set_rules('description', 'Description', 'trim|required');
       
         if($this->form_validation->run() == FALSE)
    {
       $data["page"]="Add Banner";
	    $this->load->view('admin/limited_banner_add',$data);
        
    }
    else
    {
           
	     if(!empty($_FILES['image']['name']))
				{
					$configs['upload_path'] = 'upload/appbanner/';
					$configs['allowed_types'] = 'jpg|jpeg|png|gif';
					$configs['file_name'] = $_FILES['image']['name'];
					
			 	    //Load upload library and initialize configuration
					$this->load->library('upload',$configs);
					$this->upload->initialize($configs);
				
					if($this->upload->do_upload('image'))
					{
					    
						$uploadData = $this->upload->data();
						$image = "upload/appbanner/".$uploadData['file_name'];
					    
					}else{
					    
						$image = '';
					}
				
				}
				
				 if(!empty($_FILES['image1']['name']))
				{
					$configs['upload_path'] = 'upload/appbanner/';
					$configs['allowed_types'] = 'jpg|jpeg|png|gif';
					$configs['file_name'] = $_FILES['image1']['name'];
					
			 	    //Load upload library and initialize configuration
					$this->load->library('upload',$configs);
					$this->upload->initialize($configs);
				
					if($this->upload->do_upload('image1'))
					{
					    
						$uploadData = $this->upload->data();
						$image1 = "upload/appbanner/".$uploadData['file_name'];
					    
					}else{
					    
						$image1 = '';
					}
				
				}
			$arr = array(
			             'name'=>$this->input->post('name'),
			             'image'=>$image,
			             'image'=>$image1,
						 'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_LIMITED_TIME_BANNER,$arr);	
            if($insert){
				$this->session->set_flashdata('message', ' Limited Time Banner has been added successfully');
			    redirect('admin/Limited_time_banner/');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Limited_time_banner/');
			}			
			
		}
		}else{
		     $data["page"]="Add Banner";
	    $this->load->view('admin/limited_banner_add',$data);
		}
	   
 
  }
 
 public function edit()
  {   
      //$id = base64_decode($cid);
      $rec = $this->Home_model->get_single_row(TBL_LIMITED_TIME_BANNER,array());
        if($this->input->post('submit')){
//             $this->form_validation->set_rules('name', 'Name', 'trim|required');
//             //$this->form_validation->set_rules('description', 'Description', 'trim|required');
       
//          if($this->form_validation->run() == FALSE)
//     {
//       $data["page"]="Edit Limited Time banner";
// 		$data["records"] = $rec;
// 	    $this->load->view('admin/limited_banner_add',$data);
        
//     }
//     else
//     {
			 if(!empty($_FILES['image']['name']))
				{
					$configs['upload_path'] = 'upload/appbanner/';
					$configs['allowed_types'] = 'jpg|jpeg|png|gif';
					$configs['file_name'] = $_FILES['image']['name'];
					
			 	    //Load upload library and initialize configuration
					$this->load->library('upload',$configs);
					$this->upload->initialize($configs);
				
					if($this->upload->do_upload('image'))
					{
						$uploadData = $this->upload->data();
						$image = "upload/appbanner/".$uploadData['file_name'];
					    
					}else{
						$image = '';
					}
				}else{
				    $image = $rec->image;
				}
				
				
				
				if(!empty($_FILES['image1']['name']))
				{
					$configs['upload_path'] = 'upload/appbanner/';
					$configs['allowed_types'] = 'jpg|jpeg|png|gif';
					$configs['file_name'] = $_FILES['image1']['name'];
					
			 	    //Load upload library and initialize configuration
					$this->load->library('upload',$configs);
					$this->upload->initialize($configs);
				
					if($this->upload->do_upload('image1'))
					{
						$uploadData = $this->upload->data();
						$image1 = "upload/appbanner/".$uploadData['file_name'];
					    
					}else{
						$image1 = '';
					}
				}else{
				    $image1 = $rec->image1;
				}
			$arr = array(
			             //'name'=>$this->input->post('name'),
			             'image'=>$image,
			             'image1'=>$image1,
						 
						);
						
			$datap = $this->db->select('*')->from('limited_time_banner')->get()->row();
  	       
			if($datap!=''){
           $insert = $this->Home_model->update(TBL_LIMITED_TIME_BANNER,$datap->id,$arr);	
			}else{
			   	$insert = $this->Home_model->insert(TBL_LIMITED_TIME_BANNER,$arr);	 
			}
// 			$insert = $this->Home_model->update(TBL_LIMITED_TIME_BANNER,$id,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'limited time banner has been updated successfully');
			    redirect('admin/Limited_time_banner/edit/'.$cid);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Limited_time_banner/edit/'.$cid);
			}			
			
		}
        //}else{
	    $data["page"]="Edit Limited Time banner";
		$data["records"] = $rec;
	    $this->load->view('admin/limited_banner_add',$data);//}
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
    //$this->Home_model->update_where(TBL_CATEGORY,array('id'=>$id),array());
    $this->Home_model->delete(TBL_LIMITED_TIME_BANNER,'id',$id);
	$this->session->set_flashdata('message', ' Limited time Banner has been deleted successfully');
	redirect('admin/banner') ;
  
  }
  
   
}

