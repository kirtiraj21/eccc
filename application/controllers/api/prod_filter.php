public function productlist(){
      
     $user_id = $this->input->post('user_id');
     $category_id = $this->input->post('category_id');
       $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        $this->form_validation->set_rules('category_id', 'catgeory_id', 'trim|required');
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
       $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id)); 
       if($user){
                  $brand_id = $this->input->post('brand_id');
                  $minprice = $this->input->post('minprice');
                  $maxprice = $this->input->post('maxprice');
                  $size_id = $this->input->post('size_id');
	 
	               if($brand_id != ''){
	                 $b_filter =$this->db->where('brand',$brand_id);
	                }else{
	                  $b_filter ="";
	                }
	                
	                if($minprice != ''){
	                 $p_filter_min =$this->db->where('price>=',(int)$minprice);
	                 $p_filter_max =$this->db->where('price<=',(int)$maxprice);
	                }else{
	                  $p_filter_min="";  
	                  $p_filter_max="";
	                }
	                    
	                $resultdata= $this->Apimodel->filterprod($category_id,$b_filter,$p_filter_min,$p_filter_max);
  	                
  	               if($resultdata){
  	                   
  	                   foreach($resultdata as $dataprod){
  	                    	$img = $this->Apimodel->wheredata(TBL_PRODUCT_IMG,'product_id',$dataprod->prod_id);     
                      
                           $dataprod->images = $img;
                           
                           $sizes = explode(',',$dataprod->prod_size); 
                           $sizearr = array();
                           foreach($sizes as $sizeprod){
                        	$sz = $this->Apimodel->wheredetail(TBL_SIZE,'id',$sizeprod);     
                            $sizearr[]=$sz;
                            //$sizeprod =$sizearr;
                           }
                            $dataprod->sizes = $sizearr ;
                            unset($sizearr);
  	                     }
  	                   
  	                   
  	                  $result = array('status'=>TRUE, 'message'=>'Product List','data'=>$dataprod); 
  	                   
  	               }else{
  	                   $result = array('status'=>FALSE, 'message'=>'No Product Found'); 
  	               }
  	                
  	               
                   
                    
        }else{
            $result = array('status'=>FALSE, 'message'=>'No User found');  
         
        }
       
    }
             echo json_encode($result);
}  
 