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
	 * Addcatagory class
	 */
	class Catagory {
		private $db;
		private $format;
		public function __construct()
		{
			$this->db = new Database();	
			$this->format = new Format();	
		}

		public function InsertCatagory($catName)
		{
			$catName = $this->format->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);

			if ($catName == "") {
				$msg = "<span class='error'>Category Must Not Be Empty!!</span>";
				return$msg;
			}else{
				$query = "insert into tbl_catagory(catName) values('$catName')";
				$result = $this->db->insert($query);
				if ($result) {
					$msg = "<span class='success'>Category Inserted Successfully!!</span>";
					return$msg;
				} else {
					$msg = "<span class='error'>Category Not Inserted!!</span>";
					return$msg;
				}
				
			}
		}

		public function getAllCatagory()
		{
			$query = "select * from tbl_catagory order by catId desc";
			$result = $this->db->select($query);
			return $result;
		}

		public function getCatById($catid)
		{
			$query = "select * from tbl_catagory where catId = '$catid'";
			$result = $this->db->select($query);
			return $result;
		}
		public function UpdateCatagory($catName, $catid)
		{
			$catName = $this->format->validation($catName);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$catid = mysqli_real_escape_string($this->db->link, $catid);

			if ($catName == "") {
				$msg = "<span class='error'>Category Must Not Be Empty!!</span>";
				return$msg;
			}else{
				$query = "update tbl_catagory set 
							catName = '$catName'
							where catId = '$catid'";
				$result = $this->db->update($query);
				if ($result) {
					$msg = "<span class='success'>Category Updated Successfully!!</span>";
					return$msg;
				} else {
					$msg = "<span class='error'>Category Not Updated!!</span>";
					return$msg;
				}
				
			}
		}

		public function deleteCatagory($delcat)
		{
			$query = "delete from tbl_catagory where catId = '$delcat'";
				$result = $this->db->delete($query);
				if ($result) {
					$msg = "<span class='success'>Category Deleted Successfully!!</span>";
					return$msg;
				} else {
					$msg = "<span class='error'>Category Not Deleted!!</span>";
					return$msg;
				}
		}
	}
?>