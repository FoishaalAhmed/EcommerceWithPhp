<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__));
    include_once '$filepath./../../helpers/Format.php';
    include '$filepath./../../classes/Product.php';
?>
<?php 
	$product = new Product();
	$format = new Format();
    if (isset($_GET['delpro'])) {
    	$productdel = $_GET['delpro'];
    	$productDelete = $product->deleteProduct($productdel);
    }
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Product List</h2>
        <div class="block">
        <?php 
            if (isset($productDelete)) {
                echo $productDelete;
            }
        ?>  
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="5%">No.</th>
					<th width="15%">Product Name</th>
					<th width="10%">Category</th>
					<th width="10%">Brand</th>
					<th width="20%">Description</th>
					<th width="10%">Price</th>
					<th width="10%">Image</th>
					<th width="10%">Type</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$getProduct = $product-> getAllProduct();
					if ($getProduct) {
						$i = 0;
						while ($value = $getProduct->fetch_assoc()) {
							$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $value['productName']; ?></td>
					<td><?php echo $value['catName']; ?></td>
					<td><?php echo $value['brandName']; ?></td>
					<td><?php echo $format->textShort($value['productDetails'],30); ?></td>
					<td><?php echo $value['productPrice']; ?></td>
					<td> <img src="<?php echo $value['productImage']; ?>" alt="" height="80px" width="100px"></td>
					<td><?php 
							if ($value['productType'] == '0') {
							 	echo "Featured";
							 }elseif ($value['productType'] == '1') {
							 	echo "Non-Featured";
							 }
					?></td>
					<td><a href="productedit.php?editpro=<?php echo $value['productId']; ?>">Edit</a> || <a onclick="return confirm('Are you sure To Delete It?')" href="?delpro=<?php echo $value['productId']; ?>">Delete</a></td>
				</tr>
				<?php } } ?>

			</tbody>
		</table>

       </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();
        $('.datatable').dataTable();
		setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
