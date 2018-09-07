<?php include "inc/header.php"; ?>
<?php 
    $login = Session::get("cuslogin");
    if ($login != true) {
        header("Location:login.php");
    }
?>
<?php
    if (isset($_GET['delproid'])) {
    	$proId = $_GET['delproid'];
    	$id = Session::get("cusid"); 
    	$delWish = $product->delwishlistProduct($proId, $id);
    }
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Compare</h2>
						<table class="tblone">
							<tr>
								<th>No.</th>
								<th>Product Name</th>
								<th>Image</th>
								<th>Price</th>
								<th>Action</th>
							</tr>
							<?php 
								if (isset($delWish)) {
									echo $delWish;
								}
							?>
							<?php 
								$id = Session::get("cusid");
								$getCompaire = $product->getWishlistProduct($id);
								if ($getCompaire) {
									$i = 0;
									while ($value = $getCompaire->fetch_assoc()) {
										$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $value['productName']; ?></td>
								<td><img src="admin/<?php echo $value['productImage']; ?>" alt=""/></td>
								<td>$<?php echo $value['productPrice']; ?></td>
								<td>
									<a href="preview.php?proid=<?php echo $value['productId']; ?>">By Now ||</a>
									<a href="?delproid=<?php echo $value['productId']; ?>">Remove </a>
								</td>
							</tr>
							<?php } } ?>
							
						</table>
					</div>
					<div class="shopping">
						<div class="shopleft" style="width: 100%; text-align: center;">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include "inc/footer.php"; ?>
