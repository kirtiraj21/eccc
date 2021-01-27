<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R1 extends CI_Controller {
	  
	  function  __construct() {
        parent::__construct();
		 
		 $this->load->model('admin/Home_model','Apimodel',TRUE);
         $this->load->library('form_validation');
         date_default_timezone_set("Asia/Calcutta"); 
    }

public function index()
  {
      echo "Silence is Golden";
      //echo $str = mt_rand(100000000,999999999);
  }
  
public function test()
  {
     
if(!isset($_SERVER['PHP_AUTH_USER'])){
  header("www-Authenticate: basic realm=\"Private area\"");
  header("HTTP/1.0 401 Unauthorized");
  print "Sorry, You need proper credentials";
  exit;
}else{
	if(($_SERVER['PHP_AUTH_USER']=="rahul") && ($_SERVER['PHP_AUTH_PW']=="123456")){
        print "Access success";
	}else{
		header("www-Authenticate: basic realm=\"Private area\"");
		header("HTTP/1.0 401 Unauthorized");
		print "Sorry, You need proper credentials";
	}
}


}


public function phone_number_register(){
    
	$phone = $this->input->post('phone'); 
    $this->form_validation->set_rules('phone', 'phone', 'trim|required');
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
        
         //$otp = mt_rand(100000,999999);
         $otp = 1234;
      $user = $this->Apimodel->get_single_row(TBL_USER,array('phone'=>$phone));   
      $data = count($user);
if($data == 0){
        //   $ch = curl_init();

        //   curl_setopt($ch, CURLOPT_URL,"https://sms1.fire-mobile.com:8080/midway/sendsms.ashx");
        //   curl_setopt($ch, CURLOPT_POST, 1);
        //   curl_setopt($ch, CURLOPT_POSTFIELDS,
        //   "Gw-Username=yikooo&Gw-Password=Kh8yG&Gw-From=Yikooo&Gw-To=$phone&Gw-Coding=1&Gw-Text=Your+one+time+verification+code+for+your+asiafiesta+registration+is+$otp");


        //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //   $server_output = curl_exec($ch);
        //   $err = curl_error($ch);
        //   curl_close ($ch);
        //   if ($err) {
        //   //echo "cURL Error #:" . $err;
        //   echo "$err";
        //   $result = array('status'=>FALSE, 'message'=>'Something went wrong Sms api error');
        //   } else {
      	    $arr = array( 
      	                 "phone"=>$phone,
      	                 "otp"=>$otp,
      	                
      	                 "created_on"=>date('Y-m-d H:i:s')
      	                );
      	    
      	    $insert = $this->Apimodel->insert(TBL_USER,$arr);
      	    if($insert){
      	      // $data = $this->Apimodel->get_single_row(TBL_USER,array('id'=>$insert)); 
      	       $result = array('status'=>TRUE, 'message'=>'Number Request  successfully','data'=>$arr);
      	    }else{
      	        $result = array('status'=>FALSE, 'message'=>'Something went wrong');   
      	    }
      // } 
 }else{
     
        //  $ch = curl_init();

        //   curl_setopt($ch, CURLOPT_URL,"https://sms1.fire-mobile.com:8080/midway/sendsms.ashx");
        //   curl_setopt($ch, CURLOPT_POST, 1);
        //   curl_setopt($ch, CURLOPT_POSTFIELDS,
        //   "Gw-Username=yikooo&Gw-Password=Kh8yG&Gw-From=Yikooo&Gw-To=$phone&Gw-Coding=1&Gw-Text=Your+one+time+verification+code+for+your+asiafiesta+registration+is+$otp");


        //   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        //   $server_output = curl_exec($ch);
        //   $err = curl_error($ch);
        //   curl_close ($ch);
        //   if ($err) {
        //   //echo "cURL Error #:" . $err;
        //   echo "$err";
        //   } else {
           $arr = array(  
                         "otp"=>$otp,
      	                 "created_on"=>date('Y-m-d H:i:s')
      	                );
      	    
      	    $insert = $this->Apimodel->update_user(TBL_USER,$phone,$arr);
          $result = array('status'=>TRUE, 'message'=>'You already registered!!');  
      //}
 }
   
 }
  echo json_encode($result);
 
} 
 

