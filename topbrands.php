<?php include "inc/header.php"; ?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Acer</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
				<?php 
					$getBrandProduct = $product->acerProduct();
					if ($getBrandProduct) {
						while ($value = $getBrandProduct->fetch_assoc()) {
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?proid=<?php echo $value['productId']; ?>"><img src="admin/<?php echo $value['productImage']; ?>" alt="" /></a>
					 <h2><?php echo $value['productName']; ?></h2>
					 <p><?php echo $format->textShort($value['productDetails'], 50); ?></p>
					 <p><span class="price">$<?php echo $value['productPrice']; ?></span></p>
				     <div class="button"><span><a href="preview.php?proid=<?php echo $value['productId']; ?>" class="details">Details</a></span></div>
				</div>
				<?php } } ?>
			</div>
		<div class="content_bottom">
    		<div class="heading">
    		<h3>Samsung</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
					$getBrandProduct = $product->samsungProduct();
					if ($getBrandProduct) {
						while ($value = $getBrandProduct->fetch_assoc()) {
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?proid=<?php echo $value['productId']; ?>"><img src="admin/<?php echo $value['productImage']; ?>" alt="" /></a>
					 <h2><?php echo $value['productName']; ?></h2>
					 <p><?php echo $format->textShort($value['productDetails'], 50); ?></p>
					 <p><span class="price">$<?php echo $value['productPrice']; ?></span></p>
				     <div class="button"><span><a href="preview.php?proid=<?php echo $value['productId']; ?>" class="details">Details</a></span></div>
				</div>
				<?php } } ?>
			</div>
	<div class="content_bottom">
    		<div class="heading">
    		<h3>Canon</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
				<?php 
					$getBrandProduct = $product->canonProduct();
					if ($getBrandProduct) {
						while ($value = $getBrandProduct->fetch_assoc()) {
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?proid=<?php echo $value['productId']; ?>"><img src="admin/<?php echo $value['productImage']; ?>" alt="" /></a>
					 <h2><?php echo $value['productName']; ?></h2>
					 <p><?php echo $format->textShort($value['productDetails'], 50); ?></p>
					 <p><span class="price">$<?php echo $value['productPrice']; ?></span></p>
				     <div class="button"><span><a href="preview.php?proid=<?php echo $value['productId']; ?>" class="details">Details</a></span></div>
				</div>
				<?php } } ?>>
			</div>
    </div>
 </div>
   <?php include "inc/footer.php"; ?>