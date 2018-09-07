<?php include "inc/header.php"; ?>
<?php 
    $login = Session::get("cuslogin");
    if ($login != true) {
        header("Location:login.php");
    }
?>
<?php 
    if (isset($_GET['conid'])) {
        $cusid = $_GET['conid'];
        $productId = $_GET['productId'];

        $shift = $order->productShiftedconfirm($cusid, $productId);
    }
?>

<style>
	.order h2{text-align: center; font-size: 40px;}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="order">
    			<h2>Order Details</h2>
                <table class="tblone">
                            <tr>
                                <th>No.</th>
                                <th>Product</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                                $cusid = Session::get("cusid");
                                $getOrder = $order->getOrderProduct($cusid);
                                if ($getOrder) {
                                    $i = 0;
                                    while ($value = $getOrder->fetch_assoc()) {
                                        $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $value['productName']; ?></td>
                                <td><img src="admin/<?php echo $value['productImage']; ?>" alt=""/></td>
                                <td><?php echo $value['productQuantity']; ?></td>
                                <td>$<?php
                                    $total = $value['productPrice'] * $value['productQuantity'];
                                    echo $total; 
                                ?></td>
                                <td><?php echo $format->formatDate($value['date']); ?></td>
                                <td><?php 
                                    if ($value['status'] == '0') {
                                       echo "panding";
                                    }elseif ($value['status'] == '1') {?>
                                        <a href="?conid=<?php echo $cusid; ?>&productId=<?php echo $value['productId']; ?>">Shifted</a>
                                   <?php }else{
                                        echo "Confirm";
                                    }
                                 
                                ?></td>
                                <td>
                                    <?php if ($value['status'] == '2'){ ?>
                                    <a onclick="return confirm('Are you sure To Delete This Product?')" href="">X</a>
                                    <?php }else{
                                        echo "N/A";
                                    } ?>
                                </td>
                            </tr>
                            <?php } } ?>
                            
                        </table>
    		</div>
    	</div>
       <div class="clear"></div>
    </div>
 </div>
<?php include "inc/footer.php"; ?>