public function otp_verification(){
	 
    $this->form_validation->set_rules('otp', 'otp', 'trim|required');
    $this->form_validation->set_rules('phone', 'phone', 'trim|required');
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
        $phone = $this->input->post('phone');
         $otp = $this->input->post('otp');
          $fcm = $this->input->post('fcm_token');
      $user = $this->Apimodel->get_single_row(TBL_USER,array('phone'=>$phone,'otp'=>$otp));   
      $data = count($user);
      if($data > 0){
            $insert = $this->Apimodel->updatewhere(TBL_USER,'phone',$phone,array('fcm_token'=>$fcm));
            $user = $this->Apimodel->get_single_row(TBL_USER,array('phone'=>$phone,'otp'=>$otp)); 
      	 $result = array('status'=>TRUE, 'message'=>'OTP Verify successfully','data'=>$user);
       }else{
          $result = array('status'=>FALSE, 'message'=>'Invalid OTP');  
       }
      
    echo json_encode($result);
 }
 
} 



 public function homepage(){
     
      $user_id = $this->input->post('user_id');
    //   $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        
    // if($this->form_validation->run() == FALSE)
    // {
    //     $message = strip_tags(validation_errors());
    //     $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    // }
    // else
    // {
    $limit = $this->input->post('limit');
    $home = array();
	 
	     $banner = $this->Apimodel->selectdata(TBL_APP_BANNER); 
	     $Limited_time_banner = $this->Apimodel->get_single_row(TBL_LIMITED_TIME_BANNER,array()); 
	     $cat = $this->Apimodel->wheredata(TBL_CATEGORY,'status',1);   
	     $home['banner']=$banner;
	     $home['category']=$cat;
	     $home['Limited_time_banner']=$Limited_time_banner;
	      $resultdata = $this->Apimodel->get_home_prod($limit);
                
	                    
	               // print_r($resultdata);die;
  	                
  	               if($resultdata){
  	                   $arr=array();
  	                   foreach($resultdata as $dataprod){
  	                         if($dataprod->prod_brand !=''){
                           $brdata = $this->Apimodel->get_single_row(TBL_BRAND,array('id'=>$dataprod->prod_brand));
                          
                           $dataprod->Brand = $brdata;
                            } 
  	                    	$img = $this->Apimodel->wheredata(TBL_PRODUCT_IMG,'product_id',$dataprod->prod_id);     
                            $dataprod->Images = $img;
                            
                            $size = $this->Apimodel->get_tbl_data(TBL_PRODUCT_SIZE,array('product_id'=>$dataprod->prod_id));  
                            $sizearr = array();
                           foreach($size as $sizeprod){
                        	$sz = $this->Apimodel->wheredetail(TBL_SIZE,'id',$sizeprod->size);     
                            $sizearr[]=$sz;
                            //$sizeprod =$sizearr;
                           }
                            $dataprod->sizes = $sizearr ;
                          
                            
                           
                            
                            $color = $this->Apimodel->get_tbl_data(TBL_PRODUCT_COLOR,array('product_id'=>$dataprod->prod_id));  
                            $colorarr = array();
                           foreach($color as $val){
                        	$data = $this->Apimodel->wheredetail(TBL_COLOR,'id',$val->color);     
                            $colorarr[]=$data;
                            //$sizeprod =$sizearr;
                           }
                            $dataprod->Color = $colorarr;
                            if($user_id!=''){
                             $wish = $this->Apimodel->get_single_row(TBL_WISHLIST,array('user_id'=>$user_id,'product_id'=>$dataprod->prod_id));
                           if(count($wish) > 0){
                               $fav_status = 1;
                           }else{
                                $fav_status = 0;
                           }
                           $dataprod->fav_status = $fav_status;
                           
                          }
                            
                            
                            $arr[] =$dataprod;
                        
                            $home['Product']=$arr;
                             if($user_id !=''){
                              $noti = $this->Apimodel->get_tbl_data(TBL_NOTIFICATION,array('user_id'=>$user_id,'seen_status'=>0));
                              $home['Notification_Count']=count($noti);
                         }
                            
                            
                           
                        }
  	               } 
	     
         if(!empty($banner) || !empty($Limited_time_banner) || !empty($cat) || !empty($resultdata))
         {
             $result = array('status'=>TRUE, 'message'=>'Home data list','data'=>$home); 
         }
         else
         {
             $result = array('status'=>FALSE, 'message'=>'No data found');  
         }
         
    //}
    
      echo json_encode($result);
 }  


 public function categorylist(){
     
    //   $user_id = $this->input->post('user_id');
    //   $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        
    // if($this->form_validation->run() == FALSE)
    // {
    //     $message = strip_tags(validation_errors());
    //     $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    // }
    // else
    // {
	 
	     $cat = $this->Apimodel->wheredata(TBL_CATEGORY,'status',1);     
         if(!empty($cat))
         {
             $result = array('status'=>TRUE, 'message'=>'Category list','data'=>$cat); 
         }
         else
         {
             $result = array('status'=>FALSE, 'message'=>'No Category found');  
         }
         
   // }
    
      echo json_encode($result);
 }  
 
 
  public function subcategorylist(){
  
    
      $this->form_validation->set_rules('category_id', 'category id', 'trim|required');
        
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
  $cat = $this->input->post('category_id');   
  
  $subcat = $this->Apimodel->get_tbl_data(TBL_SUB_CATEGORY,array('status'=>1,'category_id'=>$cat));     
         if(!empty($cat))
         {
             $result = array('status'=>TRUE, 'message'=>'SubCategory list','data'=>$subcat); 
         }
         else
         {
             $result = array('status'=>FALSE, 'message'=>'No Category found');  
         }
    } 
       echo json_encode($result);
 }
 
  public function privacypolicy(){
     
    //   $user_id = $this->input->post('user_id');
    //   $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        
    // if($this->form_validation->run() == FALSE)
    // {
    //     $message = strip_tags(validation_errors());
    //     $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    // }
    // else
    // {
	 
	     $cat = $this->Apimodel->selectdata(TBL_PRIVACY);     
         if(!empty($cat))
         {
             $result = array('status'=>TRUE, 'message'=>'Privacy Policy','data'=>$cat); 
         }
         else
         {
             $result = array('status'=>FALSE, 'message'=>'No data found');  
         }
         
   // }
    
      echo json_encode($result);
 }  
 
 
 public function help(){
     
    //   $user_id = $this->input->post('user_id');
    //   $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        
    // if($this->form_validation->run() == FALSE)
    // {
    //     $message = strip_tags(validation_errors());
    //     $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    // }
    // else
    // {
	 
	     $cat = $this->Apimodel->selectdata(TBL_HELP);     
         if(!empty($cat))
         {
             $result = array('status'=>TRUE, 'message'=>'HELP','data'=>$cat); 
         }
         else
         {
             $result = array('status'=>FALSE, 'message'=>'No data found');  
         }
         
   // }
    
      echo json_encode($result);
 } 
 
 
 
  public function faq(){
     
    //   $user_id = $this->input->post('user_id');
    //   $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        
    // if($this->form_validation->run() == FALSE)
    // {
    //     $message = strip_tags(validation_errors());
    //     $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    // }
    // else
    // {
	 
	     $cat = $this->Apimodel->selectdata(TBL_FAQ);     
         if(!empty($cat))
         {
             $result = array('status'=>TRUE, 'message'=>'FAQ','data'=>$cat); 
         }
         else
         {
             $result = array('status'=>FALSE, 'message'=>'No data found');  
         }
         
   // }
    
      echo json_encode($result);
 } 
 
 
 
  public function banner(){
     
    //   $user_id = $this->input->post('user_id');
    //   $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        
    // if($this->form_validation->run() == FALSE)
    // {
    //     $message = strip_tags(validation_errors());
    //     $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    // }
    // else
    // {
	 
	     $banner = $this->Apimodel->selectdata(TBL_APP_BANNER);     
         if(!empty($banner))
         {
             $result = array('status'=>TRUE, 'message'=>'Banner list','data'=>$banner); 
         }
         else
         {
             $result = array('status'=>FALSE, 'message'=>'No Banner found');  
         }
         
    //}
    
      echo json_encode($result);
 }  
 
 
 public function sizeslist(){
     
    //  $user_id = $this->input->post('user_id');
    //   $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        
    // if($this->form_validation->run() == FALSE)
    // {
    //     $message = strip_tags(validation_errors());
    //     $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    // }
    // else
    // {
	 
	         $size = $this->Apimodel->wheredata(TBL_SIZE,'status',1);     
          if(!empty($size))
          {
              $result = array('status'=>TRUE, 'message'=>'Size list','data'=>$size); 
          }
          else
          {
              $result = array('status'=>FALSE, 'message'=>'No Size found');  
          }
    
    //}
    
      echo json_encode($result);
 }  
 
 
 public function colorslist(){
     
     $user_id = $this->input->post('user_id');
    //   $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        
    // if($this->form_validation->run() == FALSE)
    // {
    //     $message = strip_tags(validation_errors());
    //     $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    // }
    // else
    // {
	 
	         $size = $this->Apimodel->wheredata(TBL_COLOR,'status',1);     
          if(!empty($size))
          {
              $result = array('status'=>TRUE, 'message'=>'COLOR list','data'=>$size); 
          }
          else
          {
              $result = array('status'=>FALSE, 'message'=>'No color found');  
          }
    
    //}
    
      echo json_encode($result);
 }  
 
 
 
  public function brandlist(){
      
    // $user_id = $this->input->post('user_id');
    //   $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        
    // if($this->form_validation->run() == FALSE)
    // {
    //     $message = strip_tags(validation_errors());
    //     $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    // }
    // else
    // {
	 
	       $brand = $this->Apimodel->wheredata(TBL_BRAND,'status',1);     
        if(!empty($brand))
        {
            $result = array('status'=>TRUE, 'message'=>'Brand list','data'=>$brand); 
        }
        else
        {
            $result = array('status'=>FALSE, 'message'=>'No Brand found');  
        }
    //}
      echo json_encode($result);
 }  
 
 
  public function productlist_home(){
      
   
       $limit = $this->input->post('limited_time');
                
                if($limit != ''){
        
                $resultdata = $this->Apimodel->wheredata(TBL_PRODUCT,'limited_time',$limit);
                }else{
                     
                   $resultdata = $this->Apimodel->wheredata(TBL_PRODUCT,'hot_selling',1);
                }
	                    
	               // print_r($resultdata);die;
  	                
  	               if($resultdata){
  	                   
  	                   foreach($resultdata as $dataprod){
  	                    	$img = $this->Apimodel->wheredata(TBL_PRODUCT_IMG,'product_id',$dataprod->id);     
                            $dataprod->Images = $img;
                            
                            $size = $this->Apimodel->get_tbl_data(TBL_PRODUCT_SIZE,array('product_id'=>$dataprod->id));  
                            $sizearr = array();
                           foreach($size as $sizeprod){
                        	$sz = $this->Apimodel->wheredetail(TBL_SIZE,'id',$sizeprod->size);     
                            $sizearr[]=$sz;
                            //$sizeprod =$sizearr;
                           }
                            $dataprod->sizes = $sizearr ;
                          
                            
                            $brand = $this->Apimodel->get_tbl_data(TBL_PRODUCT_BRAND,array('product_id'=>$dataprod->id));   
                            $brandarr = array();
                           foreach($brand as $val){
                        	$data = $this->Apimodel->wheredetail(TBL_BRAND,'id',$val->brand);     
                            $brandarr[]=$data;
                            //$sizeprod =$sizearr;
                           }
                            $dataprod->Brand = $brandarr;
                            
                            $color = $this->Apimodel->get_tbl_data(TBL_PRODUCT_COLOR,array('product_id'=>$dataprod->id));  
                            $colorarr = array();
                           foreach($color as $val){
                        	$data = $this->Apimodel->wheredetail(TBL_COLOR,'id',$val->color);     
                            $colorarr[]=$data;
                            //$sizeprod =$sizearr;
                           }
                            $dataprod->Color = $colorarr;
                            $arr[]=$dataprod;
                           
                        }
  	                   
  	                   
  	                  $result = array('status'=>TRUE, 'message'=>'Product List','data'=>$arr); 
  	                   
  	               }else{
  	                   $result = array('status'=>FALSE, 'message'=>'No Product Found'); 
  	               }
  	                
  	               
                   
                    
       
    
             echo json_encode($result);
}  



  public function productlist_seeall(){
      
          $user_id = $this->input->post('user_id');
    
          
                $supersale = $this->input->post('super_sale');
                $hot_selling = $this->input->post('hot_selling');
                $new_season = $this->input->post('new_season');
                $limit=$this->input->post('limit');
               
        
                if($supersale != ''){
                  $is_supersale_exist = $this->db->where('super_sale',$supersale);
                }else{
                  $is_supersale_exist = "";
                }
                if($hot_selling !=''){
                  $is_hotselling_exist = $this->db->where('hot_selling',$hot_selling);
                }else{
                  $is_hotselling_exist = "";
                }
                if($new_season !=''){
                  $is_newseason_exist = $this->db->where('new_season',$new_season);
                }else{
                  $is_newseason_exist="";  
                }
	                 
                
                $resultdata = $this->Apimodel->get_all_data_prod(TBL_PRODUCT,$is_supersale_exist,$is_hotselling_exist,$is_newseason_exist,$limit);
	                    
	               // print_r($resultdata);die;
  	                
  	               if($resultdata){
  	                   
  	                   foreach($resultdata as $dataprod){
  	                       
  	                         if($dataprod->prod_brand !=''){
                           $brdata = $this->Apimodel->get_single_row(TBL_BRAND,array('id'=>$dataprod->prod_brand));
                          
                           $dataprod->Brand = $brdata;
                            } 
                            
  	                    	$img = $this->Apimodel->wheredata(TBL_PRODUCT_IMG,'product_id',$dataprod->prod_id);     
                            $dataprod->Images = $img;
                            
                            $size = $this->Apimodel->get_tbl_data(TBL_PRODUCT_SIZE,array('product_id'=>$dataprod->prod_id));  
                            $sizearr = array();
                           foreach($size as $sizeprod){
                        	$sz = $this->Apimodel->wheredetail(TBL_SIZE,'id',$sizeprod->size);     
                            $sizearr[]=$sz;
                            //$sizeprod =$sizearr;
                           }
                            $dataprod->sizes = $sizearr ;
                          
                            
                          
                            
                            $color = $this->Apimodel->get_tbl_data(TBL_PRODUCT_COLOR,array('product_id'=>$dataprod->prod_id));  
                            $colorarr = array();
                           foreach($color as $val){
                        	$data = $this->Apimodel->wheredetail(TBL_COLOR,'id',$val->color);     
                            $colorarr[]=$data;
                            //$sizeprod =$sizearr;
                           }
                           $dataprod->Color = $colorarr;
                           if($user_id !=''){
                           $wish = $this->Apimodel->get_single_row(TBL_WISHLIST,array('user_id'=>$user_id,'product_id'=>$dataprod->prod_id));
                           if(count($wish) > 0){
                               $fav_status = 1;
                           }else{
                                $fav_status = 0;
                           }
                           $dataprod->fav_status = $fav_status;
                           }
                            
                            $arr[]=$dataprod;
                           
                        }
  	                   
  	                   
  	                  $result = array('status'=>TRUE, 'message'=>'Product List','data'=>$arr,); 
  	                   
  	               }else{
  	                   $result = array('status'=>FALSE, 'message'=>'No Product Found'); 
  	               }
  	                
  	               
     echo json_encode($result);
} 
 
 
 

 public function productlist_filter(){
      
                $user_id = $this->input->post('user_id');
                $limit = $this->input->post('limit');
                $cat = $this->input->post('category');
                $subcategory = $this->input->post('subcategory');
                $brand = $this->input->post('brand');
                $minprice = $this->input->post('minprice');
                $maxprice = $this->input->post('maxprice');
                
                if($cat != ''){
                   $catfilter = $this->db->where('category',$cat);
                }else{
                   $catfilter ='';
                }
                if($subcategory != ''){
                   $subcatfilter = $this->db->where('sub_category',$subcategory);
                }else{
                   $subcatfilter ='';
                }
               
                if($brand != ''){
                   $b_filter =$brand;
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
               
                //echo $b_filter; die;
                    $resultdata = $this->Apimodel->filterprod($catfilter,$subcatfilter,$brand,$p_filter_min,$p_filter_max,$limit);
                
                
	                    
	       
  	                
  	               if($resultdata){
  	                   
  	                   foreach($resultdata as $dataprod){
  	                       
  	                       
  	                         if($dataprod->prod_brand !=''){
                           $brdata = $this->Apimodel->get_single_row(TBL_BRAND,array('id'=>$dataprod->prod_brand));
                          
                           $dataprod->Brand = $brdata;
                            } 
  	                    	$img = $this->Apimodel->wheredata(TBL_PRODUCT_IMG,'product_id',$dataprod->prod_id);     
                            $dataprod->Images = $img;
                            
                            $size = $this->Apimodel->get_tbl_data(TBL_PRODUCT_SIZE,array('product_id'=>$dataprod->prod_id));  
                            $sizearr = array();
                           foreach($size as $sizeprod){
                        	$sz = $this->Apimodel->wheredetail(TBL_SIZE,'id',$sizeprod->size);     
                            $sizearr[]=$sz;
                           }
                            $dataprod->sizes = $sizearr ;
                          
                            $color = $this->Apimodel->get_tbl_data(TBL_PRODUCT_COLOR,array('product_id'=>$dataprod->prod_id));  
                            $colorarr = array();
                           foreach($color as $val){
                        	$data = $this->Apimodel->wheredetail(TBL_COLOR,'id',$val->color);     
                            $colorarr[]=$data;
                           }
                            $dataprod->Color = $colorarr;
                            
                            $wish = $this->Apimodel->get_single_row(TBL_WISHLIST,array('user_id'=>$user_id,'product_id'=>$dataprod->prod_id));
                           if(count($wish) > 0){
                               $fav_status = 1;
                           }else{
                                $fav_status = 0;
                           }
                           $dataprod->fav_status = $fav_status;
                            $arr[]=$dataprod;
                           
                        }
  	                   
  	                   
  	                  $result = array('status'=>TRUE, 'message'=>'Product List','data'=>$arr); 
  	                   
  	               }else{
  	                   $result = array('status'=>FALSE, 'message'=>'No Product Found'); 
  	               }
  	                
  	               
                   
                    
       
    
             echo json_encode($result);
} 
 
 
  
  public function sorting(){
      
                $value = $this->input->post('value');
                $user_id = $this->input->post('user_id');
                $cat = $this->input->post('category_d');
                $limit = $this->input->post('limit');
            
                    $resultdata = $this->Apimodel->get_product_desc($value,$cat,'','','','',$limit);
                
                
	                 if($resultdata){
  	                   
  	                   foreach($resultdata as $dataprod){
  	                       
  	                         if($dataprod->prod_brand !=''){
                           $brdata = $this->Apimodel->get_single_row(TBL_BRAND,array('id'=>$dataprod->prod_brand));
                          
                           $dataprod->Brand = $brdata;
                            } 
  	                       
  	                    	$img = $this->Apimodel->wheredata(TBL_PRODUCT_IMG,'product_id',$dataprod->prod_id);     
                            $dataprod->Images = $img;
                            
                            $size = $this->Apimodel->get_tbl_data(TBL_PRODUCT_SIZE,array('product_id'=>$dataprod->prod_id));  
                            $sizearr = array();
                           foreach($size as $sizeprod){
                        	$sz = $this->Apimodel->wheredetail(TBL_SIZE,'id',$sizeprod->size);     
                            $sizearr[]=$sz;
                            //$sizeprod =$sizearr;
                           }
                            $dataprod->sizes = $sizearr ;
                          
                            
                            
                            $color = $this->Apimodel->get_tbl_data(TBL_PRODUCT_COLOR,array('product_id'=>$dataprod->prod_id));  
                            $colorarr = array();
                           foreach($color as $val){
                        	$data = $this->Apimodel->wheredetail(TBL_COLOR,'id',$val->color);     
                            $colorarr[]=$data;
                            //$sizeprod =$sizearr;
                           }
                            $dataprod->Color = $colorarr;
                            
                             $wish = $this->Apimodel->get_single_row(TBL_WISHLIST,array('user_id'=>$user_id,'product_id'=>$dataprod->prod_id));
                           if(count($wish) > 0){
                               $fav_status = 1;
                           }else{
                                $fav_status = 0;
                           }
                           $dataprod->fav_status = $fav_status;
                            $arr[]=$dataprod;
                           
                        }
  	                   
  	                   
  	                  $result = array('status'=>TRUE, 'message'=>'Product List','data'=>$arr); 
  	                   
  	               }else{
  	                   $result = array('status'=>FALSE, 'message'=>'No Product Found'); 
  	               }
  	                
  	               
                   
                    
       
    
             echo json_encode($result);
} 
 
 
public function wishlist(){
	  $user_id = $this->input->post('user_id');
	   $product_id = $this->input->post('product_id');
    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
    $this->form_validation->set_rules('product_id', 'product_id', 'trim|required');
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
      $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id));   
      $data = count($user);
      if($data > 0){
          $wish = $this->Apimodel->get_single_row(TBL_WISHLIST,array('user_id'=>$user_id,'product_id'=>$product_id));
          if(count($wish) == 0){
      	    $arr = array( 
      	                 "product_id"=>$product_id,
      	                 "user_id"=>$user_id,
      	         
      	                );
      	    
      	    $insert = $this->Apimodel->insert(TBL_WISHLIST,$arr);
      	    //$update = $this->Apimodel->updatewhere(TBL_PRODUCT,'id',$product_id,array('fav_status'=>1));
      	   // $prod = $this->Apimodel->get_single_row(TBL_PRODUCT,array('id'=>$product_id)); 
      	    if($insert){
      	      // $data = $this->Apimodel->get_single_row(TBL_USER,array('id'=>$insert)); 
      	       $result = array('status'=>TRUE, 'message'=>'Wishlist  successfully','fav_status'=>1);
      	    }else{
      	        $result = array('status'=>FALSE, 'message'=>'Something went wrong');   
      	    }
          }else{
               $arr = array( 
      	                 "product_id"=>$product_id,
      	                 "user_id"=>$user_id,
      	         
      	                );
               $DELETE = $this->Apimodel->delete_where(TBL_WISHLIST,$arr);
                //$update = $this->Apimodel->updatewhere(TBL_PRODUCT,'id',$product_id,array('fav_status'=>0));
                  

      	      if($DELETE){
      	      // $data = $this->Apimodel->get_single_row(TBL_USER,array('id'=>$insert)); 
      	       $result = array('status'=>TRUE, 'message'=>'Wishlist Deleted successfully','fav_status'=>0);
      	      }else{
      	        $result = array('status'=>FALSE, 'message'=>'Something went wrong');   
      	        }
          }  
      }else{
          
          $result = array('status'=>FALSE, 'message'=>'User Not Exist!!');  
      }
      
    
 }
 echo json_encode($result);
 
}   



