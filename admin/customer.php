<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include '$filepath./../../classes/Customer.php';
    $cus 	 = new Customer();
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
    $id = mysqli_real_escape_string($db->link, $_GET['cusid']);
    if (!isset($id) || $id == NULL) {
        echo "<script>window.location = 'order.php';</script>";
    } else {
        $Cid = $id;
    }
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<script>window.location = 'order.php';</script>";
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer Details</h2>
                <div class="block copyblock">
                <?php 
                    if (isset($updateCat)) {
                        echo $updateCat;
                    }
                ?>
                <?php 
                    $getCustomer = $cus->getCustomerDataById($Cid);
                    if ($getCustomer) {
                        while ($value = $getCustomer->fetch_assoc()) {
                ?>
                
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" readonly="" value="<?php echo $value['cusName']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" readonly="" value="<?php echo $value['cusCity']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" readonly=""  value="<?php echo $value['cusZipCode']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" readonly=""  value="<?php echo $value['cusEmail']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" readonly=""  value="<?php echo $value['cusAddress']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" readonly=""  value="<?php echo $value['cusCountry']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" readonly=""  value="<?php echo $value['cusPhone']; ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                    <?php } } ?>
                </div>
                
            </div>
        </div>
<?php include 'inc/footer.php';?>