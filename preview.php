<?php include "inc/header.php"; ?>
<?php 
    $pid = mysqli_real_escape_string($db->link, $_GET['proid']);
    if (!isset($pid) || $pid == NULL) {
        echo "<script>window.location = '404.php';</script>";
    } else {
        $productid = $pid;
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $quantity = $_POST['productQuantity'];
        $addCart = $cart->addToCart($quantity, $productid);
    }
?>
<?php
	$id = Session::get("cusid"); 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compaire'])) {
    	$productId = $_POST['productId'];
        $insertcompaire = $product->insertToCompaire($productId, $id);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wishlist'])) {
    	$productId = $_POST['productId'];
        $insertcompaire = $product->insertToWishlist($productId, $id);
    }
?>

 <div class="main">
    <div class="content">
    	<div class="section group">
				<div class="cont-desc span_1_of_2">	
				<?php 
					$prodetails = $product->getSingleProductDetails($productid);
					if ($prodetails) {
						while ($value = $prodetails->fetch_assoc()) {
				?>			
					<div class="grid images_3_of_2">
						<img src="admin/<?php echo $value['productImage']; ?>" alt="" />
					</div>
				<div class="desc span_3_of_2">
					<h2><?php echo $value['productName']; ?></h2>					
					<div class="price">
						<p>Price: <span>$<?php echo $value['productPrice']; ?></span></p>
						<p>Category: <span><?php echo $value['catName']; ?></span></p>
						<p>Brand:<span><?php echo $value['brandName']; ?></span></p>
					</div>
	
				<div class="add-cart">
					<form action="" method="post">
						<input type="number" class="buyfield" name="productQuantity" value="1"/>
						<input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
					</form>				
				</div>
				<?php if (isset($insertcompaire)) {
					echo $insertcompaire;
				} ?>
				<?php $login = Session::get("cuslogin");
   					if ($login == true) { ?>
				<div class="add-cart">
					<form action="" method="post">
						<input type="hidden" class="buyfield" name="productId" value="<?php echo $value['productId']; ?>"/>
						<input type="submit" class="buysubmit" name="compaire" value="Add To Compaire"/>
						<input type="submit" class="buysubmit" name="wishlist" value="Add To Wishlist"/>
					</form>				
				</div
				<?php } ?>
				<span style="color: red; font-size: 18px;">
					<?php 
						if (isset($addCart)) {
							echo $addCart;
						}
					?>
				</span>
			</div>
			<div class="product-desc">
			<h2>Product Details</h2>
			<?php echo $value['productDetails']; ?>
	    </div>
		<?php } } ?>	
	</div>
				<div class="rightsidebar span_3_of_1">
					<h2>CATEGORIES</h2>
					<ul>
					<?php 
					$getCat = $cat->getAllCatagory();
					if ($getCat) {
						while ($result = $getCat->fetch_assoc()) {
					?>
				      <li><a href="productbycat.php?catid=<?php echo $result['catId']; ?>"><?php echo $result['catName']; ?></a></li>
					<?php } } ?>
    				</ul>
    	
 				</div>
 		</div>
 	</div>
</div>
<?php include "inc/footer.php"; ?>
