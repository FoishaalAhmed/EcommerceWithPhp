<?php include "inc/header.php"; ?>
<?php 
	$login = Session::get("cuslogin");
	if ($login == true) {
		header("Location: order.php");
	}
?>
 <div class="main">
    <div class="content">
    	 <div class="login_panel">
        	<h3>Existing Customers</h3>
        	<p>Sign in with the form below.</p>
        	<?php 
			    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
			        $CusLogin = $cus->customerLogin($_POST);
			    }
			?>
			<?php 
				if (isset($CusLogin)) {
					echo $CusLogin;
				}
			?>
        	<form action="" method="post" id="member">
                	<input type="text" name="cusEmail" placeholder="E-Mail">
                    <input  type="text" name="cusPassword" placeholder="Password">
                    <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
                 </form>
                 <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    
                    </div>
    	<div class="register_account">
    		<h3>Register New Account</h3>
    <?php 
	    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['reg'])) {
	        $CusReg = $cus->customerRegistration($_POST);
	    }
	?>
	<?php 
		if (isset($CusReg)) {
			echo $CusReg;
		}
	?>
    		<form action="" method="post">
		   			 <table>
		   				<tbody>
						<tr>
						<td>
							<div>
							<input type="text" name="cusName" placeholder="Name" >
							</div>
							
							<div>
							   <input type="text" name="cusCity" placeholder="City">
							</div>
							
							<div>
								<input type="text" name="cusZipCode" placeholder="Zip-Code">
							</div>
							<div>
								<input type="text" name="cusEmail" placeholder="E-Mail">
							</div>
		    			 </td>
		    			<td>
						<div>
							<input type="text" name="cusAddress" placeholder="Address">
						</div>
		    		<div>
						<input type="text" name="cusCountry" placeholder="Country">	
				 </div>		        
	
		           <div>
		          <input type="text" name="cusPhone" placeholder="Phone">
		          </div>
				  
				  <div>
					<input type="text" name="cusPassword" placeholder="Password">
				</div>
		    	</td>
		    </tr> 
		    </tbody>
		</table> 
		   <div class="search"><div><button class="grey" name="reg">Create Account</button></div></div>
		    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
		    <div class="clear"></div>
		    </form>
    	</div>  	
       <div class="clear"></div>
    </div>
 </div>
<?php include "inc/footer.php"; ?>