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
	class Brand {
		private $db;
		private $format;
		public function __construct()
		{
			$this->db = new Database();	
			$this->format = new Format();	
		}

		public function InsertBrand($brandName)
		{
			$brandName = $this->format->validation($brandName);
			$brandName = mysqli_real_escape_string($this->db->link, $brandName);

			if ($brandName == "") {
				$msg = "<span class='error'>Brand Must Not Be Empty!!</span>";
				return$msg;
			}else{
				$query = "insert into tbl_brand(brandName) values('$brandName')";
				$result = $this->db->insert($query);
				if ($result) {
					$msg = "<span class='success'>Brand Inserted Successfully!!</span>";
					return$msg;
				} else {
					$msg = "<span class='error'>Brand Not Inserted!!</span>";
					return$msg;
				}
				
			}
		}

		public function getAllBrand()
		{
			$query = "select * from tbl_brand order by brandId desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function getBrandById($brandid)
		{
			$query = "select * from tbl_brand where brandId = '$brandid'";
			$result = $this->db->select($query);
			return $result;
		}
		public function UpdateBrand($brandName, $brandid)
		{
			$brandName = $this->format->validation($brandName);
			$brandName = mysqli_real_escape_string($this->db->link, $brandName);
			$brandId = mysqli_real_escape_string($this->db->link, $brandid);

			if ($brandName == "") {
				$msg = "<span class='error'>Brand Must Not Be Empty!!</span>";
				return$msg;
			}else{
				$query = "update tbl_brand set 
							brandName = '$brandName'
							where brandId = '$brandid'";
				$result = $this->db->update($query);
				if ($result) {
					$msg = "<span class='success'>Brand Updated Successfully!!</span>";
					return$msg;
				} else {
					$msg = "<span class='error'>Brand Not Updated!!</span>";
					return$msg;
				}
				
			}
		}

		public function deleteBrand($branddel)
		{
			$query = "delete from tbl_brand where brandId = '$branddel'";
				$result = $this->db->delete($query);
				if ($result) {
					$msg = "<span class='success'>Brand Deleted Successfully!!</span>";
					return$msg;
				} else {
					$msg = "<span class='error'>Brand Not Deleted!!</span>";
					return$msg;
				}
		}
	}
?>