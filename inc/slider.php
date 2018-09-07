<style>
	.flexslider .slides img {height: 200px;}
</style>
<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php 
					$getBrandProduct = $product->getIphoneProduct();
					if ($getBrandProduct) {
						while ($value = $getBrandProduct->fetch_assoc()) {
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $value['productId']; ?>"> <img src="admin/<?php echo $value['productImage']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p><?php echo $value['productName']; ?></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $value['productId']; ?>">Add to cart</a></span></div>
				   </div>
			   </div>
			   <?php } } ?>
				<?php 
					$getBrandProduct = $product->getSamsungProduct();
					if ($getBrandProduct) {
						while ($value = $getBrandProduct->fetch_assoc()) {
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php?proid=<?php echo $value['productId']; ?>"> <img src="admin/<?php echo $value['productImage']; ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p><?php echo $value['productName']; ?></p>
						  <div class="button"><span><a href="preview.php?proid=<?php echo $value['productId']; ?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php } } ?>
			</div>
			<div class="section group">
				<?php 
					$getBrandProduct = $product->getAcerProduct();
					if ($getBrandProduct) {
						while ($value = $getBrandProduct->fetch_assoc()) {
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php?proid=<?php echo $value['productId']; ?>"> <img src="admin/<?php echo $value['productImage']; ?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p><?php echo $value['productName']; ?></p>
						<div class="button"><span><a href="preview.php?proid=<?php echo $value['productId']; ?>">Add to cart</a></span></div>
				   </div>
			   	</div>
			   	<?php } } ?>
			   	<?php 
					$getBrandProduct = $product->getCanonProduct();
					if ($getBrandProduct) {
						while ($value = $getBrandProduct->fetch_assoc()) {
				?>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php?proid=<?php echo $value['productId']; ?>"> <img src="admin/<?php echo $value['productImage']; ?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Canon</h2>
						  <p><?php echo $value['productName']; ?></p>
						  <div class="button"><span><a href="preview.php?proid=<?php echo $value['productId']; ?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php } } ?>
			</div>
		  <div class="clear"></div>
		</div>
		<div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
				  	
					<ul class="slides">
						<?php 
							$sliderImage = $other->sliderImage();
							if ($sliderImage) {
								while ($result = $sliderImage->fetch_assoc()) {
						?>
						<li><a href="<?php echo $result ['link']; ?>"><img src="admin/<?php echo $result ['image']; ?>" alt=""/></a></li>
						<?php } } ?>
				    </ul>
				    
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
			 
	  <div class="clear"></div>
  </div>	
