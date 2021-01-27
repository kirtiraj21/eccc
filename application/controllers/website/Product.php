<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	
	        function __construct()
			  {
				parent::__construct();
				$this->load->helper('url');

				$this->load->library("pagination");
                $this->load->model('admin/Home_model');
				$this->load->library(array('form_validation', 'email','cart','session'));
				 
			  }
/*if($catid!=''){
            $baseurl = base_url() . "Shop?catid=".$this->uri->segment(2)."&pg=";
            $urisegment = 3;
            $totalrow = $this->Home_model->get_tbl_data(TBL_PRODUCT,array('category'=>$catid));
        }elseif($subcatid!=''){
            $baseurl = base_url() . "Shop?catid=".$this->uri->segment(2)."&subcat=".$this->uri->segment(3)."&pg=";
            $urisegment = 4;
            $totalrow = $this->Home_model->get_tbl_data(TBL_PRODUCT,array('sub_category'=>$subcatid,'category'=>$catid));
        }else{
            
            $baseurl = base_url() . "Shop?pg=";
            $urisegment = 2;
            $totalrow = $this->Home_model->get_tbl_data(TBL_PRODUCT,array());
            $catid = '';
            $subcatid = '';
        }*/

// public function index()
//   {
//         $catid= base64_decode($this->uri->segment(2));
//         $subcatid= base64_decode($this->uri->segment(3));
//          if($catid!=''){
//             $baseurl = base_url() . "Shop/".$this->uri->segment(2);
//             $urisegment = 3;
//             $totalrow = $this->Home_model->get_tbl_data(TBL_PRODUCT,array('category'=>$catid));
//         }elseif($subcatid!=''){
//             $baseurl = base_url() . "Shop/".$this->uri->segment(2)."/".$this->uri->segment(3);
//             $urisegment = 4;
//             $totalrow = $this->Home_model->get_tbl_data(TBL_PRODUCT,array('sub_category'=>$subcatid,'category'=>$catid));
//         }else{
            
//             $baseurl = base_url() . "Shop";
//             $urisegment = 2;
//             $totalrow = $this->Home_model->get_tbl_data(TBL_PRODUCT,array());
//             $catid = '';
//             $subcatid = '';
//         }
//         $config = array();
//         $config["base_url"] = $baseurl;
//         $config["total_rows"] = count($totalrow);
//         $config["per_page"] = 3;
//         $config["uri_segment"] = $urisegment;
        
//         $config['full_tag_open'] = '<ul class="pagination mt-3 justify-content-center pagination_style1">'; 
//         $config['num_tag_open'] = '<li class="page-item "><a href="javascript:;" class="page-link myAJ">'; 
//         $config['num_tag_close'] = '</a></li>'; 
//         $config['cur_tag_open'] = '<li class="page-item active"><a href="javascript:;" class="page-link myAJ" >'; 
//         $config['cur_tag_close'] = '</a></li>'; 
//         $config['next_tag_open'] = '<li class="page-item "><a href="javascript:;" class="page-link myAJ">'; 
//         $config['next_tag_close'] = '</a></li>'; 
//         $config['prev_tag_open'] = '<li class="page-item "><a href="javascript:;" class="page-link myAJ" >'; 
//         $config['prev_tag_close'] = '</a></li>'; 
//         $config['first_tag_open'] = '<li class="page-item "><a href="javascript:;" class="page-link myAJ">'; 
//         $config['first_tag_close'] = '</a></li>';
//         $config['last_tag_open'] = '<li class="page-item "><a href="javascript:;" class="page-link myAJ">'; 
//         $config['last_tag_close'] = '</a></li>';
//         $config['full_tag_close'] = '</ul>';
         
//         // print_r($config);die;
//         //echo $this->uri->segment(2);die;
//         $this->pagination->initialize($config);

//         $page = $urisegment; 
//         $offset = !$page?0:$page; 

//         $data["links"] = $this->pagination->create_links();

