<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include '$filepath./../../classes/Other.php';
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
    $other = new Other();
?>
<?php
    $id = Session::get("adminId");
    $level = Session::get("adminLevel"); 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $userUpdate = $other->updateUser($_POST, $_FILES, $id, $level);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>User Profile</h2>
        <div class="block">
        <?php 
            if (isset($userUpdate)) {
                echo $userUpdate;
            }
        ?> 

        <?php 
            $userDetails = $other->getUserDetails($id, $level);
            if ($userDetails) {
                while ($result = $userDetails->fetch_assoc()) {
        ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="adminName" value="<?php echo $result['adminName']; ?>" class="medium" />
                    </td>
                </tr>
				
				 <tr>
                    <td>
                        <label>username</label>
                    </td>
                    <td>
                        <input type="text"  name="adminUserName" value="<?php echo $result['adminUserName']; ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Email</label>
                    </td>
                    <td>
                        <input type="text"  name="adminEmail" value="<?php echo $result['adminEmail']; ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $result['adminImage'] ?>" height="80px" width="150px"><br>
                        <input type="file" name="adminImage" />
                    </td>
                </tr>

				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
            <?php } } ?>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php';?>


