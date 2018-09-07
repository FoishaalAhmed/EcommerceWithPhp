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
	 * Order class
	 */
	class Order {
		private $db;
		private $format;
		public function __construct()
		{
			$this->db = new Database();	
			$this->format = new Format();	
		}

		public function insertOrder($cusid)
		{
			$sId = session_id();
			$query = "select * from tbl_cart where sId = '$sId'";
			$getcart = $this->db->select($query);
			if ($getcart) {
				while ($result = $getcart->fetch_assoc()) {
					$productId       = $result['productId'];
					$productName     = $result['productName'];
					$productQuantity = $result['productQuantity'];
					$productPrice    = $result['productPrice'] * $productQuantity;
					$productImage    = $result['productImage'];

					$query = "insert into tbl_order(cusId, productId, productName, productPrice, productQuantity, productImage) values('$cusid', '$productId', '$productName', '$productPrice', '$productQuantity', '$productImage')";
					$result = $this->db->insert($query);
				}
			}
		}

		public function payableAmount($cusid)
		{
			$query = "select productPrice from tbl_order where cusId = '$cusid' and date = now()";
			$result = $this->db->select($query);
			return $result;
		}

		public function getOrderProduct($cusid)
		{
			$query = "select * from tbl_order where cusId = '$cusid' order by date desc";
			$result = $this->db->select($query);
			return $result;
		}
		public function checkOrder($id)
		{
			$query = "select * from tbl_order where cusId = '$id'";
			$result = $this->db->select($query);
			return $result;
		}

		public function allOrderProduct()
		{
			$query = "select * from tbl_order order by date desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function productShifted($cusid, $productId)
		{	
			$cusid = mysqli_real_escape_string($this->db->link, $cusid);
			$productId = mysqli_real_escape_string($this->db->link, $productId);

			$query = "update tbl_order set 
						status = '1'
						where cusId = '$cusid' and 
						productId ='$productId'";
			$update_row = $this->db->update($query);
			if ($update_row) {
				$msg = "<span class='success'>Shifted!!</span>";
				return $msg;
			} else {
				$msg = "<span class='error'>Not Shifted!!</span>";
				return $msg;
			}
			
		}

		public function productShiftedconfirm($cusid, $productId)
		{
			$cusid = mysqli_real_escape_string($this->db->link, $cusid);
			$productId = mysqli_real_escape_string($this->db->link, $productId);

			$query = "update tbl_order set 
						status = '2'
						where cusId = '$cusid' and 
						productId ='$productId'";
			$update_row = $this->db->update($query);
			if ($update_row) {
				$msg = "<span class='success'>Shifted!!</span>";
				return $msg;
			} else {
				$msg = "<span class='error'>Not Shifted!!</span>";
				return $msg;
			}
		}

		public function shiftedProductDeleted($cusid, $productId)
		{
			$cusid = mysqli_real_escape_string($this->db->link, $cusid);
			$productId = mysqli_real_escape_string($this->db->link, $productId);
			$query = "delete from tbl_order where cusId = '$cusid' and productId = '$productId'";
			$result = $this->db->delete($query);
				if ($result) {
					$msg = "<span class='success'>Shifted Product Deleted Successfully!!</span>";
					return$msg;
				} else {
					$msg = "<span class='error'>Shifted Product Not Deleted!!</span>";
					return$msg;
				}
		}
	}
?>