//         $data['product'] = $this->Home_model->get_product($config["per_page"], $offset,$catid,$subcatid);
//         $data['category'] = $this->Home_model->get_tbl_data(TBL_CATEGORY,array('status'=>1));
//         // print_r($data['category']);die;
//       $data['brand'] = $this->Home_model->get_tbl_data(TBL_BRAND,array('status'=>1));


//       $this->load->view('Yikooo/shop',$data);
//   }
  
  
  
  public function index()
  {      
     
         $catid= base64_decode($this->uri->segment(2));
         $subcatid= base64_decode($this->uri->segment(3));
    //      $pg=$this->uri->segment(2);
    //      if(($catid!=0 || $catid!="") && ($subcatid!=0 || $subcatid!="")){
    //         $baseurl = base_url() . "Shop/".$pg."/".$catid.'/'.$subcatid;
    //         $urisegment = 2;
    //       //  $totalrow = $this->Home_model->get_tbl_data(TBL_PRODUCT,array(""));
    //          $totalrow = $this->Home_model->get_tbl_data(TBL_PRODUCT,array('sub_category'=>$subcatid,'category'=>$catid));
    //     }elseif($catid!=0 && $catid!=''){
    //                  $baseurl = base_url() . "Shop/".$pg."/".$catid.'/0';
    //                 $urisegment = 2;
    //                  $totalrow = $this->Home_model->get_tbl_data(TBL_PRODUCT,array('category'=>$catid));
    //     }else{
            
    //         $baseurl = base_url() . "Shop/$pg/0/0";
    //         $urisegment = 2;
    //         $totalrow = $this->Home_model->get_tbl_data(TBL_PRODUCT,array());
    //         $catid = '';
    //         $subcatid = '';
    //     }
    //     $config = array();
    //     $config["base_url"] = $baseurl;
    //     $config["total_rows"] = count($totalrow);
    //     $config["per_page"] = 3;
    //   // $config["uri_segment"] = $urisegment;
        
    //     $config['full_tag_open'] = '<ul class="pagination mt-3 justify-content-center pagination_style1">'; 
    //     $config['num_tag_open'] = '<li class="page-item "><a href="javascript:;" class="page-link myAJ">'; 
    //     $config['num_tag_close'] = '</a></li>'; 
    //     $config['cur_tag_open'] = '<li class="page-item active"><a href="javascript:;" class="page-link myAJ" >'; 
    //     $config['cur_tag_close'] = '</a></li>'; 
    //     $config['next_tag_open'] = '<li class="page-item "><a href="javascript:;" class="page-link myAJ">'; 
    //     $config['next_tag_close'] = '</a></li>'; 
    //     $config['prev_tag_open'] = '<li class="page-item "><a href="javascript:;" class="page-link myAJ" >'; 
    //     $config['prev_tag_close'] = '</a></li>'; 
    //     $config['first_tag_open'] = '<li class="page-item "><a href="javascript:;" class="page-link myAJ">'; 
    //     $config['first_tag_close'] = '</a></li>';
    //     $config['last_tag_open'] = '<li class="page-item "><a href="javascript:;" class="page-link myAJ">'; 
    //     $config['last_tag_close'] = '</a></li>';
    //     $config['full_tag_close'] = '</ul>';
         
         
    //     // print_r($config);die;
    //     //echo $this->uri->segment(2);die;
    //     $this->pagination->initialize($config);

    //     $page = $urisegment; 
    //     $offset = !$page?0:$page; 

    //     $data["links"] = $this->pagination->create_links();

        // $data['product'] = $this->Home_model->get_product($config["per_page"], $offset,$catid,$subcatid);
        $data['product'] = $this->Home_model->get_product($catid,$subcatid);
         $data['category'] = $this->Home_model->get_single_row(TBL_CATEGORY,array('id'=>$catid));
        $data['subcategory'] = $this->Home_model->get_tbl_data(TBL_SUB_CATEGORY,array('status'=>1,'category_id'=>$catid));
        // print_r($data['category']);die;
       $data['brand'] = $this->Home_model->get_tbl_data(TBL_BRAND,array('status'=>1));


       $this->load->view('Yikooo/shop',$data);
  }
  
  
  public function sorting()
  {
       $value = $this->input->post('value');
       $cat = $this->input->post('category');
       $subcat = $this->input->post('subcategory');
       $brand = $this->input->post('brand');
       $min = $this->input->post('min');
       $max = $this->input->post('max');
      
     $product= $this->Home_model->get_product_desc($value,$cat,$subcat,$brand,$min,$max,''); ?>
        <div class="row shop_container list" >
             <sapn id="wishmsg"></sapn>
         <?php  foreach($product as $vw){ 
                        $img = $this->db->where('product_id',$vw->prod_id)->get('product_img')->row(); 
                        $user_id= $this->session->userdata('user_id');
                        $wish = $this->Home_model->get_single_row(TBL_WISHLIST,array('user_id'=>$user_id,'product_id'=>$vw->prod_id));
                        $rate = $this->Home_model->get_average(TBL_REVIEW,$vw->prod_id);
                        $reviews = $this->Home_model->wheredata(TBL_REVIEW,'product_id',$vw->prod_id);
                        ?>
                        <div class="col-md-4 col-6">
                            <div class="product">
                                <div class="product_img">
                                    <a href="<?php echo base_url('Product-Detail/'.base64_encode($vw->prod_id)) ?>">
                                        <img src="<?php echo base_url().$img->image; ?>" alt="product_img2">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li><a href="<?php echo base_url('Product-Detail/'.base64_encode($vw->prod_id)) ?>"><i class="icon-magnifier-add"></i></a></li>
                                            <!--<li><a href="wishlist.php"><i class="icon-heart"></i></a></li>-->
                                        </ul>
                                    </div>
                                </div>
                                <div class="product_info">
                                    <h6 class="product_title"><a href="<?php echo base_url('Product-Detail/'.base64_encode($vw->prod_id)) ?>"><?php echo $vw->prod_name; ?></a>
                                    <span class="wish_heart wish-icon" onclick="wishlist(<?php echo $vw->prod_id;?>);"> <i class="fa fa-heart <?php  if(count($wish) > 0){echo 'mygreen';} ?>"></i> </span></h6>
                                    
                                      <div class="pr_desc">
                                        <?php echo mb_strimwidth($vw->prod_detail, 0, 100, "...");  ?>
                                    </div>
                                    
                                    <div class="product_price">
                                        <span class="price">$<?php echo $vw->prod_discount_price; ?></span>
                                        <del>$<?php echo $vw->prod_price; ?></del>
                                        <div class="on_sale">
                                            <span><?php echo $vw->prod_discount; ?>% Off</span>
                                        </div>
                                    </div>
                                     <div class="rating_wrap">
                                        <div class="rating1">
                                            <fieldset id='demo3' class="rating">
                                                <input class="stars" type="radio" id="3star_a-5" name="3rating" value="5" <?php if($rate->average_rating ==5){echo 'checked';} ?> />
                                                <label class="full" for="3star_a-5" title="Awesome - 5 stars"></label>
                                                <input class="stars" type="radio" id="3star_a_5-half" name="3rating" value="4.5" <?php if($rate->average_rating ==4.5){echo 'checked';} ?> />
                                                <label class="half" for="3star_a_5-half" title="Pretty good - 4.5 stars"></label>
                                                <input class="stars" type="radio" id="3star_a-4" name="3rating" value="4" <?php if($rate->average_rating ==4){echo 'checked';} ?> />
                                                <label class="full" for="3star_a-4" title="Pretty good - 4 stars"></label>
                                                <input class="stars" type="radio" id="3star_a_4-half" name="3rating" value="3.5"  <?php if($rate->average_rating ==3.5){echo 'checked';} ?>/>
                                                <label class="half" for="3star_a_4-half" title="Meh - 3.5 stars"></label>
                                                <input class="stars" type="radio" id="3star_a-3" name="3rating" value="3" <?php if($rate->average_rating ==3){echo 'checked';} ?> />
                                                <label class="full" for="3star_a-3" title="Meh - 3 stars"></label>
                                                <input class="stars" type="radio" id="3star_a_3-half" name="3rating" value="2.5" <?php if($rate->average_rating ==2.5){echo 'checked';} ?> />
                                                <label class="half" for="3star_a-3-half" title="Kinda bad - 2.5 stars"></label>
                                                <input class="stars" type="radio" id="3star2" name="3rating" value="2" <?php if($rate->average_rating ==2){echo 'checked';} ?> />
                                                <label class="full" for="3star2" title="Kinda bad - 2 stars"></label>
                                                <input class="stars" type="radio" id="3star2half" name="3rating" value="1.5" <?php if($rate->average_rating ==1.5){echo 'checked';} ?> />
                                                <label class="half" for="3star2half" title="Meh - 1.5 stars"></label>
                                                <input class="stars" type="radio" id="3star1" name="3rating" value="1" <?php if($rate->average_rating ==1){echo 'checked';} ?> />
                                                <label class="full" for="3star1" title="Sucks big time - 1 star"></label>
                                                <input class="stars" type="radio" id="3starhalf" name="3rating" value="0.5" <?php if($rate->average_rating ==0.5){echo 'checked';} ?>/>
                                                <label class="half" for="3starhalf" title="Sucks big time - 0.5 stars"></label>
                                              </fieldset>
                                            <!--<div class="product_rate" style="width:80%">-->
                                                
                                            <!--    fghgfh-->
                                            <!--</div>-->
                                        </div>
                                        <span class="rating_num">(<?php echo count($reviews);   ?>)</span>
                                    </div>
                                   
                                   
                                    <div class="list_product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <?php  if($vw->prod_stock == 0){?>
                                            <li><span style='color:red;'> Out Of Stock</span></li>
                                            <?php }else{ ?>
                                            <li class="add-to-cart" onclick="addtocart(<?php echo $vw->prod_id;?>);"><span><i class="icon-basket-loaded"></i> Add To Cart</span></li>
                                            <?php } ?>
                                            
                                           
                                            
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <?php } ?>
                       
                    </div>
                    
        </div>
        
        <style>
