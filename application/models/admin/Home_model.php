 <?php 
class Home_model extends CI_Model
{
 public function selectdata($tablename)
  {
  	$this->load->database();
  	$this->db->select('*');
  	$this->db->from($tablename);
	$this->db->order_by('id','desc');
  	$query=$this->db->get();
  	return $query->result();
  }
  
  
  public function selectdataasc($tablename)
  {
  	$this->load->database();
  	$this->db->select('*');
  	$this->db->from($tablename);
	$this->db->order_by('id','asc');
  	$query=$this->db->get();
  	return $query->result();
  }
  
  public function getdata_asc($tbl='',$ord,$wh=array()){ 

		$this->db->where($wh);
		$this->db->order_by($ord,'asc');
		$this->db->limit(1, 0);
		$query = $this->db->get($tbl);
		return $query->row();
	
	}
  
  
  
  public function get_count($tblname) {
      echo $this->db->count_all($tblname);die;
        return  $this->db->count_all($tblname);
    }
  
  public function get_count_where($tblname,$where) {
        return $this->db->where($where)->count_all($tblname);
    }
  
  
//   public function get_product($limit, $start ,$catid ,$subcatid) {
     public function get_product($catid ,$subcatid) { 
       
        $this->db->select('product.id as prod_id,product.name as prod_name,product.description as prod_detail,product.brand as prod_brand,product.category as prod_category,product.price as prod_price,product.discount as prod_discount,product.price_after_discount as prod_discount_price,product.stock as prod_stock,product.expiry_date as prod_expiry,category.id as category_id,
 	    category.name as category_name,category.image as category_image,');
        $this->db->from('product');
        $this->db->join('category', 'category.id = product.category');
        if($catid !=''){
        $this->db->where('category',$catid);
        }
        if($subcatid !=''){
        $this->db->join('sub_category', 'sub_category.id = product.sub_category');
        $this->db->where('sub_category',$subcatid);
        }
        $this->db->order_by("price_after_discount", "asc");
        // $this->db->limit($limit, $start);
        $query = $this->db->get();
      // echo $this->db->last_query();die;
        return $query->result();
    }
    
    
      public function get_product_desc($value,$cat,$subcat,$brand,$min,$max,$limit) {
         
        $this->db->select('product.id as prod_id,product.name as prod_name,product.description as prod_detail,product.brand as prod_brand,product.category as prod_category,product.price as prod_price,product.discount as prod_discount,product.price_after_discount as prod_discount_price,product.stock as prod_stock,product.expiry_date as prod_expiry,category.id as category_id,
 	    category.name as category_name,category.image as category_image,');
        $this->db->from('product');
        $this->db->join('category', 'category.id = product.category');
        //$this->db->join('brand', 'brand.id = product.brand');
        if($cat !=''){
           $this->db->where('category',$cat); 
        }
        if($subcat !=''){
           $this->db->where_in('sub_category',$subcat); 
        }
        if($brand !=''){
           $this->db->where_in('brand',$brand); 
        }
        if($value != ''){
        if($value == 'price-desc'){
        $this->db->order_by("price_after_discount", "desc");
        }elseif($value == 'price'){
          $this->db->order_by("price_after_discount", "asc");  
        }elseif($value == 'date'){
             $this->db->order_by("product.id", "desc");  
        }elseif($value == 'popularity'){
             $this->db->where("hot_selling", 1);  
        }else{
             $this->db->order_by("product.id", "asc");
        }
        }
         if($min != ''){
	           $this->db->where('price>=',(int)$min);
	           $this->db->where('price<=',(int)$max);
	       }
	    if($limit !=''){
     	$this->db->limit(10,$limit);
     	}
         
        $query = $this->db->get();
 //echo $this->db->last_query();die;
        return $query->result();
    }
    
    
  public function filterprod($category_id,$subcategoryfilter,$b_filter,$p_filter_min,$p_filter_max,$limit)
  {
    $this->load->database();
   $b=explode(',',$b_filter);
   $this->db->select('product.id as prod_id,product.name as prod_name,product.description as prod_detail,product.brand as prod_brand,product.category as prod_category,product.price as prod_price,product.discount as prod_discount,product.price_after_discount as prod_discount_price,product.stock as prod_stock,product.expiry_date as prod_expiry,category.id as category_id,
 	    category.name as category_name,category.image as category_image,sub_category.id as sub_category_id,
 	    sub_category.name as sub_category_name,sub_category.image as sub_category_image');
    $this->db->from('product');
    $this->db->join('category', 'category.id = product.category');
    $this->db->join('sub_category', 'sub_category.id = product.sub_category');
    $category_id;
    $subcategoryfilter;
    if($b_filter!=''){
    $this->db->where_in('brand',$b);
    }
    $p_filter_min;
	$p_filter_max;
	if($limit !=''){
	$this->db->limit(10,$limit);
	}
  	$query=$this->db->get();
  	//echo $this->db->last_query();die;
  	return $query->result();
  }
  
    public function wheredata($tablename,$where,$id)
  {
  	$this->load->database();
  	$this->db->select('*');
  	$this->db->from($tablename);
	$this->db->where($where,$id);

  	$query=$this->db->get();
  //	echo $this->db->last_query();die;
  	return $query->result();
  }
  
  
//   public function detail($tablename,$id)
//   {
//   	$this->load->database();
//   	$this->db->select('*');
//   	$this->db->from($tabif(empty($this->session->userdata('user_id'))){
// 	echo 0;
// 	}else{lename);
// 	$this->db->where('id',$id);
//   	$query=$this->db->get();
//   	return $query->row();
//   }
  
  
  
   public function proddetail($tablename,$id)
  {
  	$this->db->select('product.id as prod_id,product.name as prod_name,product.description as prod_detail,product.brand as prod_brand,product.category as prod_category,product.price as prod_price,product.discount as prod_discount,product.price_after_discount as prod_discount_price,product.stock as prod_stock,product.expiry_date as prod_expiry,category.id as category_id,
 	    category.name as category_name,category.image as category_image,sub_category.id as sub_category_id,
 	    sub_category.name as sub_category_name,sub_category.image as sub_category_image');
    $this->db->from($tablename);
    $this->db->join('category', 'category.id = product.category');
    $this->db->join('sub_category', 'sub_category.id = product.sub_category');
    $this->db->where('product.id',$id);
  	$query=$this->db->get();
  	return $query->row();
  }
  
  public function get_order_total($tablename,$id)
  {
  	$this->db->select('sum(total) as total_price');
    $this->db->from($tablename);
    $this->db->where('user_id',$id);
  	$query=$this->db->get();
  	//echo $this->db->last_query(); die;
  	return $query->row();
  }
  
  public function get_average($tablename,$id)
  {
  	$this->db->select('AVG(rating) as average_rating');
    $this->db->from($tablename);
    $this->db->where('product_id',$id);
  	$query=$this->db->get();
  	//echo $this->db->last_query(); die;
  	return $query->row();
  }
  
  
  
  public function wheredetail($tablename,$where,$id)
  {
  	$this->load->database();
  	$this->db->select('*');
  	$this->db->from($tablename);
	//$where = "'".$where."' = ".$id ;
	$this->db->where($where,$id);
  	$query=$this->db->get();
  	return $query->row();
  }
  
  
  public function insert($tablename,$data)
       {
        
        $insert = $this->db->insert($tablename,$data);
        if($insert)
		{
            return $this->db->insert_id();
        }else{
            return false;    
        }
    }  
	
//update query


public function update_user($tablename,$id,$data)
  {
    $this->db->where('phone',$id);
    $this->db->update($tablename,$data);
	return true;
  }	
  public function update($tablename,$id,$data)
  {
    $this->db->where('id',$id);
    $this->db->update($tablename,$data);
	return true;
  }	
  
  public function updatewhere($tablename,$where,$id,$data)
  {
    $this->db->where($where,$id);
    $this->db->update($tablename,$data);
   // echo $this->db->last_query();die;
   return true;
    
  }	
  
  
   public function delete($tablename,$where,$services_id) 
  { 
	 if ($this->db->delete($tablename, $where."= ".$services_id)) 
	 { 
		return true; 
	 } 
  } 
   public function get_tbl_data($tbl='',$wh=array()){ 

		$this->db->where($wh);
		$query = $this->db->get($tbl);
			
		return $query->result();
	
	}
	
	 public function get_all_data_prod($tbl='',$super,$hot,$new,$limit){ 
        
        
        $this->db->select('product.id as prod_id,product.name as prod_name,product.description as prod_detail,product.brand as prod_brand,product.category as prod_category,product.price as prod_price,product.discount as prod_discount,product.price_after_discount as prod_discount_price,product.stock as prod_stock,product.expiry_date as prod_expiry,category.id as category_id,
 	    category.name as category_name,category.image as category_image,sub_category.id as sub_category_id,
 	    sub_category.name as sub_category_name,sub_category.image as sub_category_image');
        $this->db->from('product');
        $this->db->join('category', 'category.id = product.category');
        $this->db->join('sub_category', 'sub_category.id = product.sub_category');       
        $super;$hot;$new;
		//$this->db->order_by('id','desc');
		$this->db->limit(10,$limit); 
	    $query = $this->db->get();
	    //echo $this->db->last_query();die;
	   return $query->result();
	
	}
	
	
	 public function get_home_prod($limit){ 
        
        
        $this->db->select('product.id as prod_id,product.name as prod_name,product.description as prod_detail,product.brand as prod_brand,product.category as prod_category,product.price as prod_price,product.discount as prod_discount,product.price_after_discount as prod_discount_price,product.stock as prod_stock,product.expiry_date as prod_expiry,category.id as category_id,
 	    category.name as category_name,category.image as category_image,');
        $this->db->from('product');
        $this->db->join('category', 'category.id = product.category');
        $this->db->limit(50,$limit); 
	    $query = $this->db->get();
	   //echo $this->db->last_query();die;
	   return $query->result();
	
	}
	
	 public function get_last_data($tbl='',$wh=array(),$column){ 
        $this->db->select($column);
		$this->db->where($wh);
		$this->db->order_by('id','desc');
		$this->db->limit(3); 
		$query = $this->db->get($tbl);
				
		return $query->result();
	
	}
	
	
	 public function get_limit_data($tbl='',$wh=array(),$limit){ 
        $this->db->select('*');
		$this->db->where($wh);
		$this->db->order_by('id','desc');
		$this->db->limit(5,$limit); 
		$query = $this->db->get($tbl);
				
		return $query->result();
	
	}
	  public function get_tbl_data_inorder($tbl='',$wh=array()){ 

		$this->db->where($wh);
		$this->db->order_by('id','desc');
		$query = $this->db->get($tbl);
		return $query->result();
	
	}// get_tbl_data function end here!
	
	 public function get_tbl_data_byorder($tbl='',$ord,$wh=array()){ 

		$this->db->where($wh);
		$this->db->order_by($ord,'DESC');
		$query = $this->db->get($tbl);
		return $query->result();
	
	}// get_tbl_data function end here!
	  
/*
* Function Name: get_single_row
* Desc.: This function get single row in table.
*/
	public function get_single_row($tbl='',$wh=array()){ 

		$this->db->where($wh);
		$query = $this->db->get($tbl);
				
		return $query->row();
	
	}// get_single_row function end here!
public function deleteall($tablename) 
      { 
         if ($this->db->delete($tablename)) 
		 { 
            return true; 
         } 
      }
	  
	   public function insert_images($data = array())
   {
	$insert = $this->db->insert_batch('home_gallery_img',$data);
	return $insert?true:false;
    
  }	
	  
	   public function count_all($tablename)
  {
      $this->load->database();
      $this->db->select('*');
      $this->db->from($tablename);
      $query=$this->db->get();
    return $query->result();
    
  }
  
  	public function get_tbl_data_col($tbl='',$wh=array(),$column){ 
        $this->db->select($column);
		$this->db->where($wh);
		//$this->db->order_by("id", "desc");
		$query = $this->db->get($tbl);
		
		return $query->result();
	
	}// get_tbl_data function end here!
	
		 public function update_where($tbl='',$wh=array(),$data)
  {
    $this->db->where($wh);
    $this->db->update($tbl,$data);
    return true;
  }	
  
  
  
		 public function delete_where($tbl='',$wh=array())
  {
    $this->db->where($wh);
    $this->db->delete($tbl);
    return true;
  }	
  
  
  
}