public function wishlistdata(){
      
    $user_id = $this->input->post('user_id');
   
    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
   
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
             $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id));   
             $data = count($user);
          if($data > 0){
              
                $wishlist = $this->Apimodel->wheredata(TBL_WISHLIST,'user_id',$user_id);
                  $datawish = count($wishlist);
          if($datawish > 0){
              $arr=array();
                foreach($wishlist as $wish){
                    $dataprod = $this->Apimodel->proddetail(TBL_PRODUCT,$wish->product_id);
                    
                    	$img = $this->Apimodel->wheredata(TBL_PRODUCT_IMG,'product_id',$dataprod->prod_id);     
                            $dataprod->Images = $img;
                            
                            $size = $this->Apimodel->get_tbl_data(TBL_PRODUCT_SIZE,array('product_id'=>$dataprod->prod_id));  
                            $sizearr = array();
                           foreach($size as $sizeprod){
                        	$sz = $this->Apimodel->wheredetail(TBL_SIZE,'id',$sizeprod->size);     
                            $sizearr[]=$sz;
                            //$sizeprod =$sizearr;
                           }
                            $dataprod->sizes = $sizearr ;
                          
                            
                            $brand = $this->Apimodel->get_tbl_data(TBL_PRODUCT_BRAND,array('product_id'=>$dataprod->prod_id));   
                            $brandarr = array();
                           foreach($brand as $val){
                        	$data = $this->Apimodel->wheredetail(TBL_BRAND,'id',$val->brand);     
                            $brandarr[]=$data;
                            //$sizeprod =$sizearr;
                           }
                            //$dataprod->Brand = $brandarr;
                            
                            $color = $this->Apimodel->get_tbl_data(TBL_PRODUCT_COLOR,array('product_id'=>$dataprod->prod_id));  
                            $colorarr = array();
                           foreach($color as $val){
                        	$data = $this->Apimodel->wheredetail(TBL_COLOR,'id',$val->color);     
                            $colorarr[]=$data;
                            //$sizeprod =$sizearr;
                           }
                            $dataprod->Color = $colorarr;
                            $wish->Product = $dataprod;
                            $arr[]=$wish;
                }
                
                $result = array('status'=>TRUE, 'message'=>'wishlist Data','data'=>$arr); 
          }else{
              
          $result = array('status'=>FALSE, 'message'=>'No Data Exist!!');  
          }
                  
         }else{
          
          $result = array('status'=>FALSE, 'message'=>'User Not Exist!!');  
      }            
                   
    }                
       
    
             echo json_encode($result);
}


