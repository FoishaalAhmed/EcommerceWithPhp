<?php include'inc/header.php'; ?>
<?php include'inc/sidebar.php'; ?>
<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include '$filepath./../../classes/Customer.php';
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
    $cus = new Customer();
?>
<?php 
    $id = Session::get("adminId");
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $changepass = $cus->changePassword($_POST, $id);
    }
    
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Change Password</h2>
        <?php
        if (isset($changepass)) {
       echo $changepass;
    }?>
        <div class="block">               
         <form action="" method="post">
            <table class="form">					
                <tr>
                    <td>
                        <label>Old Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter Old Password..."  name="oldpassword" class="medium" />
                    </td>
                </tr>
				 <tr>
                    <td>
                        <label>New Password</label>
                    </td>
                    <td>
                        <input type="password" placeholder="Enter New Password..." name="newpass" class="medium" />
                    </td>
                </tr>
				 
				
				 <tr>
                    <td>
                    </td>
                    <td>
                        <input type="submit" name="submit" Value="Update" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>