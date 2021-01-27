<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				
				 $this->load->model('admin/Home_model');
				 $this->load->library(array('form_validation', 'email','cart','session'));
				
				 //if($this->session->userdata["admin_user"]["type"]=='ADMIN'){}else{ redirect('admin/Home/'); }
				 
			  }


public function index()
  {
	 
	    $data["page"]="Product";
		$data["view"] = $this->Home_model->get_tbl_data(TBL_PRODUCT,array());
		$this->load->view('admin/product',$data);
  }

 /*      Add Category   */
 
public function add()
  {     
    if($this->input->post('submit')){
        
         $hot = $this->input->post('hot_selling');
             $this->form_validation->set_rules('name', 'Name', 'trim|required');
             $this->form_validation->set_rules('description', 'Descripton', 'trim|required');
             $this->form_validation->set_rules('price', 'Price', 'trim|required');
             $this->form_validation->set_rules('discount', 'Discount', 'trim|required');
             $this->form_validation->set_rules('category_id', 'Category', 'trim|required');
             $this->form_validation->set_rules('sub_category_id', 'Sub Category', 'trim|required');
             $this->form_validation->set_rules('stock', 'Stock', 'trim|required');
             if($hot ==1){
             $this->form_validation->set_rules('expdate', 'Expiry Date', 'trim|required');    
             }
       
         if($this->form_validation->run() == FALSE)
    {
       $data["page"]="Add Product";
	    $data["records_category"] = $this->Home_model->get_tbl_data(TBL_CATEGORY,array('status'=>1));
        $data["records_brand"] = $this->Home_model->get_tbl_data(TBL_BRAND,array('status'=>1));
	    $data["records_size"] = $this->Home_model->get_tbl_data(TBL_SIZE,array('status'=>1));
	    $data["records_color"] = $this->Home_model->get_tbl_data(TBL_COLOR,array('status'=>1));

	    $this->load->view('admin/product_add',$data);
    }
    else
    {
           
	      $size = $this->input->post('size_id');
	      $brand = $this->input->post('brand_id');
	      $color = $this->input->post('color_id');
	       $supersale = $this->input->post('super_sale');
	       if($supersale!=''){
	         $supersale = $this->input->post('super_sale');
	       }else{
	          $supersale =0; 
	       }
	       
	       $hot = $this->input->post('hot_selling');
	       if($hot!=''){
	            $hot = $this->input->post('hot_selling');
	       }else{
	          $hot =0; 
	       }
	       
	      $newseason = $this->input->post('new_season');
	      if($newseason!=''){
	            $newseason = $this->input->post('new_season');
	       }else{
	          $newseason =0; 
	       }
	        
           $br =$this->input->post('brand_id');
	      
			$arr = array(
			             'name'=>$this->input->post('name'),
			             'description'=>$this->input->post('description'),
			             'price'=>$this->input->post('price'),
			             'discount'=>$this->input->post('discount'),
			             'price_after_discount'=>$this->input->post('price_after_discount'),
			             'category'=>$this->input->post('category_id'),
			             'sub_category'=>$this->input->post('sub_category_id'),
			             'super_sale'=>$supersale,
			             'hot_selling'=>$hot,
			             'new_season'=>$newseason,
			             'expiry_date'=>$this->input->post('expdate'),
			             'stock'=>$this->input->post('stock'),
			             'brand'=>$br,
						 'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->insert(TBL_PRODUCT,$arr);	
			
            if($insert){
                
                foreach($size  as $size){
                    $arrsize = array(
			             'product_id'=>$insert,
			             'size'=>$size,
						);
                  $insertsize = $this->Home_model->insert(TBL_PRODUCT_SIZE,$arrsize);  
                }
                
                
                 foreach($color  as $color){
                    $arrcolor = array(
			             'product_id'=>$insert,
			             'color'=>$color,
						);
                  $insertcolor = $this->Home_model->insert(TBL_PRODUCT_COLOR,$arrcolor);  
                }
                
              for($i=0;$i<count($_FILES['image']['name']); $i++){
				      
				        
				  if(!empty($_FILES['image']['name'][$i])){ 
				      
		              $_FILES['file']['name'] = $_FILES['image']['name'][$i];
                      $_FILES['file']['type'] = $_FILES['image']['type'][$i];
                      $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
                      $_FILES['file']['error'] = $_FILES['image']['error'][$i];
                      $_FILES['file']['size'] = $_FILES['image']['size'][$i];
				      
					$configs['upload_path'] = 'upload/mainproduct/';
					$configs['allowed_types'] = 'jpg|jpeg|png|gif';
					$configs['file_name'] = $_FILES['image']['name'][$i];
					
			 	    //Load upload library and initialize configuration
					$this->load->library('upload',$configs);
					$this->upload->initialize($configs);
				
					if($this->upload->do_upload('file'))
					{
					
						$uploadData = $this->upload->data();
						$image = "upload/mainproduct/".$uploadData['file_name'];
					    
					}else{
						$image = '';
						
					}
					$arrimg = array(
			             'product_id'=>$insert,
			             'image'=>$image,
						);
					
					$insertimg = $this->Home_model->insert(TBL_PRODUCT_IMG,$arrimg);	
				  }
				}
				
				$this->session->set_flashdata('message', 'Product has been added successfully');
			    redirect('admin/Product/');
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Product/');
			}			
			
		}
        }else{
	    $data["page"]="Add Product";
	    $data["records_category"] = $this->Home_model->get_tbl_data(TBL_CATEGORY,array('status'=>1));
        $data["records_brand"] = $this->Home_model->get_tbl_data(TBL_BRAND,array('status'=>1));
	    $data["records_size"] = $this->Home_model->get_tbl_data(TBL_SIZE,array('status'=>1));
	    $data["records_color"] = $this->Home_model->get_tbl_data(TBL_COLOR,array('status'=>1));

	    $this->load->view('admin/product_add',$data);
        }
 }
 
 public function edit($cid)
  {   
      $id = base64_decode($cid);
      $rec = $this->Home_model->get_single_row(TBL_PRODUCT,array('id'=>$id));
      
      
        if($this->input->post('submit')){
            
             $limited = $this->input->post('limited_time');
	       if($limited!=''){
	         $limited = $this->input->post('limited_time');
	       }else{
	          $limited =0; 
	       }
	        $hot = $this->input->post('hot_selling');
	        
	      if($hot!=''){
	            $hot = $this->input->post('hot_selling');
	       }else{
	          $hot =0; 
	       }
            
             $size = $this->input->post('size_id');
             $brand = $this->input->post('brand_id');
             $color = $this->input->post('color_id');
              $br = $this->input->post('brand_id');
           	$arr = array(
			             'name'=>$this->input->post('name'),
			             'description'=>$this->input->post('description'),
			             'price'=>$this->input->post('price'),
			             'discount'=>$this->input->post('discount'),
			             'price_after_discount'=>$this->input->post('price_after_discount'),
			             'category'=>$this->input->post('category_id'),
			             'sub_category'=>$this->input->post('sub_category_id'),
			             'super_sale'=>$supersale,
			             'hot_selling'=>$hot,
			             'new_season'=>$newseason,
			             'expiry_date'=>$this->input->post('expdate'),
			             'stock'=>$this->input->post('stock'),
			             'brand'=>$br,
						 'created_on'=>date('Y-m-d h:i:s')
						);
			$insert = $this->Home_model->update(TBL_PRODUCT,$id,$arr);	
            if($insert){
                
                 $this->Home_model->delete(TBL_PRODUCT_SIZE,'product_id',$id);

                 foreach($size  as $size){
                    $arrsize = array(
			             'product_id'=>$id,
			             'size'=>$size,
						);
                  $insertsize = $this->Home_model->insert(TBL_PRODUCT_SIZE,$arrsize);  
                }
                
                
                 $this->Home_model->delete(TBL_PRODUCT_BRAND,'product_id',$id);

 
                
                
                $this->Home_model->delete(TBL_PRODUCT_COLOR,'product_id',$id);

                 foreach($color  as $color){
                    $arrcolor = array(
			             'product_id'=>$id,
			             'color'=>$color
						);
                  $insertcolor = $this->Home_model->insert(TBL_PRODUCT_COLOR,$arrcolor);  
                }
                
                 $c_file = count($_FILES['image']['name']);
                
                 if($c_file > 0){
                 
                	for($i=0;$i<count($_FILES['image']['name']); $i++){
				      
				        
				  if(!empty($_FILES['image']['name'][$i])){ 
				      
		              $_FILES['file']['name'] = $_FILES['image']['name'][$i];
                      $_FILES['file']['type'] = $_FILES['image']['type'][$i];
                      $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
                      $_FILES['file']['error'] = $_FILES['image']['error'][$i];
                      $_FILES['file']['size'] = $_FILES['image']['size'][$i];
				      
					$configs['upload_path'] = 'upload/mainproduct/';
					$configs['allowed_types'] = 'jpg|jpeg|png|gif';
					$configs['file_name'] = $_FILES['image']['name'][$i];
					
			 	    //Load upload library and initialize configuration
					$this->load->library('upload',$configs);
					$this->upload->initialize($configs);
				
					if($this->upload->do_upload('file'))
					{
					
						$uploadData = $this->upload->data();
						$image = "upload/mainproduct/".$uploadData['file_name'];
					    
					}else{
						$image = '';
						
					}
					$arrimg = array(
			             'product_id'=>$id,
			             'image'=>$image,
						);
					
					$insertimg = $this->Home_model->insert(TBL_PRODUCT_IMG,$arrimg);	
				  }
                }
                
             }
				$this->session->set_flashdata('message', 'Category has been updated successfully');
			    redirect('admin/Product/edit/'.$cid);
			}else{
				$this->session->set_flashdata('errmessage', 'Some problem occured please try after some time');
			    redirect('admin/Product/edit/'.$cid);
			}			
			
		}
		
	    $data["page"]="Edit Product";
	    $data["records_category"] = $this->Home_model->get_tbl_data(TBL_CATEGORY,array('status'=>1));
	    $data["records_brand"] = $this->Home_model->get_tbl_data(TBL_BRAND,array('status'=>1));
	    $data["records_size"] = $this->Home_model->get_tbl_data(TBL_SIZE,array('status'=>1));
	    $data["records_color"] = $this->Home_model->get_tbl_data(TBL_COLOR,array('status'=>1));
        $data["records_img"] = $this->Home_model->get_tbl_data(TBL_PRODUCT_IMG,array('product_id'=>$id));
        $data["subcategory"] = $this->Home_model->get_tbl_data(TBL_SUB_CATEGORY,array('status'=>1));
        $data["records"] = $rec;
	    $this->load->view('admin/product_add',$data);
 }
 
  public function delete($id){
  
    $this->Home_model->delete(TBL_PRODUCT,'id',$id);
    $this->Home_model->delete(TBL_PRODUCT_IMG,'product_id',$id);
    $this->Home_model->delete(TBL_PRODUCT_SIZE,'product_id',$id);
    $this->Home_model->delete(TBL_PRODUCT_COLOR,'product_id',$id);
    $this->Home_model->delete(TBL_PRODUCT_BRAND,'product_id',$id);

	$this->session->set_flashdata('message', 'Product has been deleted successfully');
	redirect('admin/Product') ;
  
  }
  
  
  public function delete_img($id,$cid){
    
   $this->Home_model->delete(TBL_PRODUCT_IMG,'id',base64_decode($id));
	$this->session->set_flashdata('message', 'Image has been deleted successfully');
	redirect('admin/Product/edit/'.$cid) ;
  
  }
  
  
  public function getsubcat()
  {
	 
	    $catid = $this->input->post('cat');
		$subcategorydata = $this->Home_model->get_tbl_data(TBL_SUB_CATEGORY,array('category_id'=>$catid,'status'=>1));
		if(!empty($subcategorydata)){
		foreach($subcategorydata as $sub){?>
		    <option value="<?php echo $sub->id; ?>"><?php echo $sub->name; ?></option>
	<?php	}
		}else{
		    echo 0;
		}
		
  }
  
  
  
  
  
   
}