.mygreen{
color: #64c169;
}
</style>

<script>
$(document).ready(function(){
$('.wish-icon i').click(function(){
$(this).toggleClass('mygreen');
});
});
</script>
      
  <?php }
  

public function prod_detail()
  {
        $id = base64_decode($this->uri->segment(2)); 
        $data['product'] = $this->Home_model->proddetail(TBL_PRODUCT, $id);
        $data['review'] = $this->Home_model->wheredata(TBL_REVIEW,'product_id',$id);
        $this->load->view('Yikooo/product-detail',$data);
  }  
  
  
public function wishlist()
  {
    if(empty($this->session->userdata('user_id'))){
	echo 0;
	}else{
     $user_id= $this->session->userdata('user_id');
     $product_id =$this->input->post('product_id');
      $wish = $this->Home_model->get_single_row(TBL_WISHLIST,array('user_id'=>$user_id,'product_id'=>$product_id));
          if(count($wish) == 0){
      	    $arr = array( 
      	                 "product_id"=>$product_id,
      	                 "user_id"=>$user_id,
      	         
      	                );
      	    
      	    $insert = $this->Home_model->insert(TBL_WISHLIST,$arr);
      	    //$update = $this->Home_model->updatewhere(TBL_PRODUCT,'id',$product_id,array('fav_status'=>1));
      	    if($insert){
      	     echo 1;
      	    }
          }else{
               $arr = array( 
      	                 "product_id"=>$product_id,
      	                 "user_id"=>$user_id,
      	         
      	                );
               $DELETE = $this->Home_model->delete_where(TBL_WISHLIST,$arr);
               // $update = $this->Home_model->updatewhere(TBL_PRODUCT,'id',$product_id,array('fav_status'=>0));
      	      if($DELETE){
      	     echo 2;
      	      }
          } 
  }
  }
  
  
