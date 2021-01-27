<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Records extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				 
			  }


    public function index()
    {
        $data['view']=$this->Home_model->get_tbl_data_inorder(TBL_RECORD);
        $this->load->view('admin/records',$data);
    }
   
 public function add()
  {     
       //$rec = $this->Home_model->get_single_row(TBL_ARTICAL,array('id'=>$id));
        if($this->input->post('submit')){
        
			$arr = array(
			             'farm_id'=>$this->input->post('farm_id'),
			             'name'=>$this->input->post('name'),
			             'status'=>1,
			             'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_PATCH,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Farm has been added successfully');
			    redirect('admin/Patch/');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Patch/');
			}			
			
		}
	    $data["page"]="Add user";
	    $data["farm"] = $this->Home_model->get_tbl_data(TBL_FARM,array());
	    $this->load->view('admin/patch_add',$data);
 }
 
 
 
 public function edit($id)
  {     
        $rec = $this->Home_model->get_single_row(TBL_PATCH,array('id'=>$id));
        if($this->input->post('submit')){
            
            $arr = array(
			            'farm_id'=>$this->input->post('farm_id'),
			            'name'=>$this->input->post('name'),
			        	);
			$insert = $this->Home_model->update(TBL_PATCH,$id,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Patch has been updated successfully');
			    redirect('admin/Patch/edit/'.$id);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Patch/edit/'.$id);
			}			
			
		}
	    $data["page"]="Edit Patch";
		$data["records"] = $rec;
		$data["farm"] = $this->Home_model->get_tbl_data(TBL_FARM,array());
	    $this->load->view('admin/patch_add',$data);
 }
 
  public function delete($id){
    $rec = $this->Home_model->get_single_row(TBL_PATCH,array('id'=>$id));
   // unlink( $rec->image );
    $this->Home_model->delete(TBL_PATCH,'id',$id);
	$this->session->set_flashdata('message', 'Patch has been deleted successfully');
	redirect('admin/Patch') ;
  
  }
    
}