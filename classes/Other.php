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
	 * Other class
	 */
	class Other {
		private $db;
		private $format;
		public function __construct()
		{
			$this->db = new Database();	
			$this->format = new Format();	
		}

		public function titleUpdate($data)
		{
            $title  = $this->format->validation($data['title']);
            $slogan = $this->format->validation($data['slogan']);
            $title  = mysqli_real_escape_string($this->db->link, $title);
            $slogan = mysqli_real_escape_string($this->db->link, $slogan);

            $permited  = array('png');
            $file_name = $_FILES['logo']['name'];
            $file_size = $_FILES['logo']['size'];
            $file_temp = $_FILES['logo']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $same_image = "logo".'.'.$file_ext;
            $uploaded_image = "upload/".$same_image;

            if($title == "" || $slogan == ""){
                echo "<span class='error'>Field must not be empty!!</span>";
            }else{ 
                if (!empty($file_name)) {
                    if ($file_size >1048567) {
                 echo "<span class='error'>Image Size should be less then 1MB!</span>";
                } elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                } else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "update tbl_titleslogan set 
                           title  = '$title', 
                           slogan  = '$slogan', 
                           logo   = '$uploaded_image'
                           where id = '1'";
                $update_row = $this->db->update($query);
                if ($update_row) {
                 echo "<span class='success'>Title Updated Successfully.</span>";
                }else {
                 echo "<span class='error'>Title Not Updated!</span>";
                    }
                }

                } else {
                    $query = "update tbl_titleslogan set
                           title  = '$title', 
                           slogan  = '$slogan'
                           where id = '1'";
                $update_row = $this->db->update($query);
                if ($update_row) {
                 echo "<span class='success'>Title Updated Successfully.</span>";
                }else {
                 echo "<span class='error'>Title Not Updated!</span>";
                    }
                }
                
             }
    }

    public function selectTitleSlogan()
    {    
    	$query = "select * from tbl_titleslogan where id = '1' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function socialUpdate($data)
    {
        $fb  = $this->format->validation($data['fb']);
        $twtr = $this->format->validation($data['twtr']);
        $gplus = $this->format->validation($data['gplus']);
        $email = $this->format->validation($data['email']);

        $fb  = mysqli_real_escape_string($this->db->link, $fb);
        $twtr  = mysqli_real_escape_string($this->db->link, $twtr);
        $gplus  = mysqli_real_escape_string($this->db->link, $gplus);
        $email  = mysqli_real_escape_string($this->db->link, $email);

        if($fb == "" || $twtr == "" || $email == "" || $gplus == ""){
            echo "<span class='error'>Field must not be empty!!</span>";
        } else{
            $query = "update tbl_social set 
                       fb  	 = '$fb', 
                       twtr  = '$twtr',                       
                       gplus = '$gplus',
                       email = '$email'
                       where id = '1'";
            $update_row = $this->db->update($query);
            if ($update_row) {
             echo "<span class='success'>Social Updated Successfully.</span>";
            }else {
             echo "<span class='error'>Social Not Updated !</span>";
                }
            }
    }

    public function selectSocial()
    {
    	 
        $query = "select * from tbl_social where id = '1' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function insertSliderImage($data)
    {
        $link  = mysqli_real_escape_string($this->db->link, $data['link']);
        
        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/slider/".$unique_image;

        if($link == "" || $file_name == ""){
            $msg = "<span class='error'>Field must not be empty!!</span>";
            return $msg;
        } elseif ($file_size >1048567) {
         $msg = "<span class='error'>Image Size should be less then 1MB!</span>";
         return $msg;
        } elseif (in_array($file_ext, $permited) === false) {
         $msg = "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
         return $msg;
        } else{
        move_uploaded_file($file_temp, $uploaded_image);
        $query = "INSERT INTO tbl_slider(link, image)  VALUES('$link', '$uploaded_image')";
        $inserted_rows = $this->db->insert($query);
        if ($inserted_rows) {
         $msg = "<span class='success'>slider Image Inserted Successfully.</span>";
         return $msg;
        }else {
         $msg = "<span class='error'>slider Image Not Inserted !</span>";
         return $msg;
            }
        }
    }

    public function selectSliderImage()
    {
    	$query = "select * from tbl_slider order by id desc ";
		$result = $this->db->select($query);
		return $result;
    }

    public function sliderImage()
    {
        $query = "select * from tbl_slider limit 4 ";
        $result = $this->db->select($query);
        return $result;
    }

    public function editSliderImage($data, $sliderid)
    {
        $link    = mysqli_real_escape_string($this->db->link, $data['link']);
        $sliderid  = mysqli_real_escape_string($this->db->link, $sliderid);

        $permited  = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "upload/".$unique_image;

        if($link == ""){
            $msg = "<span class='error'>Field must not be empty!!</span>";
            return $msg;
        }else{ 
            if (!empty($file_name)) {
                    if ($file_size >1048567) {
                         $msg = "<span class='error'>Image Size should be less then 1MB!</span>";
                         return $msg;
                } elseif (in_array($file_ext, $permited) === false) {
                    $msg = "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                    return $msg;
                } else{
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "update tbl_slider set
                               link    = '$link', 
                               image  = '$uploaded_image'
                               where id = $sliderid";
                    $update_row = $this->db->update($query);
                    if ($update_row) {
                        $msg = "<span class='success'>slider Image Updated Successfully.</span>";
                        return $msg;
                    }else {
                        $msg = "<span class='error'>slider Image Not Updated.</span>";
                        return $msg;
                        }
            }

            } else {
                $query = "update tbl_slider set
                       link    = '$link'
                       where id = $sliderid";
            $update_row = $this->db->update($query);
            if ($update_row) {
             $msg = "<span class='success'>slider Image Updated Successfully.</span>";
                return $msg;
            }else {
             $msg = "<span class='error'>slider Image Not Updated.</span>";
                return $msg;
                }
            }
            
         }
    }

    public function selectSliderImageById($sliderid)
    {
        $query = "select * from tbl_slider where id = '$sliderid' order by id desc";
        $slider = $this->db->select($query);
        return $slider;
    }

    public function deleteSliderImage($sliderid)
    {
        $query = "select * from tbl_slider where id = '$sliderid'";
        $deletimg = $this->db->select($query);
        if ($deletimg) {
            while ($result = $deletimg->fetch_assoc()) {
                $delimg = $result['image'];
                unlink($delimg);
            }
        }

        $delquery = "delete from tbl_slider where id = '$sliderid'";
        $delslider = $this->db->delete($delquery);
        if ($delslider) {
            echo "<script>alert('Data Deleted Successfully.');</script>";
            echo "<script>window.location = 'sliderlist.php'; </script>";
        }else{
            echo "<script>alert('Data Not Deleted.');</script>";
            echo "<script>window.location = 'sliderlist.php'; </script>";
        }
    }

    public function updateCopyright($data)
    {
            $text  = $this->format->validation($data['text']);
            $text  = mysqli_real_escape_string($this->db->link, $text);

            if($text == ""){
               $msg = "<span class='error'>Filed must not be empty.</span>";
                return $msg;
            } else{
                $query = "update tbl_copyright set 
                           text  = '$text'
                           where id = '1'";
                $update_row = $this->db->update($query);
                if ($update_row) {
                 $msg = "<span class='success'>Copyright Updated Successfully.</span>";
                return $msg;
                }else {
                    $msg = "<span class='error'>Copyright Not Updated !</span>";
                return $msg;
            }
        }
    }

    public function selectCopyright()
    {         
        $query = "select * from tbl_copyright";
        $result = $this->db->select($query);
        return $result;
    }

    public function getMessage()
    {
        $query = "select * from tbl_contact where status = '0' order by date desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function seenMessage($id)
    {
        $query = "update tbl_contact set status = '1' where id = '$id'";
        $update_row = $this->db->update($query);
        if ($update_row) {
            $msg = "<span class='success'>Email Send to Seen Box!!</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Something Went Wrong!!</span>";
            return $msg;
        }
        
    }

    public function getSeenMessage()
    {
        $query = "select * from tbl_contact where status = '1' order by date desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function viewMessage($id)
    {
        $query = "select * from tbl_contact where id = '$id' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function unseenMessage($id)
    {
        $query = "update tbl_contact set status = '0' where id = '$id'";
        $update_row = $this->db->update($query);
        if ($update_row) {
            $msg = "<span class='success'>Email Send to Inbox!!</span>";
            return $msg;
        } else {
            $msg = "<span class='error'>Something Went Wrong!!</span>";
            return $msg;
        }
    }

    public function deleteMessage($id)
    {
        $query = "delete from tbl_contact where id = '$id'";
        $delete_contact = $this->db->delete($query);
        if ($delete_contact) {
            $msg = "<span class='success'>Email Deleted Successfully!!</span>";
            return $msg;
        }else{
            $msg = "<span class='error'>Email Not Deleted!!</span>";
            return $msg;
        }
    }

    public function getUserDetails($id, $level)
    {
        $query = "select * from tbl_admin where adminId = '$id' and lavel = '$level' ";
        $result = $this->db->select($query);
        return $result;
    }

    public function updateUser($data, $file, $id, $level)
    {
            $adminName     = $this->format->validation($data['adminName']);
            $adminUserName = $this->format->validation($data['adminUserName']);
            $adminEmail    = $this->format->validation($data['adminEmail']);

            $adminName     = mysqli_real_escape_string($this->db->link, $data['adminName']);
            $adminUserName = mysqli_real_escape_string($this->db->link, $data['adminUserName']);
            $adminEmail    = mysqli_real_escape_string($this->db->link, $data['adminEmail']);

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $file['adminImage']['name'];
            $file_size = $file['adminImage']['size'];
            $file_temp = $file['adminImage']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;

            if($adminName == "" || $adminUserName == "" || $adminEmail == ""){
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
                        $query = "update tbl_admin set 
                                    adminName = '$adminName',
                                    adminUserName = '$adminUserName',
                                    adminEmail = '$adminEmail',
                                    adminImage = '$uploaded_image'
                                    where adminId = '$id' and
                                    lavel = '$level'";
                        $update_rows = $this->db->update($query);
                        if ($update_rows) {
                            $msg = "<span class='success'>User Updated Successfully!!</span>";
                            return$msg;
                        }else {
                            $msg = "<span class='error'>User Not Updated !!</span>";
                            return$msg;
                            }
                    }
                } else{
                    $query = "update tbl_admin set 
                                    adminName = '$adminName',
                                    adminUserName = '$adminUserName',
                                    adminEmail = '$adminEmail'
                                    where adminId = '$id' and
                                    lavel = '$level'";

                        $update_rows = $this->db->update($query);
                        if ($update_rows) {
                            $msg = "<span class='success'>User Updated Successfully!!</span>";
                            return$msg;
                        }else {
                            $msg = "<span class='error'>User Not Updated !!</span>";
                            return$msg;
                            }
                }
        }
    }

}
