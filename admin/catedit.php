<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include '$filepath./../../classes/Catagory.php';
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
    $editcatid = mysqli_real_escape_string($db->link, $_GET['editcat']);
    if (!isset($editcatid) || $editcatid == NULL) {
        echo "<script>window.location = 'catlist.php';</script>";
    } else {
        $catid = $editcatid;
    }
    
    $cat = new Catagory();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $catName = $_POST['catName'];
        $updateCat = $cat->UpdateCatagory($catName, $catid);
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Update Category</h2>
                <div class="block copyblock">
                <?php 
                    if (isset($updateCat)) {
                        echo $updateCat;
                    }
                ?>
                <?php 
                    $getcat = $cat->getCatById($catid);
                    if ($getcat) {
                        while ($value = $getcat->fetch_assoc()) {
                ?>
                
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="catName" value="<?php echo $value['catName']; ?>" class="medium" />
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