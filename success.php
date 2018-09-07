<?php include "inc/header.php"; ?>
<?php 
    $login = Session::get("cuslogin");
    if ($login != true) {
        header("Location:login.php");
    }
?>
<style>
    .success{width: 500px; margin: 0 auto; text-align: center; border: 2px solid #ff0000;min-height: 200px;padding: 50px}
    .success h2 {font-size: 25px;  border-bottom: 1px solid #ff0000;  margin-bottom: 50px;  padding-bottom: 40px; }
    .success p {border: 2px solid #005099; border-radius: 5px; padding: 10px; margin-left: 15px; background: #10243C; color: #fff; font-size: 18px; min-height:50px;}
</style>
 <div class="main">
    <div class="content">
        <div class="section group">
            <div class="success">
                <h2> Success </h2>
                <?php 
                    $cusid = Session::get("cusid");
                    $payAmount = $order->payableAmount($cusid);
                    if ($payAmount) {
                        $sum = 0;
                       while ($value = $payAmount->fetch_assoc()) {
                        
                        $price = $value['productPrice'];
                        $sum = $sum + $price;
                        } 
                    }
                ?>
                <p style="color: red">We receive you order. Your total bill (including vat) is: $ 
                <?php
                $vat = $sum * 0.1;
                $total = $sum + $vat;
                echo $total;
                 ?>.</p> 
                 <p>Please <a href="order.php">Click here</a> for your order details. </p>
                
            </div>
        </div>
       <div class="clear"></div>
    </div>
 </div>
<?php include "inc/footer.php"; ?>
