<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				
				 //$this->load->helper("image_helper");
				 
			  }


public function index()
  {
	 
	   $rec = $this->Home_model->get_single_row(TBL_CONTACT,array());
        if($this->input->post('submit')){
            
            
			  if(!empty($_FILES['image']['name']))
              {
                unlink( $rec->image );  
                $image = $this->singleimg('image','upload/Contact/');
              }else{
                $image = $rec->image;
              } 
			$arr = array(
			             'email'=>$this->input->post('email'),
			             'location'=>$this->input->post('location'),
			             'latitude'=>$this->input->post('lat'),
			             'longitude'=>$this->input->post('lon'),
			             'mon_thu'=>$this->input->post('mon_thu'),
			             'fri'=>$this->input->post('fri'),
			             'fax'=>$this->input->post('fax'),
			             'phone'=>$this->input->post('phone')
			             //'image'=>$image,
			             //'updated_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->update(TBL_CONTACT,1,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Contact has been updated successfully');
			    redirect('admin/Contact/');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Contact/');
			}			
			
		}
	    $data["page"]="Edit Contact";
		$data["records"] = $rec;
	    $this->load->view('admin/contact_add',$data);
 }

 /*      Add Contact   */
 
public function add()
  {     
       //$rec = $this->Home_model->get_single_row(TBL_ARTICAL,array('id'=>$id));
        if($this->input->post('submit')){
           
	      if(!empty($_FILES['image']['name']))
              {
                $image = $this->singleimg('image','upload/contact/');
              }else{
                $image = '';
              } 
			$arr = array(
			             'email'=>$this->input->post('email'),
			             'location'=>$this->input->post('location'),
			             'latitude'=>$this->input->post('lat'),
			             'longitude'=>$this->input->post('lon'),
			             'mon_thu'=>$this->input->post('mon_thu'),
			             'fri'=>$this->input->post('fri'),
			             'mobile'=>$this->input->post('mobile'),
			             'phone'=>$this->input->post('phone'),
			             //'image'=>$image,
			             'status'=>1,
			             'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_CONTACT,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Contact has been added successfully');
			    redirect('admin/Contact/');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Contact/');
			}			
			
		}
	    $data["page"]="Add Contact";
	    $this->load->view('admin/contact_add',$data);
 }
 
  function singleimg($name,$path)
{
     if(!empty($_FILES[$name]['name']))
		{
		   
			$_FILES['file']['name'] = $_FILES[$name]['name'];
			$_FILES['file']['tmp_name'] = $_FILES[$name]['tmp_name'] ;
			$_FILES['file']['size'] = $_FILES[$name]['size'] ;
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'png|gif|jpg|jpeg';
		 	$config['file_name'] = $_FILES['file']['name'];
			
			
			$photo=explode('.',$_FILES[$name]['name']); 
			$ext = strtolower($photo[count($photo)-1]); 
			if (!empty($_FILES[$name]['name'])) { 
			
				$curr_time = time(); 
				$filename= "image".time().".".$ext; 
				} 
			 $config['file_name'] = $filename; 
			
			//Load upload library and initialize configuration
		
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			
				if($this->upload->do_upload('file'))
				{
					$uploadData = $this->upload->data();
					return $deal1image = $path.$uploadData['file_name'];
				}else{
					return $deal1image = '';
				}
		}else{
		return	$deal1image = '' ;
		}	 
		
}
 
 public function edit($id)
  {     
        $rec = $this->Home_model->get_single_row(TBL_CONTACT,array('id'=>$id));
        if($this->input->post('submit')){
            
			  if(!empty($_FILES['image']['name']))
              {
                unlink( $rec->image );  
                $image = $this->singleimg('image','upload/Contact/');
              }else{
                $image = $rec->image;
              } 
			$arr = array(
			             'email'=>$this->input->post('email'),
			             'location'=>$this->input->post('location'),
			             'latitude'=>$this->input->post('lat'),
			             'longitude'=>$this->input->post('lon'),
			             'mon_thu'=>$this->input->post('mon_thu'),
			             'fri'=>$this->input->post('fri'),
			              'mobile'=>$this->input->post('mobile'),
			             'phone'=>$this->input->post('phone')
			             //'image'=>$image,
			             //'updated_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->update(TBL_CONTACT,$id,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Contact has been updated successfully');
			    redirect('admin/Contact/edit/'.$id);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Contact/edit/'.$id);
			}			
			
		}
	    $data["page"]="Edit Contact";
		$data["records"] = $rec;
	    $this->load->view('admin/contact_add',$data);
 }
 
  public function delete($id){
    $rec = $this->Home_model->get_single_row(TBL_CONTACT,array('id'=>$id));
    //unlink( $rec->image );
    $this->Home_model->delete(TBL_CONTACT,'id',$id);
	$this->session->set_flashdata('message', 'Contact has been deleted successfully');
	redirect('admin/Contact') ;
  
  }
  
   
}

