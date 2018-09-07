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
	 * Cart class
	 */
	class Cart {
		private $db;
		private $format;
		public function __construct()
		{
			$this->db = new Database();	
			$this->format = new Format();	
		}

		public function addToCart($quantity, $productid)
		{
			$quantity = $this->format->validation($quantity);
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$productId = mysqli_real_escape_string($this->db->link, $productid);
			$sId = session_id();

			$selectQuery = "select * from tbl_product where productId = '$productId'";
			$result = $this->db->select($selectQuery)->fetch_assoc();
			$productName = $result['productName'];
			$productPrice = $result['productPrice'];
			$productImage = $result['productImage'];

			$checkQuery = "select * from tbl_cart where productId = '$productId' and sId = '$sId'";
			$getProduct = $this->db->select($checkQuery);
			if ($getProduct) {
				$msg = "Product Already Added";
				return $msg;
			} else {
				$query = "insert into tbl_cart(sId, productId, productName, productPrice, productQuantity, productImage) values('$sId', '$productId', '$productName', '$productPrice', '$quantity', '$productImage')";
			$result = $this->db->insert($query);
			if ($result) {
					header("Location:cart.php");
				} else {
					header("Location:404.php");
				}
			}		
		}


		public function getCartProduct()
		{
			$sId = session_id();
			$query = "select * from tbl_cart where sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function checkCartTable()
		{
			$sId = session_id();
			$query = "select * from tbl_cart where sId = '$sId'";
			$result = $this->db->select($query);
			return $result;
		}
		public function updateCartQuantity($quantity, $cartId)
		{
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$cartId = mysqli_real_escape_string($this->db->link, $cartId);

			$query = "update tbl_cart set 
						productQuantity = '$quantity'
						where cartId = '$cartId'";
			$result = $this->db->update($query);
				
			}

		public function deleteProductByCart($cartid)
		{
			$cartid = mysqli_real_escape_string($this->db->link, $cartid);
			$query = "delete from tbl_cart where cartId = '$cartid'";
			$result = $this->db->delete($query);
				if ($result) {
					$msg = "<span class='success'>Product Deleted Successfully!!</span>";
					return$msg;
				} else {
					$msg = "<span class='error'>Product Not Deleted!!</span>";
					return$msg;
				}
		}

		public function deleteCartLogout()
		{
			$sId = session_id();
			$query = "delete from tbl_cart where sId = '$sId'";
			$result = $this->db->delete($query);
		}
	}
?>