public function addtocart()
  {
      
    if(empty($this->session->userdata('user_id'))){
	echo 0;
	}else{
     $user_id= $this->session->userdata('user_id');
     $product_id =$this->input->post('product_id');
     $prod = $this->Home_model->get_single_row(TBL_PRODUCT,array('id'=>$product_id));
     $size = $this->Home_model->get_single_row(TBL_PRODUCT_SIZE,array('product_id'=>$product_id));
     $color = $this->Home_model->get_single_row(TBL_PRODUCT_COLOR,array('product_id'=>$product_id));
     if($this->input->post('size') !=''){
        $size_id= $this->input->post('size');
     }else{
        if($size!=''){
        $size_id = $size->size;
        }else{
           $size_id=0; 
        }
     }
     
     
     if($this->input->post('color') !=''){
        $color_id= $this->input->post('color');
     }else{
          if($color!=''){
        $color_id = $color->color;
          }else{
              $color_id=0;
          }
     }
     
     
      if($this->input->post('qty') !=''){
        $qtyval = $this->input->post('qty');
     }else{
        $qtyval = 1;
     }
      $cart = $this->Home_model->get_single_row(TBL_CART,array('user_id'=>$user_id,'product_id'=>$product_id,'size'=>$size_id,'color'=>$color_id));
     
          if(count($cart) == 0){
          $total_price =$prod->price_after_discount * $qtyval;
          

      	    $arr = array( 
      	                 "product_id"=>$product_id,
      	                 "user_id"=>$user_id,
      	                 "size"=>$size_id,
      	                 "color"=>$color_id,
      	                 "qty"=>$qtyval,
      	                 "price"=>$prod->price,
      	                 "price_after_discount"=>$prod->price_after_discount,
      	                 "total"=>$total_price,
      	                 "created_on"=>date('Y-m-d H:i:s')
      	                );
      	    
      	    $insert = $this->Home_model->insert(TBL_CART,$arr);
      	    $prodcart = $this->Home_model->wheredata(TBL_CART,'user_id',$user_id); 
             $cartcount =count($prodcart);
      	    if($insert){
      	     echo $cartcount;
      	    }
          }else{
              $qty =$cart->qty + $qtyval;
              $total = $cart->price_after_discount * $qty;
               $arr = array( 
      	                 "product_id"=>$product_id,
      	                 "user_id"=>$user_id,
      	                 "qty"=>$qty,
      	                 "total"=>$total,
      	                 "created_on"=>date('Y-m-d H:i:s')
      	                 );
               $UPDATE = $this->Home_model->update_where(TBL_CART,array("product_id"=>$product_id, "user_id"=>$user_id,),$arr);
              //  $update = $this->Home_model->updatewhere(TBL_PRODUCT,'id',$product_id,array('cart_status'=>0));
      	      if($UPDATE){
      	         echo "updtqty";
      	      }
          } 
  }
}
  
  
  
