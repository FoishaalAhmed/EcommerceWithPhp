<?php include "inc/header.php"; ?>
<?php 
    $login = Session::get("cuslogin");
    if ($login != true) {
        header("Location:login.php");
    }
?>
<style>
	.tblone{width: 600px; margin: 0 auto; border: 2px solid #ddd}
	.tblone tr td{text-align: justify;}
	table.tblone input[type="submit"] {padding: 5px 5px;}
	table.tblone input[type="text"] {padding: 5px 5px; width: 350px; font-size: 15px;}
</style>
<?php
	$id = Session::get("cusid"); 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $updateCus = $cus->customerUpdate($_POST, $id);
    }
?>
 <div class="main">
    <div class="content">
    	<div class="section group">		
			<?php 
				$id = Session::get("cusid");
				$getData = $cus->getCustomerDataById($id);
				if ($getData) {
					while ($result = $getData->fetch_assoc()) {
			?>
			<?php 
				if (isset($updateCus)) {
					echo $updateCus;
				}
			?>
			<form action="" method="post">
			<table class="tblone">
				<tr>
					<td width="20%">Name</td>
					<td><input type="text" name="cusName" value="<?php echo $result['cusName']; ?>"></td>
				</tr>
				<tr>
					<td>City</td>
					<td><input type="text" name="cusCity" value="<?php echo $result['cusCity']; ?>"></td>
				</tr>
				<tr>
					<td>Zip-Code</td>
					<td><input type="text" name="cusZipCode" value="<?php echo $result['cusZipCode']; ?>"></td>
				</tr>
				<tr>
					<td>E-Mail</td>
					<td><input type="text" name="cusEmail" value="<?php echo $result['cusEmail']; ?>"></td>
				</tr>
				<tr>
					<td>Address</td>
					<td><input type="text" name="cusAddress" value="<?php echo $result['cusAddress']; ?>"></td>
				</tr>
				<tr>
					<td>Country</td>
					<td><input type="text" name="cusCountry" value="<?php echo $result['cusCountry']; ?>"></td>
				</tr>
				<tr>
					<td>Phone</td>
					<td><input type="text" name="cusPhone" value="<?php echo $result['cusPhone']; ?>"></td>
				</tr>
				<tr>
					<td></td>
					<td> <input type="submit" name="submit" value="Update"> </td>
				</tr>
				
			</table>
		</form>
			<?php } } ?>
		</div>			   
    </div>
 </div>
<?php include "inc/footer.php"; ?>