public function productdetail(){
    $user_id   = $this->input->post('user_id');
    $product_id = $this->input->post('product_id');
    $this->form_validation->set_rules('product_id', 'product_id', 'trim|required');
    // $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
   
    // if($this->form_validation->run() == FALSE)
    // {
    //     $message = strip_tags(validation_errors());
    //     $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    // }
    // else
    // {
                $p_id= $this->input->post('product_id');
                
               
        
                    $dataprod = $this->Apimodel->proddetail(TBL_PRODUCT,$product_id);
                
                
	                    
	               // print_r($resultdata);die;
  	                
  	               if($dataprod){
  	                   
  	                     if($dataprod->prod_brand !=''){
                           $brdata = $this->Apimodel->get_single_row(TBL_BRAND,array('id'=>$dataprod->prod_brand));
                          
                           $dataprod->Brand = $brdata;
                            } 
                            
  	                    	$img = $this->Apimodel->wheredata(TBL_PRODUCT_IMG,'product_id',$dataprod->prod_id);     
                            $dataprod->Images = $img;
                            
                            $size = $this->Apimodel->get_tbl_data(TBL_PRODUCT_SIZE,array('product_id'=>$dataprod->prod_id));  
                            $sizearr = array();
                           foreach($size as $sizeprod){
                        	$sz = $this->Apimodel->wheredetail(TBL_SIZE,'id',$sizeprod->size);     
                            $sizearr[]=$sz;
                            //$sizeprod =$sizearr;
                           }
                            $dataprod->sizes = $sizearr ;
                          
                            
                           
                            
                            $color = $this->Apimodel->get_tbl_data(TBL_PRODUCT_COLOR,array('product_id'=>$dataprod->prod_id));  
                            $colorarr = array();
                           foreach($color as $val){
                        	$data = $this->Apimodel->wheredetail(TBL_COLOR,'id',$val->color);     
                            $colorarr[]=$data;
                            //$sizeprod =$sizearr;
                           }
                            $dataprod->Color = $colorarr;
                            
                            if($user_id!=''){
                            $wish = $this->Apimodel->get_single_row(TBL_WISHLIST,array('user_id'=>$user_id,'product_id'=>$dataprod->prod_id));
                           if(count($wish) > 0){
                               $fav_status = 1;
                           }else{
                                $fav_status = 0;
                           }
                           $dataprod->fav_status = $fav_status;
                            }
                            $arr[]=$dataprod;
                           
                        
  	                  
  	                   
  	                  $result = array('status'=>TRUE, 'message'=>'Product List','data'=>$arr); 
  	                   
  	               }else{
  	                   $result = array('status'=>FALSE, 'message'=>'No Product Found'); 
  	               }
  	                
  	               
                   
    //}                
       
    
             echo json_encode($result);
}




