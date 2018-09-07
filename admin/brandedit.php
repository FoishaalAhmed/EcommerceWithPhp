<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include '$filepath./../../classes/Brand.php';
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
    $editbrandid = mysqli_real_escape_string($db->link, $_GET['editbrand']);
    if (!isset($editbrandid) || $editbrandid == NULL) {
        echo "<script>window.location = 'brandlist.php';</script>";
    } else {
        $brandid = $editbrandid;
    }
    
    $brand = new Brand();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $brandName = $_POST['brandName'];
        $updateBrand = $brand->UpdateBrand($brandName, $brandid);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Brand</h2>
                <div class="block copyblock">
                <?php 
                    if (isset($updateBrand)) {
                        echo $updateBrand;
                    }
                ?>
                <?php 
                    $getbrand = $brand->getBrandById($brandid);
                    if ($getbrand) {
                        while ($value = $getbrand->fetch_assoc()) {
                ?>
                
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="brandName" value="<?php echo $value['brandName']; ?>" class="medium" />
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