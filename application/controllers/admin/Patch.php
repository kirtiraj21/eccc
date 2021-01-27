<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Patch extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				 
			  }


    public function index()
    {
        $data['view']=$this->Home_model->get_tbl_data_inorder(TBL_PATCH);
        $this->load->view('admin/patch',$data);
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
  
   public function adddetail($id)
  {     
      $patch_id = base64_decode($id);
       //$rec = $this->Home_model->get_single_row(TBL_ARTICAL,array('id'=>$id));
        if($this->input->post('submit')){
        
			$arr = array(
			            'patch_id'=>$patch_id,
			            'property'=>$this->input->post('property'),
			            'patch'=>$this->input->post('patch'),
                        'farm'=>$this->input->post('farm'),
                        'block_id'=>$this->input->post('block_id'),
                        'hactares'=>$this->input->post('hactares'),
                        'row'=>$this->input->post('row'),
                        'plant'=>$this->input->post('plant'),
                        'trees'=>$this->input->post('trees'),
                        'type'=>$this->input->post('type'),
                        'variety'=>$this->input->post('variety'),
                        'rootstock'=>$this->input->post('rootstock'),
                        'year'=>$this->input->post('year'),
                        'rework'=>$this->input->post('rework'),
                        'irrigation'=>$this->input->post('irrigation'),
                        //'status'=>1,
			            'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_FARM_DIRECTORY,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Data has been added successfully');
			    redirect('admin/Patch/adddetail/'.$id);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Patch/adddetail/'.$id);
			}			
			
		}
		
		 if($this->input->post('update')){
        
			$arr = array(
			            'patch_id'=>$patch_id,
			            'property'=>$this->input->post('property'),
			            'patch'=>$this->input->post('patch'),
                        'farm'=>$this->input->post('farm'),
                        'block_id'=>$this->input->post('block_id'),
                        'hactares'=>$this->input->post('hactares'),
                        'row'=>$this->input->post('row'),
                        'plant'=>$this->input->post('plant'),
                        'trees'=>$this->input->post('trees'),
                        'type'=>$this->input->post('type'),
                        'variety'=>$this->input->post('variety'),
                        'rootstock'=>$this->input->post('rootstock'),
                        'year'=>$this->input->post('year'),
                        'rework'=>$this->input->post('rework'),
                        'irrigation'=>$this->input->post('irrigation'),
                        //'status'=>1,
			            //'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->update_where(TBL_FARM_DIRECTORY,array('patch_id'=>$patch_id),$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Data has been added successfully');
			    redirect('admin/Patch/adddetail/'.$id);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Patch/adddetail/'.$id);
			}			
			
		}
		
	    $data["page"]="Add detail";
	    $data["records"] = $this->Home_model->get_single_row(TBL_PATCH,array('id'=>$patch_id));
	    $data["view"] = $this->Home_model->get_single_row(TBL_FARM_DIRECTORY,array('patch_id'=>$patch_id));
	  
	    $this->load->view('admin/detail_add',$data);
 }
    
}