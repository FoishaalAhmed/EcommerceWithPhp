<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include_once '$filepath./../../config/config.php';
    include_once '$filepath./../../lib/Database.php';
    include_once '$filepath./../../helpers/Format.php';
?>
<?php 
    $db = new Database();
    $format = new Format();
 ?>
<?php 
	/**
	 * Brand class
	 */
	class Product {
		private $db;
		private $format;
		public function __construct()
		{
			$this->db = new Database();	
			$this->format = new Format();	
		}

		public function productInsert($data, $file)
		{
			$productName    = $this->format->validation($data['productName']);
			$catId          = $this->format->validation($data['catId']);
			$brandId        = $this->format->validation($data['brandId']);
			$productDetails = $this->format->validation($data['productDetails']);
			$productPrice   = $this->format->validation($data['productPrice']);
			$productType    = $this->format->validation($data['productType']);

			$productName    = mysqli_real_escape_string($this->db->link, $data['productName']);
			$catId          = mysqli_real_escape_string($this->db->link, $data['catId']);
			$brandId        = mysqli_real_escape_string($this->db->link, $data['brandId']);
			$productDetails = mysqli_real_escape_string($this->db->link, $data['productDetails']);
			$productPrice   = mysqli_real_escape_string($this->db->link, $data['productPrice']);
			$productType    = mysqli_real_escape_string($this->db->link, $data['productType']);

			$permited  = array('jpg', 'jpeg', 'png', 'gif');
	        $file_name = $file['productImage']['name'];
	        $file_size = $file['productImage']['size'];
	        $file_temp = $file['productImage']['tmp_name'];

	        $div = explode('.', $file_name);
	        $file_ext = strtolower(end($div));
	        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	        $uploaded_image = "upload/".$unique_image;

	        if($productName == "" || $catId == "" || $brandId == "" || $productDetails == "" || $productPrice == "" || $file_name == "" || $productType == ""){
	        	$msg = "<span class='error'>Field Must Not Be Empty!!</span>";
				return$msg;
	        } elseif ($file_size >1048567) {
	        	$msg = "<span class='error'>Image Size should be less then 1MB!!</span>";
				return$msg;
	        } elseif (in_array($file_ext, $permited) === false) {
	        	$msg = "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
				return$msg;
	        } else{
		        move_uploaded_file($file_temp, $uploaded_image);
		        $query = "INSERT INTO tbl_product(productName, catId, brandId, productDetails, productPrice, productImage, productType)  VALUES('$productName', '$catId', '$brandId', '$productDetails', '$productPrice', '$uploaded_image', '$productType')";
		        $inserted_rows = $this->db->insert($query);
		        if ($inserted_rows) {
		        	$msg = "<span class='success'>Product Inserted Successfully!!</span>";
					return$msg;
		        }else {
		        	$msg = "<span class='error'>Product Not Inserted !!</span>";
					return$msg;
		            }
	        }
		}

		public function getAllProduct()
		{
			$query = "select p.*, c.catName, b.brandName
				   		from tbl_product as p, tbl_catagory as c, tbl_brand as b
				   		where p.catId = c.catId and p.brandId = b.brandId
				   		order by p.productId";
			$result = $this->db->select($query);
			return $result;
		}

		public function getProductById($proid)
		{
			$query = "select * from tbl_product where  	productId = '$proid'";
			$result = $this->db->select($query);
			return $result;
		}
		public function productUpdate($data, $file,$proid)
		{
			$productName    = $this->format->validation($data['productName']);
			$catId          = $this->format->validation($data['catId']);
			$brandId        = $this->format->validation($data['brandId']);
			$productDetails = $this->format->validation($data['productDetails']);
			$productPrice   = $this->format->validation($data['productPrice']);
			$productType    = $this->format->validation($data['productType']);

			$productName    = mysqli_real_escape_string($this->db->link, $data['productName']);
			$catId          = mysqli_real_escape_string($this->db->link, $data['catId']);
			$brandId        = mysqli_real_escape_string($this->db->link, $data['brandId']);
			$productDetails = mysqli_real_escape_string($this->db->link, $data['productDetails']);
			$productPrice   = mysqli_real_escape_string($this->db->link, $data['productPrice']);
			$productType    = mysqli_real_escape_string($this->db->link, $data['productType']);

			$permited  = array('jpg', 'jpeg', 'png', 'gif');
	        $file_name = $file['productImage']['name'];
	        $file_size = $file['productImage']['size'];
	        $file_temp = $file['productImage']['tmp_name'];

	        $div = explode('.', $file_name);
	        $file_ext = strtolower(end($div));
	        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	        $uploaded_image = "upload/".$unique_image;

	        if($productName == "" || $catId == "" || $brandId == "" || $productDetails == "" || $productPrice == "" || $productType == ""){
	        	$msg = "<span class='error'>Field Must Not Be Empty!!</span>";
				return$msg;
	        }else{
	        	if (!empty($file_name)) {
			        if ($file_size >1048567) {
			        	$msg = "<span class='error'>Image Size should be less then 1MB!!</span>";
						return$msg;
			        } elseif (in_array($file_ext, $permited) === false) {
			        	$msg = "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
						return$msg;
			        } else{
				        move_uploaded_file($file_temp, $uploaded_image);;
				        $query = "update tbl_product set 
				        			productName = '$productName',
				        			catId = '$catId',
				        			brandId = '$brandId',
				        			productDetails = '$productDetails',
				        			productPrice = '$productPrice',
				        			productImage = '$uploaded_image',
				        			productType = '$productType'
				        			where productId = '$proid'";
				        $update_rows = $this->db->update($query);
				        if ($update_rows) {
				        	$msg = "<span class='success'>Product Updated Successfully!!</span>";
							return$msg;
				        }else {
				        	$msg = "<span class='error'>Product Not Updated !!</span>";
							return$msg;
				            }
			        }
			    } else{
			    	$query = "update tbl_product set 
				        			productName = '$productName',
				        			catId = '$catId',
				        			brandId = '$brandId',
				        			productDetails = '$productDetails',
				        			productPrice = '$productPrice',
				        			productType = '$productType'
				        			where productId = '$proid'";

				        $update_rows = $this->db->update($query);
				        if ($update_rows) {
				        	$msg = "<span class='success'>Product Updated Successfully!!</span>";
							return$msg;
				        }else {
				        	$msg = "<span class='error'>Product Not Updated !!</span>";
							return$msg;
				            }
			    }
		}
	}

		public function deleteProduct($productdel)
		{
			$query = "select * from tbl_product where productId = '$productdel'";
			$result = $this->db->select($query);
			if ($result) {
				while ($value = $result->fetch_assoc()) {
					$delimg = $value['productImage'];
					unlink($delimg);
				}
			}
			$delquery = "delete from tbl_product where productId = '$productdel'";
			$deldata = $this->db->delete($delquery);
			if ($deldata) {
				$msg = "<span class='success'>Product Deleted Successfully!!</span>";
				return$msg;
			} else {
				$msg = "<span class='error'>Product Not Deleted!!</span>";
				return$msg;
			}
		}

		public function getAllFeatureProduct()
		{
			$query = "select * from tbl_product where productType = '0' order by productId desc limit 4";
			$result = $this->db->select($query);
			return $result;
		}

		public function getAllGeneralProduct()
		{
			$query = "select * from tbl_product where productType = '1' order by productId desc limit 4";
			$result = $this->db->select($query);
			return $result;

		}

		public function getSingleProductDetails($productid)
		{
			$query = "select p.*, c.catName, b.brandName
				   		from tbl_product as p, tbl_catagory as c, tbl_brand as b
				   		where p.catId = c.catId and p.brandId = b.brandId and productid = '$productid'";
			$result = $this->db->select($query);
			return $result;
		}

		public function getIphoneProduct()
		{
			$query = "select * from tbl_product where brandId = '1' order by productId desc limit 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function getSamsungProduct()
		{
			$query = "select * from tbl_product where brandId = '2' order by productId desc limit 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function getAcerProduct()
		{
			$query = "select * from tbl_product where brandId = '3' order by productId desc limit 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function getCanonProduct()
		{
			$query = "select * from tbl_product where brandId = '4' order by productId desc limit 1";
			$result = $this->db->select($query);
			return $result;
		}

		public function IphoneProduct()
		{
			$query = "select * from tbl_product where brandId = '1' order by productId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function acerProduct()
		{
			$query = "select * from tbl_product where brandId = '3' order by productId desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function canonProduct()
		{
			$query = "select * from tbl_product where brandId = '4' order by productId desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function samsungProduct()
		{
			$query = "select * from tbl_product where brandId = '2' order by productId desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function getProductByCat($catId)
		{
			$query = "select * from tbl_product where catId = '$catId' order by productId desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function productById($proid)
		{
			$query = "select p.*, c.catName, b.brandName
				   		from tbl_product as p, tbl_catagory as c, tbl_brand as b
				   		where p.catId = c.catId and p.brandId = b.brandId and p.productId ='$proid'
				   		order by p.productId";
			$result = $this->db->select($query);
			return $result;
		}

		public function insertToCompaire($productId, $id)
		{
			$productId    = mysqli_real_escape_string($this->db->link, $productId);
			$id    = mysqli_real_escape_string($this->db->link, $id);
			$query = "select * from tbl_product where productId = '$productId'";
			$result = $this->db->select($query)->fetch_assoc();
			if ($result) {
					$productName     = $result['productName'];
					$productPrice    = $result['productPrice'] ;
					$productImage    = $result['productImage'];

					$checkCompaire = "select * from tbl_compaire where productId = '$productId'";
					$selected_rows = $this->db->select($checkCompaire);
					if ($selected_rows) {
						$msg = "<span class='error'>Product Already Added To Compaire!!</span>";
							return$msg;
					}else{
						$query = "insert into tbl_compaire(cusId, productId, productName, productPrice, productImage) values('$id', '$productId', '$productName', '$productPrice', '$productImage')";
						$inserted_rows = $this->db->insert($query);
						if ($inserted_rows) {
					        	$msg = "<span class='success'>Product Added To Compaire!!</span>";
								return$msg;
					        }else {
					        	$msg = "<span class='error'>Product Not Added !!</span>";
								return$msg;
					            }
				    }
				}
		}

		public function getCompaireProduct($id)
		{
			$query = "select * from tbl_compaire where cusId = '$id' order by productId desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function checkCompaire($id)
		{
			$query = "select * from tbl_compaire where cusId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function deleteCompaireLogout($id)
		{
			$sId = session_id();
			$query = "delete from tbl_compaire where cusId = '$id'";
			$result = $this->db->delete($query);
		}

		public function insertToWishlist($productId, $id)
		{
			$productId = mysqli_real_escape_string($this->db->link, $productId);
			$id    	   = mysqli_real_escape_string($this->db->link, $id);

			$query     = "select * from tbl_product where productId = '$productId'";
			$result    = $this->db->select($query)->fetch_assoc();
			if ($result) {
					$productName     = $result['productName'];
					$productPrice    = $result['productPrice'] ;
					$productImage    = $result['productImage'];

					$checkWishlist = "select * from tbl_wishlist where productId = '$productId'";
					$selected_rows = $this->db->select($checkWishlist);
					if ($selected_rows) {
						$msg = "<span class='error'>Product Already Added To Wishlist!!</span>";
							return$msg;
					}else{
						$query = "insert into tbl_wishlist(cusId, productId, productName, productPrice, productImage) values('$id', '$productId', '$productName', '$productPrice', '$productImage')";
						$inserted_rows = $this->db->insert($query);
						if ($inserted_rows) {
					        	$msg = "<span class='success'>Product Added To Wishlist!!</span>";
								return$msg;
					        }else {
					        	$msg = "<span class='error'>Product Not Added !!</span>";
								return$msg;
					            }
				    }
				}
		}

		public function getWishlistProduct($id)
		{
			$query = "select * from tbl_wishlist where cusId = '$id' order by productId desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function checkWishlist($id)
		{
			$query = "select * from tbl_wishlist where cusId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function delwishlistProduct($proId, $id)
		{
			$query = "delete from tbl_wishlist where productId = '$proId' and cusId = '$id'";
			$deleted_rows = $this->db->delete($query);
			if ($deleted_rows) {
		        	$msg = "<span class='success'>Wishlist Product Deleted!!</span>";
					return$msg;
		        }else {
		        	$msg = "<span class='error'>Product Not Deleted !!</span>";
					return$msg;
		            }
		}

		public function getSearchedProduct($search)
		{
			$query = "SELECT * FROM tbl_product WHERE productName LIKE '%$search%' OR productDetails LIKE '%$search%'";
			$result = $this->db->select($query);
			return $result;
		}

}
?>