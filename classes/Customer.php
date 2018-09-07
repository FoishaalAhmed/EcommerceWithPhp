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
	 * Customer class
	 */
	class Customer {
		private $db;
		private $format;
		public function __construct()
		{
			$this->db = new Database();	
			$this->format = new Format();	
		}

		public function customerRegistration($data)
		{
			$cusName     = $this->format->validation($data['cusName']);
			$cusCity     = $this->format->validation($data['cusCity']);
			$cusZipCode  = $this->format->validation($data['cusZipCode']);
			$cusEmail    = $this->format->validation($data['cusEmail']);
			$cusAddress  = $this->format->validation($data['cusAddress']);
			$cusCountry  = $this->format->validation($data['cusCountry']);
			$cusPhone    = $this->format->validation($data['cusPhone']);
			$cusPassword = $this->format->validation($data['cusPassword']);

			$cusName     = mysqli_real_escape_string($this->db->link, $data['cusName']);
			$cusCity     = mysqli_real_escape_string($this->db->link, $data['cusCity']);
			$cusZipCode  = mysqli_real_escape_string($this->db->link, $data['cusZipCode']);
			$cusEmail    = mysqli_real_escape_string($this->db->link, $data['cusEmail']);
			$cusAddress  = mysqli_real_escape_string($this->db->link, $data['cusAddress']);
			$cusCountry  = mysqli_real_escape_string($this->db->link, $data['cusCountry']);
			$cusPhone    = mysqli_real_escape_string($this->db->link, $data['cusPhone']);
			$cusPassword = mysqli_real_escape_string($this->db->link, md5($data['cusPassword']));

	        if($cusName == "" || $cusCity == "" || $cusZipCode == "" || $cusEmail == "" || $cusAddress == "" || $cusCountry == "" || $cusPhone == "" || $cusPassword == ""){
	        	$msg = "<span class='error'>Field Must Not Be Empty!!</span>";
				return$msg;
	        } else{
	        	$mailQuery = "select * from tbl_customer where cusEmail = '$cusEmail' limit 1";
	        	$mailCheck = $this->db->select($mailQuery);
	        	if ($mailCheck != false) {
	        		$msg = "<span class='error'>E-mail Already Exist!!</span>";
						return$msg;
	        	} else {
		        		$query = "INSERT INTO tbl_customer(cusName, cusCity, cusZipCode, cusEmail, cusAddress, cusCountry, cusPhone, cusPassword)  VALUES('$cusName', '$cusCity', '$cusZipCode', '$cusEmail', '$cusAddress', '$cusCountry', '$cusPhone', '$cusPassword')";
			        $inserted_rows = $this->db->insert($query);
			        if ($inserted_rows) {
			        	$msg = "<span class='success'>Customer Registration Successfully!!</span>";
						return$msg;
			        }else {
			        	$msg = "<span class='error'>Customer Registration Failed!!</span>";
						return$msg;
			            }
	        	}	
	        }
		}

		public function customerLogin($data)
		{
			$cusEmail    = $this->format->validation($data['cusEmail']);
			$cusPassword = $this->format->validation($data['cusPassword']);

			$cusEmail    = mysqli_real_escape_string($this->db->link, $data['cusEmail']);
			$cusPassword = mysqli_real_escape_string($this->db->link, md5($data['cusPassword']));

			if($cusEmail == "" || $cusPassword == ""){
	        	$msg = "<span class='error'>Field Must Not Be Empty!!</span>";
				return$msg;
	        }else{
	        	$query = "select * from tbl_customer where cusEmail = '$cusEmail' and cusPassword = '$cusPassword'";
	        	$value = $this->db->select($query);
	        	if ($value != false) {
	        		$result = $value->fetch_assoc();
	        		Session::set("cuslogin", true);
	        		Session::set("cusid", $result['cusId']);
	        		Session::set("cusname", $result['cusName']);
	        		header("Location: order.php");
	        	}
	        }
			
		}

		public function getCustomerDataById($id)
		{
			$query = "select * from tbl_customer where cusId = '$id'";
	        $value = $this->db->select($query);
	        return $value;
		}

		public function customerUpdate($data, $id)
		{
			$cusName     = $this->format->validation($data['cusName']);
			$cusCity     = $this->format->validation($data['cusCity']);
			$cusZipCode  = $this->format->validation($data['cusZipCode']);
			$cusEmail    = $this->format->validation($data['cusEmail']);
			$cusAddress  = $this->format->validation($data['cusAddress']);
			$cusCountry  = $this->format->validation($data['cusCountry']);
			$cusPhone    = $this->format->validation($data['cusPhone']);

			$cusName     = mysqli_real_escape_string($this->db->link, $data['cusName']);
			$cusCity     = mysqli_real_escape_string($this->db->link, $data['cusCity']);
			$cusZipCode  = mysqli_real_escape_string($this->db->link, $data['cusZipCode']);
			$cusEmail    = mysqli_real_escape_string($this->db->link, $data['cusEmail']);
			$cusAddress  = mysqli_real_escape_string($this->db->link, $data['cusAddress']);
			$cusCountry  = mysqli_real_escape_string($this->db->link, $data['cusCountry']);
			$cusPhone    = mysqli_real_escape_string($this->db->link, $data['cusPhone']);

	        if($cusName == "" || $cusCity == "" || $cusZipCode == "" || $cusEmail == "" || $cusAddress == "" || $cusCountry == "" || $cusPhone == ""){
	        	$msg = "<span class='error'>Field Must Not Be Empty!!</span>";
				return$msg;
	        } else{
	        		$query = "update tbl_customer set
	        					cusName = '$cusName',
	        					cusCity = '$cusCity',
	        					cusZipCode = '$cusZipCode',
	        					cusEmail = '$cusEmail',
	        					cusAddress = '$cusAddress',
	        					cusCountry = '$cusCountry',
	        					cusPhone = '$cusPhone'
	        					where cusId = '$id'";
			        $updated_rows = $this->db->update($query);
			        if ($updated_rows) {
			        	$msg = "<span class='success'>Customer Profile Updated Successfully!!</span>";
						return$msg;
			        }else {
			        	$msg = "<span class='error'>Customer Profile Updated Failed!!</span>";
						return$msg;
			            }
	        	}	
	        }

	        public function contactInsert($data)
	        {
	        	$name    = $this->format->validation($data['name']);
				$email   = $this->format->validation($data['email']);
				$phone   = $this->format->validation($data['phone']);
				$message = $this->format->validation($data['message']);

				$name    = mysqli_real_escape_string($this->db->link, $name);
				$email   = mysqli_real_escape_string($this->db->link, $email);
				$phone   = mysqli_real_escape_string($this->db->link, $phone);
				$message = mysqli_real_escape_string($this->db->link, $message);

				if($name == "" || $email == "" || $phone == "" || $message == ""){
		            $msg = "<span class='error'>Field must not be empty!!</span>";
		            return $msg;
		        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		        	 $msg = "<span class='error'>Email Address not Valid!!</span>";
		        	 return $msg;
		        }else{
		        	$query = "INSERT INTO tbl_contact(name, email, phone, message)  VALUES('$name', '$email', '$phone', '$message')";
			        $inserted_rows = $this->db->insert($query);
			        if ($inserted_rows) {
			        $msg = "<span class='success'>Email Send Successfully!!</span>";
			        return $msg;
			        }else {
			        $msg = "<span class='error'>Email not Send!!</span>";
			        return $msg;
			            }
					}
		        }

		        public function changePassword($data, $id)
				{
					$oldpassword  = mysqli_real_escape_string($this->db->link, $_POST['oldpassword']);
		            $newpass  = mysqli_real_escape_string($this->db->link, $_POST['newpass']);
		            $id  = mysqli_real_escape_string($this->db->link, $id);

		                if($oldpassword == "" || $newpass == ""){
		                    $msg = "<span class='error'>Field must not be empty!!</span>";
		                    return $msg;
		                } else{
		                    $oldpassword = md5($oldpassword);
		                    $newpass     = md5($newpass);
		                    $query = "select adminPassword from tbl_admin where adminId = '$id' and  adminPassword = '$oldpassword'";
		                    $passcheck = $this->db->select($query);
		                    if ($passcheck == true) {
		                        $query = "update tbl_admin set 
		                                adminPassword = '$newpass'
		                                where adminId = '$id'
		                                ";
		                        $Update_pass = $this->db->update($query);
		                        if ($Update_pass) {
		                         $msg = "<span class='success'>Password Updated Successfully.</span>";
		                         return $msg;
		                        }
		                    } else{
		                        $msg = "<span class='error'>Old Password Does Not Matched.</span>";
		                        return $msg;
		                    }
		                }
				}


	}
?>