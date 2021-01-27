<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Farms extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				 
			  }


    public function index()
    {
        $data['view']=$this->Home_model->get_tbl_data_inorder(TBL_FARM);
        $this->load->view('admin/farms',$data);
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
              
             
			$arr = array(
			             'name'=>$this->input->post('name'),
			             'status'=>1,
			             'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_FARM,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Farm has been added successfully');
			    redirect('admin/Farms/');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Farms/');
			}			
			
		}
	    $data["page"]="Add user";
	    $this->load->view('admin/farm_add',$data);
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
        $rec = $this->Home_model->get_single_row(TBL_FARM,array('id'=>$id));
        if($this->input->post('submit')){
            
            
			  if(!empty($_FILES['image']['name']))
              {
                unlink( $rec->image );  
                $image = $this->singleimg('image','upload/Farms/');
              }else{
                $image = $rec->path;
              } 
               if(!empty($_FILES['photo']['name']))
              {
                $photo = $this->singleimg('photo','upload/Farms/images/');
              }else{
                $photo = $rec->image;
              }
			$arr = array(
			            'name'=>$this->input->post('name'),
			        	);
			$insert = $this->Home_model->update(TBL_FARM,$id,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Farm has been updated successfully');
			    redirect('admin/Farms/edit/'.$id);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Farms/edit/'.$id);
			}			
			
		}
	    $data["page"]="Edit Farms";
		$data["records"] = $rec;
	    $this->load->view('admin/farm_add',$data);
 }
 
  public function delete($id){
    $rec = $this->Home_model->get_single_row(TBL_FARM,array('id'=>$id));
   // unlink( $rec->image );
    $this->Home_model->delete(TBL_FARM,'id',$id);
	$this->session->set_flashdata('message', 'Farms has been deleted successfully');
	redirect('admin/Farms') ;
  
  }
    
}