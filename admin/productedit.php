<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include '$filepath./../../classes/Brand.php';
    include '$filepath./../../classes/Catagory.php';
    include '$filepath./../../classes/Product.php';
?>
<?php 
    $editproid = mysqli_real_escape_string($db->link, $_GET['editpro']);
    if (!isset($editproid) || $editproid == NULL) {
        echo "<script>window.location = 'productlist.php';</script>";
    } else {
        $proid = $editproid;
    }
    $product = new Product();
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $updateProduct = $product->productUpdate($_POST, $_FILES,$proid);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Edit Product</h2>
        <div class="block">
        <?php 
            if (isset($updateProduct)) {
                echo $updateProduct;
            }
        ?> 
        <?php 
            $getproduct = $product->getProductById($proid);
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
                        <input type="text" name="productName" value="<?php echo $result['productName'] ?>" class="medium" />
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Category</label>
                    </td>
                    <td>
                        <select id="select" name="catId">
                            <option>Select Category</option>
                            <?php 
                                $cat = new Catagory();
                                $getCat = $cat->getAllCatagory();
                                if ($getCat) {
                                    while ($value = $getCat->fetch_assoc()) {
                            ?>
                            <option
                            <?php if ($result['catId'] == $value['catId'] ) {?>
                                    selected = "selected"
                            <?php  } ?> value="<?php echo $value['catId']; ?>"><?php echo $value['catName']; ?></option>
                            <?php } } ?>

                        </select>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Brand</label>
                    </td>
                    <td>
                        <select id="select" name="brandId">
                            <option>Select Brand</option>
                            <?php 
                                $brand = new Brand();
                                $getBrand = $brand->getAllBrand();
                                if ($getBrand) {
                                    while ($value = $getBrand->fetch_assoc()) {
                            ?>
                            <option
                            <?php if ($result['brandId'] == $value['brandId'] ) {?>
                                    selected = "selected"
                            <?php  } ?> value="<?php echo $value['brandId']; ?>"><?php echo $value['brandName']; ?></option>
                            <?php } } ?>
                        </select>
                    </td>
                </tr>
				
				 <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Description</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="productDetails">
                            <?php echo $result['productDetails'] ?>
                        </textarea>
                    </td>
                </tr>
				<tr>
                    <td>
                        <label>Price</label>
                    </td>
                    <td>
                        <input type="text"  name="productPrice" value="<?php echo $result['productPrice'] ?>" class="medium" />
                    </td>
                </tr>
            
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $result['productImage'] ?>" height="80px" width="150px"><br>
                        <input type="file" name="productImage" />
                    </td>
                </tr>
				
				<tr>
                    <td>
                        <label>Product Type</label>
                    </td>
                    <td>
                        <select id="select" name="productType">
                            <option>Select Type</option>
                            <?php if ($result['productType'] == '0') {?>
                                    <option selected="selected" value="0">Featured</option>
                                    <option value="1">Non-Featured</option>
                            <?php  } else {?>
                                    <option selected="selected" value="1">Non-Featured</option>
                                    <option value="0">Featured</option>
                            <?php  }
                                
                            ?>
                            
                        </select>
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


