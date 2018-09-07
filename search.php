<?php include "inc/header.php"; ?>
<?php 
	if (!isset($_POST['search']) || $_POST['search'] == NULL) {
		header("Location:404.php");
	}else{
		$search = $_POST['search'];
	}
?>	
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Searched Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      		$getSearchedProduct = $product->getSearchedProduct($search);
	      		if ($getSearchedProduct) {
	      			while ($result = $getSearchedProduct->fetch_assoc()) {
	      	?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?proid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['productImage']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><?php echo $format->textShort($result['productDetails'], 50); ?></p>
					 <p><span class="price">$<?php echo $result['productPrice']; ?></span></p>
				     <div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
			<?php } } ?>
			</div>			
    </div>
 </div>

<?php include "inc/footer.php"; ?>

