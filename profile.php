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
	.tblone tr td a{border: 1px solid #ddd; background: #ddd; padding: 5px 15px; border-radius: 5px; text-align: center }
</style>

 <div class="main">
    <div class="content">
    	<div class="section group">		
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
					<td> <a href="editprofile.php?id=<?php echo $result['cusId']; ?>">Update Profile</a> </td>
					<td></td>
					
					<td> <a href="?id=<?php echo $result['cusId']; ?>">Change Password</a> </td>
				</tr>
				
			</table>
			<?php } } ?>
		</div>			   
    </div>
 </div>
<?php include "inc/footer.php"; ?>
