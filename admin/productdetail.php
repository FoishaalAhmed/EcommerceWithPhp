<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include '$filepath./../../classes/Brand.php';
    include '$filepath./../../classes/Catagory.php';
    include '$filepath./../../classes/Product.php';
?>
<?php 
    $id = mysqli_real_escape_string($db->link, $_GET['proid']);
    if (!isset($id) || $id == NULL) {
        echo "<script>window.location = 'order.php';</script>";
    } else {
        $proid = $id;
    }
    $product = new Product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "<script>window.location = 'order.php';</script>";
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Product</h2>
        <div class="block"> 
        <?php 
            $getproduct = $product->productById($proid);
            if ($getproduct) {
                while ($result = $getproduct->fetch_assoc()) {
        ?>              
         <form action="" method="post" enctype="multipart/form-data">
            <table class="form">
               
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" readonly=""  value="<?php echo $result['productName'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <input type="text" readonly="" value="<?php echo $result['catName'] ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <input type="text" readonly="" value="<?php echo $result['brandName'] ?>" class="medium" />
                    </td>
                </tr>
                
                 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" >
                            <?php echo $result['productDetails'] ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text" readonly="" value="<?php echo $result['productPrice'] ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $result['productImage'] ?>" height="80px" width="150px"><br>
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <input type="text" readonly="" value="<?php 
                            if ($result['productType'] == '0') {
                                echo "Featured";
                             }elseif ($result['productType'] == '1') {
                                echo "Non-Featured";
                             }
                    ?>" class="medium" />
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Ok" />
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