public function addreview(){
    
    
	  $user_id = $this->input->post('user_id');
	  $product_id = $this->input->post('product_id');
	  $title = $this->input->post('title');
	  $review = $this->input->post('review');
    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
    $this->form_validation->set_rules('product_id', 'product_id', 'trim|required');
    $this->form_validation->set_rules('title', 'title', 'trim|required');
    $this->form_validation->set_rules('review', 'review', 'trim|required');
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
      $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id));   
      $data = count($user);
      if($data > 0){
          
      	    $arr = array( 
      	                 "product_id"=>$product_id,
      	                 "user_id"=>$user_id,
      	                 "title"=>$this->input->post('title'),
      	                 "review"=>$this->input->post('review'),
      	                 "rating"=>$this->input->post('rating'),
      	                 "created_on"=>date('Y-m-d H:i:s'),
      	         
      	                );
      	    
      	    $insert = $this->Apimodel->insert(TBL_REVIEW,$arr);
      	    
      	    if($insert){
      	        
      	        if(!empty($_FILES['image']['name'])){
      	            
      	        
      	            
      	         $c_img = count($_FILES['image']['name']); 
      	        if($c_img > 0){
      	           
      	        for($i=0;$i<count($_FILES['image']['name']); $i++){
				      
				      $_FILES['file']['name'] = $_FILES['image']['name'][$i];
                      $_FILES['file']['type'] = $_FILES['image']['type'][$i];
                      $_FILES['file']['tmp_name'] = $_FILES['image']['tmp_name'][$i];
                      $_FILES['file']['error'] = $_FILES['image']['error'][$i];
                      $_FILES['file']['size'] = $_FILES['image']['size'][$i];
				      
					$configs['upload_path'] = 'upload/mainreview/';
					$configs['allowed_types'] = '*';
					$configs['file_name'] = $_FILES['image']['name'][$i];
					
			 	    //Load upload library and initialize configuration
					$this->load->library('upload',$configs);
					$this->upload->initialize($configs);
				
					if($this->upload->do_upload('file'))
					{
					   $uploadData = $this->upload->data();
						$image = "upload/mainreview/".$uploadData['file_name'];
					    
					}else{
					   echo $this->upload->display_errors(); die;
					   
						$image = '';
						
					}
					$arrimg = array(
			             'review_id'=>$insert,
			             'image'=>$image,
						);
					
					$insertimg = $this->Apimodel->insert(TBL_REVIEW_IMG,$arrimg);	
				  }
				}
      	        }
				
				 if(!empty($_FILES['video']['name'])){
				$r_video = count($_FILES['video']['name']); 
      	        if($r_video > 0){
      	           
      	        for($i=0;$i<count($_FILES['video']['name']); $i++){
				      
				      $_FILES['file']['name'] = $_FILES['video']['name'][$i];
                      $_FILES['file']['type'] = $_FILES['video']['type'][$i];
                      $_FILES['file']['tmp_name'] = $_FILES['video']['tmp_name'][$i];
                      $_FILES['file']['error'] = $_FILES['video']['error'][$i];
                      $_FILES['file']['size'] = $_FILES['video']['size'][$i];
				      
					$configs['upload_path'] = 'upload/mainreview/';
					$configs['allowed_types'] = '*';
					$configs['file_name'] = $_FILES['video']['name'][$i];
					
			 	    //Load upload library and initialize configuration
					$this->load->library('upload',$configs);
					$this->upload->initialize($configs);
				
					if($this->upload->do_upload('file'))
					{
					   $uploadData = $this->upload->data();
						$video = "upload/mainreview/".$uploadData['file_name'];
					    
					}else{
					   echo $this->upload->display_errors(); die;
					   
						$video = '';
						
					}
					$arrimg = array(
			             'review_id'=>$insert,
			             'video'=>$video,
						);
					
					$insertimg = $this->Apimodel->insert(TBL_REVIEW_IMG,$arrimg);	
				  }
				}
				 }
      	       $result = array('status'=>TRUE, 'message'=>'Review  successfully');
      	    }else{
      	        $result = array('status'=>FALSE, 'message'=>'Something went wrong');   
      	    }
         
      }else{
          
          $result = array('status'=>FALSE, 'message'=>'User Not Exist!!');  
      }
      
    
}
 echo json_encode($result);
 
   
 
} 




public function allreview(){
      
    $product_id = $this->input->post('product_id');
    $this->form_validation->set_rules('product_id', 'product_id', 'trim|required');
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
                $p_id= $this->input->post('product_id');
                
               
        
                    $dataprod = $this->Apimodel->wheredata(TBL_REVIEW,'product_id',$p_id);
                    
                
                
	                    
	               // print_r($resultdata);die;
  	                
  	               if($dataprod){
  	                      
  	                     foreach($dataprod as $reviewdata){
  	                    	$img = $this->Apimodel->wheredata(TBL_REVIEW_IMG,'review_id',$reviewdata->id);   
  	                    	$user = $this->Apimodel->wheredata(TBL_USER,'user_id',$reviewdata->user_id);
  	                    	
                            $reviewdata->Images = $img;
                            $reviewdata->User_data= $user;
  	                     }
                          
                            //$arr[]=$dataprod;
                           
                        $dataavg = $this->Apimodel->get_average(TBL_REVIEW,$p_id);
  	                  
  	                   
  	                  $result = array('status'=>TRUE, 'message'=>'Review List','data'=>$dataprod,'Average-Rating'=>$dataavg->average_rating); 
  	                   
  	               }else{
  	                   $result = array('status'=>FALSE, 'message'=>'No Review Found on this Product!'); 
  	               }
  	                
  	               
                   
    }                
       
    
             echo json_encode($result);
}




public function addtocart(){
	  $user_id = $this->input->post('user_id');
	  $product_id = $this->input->post('product_id');
	  $size = $this->input->post('size');
	  $color = $this->input->post('color');
	   $qty = $this->input->post('qty');
	     $price = $this->input->post('price');
	   $d_price = $this->input->post('discount_price');
    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
    $this->form_validation->set_rules('product_id', 'product_id', 'trim|required');
    $this->form_validation->set_rules('qty', 'qty', 'trim|required');
     $this->form_validation->set_rules('price', 'price', 'trim|required');
    $this->form_validation->set_rules('discount_price', 'discount_price', 'trim|required');
    // $this->form_validation->set_rules('color', 'color', 'trim|required');
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
      $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id));   
      $data = count($user);
      if($data > 0){
          
         $cart = $this->Apimodel->get_single_row(TBL_CART,array('user_id'=>$user_id,'product_id'=>$product_id,'size'=>$size,'color'=>$color));   

          if($cart){
            $proddetail = $this->Apimodel->get_single_row(TBL_PRODUCT,array('id'=>$product_id));   
            $newqty = $cart->qty + $qty;
            $total=$d_price*$newqty;
      	    $arr = array( 
      	                 "product_id"=>$product_id,
      	                 "user_id"=>$user_id,
      	                 "size"=>$size,
      	                 "color"=>$color,
      	                 "qty"=>$newqty,
      	                 "price"=>$price,
      	                 "price_after_discount"=>$d_price,
      	                 'total'=>$total,
      	                 "created_on"=>date('Y-m-d H:i:s'),
      	         
      	                );
      	      
      	    if($proddetail->stock >= $newqty){
          	     $insert = $this->Apimodel->updatewhere(TBL_CART,'id',$cart->id,$arr);
          	    if($insert){
          	       $result = array('status'=>TRUE, 'message'=>'Add to cart  successfully');
          	    }else{
          	        $result = array('status'=>FALSE, 'message'=>'Something went wrong');   
          	    }
      	    }else{
      	        $result = array('status'=>FALSE, 'message'=>'Stock Limit Exceed'); 
      	    }
          }else{
              $total=$d_price*$qty;
      	    $arr = array( 
      	                 "product_id"=>$product_id,
      	                 "user_id"=>$user_id,
      	                 "size"=>$size,
      	                 "color"=>$color,
      	                 "qty"=>$qty,
      	                 "price"=>$price,
      	                 "price_after_discount"=>$d_price,
      	                 'total'=>$total,
      	                 "created_on"=>date('Y-m-d H:i:s'),
      	         
      	                );
      	    
      	    $insert = $this->Apimodel->insert(TBL_CART,$arr);
      	    if($insert){
      	       $result = array('status'=>TRUE, 'message'=>'Add to cart  successfully');
      	    }else{
      	        $result = array('status'=>FALSE, 'message'=>'Something went wrong');   
      	    }
          }
         
      }else{
          
          $result = array('status'=>FALSE, 'message'=>'User Not Exist!!');  
      }
      
    
}
 echo json_encode($result);
 
   
 
} 



