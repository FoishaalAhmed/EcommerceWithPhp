<?php include "inc/header.php"; ?>
<?php include "inc/slider.php"; ?>
	
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
	      		$getFeProduct = $product->getAllFeatureProduct();
	      		if ($getFeProduct) {
	      			while ($result = $getFeProduct->fetch_assoc()) {
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
			<div class="content_bottom">
	    		<div class="heading">
	    			<h3>New Products</h3>
	    		</div>
	    		<div class="clear"></div>
    		</div>
			<div class="section group">
				<?php 
		      		$getGeProduct = $product->getAllGeneralProduct();
		      		if ($getGeProduct) {
		      			while ($result = $getGeProduct->fetch_assoc()) {
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
   