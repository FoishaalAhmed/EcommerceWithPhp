<?php include "inc/header.php"; ?>
<?php 
    $login = Session::get("cuslogin");
    if ($login != true) {
        header("Location:login.php");
    }
?>
<?php 
    if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
        $cusid = Session::get("cusid");
        $orderInsert = $order->insertOrder($cusid);
        $delcart = $cart->deleteCartLogout();
        header("Location: success.php");
    }
?>
<style>
    .division{width: 50%; float: left}
    .tblone{width: 500px; margin: 0 auto; border: 2px solid #ddd}
    .tblone tr td a{border: 1px solid #ddd; background: #ddd; padding: 5px 15px; border-radius: 5px; text-align: center }
    .tbltwo{float:right; text-align:left; width:60%; border: 2px solid #ddd; margin-right: 14px; margin-top: 10px;}
    .tbltwo tr td{text-align: justify; padding: 5px}
    .ordernow{padding-top: 20px}
    .ordernow a{margin: 5px auto 0; padding: 10px; width: 160px; text-align: center; display: block; border: 2px solid #000; background: #10243C; 
    color: #fff; border-radius: 5px; font-size: 20px; font-weight: bold;}
</style>
 <div class="main">
    <div class="content">
    	<div class="section group">
    		<div class="division">
    			<table class="tblone">
                            <tr>
                                <th>No.</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
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
                                <td>$<?php echo $value['productPrice']; ?></td>
                                <td><?php echo $value['productQuantity']; ?></td>
                                <td>$<?php
                                    $total = $value['productPrice'] * $value['productQuantity'];
                                    echo $total; 
                                ?></td>
                            </tr>
                            <?php 
                                $qty = $qty + $value['productQuantity'];
                                $sum = $sum + $total; 
                            ?>
                            <?php } } ?>
                            
                        </table>
                        <table class="tbltwo">
                            <tr>
                                <td width="30%">Sub Total</td>
                                <td width="5%">:</td>
                                <td>$<?php echo $sum ; ?></td>
                            </tr>
                            <tr>
                                <td>VAT</td>
                                <td>:</td>
                                <td>10% ($<?php echo $vat = $sum * 0.1 ; ?>)</td>
                            </tr>
                            <tr>
                                <td>Grand Total</td>
                                <td>:</td>
                                <td> $<?php 
                                        $vat = $sum * 0.1 ;
                                        $gtotal = $sum + $vat;
                                        echo "$gtotal";
                                     ?>
                                    
                                </td>
                            </tr>
                            <tr>
                                <td>Quantity</td>
                                <td>:</td>
                                <td><?php echo $qty; ?></td>
                            </tr>
                       </table>
    		</div>
            <div class="division">
                <?php 
                $id = Session::get("cusid");
                $getData = $cus->getCustomerDataById($id);
                if ($getData) {
                    while ($result = $getData->fetch_assoc()) {
            ?>
            <table class="tblone">
                <tr>
                    <td width="30%">Name</td>
                    <td width="5%">:</td>
                    <td><?php echo $result['cusName']; ?></td>
                </tr>
                <tr>
                    <td>City</td>
                    <td>:</td>
                    <td><?php echo $result['cusCity']; ?></td>
                </tr>
                <tr>
                    <td>Zip-Code</td>
                    <td>:</td>
                    <td><?php echo $result['cusZipCode']; ?></td>
                </tr>
                <tr>
                    <td>E-Mail</td>
                    <td>:</td>
                    <td><?php echo $result['cusEmail']; ?></td>
                </tr>
                <tr>
                    <td>Address</td>
                    <td>:</td>
                    <td><?php echo $result['cusAddress']; ?></td>
                </tr>
                <tr>
                    <td>Country</td>
                    <td>:</td>
                    <td><?php echo $result['cusCountry']; ?></td>
                </tr>
                <tr>
                    <td>Phone</td>
                    <td>:</td>
                    <td><?php echo $result['cusPhone']; ?></td>
                </tr>
                <tr>
                    <td></td> 
                    <td></td>                    
                    <td> <a href="editprofile.php?id=<?php echo $result['cusId']; ?>">Update Profile</a> </td>
                </tr>
                
            </table>
            <?php } } ?>
            </div>
    	</div>
        <div class="ordernow">
                <a href="?orderid=order">Order</a>
            </div>
       <div class="clear"></div>
    </div>
 </div>
<?php include "inc/footer.php"; ?>