public function updatetocart(){
	  $user_id = $this->input->post('user_id');
	  $cart_id = $this->input->post('cart_id');
	  $qty = $this->input->post('qty');
	
    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
    $this->form_validation->set_rules('cart_id', 'cart_id', 'trim|required');
     $this->form_validation->set_rules('qty', 'qty', 'trim|required');
    // $this->form_validation->set_rules('color', 'color', 'trim|required');
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
      $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id));   
      $data = count($user);
      if($data > 0){
                $cdata = $this->Apimodel->get_single_row(TBL_CART,array('id'=>$cart_id));   
                $total = $cdata->price_after_discount*$qty;
         
            $arr = array( 
      	                 "qty"=>$qty,
      	                 "total"=>$total,
      	                 "created_on"=>date('Y-m-d H:i:s'),
      	         
      	                );
      	    
      	    $insert = $this->Apimodel->updatewhere(TBL_CART,'id',$cart_id,$arr);
      	    if($insert){
      	        
      	        $wishlist = $this->Apimodel->get_order_total(TBL_CART,$user_id);
      	       $result = array('status'=>TRUE, 'message'=>'Update to cart  successfully','Order total'=>$wishlist,"qty"=>$qty);
      	    }else{
      	        $result = array('status'=>FALSE, 'message'=>'Something went wrong');   
      	    }
          
         
      }else{
          
          $result = array('status'=>FALSE, 'message'=>'User Not Exist!!');  
      }
      
    
}
 echo json_encode($result);
 
   
 
} 


public function order_total(){
      
    $user_id = $this->input->post('user_id');
   
    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
   
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
             $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id));   
             $data = count($user);
          if($data > 0){
                
                $wishlist = $this->Apimodel->get_order_total(TBL_CART,$user_id);
              
                
                
                $result = array('status'=>TRUE, 'message'=>' Order Total Data','data'=>$wishlist); 
                  
         }else{
          
          $result = array('status'=>FALSE, 'message'=>'User Not Exist!!');  
      }            
                   
    }                
       
    
             echo json_encode($result);
}







public function cartdata(){
      
    $user_id = $this->input->post('user_id');
   
    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
   
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
             $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id));   
             $data = count($user);
          if($data > 0){
                $arr=array();
                $wishlist = $this->Apimodel->wheredata(TBL_CART,'user_id',$user_id);
                foreach($wishlist as $wish){
                    $dataprod = $this->Apimodel->proddetail(TBL_PRODUCT,$wish->product_id);
                    
                    	$size = $this->Apimodel->get_single_row(TBL_SIZE,array('id'=>$wish->size)); 
                        $color = $this->Apimodel->get_single_row(TBL_COLOR,array('id'=>$wish->color)); 
                        $img = $this->Apimodel->wheredata(TBL_PRODUCT_IMG,'product_id',$dataprod->prod_id); 
                        $dataprod->Size = $size;
                        $dataprod->Color = $color;
                        $dataprod->Images = $img;

                       
                        
                        $wish->Product = $dataprod;
                        $arr[]=$wish;
                        
                            
                }
                 $o_total = $this->Apimodel->get_order_total(TBL_CART,$user_id);  
                
                
                $result = array('status'=>TRUE, 'message'=>'Cart Data','data'=>$arr,'Order total'=>$o_total); 
                  
         }else{
          
          $result = array('status'=>FALSE, 'message'=>'User Not Exist!!');  
      }            
                   
    }                
       
    
             echo json_encode($result);
}


public function removetocart(){
	  $user_id = $this->input->post('user_id');
	  $id = $this->input->post('cart_id');

    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
   // $this->form_validation->set_rules('product_id', 'product_id', 'trim|required');
    // $this->form_validation->set_rules('size', 'size', 'trim|required');
    // $this->form_validation->set_rules('color', 'color', 'trim|required');
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
        
      $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id));   
      $data = count($user);
      if($data > 0){
          
         $cart = $this->Apimodel->get_single_row(TBL_CART,array('id'=>$id));   

          if(empty($cart)){
               $result = array('status'=>TRUE, 'message'=>'No Cart data!!');
          }else{
      	    
      	    
      	       $delete = $this->Apimodel->delete(TBL_CART,'id',$id);

      	    if($delete){
      	        $o_total = $this->Apimodel->get_order_total(TBL_CART,$user_id);
      	       $result = array('status'=>TRUE, 'message'=>'Remove to cart  successfully','Order total'=>$o_total);
      	    }else{
      	        $result = array('status'=>FALSE, 'message'=>'Something went wrong');   
      	    }
          }
         
      }else{
          
          $result = array('status'=>FALSE, 'message'=>'User Not Exist!!');  
      }
      
    
   }
 echo json_encode($result);
 
   
 
}




public function order(){
    $data = json_decode(file_get_contents('php://input'), true);
   
    $order=$data["order"];
   // print_r($order); 
    $p_data=$data["items"];
     
	  $user_id = $order['user_id']; 
	  $transaction_id = $order['transaction_id'];
	  $c_id = $order['coupon_id'];
	  $total = $order['total'];
	  $add = $order['address_id'];
	  $d_off = $order['c_off'];
       $o_totl = $order['grand_total'];
// 	  $prod_detail = $this->input->post('product_detail');
// 	  $p_data = json_decode($prod_detail);
	  
      $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id));   
      $data = count($user);
      if($data > 0){
          
           $cartdata= $this->Apimodel->wheredata(TBL_CART,'user_id',$user_id);
           $check=array();
         foreach($cartdata as $cdata){
          $prod = $this->Apimodel->get_single_row(TBL_PRODUCT,array('id'=>$cdata->product_id));
           if($prod->stock < $cdata->qty){
             $check[]=$cdata;
            }
         }
        if(count($check)==0){
          
          
          $ord_id = "ORD".rand(9999,99999);
         
          
          if($c_id =='' && $d_off =='' && $o_totl == ''){
          
              $gtotal =$total;
                    
          }else{
                  $gtotal  = $o_totl;
          }
          $arr = array( 
      	                 "user_id"=>$user_id,
      	                 "order_id"=>$ord_id,
      	                 "address_id"=>$add,
      	                 "transaction_id"=>$transaction_id,
      	                 "order_total"=>$total,
      	                 "coupon_discount"=>$d_off,
      	                 "total_amount"=>$gtotal,
      	                 "created_on"=>date('Y-m-d H:i:s'),
      	                 "delivery_date"=>date('Y-m-d H:i:s', strtotime('+15 days')),
      	         
      	                );
      	    
      	    $insert = $this->Apimodel->insert(TBL_ORDER,$arr);
      	    if($insert){
      	          foreach($p_data as $data1){
      	              $t =$data1["qty"]*$data1["price"];
      	              $proddetail = array('order_id'=>$ord_id,
      	                                   'product_id'=>$data1["product_id"],
      	                                   'size'=>$data1["size"],
      	                                   'color'=>$data1["color"],
      	                                   'qty'=>$data1["qty"],
      	                                   'total_price'=>$t,
      	                                   'price'=>$data1["price"],);
      	                                   
      	         $insertdetail = $this->Apimodel->insert(TBL_ORDER_DETAIL,$proddetail);
      	         $proddetail = $this->Apimodel->get_single_row(TBL_PRODUCT,array('id'=>$data1["product_id"]));   
      	         $oldstock = $proddetail->stock;
      	         $newstock = $oldstock - $data1["qty"];
      	         $sarr=array('stock'=>$newstock);
                 $updateprod = $this->Apimodel->updatewhere(TBL_PRODUCT,'id',$data1["product_id"],$sarr);

      	          }
      	         $arrdel = array("user_id"=>$user_id);
                 $DELETE = $this->Apimodel->delete_where(TBL_CART,$arrdel);
                  if($c_id != ''){
                          $insertcoupon = $this->Apimodel->insert(TBL_USED_COUPON,array('user_id'=>$user_id,'coupon_id'=>$c_id,'order_id'=>$ord_id));
                      }
                      
                        $arr = array(
                            'registration_ids' => array($user->fcm_token),
                            'notification' => array( 'title' => 'Order Placed!', 'body' => 'Your Order Is Placed Successfully','type'=>'order'),
                            'data' => array( 'title' => 'Order Placed!', 'body' => 'Your Order'.$ord_id.' is Placed Successfully','type'=>'order')
                        );
                    $url = 'https://fcm.googleapis.com/fcm/send';
                    $fields = (array) $arr;
                    define("GOOGLE_API_KEY","AAAAFK8vjWk:APA91bEpWmtTQ3Plei5Nmybt41vsl2a9YaFhnbu8s6MQ9MlNTvzZraS-9R8QYBqzIRrlYH-k8h2xRkwOITh5RkxhZ-6-Fzh37s-sE57Mvj-TAK99S4c0TbiztZwuMauF2j-K36x3OMlP");
                    $headers = array(
                        'Authorization: key=' . GOOGLE_API_KEY,
                        'Content-Type: application/json'
                    );
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);   
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
                    $result = curl_exec($ch);               
                    if ($result === FALSE) {
                        die('Curl failed: ' . curl_error($ch));
                    }else{
                          $today=date('Y-m-d H:i:s');
                        $insertnoti = $this->Apimodel->insert(TBL_NOTIFICATION,array('user_id'=>$user_id,'type'=>'order','order_id'=>$ord_id,'message'=>'Your Order '.$ord_id.' is Placed Successfully','created_on'=>$today));
                        $result = array('status'=>TRUE, 'message'=>'Order successfully');
                    }
                    curl_close($ch);
      	       
      	    }else{
      	        $result = array('status'=>FALSE, 'message'=>'Something went wrong');   
      	    }
        }else{
             $result = array('status'=>FALSE, 'message'=>'Some Product Is out of Stock,Please Remove and Try again!!'); 
        }
         
      }else{
          
          $result = array('status'=>FALSE, 'message'=>'User Not Exist!!');  
      }
      
    

 echo json_encode($result);
 
   
 
}


