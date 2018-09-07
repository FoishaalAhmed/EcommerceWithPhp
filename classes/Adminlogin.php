<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include '$filepath./../../lib/Session.php';
    Session::checkLogin();
?>
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
	 * Adminlogin class
	 */
	class Adminlogin {
		private $db;
		private $format;
		public function __construct()
		{
			$this->db = new Database();	
			$this->format = new Format();	
		}

		public function AdminLogin($adminUserName, $adminPassword)
		{
			$adminUserName = $this->format->validation($adminUserName);
			$adminPassword = $this->format->validation($adminPassword);

			$adminUserName = mysqli_real_escape_string($this->db->link, $adminUserName);
			$adminPassword = mysqli_real_escape_string($this->db->link, $adminPassword);

			if ($adminUserName == "" || $adminPassword == "") {
				$logmsg = "Username and Password Must Not Be Empty";
				return$logmsg;
			} else {
				$query = "select * from tbl_admin where adminUserName = '$adminUserName' and adminPassword = '$adminPassword'";
				$result = $this->db->select($query);

				if ($result != false) {
					$value = $result->fetch_assoc();
					Session::set("AdminLogin", true);
					Session::set("adminId", $value['adminId']);
					Session::set("adminName", $value['adminName']);
					Session::set("adminUserName", $value['adminUserName']);
					Session::set("image", $value['adminImage ']);
					Session::set("adminLevel", $value['lavel ']);
					header("Location: index.php");
				} else {
					$logmsg = "Username and Password Does Not matched!!";
					return$logmsg;
				}
				
			}
			
		}

		
	}

?>