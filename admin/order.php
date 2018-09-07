<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php 
    $filepath = realpath(dirname(__FILE__)); 
    include '$filepath./../../classes/Order.php';
    $order = new Order();
    $format = new Format();
?>
<?php 
	if (isset($_GET['shiftid'])) {
		$cusid = $_GET['shiftid'];
		$productId = $_GET['productId'];

		$shift = $order->productShifted($cusid, $productId);
	}

	if (isset($_GET['delid'])) {
		$cusid = $_GET['delid'];
		$productId = $_GET['productId'];

		$shift = $order->shiftedProductDeleted($cusid, $productId);
	}
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Inbox</h2>
        <?php 
        	if (isset($shift)) {
        		echo $shift;
        	}
        ?>
        <div class="block">        
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="10%">No.</th>
					<th width="15%">Product Details</th>
					<th width="20%">P Name</th>
					<th width="10%">Quantity</th>
					<th width="10%">Price</th>
					<th width="10%">Address</th>
					<th width="15%">Order Date</th>
					<th width="10%">Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$getPro = $order->allOrderProduct();
					if ($getPro) {
						$i = 0;
						while ($value = $getPro->fetch_assoc()) {
							$i++;
				?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td> <a href="productdetail.php?proid=<?php echo $value['productId']; ?>">Product Details</a></td>
					<td><?php echo $value['productName']; ?></td>
					<td><?php echo $value['productQuantity']; ?></td>
					<td>$<?php echo $value['productPrice']; ?></td>
					<td> <a href="customer.php?cusid=<?php echo $value['cusId']; ?>">View Address</a></td>
					<td><?php echo $format->formatDate($value['date']); ?></td>
					<?php if ($value['status'] == '0') {?>
						<td><a href="?shiftid=<?php echo $value['cusId']; ?>&productId=<?php echo $value['productId']; ?>">Shifted</a></td>
					<?php }elseif ($value['status'] == '1') {?>
						<td>Pending</td>
					<?php }else{ ?>
					<td><a href="?delid=<?php echo $value['cusId']; ?>&productId=<?php echo $value['productId']; ?>">Remove</a></td>
					<?php } ?>
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