public function myorders(){
      
    $user_id = $this->input->post('user_id');
    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
                
                $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id));   
             $data = count($user);
        if($data > 0){
        
                    $dataprod = $this->Apimodel->wheredata(TBL_ORDER,'user_id',$user_id);
                
                
	                    
	               // print_r($resultdata);die;
  	                
  	               if($dataprod){
  	                      $arr= array();
  	                     foreach($dataprod as $orderdata){
  	                    	$odata = $this->Apimodel->wheredata(TBL_ORDER_DETAIL,'order_id',$orderdata->order_id);  
  	                    	$shippingdata = $this->Apimodel->wheredetail(TBL_SHIPPING_ADD,'id',$orderdata->address_id);     

  	                    	
  	                          	foreach($odata as $pdata){
  	                    	      $proddata = $this->Apimodel->wheredetail(TBL_PRODUCT,'id',$pdata->product_id);
  	                    	      $pname= $proddata->name;
  	                    	      
  	                    	      if($proddata->brand !=''){
  	                    	      $branddata = $this->Apimodel->wheredetail(TBL_BRAND,'id',$proddata->brand);
  	                    	      $pbrand = $branddata->name;
  	                    	      }else{
  	                    	         $pbrand=''; 
  	                    	      }
  	                    	      
  	                    	      $categorydata = $this->Apimodel->wheredetail(TBL_CATEGORY,'id',$proddata->category);
  	                    	      $pcategory = $categorydata->name;
  	                    	      
  	                    	      if($pdata->size !=0){
  	                    	      $sizedata = $this->Apimodel->wheredetail(TBL_SIZE,'id',$pdata->size);
  	                    	      $psize = $sizedata->name;
  	                    	      }else{
  	                    	         $psize=''; 
  	                    	      }
  	                    	      
  	                    	      
  	                    	       if($pdata->color !=0){
  	                    	      $colordata = $this->Apimodel->wheredetail(TBL_COLOR,'id',$pdata->color);
  	                    	      $pcolor= $colordata->name;
  	                    	       }else{
  	                    	           $pcolor= '';
  	                    	       }
  	                    	       
  	                    	      
  	                    	       $alldata = array ('order_id'=>$orderdata->order_id,'created_on'=>$orderdata->created_on,'Product name'=>$pname,'Product category'=>$pcategory,'Product Brand'=>$pbrand,'Product size'=>$psize,'Product color'=>$pcolor);
  	                    	       //$adata[]=$alldata;
  	                    	      $pdata->ProductDetail = $alldata;
  	                    	      
  	                    	      $proddata = $this->Apimodel->wheredata(TBL_PRODUCT_IMG,'product_id',$pdata->product_id);
  	                    	      $pdata->Images= $proddata;
  	                         	}
  	                    	
                            $orderdata->OrderDetail = $odata;
                            $orderdata->ShippingDetail = $shippingdata;
                            $arr[]=$orderdata;
  	                     }
                          
                            
                           
                        
  	                  
  	                   
  	                  $result = array('status'=>TRUE, 'message'=>'Orders List','data'=>$arr); 
  	                   
  	               }else{
  	                   $result = array('status'=>FALSE, 'message'=>'No Orders Found'); 
  	               }
  	                
  	               
                   
      }else{
          
          $result = array('status'=>FALSE, 'message'=>'User Not Exist!!');  
      } 
    }
       
    
             echo json_encode($result);
}


public function trackmyorders(){
      
    $user_id = $this->input->post('user_id');
    $order_id = $this->input->post('order_id');
    $o_detail_id = $this->input->post('o_detail_id');
    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
    $this->form_validation->set_rules('order_id', 'order_id', 'trim|required');
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
                  $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id));   
             $data = count($user);
         if($data > 0){
                
               
        
                    $orderdata = $this->Apimodel->wheredetail(TBL_ORDER,'order_id',$order_id);
                
                
	                    
	               // print_r($resultdata);die;
  	                
  	               if($orderdata){
  	                      $arr= array();
  	                     
  	                    	$odata = $this->Apimodel->wheredata(TBL_ORDER_DETAIL,'o_detail_id',$o_detail_id);     
  	                    	
  	                          	foreach($odata as $pdata){
  	                    	      $proddata = $this->Apimodel->wheredetail(TBL_PRODUCT,'id',$pdata->product_id);
  	                    	      $pname= $proddata->name;
  	                    	      
  	                    	     if($proddata->brand !=''){
  	                    	      $branddata = $this->Apimodel->wheredetail(TBL_BRAND,'id',$proddata->brand);
  	                    	      $pbrand = $branddata->name;
  	                    	      }else{
  	                    	         $pbrand=''; 
  	                    	      }
  	                    	      
  	                    	      $categorydata = $this->Apimodel->wheredetail(TBL_CATEGORY,'id',$proddata->category);
  	                    	      $pcategory = $categorydata->name;
  	                    	      
  	                    	      if($pdata->size !=0){
  	                    	      $sizedata = $this->Apimodel->wheredetail(TBL_SIZE,'id',$pdata->size);
  	                    	      $psize = $sizedata->name;
  	                    	      }else{
  	                    	         $psize=''; 
  	                    	      }
  	                    	      
  	                    	      
  	                    	       if($pdata->color !=0){
  	                    	      $colordata = $this->Apimodel->wheredetail(TBL_COLOR,'id',$pdata->color);
  	                    	      $pcolor= $colordata->name;
  	                    	       }else{
  	                    	           $pcolor= '';
  	                    	       }
  	                    	       
  	                    	      
  	                    	       $alldata = array ('Product name'=>$pname,'Product category'=>$pcategory,'Product Brand'=>$pbrand,'Product size'=>$psize,'Product color'=>$pcolor);
  	                    	       //$adata[]=$alldata;
  	                    	      $pdata->ProductDetail = $alldata;
  	                    	      
  	                    	      $proddata = $this->Apimodel->wheredata(TBL_PRODUCT_IMG,'product_id',$pdata->product_id);
  	                    	      $pdata->Images= $proddata;
  	                         	}
  	                    	
                            $orderdata->OrderDetail = $odata;
                            
  	                       $result = array('status'=>TRUE, 'message'=>'Order Data','data'=>$orderdata); 
  	                   
  	               }else{
  	                   $result = array('status'=>FALSE, 'message'=>'No Order Found'); 
  	               }
  	                
         }else{
          
          $result = array('status'=>FALSE, 'message'=>'User Not Exist!!');  
      }            
                   
    }                
       
    
             echo json_encode($result);
}


public function myprofile(){
      
    $user_id = $this->input->post('user_id');
   
    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
   
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
                 $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id));   
             $data = count($user);
          if($data > 0){
              
                $result = array('status'=>TRUE, 'message'=>'User Data','data'=>$user); 
                  
         }else{
          
          $result = array('status'=>FALSE, 'message'=>'User Not Exist!!');  
      }            
                   
    }                
       
    
             echo json_encode($result);
}







