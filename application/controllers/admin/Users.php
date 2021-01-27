<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				 
			  }


    public function index()
    {
        $data['view']=$this->Home_model->get_tbl_data_inorder(TBL_USER);
        $this->load->view('admin/user',$data);
    }
    public function view()
    {
        $id=base64_decode($_GET['Uiz']);
        $data['view']=$this->Home_model->get_single_row("users",array("id"=>$id));
        if(empty($data['view'])){ redirect("admin/Users"); }
        
        $this->load->view('admin/users_view',$data);
    }
     public function active($id)
  {
    $arr = array("status"=>1);
	$update = $this->Home_model->update(TBL_USER,$id,$arr);
	//$this->sendemail($id);
    $this->session->set_flashdata('message', 'User has been activated successfully');
    redirect('admin/Users');
 }
 public function block($id)
  {
    $arr = array("status"=>2);
	$update = $this->Home_model->update(TBL_USER,$id,$arr);
    $this->session->set_flashdata('message', 'User has been deactivated successfully');
    redirect('admin/Users');
 }
 
 public function add()
  {     
       //$rec = $this->Home_model->get_single_row(TBL_ARTICAL,array('id'=>$id));
        if($this->input->post('submit')){
           
	      if(!empty($_FILES['image']['name']))
              {
                $image = $this->singleimg('image','upload/user/');
              }else{
                $image = '';
              } 
              
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randstring = '';
			for ($i = 0; $i < 10; $i++) {
				$randstring .= $characters[rand(0, strlen($characters)-1)];
			}
			$verification_code = rand(0,1000000).$randstring.time() ; 
			$arr = array(
			             'name'=>$this->input->post('name'),
			             'token'=>$verification_code,
			             'status'=>1,
			             'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_USER,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'User has been added successfully');
			    redirect('admin/Users/');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Users/');
			}			
			
		}
	    $data["page"]="Add user";
	    $this->load->view('admin/user_add',$data);
 }
 
  function singleimg($name,$path)
{
     if(!empty($_FILES[$name]['name']))
		{
		   
			$_FILES['file']['name'] = $_FILES[$name]['name'];
			$_FILES['file']['tmp_name'] = $_FILES[$name]['tmp_name'] ;
			$_FILES['file']['size'] = $_FILES[$name]['size'] ;
			$config['upload_path'] = $path;
			$config['allowed_types'] = 'pdf|jpg|png|svg|jpeg';
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
        $rec = $this->Home_model->get_single_row(TBL_USER,array('id'=>$id));
        if($this->input->post('submit')){
            
            
			  if(!empty($_FILES['image']['name']))
              {
                unlink( $rec->image );  
                $image = $this->singleimg('image','upload/Users/');
              }else{
                $image = $rec->path;
              } 
               if(!empty($_FILES['photo']['name']))
              {
                $photo = $this->singleimg('photo','upload/Users/images/');
              }else{
                $photo = $rec->image;
              }
			$arr = array(
			            'name'=>$this->input->post('name'),
			        	);
			$insert = $this->Home_model->update(TBL_USER,$id,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'User has been updated successfully');
			    redirect('admin/Users/edit/'.$id);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Users/edit/'.$id);
			}			
			
		}
	    $data["page"]="Edit Users";
		$data["records"] = $rec;
	    $this->load->view('admin/user_add',$data);
 }
 
  public function delete($id){
    $rec = $this->Home_model->get_single_row(TBL_USER,array('id'=>$id));
    unlink( $rec->image );
    $this->Home_model->delete(TBL_USER,'id',$id);
	$this->session->set_flashdata('message', 'Users has been deleted successfully');
	redirect('admin/Users') ;
  
  }
    
}