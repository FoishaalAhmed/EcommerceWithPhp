<?php include "inc/header.php"; ?>
<?php 
    $login = Session::get("cuslogin");
    if ($login != true) {
        header("Location:login.php");
    }
?>
<style>
    .payment{width: 500px; margin: 0 auto; text-align: center; border: 2px solid #ff0000;min-height: 200px;padding: 50px}
    .payment h2 {font-size: 25px;  border-bottom: 1px solid #ff0000;  margin-bottom: 50px;  padding-bottom: 40px; }
    .payment a {border: 2px solid #005099; border-radius: 5px; padding: 10px; margin-left: 15px; background: #10243C; color: #fff; font-size: 18px;}
    .back a { margin: 5px auto 0; padding: 10px; width: 160px; text-align: center; display: block; border: 2px solid #000; background: #10243C; 
    color: #fff; border-radius: 5px; font-size: 20px; font-weight: bold;}
</style>
 <div class="main">
    <div class="content">
        <div class="section group">
            <div class="payment">
                <h2>Payment Option</h2>
                <a href="offline.php">Offline Payment</a>
                <a href="online.php">Online Payment</a>
            </div>
            <div class="back">
                <a href="cart.php">Previous</a>
            </div>
        </div>
       <div class="clear"></div>
    </div>
 </div>
<?php include "inc/footer.php"; ?>