public function updatemyprofile(){
      
    $user_id = $this->input->post('user_id');
    $phone = $this->input->post('phone');
   
    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
    
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
             $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id));   
             $data = count($user);
             
           if($data > 0){
               if(!empty($_FILES['image']['name']))
				{
					$configs['upload_path'] = 'upload/userprofile/';
					$configs['allowed_types'] = 'jpg|jpeg|png|gif';
					$configs['file_name'] = $_FILES['image']['name'];
					
			 	    //Load upload library and initialize configuration
					$this->load->library('upload',$configs);
					$this->upload->initialize($configs);
				  
					if($this->upload->do_upload('image'))
					{
					  $uploadData = $this->upload->data();
						$image = "upload/userprofile/".$uploadData['file_name'];
					    
					}else{
					    echo $this->upload->display_errors(); die;
						$image = '';
					}
				}else{
				    if($user->image!=''){
				    $image = $user->image;
				    }else{
				        $image = '';
				    }
				}
              
              $arr=array(
                        'name'=>$this->input->post('name'),
                         'email'=>$this->input->post('email'),
                          
                           'address'=>$this->input->post('address'),
                            'image'=>$image
                         );
                         
                         
               $update = $this->Apimodel->updatewhere(TBL_USER,'user_id',$user_id,$arr);
               $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id)); 
               if($update == true){
                $result = array('status'=>TRUE, 'message'=>'User Updated','data'=>$user); 
               }else{
                    $result = array('status'=>FALSE, 'message'=>'User Not Updated!!'); 
               }
                  
         }else{
          
          $result = array('status'=>FALSE, 'message'=>'User Not Exist!!');  
      }            
                   
    }                
       
    
             echo json_encode($result);
}





public function shipping_address(){
      
    $user_id = $this->input->post('user_id');
   
    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
     $this->form_validation->set_rules('name', 'name', 'trim|required'); 
     $this->form_validation->set_rules('phone', 'phone', 'trim|required');
      $this->form_validation->set_rules('address', 'address', 'trim|required');
     $this->form_validation->set_rules('city', 'city', 'trim|required'); 
     $this->form_validation->set_rules('country', 'country', 'trim|required');
    
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
             $user = $this->Apimodel->get_single_row(TBL_SHIPPING_ADD,array('user_id'=>$user_id));   
             $data = count($user);
             
          
          
               $arr=array(
                        'user_id'=>$this->input->post('user_id'),
                        'name'=>$this->input->post('name'),
                         'phone'=>$this->input->post('phone'),
                          'address'=>$this->input->post('address'),
                           'city'=>$this->input->post('city'),
                           'country'=>$this->input->post('country'),
                           'zipcode'=>$this->input->post('zipcode'),
                           'add_type'=>$this->input->post('address_type'),
                           'status'=>1
                            
                         );
                         
                         
               $update = $this->Apimodel->insert(TBL_SHIPPING_ADD,$arr);
               $user = $this->Apimodel->get_single_row(TBL_SHIPPING_ADD,array('id'=>$update)); 
               if($update == true){
                $result = array('status'=>TRUE, 'message'=>'Shipping Address Updated','data'=>$user); 
               }else{
                    $result = array('status'=>FALSE, 'message'=>'Shipping Address Not Updated!!'); 
               }  
      }           
                   
                   
       
    
             echo json_encode($result);
}

public function addresslist(){
      
    $user_id = $this->input->post('user_id');
      $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
	 
	       $address = $this->Apimodel->get_tbl_data(TBL_SHIPPING_ADD,array('status'=>1,'user_id'=>$user_id));     
        if(!empty($address))
        {
            $result = array('status'=>TRUE, 'message'=>'Address list','data'=>$address); 
        }
        else
        {
            $result = array('status'=>FALSE, 'message'=>'No Address found');  
        }
    }
      echo json_encode($result);
 }  


public function addressdelete(){
	  $user_id = $this->input->post('user_id');
	  $add_id = $this->input->post('address_id');
	
    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
    $this->form_validation->set_rules('address_id', 'address_id', 'trim|required');
    
    // $this->form_validation->set_rules('color', 'color', 'trim|required');
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
      $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id));   
      $data = count($user);
      if($data > 0){
                
               $arr = array( 
      	                 
      	                 "status"=>0,
      	         
      	                );
      	    
      	    $insert = $this->Apimodel->updatewhere(TBL_SHIPPING_ADD,'id',$add_id,$arr);
      	    if($insert){
      	       $result = array('status'=>TRUE, 'message'=>'Deleted from Shipping Address  successfully');
      	    }else{
      	        $result = array('status'=>FALSE, 'message'=>'Something went wrong');   
      	    }
          
         
      }else{
          
          $result = array('status'=>FALSE, 'message'=>'User Not Exist!!');  
      }
      
    
}
 echo json_encode($result);
 
   
 
} 
  
  
  
  
public function cartcount(){
      
    $user_id = $this->input->post('user_id');
   
    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
   
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
             $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id));   
             $data = count($user);
          if($data > 0){
                $arr=array();
                $c = $this->Apimodel->wheredata(TBL_CART,'user_id',$user_id);
                $ctotal = count($c);
              $result = array('status'=>TRUE, 'message'=>'Cart Data','Count'=>$ctotal); 
                  
         }else{
          
          $result = array('status'=>FALSE, 'message'=>'User Not Exist!!');  
      }            
                   
    }                
       
    
             echo json_encode($result);
}



public function apply_coupon()
  {
       $user_id= $this->input->post('user_id');
       $name= $this->input->post('coupon_name');
       $cupon= $this->Apimodel->get_single_row(TBL_COUPON,array('name'=>$name));
       
      
          if(count($cupon) > 0){
         $used_cupon= $this->Apimodel->get_tbl_data(TBL_USED_COUPON,array('user_id'=>$user_id,'coupon_id'=>$cupon->id));
           $today = date('Y-m-d'); 
           if(count($used_cupon) <= $cupon->uses && $cupon->expiry_date >= $today){
                $odtotal = $this->Apimodel->get_order_total(TBL_CART,$user_id); 
                 $d = $cupon->discount; 
                 $ot=$odtotal->total_price;
                 if($ot >= $cupon->min_purchase ){
                 $c_off = ($ot*$d)/100;
                 $newtotal = $ot - $c_off;
                 $result = array('status'=>TRUE, 'message'=>'Success','bag_total'=>$ot,'c_off'=>$c_off,'grand_total'=>$newtotal,'coupon_id'=>$cupon->id) ;
                 }else{
                  $message = 'Coupon Minimum Purchase is '.$cupon->min_purchase.'!!';
                   $result = array('status'=>FALSE, 'message'=>$message);
                 }
      	      
      	      }else{
      	           $message = 'Coupon Code is Expired!!';
                   $result = array('status'=>FALSE, 'message'=>$message);
      	      }
             
             
           
          
  }else{
       $message = 'Coupon Code Is not valid!!';
            $result = array('status'=>FALSE, 'message'=>$message);
  }
  
    echo json_encode($result);
  
}

 public function notification(){
     
      $user_id = $this->input->post('user_id');
      $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
        
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
         	 $this->Apimodel->update_where(TBL_NOTIFICATION,array('user_id'=>$user_id),array('seen_status'=>1));
             $noti = $this->Apimodel->wheredata(TBL_NOTIFICATION,'user_id',$user_id);     
         if(!empty($noti))
         {
             $result = array('status'=>TRUE, 'message'=>'Notification list','data'=>$noti); 
         }
         else
         {
             $result = array('status'=>FALSE, 'message'=>'No Notification found');  
         }
         
    }
    
      echo json_encode($result);
 } 
 
 
 
 public function removenotification(){
	  $user_id = $this->input->post('user_id');
	  $id = $this->input->post('noti_id');

    $this->form_validation->set_rules('user_id', 'user_id', 'trim|required');
   // $this->form_validation->set_rules('product_id', 'product_id', 'trim|required');
    // $this->form_validation->set_rules('size', 'size', 'trim|required');
    // $this->form_validation->set_rules('color', 'color', 'trim|required');
   
    if($this->form_validation->run() == FALSE)
    {
        $message = strip_tags(validation_errors());
        $result = array('status'=>FALSE, 'message'=>$message, 'error'=>"");
        
    }
    else
    {
        
      $user = $this->Apimodel->get_single_row(TBL_USER,array('user_id'=>$user_id));   
      $data = count($user);
      if($data > 0){
          
         $noti = $this->Apimodel->get_single_row(TBL_NOTIFICATION,array('noti_id'=>$id));   

          if(empty($noti)){
               $result = array('status'=>FALSE, 'message'=>'No data!!');
          }else{
      	    
      	    
      	       $delete = $this->Apimodel->delete(TBL_NOTIFICATION,'noti_id',$id);

      	    if($delete){
      	       
      	       $result = array('status'=>TRUE, 'message'=>'Remove Notification  successfully');
      	    }else{
      	        $result = array('status'=>FALSE, 'message'=>'Something went wrong');   
      	    }
          }
         
      }else{
          
          $result = array('status'=>FALSE, 'message'=>'User Not Exist!!');  
      }
      
    
   }
 echo json_encode($result);
 
   
 
}



  
}  