public function addreview()
  {
      $user_id= $this->session->userdata('user_id');
      $product_id = $this->input->post('product_id');
      $user = $this->Home_model->get_single_row(TBL_USER,array('user_id'=>$user_id));   
      $data = count($user);
      if($data > 0){
          
      	    $arr = array( 
      	                 "product_id"=>$this->input->post('product_id'),
      	                 "user_id"=>$user_id,
      	                 //"title"=>$this->input->post('title'),
      	                 "review"=>$this->input->post('review'),
      	                 "rating"=>$this->input->post('rating'),
      	                 "created_on"=>date('Y-m-d H:i:s'),
      	         
      	                );
      	    
      	    $insert = $this->Home_model->insert(TBL_REVIEW,$arr);
      	    if($insert){
      	        
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
					
					$insertimg = $this->Home_model->insert(TBL_REVIEW_IMG,$arrimg);	
				  }
				}
      	       $this->session->set_flashdata('message', 'Review has been Updated successfully');
			   redirect('Product-Detail/'.base64_encode($product_id));
      	    }else{
      	        $$this->session->set_flashdata('message', 'Not success!');
			    redirect('Product-Detail/'.base64_encode($product_id));
      	    }
         
      }else{
          
          //$this->session->set_flashdata('message', 'User Not exist!!');
			    redirect('website/Login/');
      }
      
   
  
  
  
} 
  
  
}