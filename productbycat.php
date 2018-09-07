<?php include "inc/header.php"; ?>
<?php 
    $catid = mysqli_real_escape_string($db->link, $_GET['catid']);
    if (!isset($catid) || $catid == NULL) {
        //echo "<script>window.location = '404.php';</script>";
    } else {
        $catId = $catid;
    }
?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
			<?php 
				$getCat = $cat->getCatById($catId);
				if ($getCat) {
					while ($result = $getCat->fetch_assoc()) {
			?>
    		<h3>Latest from <?php echo $result['catName']; ?></h3>
    		<?php } } ?>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
	      	<?php 
				$getPro = $product->getProductByCat($catId);
				if ($getPro) {
					while ($result = $getPro->fetch_assoc()) {
			?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a href="preview.php?proid=<?php echo $result['productId']; ?>"><img src="admin/<?php echo $result['productImage']; ?>" alt="" /></a>
					 <h2><?php echo $result['productName']; ?></h2>
					 <p><?php echo $format->textShort($result['productDetails'], 50); ?></p>
					 <p><span class="price">$<?php echo $result['productPrice']; ?></span></p>
				     <div class="button"><span><a href="preview.php?proid=<?php echo $result['productId']; ?>" class="details">Details</a></span></div>
				</div>
			<?php } }else{
				header("Location:404.php");
			} ?>
			</div>

	
	
    </div>
 </div>
<?php include "inc/footer.php"; ?>
