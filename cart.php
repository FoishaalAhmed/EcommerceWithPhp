<?php include "inc/header.php"; ?>
<?php 
    if (isset($_GET['delcart'])) {
        $cartid = $_GET['delcart'];
        $delcart = $cart->deleteProductByCart($cartid);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $quantity = $_POST['productQuantity'];
        $cartId   = $_POST['cartId'];
        $updateCart  = $cart->updateCartQuantity($quantity, $cartId);
    }
?>
<?php 
	if (!isset($_GET['id'])) {
		echo"<meta http-equiv='refresh' content='0;URL=?id=live'/>";
	}
?>
 <div class="main">
    <div class="content">
    	<div class="cartoption">		
			<div class="cartpage">
			    	<h2>Your Cart</h2>
			    	<span style="color: red; font-size: 18px;">
			    	<?php 
			    		if (isset($delcart)) {
			    			echo $delcart;
			    		}
			    	?>
			    	</span>
						<table class="tblone">
							<tr>
								<th width="10%">Serial No.</th>
								<th width="20%">Product Name</th>
								<th width="10%">Image</th>
								<th width="10%">Price</th>
								<th width="25%">Quantity</th>
								<th width="15%">Total Price</th>
								<th width="10%">Action</th>
							</tr>
							<?php 
								$getCart = $cart->getCartProduct();
								if ($getCart) {
									$i = 0;
									$sum = 0;
									$qty = 0;
									while ($value = $getCart->fetch_assoc()) {
										$i++;
							?>
							<tr>
								<td><?php echo $i; ?></td>
								<td><?php echo $value['productName']; ?></td>
								<td><img src="admin/<?php echo $value['productImage']; ?>" alt=""/></td>
								<td>$<?php echo $value['productPrice']; ?></td>
								<td>
									<form action="" method="post">
										<input type="hidden" name="cartId" value="<?php echo $value['cartId']; ?>"/>
										<input type="number" name="productQuantity" value="<?php echo $value['productQuantity']; ?>"/>
										<input type="submit" name="submit" value="Update"/>
									</form>
								</td>
								<td>$<?php
									$total = $value['productPrice'] * $value['productQuantity'];
									echo $total; 
								?></td>
								<td><a onclick="return confirm('Are you sure To Delete This Product?')" href="?delcart=<?php echo $value['cartId']; ?>">X</a></td>
							</tr>
							<?php 
								$qty = $qty + $value['productQuantity'];
								$sum = $sum + $total; 
								Session::set("qty", $qty);
								Session::set("sum", $sum);
							?>
							<?php } } ?>
							
						</table>
						<?php 
							$getData = $cart->checkCartTable();
							if ($getData){
						?>
						<table style="float:right;text-align:left;" width="40%">
							<tr>
								<th>Sub Total : </th>
								<td>$<?php echo $sum ; ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td> $<?php 
										$vat = $sum * 0.1 ;
										$gtotal = $sum + $vat;
										echo "$gtotal";
									 ?>
									
								</td>
							</tr>
					   </table>
					   <?php } else{
					   	header("Location:index.php");
					   //echo "Cart Is Empty. Please Shop Now";
						} ?>
					</div>
					<div class="shopping">
						<div class="shopleft">
							<a href="index.php"> <img src="images/shop.png" alt="" /></a>
						</div>
						<div class="shopright">
							<a href="payment.php"> <img src="images/check.png" alt="" /></a>
						</div>
					</div>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include "inc/footer.php"; ?>
