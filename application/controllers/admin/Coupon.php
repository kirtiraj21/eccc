<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				 	$this->load->library(array('form_validation', 'email','cart','session'));
				
				 //if($this->session->userdata["admin_user"]["type"]=='ADMIN'){}else{ redirect('admin/Home/'); }
				 
			  }


public function index()
  {
	 
	    $data["page"]="Coupon Code";
		$data["view"] = $this->Home_model->get_tbl_data(TBL_COUPON,array('status'=>1));
	    $this->load->view('admin/coupon',$data);
 }

 /*      Add Category   */
 
public function add()
  {     
        if($this->input->post('submit')){
            
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
             $this->form_validation->set_rules('min_purchase', 'Min Purchase', 'trim|required');
              $this->form_validation->set_rules('discount', 'Discount', 'trim|required');
               $this->form_validation->set_rules('uses', 'Uses', 'trim|required');
                $this->form_validation->set_rules('expdate', 'Expiry Date', 'trim|required');
       
         if($this->form_validation->run() == FALSE)
    {
        $data["page"]="Add Coupon";
	    $this->load->view('admin/coupon_add',$data);
    }
    else
    {
	     if(!empty($_FILES['image']['name']))
				{
					$configs['upload_path'] = 'upload/mainbrand/';
					$configs['allowed_types'] = 'jpg|jpeg|png|gif';
					$configs['file_name'] = $_FILES['image']['name'];
					
			 	    //Load upload library and initialize configuration
					$this->load->library('upload',$configs);
					$this->upload->initialize($configs);
				
					if($this->upload->do_upload('image'))
					{
						$uploadData = $this->upload->data();
						$image = "upload/mainbrand/".$uploadData['file_name'];
					    
					}else{
						$image = '';
					}
				}
			$arr = array(
			             'name'=>$this->input->post('name'),
			             'min_purchase'=>$this->input->post('min_purchase'),
			             'discount'=>$this->input->post('discount'),
			             'uses'=>$this->input->post('uses'),
			             'expiry_date'=>$this->input->post('expdate'),
			             //'image'=>$image,
			             'status'=>1,
						 'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_COUPON,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Coupon has been added successfully');
			    redirect('admin/Coupon');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Coupon');
			}			
			
		}
        }else{
	    $data["page"]="Add Coupon";
	    $this->load->view('admin/coupon_add',$data);
        }
 }
 
 public function edit($cid)
    {
      $id = base64_decode($cid);
      $rec = $this->Home_model->get_single_row(TBL_COUPON,array('id'=>$id));
        if($this->input->post('submit')){
			 if(!empty($_FILES['image']['name']))
				{
					$configs['upload_path'] = 'upload/mainbrand/';
					$configs['allowed_types'] = 'jpg|jpeg|png|gif';
					$configs['file_name'] = $_FILES['image']['name'];
					
			 	    //Load upload library and initialize configuration
					$this->load->library('upload',$configs);
					$this->upload->initialize($configs);
				
					if($this->upload->do_upload('image'))
					{
						$uploadData = $this->upload->data();
						$image = "upload/mainbrand/".$uploadData['file_name'];
					    
					}else{
						$image = '';
					}
				}else{
				    $image = $rec->image;
				}
			$arr = array(
			             'name'=>$this->input->post('name'),
			              'min_purchase'=>$this->input->post('min_purchase'),
			             'discount'=>$this->input->post('discount'),
			              'uses'=>$this->input->post('uses'),
			             'expiry_date'=>$this->input->post('expdate'),
			            // 'image'=>$image,
						 
						);
			$insert = $this->Home_model->update(TBL_COUPON,$id,$arr);	
            if($insert){
				$this->session->set_flashdata('message', 'Coupon has been updated successfully');
				redirect('admin/Coupon/edit/'.$cid);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Coupon/edit/'.$cid);
			}			
			
		}
	    $data["page"]="Edit Coupon";
		$data["records"] = $rec;
	    $this->load->view('admin/coupon_add',$data);
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
    $this->Home_model->update_where(TBL_COUPON,array('id'=>$id),array('status'=>0));
   // $this->Home_model->delete(TBL_STORE_CATEGORY,'category_id',$id);
	$this->session->set_flashdata('message', 'Coupon has been deleted successfully');
	redirect('admin/Coupon') ;
  
  }
  
   
}

