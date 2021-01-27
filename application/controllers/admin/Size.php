<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Size extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				 $this->load->library(array('form_validation', 'email','cart','session'));
				 
			  }


    public function index()
    {
        	$data["view"] = $this->Home_model->get_tbl_data(TBL_SIZE,array('status'=>1));
        $this->load->view('admin/size',$data);
    }
   
 public function add()
  {     
       //$rec = $this->Home_model->get_single_row(TBL_ARTICAL,array('id'=>$id));
        if($this->input->post('submit')){
             $this->form_validation->set_rules('name', 'Name', 'trim|required');
       
         if($this->form_validation->run() == FALSE)
    {
          $data["page"]="Add Size";
	    
	    $this->load->view('admin/size_add',$data);
    }
    else
    {
        $name =$this->input->post('name');
              $catcheck = $this->Home_model->get_single_row(TBL_SIZE,array('name'=>$name,'status'=>1));
     if(count($catcheck) == 0){
			$arr = array(
			            
			             'name'=>$this->input->post('name'),
			             'status'=>1,
			             'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_SIZE,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Farm has been added successfully');
			    redirect('admin/Size/');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Size/');
			}	
     }else{
         	$this->session->set_flashdata('errmessage', 'Size Name exist !try another name!');
			    redirect('admin/Size/');
     }
			
		}
        }else{
	    $data["page"]="Add Size";
	   // $data["farm"] = $this->Home_model->get_tbl_data(TBL_SIZE,array());
	    $this->load->view('admin/size_add',$data);
        }
 }
 
 
 
 public function edit($id)
  {     
        $rec = $this->Home_model->get_single_row(TBL_SIZE,array('id'=>$id));
        if($this->input->post('submit')){
             $this->form_validation->set_rules('name', 'Name', 'trim|required');
       
         if($this->form_validation->run() == FALSE)
    {
         $data["page"]="Edit Size";
		$data["records"] = $rec;
		//$data["farm"] = $this->Home_model->get_tbl_data(TBL_FARM,array());
	    $this->load->view('admin/size_add',$data);
    }
    else
    {
            
            $arr = array(
			            
			            'name'=>$this->input->post('name'),
			        	);
			$insert = $this->Home_model->update(TBL_SIZE,$id,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Size has been updated successfully');
			    redirect('admin/Size/edit/'.$id);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Size/edit/'.$id);
			}			
			
		}
        }else{
	    $data["page"]="Edit Size";
		$data["records"] = $rec;
		//$data["farm"] = $this->Home_model->get_tbl_data(TBL_FARM,array());
	    $this->load->view('admin/size_add',$data);
        }
 }
 
  public function delete($id){
    $rec = $this->Home_model->get_single_row(TBL_SIZE,array('id'=>$id));
   // unlink( $rec->image );
   $this->Home_model->update_where(TBL_SIZE,array('id'=>$id),array('status'=>0));
   // $this->Home_model->delete(TBL_SIZE,'id',$id);
	$this->session->set_flashdata('message', 'Size has been deleted successfully');
	redirect('admin/Size') ;
  
  }
    
}